function element_node(name, type) {
    this.name = name;
    this.type = type;
    this.preset = 0;
    this.accum = 0;
    this.sourceA = "";
    this.sourceB = "";
    this.dest = "";

}

function element_bridge() {
    //var new_node1 = new element_node("haha", 1);
    //var new_node2 = new element_node("miao", 2);
    var line_1 = [];
    var line_2 = [];
    this.element_group = [line_1, line_2];
    //this.element_group[0] = this.line
}

function LDLgp() {

    //counter_inputs = [];
    this.Line_N = 1;
    this.Line_Size = [0];
    this.Line_Level = [0];
    this.element_N = 0;

    var LDL_0 = []; // contains all the elements in a line
    this.LDL = [LDL_0]; // contains all the elements in LDL

    this.AddElement = function (name, type, line, offset) {
        // check if it is adding a bridge or a simple node
        if (type == 8) {
            recovery.new_move();
            var new_bridge = new element_bridge();
            this.LDL[line].splice(offset, 0, new_bridge);
            this.Line_Size[line] = this.Line_Size[line] + 1;
            this.element_N++;
        }
        else {
            if (type < 9) {
                recovery.new_move();
                var new_node = new element_node(name, type);

                this.LDL[line].splice(offset, 0, new_node);
                this.Line_Size[line] = this.Line_Size[line] + 1;
                this.element_N = this.element_N + 1;
            }
            else if (type < 14) {
                var counter_name;
                recovery.new_move();
                switch (type) {
                    case 9:
                        for (var i = 0; i < TNC_ID.TON_ID.length; i++) {
                            if (TNC_ID.TON_ID[i] == null) {
                                counter_name = "TON #" + i;
                                TNC_ID.TON_ID[i] = 1;
                                break;
                            }
                        }
                        TNC_ID.TON_ID[TNC_ID.TON_ID.length] = null;
                        break;
                    case 10:
                        for (var i = 0; i < TNC_ID.TOF_ID.length; i++) {
                            if (TNC_ID.TOF_ID[i] == null) {
                                counter_name = "TOF #" + i;
                                TNC_ID.TOF_ID[i] = 1;
                                break;
                            }
                        }
                        TNC_ID.TOF_ID[TNC_ID.TOF_ID.length] = null;
                        break;
                    case 11:
                        for (var i = 0; i < TNC_ID.RTO_ID.length; i++) {
                            if (TNC_ID.RTO_ID[i] == null) {
                                counter_name = "RTO #" + i;
                                TNC_ID.RTO_ID[i] = 1;
                                break;
                            }
                        }
                        TNC_ID.RTO_ID[TNC_ID.RTO_ID.length] = null;
                        break;
                    case 12:
                        for (var i = 0; i < TNC_ID.CTU_ID.length; i++) {
                            if (TNC_ID.CTU_ID[i] == null) {
                                counter_name = "CTU #" + i;
                                TNC_ID.CTU_ID[i] = 1;
                                break;
                            }
                        }
                        TNC_ID.CTU_ID[TNC_ID.CTU_ID.length] = null;
                        break;
                    case 13:
                        for (var i = 0; i < TNC_ID.CTD_ID.length; i++) {
                            if (TNC_ID.CTD_ID[i] == null) {
                                counter_name = "CTD #" + i;
                                TNC_ID.CTD_ID[i] = 1;
                                break;
                            }
                        }
                        TNC_ID.CTD_ID[TNC_ID.CTD_ID.length] = null;
                        break;
                    case 14:
                        for (var i = 0; i < TNC_ID.RES_ID.length; i++) {
                            if (TNC_ID.RES_ID[i] == null) {
                                counter_name = "RES #" + i;
                                TNC_ID.RES_ID[i] = 1;
                                break;
                            }
                        }
                        TNC_ID.RES_ID[TNC_ID.RES_ID.length] = null;
                        break;
                }

                var new_node = new element_node(counter_name, type);

                this.LDL[line].splice(offset, 0, new_node);
                this.Line_Size[line] = this.Line_Size[line] + 1;
                this.element_N = this.element_N + 1;

                var new_name = counter_name;
                counter_name_list.push(new_name);

                reform_counter_inputs();
            }
            else if(type < 15){//for reset instructions
                recovery.new_move();
                var new_node = new element_node(name, type);

                this.LDL[line].splice(offset, 0, new_node);
                this.Line_Size[line] = this.Line_Size[line] + 1;
                this.element_N = this.element_N + 1;
            }
            else if(type < 19){//for math instructions
                recovery.new_move();
                var new_node = new element_node(name, type);

                this.LDL[line].splice(offset, 0, new_node);
                this.Line_Size[line] = this.Line_Size[line] + 1;
                this.element_N = this.element_N + 1;
            }
            else if(type == 19){// for program control JMP
                recovery.new_move();
                var new_node = new element_node(name, type);

                this.LDL[line].splice(offset, 0, new_node);
                this.Line_Size[line] = this.Line_Size[line] + 1;
                this.element_N = this.element_N + 1;
            }
            else if(type == 20){// for program control MCR
                recovery.new_move();
                var new_node = new element_node(name, type);

                this.LDL[line].splice(offset, 0, new_node);
                this.Line_Size[line] = this.Line_Size[line] + 1;
                this.element_N = this.element_N + 1;
            }
            else if(type == 23){// for program control LBL
                recovery.new_move();
                var new_node = new element_node(name, type);

                this.LDL[line].splice(offset, 0, new_node);
                this.Line_Size[line] = this.Line_Size[line] + 1;
                this.element_N = this.element_N + 1;
            }
            else if(type == 25){// for program control TND
                recovery.new_move();
                var new_node = new element_node(name, type);

                this.LDL[line].splice(offset, 0, new_node);
                this.Line_Size[line] = this.Line_Size[line] + 1;
                this.element_N = this.element_N + 1;
            }
        }
    };

//	this.AddonBridge = function(name, type, line, offset, level, order){
//		if (type != 8){
//			var new_node = new element_node(name, type);
//			this.LDL[line][offset].element_group[level].splice(order, 0, new_node);
//			this.element_N = this.element_N + 1;
//		}
//		else{
//			var new_node1 = new element_node("haha", 1);
//			var new_bridge = new element_bridge();
//			new_bridge.element_group[1][0]= new_node1;
//			this.LDL[line][offset].element_group[level].splice(order, 0, new_bridge);
//		}
//
//	};

    this.AddLine = function (line_offset) {
        if (this.Line_N > 0) {
            recovery.new_move();
        }
        this.Line_N = this.Line_N + 1;
        if(this.Line_N>=5){
            $("#LDLCanvas").css({
                height: 500+(this.Line_N-4)*100
            })
        }
        var newline = [];
        this.LDL.splice(line_offset-1, 0, newline);
        this.Line_Size.splice(line_offset-1, 0, 0);
    };

    this.ExtendLine = function (line_offset) {
        this.Line_N = this.Line_N + 1;
        var newline = [];
        this.LDL.splice(line_offset, 0, newline);
        this.Line_Size.splice(line_offset, 0, 0);
    }

    this.getLine_N = function () {
        return this.Line_N;
    };

    this.deleteElement = function (line, offset) {
        recovery.new_move();
        this.LDL[line].splice(offset, 1);
        this.Line_Size[line] = this.Line_Size[line] - 1;
        this.element_N = this.element_N - 1;
    };

    this.deleteLine = function (line) {
        recovery.new_move();
        this.element_N = this.element_N - this.Line_Size[line];
        this.Line_N = this.Line_N - 1;
        this.Line_Size.splice(line, 1);

        //delete all the timers/counters from the list
        for(var i=0; i<this.LDL[line].length; i++){
            if(this.LDL[line][i] instanceof element_node){
                if(this.LDL[line][i].type<9){ }//if it is bit tools
                else if(this.LDL[line][i].type<14){
                    var c_name = this.LDL[line][i].name;
                    counter_name_list.splice(counter_name_list.indexOf(c_name),1);
                }
                else if(this.LDL[line][i].type<15){}
            }
            else if(this.LDL[line][i] instanceof element_bridge){
                branch_delete(this.LDL[line][i]);
            }
        }
        this.LDL.splice(line, 1);

        reform_counter_inputs();

        if (this.Line_N == 0) {
            this.AddLine(0);
            DrawLDL(this);
        }
    };
}

