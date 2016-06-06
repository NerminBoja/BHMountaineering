function validacijaImenaIPrezimena(input){
	var tmp = false;
	
	for(var i = 0; i < input.value.length; i++)
	{   
		if( input.value[0]>='A' && input.value[0]<='Z')
		tmp = true;
	else {
		tmp = false;
		break;
	}
			if(input.value[i] == " " && i != (input.value.length - 1) && (input.value[i+1]>='A' && input.value[i+1]<='Z'))
			{
			
					tmp = true;
					break;
			}
				else tmp=false;
	}
	
	if(tmp)
		input.style.backgroundColor = "#0adfcf";
	else
		input.style.backgroundColor = "#ff0303";
}


function validacijaNaslova(input){
	var tmp = false;
	
	for(var i = 0; i < input.value.length; i++)
	{   
		if( input.value[0]>='A' && input.value[0]<='Z')
		tmp = true;
	else {
		tmp = false;
		break;
	}
	}
	
	if(tmp)
		input.style.backgroundColor = "#0adfcf";
	else
		input.style.backgroundColor = "#ff0303";
}


function validacijaEmail(input) {
    var valid = input.value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
if(valid)
		input.style.backgroundColor = "#0adfcf";
	else
		input.style.backgroundColor = "#ff0303";
}




function validacijaTelefona(input){
	var operater1 = document.getElementById("1").checked;
	var operater2 = document.getElementById("2").checked;
	var operater3 = document.getElementById("3").checked;
	var operater4 = document.getElementById("4").checked;
	var operater5 = document.getElementById("5").checked;
	if(operater1)
	{
		var tmp = new RegExp("06[1-2]-[0-9]{3}-[0-9]{3}$");
		var reg = tmp.test(input.value);
		if(reg)
			input.style.backgroundColor = "#0adfcf";
		else
			input.style.backgroundColor = "#ff0303";

	}
	else if(operater2)
	{
		var tmp = new RegExp("065-[0-9]{3}-[0-9]{3}$");
		var reg = tmp.test(input.value);
		if(reg)
			input.style.backgroundColor = "#0adfcf";
		else
			input.style.backgroundColor = "#ff0303";
	}
	else if(operater3)
	{
		var tmp = new RegExp("063-[0-9]{3}-[0-9]{3}$");
		var reg = tmp.test(input.value);
		if(reg)
			input.style.backgroundColor = "#0adfcf";
		else
			input.style.backgroundColor = "#ff0303";
	}
	else if(operater4)
	{
		var tmp = new RegExp("064-[0-9]{3}-[0-9]{3,4}$");
		var reg = tmp.test(input.value);
		if(reg)
			input.style.backgroundColor = "#0adfcf";
		else
			input.style.backgroundColor = "#ff0303";
	}
	else if(operater5)
	{
		var tmp = new RegExp("060-[0-9]{3}-[0-9]{3,4}$");
		var reg = tmp.test(input.value);
		if(reg)
			input.style.backgroundColor = "#0adfcf";
		else
			input.style.backgroundColor = "#ff0303";
	}
	
	else{
		input.style.backgroundColor = "#ff0303";
	}
}

function validacijaIzboraOperatera(){
	var telefonInput = document.getElementById("telefon");
	var operater1 = document.getElementById("1").checked;
	var operater2 = document.getElementById("2").checked;
	var operater3 = document.getElementById("3").checked;
	var operater4 = document.getElementById("4").checked;
	var operater5 = document.getElementById("5").checked;
	if(operater1)
	{
		var tmp = new RegExp("06[1-2]-[0-9]{3}-[0-9]{3}$");
		var reg = tmp.test(telefonInput.value);
		if(reg)
			telefonInput.style.backgroundColor = "#0adfcf";
		else
			telefonInput.style.backgroundColor = "#ff0303";

	}
	else if(operater2)
	{
		var tmp = new RegExp("065-[0-9]{3}-[0-9]{3}$");
		var reg = tmp.test(telefonInput.value);
		if(reg)
			telefonInput.style.backgroundColor = "#0adfcf";
		else
			telefonInput.style.backgroundColor = "#ff0303";
	}
	else if(operater3)
	{
		var tmp = new RegExp("063-[0-9]{3}-[0-9]{3}$");
		var reg = tmp.test(telefonInput.value);
		if(reg)
			telefonInput.style.backgroundColor = "#0adfcf";
		else
			telefonInput.style.backgroundColor = "#ff0303";
	}
	else if(operater4)
	{
		var tmp = new RegExp("064-[0-9]{3}-[0-9]{3,4}$");
		var reg = tmp.test(telefonInput.value);
		if(reg)
			telefonInput.style.backgroundColor = "#0adfcf";
		else
			telefonInput.style.backgroundColor = "#ff0303";
	}
	else if(operater5)
	{
		var tmp = new RegExp("060-[0-9]{3}-[0-9]{3,4}$");
		var reg = tmp.test(telefonInput.value);
		if(reg)
			telefonInput.style.backgroundColor = "#0adfcf";
		else
			telefonInput.style.backgroundColor = "#ff0303";
	}
	
	else{
		telefonInput.style.backgroundColor = "#ff0303";
	}
}
