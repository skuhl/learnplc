//var stage_steps = 0;
//
//var out_table = [0,0,0,0,0,0,0,0];
//
//var hex_allow = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F", "a", "b", "c", "d", "e", "f"];
//
//var mask_table = [0,0,0,0,0,0,0,0];
//
//var b_table_0 = [0,0,0,0,0,0,0,0];
//var b_table_1 = [0,0,0,0,0,0,0,0];
//var b_table_2 = [0,0,0,0,0,0,0,0];
//var b_table_3 = [0,0,0,0,0,0,0,0];

var binary_table = [0,1,1,1,1,1,1,1];
var sensor_data = 0;
var count_index = 0;

var instruction_ID = $("<div></div>");
instruction_ID.html("BSR");
instruction_ID.css({
    background: 'white',
    position: 'absolute',
    top: -7,
    left: 35
});
$("#plc_bsl").append(instruction_ID);

var element_name = $("<div></div>");
element_name.html("Bit Shift Right");
element_name.css({
    position: 'absolute',
    top: 15,
    left: 6
});
$("#plc_bsl").append(element_name);

// file inputs
var bsl_file = $('<div></div>'); //the input field of the counter PRESET
var file_title = $('<div>File:</div>');
bsl_file.css({
    position: 'absolute',
    top: 40,
    left: 6
});
var file_input = $('<input class="sqc_input" type="text">').val("B3.00").prop("disabled", true);
file_input.css({
    position: 'absolute',
    top: -3,
    left: 57
});
bsl_file.append(file_title);
bsl_file.append(file_input);
$("#plc_bsl").append(bsl_file);

//mask inputs
//var bsl_mask = $('<div></div>'); //the input field of the counter PRESET
//var mask_title = $('<div>Mask:</div>');
//sqc_mask.css({
//    position: 'absolute',
//    top: 65,
//    left: 6
//});
//var mask_input = $('<input class="sqc_input" type="text">');
//mask_input.css({
//    position: 'absolute',
//    top: -3,
//    left: 57
//});
////catch the change event when people change mask input field
//mask_input.change(
//    function(){
//        var new_value = get_value_from_hex($(this).val());
//        var binary_new_value = new_value.toString(2);
//        var offset_number = 8-binary_new_value.length;
//        for(var k=0; k<offset_number; k++){
//            binary_new_value = "0"+binary_new_value;
//        }
//        for (var i=0; i<8; i++){
//            mask_table[i] = binary_new_value[i];
//        }
//        if(new_value != 0){
//            $("#mask_hex").html(":"+ $(this).val());
//        }
//        else{
//            $("#mask_hex").html(":");
//        }
//        refresh_mask_table();
//    }
//);
//
//sqc_mask.append(mask_title);
//sqc_mask.append(mask_input);
//$("#plc_sqc").append(sqc_mask);

// Control Source
var bsl_ctrl = $('<div></div>'); //the input field of the counter PRESET
var ctrl_title = $('<div>Ctrl:</div>');
bsl_ctrl.css({
    position: 'absolute',
    top: 65,
    left: 6
});
var ctrl_input = $('<input class="sqc_input" type="text">').val("R6.00").prop("disabled", true);
ctrl_input.css({
    position: 'absolute',
    top: -3,
    left: 57
});
bsl_ctrl.append(ctrl_title);
bsl_ctrl.append(ctrl_input);
$("#plc_bsl").append(bsl_ctrl);

//Bit Address inputs
var bsl_src = $('<div></div>'); //the input field of the counter PRESET
var src_title = $('<div>BitAddr:</div>');
bsl_src.css({
    position: 'absolute',
    top: 90,
    left: 6
});
var src_input = $('<input class="sqc_input" type="text">').val("Sensor#1").prop("disabled", true);
src_input.css({
    position: 'absolute',
    top: -3,
    left: 57
});
bsl_src.append(src_title);
bsl_src.append(src_input);
$("#plc_bsl").append(bsl_src);

