<?PHP

function load_data($name, $params)
{
	$modelname = "models/" . $name . ".php";
	if (file_exists($modelname))
		return include($modelname);
	return array();
}

