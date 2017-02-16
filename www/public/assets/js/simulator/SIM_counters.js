/**
 * Created by bochao on 6/3/2015.
 */
function SIM_TON(counter, name){
    if (counter.state == 1) {
        // For EN bit, set when activated
        for (var j = 0; j < counter_inputs.length; j++) {
            if (name[0].toUpperCase() == counter_inputs[j].ID) {
                for (var k = 0; k < counter_inputs[j].targets.length; k++) {
                    var index = counter_inputs[j].targets[k];
                    my_list.Node_List[index].input = 1;
                    my_list.Node_List[index].make_oc();
                }
            }
        }
        //when the counter is finished counting
        //for DN bit
        if (counter.preset <= counter.accum) {
            //**future work**
            //add code that update the appearance of the DLD

            //**future work**
            //need to use a new stack to store all counters or timers
            DLD_counters_stack[counter.id].counters("activateDN");
            for (var j = 0; j < counter_inputs.length; j++) {
                if (name[1].toUpperCase() == counter_inputs[j].ID) {
                    for (var k = 0; k < counter_inputs[j].targets.length; k++) {
                        var index = counter_inputs[j].targets[k];
                        my_list.Node_List[index].input = 1;
                        my_list.Node_List[index].make_oc();
                    }
                }
            }
        }
        else {
            DLD_counters_stack[counter.id].counters("deactivateDN");
            counter.accum = counter.accum + 50;
            //if the counter/timer is not enabled, deactivate DN
            for (var j = 0; j < counter_inputs.length; j++) {
                if (name[1].toUpperCase() == counter_inputs[j].ID) {
                    for (var k = 0; k < counter_inputs[j].targets.length; k++) {
                        var index = counter_inputs[j].targets[k];
                        my_list.Node_List[index].input = 0;
                        my_list.Node_List[index].make_oc();
                    }
                }
            }
        }
    }
    else {
        DLD_counters_stack[counter.id].counters("deactivateDN");
        counter.accum = 0;
        // For EN bit, set to 0 when deactivated
        for (var j = 0; j < counter_inputs.length; j++) {
            if (name[0].toUpperCase() == counter_inputs[j].ID) {
                for (var k = 0; k < counter_inputs[j].targets.length; k++) {
                    var index = counter_inputs[j].targets[k];
                    my_list.Node_List[index].input = 0;
                    my_list.Node_List[index].make_oc();
                }
            }
        }
        //For DN bit, set all scenario_inputs timers/counters to 0;
        for (var j = 0; j < counter_inputs.length; j++) {
            if (name[1].toUpperCase() == counter_inputs[j].ID) {
                for (var k = 0; k < counter_inputs[j].targets.length; k++) {
                    var index = counter_inputs[j].targets[k];
                    my_list.Node_List[index].input = 0;
                    my_list.Node_List[index].make_oc();
                }
            }
        }
    }
    //update the DLD counter accum
    counter.DLD.accum = Math.floor(counter.accum/1000);
}

function SIM_TOF(counter, name){
    // if TOF gets activated
    // set accum to 0
    if (counter.state == 1) {
        counter.up_down = 1; //simulate an up edge
        counter.accum = 0;
        counter.counting = 0;

        // For EN bit activate
        for (var j = 0; j < counter_inputs.length; j++) {
            if (name[0].toUpperCase() == counter_inputs[j].ID) {
                for (var k = 0; k < counter_inputs[j].targets.length; k++) {
                    var index = counter_inputs[j].targets[k];
                    my_list.Node_List[index].input = 1;
                    my_list.Node_List[index].make_oc();
                }
            }
        }
        // For DN bit activate
        DLD_counters_stack[counter.id].counters("activateDN");
        for (var j = 0; j < counter_inputs.length; j++) {
            if (name[1].toUpperCase() == counter_inputs[j].ID) {
                for (var k = 0; k < counter_inputs[j].targets.length; k++) {
                    var index = counter_inputs[j].targets[k];
                    my_list.Node_List[index].input = 1;
                    my_list.Node_List[index].make_oc();
                }
            }
        }
    }
    // if TOF gets deactivated
    else{
        // when up_down becomes 0 -- downedge
        // starts counting
        if(counter.up_down == 1){
            counter.up_down = 0;
            counter.counting = 1;
        }

        //if counting is enabled
        if(counter.counting == 1){
            counter.accum = counter.accum + 50;
        }
        // counting is finished
        if(counter.preset <= counter.accum){
            counter.counting = 0;
        }

        // for EN bit
        for (var j = 0; j < counter_inputs.length; j++) {
            if (name[0].toUpperCase() == counter_inputs[j].ID) {
                for (var k = 0; k < counter_inputs[j].targets.length; k++) {
                    var index = counter_inputs[j].targets[k];
                    my_list.Node_List[index].input = 0;
                    my_list.Node_List[index].make_oc();
                }
            }
        }
        // for DN bit
        if(counter.counting == 0){
            DLD_counters_stack[counter.id].counters("deactivateDN");
            for (var j = 0; j < counter_inputs.length; j++) {
                if (name[1].toUpperCase() == counter_inputs[j].ID) {
                    for (var k = 0; k < counter_inputs[j].targets.length; k++) {
                        var index = counter_inputs[j].targets[k];
                        my_list.Node_List[index].input = 0;
                        my_list.Node_List[index].make_oc();
                    }
                }
            }
        }

    }
    //update the DLD counter accum
    counter.DLD.accum = Math.floor(counter.accum/1000);
}

