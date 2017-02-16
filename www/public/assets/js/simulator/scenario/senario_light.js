/* this file contains the basic senario for light and switch */

function light_test(LDLgp){

    my_matrix = new AJmatrix(LDLgp);
    my_list = new P_list(LDLgp);

    var N_ctr_ele = LDLgp.element_N;
    var light_dialog = $("<div></div>");
    light_dialog.dialog({
        close: function( event, ui ) {clearInterval(myVar);loop_counter = 0;},
        height: 400
    });
    light_dialog.html("<p>control each switch to play with the lights</p>");

    var button_list = [];
    var light_list = [];

    var button_html = $("<div></div>");
    var light_html = $("<div></div>");

    var buttonID = 1;
    var lightID = 1;

    for(var i=1; i<N_ctr_ele+1; i++){
        if(my_list.Node_List[i].type != 3 && my_list.Node_List[i].type < 20){
            button_list.push(i);
            var mybutton = $("<button></button>");
            mybutton.attr("data-ID",buttonID);
            mybutton.attr("data-index",i);
            mybutton.html("button "+buttonID+"is: "+my_list.Node_List[i].oc);
            mybutton.click(function(){
                my_list.Node_List[this.getAttribute("data-index")].toggle();
                $(this).html("button"+this.getAttribute("data-ID")+"is: "+my_list.Node_List[this.getAttribute("data-index")].oc);
            });
            buttonID = buttonID + 1;
            button_html.append(mybutton);
        }
        else if(my_list.Node_List[i].type < 20){
            var mylight = $("<p></p>");
            mylight.attr("data-ID", lightID);
            mylight.attr("data-index", i);
            mylight.html("light "+lightID);
            light_list.push(mylight);
            light_html.append(mylight);
            lightID = lightID + 1;
        }
    }
    light_dialog.append(button_html);
    light_dialog.append(light_html);

    var counter = $("<div>cycle is:</div>");
    light_dialog.append(counter);

    var myVar = setInterval(function(){main_cycle(light_list, counter);},10);
}

function main_cycle(light_list, counter, number){
    reset_states(my_list.Node_List);
    iteration(my_matrix.elematrix, my_list.Node_List, 0);
    for(var i=0; i<light_list.length; i++){
        if(my_list.Node_List[light_list[i].attr("data-index")].state==1){
            light_list[i].html("light "+light_list[i].attr("data-ID")+ "is: <b>ON</b>");
        }
        else{
            light_list[i].html("light "+light_list[i].attr("data-ID")+ "is: <b>OFF</b>");
        }
    }
    counter.html("It is the " + loop_counter + "'s loop");
    loop_counter = loop_counter + 1;
}

function reset_states(list){
    var List_length = list.length;
    for(var i =1; i<List_length; i++){
        list[i].state = 0;
    }
}