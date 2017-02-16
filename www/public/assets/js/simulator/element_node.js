/* The element node object is used in the element array*/
function P_node(type, id, name, state, input, oc, DLD, preset, accum, reset_tag){

    this.type = type;
    this.id = id;
    this.name = name;
    this.state = state; //whether it is activate
    this.input = input; //whether the input is activate
    this.oc = oc;

    //for time related elements
    this.preset = preset;
    this.accum = accum;
    this.DN_bit = 0;
    this.EN_bit = 0;
    this.TT_bit = 0;
    this.CC_bit = 0;

    //pointer back to the DLD element
    this.DLD = DLD;
    this.up_down = 0;
    this.counting = 0;
    this.donebit = 0;

    this.sourceA = 0;
    this.sourceB = 0;
    this.dest = 0;

    this.reset_target = null;

    this.make_oc = function(){
        switch(this.type){
            case 1:
                this.oc = 1 - this.input;
                break;
            case 2:
                this.oc = this.input;
                break;
            case 3:
                this.oc = 1;
                break;
            case 9:
                this.oc = 1;
                break;
            case 10:
                this.oc = 1;
                break;
            case 11:
                this.oc = 1;
                break;
            case 12:
                this.oc = 1;
                break;
            case 13:
                this.oc = 1;
                break;
            case 14:
                this.oc = 1;
                break;
            case 15:
                this.oc = 1;  // for add instruction
                break;
            case 16:
                this.oc = 1;  // for subtract instruction
                break;
            case 17:
                this.oc = 1;  // for multiplication instruction
                break;
            case 18:
                this.oc = 1;  // for divide instruction
                break;
            case 19:
                this.oc = 1;
                break;
            case 20:
                this.oc = 1;
                break;
            case 21:
                this.oc = 1;
                break;
            case 22:
                this.oc = 1;
                break;
            case 23:
                this.oc = 1;
                break;
            case 24:
                this.oc = 1;
                break;
            case 25:
                this.oc = 1;
                break;
            default:
                break;
        }
    };
}

function Sim_list(){
    this.Node_List = [];
}

function P_list(LDLgp){
    // Initialize the Node list
    counter_stack = [];
    resets_stack = [];
    counter_DLD_index = []; //reset the counter stack

    sim_data_table.T4 = [];
    sim_data_table.C5 = [];

    math_stack = []; //reset the counter stack

    my_list.Node_List = [];
    var Node_0 = new P_node(99, 0, name, 1, 1, 1);
    my_list.Node_List[0] = Node_0;

    // Form the Node list
    var NodeID = 1;
    for(var i=0; i<LDLgp.getLine_N(); i++){
        for(var j=0; j<LDLgp.Line_Size[i]; j++){
            if(LDLgp.LDL[i][j] instanceof element_node){
                var type = LDLgp.LDL[i][j].type;
                var node_name =  LDLgp.LDL[i][j].name;
                if(type<9) {
                    var Node = new P_node(type, NodeID, node_name, 0, 0, 0, LDLgp.LDL[i][j]);
                }
                else if(type<14){// for timers and counters
                    var sim_preset = LDLgp.LDL[i][j].preset*1000;
                    var sim_accum =LDLgp.LDL[i][j].accum*1000;
                    var Node = new P_node(type, NodeID, node_name, 0, 0, 0, LDLgp.LDL[i][j], sim_preset, sim_accum, DLD_counters_stack[NodeID]);
                    counter_stack.push(Node);

                    var tnc_data_name = node_name.substr(0,2);
                    switch (tnc_data_name){
                        case "CT":
                            tnc_data_name = "C5";
                            break;
                        case "TO":
                            tnc_data_name = "T4";
                            break;
                        case "RT":
                            tnc_data_name = "T4";
                            break;
                        default:
                            break;
                    }
                    sim_data_table[tnc_data_name].push(Node);

                    //var cont_name = ext_EN_DN_name(node_name);
                    //counter_inputs.push(new sc_input(cont_name[0]));
                    //counter_inputs.push(new sc_input(cont_name[1]));
                }
                else if(type<15){ // for reset instruction
                    var Node = new P_node(type, NodeID, node_name, 0, 0, 0, LDLgp.LDL[i][j]);
                    if(node_name != "???") {
                        Node.reset_target = get_tag_name_from_reset(node_name);
                    }
                    resets_stack.push(Node);
                }
                else if(type<19){ // for math instructions
                    var Node = new P_node(type, NodeID, node_name, 0, 0, 0, LDLgp.LDL[i][j]);
                    Node.sourceA = LDLgp.LDL[i][j].sourceA;
                    Node.sourceB = LDLgp.LDL[i][j].sourceB;
                    Node.dest = LDLgp.LDL[i][j].dest;

                    math_stack.push(Node);
                }
                else if(type == 19){
                    var Node = new P_node(type, NodeID, node_name, 0, 0, 0, LDLgp.LDL[i][j]);
                }
                else if(type==20){ // for mcr instruction
                    var Node = new P_node(type, NodeID, node_name, 0, 0, 0, LDLgp.LDL[i][j]);
                }
                else if(type==23){ // for LBL instruction
                    var Node = new P_node(type, NodeID, node_name, 0, 0, 0, LDLgp.LDL[i][j]);
                }
                else if(type==25){ // for TND instruction
                    var Node = new P_node(type, NodeID, node_name, 0, 0, 0, LDLgp.LDL[i][j]);
                }
                Node.make_oc();
                my_list.Node_List[NodeID] = Node;
                NodeID = NodeID + 1;
            }
            else if(LDLgp.LDL[i][j] instanceof element_bridge){
                NodeID = branch_list(LDLgp.LDL[i][j].element_group, NodeID);
            }
        }
    }
}

