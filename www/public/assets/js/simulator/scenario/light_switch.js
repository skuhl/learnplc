/**
 * Created by bochao on 6/7/2014.
 */
/**
 *The lights and switches scenario is a simple example
 *Inputs: Switch #1: SW1
 *        Switch #2: SW2
 *        Button #1: BT1
 *Outputs: Light #1: LT1
 *         Light #2: LT2
 */

//initiate the stacker for inputs and outputs
var scenario_inputs = [];
var scenario_outputs = [];

var truth_table = [];

//------------------------------------inputs----------------------------------------
scenario_inputs.push(new sc_input("SW1"));
scenario_inputs.push(new sc_input("SW2"));
scenario_inputs.push(new sc_input("BT1"));
scenario_inputs.push(new sc_input("LT1"));
scenario_inputs.push(new sc_input("LT2"));

//counter test
//scenario_inputs.push(new sc_input("TON0D"));
//
//counter test
//scenario_inputs.push(new sc_input("TON0E"));
//

//------------------------------------outputs---------------------------------------
scenario_outputs.push(new sc_output("LT1"));
scenario_outputs.push(new sc_output("LT2"));


// MAIN

// standard global variables
var container, scene, camera, renderer, controls, stats;
var keyboard = new THREEx.KeyboardState();
var clock = new THREE.Clock();

// custom global variables
var light_room;
var switch_1;
var switch_2;
var button_1;
var button_pushed = 0;

var light_1;
var light_2;

var obj_index = 1;

// pick
var targetList = [];
var projector, mouse = { x: 0, y: 0 };

// colors
var switch_active = new THREE.Color(46 / 255, 204 / 255, 113 / 255);
var switch_off = new THREE.Color(0.6392156862745098, 0.6392156862745098, 0.6392156862745098);

var low_em = new THREE.Color(0, 0, 0);
var high_em = new THREE.Color(23 / 255, 102 / 255, 56 / 255);
var red_em = new THREE.Color(192/255, 57/255, 43/255);
var blue_em = new THREE.Color(41/255, 128/255, 185/255);

var SCREEN_WIDTH = $("#ThreeJS").innerWidth();
var SCREEN_HEIGHT = $("#ThreeJS").innerHeight();

//inputs and outputs interactive
$("#ins_sw1").hover(
    function () {
        $("#mark_item").css({left: 568, top: 147}).show();
        $(this).css({"background-color": "#b0c4de"});
    },
    function () {
        $("#mark_item").hide();
        $(this).css({"background-color": "transparent"});
    }
);

$("#ins_sw2").hover(
    function () {
        $("#mark_item").css({left: 592, top: 147}).show();
        $(this).css({"background-color": "#b0c4de"});
    },
    function () {
        $("#mark_item").hide();
        $(this).css({"background-color": "transparent"});
    }
);

$("#ins_bt1").hover(
    function () {
        $("#mark_item").css({left: 618, top: 147}).show();
        $(this).css({"background-color": "#b0c4de"});
    },
    function () {
        $("#mark_item").hide();
        $(this).css({"background-color": "transparent"});
    }
);
//------------------end
//outputs --------------------------
$("#ins_lt1").hover(
    function () {
        $("#mark_item").css({left: 230, top: 15}).show();
        $(this).css({"background-color": "#b0c4de"});
    },
    function () {
        $("#mark_item").hide();
        $(this).css({"background-color": "transparent"});
    }
);

$("#ins_lt2").hover(
    function () {
        $("#mark_item").css({left: 386, top: 15}).show();
        $(this).css({"background-color": "#b0c4de"});
    },
    function () {
        $("#mark_item").hide();
        $(this).css({"background-color": "transparent"});
    }
);
//-----------------------end
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
        my_helper.addClass("name_icon");
        my_helper.attr("data-name", name);
        switch (name) {
            case "sw1":
            case "sw2":
                my_helper.css({
                    'background-image': "url(/public/assets/icon/simulator/icon_swi.png)"
                });
                break;
            case "bt1":
                my_helper.css({
                    'background-image': "url(/public/assets/icon/simulator/icon_button.png)"
                });
                break;
            case "lt1":
            case "lt2":
                my_helper.css({
                    'background-image': "url(/public/assets/icon/simulator/icon_light.png)"
                });
                break;
            default:
                break;
        }
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
//--------------end

init();
animate();

//$("body").keypress(function(e){
////    alert(e.keyCode + " is pressed");
//    if(e.keyCode == 116){
////        light_1.visible = ! light_1.visible;
//        scenario_outputs[0].outputs[0] = 1 - scenario_outputs[0].outputs[0];
//    }
//    else if(e.keyCode == 114){
//        scenario_outputs[1].outputs[0] = 1 - scenario_outputs[1].outputs[0];
//    };
//});

