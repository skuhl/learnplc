/**
 * Created by bochao on 6/7/2014.
 */
/**
 *The conveyor belt example
 *Inputs: Button #1: BT1
 *        Button #2: BT2
 *        Button #3: BT3
 *        Button #4: BT4
 *Outputs: Conveyor Belt #1: CV1
 *         Conveyor Belt #2: CV2
 *         Motion Sensor #1: MS1
 *         Motion Sensor #2: MS2
 */
// input data structure
function sc_input(ID) {
    this.ID = ID;
    this.inputs = [];
    this.targets = [];
}

//output data structure
function sc_output(ID) {
    this.ID = ID;
    this.outputs = [0];
    this.targets = [];
}

//initiate the stacker for inputs and outputs
var scenario_inputs = [];
var scenario_outputs = [];

//------------------------------------inputs----------------------------------------
scenario_inputs.push(new sc_input("BT1"));
scenario_inputs.push(new sc_input("BT2"));
scenario_inputs.push(new sc_input("BT3"));
scenario_inputs.push(new sc_input("BT4"));
// for relay also add to input stacks
scenario_inputs.push(new sc_input("CV1"));
scenario_inputs.push(new sc_input("CV2"));
scenario_inputs.push(new sc_input("MS1"));
scenario_inputs.push(new sc_input("MS2"));
//------------------------------------outputs---------------------------------------
scenario_outputs.push(new sc_output("CV1"));
scenario_outputs.push(new sc_output("CV2"));
scenario_outputs.push(new sc_output("MS1"));
scenario_outputs.push(new sc_output("MS2"));


// MAIN

// standard global variables
var container, scene, camera, renderer, controls, stats;
var keyboard = new THREEx.KeyboardState();
var clock = new THREE.Clock();

// custom global variables
var conveyor_room;

var obj_index = 1;

// pick
var targetList = [];
var projector, mouse = { x: 0, y: 0 };

// buttons
var bt_1;
var bt_2;
var bt_3;
var bt_4;
var button_pushed=0;

//boxes on the belf
var box_1;
var box_2;

var box_2_start = new THREE.Vector3(48.7881, 21.6364, 0.0238);
var box_2_end = new THREE.Vector3(-32.2614, 21.6364, 0.0238);

var box_1_start = new THREE.Vector3(63.7721, 21.6364, 46.335);
var box_1_end = new THREE.Vector3(-44.7018, 21.6364, 46.335);

// motion sensors when the box is reach their destiny
var msensor_1;
var msensor_2;
var msensor_color;

//set the data_table, output
var CV1_data = new IO_data();
CV1_data.value = 0;
CV1_data.name = ".CV1";

var CV2_data = new IO_data();
CV2_data.value = 0;
CV2_data.name = ".CV2";

var MS1_data = new IO_data();
MS1_data.value = 0;
MS1_data.name = ".MS1";

var MS2_data = new IO_data();
MS2_data.value = 0;
MS2_data.name = ".MS2";

var empty_data_1 = new IO_data();
empty_data_1.value = 0;
empty_data_1.name = "None";

var empty_data_2 = new IO_data();
empty_data_2.value = 0;
empty_data_2.name = "None";

var empty_data_3 = new IO_data();
empty_data_3.value = 0;
empty_data_3.name = "None";

var empty_data_4 = new IO_data();
empty_data_4.value = 0;
empty_data_4.name = "None";

sim_data_table.O0[0] = CV1_data;
sim_data_table.O0[1] = CV2_data;
sim_data_table.O0[2] = MS1_data;
sim_data_table.O0[3] = MS2_data;
sim_data_table.O0[4] = empty_data_1;
sim_data_table.O0[5] = empty_data_2;
sim_data_table.O0[6] = empty_data_3;
sim_data_table.O0[7] = empty_data_4;

//set the data_table, input
var BT1_data = new IO_data();
BT1_data.value = 0;
BT1_data.name = ".BT1";

var BT2_data = new IO_data();
BT2_data.value = 0;
BT2_data.name = ".BT2";

var BT3_data = new IO_data();
BT3_data.value = 0;
BT3_data.name = ".BT3";

var BT4_data = new IO_data();
BT4_data.value = 0;
BT4_data.name = ".BT4";

var empty_data_1 = new IO_data();
empty_data_1.value = 0;
empty_data_1.name = "None";

var empty_data_2 = new IO_data();
empty_data_2.value = 0;
empty_data_2.name = "None";

var empty_data_3 = new IO_data();
empty_data_3.value = 0;
empty_data_3.name = "None";

var empty_data_4 = new IO_data();
empty_data_4.value = 0;
empty_data_4.name = "None";

sim_data_table.I1[0] = BT1_data;
sim_data_table.I1[1] = BT2_data;
sim_data_table.I1[2] = BT3_data;
sim_data_table.I1[3] = BT4_data;
sim_data_table.I1[4] = empty_data_1;
sim_data_table.I1[5] = empty_data_2;
sim_data_table.I1[6] = empty_data_3;
sim_data_table.I1[7] = empty_data_4;


