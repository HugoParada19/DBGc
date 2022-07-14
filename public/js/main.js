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

function changeThis()
{
	const obj = JSON.parse(document.getElementById('marcacao').value);
	date = new Date(obj.dataHora_levantar);
	let dateString = new Date(date.getTime() - (date.getTimezoneOffset() * 60000 ))
                    .toISOString()
                    .split("T")[0];
	document.getElementById('dataHora').value = dateString;
}
