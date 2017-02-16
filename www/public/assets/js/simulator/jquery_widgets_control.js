/**
 * Created by Haolong on 2014/6/17.
 */
var aaa = new LDLgp();

$(function () {
    $("#toolaccord").accordion();
    $("div.toolcom").draggable({
        start: function (event, ui) {
            var type = ui.helper.data("element-type");
            if (type != 7) {
                Drawhandle(aaa);
            }
            else if (type == 7) {
                draw_line_handle();
            }
            $(".ui-dialog").hide();
        },
        stop: function (event, ui) {
            var type = ui.helper.data("element-type");
            if (type != 7) {
                rmhandle();
            }
            else if (type == 7) {
                rm_linehandle();
            }
            $(".ui-dialog").show();
        },
        handle: "img",
        helper: "clone"
    }).draggable("option", "appendTo", "#plc_sim_container").attr("title", "Drag to canvas to build the logic");

    $("#UNDO").button().click(
        function () {
            var old_aaa = recovery.read_move();
            if (old_aaa != 0) {
                aaa = old_aaa;
                DrawLDL(aaa);
            }
        }
    );

    $("#Open_table").button().click(
        function () {
            show_datatable();
        }
    );

//    $("#light_test").button().css({width: 116, position: "fixed", top: 60, left: 720});

//    $("#addline").button().css({width: 127});

    $("#simulate").button().css({width: 127, position: "absolute", top: 380, left: 10}).click(
        function () {
            lock_sim();
            $("#UNDO").hide();
            $(".red_cross").hide();
            $("#simulate").hide();
            $("#stop_sim").show();
        }
    );

    $("#stop_sim").button().css({width: 127, position: "absolute", top: 380, left: 10}).click(
        function () {
            if (typeof myVar != "undefined") {
                clearInterval(myVar);
            }
            clear_targets();
            reset_scene();
            deactivate_all();

            $("#simulator_window").dialog("option", {
                width: 800,
                position: {
                    my: "right bottom",
                    at: "right-20 bottom-50",
                    of: window
                }
            });

            $("#LDLCanvas").css({left: 160});

            $("#simulator_window").dialog("close");
            $("#simulator_window").dialog("option", "modal", false);
            $("#simulator_window").dialog("open");

            $("#stop_sim").hide();
            $("#simulate").show();
            $("#ports_list").show();
            $("#UNDO").show();
            $(".red_cross").show();

            $(".accum_type").removeClass("accum_border");
        }
    ).hide();

    $("#fold_sim").button().css({width: 127, position: "absolute", top: 380, left: 450}).click(
        function () {
            $("#simulator_window").dialog("option", {width: 130, height: 100, position: {
                my: "right bottom",
                at: "right-20 bottom-50",
                of: window
            }});
            $("#exp_sim").show();
        }
    );

    $("#exp_sim").button().css({width: 100, position: "absolute", top: 10, left: 20}).click(
        function () {
            if ($("#simulator_window").dialog("option", "modal") == true) {
                $("#simulator_window").dialog("option", {width: 658, height: 470});
            }
            else {
                $("#simulator_window").dialog("option", {width: 800, height: 470});
            }
            $("#exp_sim").hide();
        }
    ).hide();

    $("#open_data_sim").button().css({
        width: 127,
        position: "absolute",
        top: 380,
        left: 310
    }).click(
        function () {
            show_datatable();
        }
    );

    $("#mark_item").hide();


    //// interactive instructions
    //$("#ins_sw1").hover(
    //    function () {
    //        $("#mark_item").css({left: 568, top: 147}).show();
    //        $(this).css({"background-color": "#b0c4de"});
    //    },
    //    function () {
    //        $("#mark_item").hide();
    //        $(this).css({"background-color": "transparent"});
    //    }
    //);
    //
    //$("#ins_sw2").hover(
    //    function () {
    //        $("#mark_item").css({left: 592, top: 147}).show();
    //        $(this).css({"background-color": "#b0c4de"});
    //    },
    //    function () {
    //        $("#mark_item").hide();
    //        $(this).css({"background-color": "transparent"});
    //    }
    //);
    //
    //$("#ins_bt1").hover(
    //    function () {
    //        $("#mark_item").css({left: 618, top: 147}).show();
    //        $(this).css({"background-color": "#b0c4de"});
    //    },
    //    function () {
    //        $("#mark_item").hide();
    //        $(this).css({"background-color": "transparent"});
    //    }
    //);
    ////------------------end
    ////outputs --------------------------
    //$("#ins_lt1").hover(
    //    function () {
    //        $("#mark_item").css({left: 230, top: 15}).show();
    //        $(this).css({"background-color": "#b0c4de"});
    //    },
    //    function () {
    //        $("#mark_item").hide();
    //        $(this).css({"background-color": "transparent"});
    //    }
    //);
    //
    //$("#ins_lt2").hover(
    //    function () {
    //        $("#mark_item").css({left: 386, top: 15}).show();
    //        $(this).css({"background-color": "#b0c4de"});
    //    },
    //    function () {
    //        $("#mark_item").hide();
    //        $(this).css({"background-color": "transparent"});
    //    }
    //);
    ////-----------------------end

    $("#ports_list").accordion({
        heightStyle: "content"
    });
    // let all outputs and inputs list draggable
//    $(".port_inst").draggable({
////        handle: "div",
//        start: function (event, ui) {
//            $(".ui-dialog").hide();
//        },
//        stop: function (event, ui) {
//            $(".ui-dialog").show();
//        },
//        helper: function () {
//            //debugger;
//            var name = $(this).data("name");
//            var my_helper = $("<div></div>");
//            my_helper.addClass("name_icon");
//            my_helper.attr("data-name", name);
//            switch (name) {
//                case "sw1":
//                case "sw2":
//                    my_helper.css({
//                        'background-image': "url(/public/assets/icon/simulator/icon_swi.png)"
//                    });
//                    break;
//                case "bt1":
//                    my_helper.css({
//                        'background-image': "url(/public/assets/icon/simulator/icon_button.png)"
//                    });
//                    break;
//                case "lt1":
//                case "lt2":
//                    my_helper.css({
//                        'background-image': "url(/public/assets/icon/simulator/icon_light.png)"
//                    });
//                    break;
//                default:
//                    break;
//            }
//            return my_helper;
//        },
//        cursorAt: {
//            left: 16,
//            top: 16
//        }
//    }).draggable("option", {
//        appendTo: "body",
//        zIndex: 9999
//    }).attr("title", "Drag and drop to ladder logic components to assign it");

    $("#fold_sim").trigger("click");
});