var test_pos = new THREE.Vector3(0, 0, 0);

// colors
var switch_active = new THREE.Color(46 / 255, 204 / 255, 113 / 255);
var switch_off = new THREE.Color(0.6392156862745098, 0.6392156862745098, 0.6392156862745098);

var low_em = new THREE.Color(0, 0, 0);
var high_em = new THREE.Color(23 / 255, 102 / 255, 56 / 255);
var red_em = new THREE.Color(192/255, 57/255, 43/255);
var blue_em = new THREE.Color(41/255, 128/255, 185/255);

var SCREEN_WIDTH = $("#ThreeJS").innerWidth();
var SCREEN_HEIGHT = $("#ThreeJS").innerHeight();

//modify the simulate windows
// for inputs list
var bt_1_element = $("<div id='ins_bt1' class='port_inst' data-name='bt1'></div>");
var bt_1_img = $("<img src='/public/assets/icon/simulator/icon_button.png' alt='some_text' width='32' height='32' class='icon_list'>");
bt_1_element.append(bt_1_img);
var bt_1_fullname = $("<p style='margin-left: 5px;' class='inst_type'>Button #1:</p>");
bt_1_element.append(bt_1_fullname);
var bt_1_shortname = $("<p style='margin-left: 5px;' class='inst_name'>BT1</p>");
bt_1_element.append(bt_1_shortname);
$("#input_tag").append(bt_1_element);

var bt_2_element = $("<div id='ins_bt2' class='port_inst' data-name='bt2'></div>");
var bt_2_img = $("<img src='/public/assets/icon/simulator/icon_button_blue.png' alt='some_text' width='32' height='32' class='icon_list'>");
bt_2_element.append(bt_2_img);
var bt_2_fullname = $("<p style='margin-left: 5px;' class='inst_type'>Button #2:</p>");
bt_2_element.append(bt_2_fullname);
var bt_2_shortname = $("<p style='margin-left: 5px;' class='inst_name'>BT2</p>");
bt_2_element.append(bt_2_shortname);
$("#input_tag").append(bt_2_element);

var bt_3_element = $("<div id='ins_bt3' class='port_inst' data-name='bt3'></div>");
var bt_3_img = $("<img src='/public/assets/icon/simulator/icon_button_green.png' alt='some_text' width='32' height='32' class='icon_list'>");
bt_3_element.append(bt_3_img);
var bt_3_fullname = $("<p style='margin-left: 5px;' class='inst_type'>Button #3:</p>");
bt_3_element.append(bt_3_fullname);
var bt_3_shortname = $("<p style='margin-left: 5px;' class='inst_name'>BT3</p>");
bt_3_element.append(bt_3_shortname);
$("#input_tag").append(bt_3_element);

var bt_4_element = $("<div id='ins_bt4' class='port_inst' data-name='bt4'></div>");
var bt_4_img = $("<img src='/public/assets/icon/simulator/icon_button_yellow.png' alt='some_text' width='32' height='32' class='icon_list'>");
bt_4_element.append(bt_4_img);
var bt_4_fullname = $("<p style='margin-left: 5px;' class='inst_type'>Button #4:</p>");
bt_4_element.append(bt_4_fullname);
var bt_4_shortname = $("<p style='margin-left: 5px;' class='inst_name'>BT4</p>");
bt_4_element.append(bt_4_shortname);
$("#input_tag").append(bt_4_element);

//for outputs list
var cv_1_element = $("<div id='ins_cv1' class='port_inst' data-name='cv1'></div>");
var cv_1_img = $("<img src='/public/assets/icon/simulator/icon_conveyor_1.png' alt='some_text' width='32' height='32' class='icon_list'>");
cv_1_element.append(cv_1_img);
var cv_1_fullname = $("<p style='margin-left: 5px;' class='inst_type'>Conveyor #1:</p>");
cv_1_element.append(cv_1_fullname);
var cv_1_shortname = $("<p style='margin-left: 5px;' class='inst_name'>CV1</p>");
cv_1_element.append(cv_1_shortname);
$("#output_tag").append(cv_1_element);

var cv_2_element = $("<div id='ins_cv2' class='port_inst' data-name='cv2'></div>");
var cv_2_img = $("<img src='/public/assets/icon/simulator/icon_conveyor_2.png' alt='some_text' width='32' height='32' class='icon_list'>");
cv_2_element.append(cv_2_img);
var cv_2_fullname = $("<p style='margin-left: 5px;' class='inst_type'>Conveyor #2:</p>");
cv_2_element.append(cv_2_fullname);
var cv_2_shortname = $("<p style='margin-left: 5px;' class='inst_name'>CV2</p>");
cv_2_element.append(cv_2_shortname);
$("#output_tag").append(cv_2_element);

