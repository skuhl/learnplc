<style>
    #m12_ex2_workspace {
        /*font: 62.5% "Trebuchet MS", sans-serif;*/
    }

    #m12_ex2_namelist {
        width: 170px;
    }

    .m12_ex2_name {
        margin: 4px;
        padding: 3px;
        width: 200px;
    }

    #m12_ex2_namelist .ui-accordion-content {
        padding: 0px;
    }

    .m12_ex2_name_text {
        padding: 3px;
        margin: 1px;
        text-align: center;
        background-color: #3498db;
    }

    .m12_ex2_fill {
        /*border: 1px solid #c0392b;*/
    }

    .text_name {
        border: 1px dotted #656565;
    }

    .text_wrap {
        vertical-align: middle;
        text-align: center;
        display: table-cell;
        font-size: 130%;
        font-weight: bold;
    }

    .text_wrong {
        background-color: #e74c3c;
    }

    .text_hover {
        background-color: #95a5a6;
    }

</style>

@extends('module.m12_template', array('submitStatus' => $submitstatus))

@section('title','Pump House')

@section('section-menu')
    @include('module.module12.menu')
@stop

@section('lesson')
    <div class="lesson-title">Pump House</div>
    <div class="lesson-statement">
        <div class="subsection">
            <p>
                The pump house is responsible for pumping water from a source, in this case the source is
                a river, and sending it into the water treatment plant. It consists of an inlet that allows
                water from the source to enter the system and two pumps.
            </p>
        </div>
        <div class="subsection">
            <p>
                Pump House Parts:<br/>
            <ol>
                <li><b>Inlet:</b><br/> Allows or blocks water from entering the system; can be open or shut</li>
                <li><b>Inlet Flow Meter and Pressure Guage 1/2:</b><br/> Detects pressure at inlet for pump 1/2</li>
                <li><b>Solenoid Valve 1/2:</b><br/> Opens or closes valve to pump 1/2</li>
                <li><b>Pump 1/2:</b><br/> Provides pressure and flow for pump 1/2 system</li>
                <li><b>Flow Meter 1/2:</b><br/> Measures flow GPM for pump 1/2</li>
            </ol>
            </p>
            <p>
                {{ HTML::image('public/assets/img/module12/section2_diagram.PNG', 'section2_diagram', array('width'=>'300', 'height'=>'360')) }}
            </p>
            <p>
                A working pump should read with a gallons per minute intake of 10 to 10,000 GPM and a water pressure
                between 50 and 100 PSI.
            </p>
        </div>
        <div class="subsection">
            <p>
                In order to turn on the pump and begin pumping water from the river, there are <b>three</b> steps.<br/>
            <ol>
                <li> Open the inlet</li>
                <li> Open the solenoid valve</li>
                <li> Turn on the pump</li>
            </ol>
            </p>
            <p>
                In order to turn off the pump the <b>three</b> steps are the same, but reversed.<br/>
            <ol>
                <li> Turn off the pump</li>
                <li> Close the solenoid valve</li>
                <li> Close the inlet</li>
            </ol>
            </p>
            <p><i>
                    Notes:<br/>
                    <ul>
                        <li> Pumps will not turn on if the inlet is closed or blocked.</li>
                        <li> Only one pump is active at a time.</li>
                        <li> In this module, green will indicate an active piece of machinery, black is inactive, and
                            red
                            will indicate a faulted, non working, machinery.
                        </li>
                    </ul>
                </i></p>
            <br/>
        </div>

    </div>
@stop

@section('instructions')
    <div class="lesson-title">Exercise 2</div>
    <div class="lesson-statement">
        <p>
            Go through the learning material, and then complete the exercise.
            <br><br>
            In this exercise, double-click the pump house and turn on both pumps to let water into the water-treatment plant. After both pumps are activated, click the "submit" button to proceed.
        </p>
    </div>