// FUNCTIONS
function init() {
    // SCENE
    scene = new THREE.Scene();
    // CAMERA
//    var SCREEN_WIDTH = $("#ThreeJS").innerWidth(), SCREEN_HEIGHT = $("#ThreeJS").innerHeight();
    var VIEW_ANGLE = 45, ASPECT = SCREEN_WIDTH / SCREEN_HEIGHT, NEAR = 0.1, FAR = 20000;
    camera = new THREE.PerspectiveCamera(VIEW_ANGLE, ASPECT, NEAR, FAR);
    camera.position.set(4.178269150775959, 50.66679385563774, 144.18520508640012);
    //camera.rotation.set(-0.07080589669724953, -0.01636707476392214, -0.0011607735708125102, "XYZ");
    camera.up = new THREE.Vector3(0, 1, 0);
    camera.lookAt(new THREE.Vector3(0, 50, -1));

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
    var scene_light1 = new THREE.PointLight(0xffffff);
    scene_light1.intensity = 1;
    scene_light1.position.set(-0, 70, 0);

    var scene_light2 = new THREE.PointLight(0xffffff,2,400);
//    scene_light2.intensity = 0.8;
    scene_light2.position.set(65, 55, 310);

    scene.add(scene_light1);
    scene.add(scene_light2);

    // controlled lights
    light_1 = new THREE.PointLight(0xe74c3c,0.4,0);
    light_1.position.set(-35, 110, -30);

    light_2 = new THREE.PointLight(0x3498db,0.4,0);
    light_2.position.set(30, 110, -30);

    scene.add(light_1);
    scene.add(light_2);

    // this is the special ball use to place 3D model----------------------------------------------
//    var sphereGeometry = new THREE.SphereGeometry(5, 10, 10);
//    // use a "lambert" material rather than "basic" for realistic lighting.
//    //   (don't forget to add (at least one) light!)
//    var sphereMaterial = new THREE.MeshLambertMaterial({color: 0x8888ff});
//    var sphere = new THREE.Mesh(sphereGeometry, sphereMaterial);
//    sphere.position.set(65, 55, 110);
//    scene.add(sphere);

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
    jsonLoader.load("/public/assets/models/simulator/scene/SC1_room.js", addModelToScene_1);

    // add inputs-------------------------------------
    //var jsonLoader = new THREE.JSONLoader();
    jsonLoader.load("/public/assets/models/simulator/inputs/switch_1.js", addModelToScene_2);

    //var jsonLoader = new THREE.JSONLoader();
    jsonLoader.load("/public/assets/models/simulator/inputs/switch_2.js", addModelToScene_3);

    jsonLoader.load("/public/assets/models/simulator/inputs/button_1.js", addModelToScene_4);

    //------------initialize the interactive objects


//        var jsonLoader = new THREE.JSONLoader();
//        jsonLoader.load( "models/test.js", addModelToScene );
    // addModelToScene function is called back after model has loaded

//    var ambientLight = new THREE.AmbientLight(0x111111,0.5);
//    scene.add(ambientLight);

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
    mouse.x = ( (event.clientX - $("#ThreeJS").offset().left) /SCREEN_WIDTH ) * 2-1;
    mouse.y = -( (event.clientY - $("#ThreeJS").offset().top) /SCREEN_HEIGHT ) * 2+1;

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
//        var index = intersects[ 0 ].face.materialIndex;
//        intersects[ 0 ].object.material.materials[index].ambient = new THREE.Color(1, 0, 0);

        var on_click = intersects[ 0 ].object.name;

        //switch 1 and 2 behavior
        switch (on_click) {
            case "SW1":
                switch_1.userData = 1 - switch_1.userData;
                for(var i=0; i<scenario_inputs[0].targets.length; i++){
                    var index = scenario_inputs[0].targets[i];
                    my_list.Node_List[index].input = switch_1.userData;
                    my_list.Node_List[index].make_oc();
                }
                break;
            case "SW2":
                switch_2.userData = 1 - switch_2.userData;
                for(var i=0; i<scenario_inputs[1].targets.length; i++){
                    var index = scenario_inputs[1].targets[i];
                    my_list.Node_List[index].input = switch_2.userData;
                    my_list.Node_List[index].make_oc();
                }
                break;
            case "BT1":
                button_1.userData = 1 - button_1.userData;
                for(var i=0; i<scenario_inputs[2].targets.length; i++){
                    var index = scenario_inputs[2].targets[i];
                    my_list.Node_List[index].input = 1;
                    my_list.Node_List[index].make_oc();
                }
                button_1.translateZ(  -0.5 );
                button_pushed = 1;
                break;
            default:
                break;
        }
        //intersects[ 0 ].object.geometry.colorsNeedUpdate = true;


    }

}