////Control inputs
//var sqc_ctrl = $('<div></div>'); //the input field of the counter PRESET
//var ctrl_title = $('<div>Ctrl:</div>');
//sqc_ctrl.css({
//    position: 'absolute',
//    top: 115,
//    left: 6
//});
//var ctrl_input = $('<input class="sqc_input" type="text">').val("R6.00").prop("disabled", true);
//ctrl_input.css({
//    position: 'absolute',
//    top: -3,
//    left: 57
//});
//sqc_ctrl.append(ctrl_title);
//sqc_ctrl.append(ctrl_input);
//$("#plc_sqc").append(sqc_ctrl);

//length inputs
var bsl_length = $('<div></div>'); //the input field of the counter PRESET
var length_title = $('<div>length:</div>');
bsl_length.css({
    position: 'absolute',
    top: 115,
    left: 6
});
var length_input = $('<input class="sqc_input" type="text">').val("8").prop("disabled", true);
length_input.css({
    position: 'absolute',
    top: -3,
    left: 57
});
bsl_length.append(length_title);
bsl_length.append(length_input);
$("#plc_bsl").append(bsl_length);

////Position inputs
//var sqc_position = $('<div></div>'); //the input field of the counter PRESET
//var position_title = $('<div>Position:</div>');
//sqc_position.css({
//    position: 'absolute',
//    top: 165,
//    left: 6
//});
//var position_input = $('<input class="sqc_input" type="text">').val("0");
//position_input.css({
//    position: 'absolute',
//    top: -3,
//    left: 57
//});
//sqc_position.append(position_title);
//sqc_position.append(position_input);
//$("#plc_sqc").append(sqc_position);

//for all the status bits---------------------
//for EN bit
var EN_dash = $('<div></div>'); //EN's dash
EN_dash.css({
    border: 0,
    "background-color": "black",
    width: 30,
    height: 2,
    position: 'absolute',
    top: 14,
    left: 138
});
$("#plc_bsl").append(EN_dash);

var EN_drag = $('<div align="center" class="timer_drag_EN">EN</div>'); //EN's draggable item
EN_drag.css({
    border: "2px solid black",
    "border-radius": "8px",
    "background-color": "#ecf0f1",
    width: 35,
    height: 20,
    position: "absolute",
    top: 5,
    left: 155
});
$("#plc_bsl").append(EN_drag);
//for DN bit
var DN_dash = $('<div></div>'); //EN's dash
DN_dash.css({
    border: 0,
    "background-color": "black",
    width: 30,
    height: 2,
    position: 'absolute',
    top: 40,
    left: 138
});
$("#plc_bsl").append(DN_dash);

var DN_drag = $('<div align="center" class="timer_drag_EN">DN</div>'); //EN's draggable item
DN_drag.css({
    border: "2px solid black",
    "border-radius": "8px",
    "background-color": "#ecf0f1",
    width: 35,
    height: 20,
    position: "absolute",
    top: 31,
    left: 155
});
$("#plc_bsl").append(DN_drag);
//for FD bit
//var FD_dash = $('<div></div>'); //EN's dash
//FD_dash.css({
//    border: 0,
//    "background-color": "black",
//    width: 30,
//    height: 2,
//    position: 'absolute',
//    top: 66,
//    left: 140
//});
//$("#plc_bsl").append(FD_dash);

//var FD_drag = $('<div align="center" class="timer_drag_EN">FD</div>'); //EN's draggable item
//FD_drag.css({
//    border: "2px solid black",
//    "border-radius": "8px",
//    "background-color": "#ecf0f1",
//    width: 35,
//    height: 20,
//    position: "absolute",
//    top: 57,
//    left: 155
//});
//$("#plc_bsl").append(FD_drag);

