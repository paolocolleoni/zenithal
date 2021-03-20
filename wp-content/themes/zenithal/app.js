import * as THREE from './js/three/three.module.js';
import { OrbitControls } from './js/three/OrbitControls.js';
import { DeviceOrientationControls } from './js/three/DeviceOrientationControls.js';
import { Reflector } from './js/three/Reflector.js';
import { OBJLoader } from './js/three/OBJLoader.js';

import { gsap, TimelineLite, Power1, Power4 } from "./js/gsap/all.js";


//retrieve model
var objs =[];
var elms =[];
var model = JSON.parse(document.getElementById('model').value);
var els = model['elementi'];


for (var key in els) {
    if (els.hasOwnProperty(key)) {
        elms.push(els[key]);
    }
}

for (var key in elms) {
    if (elms.hasOwnProperty(key)) {
        var elemento = elms[key];
        loadModel(elemento['obj'],elemento['id'],elemento['nome']);
    }
}




//prepare scene
//SCENE
function getScene() {
    var scene = new THREE.Scene();

    return scene;
}

//CAMERA
function getCamera() {
    var camera = new THREE.PerspectiveCamera(25, window.innerWidth / window.innerHeight, 1, 20000 );
    camera.position.set(1.2,1.6,1.2);

    return camera;
}

//LIGHT
function getLight(scene) {

    // var lightOne = new THREE.RectAreaLight( 0xffffff, 1, 139.2893701, 121.1814961 );
    // lightOne.position.set( -170.3003937, 119.913386, 1.0480315 );
    // lightOne.lookAt( 0, 125.2925197, 0 );
    // scene.add( lightOne );
    // var rectLightHelper = new THREE.RectAreaLightHelper( lightOne );
    // lightOne.add( rectLightHelper );
    
    // var lightTwo = new THREE.RectAreaLight( 0xffffff, 1, 139.2893701, 121.1814961 );
    // lightTwo.position.set( 122.3625984, 119.913386, 1.0480315 );
    // lightTwo.lookAt( 0, 125.2925197, 0 );
    // scene.add( lightTwo );
    // var rectLightHelper = new THREE.RectAreaLightHelper( lightTwo );
    // lightTwo.add( rectLightHelper );
    
    var lightOne = new THREE.SpotLight( 0xb9b9b9, 0.5 );
    scene.add( lightOne );
    lightOne.position.set( -600, 119.913386, 1.0480315 );
    lightOne.lookAt(0,0,0);
    
    var lightTwo = new THREE.SpotLight( 0xb9b9b9, 0.5 );
    scene.add( lightTwo );
    lightTwo.position.set( 600, 119.913386, 1.0480315 );
    lightTwo.lookAt(0,0,0);
    
    var hemiLight = new THREE.HemisphereLight( 0xededed, 0x444444, 1);
    scene.add( hemiLight );
            
    return light;
}

//RENDERER
function getRenderer() {
    
    var renderer = new THREE.WebGLRenderer({antialias: true, alpha: true});
        renderer.setPixelRatio(window.devicePixelRatio);
        renderer.setSize(window.innerWidth, window.innerHeight);

    document.getElementById('view').appendChild(renderer.domElement);

    return renderer;
}

//CONTROLS
//orbit
function getControls(camera, renderer) {
    var controls = new OrbitControls( camera, renderer.domElement );
        controls.enableDamping = true;
        controls.dampingFactor = 0.3;
        controls.screenSpacePanning = true;
        controls.target = new THREE.Vector3( Number(0),Number(1.4),Number(0) );
        controls.minPolarAngle = 1.28; // radians
        controls.maxPolarAngle = Math.PI / 1.79; // radians
        // controls.minAzimuthAngle = -0.4; // radians
        // controls.maxAzimuthAngle = 0.4; // radians
        controls.minDistance = 1;
        controls.maxDistance = 100;

    return controls;
}

//RENDER
function render() {
    requestAnimationFrame(render);
    renderer.render(scene, camera);
    controls.update();
    // var x = document.getElementById('render_status').value;
    // if(x==0){
    //     document.getElementById('render_status').value = 1;
    // }
};