var ms_1_element = $("<div id='ins_cv2' class='port_inst' data-name='ms1'></div>");
var ms_1_img = $("<img src='/public/assets/icon/simulator/icon_motion.png' alt='some_text' width='32' height='32' class='icon_list'>");
ms_1_element.append(ms_1_img);
var ms_1_fullname = $("<p style='margin-left: 5px;' class='inst_type'>Sensor #1:</p>");
ms_1_element.append(ms_1_fullname);
var ms_1_shortname = $("<p style='margin-left: 5px;' class='inst_name'>MS1</p>");
ms_1_element.append(ms_1_shortname);
$("#output_tag").append(ms_1_element);

var ms_2_element = $("<div id='ins_cv2' class='port_inst' data-name='ms2'></div>");
var ms_2_img = $("<img src='/public/assets/icon/simulator/icon_motion.png' alt='some_text' width='32' height='32' class='icon_list'>");
ms_2_element.append(ms_2_img);
var ms_2_fullname = $("<p style='margin-left: 5px;' class='inst_type'>Sensor #2:</p>");
ms_2_element.append(ms_2_fullname);
var ms_2_shortname = $("<p style='margin-left: 5px;' class='inst_name'>MS2</p>");
ms_2_element.append(ms_2_shortname);
$("#output_tag").append(ms_2_element);

//interactive
bt_1_element.hover(
    function () {
        $("#mark_item").css({left: 330, top: 62}).show();
        $(this).css({"background-color": "#b0c4de"});
    },
    function () {
        $("#mark_item").hide();
        $(this).css({"background-color": "transparent"});
    }
);

bt_2_element.hover(
    function () {
        $("#mark_item").css({left: 385, top: 62}).show();
        $(this).css({"background-color": "#b0c4de"});
    },
    function () {
        $("#mark_item").hide();
        $(this).css({"background-color": "transparent"});
    }
);

bt_3_element.hover(
    function () {
        $("#mark_item").css({left: 330, top: 116}).show();
        $(this).css({"background-color": "#b0c4de"});
    },
    function () {
        $("#mark_item").hide();
        $(this).css({"background-color": "transparent"});
    }
);

bt_4_element.hover(
    function () {
        $("#mark_item").css({left: 385, top: 116}).show();
        $(this).css({"background-color": "#b0c4de"});
    },
    function () {
        $("#mark_item").hide();
        $(this).css({"background-color": "transparent"});
    }
);

cv_1_element.hover(
    function () {
        $("#mark_item").css({left: 330, top: 290}).show();
        $(this).css({"background-color": "#b0c4de"});
    },
    function () {
        $("#mark_item").hide();
        $(this).css({"background-color": "transparent"});
    }
);

cv_2_element.hover(
    function () {
        $("#mark_item").css({left: 360, top: 215}).show();
        $(this).css({"background-color": "#b0c4de"});
    },
    function () {
        $("#mark_item").hide();
        $(this).css({"background-color": "transparent"});
    }
);

ms_1_element.hover(
    function () {
        $("#mark_item").css({left: 105, top: 175}).show();
        $(this).css({"background-color": "#b0c4de"});
    },
    function () {
        $("#mark_item").hide();
        $(this).css({"background-color": "transparent"});
    }
);

ms_2_element.hover(
    function () {
        $("#mark_item").css({left: 223, top: 145}).show();
        $(this).css({"background-color": "#b0c4de"});
    },
    function () {
        $("#mark_item").hide();
        $(this).css({"background-color": "transparent"});
    }
);

//drag and drop
$(".port_inst").draggable({
//        handle: "div",
    start: function (event, ui) {
        $(".ui-dialog").hide();
    },
    stop: function (event, ui) {
        $(".ui-dialog").show();
    },
    helper: function () {
        //debugger;
        var name = $(this).data("name");
        var my_helper = $("<div></div>");
        var img_src = $(this).find("img").attr('src');
        my_helper.addClass("name_icon");
        my_helper.attr("data-name", name);
        my_helper.css({'background-image': "url("+img_src+")"
                });
        return my_helper;
    },
    cursorAt: {
        left: 16,
        top: 16
    }
}).draggable("option", {
    appendTo: "body",
    zIndex: 9999
}).attr("title", "Drag and drop to ladder logic components to assign it");

init();
animate();

$("body").keypress(function(e){
//    alert(e.keyCode + " is pressed");
    if(e.keyCode == 116){
//        light_1.visible = ! light_1.visible;
        scenario_outputs[0].outputs[0] = 1 - scenario_outputs[0].outputs[0];
    }
    else if(e.keyCode == 114){
        scenario_outputs[1].outputs[0] = 1 - scenario_outputs[1].outputs[0];
    };
});

