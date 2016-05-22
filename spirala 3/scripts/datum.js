window.onload = function init()
{
	var vijesti = document.getElementById("vijesti");
	for(var i = 0; i < novosti.length; i++)
	{
		var trenutnoVrijeme = new Date();
		trenutnoVrijeme = trenutnoVrijeme.getTime();
		razlikaVremena = (trenutnoVrijeme - novosti[i].vrijeme_objave)/1000; 
		razlikaVremena = dajVrijeme(razlikaVremena, novosti[i].vrijeme_objave);
		var novost = document.createElement("div");
		novost.className = "novost";
		var img = document.createElement("img");
		img.src = novosti[i].image;
		img.alt = novosti[i].alt;
		novost.appendChild(img);
		var h4 = document.createElement("h4");
		h4.innerHTML = novosti[i].naslov;
		novost.appendChild(h4);
		var p = document.createElement("p");
		p.innerHTML = novosti[i].opis;
		novost.appendChild(p);
		var vrijemeObjave = document.createElement("p");
		vrijemeObjave.innerHTML = "<i>" + razlikaVremena + "</i>";	
		novost.appendChild(vrijemeObjave);
		vijesti.appendChild(novost);	
	
	}
}

function dropFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

function kreirajNovost(novaNovost, razlikaVremena){
	razlikaVremena = dajVrijeme(razlikaVremena, novaNovost.vrijeme_objave);
	var novost = document.createElement("div");
	novost.className = "novost";
	var img = document.createElement("img");
	img.src = novaNovost.image;
	img.alt = novaNovost.alt;
	novost.appendChild(img);
	var h4 = document.createElement("h4");
	h4.innerHTML = novaNovost.naslov;
	novost.appendChild(h4);
	var p = document.createElement("p");
	p.innerHTML = novaNovost.opis;
	novost.appendChild(p);
	var vrijemeObjave = document.createElement("p");
	vrijemeObjave.innerHTML = "<i>" + razlikaVremena + "</i>";	
	novost.appendChild(vrijemeObjave);
	vijesti.appendChild(novost);
}

function dajVrijeme(razlikaVremena, vrijemeObjave){

	if(razlikaVremena<60) 
		razlikaVremena = "--Novost objavljena prije par sekundi";
	
	else 
		if(razlikaVremena<3600)
		{
			var tmp = Math.round(razlikaVremena/60);
			var tmpString = tmp.toString();
			razlikaVremena = "--Novost je objavljena prije " + tmp;
			if(tmp == 1 || tmp == 2 || tmp == 3 || tmp == 4) 
				razlikaVremena += " minute";
			else 
				if( (tmp%10==1 || tmp%10==2 || tmp%10==3|| tmp%10==4) && tmp/10!=1 ) 
					razlikaVremena += " minute";
			else razlikaVremena += " minuta";
		}
	
	
	else 
		if(razlikaVremena<86400)
		{
			var tmp = Math.round(razlikaVremena/3600);
			var tmpString = tmp.toString();
			razlikaVremena = "--Novost je objavljena prije " + tmp;
			if( tmp == 1 || tmp == 21) 
				razlikaVremena += " sat";
			else 
				if(tmp == 2 || tmp==3 || tmp==4 || tmp==22 || tmp ==23) 
					razlikaVremena += " sata";
			else 
				razlikaVremena += " sati";
		}
	
	else 
		if(razlikaVremena<604800)
		{
			var tmp = Math.round(razlikaVremena/86400);
			var tmpString = tmp.toString();
			razlikaVremena = "--Novost je objavljena prije " + tmp;
			if(tmp == 1 ) 
				razlikaVremena += " dan";
			else 
				razlikaVremena += " dana";
		} 
	
	else 
		if(razlikaVremena<2419200)
		{
			var tmp = Math.round(razlikaVremena/604800);
			razlikaVremena = "--Novost je objavljena prije " + tmp;
			if(tmp == 1) 
				razlikaVremena += " sedmicu";
			else 
				razlikaVremena += " sedmice";
		} 
	
	else
	{
		razlikaVremena = vrijemeObjave;
		var vrijeme = new Date(razlikaVremena);
        var dateToStr = vrijeme.toUTCString().split(' ');
        var datum = dateToStr[2] + ' ' + dateToStr[1] +", "+dateToStr[3];
		
		razlikaVremena = "--Novost je objavljena " + datum;
			
	} 
	return razlikaVremena;
}