//output table
//var output_data_title = $("<tr></tr>");
//var space_title = $("<th>O0</th>");
//output_data_title.append(space_title);
//for(var i=0; i<6; i++){
//    var td_element = $("<th></th>");
//    td_element.html(i.toString());
//
//    output_data_title.append(td_element);
//}
//var light_1_title = $("<th></th>");
//light_1_title.html("LT1");
//output_data_title.append(light_1_title);
//
//var light_2_title = $("<th></th>");
//light_2_title.html("LT2");
//output_data_title.append(light_2_title);
//$("#mod7_sec2_output").append(output_data_title);
//
//var tr_element = $("<tr id='output_row'></tr>");
//var td_first = $("<th>.01</th>");
//tr_element.append(td_first);
//for(var i=0; i<8; i++){
//    var td_element = $("<td></td>").css({padding: 0});
//
//    var td_input = $("<input class='mod7_input' min='0' max='1' type='number'>").css({width: 58, border: 0}).prop("disabled", true);
//    td_input.val(0);
//    td_element.append(td_input);
//    tr_element.append(td_element);
//}
//$("#mod7_sec2_output").append(tr_element);
//
////Mask table
//var output_data_title = $("<tr></tr>");
//var space_title = $("<th></th>");
//output_data_title.append(space_title);
//for(var i=0; i<8; i++){
//    var td_element = $("<th></th>");
//    td_element.html(i.toString());
//
//    output_data_title.append(td_element);
//}
////var button_title = $("<th></th>");
////button_title.html("BT1");
////output_data_title.append(button_title);
//$("#mod7_sec2_mask").append(output_data_title);
//
//var tr_element = $("<tr id='mask_row'></tr>");
//var td_first = $("<th></th>");
//tr_element.append(td_first);
//for(var i=0; i<8; i++){
//    var td_element = $("<td></td>").css({padding: 0});
//
//    var td_input = $("<input class='mod7_input' min='0' max='1' type='number'>").css({width: 58, border: 0}).prop("disabled", true);
//    td_input.val(mask_table[i]);
//    td_element.append(td_input);
//    tr_element.append(td_element);
//}
//$("#mod7_sec2_mask").append(tr_element);

//Binary table
var output_data_title = $("<tr></tr>");
var space_title = $("<th>B3</th>");
output_data_title.append(space_title);
for(var i=0; i<8; i++){
    var td_element = $("<th></th>");
    td_element.html((7 - i).toString());

    output_data_title.append(td_element);
}
//var button_title = $("<th></th>");
//button_title.html("BT1");
//output_data_title.append(button_title);
$("#mod7_sec4_binary").append(output_data_title);

$("#sensor_val").html(sensor_data);

for(var k=0; k<1; k++) {
    var tr_element = $("<tr id='binary_row'></tr>");
    var y_str = ".0"+ k.toString();
    var td_first = $("<th></th>").html(y_str);
    tr_element.append(td_first);
    for (var i = 0; i < 8; i++) {
        var td_element = $("<td></td>").css({padding: 0});

        //var td_input = $("<select><option value='0'>0</option><option value='1'>1</option></select>").css({
        var td_input = $('<input>').css({
            width: 58,
            border: 0,
            "background-color": "#ecf0f1",
            "font-weight": "bold"
        }).prop("disabled", true);
        td_input.data("index_1", i);

        //td_input.data("index_2", i);
        //select inputs change event
        //td_input.change(
        //    function(){
        //        var new_value = $(this).val();
        //        var index_1 = $(this).data("index_1");
        //        //var index_2 = $(this).data("index_2");
        //        binary_table[index_1] = parseInt(new_value);
        //
        //    }
        //);
        //td_input.selectmenu();
        td_input.val(binary_table[i]);
        td_element.append(td_input);
        if(i==0){
            td_element.css({
                "border": "3px solid green"
            });
        }
        tr_element.append(td_element);
    }
    $("#mod7_sec4_binary").append(tr_element);
}

//-------------simulation space

