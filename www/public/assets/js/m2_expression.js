/**
 * Created by Bochao on 8/12/2014.
 */

//var truth_table = [];

var result_expression = [];
//truth_table = table_2;

$("#input_A").click(
    function(){
        var string_input = $("#expression_result").val();
        var index = $("#expression_result").caret();
        string_input = [string_input.slice(0, index), "A", string_input.slice(index)].join('');
        $("#expression_result").val(string_input);
        $("#expression_result").caret(index+1);
    }
);

$("#input_B").click(
    function(){
        var string_input = $("#expression_result").val();
        var index = $("#expression_result").caret();
        string_input = [string_input.slice(0, index), "B", string_input.slice(index)].join('');
        $("#expression_result").val(string_input);
        $("#expression_result").caret(index+1);
    }
);

$("#input_C").click(
    function(){
        var string_input = $("#expression_result").val();
        var index = $("#expression_result").caret();
        string_input = [string_input.slice(0, index), "C", string_input.slice(index)].join('');
        $("#expression_result").val(string_input);
        $("#expression_result").caret(index+1);
    }
);

$("#input_D").click(
    function(){
        var string_input = $("#expression_result").val();
        var index = $("#expression_result").caret();
        string_input = [string_input.slice(0, index), "D", string_input.slice(index)].join('');
        $("#expression_result").val(string_input);
        $("#expression_result").caret(index+1);
    }
);

$("#left_parenth").click(
    function(){
        var string_input = $("#expression_result").val();
        var index = $("#expression_result").caret();
        string_input = [string_input.slice(0, index), "(", string_input.slice(index)].join('');
        $("#expression_result").val(string_input);
        $("#expression_result").caret(index+1);
    }
);

$("#right_parenth").click(
    function() {
        var string_input = $("#expression_result").val();
        var index = $("#expression_result").caret();
        string_input = [string_input.slice(0, index), ")", string_input.slice(index)].join('');
        $("#expression_result").val(string_input);
        $("#expression_result").caret(index+1);
    }
);

$("#input_and").click(
    function(){
        var string_input = $("#expression_result").val();
        var index = $("#expression_result").caret();
        string_input = [string_input.slice(0, index), "*", string_input.slice(index)].join('');
        $("#expression_result").val(string_input);
        $("#expression_result").caret(index+1);
    }
);

$("#input_or").click(
    function(){
        var string_input = $("#expression_result").val();
        var index = $("#expression_result").caret();
        string_input = [string_input.slice(0, index), "+", string_input.slice(index)].join('');
        $("#expression_result").val(string_input);
        $("#expression_result").caret(index+1);
    }
);

$("#input_not").click(
    function(){
        var string_input = $("#expression_result").val();
        var index = $("#expression_result").caret();
        string_input = [string_input.slice(0, index), "!", string_input.slice(index)].join('');
        $("#expression_result").val(string_input);
        $("#expression_result").caret(index+1);
    }
);

$("#input_xor").click(
    function(){
        var string_input = $("#expression_result").val();
        var index = $("#expression_result").caret();
        string_input = [string_input.slice(0, index), "^", string_input.slice(index)].join('');
        $("#expression_result").val(string_input);
        $("#expression_result").caret(index+1);
    }
);

$("#input_backspace").click(
    function(){
        var input = $("#expression_result");
        var str = input.val();
        var index = input.caret();
        if(index != 0) {
            str = [str.slice(0, index-1), str.slice(index)].join('');
            input.val(str);
            input.caret(index-1);
        } else {
            input.caret(index);
        }
    }
);

$("#input_clear").click(
    function(){
        $("#expression_result").val("");
    }
);

//$("#expression_result").bind("keydown keypress", function() {
//    alert("Current position: " + $(this).caret());
//});

function get_expression(exp_string){
    var result_exp = exp_string;

    result_exp = result_exp.replace(/A/gi, "input_list[0]");
    result_exp = result_exp.replace(/B/gi, "input_list[1]");
    result_exp = result_exp.replace(/C/gi, "input_list[2]");
    result_exp = result_exp.replace(/D/gi, "input_list[3]");

    result_exp = result_exp.replace(/\*/gi, "&&");
    result_exp = result_exp.replace(/\+/gi, "||");

    return result_exp;
}

//function read_letter(exp_string, r_index, array_index, target_array){
//    if(r_index<exp_string.length) {
//        var r_letter = exp_string.charAt(r_index);
//        var a_index = array_index;
//
//        switch (r_letter) {
//            case "A":
//                target_array[a_index] = "A";
//                break;
//            case "B":
//                target_array[a_index] = "B";
//                break;
//            case "C":
//                target_array[a_index] = "C";
//                break;
//            case "D":
//                target_array[a_index] = "D";
//                break;
//            default:
//                alert("invalid input form");
//                break;
//        }
//        a_index = a_index + 1;
//        read_operator(exp_string, r_index+1, a_index, target_array);
//    }
//    else{
//        // do nothing
//    }
//}
//
//function read_operator(){
//
//}

$("#verify_button").click(
    function(){
        var target_string = $("#expression_result").val();
//        var format_flag = check_format(target_string);
//        if(format_flag == 1) {
    var result = verify_expression(target_string);
    $("#result_state").html("Result: " + result);
//        }
//        else if(format_flag == 0){
//            // anything if the answer is wrong;
//        }
}
);

function verify_expression(r_string){

    var table_length = Math.pow(2,table_n);

    var flag = "Your answer is correct.";
    var input_list = [];

    for(var i=0; i<table_n; i++){
        input_list[i] = 0;
    }
//    input_list[0] = 0;
//    input_list[1] = 0;
//    input_list[2] = 0;
//    input_list[3] = 0;

var target_string = get_expression(r_string);
try{
    eval(target_string);
} catch(e){
    return "Invalid expression.";
}

var int_loop = 0;
for(var i=0; i<table_length; i++){
    var bin_loop = int_loop.toString(2);
    var loop_n = table_n - bin_loop.length;
    for(var k=0; k<loop_n; k++){
        bin_loop = "0" + bin_loop;
    }

    for(var j=0; j<table_n; j++){
        input_list[j] = parseInt(bin_loop.charAt(j));
    }
    int_loop +=1;

    if(eval(target_string)!=eval(table_exp)){
        flag = "Your answer is incorrect.";
        $('#answer').val(0);
        return flag;
    }
}

$('#answer').val(1);
return flag;
}

//function check_format(result_string){
//    var target_string = get_expression(result_string);
//    try{
//        eval(target_string);
//        return 1;
//    } catch(e){
//        alert("invalid input type.");
//        return 0;
//    }
//}