function branch_delete(group){
    for(var i=0; i<group.length; i++){
        for(var j=0; j<group[i].length; j++){
            if(group[i][j] instanceof element_node){
                if(group[i][j].type<9){ }//if it is bit tools
                else if(group[i][j].type<14){
                    var c_name = group[i][j].name;
                    counter_name_list.splice(counter_name_list.indexOf(c_name),1);
                }
                else if(group[i][j].type<15){}
            }
            else if(group[i][j] instanceof element_bridge){
                branch_delete(group[i][j]);
            }
        }
    }
}

// public method to delete nodes on any LDL structures
// The reason is to be able to delete on the bridge
function deleteElement(LDL, line, offset) {
    recovery.new_move();
    LDL[line].splice(offset, 1);
//    this.Line_Size[line] = this.Line_Size[line] - 1;
    aaa.element_N = aaa.element_N - 1;
    make_LineSize(aaa);
}

function make_LineSize(LDLgp) {
    var line_N = LDLgp.getLine_N();
    for (var i = 0; i < line_N; i++) {
        LDLgp.Line_Size[i] = LDLgp.LDL[i].length;
    }

}

function DrawLDL(LDL) {

    //check if the last line is empty, if not add another empty line under it.
    //the reason is that we want to create a same programming experience as the industrial software.
    if (LDL.Line_Size[LDL.Line_N - 1] > 0) {
        LDL.ExtendLine(LDL.Line_N);
    }

    var node_ID = 1;
    var line_dist = 826;
    var end_dist = 60;
    var line_btw = 60;
    var element_btw = 60;
    var y_start = 50;
    var x_start = 100;
    var ctx = $("#LDLCanvas");
    ctx.empty();

    //empty the DLD_tools_stack
    DLD_tools_stack = [];
    DLD_counters_stack = [];
    DLD_math_stack = [];

    // draw the left-end line.
    var tip_left = $("<div></div>");
    tip_left.addClass("LDL-tip");
    tip_left.css("height", line_btw * LDL.getLine_N());
    tip_left.css({top: y_start - end_dist / 2, left: x_start});
    ctx.append(tip_left);
    //draw the right-end line.
    var tip_right = $("<div></div>");
    tip_right.addClass("LDL-tip");
    tip_right.css("height", line_btw * LDL.getLine_N());
    tip_right.css({top: y_start - end_dist / 2, left: x_start + line_dist});
    ctx.append(tip_right);
//	
    var stroke_x = x_start + element_btw - 16;
    var stroke_y = y_start - 15.5;

    for (var i = 0; i < LDL.getLine_N(); i++) {
        // initialize the stroke
        stroke_x = x_start + element_btw - 16;
        // add line
        var LDL_line = $("<div></div>");
        LDL_line.addClass("LDL-line");
        LDL_line.attr("data-line", i);
        LDL_line.css("width", line_dist);
        var y_offset = stroke_y + 15.5;
        //var y_element = y_offset - 15.5;
        LDL_line.css({top: y_offset, left: x_start});
        ctx.append(LDL_line);

        //add cross for line deletion
//        var Line_cross = $("<img>");
//        Line_cross.attr({
//            "src": "images/delete_cross.png",
//            "width": 20,
//            "height": 20,
//            "data-line": i
//        });
//        Line_cross.addClass("red_cross");
//        Line_cross.css({
//            "top": y_offset-10,
//            "left": x_start+line_dist+10
//        });
//        Line_cross.click(
//            function(){
//                var delete_line = $(this).data("line");
//                aaa.deleteLine(delete_line);
//                DrawLDL(aaa);
////                P_list(aaa);
//            }
//        );
//        ctx.append(Line_cross);

        //right click menu
        ctx.contextMenu({
            selector: ".LDL-line",
            items: {
                1: {
                    name: "Delete", icon: "delete",
                    callback: function (key, options) {
                        var delete_line = $(this).data("line");
                        aaa.deleteLine(delete_line);
                        DrawLDL(aaa);
                        P_list(aaa);
                    }
                }
            }
        });

        // line number label
        var line_label = $("<div></div>");
        line_label.addClass("line_label");
        line_label.data("line", i);
        line_label.html(pad(i, 3));
        line_label.css({position: "absolute", top: y_offset - 10, left: 60});
        ctx.contextMenu({
            selector: ".line_label",
            items: {
                1: {
                    name: "Delete", icon: "delete",
                    callback: function (key, options) {
                        var delete_line = $(this).data("line");
                        aaa.deleteLine(delete_line);
                        DrawLDL(aaa);
                        P_list(aaa);
                    }
                }
            }
        });

        line_label.droppable({
            hoverClass: "dropbox-hover",
            tolerance: "pointer",
            greedy: true,
            disabled: true,
            drop: function (event, ui) {
                var Nline = $(this).data("line");
                LDL.AddLine(Nline + 1);
                DrawLDL(aaa);
                P_list(aaa);
            }
        });

        ctx.append(line_label);

        //initialize the stroke
        var line_level = 1;
        var shift = 0;

        var new_y_stroke = stroke_y + line_btw; //always keeps the maximum width of this level

        for (var j = 0; j < LDL.Line_Size[i]; j++) {
            //check if the it is a simple element or a bridge
            if (LDL.LDL[i][j] instanceof element_node) {
                shift = Draw_element(LDL.LDL[i][j], ctx, stroke_x, stroke_y, i, j, LDL.LDL, node_ID);
                stroke_x = stroke_x + shift.x;
                node_ID = shift.id;

                //y_level_offset = Math.max(y_level_offset, shift.y);
                new_y_stroke = Math.max(new_y_stroke, shift.y);
                //stroke_y = stroke_y + y_level_offset;
            }
            else if (LDL.LDL[i][j] instanceof element_bridge) {
                var group_lvl = LDL.LDL[i][j].element_group.length;
                shift = Draw_bridge(ctx, LDL.LDL[i][j].element_group, stroke_x, stroke_y + 15.5, i, j, LDL.LDL, group_lvl, node_ID);
                stroke_x = stroke_x + shift[0] + 28;
                line_level = Math.max(line_level, shift[1]);
                node_ID = shift[2];
                new_y_stroke = Math.max(new_y_stroke, shift[3]);
            }
        }
        stroke_y = new_y_stroke;
        //stroke_y = stroke_y + y_level_offset;
        //stroke_y = stroke_y + line_level * line_btw;
        tip_left.css("height", stroke_y - y_start + 16);
        tip_right.css("height", stroke_y - y_start + 16);
    }
}