//LOAD FLOOR
function loadFloor(){
	var meshFloor = new THREE.Mesh(
		new THREE.PlaneGeometry(10,10, 10,10),
		new THREE.MeshBasicMaterial({color:0x00ff00, wireframe: true})
	);
	meshFloor.rotation.x -= Math.PI / 2;
	scene.add(meshFloor)
}


//LOAD MODEL
//LOAD MODEL
function loadModel(objToLoad,objId,nome) {

    var loader = new OBJLoader();
    loader.load( objToLoad, function ( object ) {

        var els = [];

        object.children.forEach(function (mesh) {
            mesh.geometry.addGroup( 0, Infinity, 0 );
            mesh.geometry.addGroup( 0, Infinity, 1 );
            mesh.geometry.addGroup( 0, Infinity, 2 );
            mesh.geometry.addGroup( 0, Infinity, 3 );
            mesh.geometry.addGroup( 0, Infinity, 4 );
            mesh.geometry.addGroup( 0, Infinity, 5 );
            mesh.geometry.addGroup( 0, Infinity, 6 );
            mesh.geometry.addGroup( 0, Infinity, 7 );
            mesh.geometry.addGroup( 0, Infinity, 8 );
            mesh.geometry.addGroup( 0, Infinity, 9 );
            mesh.geometry.addGroup( 0, Infinity, 10 );
            mesh.geometry.addGroup( 0, Infinity, 11 );
            mesh.geometry.addGroup( 0, Infinity, 12 );
            mesh.geometry.addGroup( 0, Infinity, 13 );
            mesh.geometry.addGroup( 0, Infinity, 14 );
            mesh.geometry.addGroup( 0, Infinity, 15 );
            mesh.geometry.addGroup( 0, Infinity, 16 );
            mesh.geometry.addGroup( 0, Infinity, 17 );
            mesh.geometry.addGroup( 0, Infinity, 18 );
            mesh.geometry.addGroup( 0, Infinity, 19 );
            mesh.geometry.addGroup( 0, Infinity, 20 );
            mesh.geometry.addGroup( 0, Infinity, 21 );
            mesh.geometry.addGroup( 0, Infinity, 22 );
            mesh.geometry.addGroup( 0, Infinity, 23 );
            mesh.geometry.addGroup( 0, Infinity, 24 );
            mesh.geometry.addGroup( 0, Infinity, 25 );
            mesh.geometry.addGroup( 0, Infinity, 26 );
            mesh.geometry.addGroup( 0, Infinity, 27 );
            mesh.geometry.addGroup( 0, Infinity, 28 );
            mesh.geometry.addGroup( 0, Infinity, 29 );
            mesh.geometry.addGroup( 0, Infinity, 30 );

            var wires = new THREE.MeshBasicMaterial({color:0xf7f7f7, wireframe: true});

            var el = new THREE.Mesh( mesh.geometry, wires );
            
            el.rotation.y = 0.5;
            
            els.push(el);

        })       

        object.children = els;

        objs[objId] = object;

        scene.add( object ); 

        fill(objId,'0xff0000');

    });


}



console.log(objs);


//FILL
function fill(objId,colore){


    var materials = [];
    var normalFabric = new THREE.TextureLoader().load( document.getElementById('normalFabric').src );    

    var mat = "";
    mat = new THREE.MeshStandardMaterial( {     
        side: THREE.FrontSide,
        normalMap: normalFabric,
        // color: colore,
        transparent: true,
        metalness: 0,
        roughness: 1,
        opacity: 1,
    } );  
    materials.push(mat);

    var matIn = "";
    matIn = new THREE.MeshStandardMaterial( {     
        side: THREE.BackSide,
        normalMap: normalFabric,
        // color: colore,
        transparent: true,
        metalness: 0,
        roughness: 1,
        opacity: 1,
    } );    
    
    materials.push(matIn);

    var object = objs[objId];
    object.traverse( function( child ) {
        if ( child instanceof THREE.Mesh ) {
            child.material = materials;
        }
    } );

}






var scene = getScene();
var camera = getCamera();
var light = getLight(scene);
var renderer = getRenderer();
var controls = getControls(camera, renderer);

render();

// loadFloor();