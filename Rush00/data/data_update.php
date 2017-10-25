<?PHP

function update_data($table, $filter, $values)
{
	$folder = $_SERVER["DOCUMENT_ROOT"] . "/rush00/data/tables/";
	$filename = $folder . $table;
	if (!file_exists($filename))
		return NULL;
	$h = fopen($filename, "rw");
	flock($h, LOCK_EX);
	$data = json_decode(file_get_contents($filename), true);
	if (NULL === $data)
		$data = [];
	$ids = array_keys(array_filter($data, function ($entry) use ($filter){
		foreach ($filter as $key => $value)
		{
			if ($entry[$key] !== $value)
				return false;
		}
		return true;
	}));
	foreach ($ids as $id)
	{
		foreach ($values as $key => $value)
			$data[$id][$key] = $value;
	}
	file_put_contents($filename, json_encode($data));
	fclose($h);
	return (count($ids));
}