/* draw handles, which used to drop new element */
function Drawhandle(LDLgp) {
    var line_dist = 800;
    var line_btw = 60;
    var counter_btw = 210;
    var counter_line_btw = 125;
    var element_btw = 60;
    var x_start = 72;

    var stroke_x = x_start;// update draw x-position
    var stroke_y = 41;// update draw y-position

    for (var i = 0; i < LDLgp.getLine_N(); i++) {
        //stroke_x = x_start;
        stroke_x = x_start;

        var y_offset_max = line_btw;
        dropbox(i, 0, stroke_y, stroke_x, LDLgp);
        var line_level = 1;

        for (var j = 0; j < LDLgp.Line_Size[i]; j++) {
            //add droppable elements to the ladder logic
            if (LDLgp.LDL[i][j] instanceof element_node) {
                //stroke_x = stroke_x + element_btw;
                //stroke_y = pos_update.y;
                if (LDLgp.LDL[i][j].type < 9) {
                    stroke_x = stroke_x + element_btw;
                    y_offset_max = Math.max(y_offset_max, line_btw);
                }
                else if (LDLgp.LDL[i][j].type < 14) {
                    stroke_x = stroke_x + counter_btw;
                    y_offset_max = Math.max(y_offset_max, counter_line_btw);
                }
                else if(LDLgp.LDL[i][j].type < 15){
                    stroke_x = stroke_x + element_btw;
                    y_offset_max = Math.max(y_offset_max, line_btw);
                }
                else if(LDLgp.LDL[i][j].type < 19){
                    stroke_x = stroke_x + counter_btw;
                    y_offset_max = Math.max(y_offset_max, counter_line_btw);
                }
                else if(LDLgp.LDL[i][j].type == 19){ // for JMP instruction
                    stroke_x = stroke_x + element_btw;
                    y_offset_max = Math.max(y_offset_max, line_btw);
                }
                else if(LDLgp.LDL[i][j].type == 20){ // for MCR instruction
                    stroke_x = stroke_x + element_btw;
                    y_offset_max = Math.max(y_offset_max, line_btw);
                }
                else if(LDLgp.LDL[i][j].type == 23){ // for LBL instruction
                    stroke_x = stroke_x + element_btw;
                    y_offset_max = Math.max(y_offset_max, line_btw);
                }
                else if(LDLgp.LDL[i][j].type == 25){ // for TND instruction
                    stroke_x = stroke_x + element_btw;
                    y_offset_max = Math.max(y_offset_max, line_btw);
                }
                dropbox(i, j + 1, stroke_y, stroke_x, LDLgp);
            }
            else if (LDLgp.LDL[i][j] instanceof element_bridge) {
                //First we need to generate all handles for the bridge
                var b_level = LDLgp.LDL[i][j].element_group.length;
                var shift = bridge_handles(i, j, LDLgp.LDL[i][j].element_group, stroke_x, stroke_y, LDLgp, b_level);

                //update the stroke based on bridge status
                var group = LDLgp.LDL[i][j].element_group;
                var max_size = group[0].length;
                var element_width = 60;
                var base_width = 28;
                var line_btw = 60;
                for (var k = 1; k < group.length; k++) {
                    if (group[k].length > max_size) {
                        max_size = group[k].length;
                    }
                }

                //stroke_x = stroke_x + Math.max(max_size*element_width+base_width)+28;
                stroke_x = stroke_x + 28 + shift[0];
                b_level = shift[1];
                dropbox(i, j + 1, stroke_y, stroke_x, LDLgp);

                //line_level = Math.max(line_level, b_level);
                y_offset_max = Math.max(y_offset_max, shift[2]);
            }
        }
        stroke_y = stroke_y + y_offset_max;
    }
}

