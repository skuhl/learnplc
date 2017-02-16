function SIM_ADD(node){
    if(node.state == 1){
        var sourceA = node.sourceA;
        var sourceB = node.sourceB;
        var dest = node.dest;
        var source_A_value = get_val_from_source(sourceA);
        var source_B_value = get_val_from_source(sourceB);
        var dest_index_1 = dest.substr(0, 2);
        // if the destiny is input or output
        if(dest.length == 6){
            var dest_name = dest.substr(2, 4);
            for(var i=0; i<sim_data_table[dest_index_1].length; i++){
                if(dest_name == sim_data_table[dest_index_1][i]){
                    var new_value = parseInt(source_A_value) + parseInt(source_B_value);
                    if(new_value>0){
                        new_value = 1;
                    }
                    sim_data_table[dest_index_1][i] = new_value;
                }
            }
        }
        // if the destiny is integer or float
        if(dest.length == 5){
            var dest_name = parseInt(dest.substr(3, 2));
            var new_value = parseInt(source_A_value) + parseInt(source_B_value);
            sim_data_table[dest_index_1][dest_name] = new_value;
        }
    }

    DLD_math_stack[node.id].math("update_sourceA");
    DLD_math_stack[node.id].math("update_sourceB");
    DLD_math_stack[node.id].math("update_dest");
}

function SIM_SUB(node){
    if(node.state == 1){
        var sourceA = node.sourceA;
        var sourceB = node.sourceB;
        var dest = node.dest;
        var source_A_value = get_val_from_source(sourceA);
        var source_B_value = get_val_from_source(sourceB);
        var dest_index_1 = dest.substr(0, 2);
        // if the destiny is input or output
        if(dest.length == 6){
            var dest_name = dest.substr(2, 4);
            for(var i=0; i<sim_data_table[dest_index_1].length; i++){
                if(dest_name == sim_data_table[dest_index_1][i]){
                    var new_value = parseInt(source_A_value) - parseInt(source_B_value);
                    if(new_value>0){
                        new_value = 1;
                    }
                    sim_data_table[dest_index_1][i] = new_value;
                }
            }
        }
        // if the destiny is integer or float
        if(dest.length == 5){
            var dest_name = parseInt(dest.substr(3, 2));
            var new_value = parseInt(source_A_value) - parseInt(source_B_value);
            sim_data_table[dest_index_1][dest_name] = new_value;
        }
    }

    DLD_math_stack[node.id].math("update_sourceA");
    DLD_math_stack[node.id].math("update_sourceB");
    DLD_math_stack[node.id].math("update_dest");
}

function SIM_MUL(node){
    if(node.state == 1){
        var sourceA = node.sourceA;
        var sourceB = node.sourceB;
        var dest = node.dest;
        var source_A_value = get_val_from_source(sourceA);
        var source_B_value = get_val_from_source(sourceB);
        var dest_index_1 = dest.substr(0, 2);
        // if the destiny is input or output
        if(dest.length == 6){
            var dest_name = dest.substr(2, 4);
            for(var i=0; i<sim_data_table[dest_index_1].length; i++){
                if(dest_name == sim_data_table[dest_index_1][i]){
                    var new_value = parseInt(source_A_value) * parseInt(source_B_value);
                    if(new_value>0){
                        new_value = 1;
                    }
                    sim_data_table[dest_index_1][i] = new_value;
                }
            }
        }
        // if the destiny is integer or float
        if(dest.length == 5){
            var dest_name = parseInt(dest.substr(3, 2));
            var new_value = parseInt(source_A_value) * parseInt(source_B_value);
            sim_data_table[dest_index_1][dest_name] = new_value;
        }
    }

    DLD_math_stack[node.id].math("update_sourceA");
    DLD_math_stack[node.id].math("update_sourceB");
    DLD_math_stack[node.id].math("update_dest");
}

function SIM_DIV(node){
    if(node.state == 1){
        var sourceA = node.sourceA;
        var sourceB = node.sourceB;
        var dest = node.dest;
        var source_A_value = get_val_from_source(sourceA);
        var source_B_value = get_val_from_source(sourceB);
        var dest_index_1 = dest.substr(0, 2);
        // if the destiny is input or output
        if(dest.length == 6){
            var dest_name = dest.substr(2, 4);
            for(var i=0; i<sim_data_table[dest_index_1].length; i++){
                if(dest_name == sim_data_table[dest_index_1][i]){
                    var new_value = parseInt(source_A_value) / parseInt(source_B_value);
                    if(new_value>0){
                        new_value = 1;
                    }
                    sim_data_table[dest_index_1][i] = new_value;
                }
            }
        }
        // if the destiny is integer or float
        if(dest.length == 5){
            var dest_name = parseInt(dest.substr(3, 2));
            var new_value = parseInt(source_A_value) / parseInt(source_B_value);
            sim_data_table[dest_index_1][dest_name] = new_value;
        }
    }

    DLD_math_stack[node.id].math("update_sourceA");
    DLD_math_stack[node.id].math("update_sourceB");
    DLD_math_stack[node.id].math("update_dest");
}