// FUNCTIONS
function init() {
    // SCENE
    scene = new THREE.Scene();
    // CAMERA
//    var SCREEN_WIDTH = $("#ThreeJS").innerWidth(), SCREEN_HEIGHT = $("#ThreeJS").innerHeight();
    var VIEW_ANGLE = 28, ASPECT = SCREEN_WIDTH / SCREEN_HEIGHT, NEAR = 0.1, FAR = 20000;
    camera = new THREE.PerspectiveCamera(VIEW_ANGLE, ASPECT, NEAR, FAR);
    camera.position.set(59.5625, 75.3098, 185.6334);
    //camera.rotation.set(-0.07080589669724953, -0.01636707476392214, -0.0011607735708125102, "XYZ");
    camera.up = new THREE.Vector3(0, 1, 0);
    camera.lookAt(new THREE.Vector3(-14.2098, 15.7908, -45.8168));

    scene.add(camera);
    // RENDERER
    if (Detector.webgl)
        renderer = new THREE.WebGLRenderer({antialias: true});
    else
        renderer = new THREE.CanvasRenderer();
    renderer.setSize(SCREEN_WIDTH, SCREEN_HEIGHT);
    container = document.getElementById('ThreeJS');
    container.appendChild(renderer.domElement);
    // EVENTS
//    THREEx.WindowResize(renderer, camera);
//    THREEx.FullScreen.bindKey({ charCode: 'm'.charCodeAt(0) });
    // CONTROLS
//    controls = new THREE.OrbitControls( camera, renderer.domElement );
    // STATS
//    stats = new Stats();
//    stats.domElement.style.position = 'absolute';
//    stats.domElement.style.bottom = '0px';
//    stats.domElement.style.zIndex = 100;
//    container.appendChild(stats.domElement);
    // LIGHT
    //var scene_light1 = new THREE.PointLight(0xffffff);
    //scene_light1.intensity = 1;
    //scene_light1.position.set(-0, 70, 0);
    //
    //var scene_light2 = new THREE.PointLight(0xffffff,0.6, 200);
    ////scene_light2.intensity = 0.4;
    //scene_light2.position.set(65, 55, 100);
    //
    //scene.add(scene_light1);
    //scene.add(scene_light2);

    //
    var light_ambient = new THREE.AmbientLight( 0x404040 );

    // controlled lights
    var light_1 = new THREE.PointLight(0xffffff);
    light_1.intensity = 1.7;
    light_1.position.set(15, 400, 200);

    //var light_2 = new THREE.PointLight(0xffffff,0.5,200);
    //light_2.intensity = 0.4;
    //light_2.position.set(39.9557, 50.6934, -31.7897);
    //
    //var light_3 = new THREE.PointLight(0xffffff,0.5,200);
    //light_3.intensity = 0.4;
    //light_3.position.set(-15.4329, 50.6934, 32.1832);
    //
    //var light_4 = new THREE.PointLight(0xffffff,0.5,200);
    //light_4.intensity = 0.4;
    //light_4.position.set(39.9557, 50.6934, 32.1832);
    //
    //var light_5 = new THREE.PointLight(0xffffff,0.5,200);
    //light_5.intensity = 0.4;
    //light_5.position.set(-15.4329, 50.6934, 120.3386);
    //
    //var light_6 = new THREE.PointLight(0xffffff,0.5,200);
    //light_6.intensity = 0.4;
    //light_6.position.set(39.9557, 50.6934, 120.3386);

    scene.add(light_ambient);
    scene.add(light_1);
    //scene.add(light_2);
    //scene.add(light_3);
    //scene.add(light_4);
    //scene.add(light_5);
    //scene.add(light_6);


    // this is the special ball use to place 3D model----------------------------------------------
    var sphereGeometry = new THREE.SphereGeometry(5, 10, 10);
    // use a "lambert" material rather than "basic" for realistic lighting.
    //   (don't forget to add (at least one) light!)
    var sphereMaterial = new THREE.MeshLambertMaterial({color: 0x8888ff});
    var sphere = new THREE.Mesh(sphereGeometry, sphereMaterial);
    sphere.position.set(39.9557, 64.6934, 32.1832);
    //scene.add(sphere);

    //helper-------------------------------------
//        var axes = new THREE.AxisHelper(100);
//        scene.add( axes );

    // FLOOR-------------------------------------
//    var floorTexture = new THREE.ImageUtils.loadTexture( 'images/checkerboard.jpg' );
//    floorTexture.wrapS = floorTexture.wrapT = THREE.RepeatWrapping;
//    floorTexture.repeat.set( 10, 10 );
//    var floorMaterial = new THREE.MeshBasicMaterial( { map: floorTexture, side: THREE.DoubleSide } );
//    var floorGeometry = new THREE.PlaneGeometry(1000, 1000, 10, 10);
//    var floor = new THREE.Mesh(floorGeometry, floorMaterial);
//    floor.position.y = -0.5;
//    floor.rotation.x = Math.PI / 2;
//    scene.add(floor);

    // SKYBOX/FOG-------------------------------
//    var skyBoxGeometry = new THREE.CubeGeometry( 10000, 10000, 10000 );
//    var skyBoxMaterial = new THREE.MeshBasicMaterial( { color: 0x9999ff, side: THREE.BackSide } );
//    var skyBox = new THREE.Mesh( skyBoxGeometry, skyBoxMaterial );
//    // scene.add(skyBox);
//    scene.fog = new THREE.FogExp2( 0x9999ff, 0.00025 );

    ////////////
    // CUSTOM //
    ////////////

    // Note: if imported model appears too dark,
    //   add an ambient light in this file
    //   and increase values in model's exported .js file
    //    to e.g. "colorAmbient" : [0.75, 0.75, 0.75]

    var jsonLoader = new THREE.JSONLoader();
    jsonLoader.load("/public/assets/models/simulator/scene2/conveyor1.js", addModelToScene_1);

    // add tubes-------------------------------------
    //var jsonLoader = new THREE.JSONLoader();
    jsonLoader.load("/public/assets/models/simulator/scene2/tubes.js", addModelToScene_2);

    //add buttons
    //var jsonLoader = new THREE.JSONLoader();
    jsonLoader.load("/public/assets/models/simulator/scene2/button/bt_red.js", addModelToScene_bt1);
    jsonLoader.load("/public/assets/models/simulator/scene2/button/bt_blue.js", addModelToScene_bt2);
    jsonLoader.load("/public/assets/models/simulator/scene2/button/bt_green.js", addModelToScene_bt3);
    jsonLoader.load("/public/assets/models/simulator/scene2/button/bt_yellow.js", addModelToScene_bt4);

    //add boxes on the belt, one for each belt.
    //they will repeatedly move from right to left and back to right
    jsonLoader.load("/public/assets/models/simulator/scene2/box/box_model.js", addModelToScene_box1);
    jsonLoader.load("/public/assets/models/simulator/scene2/box/box_model.js", addModelToScene_box2);

    //add motion sensors
    jsonLoader.load("/public/assets/models/simulator/scene2/sensors/sensor_model_1.js", addModelToScene_ms1);
    jsonLoader.load("/public/assets/models/simulator/scene2/sensors/sensor_model_2.js", addModelToScene_ms2);

    //------------initialize the interactive objects


//        var jsonLoader = new THREE.JSONLoader();
//        jsonLoader.load( "models/test.js", addModelToScene );
    // addModelToScene function is called back after model has loaded

    //var ambientLight = new THREE.AmbientLight(0x111111);
    //scene.add(ambientLight);

    projector = new THREE.Projector();
    document.addEventListener('mousedown', onDocumentMouseDown, false);
    document.addEventListener('mouseup', onDocumentMouseUp, false);
}

