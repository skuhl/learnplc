$(function () {
    $.widget('plc.math', {
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
            sourceA:"?",
            sourceB:"?",
            dest:"?"
            //DN_bit: 0
        },
        //default methods overwriting
        _create: function () {

            this.element.addClass('PLC_math');
            this.element.css({top: this.options.top, left: this.options.left});
            //this.element.css("background-color","#b0c4de");

            var math_type = $('<div></div>');//text that indicate the type of counter
            var math_name;

            //var cont_n_id = get_int_from_str(this.options.counter_n);

            switch (this.options.type){
                case 15:
                    math_name = "ADD";
                    break;
                case 16:
                    math_name = "SUB";
                    break;
                case 17:
                    math_name = "MUL";
                    break;
                case 18:
                    math_name = "DIV";
                    break;
                default:
                    break;
            }

            math_type.html(math_name);
            math_type.css({
                background: 'white',
                position: 'absolute',
                top: -9,
                left: 50
            });
            this.element.append(math_type);

            var math_sourceA = $('<div></div>'); //the input field of the counter PRESET
            var sourceA_title = $('<div>Source:</div>');
            math_sourceA.css({
                position: 'absolute',
                top: 15,
                left: 6,
                "font-size": 12
            });
            var sourceA_input = $('<input class="sourceA_type" type="text" size="7">').css({height:18});
            sourceA_input.css({
                position: 'absolute',
                top: -2,
                left: 52,
                "font-size": 12
            });
            // draw a bar
            var source_bar_A = $("<div></div>").css({
                "background-color": "#000000",
                border: 0,
                height: 2,
                width: 10,
                position: "absolute",
                top: 5,
                left: 116
            });
            var sourceA_value = $('<div class="sourceA_value">???</div>');
            sourceA_value.css({
                position: 'absolute',
                top: 0,
                left: 135,
                border: "1px solid black"
            });
            math_sourceA.append(sourceA_title);
            math_sourceA.append(sourceA_input);
            math_sourceA.append(source_bar_A);
            math_sourceA.append(sourceA_value);
            this.element.append(math_sourceA);

            var math_sourceB = $('<div></div>'); //the input field of the counter PRESET
            var sourceB_title = $('<div>Src B:</div>');
            math_sourceB.css({
                position: 'absolute',
                top: 39,
                left: 6,
                "font-size": 12
            });
            var sourceB_input = $('<input class="sourceB_type"  type="text" size="7">').css({height:18});
            sourceB_input.css({
                position: 'absolute',
                top: -2,
                left: 52,
                "font-size": 12
            });
            // draw a bar
            var source_bar_B = $("<div></div>").css({
                "background-color": "#000000",
                border: 0,
                height: 2,
                width: 10,
                position: "absolute",
                top: 5,
                left: 116
            });
            var sourceB_value = $('<div class="sourceB_value">???</div>');
            sourceB_value.css({
                position: 'absolute',
                top: 0,
                left: 135,
                border: "1px solid black"
            });
            math_sourceB.append(sourceB_input);
            math_sourceB.append(sourceB_title);
            math_sourceB.append(source_bar_B);
            math_sourceB.append(sourceB_value);
            this.element.append(math_sourceB);

            var math_dest = $('<div></div>'); //the input field of the counter PRESET
            var dest_title = $('<div>Dest:</div>');
            math_dest.css({
                position: 'absolute',
                top: 67,
                left: 6,
                "font-size": 12
            });
            var dest_input = $('<input class="dest_type" type="text" size="7">').css({height:18});
            dest_input.css({
                position: 'absolute',
                top: -2,
                left: 52,
                "font-size": 12
            });
            // draw a bar
            var source_bar_Dest = $("<div></div>").css({
                "background-color": "#000000",
                border: 0,
                height: 2,
                width: 10,
                position: "absolute",
                top: 5,
                left: 116
            });
            var dest_value = $('<div class="dest_value">???</div>');
            dest_value.css({
                position: 'absolute',
                top: 0,
                left: 135,
                border: "1px solid black"
            });
            math_dest.append(dest_input);
            math_dest.append(dest_title);
            math_dest.append(source_bar_Dest);
            math_dest.append(dest_value);
            this.element.append(math_dest);

            //set up event that change preset and accum
            this._on(sourceA_input, {
                change: "change_sourceA"
            });
            this._on(sourceB_input, {
                change: "change_sourceB"
            });
            this._on(dest_input, {
                change: "change_dest"
            });


            this.element.contextMenu({
                selector: "div",

                items: {
                    1: {name: "Delete", icon: "delete",
                        callback: function (key, options) {
                            var delete_line = $($(this).parent()).math("option", "line");
                            var delete_offset = $($(this).parent()).math("option", "offset");

                            deleteElement($($(this).parent()).math("option", "LDL"), delete_line, delete_offset);

                            //counter_name_list.splice(counter_name_list.indexOf($($(this).parent()).math("option", "counter_n")),1);
                            //reform_counter_inputs();

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
        change_sourceA: function () {
            var new_sourceA = $(this.element.find(".sourceA_type")).val();
            var sourceA_val = get_val_from_source(new_sourceA); // get the correct value based on the source input
            // update the element in DLD
            this.options.LDL[this.options.line][this.options.offset].sourceA = new_sourceA;
            this.options.sourceA = new_sourceA;
            this.element.find(".sourceA_value").html(sourceA_val);
        },

        change_sourceB: function () {
            var new_sourceB = $(this.element.find(".sourceB_type")).val();
            var sourceB_val = get_val_from_source(new_sourceB); // get the correct value based on the source input
            // update the element in DLD
            this.options.LDL[this.options.line][this.options.offset].sourceB = new_sourceB;
            this.options.sourceB = new_sourceB;
            this.element.find(".sourceB_value").html(sourceB_val);
        },

        change_dest: function () {
            var new_dest = $(this.element.find(".dest_type")).val();
            var dest_val = get_val_from_source(new_dest); // get the correct value based on the source input
            //update the element in DLD
            this.options.LDL[this.options.line][this.options.offset].dest = new_dest;
            this.options.dest = new_dest;
            this.element.find(".dest_value").html(dest_val);
        },

        update_sourceA: function(){
            var new_sourceA = this.options.sourceA;
            var sourceA_val = get_val_from_source(new_sourceA); // get the correct value based on the source input
            // update the element in DLD
            this.element.find(".sourceA_value").html(sourceA_val);
            //this.element.find(".sourceA_type").val(this.options.LDL[this.options.line][this.options.offset].sourceA);
        },

        update_sourceB: function(){
            var new_sourceB = this.options.sourceB;
            var sourceB_val = get_val_from_source(new_sourceB); // get the correct value based on the source input
            // update the element in DLD
            this.element.find(".sourceB_value").html(sourceB_val);
            //this.element.find(".sourceB_type").val(this.options.LDL[this.options.line][this.options.offset].sourceB);
        },

        update_dest: function(){
            var new_dest = this.options.dest;
            var dest_val = get_val_from_source(new_dest); // get the correct value based on the source input
            // update the element in DLD
            this.element.find(".dest_value").html(dest_val);
            //this.element.find(".dest_type").val(this.options.LDL[this.options.line][this.options.offset].dest);
        }
    });
});