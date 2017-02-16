/**
 * Created by Bochao on 7/20/2014.
 */
// for checking the AND gate test case
function m4_ex5_NAND() {


    input_pool = [0, 1];
    output_pool = [1];
    wrong_pool = [];

    var row_1 = [1, 1, 0];
    var row_2 = [1, 0, 1];
    var row_3 = [0, 1, 1];
    var row_4 = [0, 0, 1];

    LDL_answer = [row_1, row_2, row_3, row_4];

    verify_m4_ex();

//    $("#simulate").trigger("click");
//    var test_case_dialog = $("<div></div>");
//    test_case_dialog.dialog({
//        title: "Ladder Logic Test",
//        width: "300",
//        height: "500",
//        modal: true,
//        resizable: false,
////        closeOnEscape: false,
////        dialogClass: "noclose",
//        position: {
//            my: "center center",
//            at: "center center",
//            of: window
//        }
//    });
//    var test_welcome = $("<p>Testing your Ladder Logic: </p>");
//    test_case_dialog.append(test_welcome);
//
//    //----------------------Need to customize for each question-----------------------
//    var answer_flag = 1;
//    var depth = 0;
//    var length = LDL_answer.length;
//    answer_flag = m4_ex5_case(answer_flag, test_case_dialog, depth, length, LDL_answer[depth]);



}

function m4_ex5_case(flag, dialog, depth, length, row){
    if(depth < length) {
        if(row[0]==1) {
            click_switch(1);
        }
        setTimeout(function () {
            if(row[1]==1) {
                click_switch(2);
            }
            setTimeout(function () {
                var answer = scenario_outputs[1].outputs[0];

                var test_case = $("<p></p>");
                test_case.css({color: "red"});
                var result_text = "failed to accomplish";
                if (answer == row[2]) {
                    result_text = "pass";
                    test_case.css({color: "green"});
                }
                else {
                    flag = 0;
                }

                test_case.html("Test case " + (depth+1) + ": " + result_text);
                dialog.append(test_case);

                reset_scene();
                deactivate_all();
                P_list(aaa);

                depth += 1;
                m4_ex5_case(flag, dialog, depth, length, LDL_answer[depth])
            }, 500);
        }, 500);
    }
    else{

        $("#stop_sim").trigger("click");

        var conclusion = $("<p></p>");
        if(flag==1){
            conclusion.html("Congratulations, correct answer");
            conclusion.css({color: "green"});
        }
        else{
            conclusion.html("Sorry, incorrect answer");
            conclusion.css({color: "red"});
        }
        dialog.append(conclusion);

        var show_tt = $("<button>Test cases</button>");
        show_tt.button().click(
            function(){
                m4_ex_truth_table();
            }
        );
        dialog.append(show_tt);

        dialog.dialog("close").dialog("open");
        return flag;
    }
}