/* draw bridge handles
 * 
 */
function bridge_handles(line, offset, group, x, y, LDLgp, level) {
    var initial_x = x;
    var initial_y = y;
    var stroke_y = y;
    var stroke_x = x;
    var bridge_width = 28;
    var element_btw_offset = 60;

    //var shift = 60;
    for (var k = 0; k < group.length; k++) {
        stroke_x = x + 28;
        var line_btw_offset = 60;
        dropbox_handle(group, k, 0, stroke_x, stroke_y, LDLgp);
        //stroke_x = stroke_x + 60;
        for (var w = 0; w < group[k].length; w++) {
            if (group[k][w] instanceof element_node) {

                if (group[k][w].type < 9) {
                    element_btw_offset = 60;
                    line_btw_offset = Math.max(60, line_btw_offset);
                }
                else if (group[k][w].type < 14) {
                    element_btw_offset = 210;
                    line_btw_offset = Math.max(line_btw_offset, 125);
                }
                else if(group[k][w].type < 15){
                    element_btw_offset = 60;
                    line_btw_offset = Math.max(60, line_btw_offset);
                }
                else if(group[k][w].type < 19){
                    element_btw_offset = 210;
                    line_btw_offset = Math.max(line_btw_offset, 125);
                }
                else if(group[k][w].type == 19){ //for JMP instruction
                    element_btw_offset = 60;
                    line_btw_offset = Math.max(60, line_btw_offset);
                }
                else if(group[k][w].type == 20){ //for MCR instruction
                    element_btw_offset = 60;
                    line_btw_offset = Math.max(60, line_btw_offset);
                }
                else if(group[k][w].type == 23){ //for LBL instruction
                    element_btw_offset = 60;
                    line_btw_offset = Math.max(60, line_btw_offset);
                }
                else if(group[k][w].type == 25){ //for TND instruction
                    element_btw_offset = 60;
                    line_btw_offset = Math.max(60, line_btw_offset);
                }
                stroke_x = stroke_x + element_btw_offset;
                dropbox_handle(group, k, w + 1, stroke_x, stroke_y, LDLgp);

                //dropbox_handle(group, k, w+1, stroke_x, stroke_y, LDLgp);
                //stroke_x = stroke_x + 60;
            }
            else if (group[k][w] instanceof element_bridge) {
                var shift = bridge_handles(line, offset, group[k][w].element_group, stroke_x, stroke_y, LDLgp, level);
                stroke_x = stroke_x + shift[0] + 28;
                dropbox_handle(group, k, w + 1, stroke_x, stroke_y, LDLgp);
                level = shift[1] + group.length - 1;
                line_btw_offset = shift[2];
            }
        }
        stroke_y = stroke_y + line_btw_offset;
        bridge_width = Math.max(bridge_width, (stroke_x - initial_x));
    }
    var pos_update = [];
    pos_update[0] = bridge_width;
    pos_update[1] = level;
    pos_update[2] = stroke_y - initial_y; //the line width
    return pos_update;
}

