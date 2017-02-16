function Data_tablet(){
    this.O0 = []; // output
    this.I1 = []; // input
    this.S2 = []; // status
    this.B3 = []; // binary
    this.T4 = []; // timer
    this.C5 = []; // counter
    this.R6 = []; // control
    this.N7 = []; // integer
    this.F8 = []; // float

    this.length = 100;//maximum number of elements in each data array

    for (var i=0; i<this.length; i++){
        this.N7[i] = 0;
        this.F8[i] = 0;
        this.B3[i] = 0;
    }
}

function show_datatable(){
    var data_tab_matrix = $("<div></div>");
    data_tab_matrix.dialog({
        width: 780,
        height: 415,
        close: function(event, ui){
            $(this).dialog('destroy').remove();
        }
    });

    var data_tab = $("<div></div>");
    var tab_list = $("<ul></ul>");

    //title
    var tab_1 = $("<li><a href='#tabs-1'>OUTPUT/<b>O0</b></a></li>");
    tab_list.append(tab_1);
    var tab_2 = $("<li><a href='#tabs-2'>INPUT/<b>I1</b></a></li>");
    tab_list.append(tab_2);
    var tab_3 = $("<li><a href='#tabs-3'>STATUS/<b>S2</b></a></li>");
    tab_list.append(tab_3);
    var tab_4 = $("<li><a href='#tabs-4'>BINARY/<b>B3</b></a></li>");
    tab_list.append(tab_4);
    var tab_5 = $("<li><a href='#tabs-5'>TIMER/<b>T4</b></a></li>");
    tab_list.append(tab_5);
    var tab_6 = $("<li><a href='#tabs-6'>COUNTER/<b>C5</b></a></li>");
    tab_list.append(tab_6);
    var tab_7 = $("<li><a href='#tabs-7'>CONTROL/<b>R6</b></a></li>");
    tab_list.append(tab_7);
    var tab_8 = $("<li><a href='#tabs-8'>INTEGER/<b>N7</b></a></li>");
    tab_list.append(tab_8);
    var tab_9 = $("<li><a href='#tabs-9'>FLOAT/<b>F8</b></a></li>");
    tab_list.append(tab_9);
    data_tab.append(tab_list);

    //contents
    var content_1 = $("<div id='tabs-1'></div>");
    IO_matrix_to_tab(content_1, sim_data_table.O0, "O0");
    data_tab.append(content_1);

    var content_2 = $("<div id='tabs-2'></div>");
    IO_matrix_to_tab(content_2, sim_data_table.I1, "I1");
    data_tab.append(content_2);

    var content_3 = $("<div id='tabs-3'></div>");
    //add_matrix_to_tab(content_3, sim_data_table.S2);
    data_tab.append(content_3);

    var content_4 = $("<div id='tabs-4'></div>");
    binary_matrix_to_tab(content_4, sim_data_table.B3, "B3");
    data_tab.append(content_4);

    var content_5 = $("<div id='tabs-5'></div>");
    timer_matrix_to_tab(content_5, sim_data_table.T4, "T4");
    data_tab.append(content_5);

    var content_6 = $("<div id='tabs-6'></div>");
    counter_matrix_to_tab(content_6, sim_data_table.C5, "C5");
    data_tab.append(content_6);

    var content_7 = $("<div id='tabs-7'></div>");
    //add_matrix_to_tab(content_7, sim_data_table.R6);
    data_tab.append(content_7);

    var content_8 = $("<div id='tabs-8'></div>");
    int_float_matrix_to_tab(content_8, sim_data_table.N7, "N7");
    data_tab.append(content_8);

    var content_9 = $("<div id='tabs-9'></div>");
    int_float_matrix_to_tab(content_9, sim_data_table.F8, "F8");
    data_tab.append(content_9);

    data_tab.tabs().addClass( "ui-tabs-vertical ui-helper-clearfix").css({
        width: 700
    });
    data_tab.find("li").removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
    //data_tab.tabs();
    data_tab_matrix.append(data_tab);

    var data_edit_button = $("<button>EDIT</button>").button().click(
        function(){
            $(".data-input-field").prop("disabled", false);
        }
    ).css({
            height:25,
            width: 110,
            position: "absolute",
            top: 320,
            left: 20,
            font: 'small "Trebuchet MS", sans-serif'
        }).appendTo(data_tab_matrix);

    var data_submit_button = $("<button>DONE</button>").button().click(
        function(){
            $(".data-input-field").prop("disabled", true);
        }
    ).css({
            height:25,
            width: 110,
            position: "absolute",
            top: 350,
            left: 20,
            font: 'small "Trebuchet MS", sans-serif'
        }).appendTo(data_tab_matrix);
}

