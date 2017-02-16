/* the iteration is used to update the status of each elements from time to time*/

//input data structure
function sc_input(ID) {
    this.ID = ID;
    this.inputs = [];
    this.targets = [];
}

//output data structure
function sc_output(ID) {
    this.ID = ID;
    this.outputs = [0];
    this.targets = [];
}

function iteration(matrix, list, index, prev) {
    //var sim_status = status;
    //var sim_hold_name = hold_name;
    //var sim_hold_type = hold_type;
    var List_length = list.length;
    for (var i = 0; i < List_length; i++) {
        if (matrix[index][i] == 1) {
            if (prev == 1 && list[i].oc == 1) {
                //if(list[i].type == 20){ // if it is a MCR then we set
                //
                //}
                if(sim_status == 0) { // check if it is hold free
                    if(set_label.indexOf(list[i].type)==-1 ){
                        list[i].state = 1;
                    }

                    if(list[i].type == 19){ // if it is a Jump instruction
                        list[i].state = 1;
                        sim_status = 1;
                        sim_hold_type = 2;
                        sim_hold_name = list[i].name;
                    }
                    else if(list[i].type == 25){// for TND instruction
                        //list[i].state = 1;
                        sim_status = 1;
                        sim_hold_type = 3;
                    }
                }
                else{ // if it is on hold
                    if(list[i].type == 20){// for MCR instruction
                        sim_status = 0;
                        sim_hold_type = 0;
                    }
                    if(list[i].type == 23 && list[i].name == sim_hold_name && sim_status == 1){// for LBL instruction
                        sim_status = 0;
                        sim_hold_type = 0;
                        list[i].state = 1;
                    }
                }

                //if(list[i].type == 20){
                //    if(sim_status == 0) {// if the hold is set to MCR
                //        sim_status = 1;
                //        sim_hold_type = 1;
                //    }
                //}
            }
            else {
                //list[i].state = 0;
                if(list[i].type == 20){ // if it is a MCR instruction
                    if(sim_status == 0) { // if the hold is set to MCR
                        sim_status = 1;
                        sim_hold_type = 1;
                    }
                }
            }
            // recursively run predecessor nodes
            //if (list[i].state == 1) {
            //    iteration(matrix, list, i, sim_status, sim_hold_name, sim_hold_type);
            //}
            iteration(matrix, list, i, list[i].state);
        }
    }
}

function main_cycle() {

    reset_states(my_list.Node_List);
    //var new_status = 0; // when status = 0, run normally, if status = 1, stop setting inputs and outputs;
    //var new_hold_name = "";
    //var new_hold_type = 0; //  when the hold type = 1, it is a MCR hold. if type = 2, it is a jump hold. if type = 3, it is a termination.
    iteration(my_matrix.elematrix, my_list.Node_List, 0, 1, sim_status, sim_hold_name, sim_hold_type);

    // To capture the reset timer events
    for (var i = 0; i < resets_stack.length; i++) {
        var tag_name = resets_stack[i].reset_target;
        SIM_RES(resets_stack[i]);
    }
    // To capture the counters and timers events
    for (var i = 0; i < counter_stack.length; i++) {
        var node_name = ext_EN_DN_name(counter_stack[i].name);//get the name of the counter or timers
        var node_type = counter_stack[i].type;
        switch (node_type){
            case 9:
                SIM_TON(counter_stack[i], node_name);
                break;
            case 10:
                SIM_TOF(counter_stack[i], node_name);
                break;
            case 11:
                SIM_RTO(counter_stack[i], node_name);
                break;
            case 12:
                SIM_CTU(counter_stack[i], node_name);
                break;
            case 13:
                SIM_CTD(counter_stack[i], node_name);
                break;
            default:
                break;
        }
    }
    //finish time events-------------------------------------------------

    // To capture math events
    for (var i = 0; i < math_stack.length; i++) {
        var node_type = math_stack[i].type;
        switch (node_type){
            case 15:
                SIM_ADD(math_stack[i]);
                break;
            case 16:
                SIM_SUB(math_stack[i]);
                break;
            case 17:
                SIM_MUL(math_stack[i]);
                break;
            case 18:
                SIM_DIV(math_stack[i]);
                break;
            default:
                break;
        }
    }
    //finish math events-------------------------------------------------

    for (var i = 0; i < scenario_outputs.length; i++) {
        if (scenario_outputs[i].targets.length > 0) {
            var index = scenario_outputs[i].targets[0];
            if (my_list.Node_List[index].state == 1) {
                scenario_outputs[i].outputs[0] = 1;
            }
            else {
                scenario_outputs[i].outputs[0] = 0;
            }
        }
        else {
            scenario_outputs[i].outputs[0] = 0;
        }
    }
    // update the activation of each elements in DLD
    for (var i = 1; i < my_list.Node_List.length; i++) {
        // for bit tools
        if(my_list.Node_List[i].type < 9) {
            if (my_list.Node_List[i].state == 1) {
                DLD_tools_stack[my_list.Node_List[i].id].tools("activate");
            }
            else{
                DLD_tools_stack[my_list.Node_List[i].id].tools("deactivate");
            }
        }
        // for timers and counters
        else if(my_list.Node_List[i].type < 14){
            if (my_list.Node_List[i].state == 1) {
                DLD_counters_stack[my_list.Node_List[i].id].counters("activate");
            }
            else{
                DLD_counters_stack[my_list.Node_List[i].id].counters("deactivate");
            }

            DLD_counters_stack[my_list.Node_List[i].id].counters("update_accum");
        }
        else if(my_list.Node_List[i].type < 15){
            if (my_list.Node_List[i].state == 1) {
                DLD_tools_stack[my_list.Node_List[i].id].resets("activate");
            }
            else{
                DLD_tools_stack[my_list.Node_List[i].id].resets("deactivate");
            }
        }
        if(my_list.Node_List[i].type == 20) { // for MCR instruction
            if (my_list.Node_List[i].state == 1) {
                DLD_tools_stack[my_list.Node_List[i].id].mcr("activate");
            }
            else{
                DLD_tools_stack[my_list.Node_List[i].id].mcr("deactivate");
            }
        }
        if(my_list.Node_List[i].type == 19) { // for JMP instruction
            if (my_list.Node_List[i].state == 1) {
                DLD_tools_stack[my_list.Node_List[i].id].jmp("activate");
            }
            else{
                DLD_tools_stack[my_list.Node_List[i].id].jmp("deactivate");
            }
        }
        if(my_list.Node_List[i].type == 23) { // for LBL instruction
            if (my_list.Node_List[i].state == 1) {
                DLD_tools_stack[my_list.Node_List[i].id].lbl("activate");
            }
            else{
                DLD_tools_stack[my_list.Node_List[i].id].lbl("deactivate");
            }
        }
        if(my_list.Node_List[i].type == 25) { // for TND instruction
            if (my_list.Node_List[i].state == 1) {
                DLD_tools_stack[my_list.Node_List[i].id].tnd("activate");
            }
            else{
                DLD_tools_stack[my_list.Node_List[i].id].tnd("deactivate");
            }
        }
    }
    //update counter and timer bits "TO" the data table to the simulator


}

