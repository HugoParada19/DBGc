var mainURL = "http://localhost:8000";
function changeURL(rested)
{
	document.location.href = mainURL + rested;
}

function iCanExist(rested)
{
	alert("Este polo já existe, por favor dê um outro nome");
	
	changeURL(rested);
}