function onDocumentMouseDown(event) {
    // the following line would stop any other event handler from firing
    // (such as the mouse's TrackballControls)
    // event.preventDefault();

    //console.log("Click.");

    // update the mouse variable
    mouse.x = ( (event.clientX - $("#ThreeJS").offset().left) /SCREEN_WIDTH ) * 2 - 1;
    mouse.y = -( (event.clientY - $("#ThreeJS").offset().top) /SCREEN_HEIGHT ) * 2 + 1;

    // find intersections

    // create a Ray with origin at the mouse position
    //   and direction into the scene (camera direction)
    var vector = new THREE.Vector3(mouse.x, mouse.y, 1);
    projector.unprojectVector(vector, camera);
    var ray = new THREE.Raycaster(camera.position, vector.sub(camera.position).normalize());

    // create an array containing all objects in the scene with which the ray intersects
    var intersects = ray.intersectObjects(targetList);

    // if there is one (or more) intersections
    if (intersects.length > 0) {
        //console.log("Hit @ " + toString( intersects[0].point ) );
        // change the color of the closest face.
        //var index = intersects[ 0 ].face.materialIndex;
        //intersects[ 0 ].object.material.materials[index].ambient = new THREE.Color(1, 0, 0);

        var on_click = intersects[ 0 ].object.name;

        switch (on_click) {
            case "BT_1":
                bt_1.userData = 1 - bt_1.userData;
                for(var i=0; i<scenario_inputs[0].targets.length; i++){
                    var index = scenario_inputs[0].targets[i];
                    my_list.Node_List[index].input = 1;
                    my_list.Node_List[index].make_oc();
                }
                bt_1.translateX(  -3);
                button_pushed = 1;
                break;
            case "BT_2":
                bt_2.userData = 1 - bt_2.userData;
                for(var i=0; i<scenario_inputs[1].targets.length; i++){
                    var index = scenario_inputs[1].targets[i];
                    my_list.Node_List[index].input = 1;
                    my_list.Node_List[index].make_oc();
                }
                bt_2.translateX(  -3);
                button_pushed = 2;
                break;
            case "BT_3":
                bt_3.userData = 1 - bt_3.userData;
                for(var i=0; i<scenario_inputs[2].targets.length; i++){
                    var index = scenario_inputs[2].targets[i];
                    my_list.Node_List[index].input = 1;
                    my_list.Node_List[index].make_oc();
                }
                bt_3.translateX(  -3 );
                button_pushed = 3;
                break;
            case "BT_4":
                bt_4.userData = 1 - bt_4.userData;
                for(var i=0; i<scenario_inputs[3].targets.length; i++){
                    var index = scenario_inputs[3].targets[i];
                    my_list.Node_List[index].input = 1;
                    my_list.Node_List[index].make_oc();
                }
                bt_4.translateX(  -3 );
                button_pushed = 4;
                break;
            default:
                break;
        }
        //intersects[ 0 ].object.geometry.colorsNeedUpdate = true;
    }

}