function branch_list(group, NodeID){
    var ID = NodeID;

    for(var i=0; i<group.length; i++){
        for(var j=0; j<group[i].length; j++){
            if(group[i][j] instanceof element_node){
                var node_name = group[i][j].name;
                var type = group[i][j].type;
                if(type<9){
                    var Node = new P_node(type, ID, node_name, 0, 0, 0, group[i][j]);
                }
                else if(type<14){
                    var sim_preset = group[i][j].preset*1000;
                    var sim_accum = group[i][j].accum*1000;
                    var Node = new P_node(type, ID, node_name, 0, 0, 0, group[i][j], sim_preset, sim_accum, DLD_counters_stack[ID]);
                    counter_stack.push(Node);
                }
                else if(type<15){
                    var Node = new P_node(type, ID, node_name, 0, 0, 0, group[i][j]);
                    if(node_name != "???") {
                        Node.reset_target = get_tag_name_from_reset(node_name);
                    }
                    resets_stack.push(Node);
                }
                else if(type<19){
                    var Node = new P_node(type, ID, node_name, 0, 0, 0, group[i][j]);
                    // to be added
                    Node.sourceA = group[i][j].sourceA;
                    Node.sourceB = group[i][j].sourceB;
                    Node.dest = group[i][j].dest;

                    math_stack.push(Node);
                }
                else if(type == 19){
                    var Node = new P_node(type, ID, node_name, 0, 0, 0, group[i][j]);
                }
                else if(type == 20){
                    var Node = new P_node(type, ID, node_name, 0, 0, 0, group[i][j]);
                }
                else if(type == 23){
                    var Node = new P_node(type, ID, node_name, 0, 0, 0, group[i][j]);
                }
                else if(type == 25){
                    var Node = new P_node(type, ID, node_name, 0, 0, 0, group[i][j]);
                }
                //var node = create_node(group[i][j].type, ID, node_name, group[i][j]);
                my_list.Node_List[ID] = Node;
                ID = ID + 1;
            }
            else if(group[i][j] instanceof element_bridge){
                ID = branch_list(group[i][j].element_group, ID);
            }
        }
    }
    // insert the end node for a branch
    var node = new P_node(98, ID, "node", 0, 0, 1);
    my_list.Node_List[ID] = node;
    ID = ID + 1;

    return ID;
}

function reset_states(list){
    var List_length = list.length;
    for(var i =1; i<List_length; i++){
        list[i].state = 0;
    }
}