function SIM_RTO(counter, name){
    if (counter.state == 1){
        // For EN bit, set when activated
        for (var j = 0; j < counter_inputs.length; j++) {
            if (name[0].toUpperCase() == counter_inputs[j].ID) {
                for (var k = 0; k < counter_inputs[j].targets.length; k++) {
                    var index = counter_inputs[j].targets[k];
                    my_list.Node_List[index].input = 1;
                    my_list.Node_List[index].make_oc();
                }
            }
        }
        //when the counter is finished counting
        //for DN bit
        if (counter.preset <= counter.accum) {
            counter.donebit = 1;
            DLD_counters_stack[counter.id].counters("activateDN");
            for (var j = 0; j < counter_inputs.length; j++) {
                if (name[1].toUpperCase() == counter_inputs[j].ID) {
                    for (var k = 0; k < counter_inputs[j].targets.length; k++) {
                        var index = counter_inputs[j].targets[k];
                        my_list.Node_List[index].input = 1;
                        my_list.Node_List[index].make_oc();
                    }
                }
            }
        }
        // When counter/timer still counting
        else{
            counter.accum = counter.accum + 50;
        }
    }
    // if the counter is not activated
    else{
        if(counter.donebit==0){

        }
    }
    //update the DLD counter accum
    counter.DLD.accum = Math.floor(counter.accum/1000);
}

function SIM_CTU(counter, name){
    // when activated
    if(counter.state == 1){
        // when up edge
        if(counter.up_down==0){
            counter.accum = counter.accum + 1000;
            counter.up_down = 1;
        }
        // For EN bit activate
        for (var j = 0; j < counter_inputs.length; j++) {
            if (name[0].toUpperCase() == counter_inputs[j].ID) {
                for (var k = 0; k < counter_inputs[j].targets.length; k++) {
                    var index = counter_inputs[j].targets[k];
                    my_list.Node_List[index].input = 1;
                    my_list.Node_List[index].make_oc();
                }
            }
        }
    }
    else{
        counter.up_down = 0;
        for (var j = 0; j < counter_inputs.length; j++) {
            if (name[0].toUpperCase() == counter_inputs[j].ID) {
                for (var k = 0; k < counter_inputs[j].targets.length; k++) {
                    var index = counter_inputs[j].targets[k];
                    my_list.Node_List[index].input = 0;
                    my_list.Node_List[index].make_oc();
                }
            }
        }
    }
    //for DN bit
    if (counter.preset <= counter.accum) {
        //**future work**
        //add code that update the appearance of the DLD

        //**future work**
        //need to use a new stack to store all counters or timers
        DLD_counters_stack[counter.id].counters("activateDN");
        for (var j = 0; j < counter_inputs.length; j++) {
            if (name[1].toUpperCase() == counter_inputs[j].ID) {
                for (var k = 0; k < counter_inputs[j].targets.length; k++) {
                    var index = counter_inputs[j].targets[k];
                    my_list.Node_List[index].input = 1;
                    my_list.Node_List[index].make_oc();
                }
            }
        }
    }
    //update the DLD counter accum
    counter.DLD.accum = Math.floor(counter.accum/1000);
}

//------------------------------------------------------------
function SIM_CTD(counter, name){
    // when activated
    if(counter.state == 1){
        // when up edge
        if(counter.up_down==0){
            counter.accum = counter.accum - 1000;
            counter.up_down = 1;
        }
        // For EN bit activate
        for (var j = 0; j < counter_inputs.length; j++) {
            if (name[0].toUpperCase() == counter_inputs[j].ID) {
                for (var k = 0; k < counter_inputs[j].targets.length; k++) {
                    var index = counter_inputs[j].targets[k];
                    my_list.Node_List[index].input = 1;
                    my_list.Node_List[index].make_oc();
                }
            }
        }
    }
    else{
        counter.up_down = 0;
        for (var j = 0; j < counter_inputs.length; j++) {
            if (name[0].toUpperCase() == counter_inputs[j].ID) {
                for (var k = 0; k < counter_inputs[j].targets.length; k++) {
                    var index = counter_inputs[j].targets[k];
                    my_list.Node_List[index].input = 0;
                    my_list.Node_List[index].make_oc();
                }
            }
        }
    }
    //for DN bit
    if (counter.preset >= counter.accum) {
        //**future work**
        //add code that update the appearance of the DLD

        //**future work**
        //need to use a new stack to store all counters or timers
        DLD_counters_stack[counter.id].counters("activateDN");
        for (var j = 0; j < counter_inputs.length; j++) {
            if (name[1].toUpperCase() == counter_inputs[j].ID) {
                for (var k = 0; k < counter_inputs[j].targets.length; k++) {
                    var index = counter_inputs[j].targets[k];
                    my_list.Node_List[index].input = 1;
                    my_list.Node_List[index].make_oc();
                }
            }
        }
    }
    //update the DLD counter accum
    counter.DLD.accum = Math.floor(counter.accum/1000);
}

//--------------------------------------------------------------
function SIM_RES(counter){
    if(counter.state == 1) {
        //reset any timers or counters events
        for (var i = 0; i < counter_stack.length; i++) {
            //if the name matches, we then deactivate the DN bit and reset the accum value of that timer or counter
            if(counter.reset_target == counter_stack[i].name){
                counter_stack[i].accum = 0;
                var name = ext_EN_DN_name(counter_stack[i].name);
                //if(counter_stack[i].type == )
                DLD_counters_stack[counter_stack[i].id].counters("deactivateDN");
                for (var j = 0; j < counter_inputs.length; j++) {
                    if (name[1].toUpperCase() == counter_inputs[j].ID) {
                        for (var k = 0; k < counter_inputs[j].targets.length; k++) {
                            var index = counter_inputs[j].targets[k];
                            my_list.Node_List[index].input = 0;
                            my_list.Node_List[index].make_oc();
                        }
                    }
                }
                break;
            }
        }
    }
}