/* draw dropboxs for bridges*/
function dropbox_handle(group, line, offset, x, y, LDLgp) {

    var dpbox = $("<div></div>");
    dpbox.addClass("dropbox");
    dpbox.attr("data-group-line", line);
    dpbox.attr("data-group-offset", offset);
    $("#plc_sim_container").append(dpbox);
    dpbox.css({top: 20 + y, left: 210 + x, position: 'absolute'});
    dpbox.droppable({
        //activeClass: "ui-state-hover",
        hoverClass: "dropbox-hover",
        tolerance: "pointer",
        greedy: true,
        drop: function (event, ui) {
            var Gline = $(this).data("group-line");
            var Goffset = $(this).data("group-offset");
            rmhandle();
            var type = ui.draggable.data("element-type");

            //check if it is adding line
            if (type == 7) {
                alert("can't add main rung here, please use valid ");
            }
            else if (type == 8) {
                // add bridge on bridge
                //var new_node1 = new element_node("haha", 1);
                recovery.new_move();
                var new_bridge = new element_bridge();
                //new_bridge.element_group[1][0]= new_node1;
                group[Gline].splice(Goffset, 0, new_bridge);
                LDLgp.element_N++;
                DrawLDL(LDLgp);
                P_list(aaa);
            }
            else {
                recovery.new_move();
                var name = "???";
                if(type<14 && type>8){
                    switch (type) {
                        case 9:
                            for (var i = 0; i < TNC_ID.TON_ID.length; i++) {
                                if (TNC_ID.TON_ID[i] == null) {
                                    name = "TON #" + i;
                                    TNC_ID.TON_ID[i] = 1;
                                }
                            }
                            TNC_ID.TON_ID[TNC_ID.TON_ID.length] = null;
                            break;
                        case 10:
                            for (var i = 0; i < TNC_ID.TOF_ID.length; i++) {
                                if (TNC_ID.TOF_ID[i] == null) {
                                    name = "TOF #" + i;
                                    TNC_ID.TOF_ID[i] = 1;
                                }
                            }
                            TNC_ID.TOF_ID[TNC_ID.TOF_ID.length] = null;
                            break;
                        case 11:
                            for (var i = 0; i < TNC_ID.RTO_ID.length; i++) {
                                if (TNC_ID.RTO_ID[i] == null) {
                                    name = "RTO #" + i;
                                    TNC_ID.RTO_ID[i] = 1;
                                }
                            }
                            TNC_ID.RTO_ID[TNC_ID.RTO_ID.length] = null;
                            break;
                        case 12:
                            for (var i = 0; i < TNC_ID.CTU_ID.length; i++) {
                                if (TNC_ID.CTU_ID[i] == null) {
                                    name = "CTU #" + i;
                                    TNC_ID.CTU_ID[i] = 1;
                                }
                            }
                            TNC_ID.CTU_ID[TNC_ID.CTU_ID.length] = null;
                            break;
                        case 13:
                            for (var i = 0; i < TNC_ID.CTD_ID.length; i++) {
                                if (TNC_ID.CTD_ID[i] == null) {
                                    name = "CTD #" + i;
                                    TNC_ID.CTD_ID[i] = 1;
                                }
                            }
                            TNC_ID.CTD_ID[TNC_ID.CTD_ID.length] = null;
                            break;
                        //case 14:
                        //    for (var i = 0; i < RES_ID.length; i++) {
                        //        if (RES_ID[i] == null) {
                        //            name = "RES #" + i;
                        //            RES_ID[i] = 1;
                        //        }
                        //    }
                        //    RES_ID[RES_ID.length] = null;
                        //    break;
                    }

                    //add counter to counter_input list
                    counter_name_list.push(name);

                    reform_counter_inputs();
                }
                //alert("type is "+ type);

                var new_node = new element_node(name, type);
                group[Gline].splice(Goffset, 0, new_node);
                LDLgp.element_N++;
                //LDLgp.AddElement(name, type, Nline, Noffset);
                DrawLDL(LDLgp);
                P_list(aaa);
            }
        }
    });

}

