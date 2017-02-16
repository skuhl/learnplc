/**
 * Created by Bochao on 7/25/2014.
 */
function verify_m4_ex(){
    $("#simulate").trigger("click");
    $("#exp_sim").trigger("click");
    var test_case_dialog = $("<div></div>");
    test_case_dialog.dialog({
        title: "Ladder Logic Test",
        width: "300",
        height: "300",
        modal: true,
        resizable: false,
        autoOpen: true,
//        closeOnEscape: false,
//        dialogClass: "noclose",
        position: {
            my: "center center",
            at: "center center",
            of: window
        },
        close: function(event, ui){
//            $("#continue").show();
            $("#fold_sim").trigger("click");
            $(this).remove();
        }
    });

    var test_welcome = $("<p>Testing your Ladder Logic: </p>");
    test_case_dialog.append(test_welcome);

    //----------------------Need to customize for each question-----------------------
    var answer_flag = 1;
    var depth = 0;
    var length = LDL_answer.length;
    answer_flag = m4_ex_case(answer_flag, test_case_dialog, depth, length, LDL_answer[depth]);
}

function m4_ex_case(flag, dialog, depth, length, row){
    if(depth < length) {
        if(row[0]==1) {
            click_switch(1);
        }
        setTimeout(function () {
            if(row[1]==1) {
                click_switch(2);
            }
            setTimeout(function () {
                var answer = scenario_outputs[output_pool[0]].outputs[0];

                var test_case = $("<p></p>");
                test_case.css({color: "red"});
                var result_text = "failed to accomplish";
                if (answer == row[2]) {
                    result_text = "pass";
                    test_case.css({color: "green"});
                }
                else {
                    flag = 0;
                    wrong_pool.push(depth);
                }

                test_case.html("Test case " + (depth+1) + ": " + result_text);
                dialog.append(test_case);

                reset_scene();
                deactivate_all();
                P_list(aaa);

                depth += 1;
                m4_ex_case(flag, dialog, depth, length, LDL_answer[depth])
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

        dialog.dialog("moveToTop");

        submit_post(flag);

        return flag;
    }
}

function m4_ex_truth_table(){
    var tr_dialog = $("<div></div>");
    tr_dialog.dialog({
        title: "Ladder Logic Test",
        width: "auto",
        height: "auto",
        modal: true,
        resizable: false,
//        closeOnEscape: false,
//        dialogClass: "noclose",
        position: {
            my: "center center",
            at: "center center",
            of: window
        },
        close: function(event, ui){
            $(this).remove();
        }
    });

    var tr_table = $("<table></table>");
    tr_table.addClass("truth_table");
    tr_table.css({
        "border-collapse":"collapse"
    });

    tr_dialog.append(tr_table);

    var tr_header = $("<tr></tr>");
    for(var i=0; i<input_pool.length; i++){
        var tr_input = $("<th></th>").css({padding:8});
        tr_input.html("Switch "+(i+1));
        tr_header.append(tr_input);
    }
    for(var i=0; i<output_pool.length; i++){
        var tr_output = $("<th></th>").css({padding:8});
        tr_output.html("Light "+(i+1));
        tr_header.append(tr_output);
    }
    tr_table.append(tr_header);

    // read truth table
    for(var i=0; i<LDL_answer.length; i++){
        var tr_row = $("<tr></tr>");
        for (var j=0; j< LDL_answer[i].length; j++){
            var tr_value = $("<td></td>").css({padding:8});
            if(wrong_pool.indexOf(i) > -1){
                tr_value.css({color: "red"});
            }
            tr_value.html(LDL_answer[i][j]);
            tr_row.append(tr_value);
        }
        tr_table.append(tr_row);
    }


}