function onDocumentMouseUp(){
    if(button_pushed){
        for(var i=0; i<scenario_inputs[2].targets.length; i++){
            var index = scenario_inputs[2].targets[i];
            my_list.Node_List[index].input = 0;
            my_list.Node_List[index].make_oc();
        }
        button_1.translateZ(  0.5 );
        button_pushed = 0;
    }
}

function addModelToScene_1(geometry, materials) {
    var material = new THREE.MeshFaceMaterial(materials);
    light_room = new THREE.Mesh(geometry, material);
    light_room.scale.set(10, 10, 10);
    scene.add(light_room);
    targetList.push(light_room); //the faceindex is 1 and 0
    obj_index = 2;
}

function addModelToScene_2(geometry, materials) {
    var material = new THREE.MeshFaceMaterial(materials);
    switch_1 = new THREE.Mesh(geometry, material);
    switch_1.name = "SW1";
    switch_1.userData = 0;
    switch_1.scale.set(10, 10, 10);
    scene.add(switch_1);
    targetList.push(switch_1);
    obj_index = 3;
}

function addModelToScene_3(geometry, materials) {
    var material = new THREE.MeshFaceMaterial(materials);
    switch_2 = new THREE.Mesh(geometry, material);
    switch_2.name = "SW2";
    switch_2.userData = 0;
    switch_2.scale.set(10, 10, 10);
    scene.add(switch_2);
    targetList.push(switch_2);
    obj_index = 4;
}

function addModelToScene_4(geometry, materials) {
    var material = new THREE.MeshFaceMaterial(materials);
    button_1 = new THREE.Mesh(geometry, material);
    button_1.name = "BT1";
    button_1.userData = 0;
    button_1.scale.set(10, 10, 10);
    scene.add(button_1);
    targetList.push(button_1);
    obj_index = 5;
}

function animate() {
    requestAnimationFrame(animate);
    render();
    update();
}

function update() {
    if (keyboard.pressed("z")) {
        // do something
        //light_1.visible = true;
    }

    //check if switches is pushed-----------------------
    //switch #1
    if(switch_1!=null) {
        if (switch_1.userData == 1) {
            switch_1.material.materials[0].ambient = switch_active;
            switch_1.material.materials[0].emissive = high_em;
        }
        else {
            switch_1.material.materials[0].ambient = switch_off;
            switch_1.material.materials[0].emissive = low_em;
        }
    }
    //switch #2
    if(switch_2 != null) {
        if (switch_2 != null && switch_2.userData == 1) {
            switch_2.material.materials[0].ambient = switch_active;
            switch_2.material.materials[0].emissive = high_em;
        }
        else {
            switch_2.material.materials[0].ambient = switch_off;
            switch_2.material.materials[0].emissive = low_em;
        }
    }
    //----------------------------------------------------

    //check if lights are on------------------------------
    //light_1.visible = true;
    if(scenario_outputs[0].outputs[0]==0){
        light_1.intensity = 0;
        if(typeof light_room != "undefined") {
            light_room.material.materials[1].emissive = low_em;
        }
    }
    else{
        light_1.intensity = 0.4;
        light_room.material.materials[1].emissive =  red_em;
    }

    if(scenario_outputs[1].outputs[0]==0){
        light_2.intensity = 0;
        if(typeof light_room != "undefined") {
            light_room.material.materials[0].emissive = low_em;
        }
    }
    else{
        light_2.intensity = 0.4;
        light_room.material.materials[0].emissive =  blue_em;
    }
    //---------------------------------------------------
    // update rely elements
    // for light 1 first
    for(var i = 0; i<scenario_inputs[3].targets.length; i++){
        var index = scenario_inputs[3].targets[i];
        my_list.Node_List[index].input = scenario_outputs[0].outputs[0];
        my_list.Node_List[index].make_oc();
    }
    // for light 2
    for(var i = 0; i<scenario_inputs[4].targets.length; i++){
        var index = scenario_inputs[4].targets[i];
        my_list.Node_List[index].input = scenario_outputs[1].outputs[0];
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
    switch_1.userData = 0;
    switch_2.userData = 0;
    for(var i = 1; i < my_list.Node_List.length; i++){
        my_list.Node_List[i].make_oc();
    }
    reset_outputs();
}

function click_switch(index){
    switch(index){
        case 1:
            switch_1.userData = 1 - switch_1.userData;
            for(var i=0; i<scenario_inputs[0].targets.length; i++){
                var index = scenario_inputs[0].targets[i];
                my_list.Node_List[index].input = switch_1.userData;
                my_list.Node_List[index].make_oc();
            }
            break;
        case 2:
            switch_2.userData = 1 - switch_2.userData;
            for(var i=0; i<scenario_inputs[1].targets.length; i++){
                var index = scenario_inputs[1].targets[i];
                my_list.Node_List[index].input = switch_2.userData;
                my_list.Node_List[index].make_oc();
            }
            break;
        default:
            break;
    }
}
