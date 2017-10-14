var list = $('#ft_list');

$(document).ready(function() {
	$('#button').click(create_to_do);
	if (document.cookie != "")
	for(let todo of JSON.parse(document.cookie.substring(4)))
	{
		var div = $("<div></div>").text(todo);
		$(div).click(delete_todo);
		$(list).append(div);
	}
});

function register_cookie()
{
	var tab_cookie = [];
	for (let e of $('#ft_list div'))
		tab_cookie.push(e.innerHTML)
	document.cookie = 'hop=' + JSON.stringify(tab_cookie);
}

function create_to_do(){
	var new_todo = prompt("Create a new element!!!");
	if (new_todo != '')
	{
		var div = $("<div></div>").text(new_todo);
		$(div).click(delete_todo);
		$(list).prepend(div);
		register_cookie();
	}
}

function delete_todo(event) {
	event.preventDefault();
	if (confirm("Do you want to delete this element?"))
	{
		$(event.target).remove();
		register_cookie();
	}
}
