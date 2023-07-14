"use strict"

function init()
{
	var opfield = document.getElementById('op');
        var op = localStorage.getItem('op');
        if(op != null) {
                opfield.value = op;
		opfield.readOnly = true;
        }
	var zonefield = document.getElementById('zone');
       	var zone = localStorage.getItem('zone');
        if(zone != null) {
                zonefield.value = zone;
        }

	
	var newfield = document.getElementById('new');
	var oldfield = document.getElementById('old');
	newfield.style.display = 'none';
	oldfield.style.display = 'none';
	
	if(op == 'add'){
		newfield.style.display = 'block';
	}

	if(op == 'edit') {
		newfield.style.display = 'block';
		var namefield = document.getElementById('name');
        	var name = localStorage.getItem('name');
		var namea = name.split(".");
		name = namea[0];
        	if(name != null) {
        	        namefield.value = name;
        	}
 		var typefield = document.getElementById('type');
        	var type = localStorage.getItem('type');
        	if(type != null) {
        	        typefield.value = type;
       		 }
		var addressfield = document.getElementById('address');
        	var address = localStorage.getItem('address');
        	if(address != null) {
        	        addressfield.value = address;
        	}
	}

	if(op == 'delete' || op == 'edit') {
		oldfield.style.display = 'block'
                var oldnamefield = document.getElementById('oldname');
                var oldname = localStorage.getItem('name');
		var oldnamea = oldname.split(".");
		oldname = oldnamea[0];
                if(oldname != null) {
                       oldnamefield.value = oldname;
                }
                var oldtypefield = document.getElementById('oldtype');
                var oldtype = localStorage.getItem('type');
                if(oldtype != null) {
                       oldtypefield.value = oldtype;
                }
		var oldaddressfield = document.getElementById('oldaddress');
		var oldaddress = localStorage.getItem('address');
		if(oldaddress != null) {
			oldaddressfield.value = oldaddress;
		}
	}
	


}

window.onload = init;