function IO_matrix_to_tab(container, io_array, type){
    var tab_matrix = $("<table class='data_matrix'></table>");
    tab_matrix.css({
        "border-collapse":"collapse"
    });

    var tr_title = $("<tr></tr>").css({padding:8});
    for(var i=7; i>=0; i--) {
        var td_element = $("<th></th>").css({padding: 8});
        td_element.html(io_array[i].name);

        tr_title.append(td_element);
    }
    tab_matrix.append(tr_title);

    var tr_element = $("<tr></tr>").css({padding:8});
    for(var i=7; i>=0; i--){
        var td_element = $("<td></td>").css({padding:0});
        var td_input = $("<input class='data-input-field' min='0' max='1' type='number'>").css({width: 58, border: 0}).prop("disabled", true);
        td_input.data("index_1", type);
        td_input.data("index_2", i);

        //change input value stored in data_table
        td_input.change(
            function(){
                var new_value = $(this).val();
                if(new_value > 0){
                    new_value = 1;
                }
                var index_1 = $(this).data("index_1");
                var index_2 = $(this).data("index_2");

                sim_data_table[index_1][index_2].value = new_value;
                $(this).val(new_value);
            }
        );
        td_input.val(io_array[i].value);
        td_element.append(td_input);


        //if(io_array[i]!=null){
        //    td_element.html(io_array[i].value);
        //}
        //else{
        //    td_element.html("Empty");
        //}
        //td_element.html(io_array[i].value);

        tr_element.append(td_element);
    }
    tab_matrix.append(tr_element);

    container.append(tab_matrix);
}

function binary_matrix_to_tab(container, io_array, type){
    var tab_matrix = $("<table class='data_matrix'></table>");
    tab_matrix.css({
        "border-collapse":"collapse"
    });
    var tr_title = $("<tr></tr>").css({padding:8});
    var space_title = $("<th></th>");
    tr_title.append(space_title);
    for(var i=7; i>=0; i--) {
        var td_element = $("<th></th>").css({padding: 8});
        td_element.html(i.toString());

        tr_title.append(td_element);
    }
    tab_matrix.append(tr_title);

    for(var k=0; k<io_array.length; k++) {
        var tr_element = $("<tr></tr>").css({padding: 8});
        var td_id = $("<th></th>").css({"padding-right": 10, "padding-left": 10, "padding-top": 2, "padding-bottom": 2});
        td_id.html(append_2_bit_int(k));
        tr_element.append(td_id);
        var binary_8_value = get_binary_8_bit(io_array[k]);
        for (var i=0; i<8; i++) {
            var td_element = $("<td></td>").css({padding: 0});

            var td_input = $("<input class='data-input-field' min='0' max='1' type='number'>").css({width: 58, border: 0}).prop("disabled", true);
            td_input.val(binary_8_value[i]);
            td_element.append(td_input);
            //if(io_array[i]!=null){
            //    td_element.html(io_array[i].value);
            //}
            //else{
            //    td_element.html("Empty");
            //}
            //td_element.html(binary_8_value[i]);

            tr_element.append(td_element);
        }
        tab_matrix.append(tr_element);
    }

    container.append(tab_matrix);
}

function timer_matrix_to_tab(container, io_array, type){
    var tab_matrix = $("<table class='data_matrix'></table>");
    tab_matrix.css({
        "border-collapse":"collapse"
    });
    // For all the bit titles
    var tr_title = $("<tr></tr>").css({padding:8});
    var space_title = $("<th></th>");
    tr_title.append(space_title);
    tr_title.append($("<td>.EN</td>").css({padding: 0}));
    tr_title.append($("<td>.TT</td>").css({padding: 0}));
    tr_title.append($("<td>.DN</td>").css({padding: 0}));
    tr_title.append($("<td>.PRE</td>").css({padding: 0}));
    tr_title.append($("<td>.ACC</td>").css({padding: 0}));

    tab_matrix.append(tr_title);

    container.append(tab_matrix);

    //To write all the Timer information into the table
    for(var i=0; i<sim_data_table.T4.length; i++){
        var tr_element = $("<tr></tr>").css({padding: 8});
        // for the timer name
        var td_id = $("<th></th>").css({"padding-right": 10, "padding-left": 10, "padding-top": 2, "padding-bottom": 2});
        var new_td_name = get_int_from_str(sim_data_table.T4[i].name).toString();
        var new_name_type = sim_data_table.T4[i].name.substr(0, 3);
        new_td_name = "." + new_name_type + new_td_name;
        td_id.html(new_td_name);
        tr_element.append(td_id);
        // for the EN bit
        var td_element = $("<td></td>").css({padding: 0});
        td_element.html(sim_data_table.T4[i].EN_bit);
        tr_element.append(td_element);
        // for the TT bit
        var td_element = $("<td></td>").css({padding: 0});
        td_element.html(sim_data_table.T4[i].TT_bit);
        tr_element.append(td_element);
        // for the DN bit
        var td_element = $("<td></td>").css({padding: 0});
        td_element.html(sim_data_table.T4[i].DN_bit);
        tr_element.append(td_element);
        // for the preset value
        var td_element = $("<td></td>").css({padding: 0});
        var preset_val = sim_data_table.T4[i].preset/1000;
        td_element.html(preset_val);
        tr_element.append(td_element);
        // for the accum value
        var td_element = $("<td></td>").css({padding: 0});
        var accum_val = sim_data_table.T4[i].accum/1000;
        td_element.html(accum_val);
        tr_element.append(td_element);

        tab_matrix.append(tr_element);
    }
}