function onDocumentMouseUp(){
    if(button_pushed!=0){
        switch (button_pushed){
            case 1:
                for(var i=0; i<scenario_inputs[0].targets.length; i++){
                    var index = scenario_inputs[0].targets[i];
                    my_list.Node_List[index].input = 0;
                    my_list.Node_List[index].make_oc();
                }
                bt_1.translateX(  3);
                break;
            case 2:
                for(var i=0; i<scenario_inputs[1].targets.length; i++){
                    var index = scenario_inputs[1].targets[i];
                    my_list.Node_List[index].input = 0;
                    my_list.Node_List[index].make_oc();
                }
                bt_2.translateX(  3);
                break;
            case 3:
                for(var i=0; i<scenario_inputs[2].targets.length; i++){
                    var index = scenario_inputs[2].targets[i];
                    my_list.Node_List[index].input = 0;
                    my_list.Node_List[index].make_oc();
                }
                bt_3.translateX(  3);
                break;
            case 4:
                for(var i=0; i<scenario_inputs[3].targets.length; i++){
                    var index = scenario_inputs[3].targets[i];
                    my_list.Node_List[index].input = 0;
                    my_list.Node_List[index].make_oc();
                }
                bt_4.translateX(  3);
                break;
            default:
                break;
        }
        //
        //for(var i=0; i<scenario_inputs[2].targets.length; i++){
        //    var index = scenario_inputs[2].targets[i];
        //    my_list.Node_List[index].input = 0;
        //    my_list.Node_List[index].make_oc();
        //}
        //button_1.translateZ(  0.5 );
        button_pushed = 0;
    }
}

function addModelToScene_1(geometry, materials) {
    for(var i=0; i<materials.length; i++){
        materials[i].shading = THREE.FlatShading;
    }
    var material = new THREE.MeshFaceMaterial(materials);
    conveyor_room = new THREE.Mesh(geometry, material);
    conveyor_room.scale.set(10, 10, 10);
    conveyor_room.rotation.set(0,-1.57079633,0,'XYZ');
    scene.add(conveyor_room);
    //targetList.push(conveyor_room); the faceindex is 1 and 0
    obj_index = 2;
}

function addModelToScene_2(geometry, materials) {
    var material = new THREE.MeshFaceMaterial(materials);
    var tubes = new THREE.Mesh(geometry, material);
    tubes.scale.set(10, 10, 10);
    tubes.rotation.set(0,-1.57079633,0,'XYZ');
    scene.add(tubes);

    obj_index = 3;
}

function addModelToScene_bt1(geometry, materials){
    for(var i=0; i<materials.length; i++){
        materials[i].shading = THREE.FlatShading;
    }
    var material = new THREE.MeshFaceMaterial(materials);
    bt_1 = new THREE.Mesh(geometry, material);
    bt_1.name = "BT_1";
    bt_1.userData = 0;
    bt_1.scale.set(10, 10, 10);
    bt_1.rotation.set(0,-1.57079633,0,'XYZ');
    targetList.push(bt_1);
    scene.add(bt_1);
}

function addModelToScene_bt2(geometry, materials){
    for(var i=0; i<materials.length; i++){
        materials[i].shading = THREE.FlatShading;
    }
    var material = new THREE.MeshFaceMaterial(materials);
    bt_2 = new THREE.Mesh(geometry, material);
    bt_2.name = "BT_2";
    bt_2.userData = 0;
    bt_2.scale.set(10, 10, 10);
    bt_2.rotation.set(0,-1.57079633,0,'XYZ');
    targetList.push(bt_2);
    scene.add(bt_2);
}

function addModelToScene_bt3(geometry, materials){
    for(var i=0; i<materials.length; i++){
        materials[i].shading = THREE.FlatShading;
    }
    var material = new THREE.MeshFaceMaterial(materials);
    bt_3 = new THREE.Mesh(geometry, material);
    bt_3.name = "BT_3";
    bt_3.userData = 0;
    bt_3.scale.set(10, 10, 10);
    bt_3.rotation.set(0,-1.57079633,0,'XYZ');
    targetList.push(bt_3);
    scene.add(bt_3);
}