@stop
@section('exercise')
    <script src="/public/assets/lib/water_treatment/jquery-2.1.1.min.js"></script>
    <script src="/public/assets/lib/water_treatment/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="/public/assets/css/water_treatment/jquery-ui.min.css">
    {{--<link rel="stylesheet" href="/public/assets/css/water_treatment/animate.css">--}}
    <link rel="stylesheet"
          href="/public/assets/css/water_treatment/water_treatment_modules/section_2/water_treatment_element.css">

    <div class='row'>
        <div id="m12_ex2_workspace">
            <div id="water-hmi" style="margin-left:2%;background-color: #ecf0f1;color:black;">
                <img src="/public/assets/img/module12/demo/monitor.png"
                     style="width:100%;height:100%;position:absolute">

                <button id="hmi-overview" class="hmi-button">Overview</button>
                <button id="hmi-faults" class="hmi-button">Faults</button>
                <button id="hmi-data" class="hmi-button">Trend Data</button>

                <div id="pump-block" class="hmi-block">
                    <img src="/public/assets/img/module12/demo/pumphouse.png"
                         style="width:100%;height:100%;position:absolute">

                    <p style="position:absolute;top:47%;left:2%;">GMP:</p>
                    <p style="color:#2980b9;border:1px dashed black;position:absolute;top:44.5%;left:25%;">xxx .</p>

                    <p style="position:absolute;top:60%;left:2%;">Active Pump:</p>
                    <p style="color:#2980b9;border:1px dashed black;position:absolute;top:59.5%;left:51%;">2 .</p>

                    <p style="position:absolute;top:75%;left:2%;">Water Pressure:</p>
                    <p style="color:#2980b9;border:1px dashed black;position:absolute;top:74.5%;left:57%;">15 psi .</p>
                </div>
                <div id="water-block" class="hmi-block">
                    <img src="/public/assets/img/module12/demo/water_tower.png" style="width:100%;height:100%;">
                    <p style="position:absolute;top:70%;left:45%;">Level: </p>
                    <p style="color:#2980b9;border:1px dashed black;position:absolute;top:69.5%;left:68%;"> 40.00
                        ft.</p>
                </div>

                <button id="tank1-block" class="hmi-tank">Tank 1</button>
                <button id="tank2-block" class="hmi-tank">Tank 2</button>

                <button id="hmi-pressure" class="hmi-title">Pressure to City: 25 psi</button>

                <div class="tank-info" id="tank1-txt">
                    <p>Filter Tank #1<br>
                        Active Pumps<br>
                        GPM: xxx<br>
                        Head Pressure: 15 psi</p>
                </div>
                <div id="tank1-connect"></div>
                <div class="tank-info" id="tank2-txt">
                    <p>Filter Tank #2<br>
                        Active Pumps<br>
                        GPM: xxx<br>
                        Head Pressure: 15 psi</p>
                </div>
                <div id="tank2-connect"></div>
            </div>
        </div>
    </div>
@stop

@section('submit-class')
    m12_ex2_submit
@stop