function counter_matrix_to_tab(container, io_array, type){ // the counter function is similar to Timer function thus the comments are left out
    var tab_matrix = $("<table class='data_matrix'></table>");
    tab_matrix.css({
        "border-collapse":"collapse"
    });
    // For all the bit titles
    var tr_title = $("<tr></tr>").css({padding:8});
    var space_title = $("<th></th>");
    tr_title.append(space_title);
    tr_title.append($("<td>.EN</td>").css({padding: 0}));
    //tr_title.append($("<td>.TT</td>").css({padding: 0}));
    tr_title.append($("<td>.DN</td>").css({padding: 0}));
    tr_title.append($("<td>.PRE</td>").css({padding: 0}));
    tr_title.append($("<td>.ACC</td>").css({padding: 0}));

    tab_matrix.append(tr_title);

    container.append(tab_matrix);

    //To write all the Timer information into the table
    for(var i=0; i<sim_data_table.C5.length; i++){
        var tr_element = $("<tr></tr>").css({padding: 8});
        // for the timer name
        var td_id = $("<th></th>").css({"padding-right": 10, "padding-left": 10, "padding-top": 2, "padding-bottom": 2});
        var new_td_name = get_int_from_str(sim_data_table.C5[i].name).toString();
        var new_name_type = sim_data_table.C5[i].name.substr(0, 3);
        new_td_name = "." + new_name_type + new_td_name;
        td_id.html(new_td_name);
        tr_element.append(td_id);
        // for the EN bit
        var td_element = $("<td></td>").css({padding: 0});
        td_element.html(sim_data_table.C5[i].EN_bit);
        tr_element.append(td_element);
        //// for the TT bit
        //var td_element = $("<td></td>").css({padding: 0});
        //td_element.html(sim_data_table.C5[i].TT_bit);
        //tr_element.append(td_element);
        // for the DN bit
        var td_element = $("<td></td>").css({padding: 0});
        td_element.html(sim_data_table.C5[i].DN_bit);
        tr_element.append(td_element);
        // for the preset value
        var td_element = $("<td></td>").css({padding: 0});
        var preset_val = sim_data_table.C5[i].preset/1000;
        td_element.html(preset_val);
        tr_element.append(td_element);
        // for the accum value
        var td_element = $("<td></td>").css({padding: 0});
        var accum_val = sim_data_table.C5[i].accum/1000;
        td_element.html(accum_val);
        tr_element.append(td_element);

        tab_matrix.append(tr_element);
    }
}

function int_float_matrix_to_tab(container, io_array, type){
    var tab_matrix = $("<table class='data_matrix'></table>");
    tab_matrix.css({
        "border-collapse":"collapse"
    });
    var tr_title = $("<tr></tr>").css({padding:8});
    var space_title = $("<th></th>");
    tr_title.append(space_title);
    var td_element = $("<th>VALUE</th>").css({padding: 8});
    //td_element.html(i.toString());
    tr_title.append(td_element);
    tab_matrix.append(tr_title);

    for(var k=0; k<io_array.length; k++) {
        var tr_element = $("<tr></tr>").css({padding: 0});
        var td_id = $("<th></th>").css({"padding-right": 10, "padding-left": 10, "padding-top": 2, "padding-bottom": 2});
        td_id.html(append_2_bit_int(k));
        tr_element.append(td_id);
        //var binary_8_value = get_binary_8_bit(io_array[k]);

        var td_element = $("<td></td>").css({padding: 0});
        var td_input = $("<input class='data-input-field' type='number'>").css({width: 71, border: 0}).prop("disabled", true);
        td_input.val(io_array[k]);

        td_input.data("index_1", type);
        td_input.data("index_2", k);

        //change input value stored in data_table
        td_input.change(
            function(){
                var new_value = $(this).val();
                var index_1 = $(this).data("index_1");
                var index_2 = $(this).data("index_2");

                sim_data_table[index_1][index_2] = new_value;
                $(this).val(new_value);
            }
        );

        td_element.append(td_input);



        //td_element.html(io_array[k]);
        //td_element.dblclick(
        //    function(e){
        //        var input_field = $("<input type='number'>").css({width: 58, border: 0});
        //        $(this).append(input_field);
        //    }
        //);

        tr_element.append(td_element);

        tab_matrix.append(tr_element);
    }

    container.append(tab_matrix);
}



function IO_data(){
    this.name = null;
    this.value = null;
}

function get_binary_8_bit(value){
    var binary = value.toString(2);
    var append_n = 8 - binary.length;
    for(var i=0; i<append_n; i++){
        binary = "0" + binary;
    }
    return binary;
}

function append_2_bit_int(value){
    var bit_value = value.toString();
    if(bit_value.length==1){
        bit_value = "0" + bit_value;
    }
    bit_value = "." + bit_value;
    return bit_value;
}