/* draw dropbox for each handle*/
function dropbox(line, offset, top, left, LDLgp) {
    var dpbox = $("<div></div>");
    dpbox.addClass("dropbox");
    dpbox.attr("data-line", line);
    dpbox.attr("data-offset", offset);
    $("#plc_sim_container").append(dpbox);
    dpbox.css({top: 20 + top, left: 210 + left, position: 'absolute'});//250 = left of canvas + line start position, 100 is upper edge of canvas.
    //make handles droppable, the function of drop event will update the LDL object
    dpbox.droppable({
        //activeClass: "ui-state-hover",
        hoverClass: "dropbox-hover",
        tolerance: "pointer",
        greedy: true,
        drop: function (event, ui) {
            var Nline = $(this).data("line");
            var Noffset = $(this).attr("data-offset");
            rmhandle();
            var type = ui.draggable.data("element-type");

            //check if it is adding line
            if (type == 7) {
                LDLgp.AddLine(Nline + 1);
                DrawLDL(aaa);
                P_list(aaa);
            }
            else {
                var name = "???";
                //alert("type is "+ type);
                LDLgp.AddElement(name, type, Nline, Noffset);
                DrawLDL(LDLgp);
                P_list(aaa);
            }
        }
    });
    //alert("The data-line is" + dpbox.attr("data-line") + "\n" + "the data-offset is " + dpbox.attr("data-offset"));
}

