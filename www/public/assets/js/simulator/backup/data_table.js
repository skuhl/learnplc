function Data_tablet(){
    this.O0 = ["haha", "yeye", "hoho"]; // output
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
    }
}

function show_datatable(){
    var data_tab_matrix = $("<div></div>");
    data_tab_matrix.dialog({
        width: 700,
        height: 400
    });

    var data_tab = $("<div></div>");
    var tab_list = $("<ul></ul>");

    //title
    var tab_1 = $("<li><a href='#tabs-1'>OUTPUT</a></li>");
    tab_list.append(tab_1);
    var tab_2 = $("<li><a href='#tabs-2'>INPUT</a></li>");
    tab_list.append(tab_2);
    var tab_3 = $("<li><a href='#tabs-3'>STATUS</a></li>");
    tab_list.append(tab_3);
    var tab_4 = $("<li><a href='#tabs-4'>BINARY</a></li>");
    tab_list.append(tab_4);
    var tab_5 = $("<li><a href='#tabs-5'>TIMER</a></li>");
    tab_list.append(tab_5);
    var tab_6 = $("<li><a href='#tabs-6'>COUNTER</a></li>");
    tab_list.append(tab_6);
    var tab_7 = $("<li><a href='#tabs-7'>CONTROL</a></li>");
    tab_list.append(tab_7);
    var tab_8 = $("<li><a href='#tabs-8'>INTEGER</a></li>");
    tab_list.append(tab_8);
    var tab_9 = $("<li><a href='#tabs-9'>FLOAT</a></li>");
    tab_list.append(tab_9);
    data_tab.append(tab_list);

    //contents
    var content_1 = $("<div id='tabs-1'></div>");
    add_matrix_to_tab(content_1, sim_data_table.O0);
    data_tab.append(content_1);
    var content_2 = $("<div id='tabs-2'></div>");
    add_matrix_to_tab(content_2, sim_data_table.I1);
    data_tab.append(content_2);
    var content_3 = $("<div id='tabs-3'></div>");
    add_matrix_to_tab(content_3, sim_data_table.S2);
    data_tab.append(content_3);
    var content_4 = $("<div id='tabs-4'></div>");
    add_matrix_to_tab(content_4, sim_data_table.B3);
    data_tab.append(content_4);
    var content_5 = $("<div id='tabs-5'></div>");
    add_matrix_to_tab(content_5, sim_data_table.T4);
    data_tab.append(content_5);
    var content_6 = $("<div id='tabs-6'></div>");
    add_matrix_to_tab(content_6, sim_data_table.C5);
    data_tab.append(content_6);
    var content_7 = $("<div id='tabs-7'></div>");
    add_matrix_to_tab(content_7, sim_data_table.R6);
    data_tab.append(content_7);
    var content_8 = $("<div id='tabs-8'></div>");
    add_matrix_to_tab(content_8, sim_data_table.N7);
    data_tab.append(content_8);
    var content_9 = $("<div id='tabs-9'></div>");
    add_matrix_to_tab(content_9, sim_data_table.F8);
    data_tab.append(content_9);

    data_tab.tabs().addClass( "ui-tabs-vertical ui-helper-clearfix").css({
        width: 900
    });
    data_tab.find("li").removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
    //data_tab.tabs();
    data_tab_matrix.append(data_tab);
}

function add_matrix_to_tab(container, io_array){
    var tab_matrix = $("<table class='data_matrix'></table>");
    tab_matrix.css({
        "border-collapse":"collapse"
    });

    var tr_element = $("<tr></tr>").css({padding:8});
    for(var i=0; i<8; i++){
        var td_element = $("<td></td>").css({padding:8});

        if(io_array[i]!=null){
            td_element.html(io_array[i]);
        }
        else{
            td_element.html("Empty");
        }

        tr_element.append(td_element);
    }
    tab_matrix.append(tr_element);

    container.append(tab_matrix);
}