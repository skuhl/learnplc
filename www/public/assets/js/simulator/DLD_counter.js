/**
 * Created by bochao on 5/5/2015.
 */
$(function () {
    $.widget('plc.counters', {
        options: {
            type: 99,
            top: 0,
            left: 0,
            name: '???',
            line: 99,
            offset: 99,
            LDL: null,
            active: false,
            ID: 999,
            counter_n: ""
            //DN_bit: 0
        },
        //default methods overwriting
        _create: function () {

            this.element.addClass('PLC_counter');
            this.element.css({top: this.options.top, left: this.options.left});
            //this.element.css("background-color","#b0c4de");

            var counter_type = $('<div></div>');//text that indicate the type of counter
            var counter_name;

            var cont_n_id = get_int_from_str(this.options.counter_n);

            switch (this.options.type){
                case 9:
                    counter_name = "TON";
                    break;
                case 10:
                    counter_name = "TOF";
                    break;
                case 11:
                    counter_name = "RTO";
                    break;
                case 12:
                    counter_name = "CTU";
                    break;
                case 13:
                    counter_name = "CTD";
                    break;
                case 14:
                    counter_name = "RES";
                    break;
                default:
                    break;
            }

            counter_type.html(counter_name);
            counter_type.css({
                background: 'white',
                position: 'absolute',
                top: -7,
                left: 50
            });
            this.element.append(counter_type);

            var counter_ID = $('<div></div>'); // the counter ID, e.g. TON #1 or TON #2
            //counter_ID.html(counter_name+' #'+ this.options.counter_n);
            counter_ID.html(this.options.counter_n);
            counter_ID.css({
                position: 'absolute',
                top: 15,
                left: 6
            });
            this.element.append(counter_ID);

            var counter_preset = $('<div></div>'); //the input field of the counter PRESET
            var present_title = $('<div>Preset:</div>');
            counter_preset.css({
                position: 'absolute',
                top: 40,
                left: 6
            });
            var preset_input = $('<input class="preset_type" type="number" value="0" name="preset_n" min="-999" max="999">');
            preset_input.css({
                position: 'absolute',
                top: -3,
                left: 57
            });
            counter_preset.append(present_title);
            counter_preset.append(preset_input);
            this.element.append(counter_preset);

            var counter_accum = $('<div></div>'); //the input field of the counter PRESET
            var accum_title = $('<div>Accum:</div>');
            counter_accum.css({
                position: 'absolute',
                top: 65,
                left: 6
            });
            var accum_input = $('<input class="accum_type" type="number" value="0" name="accum_n" min="-999" max="999">');
            accum_input.css({
                position: 'absolute',
                top: -3,
                left: 57
            });
            counter_accum.append(accum_input);
            counter_accum.append(accum_title);
            this.element.append(counter_accum);

            //set up event that change preset and accum
            this._on(preset_input, {
                change: "change_preset"
            });
            this._on(accum_input, {
                change: "change_accum"
            });

            //draggable EN bit and DN bit
            var EN_dash = $('<div></div>'); //EN's dash
            EN_dash.css({
                "background-color": "black",
                width: 30,
                height: 2,
                position: 'absolute',
                top: 14,
                left: 123
            });
            this.element.append(EN_dash);

            var drag_cont_id_EN = counter_name + cont_n_id + "E";
            var EN_drag = $('<div align="center" class="timer_drag_EN">EN</div>'); //EN's draggable item
            EN_drag.data("name",drag_cont_id_EN);
            EN_drag.css({
                border: "2px solid black",
                "border-radius": "8px",
                "background-color": "#ecf0f1",
                width: 35,
                height: 20,
                position: "absolute",
                top: 5,
                left: 140
            });
            EN_drag.draggable({
                start: function (event, ui) {
                    $(".ui-dialog").hide();
                },
                stop: function (event, ui) {
                    $(".ui-dialog").show();
                },
                helper: "clone"
            }).hover(
                function(){
                    EN_drag.css({"background-color": "aquamarine"});
                },
                function(){
                    EN_drag.css({"background-color": "#ecf0f1"});
                }
            );
            this.element.append(EN_drag);

            var DN_dash = $('<div></div>');
            DN_dash.css({
                "background-color": "black",
                width: 30,
                height: 2,
                position: 'absolute',
                top: 40,
                left: 123
            });
            this.element.append(DN_dash);

            var drag_cont_id_DN = counter_name + cont_n_id + "D";
            var DN_drag = $('<div align="center" class="timer_drag_DN">DN</div>'); //EN's draggable item
            DN_drag.data("name",drag_cont_id_DN);
            DN_drag.css({
                border: "2px solid black",
                "border-radius": "8px",
                "background-color": "#ecf0f1",
                width: 35,
                height: 20,
                position: "absolute",
                top: 31,
                left: 140
            });
            DN_drag.draggable({
                start: function (event, ui) {
                    $(".ui-dialog").hide();
                },
                stop: function (event, ui) {
                    $(".ui-dialog").show();
                },
                helper: "clone"
            }).hover(
                function(){
                    DN_drag.css({"background-color": "aquamarine"});
            },
                function(){
                    DN_drag.css({"background-color": "#ecf0f1"});
                }
            );
            this.element.append(DN_drag);

            this.element.contextMenu({
                selector: "div",

                items: {
                    1: {name: "Delete", icon: "delete",
                        callback: function (key, options) {
                            var cnt_name = $($(this).parent()).counters("option", "counter_n");
                            var cnt_type = cnt_name.substr(0,3)+"_ID";
                            var cnt_type_id = get_int_from_str(cnt_name);
                            var delete_line = $($(this).parent()).counters("option", "line");
                            var delete_offset = $($(this).parent()).counters("option", "offset");

                            deleteElement($($(this).parent()).counters("option", "LDL"), delete_line, delete_offset);

                            counter_name_list.splice(counter_name_list.indexOf($($(this).parent()).counters("option", "counter_n")),1);
                            TNC_ID[cnt_type][cnt_type_id] = null;

                            reform_counter_inputs();
                            P_list(aaa);
                            DrawLDL(aaa);

                        }
                    },
                    "sep1": "---------",
                    2: {name: "Mark", icon: "quit",
                        callback: function (key, options) {
                            $($(this).parent()).counters("activate");
                        }
                    },
                    3: {name: "Unmark", icon: "quit",
                        callback: function (key, options) {
                            $($(this).parent()).counters("deactivate");
                        }
                    }
                }
            });

        },

        _refresh: function () {

        },

        _destroy: function () {

        },

        _setOptions: function () {

        },

        _setOption: function () {

        },

        //------------------------------------------
        // custom methods:
        change_preset: function () {
            var new_preset = $(this.element.find(".preset_type")).val();
            //update the element in DLD
            this.options.LDL[this.options.line][this.options.offset].preset = new_preset;
            P_list(aaa);
        },

        change_accum: function () {
            var new_accum = $(this.element.find(".accum_type")).val();
            //update the element in DLD
            this.options.LDL[this.options.line][this.options.offset].accum = new_accum;
            P_list(aaa);

        },

        update_accum: function(){
            this.element.find(".accum_type").val(this.options.LDL[this.options.line][this.options.offset].accum);
        },


        activate: function () {
            this.element.find(".timer_drag_EN").css({
                "background-color": "aquamarine"
            });
        },

        deactivate: function () {
            this.element.find(".timer_drag_EN").css({
                "background-color": "#ecf0f1"
            });
        },

        activateDN: function(){
            this.element.find(".timer_drag_DN").css({
                "background-color": "aquamarine"
            });
        },

        deactivateDN: function(){
            this.element.find(".timer_drag_DN").css({
                "background-color": "#ecf0f1"
            });
        }


    });
});