function draw_line_handle() {
    $(".line_label").addClass("line-handle").droppable("option", "disabled", false);
}

/*remove all the dropbox handle*/
function rmhandle() {
    $(".dropbox").remove();
//    $(".line_label").css({"background-color": "white"}).droppable("option","disabled",true);
}

function rm_linehandle() {
    $(".line_label").removeClass("line-handle").droppable("option", "disabled", true);
}

function Draw_element(LDL_element, ctx, x, y, line, offset, LDL, ID) {
    var LDL_node = $("<div></div>");
    var tool_dist = {x: 0, y: 0, id: 0};
    if (LDL_element.type < 9) {// for bit tools
        LDL_node.tools({
            type: LDL_element.type,
            top: y,
            left: x,
            name: LDL_element.name,
            line: line,
            offset: offset,
            LDL: LDL,
            ID: ID
        });
        tool_dist.x = 60;
        tool_dist.y = y + 60;

        DLD_tools_stack[ID] = LDL_node;
    }
    else if (LDL_element.type < 14) {//for counters and timers
        LDL_node.counters({
            type: LDL_element.type,
            top: y,
            left: x,
            name: LDL_element.name,
            line: line,
            offset: offset,
            LDL: LDL,
            ID: ID,
            counter_n: LDL_element.name
        });
        tool_dist.x = 210;
        tool_dist.y = y + 125;

        DLD_counters_stack[ID] = LDL_node;
    }
    //for LDL reset
    else if (LDL_element.type < 15){ //for reset instruction
        LDL_node.resets({
            type: LDL_element.type,
            top: y,
            left: x,
            name: LDL_element.name,
            line: line,
            offset: offset,
            LDL: LDL,
            ID: ID
        });
        tool_dist.x = 60;
        tool_dist.y = y + 60;

        DLD_tools_stack[ID] = LDL_node;
    }
    // math instructions
    else if (LDL_element.type < 19){ // math instructions
        LDL_node.math({
            type: LDL_element.type,
            top: y,
            left: x,
            name: LDL_element.name,
            line: line,
            offset: offset,
            LDL: LDL,
            ID: ID,
            counter_n: LDL_element.name
        });
        tool_dist.x = 210;
        tool_dist.y = y + 125;

        DLD_math_stack[ID] = LDL_node;
    }
    // program control instruction JMP
    else if(LDL_element.type == 19){ // program control instructions
        LDL_node.jmp({
            type: LDL_element.type,
            top: y,
            left: x,
            name: LDL_element.name,
            line: line,
            offset: offset,
            LDL: LDL,
            ID: ID
        });
        tool_dist.x = 60;
        tool_dist.y = y + 60;

        DLD_tools_stack[ID] = LDL_node;
    }
    // program control instruction MCR
    else if(LDL_element.type == 20){ // program control instructions
        LDL_node.mcr({
            type: LDL_element.type,
            top: y,
            left: x,
            name: LDL_element.name,
            line: line,
            offset: offset,
            LDL: LDL,
            ID: ID
        });
        tool_dist.x = 60;
        tool_dist.y = y + 60;

        DLD_tools_stack[ID] = LDL_node;
    }
    // program control instruction LBL
    else if(LDL_element.type == 23){ // program control instructions LBL
        LDL_node.lbl({
            type: LDL_element.type,
            top: y,
            left: x,
            name: LDL_element.name,
            line: line,
            offset: offset,
            LDL: LDL,
            ID: ID
        });
        tool_dist.x = 60;
        tool_dist.y = y + 60;

        DLD_tools_stack[ID] = LDL_node;
    }
    // program control instruction TND
    else if(LDL_element.type == 25){ // program control instructions tnd
        LDL_node.tnd({
            type: LDL_element.type,
            top: y,
            left: x,
            name: LDL_element.name,
            line: line,
            offset: offset,
            LDL: LDL,
            ID: ID
        });
        tool_dist.x = 60;
        tool_dist.y = y + 60;

        DLD_tools_stack[ID] = LDL_node;
    }

    tool_dist.id = ID+1;

    ctx.append(LDL_node);
    //DLD_tools_stack[ID] = LDL_node;
    //DLD_tools_stack.push(LDL_node);
    return tool_dist;//return the element between distance
}

