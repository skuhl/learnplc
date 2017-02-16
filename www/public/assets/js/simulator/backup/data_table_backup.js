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
    add_matrix_to_tab(content_1, sim_data_table.O0, "OUTPUT");
    data_tab.append(content_1);
    var content_2 = $("<div id='tabs-2'></div>");
    add_matrix_to_tab(content_2, sim_data_table.I1, "INPUT");
    data_tab.append(content_2);
    var content_3 = $("<div id='tabs-3'></div>");
    //add_matrix_to_tab(content_3, sim_data_table.S2, "STATUS");
    data_tab.append(content_3);
    var content_4 = $("<div id='tabs-4'></div>");
    //add_matrix_to_tab(content_4, sim_data_table.B3, "BINARY");
    data_tab.append(content_4);
    var content_5 = $("<div id='tabs-5'></div>");
    //add_matrix_to_tab(content_5, sim_data_table.T4, "TIMER");
    data_tab.append(content_5);
    var content_6 = $("<div id='tabs-6'></div>");
    //add_matrix_to_tab(content_6, sim_data_table.C5, "COUNTER");
    data_tab.append(content_6);
    var content_7 = $("<div id='tabs-7'></div>");
    //add_matrix_to_tab(content_7, sim_data_table.R6, "CONTROL");
    data_tab.append(content_7);
    var content_8 = $("<div id='tabs-8'></div>");
    add_matrix_to_tab(content_8, sim_data_table.N7, "INTEGER");
    data_tab.append(content_8);
    var content_9 = $("<div id='tabs-9'></div>");
    add_matrix_to_tab(content_9, sim_data_table.F8, "FLOAT");
    data_tab.append(content_9);

    data_tab.tabs().addClass( "ui-tabs-vertical ui-helper-clearfix").css({
        width: 820
    });
    data_tab.find("li").removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
    //data_tab.tabs();
    data_tab_matrix.append(data_tab);
}

function add_matrix_to_tab(container, io_array, name){
    var tab_matrix = $("<table class='data_matrix'></table>");

    var extract_name = [];
    var flag = 0;
    if(typeof io_array[0].name !== "undefined"){
        flag = 1;
    }
    //if it is input or output
    if(flag) {
        for (var i=0; i<8; i++) {
            if(io_array[i] != null){
                extract_name[i] = io_array[i].name;
            }
            else{
                extract_name[i] = "Empty";
            }
        }
    }
    //if it is not the I/O
    else{
        for (var i=0; i<8; i++) {
            extract_name[i] = (7-i).toString();
        }
    }

    tab_matrix.appendGrid({
        caption: name,
        initRows: 1,
        columns: [
            { name: extract_name[7], display: extract_name[7], type: 'number', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '64px'} },
            { name: extract_name[6], display: extract_name[6], type: 'number', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '64px'} },
            { name: extract_name[5], display: extract_name[5], type: 'number', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '64px'} },
            { name: extract_name[4], display: extract_name[4], type: 'number', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '64px'} },
            { name: extract_name[3], display: extract_name[3], type: 'number', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '64px'} },
            { name: extract_name[2], display: extract_name[2], type: 'number', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '64px'} },
            { name: extract_name[1], display: extract_name[1], type: 'number', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '64px'} },
            { name: extract_name[0], display: extract_name[0], type: 'number', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '64px'} }
//                { name: 'Artist', display: 'Artist', type: 'text', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '100px'} },
//                { name: 'Year', display: 'Year', type: 'text', ctrlAttr: { maxlength: 4 }, ctrlCss: { width: '40px'} },
//                { name: 'Origin', display: 'Origin', type: 'select', ctrlOptions: { 0: '{Choose}', 1: 'Hong Kong', 2: 'Taiwan', 3: 'Japan', 4: 'Korea', 5: 'US', 6: 'Others'} },
//                { name: 'Poster', display: 'With Poster?', type: 'checkbox' },
//                { name: 'Price', display: 'Price', type: 'text', ctrlAttr: { maxlength: 10 }, ctrlCss: { width: '50px', 'text-align': 'right' }, value: 0 },
//                { name: 'RecordId', type: 'hidden', value: 0 }
        ],
        hideButtons: {
            remove: true,
            removeLast: true,
            append: true,
            insert: true,
            moveUp: true,
            moveDown: true
        }
    });

    container.append(tab_matrix);
}

function IO_data(){
    this.name = null;
    this.value = null;
}