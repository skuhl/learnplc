function includeJS(incFile)
{
   document.write('<script type="application/javascript" src="'+ incFile+ '"></script>');
}

function pad(num, size) {
    var s = "0000" + num;
    return s.substr(s.length-size);
}

function clone_LDLgp(oldLDL) {
    var newLDL = new LDLgp();

    newLDL.Line_N = oldLDL.Line_N;
    //for Line_Size
    for(var i=0; i<oldLDL.Line_Size.length; i++){
        newLDL.Line_Size[i] = oldLDL.Line_Size[i];
    }
    //for Line_Level
    for(var i=0; i<oldLDL.Line_Level.length; i++){
        newLDL.Line_Level[i] = oldLDL.Line_Level[i];
    }
    //for element_N
    newLDL.element_N = oldLDL.element_N;
    //for LDL
    for(var i=0; i<oldLDL.LDL.length; i++){
        if(i!=0){
            var newline = [];
            newLDL.LDL[i] = newline;
        }
        for(var j=0; j<oldLDL.LDL[i].length; j++) {
            if (oldLDL.LDL[i][j] instanceof element_node) {
                var node = new element_node(oldLDL.LDL[i][j].name, oldLDL.LDL[i][j].type);
                newLDL.LDL[i][j] = node;
            }
            else if (oldLDL.LDL[i][j] instanceof element_bridge) {
                var bridge = new element_bridge();
                clone_bridge(bridge, oldLDL.LDL[i][j]);
                newLDL.LDL[i][j] = bridge;
            }
        }
    }
    return newLDL;
}

function clone_bridge(new_bridge, old_bridge){
    for(var i=0; i<2; i++){
        for(var j=0; j<old_bridge.element_group[i].length; j++){
            if (old_bridge.element_group[i][j] instanceof element_node) {
                var node = new element_node(old_bridge.element_group[i][j].name, old_bridge.element_group[i][j].type);
                new_bridge.element_group[i][j] = node;
            }
            else if (old_bridge.element_group[i][j] instanceof element_bridge) {
                var bridge = new element_bridge();
                clone_bridge(bridge, old_bridge.element_group[i][j]);
                new_bridge.element_group[i][j] = bridge;
            }
        }
    }
}

function recover_array(initial){
    this.array = [0,0,0,0,0];

    this.new_move = function(){
        var new_LDL = clone_LDLgp(aaa);
        this.array.shift();
        this.array.push(new_LDL);
    };

    this.read_move = function(){
        var value = this.array.pop();
        this.array.splice(0,0,0);
        return value;
    };
}

function get_int_from_str(str){
    var wawa = str.match(/\d+/)[0];
    wawa = parseInt(wawa);
    return wawa;
}

function ext_EN_DN_name(name){
    var EN_DN = [];

    var name_head = name.slice(0,3);
    var id = get_int_from_str(name);
    var EN_name = name_head + id + "E";
    var DN_name = name_head + id + "D";

    EN_DN[0] = EN_name;
    EN_DN[1] = DN_name;

    return EN_DN;
}

function reform_counter_inputs(){
    counter_inputs = [];

    for(var i=0; i<counter_name_list.length; i++){
        var cont_name = ext_EN_DN_name(counter_name_list[i]);
        counter_inputs.push(new sc_input(cont_name[0]));
        counter_inputs.push(new sc_input(cont_name[1]));

    }
}

function get_reset_counter_name(name){
    var n = get_int_from_str(name);
    var new_name = name.substr(0,3);
    new_name = new_name + n;

    return new_name;
}

function get_tag_name_from_reset(name){
    var n = get_int_from_str(name);
    var new_name = name.substr(0,3);

    new_name = new_name + " #" + n;
    return new_name;

}

function get_val_from_source(source){
    var string_head = source.substr(0,3);
    // match the input/output names
    var data_type = "value";
    var data_source;
    switch(string_head){
        case "O0.":
        case "I1.":
            var index_1 = string_head.substr(0, 2);
            var index_2 = source.substr(2, 4);
            //var index_1 = "I1";
            for(var i=0; i<8; i++){
                if(index_2 == sim_data_table[index_1][i].name)
                {
                    //var index_2 = get_index.substr(1, 3);
                    data_source = sim_data_table[index_1][i].value;
                    data_type = "I/O";
                }
            }
            break;
        case "S2.":
            break;
        case "B3.":
            data_type = "binary";
            break;
        case "T4.":
            data_type = "timer";
            var index_1 = string_head.substr(0, 2);
            var index_2 = source.substr(8, 2)+"_bit";
            var index_type = source.substr(3, 3);
            var index_id = get_int_from_str(source.substr(3,9)).toString();
            var index_full_name = index_type + " #" + index_id;
            for(var i=0; i<sim_data_table.T4.length; i++){
                if(sim_data_table.T4[i].name == index_full_name){
                    //index_2
                    var new_index_2;
                    var divid_factor = 1;
                    switch(index_2){
                        case "EN_bit":
                        case "DN_bit":
                        case "TT_bit":
                            break;
                        case "PR_bit":
                            new_index_2 = "preset";
                            divid_factor = 1000;
                            break;
                        case "AC_bit":
                            new_index_2 = "accum";
                            divid_factor = 1000;
                            break;
                        default:
                            break;
                    }
                    data_source = sim_data_table.T4[i][new_index_2]/divid_factor;
                }
            }
            break;
        case "C5.":
            data_type = "counter";
            var index_1 = string_head.substr(0, 2);
            var index_2 = source.substr(8, 2)+"_bit";
            var index_type = source.substr(3, 3);
            var index_id = get_int_from_str(source.substr(3,9)).toString();
            var index_full_name = index_type + " #" + index_id;
            for(var i=0; i<sim_data_table.C5.length; i++){
                if(sim_data_table.C5[i].name == index_full_name){
                    //index_2
                    var new_index_2;
                    switch(index_2){
                        case "EN_bit":
                        case "DN_bit":
                        case "TT_bit":
                            break;
                        case "PR_bit":
                            new_index_2 = "preset";
                            break;
                        case "AC_bit":
                            new_index_2 = "accum";
                            break;
                        default:
                            break;
                    }
                    data_source = sim_data_table.C5[i][new_index_2];
                }
            }
            break;
        case "R6.":
            break;
        case "N7.":
        case "F8.":
            var index_1 = string_head.substr(0, 2);
            var index_2 = parseInt(source.substr(3, 2));
            //var index_1 = "I1";
            if(index_2>=0 && index_2<=99)
            {
                //var index_2 = get_index.substr(1, 3);
                data_source = sim_data_table[index_1][index_2];
                data_type = "num";
            }
            //data_type = "num";
            break;
        default:
            break;
    }
    // check if it is an input or output type
    if(data_type == "I/O"){
    }
    // check if it is an int/float in the data table
    else if(data_type == "num"){
    }
    // check if it is not an integer
    //else if(isNaN(source)){
    //    data_source = "NaN";
    //}
    else if(data_type == "value"){
        if(!isNaN(source)){
            //data_source = "NaN";
            data_source = parseInt(source);
        }
        else{
            data_source = "NaN";
        }
        //data_source = parseInt(source);
    }

    return data_source;
}

function Counter_timer_ID() {
    this.TON_ID = [null];
    this.TOF_ID = [null];
    this.RTO_ID = [null];
    this.CTU_ID = [null];
    this.CTD_ID = [null];
    this.RES_ID = [null];

}