function addModelToScene_bt4(geometry, materials){
    for(var i=0; i<materials.length; i++){
        materials[i].shading = THREE.FlatShading;
    }
    var material = new THREE.MeshFaceMaterial(materials);
    bt_4 = new THREE.Mesh(geometry, material);
    bt_4.name = "BT_4";
    bt_4.userData = 0;
    bt_4.scale.set(10, 10, 10);
    bt_4.rotation.set(0,-1.57079633,0,'XYZ');
    targetList.push(bt_4);
    scene.add(bt_4);
}

function addModelToScene_box1(geometry, materials){
    for(var i=0; i<materials.length; i++){
        materials[i].shading = THREE.FlatShading;
    }
    var material = new THREE.MeshFaceMaterial(materials);
    box_1 = new THREE.Mesh(geometry, material);
    box_1.scale.set(10, 10, 10);
    box_1.position.set(box_1_start.x, box_1_start.y, box_1_start.z);
    box_1.rotation.set(0,-1.57079633,0,'XYZ');
    scene.add(box_1);
}

function addModelToScene_box2(geometry, materials){
    for(var i=0; i<materials.length; i++){
        materials[i].shading = THREE.FlatShading;
    }
    var material = new THREE.MeshFaceMaterial(materials);
    box_2 = new THREE.Mesh(geometry, material);
    box_2.scale.set(10, 10, 10);
    box_2.position.set(box_2_start.x, box_2_start.y, box_2_start.z);
    //box_2.position.set(test_pos);
    box_2.rotation.set(0,-1.57079633,0,'XYZ');
    scene.add(box_2);
}

function addModelToScene_ms1(geometry, materials){
    for(var i=0; i<materials.length; i++){
        materials[i].shading = THREE.FlatShading;
    }
    var material = new THREE.MeshFaceMaterial(materials);
    msensor_1 = new THREE.Mesh(geometry, material);
    msensor_1.scale.set(10, 10, 10);
    msensor_1.userData = 0;
    //box_2.position.set(test_pos);
    msensor_1.rotation.set(0,-1.57079633,0,'XYZ');
    scene.add(msensor_1);
}

function addModelToScene_ms2(geometry, materials){
    for(var i=0; i<materials.length; i++){
        materials[i].shading = THREE.FlatShading;
    }
    var material = new THREE.MeshFaceMaterial(materials);
    msensor_2 = new THREE.Mesh(geometry, material);
    msensor_2.scale.set(10, 10, 10);
    msensor_2.userData = 0;
    //box_2.position.set(test_pos);
    msensor_2.rotation.set(0,-1.57079633,0,'XYZ');
    scene.add(msensor_2);
}
//
//function addModelToScene_3(geometry, materials) {
//    var material = new THREE.MeshFaceMaterial(materials);
//    switch_2 = new THREE.Mesh(geometry, material);
//    switch_2.name = "SW2";
//    switch_2.userData = 0;
//    switch_2.scale.set(10, 10, 10);
//    scene.add(switch_2);
//    targetList.push(switch_2);
//    obj_index = 4;
//}

function animate() {
    requestAnimationFrame(animate);
    render();
    update();
}

