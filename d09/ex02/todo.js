var list = document.getElementById('ft_list');

window.onload = function() {
	document.querySelector("#button").addEventListener("click", create_to_do);
	if (document.cookie != "")
	for(let todo of JSON.parse(document.cookie.substring(4)))
	{
		var div = document.createElement("div");
		div.innerHTML = todo;
		div.addEventListener("click", delete_todo);
		list.append(div);
	}
}

function register_cookie()
{
	var tab_cookie = [];
	for (let e of list.getElementsByTagName('div'))
		tab_cookie.push(e.innerHTML)
	document.cookie = 'hop=' + JSON.stringify(tab_cookie);
}

function create_to_do(){
	var new_todo = prompt("Create a new element!!!");
	if (new_todo != '')
	{
		var div = document.createElement("div");
		div.innerHTML = new_todo;
		div.addEventListener("click", delete_todo);
		list.prepend(div);
		register_cookie();
	}
}

function delete_todo(event) {
	event.preventDefault();
	if (confirm("Do you want to delete this element?"))
	{
		list.removeChild(event.target);
		register_cookie();
	}
}
