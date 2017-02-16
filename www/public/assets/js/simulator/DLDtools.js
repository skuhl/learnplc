$(function () {
    $.widget("plc.tools", {
        options: {
            type: 99,
            top: 0,
            left: 0,
            name: "???",
            line: 99,
            offset: 99,
            LDL: null,
            active: false,
            ID: 999
        },
        //default methods overwriting
        _create: function () {

            this.element.addClass("LDL-element");
            this.element.css({top: this.options.top, left: this.options.left});
            //this.element.css("background-color","#b0c4de");

            var node = $("<div></div>");
            var icon = $("<img>");
            icon.css({height: 32, width: 32});
            switch (this.options.type) {
                case 1:
                    icon.attr("src", "/public/assets/icon/simulator/XIO_LDL.png");
                    node.append(icon);
                    break;
                case 2:
                    icon.attr("src", "/public/assets/icon/simulator/XIC_LDL.png");
                    node.append(icon);
                    break;
                case 3:
                    icon.attr("src", "/public/assets/icon/simulator/OTE_LDL.png");
                    node.append(icon);
                    break;
                case 4:
                    icon.attr("src", "/public/assets/icon/simulator/OTL_LDL.png");
                    node.append(icon);
                    break;
                case 5:
                    icon.attr("src", "/public/assets/icon/simulator/OTU_LDL.png");
                    node.append(icon);
                    break;
                case 6:
                    icon.attr("src", "/public/assets/icon/simulator/OSR_LDL.png");
                    node.append(icon);
                    break;
                default:
                    break;
            }
            this.element.append(node);

            var node_name = $("<div></div>");
            node_name.html(this.options.name);
            node_name.addClass("element_name");
            this.element.append(node_name);

            var name_input = $("<input>").val("???");
            this.element.append(name_input);
            name_input.css({width: 50, position: "absolute", top: -32});
            name_input.hide();


            this._on(node, {
                // _on won't call random when widget is disabled
                dblclick: "input_name"
            });

            this._on(name_input, {
                change: "type_in_name"
            });

            this.element.contextMenu({
                selector: "div",

                items: {
                    1: {name: "Rename", icon: "edit",
                        callback: function (key, options) {
                            $($(this).parent()).tools("input_name");
                        }
                    },
                    2: {name: "Delete", icon: "delete",
                        callback: function (key, options) {
                            var delete_line = $($(this).parent()).tools("option", "line");
                            var delete_offset = $($(this).parent()).tools("option", "offset");

                            deleteElement($($(this).parent()).tools("option", "LDL"), delete_line, delete_offset);

                            DrawLDL(aaa);

                        }
                    },
                    "sep1": "---------",
                    3: {name: "Mark", icon: "quit",
                        callback: function (key, options) {
                            $($(this).parent()).tools("activate");
                        }
                    },
                    4: {name: "Unmark", icon: "quit",
                        callback: function (key, options) {
                            $($(this).parent()).tools("deactivate");
                        }
                    }
                }
            });
            this.element.droppable({
                hoverClass: "dropbox-hover",
                accept:".port_inst, .timer_drag_EN, .timer_drag_DN",
                tolerance: "pointer",
                greedy: true,
                drop: function( event, ui ) {
                    var new_ID = ui.draggable.data("name");
                    $(this).tools("update_name",new_ID);
                }
            });
        },

        _refresh: function () {
            $(this.element.children(".element_name")).html(this.options.name);
            this.element.css({top: this.options.top, left: this.options.left});
            if (this.options.active) {
                this.element.addClass("element_active");
                this.element.removeClass("element_inactive");
            }
            else {
                this.element.addClass("element_inactive");
                this.element.removeClass("element_active");
            }

        },

        _destroy: function () {

        },

        _setOptions: function () {

        },

        _setOption: function () {

        },

        //------------------------------------------
        // custom methods:
        input_name: function (event) {
            this.element.children("input").show();
            this.element.children(".element_name").hide();
        },

        type_in_name: function () {
            var new_ID = $(this.element.children("input")).val();
            this.update_name(new_ID);
        },

        update_name: function (name) {
            recovery.new_move();
            var old_name = this.options.name;
            var new_ID = name;
            var node_type = this.options.type;
            this.options.name = new_ID;
            this.options.LDL[this.options.line][this.options.offset].name = new_ID;
            this._refresh();
            // remove the current node information----------
            //-----------------------------------------------

            // search for match in inputs
            var registered = 0;

            if(set_inputs.indexOf(node_type) > -1) {
                for (var i = 0; i < scenario_inputs.length; i++) {
                    if (new_ID.toUpperCase() == scenario_inputs[i].ID) {
//                        scenario_inputs[i].targets.push(this.options.ID);
//                    my_list.Node_List[this.options.ID].make_oc();
//                    alert(" successfully register as input: " + new_ID);
                        registered = 1;
                    }
                }
                if (registered == 0){
                    for (var i = 0; i < counter_inputs.length; i++){
                        if (new_ID.toUpperCase() == counter_inputs[i].ID){
                            registered = 1;
                        }
                    }
                }
            }
            else if(set_outputs.indexOf(node_type) > -1) {
                // search for match in outputs
                for (var i = 0; i < scenario_outputs.length; i++) {
                    if (new_ID.toUpperCase() == scenario_outputs[i].ID) {
//                        scenario_outputs[i].targets.push(this.options.ID);
//                    my_list.Node_List[this.options.ID].make_oc();
//                    alert(" successfully register as output: " + new_ID);
                        registered = 1;
                    }
                }
            }
            if (registered == 0) {
                alert("the name is invalid, no element was registered. Please fix it before running simulation");
            }
            this.element.children("input").hide();
            this.element.children(".element_name").show();
        },

        activate: function () {
            this.options.active = true;
            this._refresh();
        },

        deactivate: function () {
            this.options.active = false;
            this._refresh();
        }

    });
});