@section('additional_script')
    <script>
        var answer = 0;

        $(".m12_ex2_submit").click(
                function () {
                    if (answer==1) {
                        submit_post(1);
                    }
                    else {
                        submit_post(0);
                    }
                });

        //initialize all properties for pumps
        var inlet_state = 0;
        var pump_1_data = {
            valve: 0,
            pump: 0,
            tube_v: 0,
            tube_h: 0
        };
        var pump_2_data = {
            valve: 0,
            pump: 0,
            tube_v: 0,
            tube_h: 0
        };

        var faults_list = ["• Fault (12/01/14 17:36:14): Head pressure low tank X. Backwash required on tank X."];
        $(function () {
            var main_width = $("#water-hmi").width();
            var main_height = 2*(0.96*main_width/3);
            $("#water-hmi").css('height', main_height);

            $("#pump-block").dblclick(function () {
                pumpHouseDiag();
            });
            $("#water-block").dblclick(function () {
                waterTowerDiag();
            });
            $("#tank1-block").dblclick(function () {
                tank1Diag();
            });
            $("#tank2-block").dblclick(function () {
                tank2Diag();
            });
//            $("#hmi-faults").css({"background-color": "red"}).click(function () {
//                faultsDiag();
//            });
            $("#hmi-faults").click(function () {
                faultsDiag();
            });
            $("#hmi-data").click(function () {
                dataDiag();
            });
//            pumpHouseDiag();
        });

        function refresh_pump_1_states() {
            //update the river inlet
            if (inlet_state == 0) {
                $("#riverInlet").attr("src", "/public/assets/img/module12/pump/inlet_closed.png");
            }
            else {
                $("#riverInlet").attr("src", "/public/assets/img/module12/pump/inlet_open.png");
            }
            //update water pump - 1
            if (pump_1_data.pump == 0) {
                $("#pump_1").attr("src", "/public/assets/img/module12/pump/pump_grey.png");
            }
            else if (pump_1_data.pump == 1) {
                $("#pump_1").attr("src", "/public/assets/img/module12/pump/pump_green.png");
            }
            else {
                $("#pump_1").attr("src", "/public/assets/img/module12/pump/pump_red.png");
            }
            //update water valve - 1
            if (pump_1_data.valve == 0) {
                $("#pump_1_valve").css("top", "63%").attr("src", "/public/assets/img/module12/pump/threashold_grey.png");
            }
            else if (pump_1_data.valve == 1) {
                $("#pump_1_valve").css("top", "52%").attr("src", "/public/assets/img/module12/pump/threashold_green.png");
            }
            //update water pump - 1 - tubes
            if (pump_1_data.valve == 1 && inlet_state == 1) {
                $("#pump_1_tube_h").attr("src", "/public/assets/img/module12/pump/pump_tube_h_blue.png");
            }
            else {
                $("#pump_1_tube_h").attr("src", "/public/assets/img/module12/pump/pump_tube_h_grey.png");
            }
            if (pump_1_data.pump == 1) {
                $("#pump_1_tube_v").attr("src", "/public/assets/img/module12/pump/pump_tube_v_blue.png");
            }
            else {
                $("#pump_1_tube_v").attr("src", "/public/assets/img/module12/pump/pump_tube_v_grey.png");
            }
            check_pump_goals();
        }

        function refresh_pump_2_states() {
            //update the river inlet
            if (inlet_state == 0) {
                $("#riverInlet").attr("src", "/public/assets/img/module12/pump/inlet_closed.png");
            }
            else {
                $("#riverInlet").attr("src", "/public/assets/img/module12/pump/inlet_open.png");
            }
            //update water pump - 1
            if (pump_2_data.pump == 0) {
                $("#pump_2").attr("src", "/public/assets/img/module12/pump/pump_grey.png");
            }
            else if (pump_2_data.pump == 1) {
                $("#pump_2").attr("src", "/public/assets/img/module12/pump/pump_green.png");
            }
            else {
                $("#pump_2").attr("src", "/public/assets/img/module12/pump/pump_red.png");
            }
            //update water valve - 1
            if (pump_2_data.valve == 0) {
                $("#pump_2_valve").css("top", "63%").attr("src", "/public/assets/img/module12/pump/threashold_grey.png");
            }
            else if (pump_2_data.valve == 1) {
                $("#pump_2_valve").css("top", "52%").attr("src", "/public/assets/img/module12/pump/threashold_green.png");
            }
            //update water pump - 2 - tubes
            if (pump_2_data.valve == 1 && inlet_state == 1) {
                $("#pump_2_tube_h").attr("src", "/public/assets/img/module12/pump/pump_tube_h_blue.png");
            }
            else {
                $("#pump_2_tube_h").attr("src", "/public/assets/img/module12/pump/pump_tube_h_grey.png");
            }
            if (pump_2_data.pump == 1) {
                $("#pump_2_tube_v").attr("src", "/public/assets/img/module12/pump/pump_tube_v_blue.png");
            }
            else {
                $("#pump_2_tube_v").attr("src", "/public/assets/img/module12/pump/pump_tube_v_grey.png");
            }
            check_pump_goals();
        }

        function check_pump_goals(){
            if(pump_1_data.pump==1&&pump_2_data.pump==1){
                answer = 1;
            }
            else{
                answer = 0;
            }
        }

        function pumpHouseDiag() {
            var containerDiag = $("#water-hmi");
            var mainDiag = $("<div></div>").dialog({
                dialogClass: "no-close",
                title: "Pump House",
                appendTo: "#m12_ex2_workspace",
                position: {my: "left top", at: "left+4% top+5%", of: containerDiag},
                width: containerDiag.width() * 0.91,
                height: containerDiag.height() * 0.87
            });

            //for river inlet
            var river_inlet = $("<img id='riverInlet' src='/public/assets/img/module12/pump/inlet_closed.png' data-state='0' class='inlet-style'>").click(function () {
                var confirm_dialog = $("<div></div>");
                if (inlet_state == 0) {
                    confirm_dialog.html("Do you want to OPEN the River Inlet ?");
                }
                else if (inlet_state == 1) {
                    confirm_dialog.html("Do you want to CLOSE the River Inlet ?");
                }
                confirm_dialog.dialog({
                    resizable: false,
                    height: 160,
                    width: 350,
                    modal: true,
                    position: {my: "center", at: "center", of: $("#water-hmi")},
                    buttons: {
                        Yes: function () {
                            if (inlet_state == 0) {
                                inlet_state = 1;
                            }
                            else {
                                if (pump_1_data.pump == 0 && pump_2_data.pump == 0) {
                                    inlet_state = 0;
                                }
                                else {
                                    var warning_diag_1 = $("<div><span style='color: #e74c3c'>Error</span>: Deactivate pumps before Closing River Inlet.</div>").dialog({position: {my: "center", at: "center", of: $("#water-hmi")}});
                                }
                            }
                            refresh_pump_1_states();
                            refresh_pump_2_states();
                            $(this).dialog("destroy");
                        },
                        Cancel: function () {
                            $(this).dialog("destroy");
                        }
                    }
                });
            }).appendTo(mainDiag);
            var river_inlet_text = $("<p class='inlet-text'>River Inlet</p>").appendTo(mainDiag);
//        var pumpDemo = $("<img src='pump-control.png' style='width:100%;height:80%;'>").appendTo(mainDiag);

            var pump_1_text = $("<p class='pump-1-text'>Pump - 1</p>").appendTo(mainDiag);
            var pump_1_container = $("<div class='pump-1-style'></div>").appendTo(mainDiag);
            var pump_tube_v_1 = $("<img id='pump_1_tube_v' src='/public/assets/img/module12/pump/pump_tube_v_grey.png' class='pump-icons' style='width:100%;height:100%;'>").appendTo(pump_1_container);
            var pump_tube_h_1 = $("<img id='pump_1_tube_h' src='/public/assets/img/module12/pump/pump_tube_h_grey.png' class='pump-icons' style='width:100%;height:100%;'>").appendTo(pump_1_container);
            var pump_pressure_1 = $("<img src='/public/assets/img/module12/pump/pump_meters.png' class='pump-icons' style='width:100%;height:100%;'>").appendTo(pump_1_container);
            var pumpDemo_1 = $("<img id='pump_1' src='/public/assets/img/module12/pump/pump_grey.png' data-state='0' class='pump-click' style='width:33%;height:33%;'>").click(function () {
                var confirm_dialog = $("<div></div>");
                if (pumpDemo_1.data("state") == 0) {
                    confirm_dialog.html("Do you want to turn on the Pump - 1 ?");
                }
                else if (pumpDemo_1.data("state") == 1) {
                    confirm_dialog.html("Do you want to turn off the Pump - 1 ?");
                }
                confirm_dialog.dialog({
                    resizable: false,
                    height: 160,
                    width: 350,
                    modal: true,
                    position: {my: "center", at: "center", of: $("#water-hmi")},
                    buttons: {
                        Yes: function () {
                            if (pump_1_data.pump == 0) {
                                if (inlet_state == 1) {
                                    if (pump_1_data.valve == 1) {
                                        pump_1_data.pump = 1;
                                    }
                                    else {
                                        var warning_diag_1 = $("<div><span style='color: #e74c3c'>Error</span>: Water Valve is Closed</div>").dialog({position: {my: "center", at: "center", of: $("#water-hmi")}});
                                    }
                                }
                                else {
                                    var warning_diag_2 = $("<div><span style='color: #e74c3c'>Error</span>: Water Inlet is Closed</div>").dialog({position: {my: "center", at: "center", of: $("#water-hmi")}});
                                }
                            }
                            else {
                                pump_1_data.pump = 0;
                            }
                            refresh_pump_1_states();
                            $(this).dialog("destroy");
                        },
                        Cancel: function () {
                            $(this).dialog("destroy");
                        }
                    }
                });
            }).appendTo(pump_1_container);
            var pump_threashold_1 = $("<img id='pump_1_valve' src='/public/assets/img/module12/pump/threashold_grey.png' data-state='0' class='pump-thresh' style='width:20%;height:26%;'>").click(function () {
                var confirm_dialog = $("<div>Do you want to Toggle the Valve ?</div>").dialog({
                    resizable: false,
                    height: 160,
                    modal: true,
                    position: {my: "center", at: "center", of: $("#water-hmi")},
                    buttons: {
                        Yes: function () {
                            if (pump_1_data.valve == 0) {
                                pump_1_data.valve = 1;
                            }
                            else {
                                if (pump_1_data.pump == 0) {
                                    pump_1_data.valve = 0;
                                }
                                else {
                                    var warning_diag_1 = $("<div><span style='color: #e74c3c'>Error</span>: Valve CANNOT be CLOSED when pump-1 is activated.</div>").dialog({position: {my: "center", at: "center", of: $("#water-hmi")}});
                                }
                            }
                            refresh_pump_1_states();
                            $(this).dialog("destroy");
                        },
                        Cancel: function () {
                            $(this).dialog("destroy");
                        }
                    }
                });
            }).appendTo(pump_1_container);

            var pump_2_text = $("<p class='pump-2-text'>Pump - 2</p>").appendTo(mainDiag);
            var pump_2_container = $("<div class='pump-2-style'></div>").appendTo(mainDiag);
            var pump_tube_v_2 = $("<img id='pump_2_tube_v' src='/public/assets/img/module12/pump/pump_tube_v_grey.png' class='pump-icons' style='width:100%;height:100%;'>").appendTo(pump_2_container);
            var pump_tube_h_2 = $("<img id='pump_2_tube_h' src='/public/assets/img/module12/pump/pump_tube_h_grey.png' class='pump-icons' style='width:100%;height:100%;'>").appendTo(pump_2_container);
            var pump_pressure_2 = $("<img src='/public/assets/img/module12/pump/pump_meters.png' class='pump-icons' style='width:100%;height:100%;'>").appendTo(pump_2_container);
            var pumpDemo_2 = $("<img id='pump_2' src='/public/assets/img/module12/pump/pump_grey.png' data-state='0' class='pump-click' style='width:33%;height:33%;'>").click(function () {
                var confirm_dialog = $("<div></div>");
                if (pumpDemo_2.data("state") == 0) {
                    confirm_dialog.html("Do you want to turn on the Pump - 2 ?");
                }
                else if (pumpDemo_2.data("state") == 1) {
                    confirm_dialog.html("Do you want to turn off the Pump - 2 ?");
                }
                confirm_dialog.dialog({
                    resizable: false,
                    height: 160,
                    width: 350,
                    modal: true,
                    position: {my: "center", at: "center", of: $("#water-hmi")},
                    buttons: {
                        Yes: function () {
                            if (pump_2_data.pump == 0) {
                                if (inlet_state == 1) {
                                    if (pump_2_data.valve == 1) {
                                        pump_2_data.pump = 1;
                                    }
                                    else {
                                        var warning_diag_1 = $("<div><span style='color: #e74c3c'>Error</span>: Water Valve is Closed</div>").dialog({position: {my: "center", at: "center", of: $("#water-hmi")}});
                                    }
                                }
                                else {
                                    var warning_diag_2 = $("<div><span style='color: #e74c3c'>Error</span>: Water Inlet is Closed</div>").dialog({position: {my: "center", at: "center", of: $("#water-hmi")}});
                                }
                            }
                            else {
                                pump_2_data.pump = 0;
                            }
                            refresh_pump_2_states();
                            $(this).dialog("destroy");
                        },
                        Cancel: function () {
                            $(this).dialog("destroy");
                        }
                    }
                });
            }).appendTo(pump_2_container);
            var pump_threashold_2 = $("<img id='pump_2_valve' src='/public/assets/img/module12/pump/threashold_grey.png' class='pump-thresh' style='width:20%;height:26%;'>").click(function () {
                var confirm_dialog = $("<div>Do you want to Toggle the Valve ?</div>").dialog({
                    resizable: false,
                    height: 160,
                    modal: true,
                    position: {my: "center", at: "center", of: $("#water-hmi")},
                    buttons: {
                        Yes: function () {
                            if (pump_2_data.valve == 0) {
                                pump_2_data.valve = 1;
                            }
                            else {
                                if (pump_2_data.pump == 0) {
                                    pump_2_data.valve = 0;
                                }
                                else {
                                    var warning_diag_1 = $("<div><span style='color: #e74c3c'>Error</span>: Valve CANNOT be CLOSED when pump-2 is activated.</div>").dialog({position: {my: "center", at: "center", of: $("#water-hmi")}});
                                }
                            }
                            refresh_pump_2_states();
                            $(this).dialog("destroy");
                        },
                        Cancel: function () {
                            $(this).dialog("destroy");
                        }
                    }
                });
            }).appendTo(pump_2_container);
            refresh_pump_1_states();
            refresh_pump_2_states();

            var returnButton = $("<button>Return</button>").button().click(function () {
                mainDiag.dialog("destroy");
            }).appendTo(mainDiag).css({
                position: "absolute",
                top: "88%",
                left: "85%"
            });
        }

        function waterTowerDiag() {
            var containerDiag = $("#water-hmi");
            var mainDiag = $("<div></div>").dialog({
                dialogClass: "no-close",
                title: "Water Tower",
                appendTo: "#m12_ex2_workspace",
                position: {my: "left top", at: "left+4% top+5%", of: containerDiag},
                width: containerDiag.width() * 0.91,
                height: containerDiag.height() * 0.87
            });
            var pumpDemo = $("<img src='/public/assets/img/module12/demo/tower-demo.png' style='width:80%;height:90%;position:absolute;left:10%;'>").appendTo(mainDiag);
            var returnButton = $("<button>Return</button>").button().click(function () {
                mainDiag.dialog("destroy");
            }).appendTo(mainDiag).css({
                position: "absolute",
                top: "88%",
                left: "85%"
            });
        }

        function tank1Diag() {
            var containerDiag = $("#water-hmi");
            var mainDiag = $("<div></div>").dialog({
                dialogClass: "no-close",
                appendTo: "#m12_ex2_workspace",
                title: "Tank - 1",
                position: {my: "left top", at: "left+4% top+5%", of: containerDiag},
                width: containerDiag.width() * 0.91,
                height: containerDiag.height() * 0.87
            });
            var pumpDemo = $("<img src='/public/assets/img/module12/demo/tank-demo.png' style='width:100%;height:90%;position:absolute;left:0%;'>").appendTo(mainDiag);
            var returnButton = $("<button>Return</button>").button().click(function () {
                mainDiag.dialog("destroy");
            }).appendTo(mainDiag).css({
                position: "absolute",
                top: "88%",
                left: "85%"
            });
        }

        function tank2Diag() {
            var containerDiag = $("#water-hmi");
            var mainDiag = $("<div></div>").dialog({
                dialogClass: "no-close",
                title: "Tank - 2",
                appendTo: "#m12_ex2_workspace",
                position: {my: "left top", at: "left+4% top+5%", of: containerDiag},
                width: containerDiag.width() * 0.91,
                height: containerDiag.height() * 0.87
            });
            var pumpDemo = $("<img src='/public/assets/img/module12/demo/tank-demo.png' style='width:100%;height:90%;position:absolute;left:0%;'>").appendTo(mainDiag);
            var returnButton = $("<button>Return</button>").button().click(function () {
                mainDiag.dialog("destroy");
            }).appendTo(mainDiag).css({
                position: "absolute",
                top: "88%",
                left: "85%"
            });
        }

        function faultsDiag() {
            var containerDiag = $("#water-hmi");
            var mainDiag = $("<div></div>").dialog({
                dialogClass: "no-close",
                title: "Fault Screen",
                appendTo: "#m12_ex2_workspace",
                position: {my: "left top", at: "left+4% top+5%", of: containerDiag},
                width: containerDiag.width() * 0.91,
                height: containerDiag.height() * 0.87
            });
//        var pumpDemo = $("<img src='tank-demo.png' style='width:100%;height:90%;position:absolute;left:0%;'>").appendTo(mainDiag);
            var fault_txt = $("<div style='color:red;width:80%;height:80%;'></div>").appendTo(mainDiag);
            for (i = 0; i < faults_list.length; i++) {
                var new_fault = $("<p></p>").html(faults_list[i]).appendTo(fault_txt);
            }
            var returnButton = $("<button>Return</button>").button().click(function () {
                mainDiag.dialog("destroy");
            }).appendTo(mainDiag).css({
                position: "absolute",
                top: "88%",
                left: "85%"
            });
            var clearButton = $("<button>Clear Faults</button>").button().click(function () {
                new_fault.remove();
                faults_list = [];
                $("#hmi-faults").css({"background-color": "buttonface"})
            }).appendTo(mainDiag).css({
                position: "absolute",
                top: "88%",
                left: "3%"
            });
        }

        function dataDiag() {
            var containerDiag = $("#water-hmi");
            var mainDiag = $("<div></div>").dialog({
                dialogClass: "no-close",
                title: "Log Screen",
                appendTo: "#m12_ex2_workspace",
                position: {my: "left top", at: "left+4% top+5%", of: containerDiag},
                width: containerDiag.width() * 0.91,
                height: containerDiag.height() * 0.87
            });
            var dataDemo = $("<img src='/public/assets/img/module12/demo/data_demo.png' style='width:96%;height:75%;position:absolute;left:2%;top:10%;'>").appendTo(mainDiag);
            var returnButton = $("<button>Return</button>").button().click(function () {
                mainDiag.dialog("destroy");
            }).appendTo(mainDiag).css({
                position: "absolute",
                top: "88%",
                left: "85%"
            });
        }
    </script>
@stop