function match_name() {
    for (var k = 1; k < my_list.Node_List.length; k++) {
        var node_name = my_list.Node_List[k].name;
        var node_ID = my_list.Node_List[k].id;
        var node_type = my_list.Node_List[k].type;
        if (set_inputs.indexOf(node_type) > -1) {
            for (var i = 0; i < scenario_inputs.length; i++) {
                if (node_name.toUpperCase() == scenario_inputs[i].ID) {
                    scenario_inputs[i].targets.push(node_ID);
                    break;
//                    my_list.Node_List[this.options.ID].make_oc();
                }
            }
            //for counters and timers
            for(var i = 0; i < counter_inputs.length; i++){
                if (node_name.toUpperCase() == counter_inputs[i].ID) {
                    counter_inputs[i].targets.push(node_ID);
                    break;
                }
            }
        }
        else if (set_outputs.indexOf(node_type) > -1) {
            //checck for outputs name match
            for (var i = 0; i < scenario_outputs.length; i++) {
                if (node_name.toUpperCase() == scenario_outputs[i].ID) {
                    scenario_outputs[i].targets.push(node_ID);
                    break;
//                    my_list.Node_List[this.options.ID].make_oc();
                }
            }
        }
    }
}

function clear_targets() {
    for (var i = 0; i < scenario_inputs.length; i++) {
        scenario_inputs[i].targets = [];
    }
    for (var i = 0; i < scenario_outputs.length; i++) {
        scenario_outputs[i].targets = [];
    }
    for(var i = 0; i < counter_inputs.length; i++){
        counter_inputs[i].targets = [];
    }
}

function deactivate_all() {
    for (var i = 1; i < my_list.Node_List.length; i++) {
        if (my_list.Node_List[i].type < 9) {
            DLD_tools_stack[my_list.Node_List[i].id].tools("deactivate");
        }
        else if (my_list.Node_List[i].type < 14) {
            DLD_counters_stack[my_list.Node_List[i].id].counters("deactivate");
            DLD_counters_stack[my_list.Node_List[i].id].counters("deactivateDN");
        }
        else if(my_list.Node_List[i].type < 15){
            DLD_tools_stack[my_list.Node_List[i].id].resets("deactivate");
        }
        else if(my_list.Node_List[i].type == 19){ // for JMP instruction
            DLD_tools_stack[my_list.Node_List[i].id].jmp("deactivate");
        }
        else if(my_list.Node_List[i].type == 20){ // for MCR instruction
            DLD_tools_stack[my_list.Node_List[i].id].mcr("deactivate");
        }
        else if(my_list.Node_List[i].type == 23){ // for LBL instruction
            DLD_tools_stack[my_list.Node_List[i].id].lbl("deactivate");
        }
        else if(my_list.Node_List[i].type == 25){ // for JMP instruction
            DLD_tools_stack[my_list.Node_List[i].id].tnd("deactivate");
        }
    }
}