$("#mod7_sec4_button_1").button().click(
    function(){
        var rand_int;
        //var rand_int = Math.round(Math.random());
        count_index += 1;
        if(count_index == 8){
            rand_int = 0;
            count_index = 0;
        }
        else{
            rand_int = 1;
        }

        //var rand_int = 1;

        for(var i=6; i>=0; i--){
            binary_table[i+1] = binary_table[i];
        }

        binary_table[0] = rand_int;

        $("#sensor_val").html(rand_int);

        sensor_data = rand_int;

        refresh_binary_table();
        refresh_background_img();
    }
);
//    function(){
//        switch (stage_steps){
//            case 0:
//                for(var i=0; i<8; i++){
//                    out_table[i] = binary_table[0][i] & mask_table[i];
//                    $("#arrow_right").css({
//                        top: 280
//                    })
//                }
//                break;
//            case 1:
//                for(var i=0; i<8; i++){
//                    out_table[i] = binary_table[1][i] & mask_table[i];
//                    $("#arrow_right").css({
//                        top: 303
//                    })
//                }
//                break;
//            case 2:
//                for(var i=0; i<8; i++){
//                    out_table[i] = binary_table[2][i] & mask_table[i];
//                    $("#arrow_right").css({
//                        top: 326
//                    })
//                }
//                break;
//            case 3:
//                for(var i=0; i<8; i++){
//                    out_table[i] = binary_table[3][i] & mask_table[i];
//                    $("#arrow_right").css({
//                        top: 260
//                    })
//                }
//                break;
//            default:
//                break;
//        }
//
//        stage_steps = stage_steps + 1;
//
//        if(stage_steps>3){
//            stage_steps = 0;
//        }
//
//        //check for light 1 condition
//        if(out_table[6] == 1){
//            $("#red_light").attr("src","/public/assets/img/module7/light_bulb_red.png");
//        }
//        else{
//            $("#red_light").attr("src","/public/assets/img/module7/light_bulb_white.png");
//        }
//        //check for light 2 condition
//        if(out_table[7] == 1){
//            $("#yellow_light").attr("src","/public/assets/img/module7/light_bulb_yellow.png");
//        }
//        else{
//            $("#yellow_light").attr("src","/public/assets/img/module7/light_bulb_white.png");
//        }
//        refresh_output_table();
//    }
//);
//
//function refresh_output_table(){
//    var input_list = $("#output_row").find("input");
//
//    for(var i=0; i<8; i++){
//        $(input_list[i]).val(out_table[i]);
//        if(out_table[i]==1){
//            $(input_list[i]).css({
//                "background-color": "#2ecc71"
//            })
//        }
//        else{
//            $(input_list[i]).css({
//                "background-color": "#ebebe4"
//            })
//        }
//    }
//}
//
function refresh_binary_table(){
    var input_list = $("#binary_row").find("input");

    for(var i=0; i<8; i++){
        $(input_list[i]).val(binary_table[i]);
        //if(mask_table[i]==1){
        //    $(input_list[i]).css({
        //        "background-color": "#2ecc71"
        //    })
        //}
        //else{
        //    $(input_list[i]).css({
        //        "background-color": "#ebebe4"
        //    })
        //}
    }
}

function refresh_background_img(){
    var bottle_img = $("#bottle_exp").find("img");
    var img_index = binary_table.indexOf(0);
    switch (img_index) {
        case 0:
            bottle_img.attr("src", "/public/assets/img/module7/bottle_exp/bottle_line_1.png");
            break;
        case 1:
            bottle_img.attr("src", "/public/assets/img/module7/bottle_exp/bottle_line_2.png");
            break;
        case 2:
            bottle_img.attr("src", "/public/assets/img/module7/bottle_exp/bottle_line_3.png");
            break;
        case 3:
            bottle_img.attr("src", "/public/assets/img/module7/bottle_exp/bottle_line_4.png");
            break;
        case 4:
            bottle_img.attr("src", "/public/assets/img/module7/bottle_exp/bottle_line_5.png");
            break;
        case 5:
            bottle_img.attr("src", "/public/assets/img/module7/bottle_exp/bottle_line_6.png");
            break;
        case 6:
            bottle_img.attr("src", "/public/assets/img/module7/bottle_exp/bottle_line_animation.gif");
            setTimeout(function() {
                bottle_img.attr('src',"/public/assets/img/module7/bottle_exp/bottle_line_7.png");
            },1000);
            // bottle_img.attr("src", "/public/assets/img/module7/bottle_exp/bottle_line_7.png");
            break;
        case 7:
            bottle_img.attr("src", "/public/assets/img/module7/bottle_exp/bottle_line_8.png");
            break;
        default:
            break;
    }
}
//
//function get_value_from_hex(value){
//    var hex_str = value;
//    if(hex_str.length>3){
//        alert("mask length limited to TWO byte");
//        return 0;
//    }
//    if((hex_str[2]!="h"&& hex_str[2]!="H") || hex_allow.indexOf(hex_str[0])<0 || hex_allow.indexOf(hex_str[1])<0 ){
//        alert("input is not a valid Hex number, some examples are 0Fh, 5Eh.");
//        return 0;
//    }
//    var formated_hex = "0x"+hex_str.substr(0,2);
//
//    return parseInt(formated_hex);
//}
//
//
//