function Draw_bridge(ctx, group, x, y, line, offset, LDL, level, node_ID) {
    var ID = node_ID;
    var max_size = group[0].length;
    var element_width = 60;
    var base_width = 28;
    var line_btw = 60;
    var counter_line_btw = 125;
    var line_width = 28;
    for (var i = 1; i < group.length; i++) {
        //for(var j=1; j<group[i])
        if (group[i].length > max_size) {
            max_size = group[i].length;
        }
    }

    var y_pos = y;
    var y_offset = line_btw;

    var gline = $("<div></div>");
    gline.addClass("LDL-line");
    //gline.attr("data-line", i);
    gline.css("width", base_width);//set line length
    gline.css({top: y_pos + line_btw, left: x});//set line position
    ctx.append(gline);

    var tip_left = $("<div></div>"); // draw left tip
    tip_left.addClass("LDL-tip");
    tip_left.css("height", line_btw);
    tip_left.css({top: y, left: x});//position tip
    ctx.append(tip_left);

    var tip_right = $("<div></div>");
    tip_right.addClass("LDL-tip");
    tip_right.css("height", line_btw);
    tip_right.css({top: y, left: x + base_width - 2});//position tip
    ctx.append(tip_right);

    var max_width = 28;
    var max_height = 60;
    var max_offset = 60;

    var stroke_y = y - 15.5;
    var stroke_x = x + 28;

    for (var i = 0; i < group.length; i++) {
        stroke_x = x + 28;
        max_offset = 60;

        var tmp_level = level;
        for (var j = 0; j <= group[i].length; j++) {
            //draw elements or rung
            if (group[i][j] instanceof element_node) {
                //var x_element = x + 28 + j*element_width; // remember the element is 32px width.
                var shift = Draw_element(group[i][j], ctx, stroke_x, stroke_y, i, j, group, ID);
                ID = shift.id;
                stroke_x = stroke_x + shift.x;

                max_offset = Math.max(max_offset, shift.y - stroke_y);

                max_width = Math.max(max_width, stroke_x - x);

                if (i == 0) {
                    max_height = Math.max(max_height, shift.y - y + 15.5);
                }
            }
            else if (group[i][j] instanceof element_bridge) {
                var shift = Draw_bridge(ctx, group[i][j].element_group, stroke_x, stroke_y + 15.5, line, offset, LDL, level, ID);
                ID = shift[2];
                stroke_x = stroke_x + shift[0] + 28;
                // reposition the lines

                max_offset = Math.max(max_offset, shift[3] - stroke_y);

                max_width = Math.max(max_width, stroke_x - x);

                level = Math.max(level, (shift[1] + group.length - 1));
                tmp_level = level;
            }
        }
        stroke_y = stroke_y + max_offset;
    }

    gline.css("width", max_width);//set line length
    gline.css("top", y + max_height);

    tip_left.css({top: y, left: x});//position tip
    tip_left.css({height: max_height});//resize tip length

    tip_right.css({top: y, left: x + max_width - 2});//position tip
    tip_right.css({height: max_height});//resize tip length

    ID = ID + 1;//for the intersection
    var update_pos = [];
    update_pos[0] = max_width;
    update_pos[1] = level;
    update_pos[2] = ID;
    update_pos[3] = stroke_y;
    update_pos[4] = stroke_y - y;
    return update_pos;

}
