"use strict"

function storeadd(){
	localStorage.zone = this.id;
        localStorage.op = "add";
}

function storeedit(){
	var info = this.id;
        var infobits = info.split(",");
	localStorage.op = "edit";
	localStorage.zone = infobits[0];
	localStorage.name = infobits[1];
	localStorage.type = infobits[2];
	localStorage.address = infobits[3];

}
function storedelete(){
        var info = this.id;
        var infobits = info.split(",");
        localStorage.op = "delete";
        localStorage.zone = infobits[0];
	localStorage.name = infobits[1];
        localStorage.type = infobits[2];
	localStorage.address = infobits[3];
}

function init() {
	var addzones = document.getElementsByClassName('add');
	var editzones = document.getElementsByClassName('edit');
	var deletezones = document.getElementsByClassName('delete');
	
	for(let i = 0; i < addzones.length; i++) {
		addzones[i].onclick = storeadd;
	}
	for(let i = 0; i < editzones.length; i++) {
                editzones[i].onclick = storeedit;
        }
	for(let i = 0; i < deletezones.length; i++) {
                deletezones[i].onclick = storedelete;
        }

}

window.onload = init;