function update() {
    //if (keyboard.pressed("z")) {
    //    // do something
    //    //light_1.visible = true;
    //}
    //
    ////check if switches is pushed-----------------------
    ////switch #1
    //if(switch_1!=null) {
    //    if (switch_1.userData == 1) {
    //        switch_1.material.materials[0].ambient = switch_active;
    //        switch_1.material.materials[0].emissive = high_em;
    //    }
    //    else {
    //        switch_1.material.materials[0].ambient = switch_off;
    //        switch_1.material.materials[0].emissive = low_em;
    //    }
    //}
    ////switch #2
    //if(switch_2 != null) {
    //    if (switch_2 != null && switch_2.userData == 1) {
    //        switch_2.material.materials[0].ambient = switch_active;
    //        switch_2.material.materials[0].emissive = high_em;
    //    }
    //    else {
    //        switch_2.material.materials[0].ambient = switch_off;
    //        switch_2.material.materials[0].emissive = low_em;
    //    }
    //}
    ////----------------------------------------------------
    //
    ////check if lights are on------------------------------
    //light_1.visible = true;
    // if the conveyor belt gets activated, belt #1
    if(scenario_outputs[0].outputs[0]==1){
        //light_1.intensity = 0;
        if(typeof conveyor_room != "undefined") {
            if(box_1.position.x < box_1_end.x){
                box_1.position.set(box_1_start.x, box_1_start.y, box_1_start.z);
            }
            else{
                box_1.translateZ(0.3);
            }
        }
    }
    else{
        //light_1.intensity = 0.4;
        //conveyor_room.material.materials[1].emissive =  red_em;
    }

    //for belt #2
    if(scenario_outputs[1].outputs[0]==1){
        if(typeof conveyor_room != "undefined") {
            if(box_2.position.x < box_2_end.x){
                box_2.position.set(box_2_start.x, box_2_start.y, box_2_start.z);
            }
            else{
                box_2.translateZ(0.3);
            }
        }
    }
    else{
        //light_2.intensity = 0.4;
        //conveyor_room.material.materials[0].emissive =  blue_em;
    }

    //motions sensors section
    if(typeof conveyor_room != "undefined") { // for the sensor 1
        if (box_1.position.x < (box_1_end.x + 10)) {
            //msensor_color = msensor_1.material.materials[0].color; // save for later restore
            //msensor_1.material.materials[0].color = new THREE.Color(0, 255, 0);
            //msensor_1.userData = 1;
            scenario_outputs[2].outputs[0] = 1;
            //msensor_1.material.color.setHex(0x00FF00);
        }
        else{
            scenario_outputs[2].outputs[0] = 0;
            //if(msensor_color == null) {
            //    msensor_color = msensor_1.material.materials[0].color;
            //}
            //else{
            //    msensor_1.material.materials[0].color = msensor_color;
            //}
        }
    }

    if(typeof conveyor_room != "undefined") { // for the sensor 2
        if (box_2.position.x < (box_2_end.x + 10)) {
            //msensor_color = msensor_1.material.materials[0].color; // save for later restore
            //msensor_2.material.materials[0].color = new THREE.Color(0, 255, 0);
            //msensor_2.userData = 1;
            //msensor_1.material.color.setHex(0x00FF00);
            scenario_outputs[3].outputs[0] = 1;
        }
        else{
            scenario_outputs[3].outputs[0] = 0;
            //msensor_2.userData = 0;
            //if(msensor_color == null) {
            //    msensor_color = msensor_2.material.materials[0].color;
            //}
            //else{
            //    msensor_2.material.materials[0].color = msensor_color;
            //}
        }
    }
    //change sensor light color
    if(typeof conveyor_room != "undefined") {
        if(scenario_outputs[2].outputs[0] == 1){ //sensor #1
            msensor_1.material.materials[0].color = new THREE.Color(0, 255, 0);
        }
        else{
            if(msensor_color == null) {
                msensor_color = msensor_1.material.materials[0].color;
            }
            else{
                msensor_1.material.materials[0].color = msensor_color;
            }
        }

        if(scenario_outputs[3].outputs[0] == 1){ //sensor #2
            msensor_2.material.materials[0].color = new THREE.Color(0, 255, 0);
        }
        else{
            if(msensor_color == null) {
                msensor_color = msensor_2.material.materials[0].color;
            }
            else{
                msensor_2.material.materials[0].color = msensor_color;
            }
        }
    }
        //---------------------------------------------------

    // For all the relay elements -----------------------------------------------------------------
    for(var i = 0; i<scenario_inputs[4].targets.length; i++){
        var index = scenario_inputs[3].targets[i];
        my_list.Node_List[index].input = scenario_outputs[0].outputs[0];
        my_list.Node_List[index].make_oc();
    }

    for(var i = 0; i<scenario_inputs[5].targets.length; i++){
        var index = scenario_inputs[3].targets[i];
        my_list.Node_List[index].input = scenario_outputs[1].outputs[0];
        my_list.Node_List[index].make_oc();
    }

    for(var i = 0; i<scenario_inputs[6].targets.length; i++){
        var index = scenario_inputs[3].targets[i];
        my_list.Node_List[index].input = scenario_outputs[2].outputs[0];
        my_list.Node_List[index].make_oc();
    }

    for(var i = 0; i<scenario_inputs[7].targets.length; i++){
        var index = scenario_inputs[3].targets[i];
        my_list.Node_List[index].input = scenario_outputs[3].outputs[0];
        my_list.Node_List[index].make_oc();
    }
//    controls.update();
//    stats.update();
}

function render() {
    renderer.render(scene, camera);
}

function reset_outputs(){
    for(var i=0; i<scenario_outputs.length; i++){
        for(var k=0; k<scenario_outputs[i].outputs.length; k++){
            scenario_outputs[i].outputs[k] = 0;
        }
    }
}

function reset_scene(){
    bt_1.userData = 0;
    bt_2.userData = 0;
    bt_3.userData = 0;
    bt_4.userData = 0;

    msensor_1.userData = 0;
    msensor_2.userData = 0;

    //switch_2.userData = 0;
    for(var i = 1; i < my_list.Node_List.length; i++){
        my_list.Node_List[i].make_oc();
    }
    reset_outputs();
}

//function click_switch(index){
//    switch(index){
//        case 1:
//            switch_1.userData = 1 - switch_1.userData;
//            for(var i=0; i<scenario_inputs[0].targets.length; i++){
//                var index = scenario_inputs[0].targets[i];
//                my_list.Node_List[index].input = switch_1.userData;
//                my_list.Node_List[index].make_oc();
//            }
//            break;
//        case 2:
//            switch_2.userData = 1 - switch_2.userData;
//            for(var i=0; i<scenario_inputs[1].targets.length; i++){
//                var index = scenario_inputs[1].targets[i];
//                my_list.Node_List[index].input = switch_2.userData;
//                my_list.Node_List[index].make_oc();
//            }
//            break;
//        default:
//            break;
//    }
//}