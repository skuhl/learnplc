/**
 * Created by Haolong on 2014/6/17.
 */
var my_matrix = null;
var my_list = new Sim_list();
var DLD_tools_stack = [];
var DLD_counters_stack = [];
var DLD_math_stack = [];
var set_inputs = [1,2];
var set_outputs = [3,4,5,6];
var set_label = [23];

//For all the time events
var counter_DLD_index = [];
var counter_name_list = [];
var counter_stack = [];
var counter_inputs = [];

var resets_stack = [];

//create the data table
var sim_data_table = new Data_tablet();

//For all the math events
var math_stack = [];

//for counters and timers count up
var TNC_ID = new Counter_timer_ID();

var question_list = ["Build a AND gate: light_1 controlled by switch_1 AND switch_2",
                     "Build a OR gate: light_1 controlled by switch_1 OR switch_2",
                     "Build a NOT gate: light_1 controlled by NOT switch_1",
                     "Build a XOR gate: light_2 controlled by switch_1 XOR switch_2",
                     "Build a NAND gate: light_2 controlled by switch_1 NAND switch_2",
                     "Build a NOR gate: light_2 controlled by switch_1 NOR switch_2"]

var recovery = new recover_array();


var scenario_id = 0;

//
var sim_status = 0;
var sim_hold_name = "";
var sim_hold_type = 0;

//var scenario_script=document.createElement('script');
//scenario_script.type='text/javascript';
//scenario_script.src="js/scenario/light_switch.js";

//$("body").append(scenario_script);
var loop_counter = 0;
var myVar;
DrawLDL(aaa);

$("#simulator_window").dialog({
    title: "Light and Switch",
    width: "800",
    height: "470",
    draggable: false,
    modal: false,
    resizable: false,
//        closeOnEscape: false,
    dialogClass: "noclose",
    position: {
        my: "right bottom",
        at: "right-20 bottom-50",
        of: window
    },
    close: function (event, ui) {
        if (typeof myVar != "undefined") {
            clearInterval(myVar);
        }
    }
});

function lock_sim() {
    // check for inputs name match
    clear_targets();
    P_list(aaa);
    match_name();
    reset_scene();

    my_matrix = new AJmatrix(aaa);
    $("#simulator_window").dialog("option", "modal", true).dialog("close").dialog("open");

    myVar = setInterval(function () {
        sim_status = 0;
        sim_hold_name = "";
        sim_hold_type = 0;
        main_cycle();
    }, 50);
    $("#LDLCanvas").css({left:10});
    $("#simulator_window").dialog("option", {
        width: 658,
        position: {
            my: "right bottom",
            at: "right-50 bottom-50",
            of: window
        }
    });
    $("#ports_list").hide();
    $(".ui-widget-overlay").css({opacity:0});

    $(".accum_type").addClass("accum_border");
}