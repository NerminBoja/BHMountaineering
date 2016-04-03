
function sortiranje(nacinSortiranja){
	
	var vijesti = document.getElementById("vijesti");
	while (vijesti.firstChild) {
  		vijesti.removeChild(vijesti.firstChild);
	}
	if(nacinSortiranja == 'dnevno')
	{
		for(var i = 0; i < novosti.length; i++){
			var trenutnoVrijeme = new Date();
			razlikaVremena = trenutnoVrijeme.getTime();
			razlikaVremena = (razlikaVremena - novosti[i].vrijeme_objave.getTime())/1000;
			if(razlikaVremena<86400){
				kreirajNovost(novosti[i], razlikaVremena);
			} 
		}
		return false;
	}
	else
		if ( nacinSortiranja == "sedmicno")
		{
			for(var i = 0; i < novosti.length; i++){
			var trenutnoVrijeme = new Date();
			razlikaVremena = trenutnoVrijeme.getTime();
			razlikaVremena = (razlikaVremena - novosti[i].vrijeme_objave.getTime())/1000;
			if (trenutnoVrijeme.getDay() == 0)
			{
				if(razlikaVremena<604800 && novosti[i].vrijeme_objave.getDay()!=0){
					kreirajNovost(novosti[i], razlikaVremena);
				}
			}
			else 
				if(trenutnoVrijeme.getDay() == 1)
				{
					if(razlikaVremena<86400){
					kreirajNovost(novosti[i], razlikaVremena);
					}
				}
			else 
				if(trenutnoVrijeme.getDay() == 2)
				{
					if(razlikaVremena<172800){
					kreirajNovost(novosti[i], razlikaVremena);
					}
				}
			else 
				if(trenutnoVrijeme.getDay() == 3)
				{
					if(razlikaVremena<259200){
					kreirajNovost(novosti[i], razlikaVremena);
					}
				}
			else 
				if(trenutnoVrijeme.getDay() == 4)
				{
					if(razlikaVremena<345600){
					kreirajNovost(novosti[i], razlikaVremena);
					}
				}
			else 
				if(trenutnoVrijeme.getDay() == 5)
				{
					if(razlikaVremena<432000){
					kreirajNovost(novosti[i], razlikaVremena);
					}
				}
			else 
				if(trenutnoVrijeme.getDay() == 6)
				{
					if(razlikaVremena<518400){
					kreirajNovost(novosti[i], razlikaVremena);
					}
				}
		}
		return false;
		}
	else
		if ( nacinSortiranja == "mjesecno")
		{
			for(var i = 0; i < novosti.length; i++)
			{
				var trenutnoVrijeme = new Date();
				razlikaVremena = trenutnoVrijeme.getTime();
				razlikaVremena = (razlikaVremena - novosti[i].vrijeme_objave.getTime())/1000;
				if(razlikaVremena<2419200 && novosti[i].vrijeme_objave.getMonth() == trenutnoVrijeme.getMonth())
				{
					kreirajNovost(novosti[i], razlikaVremena);
				} 
			}
			return false;
		}
	else
		if ( nacinSortiranja == "sve")
		{
			for(var i = 0; i < novosti.length; i++)
			{
				var trenutnoVrijeme = new Date();
				razlikaVremena = trenutnoVrijeme.getTime();
				razlikaVremena = (razlikaVremena - novosti[i].vrijeme_objave.getTime())/1000;
				kreirajNovost(novosti[i], razlikaVremena);
			}
			return false;
		}
}
