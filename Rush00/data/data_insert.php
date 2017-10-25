<?PHP

function table_entry_already_exists($id)
{
	if ($id)
	{
		foreach($data as $entry)
		{
			if ($id === $entry['id'])
				return true;
		}
	}
	return false;
}

function insert_data($table, $values)
{
	$folder = $_SERVER["DOCUMENT_ROOT"] . "/rush00/data/tables/";
	$filename = $folder . $table;
	if (!file_exists($filename))
		return NULL;
	$h = fopen($filename, "rw");
	flock($h, LOCK_EX);
	$data = json_decode(file_get_contents($filename));
	if (NULL === $data)
		$data = [];
	$id = $values['id'];
	if (!table_entry_already_exists($id))
	{
		if (!$id)
			$id = (string)count($data);
		$values['id'] = $id;
		$data[] = (object)$values;
	}
	file_put_contents($filename, json_encode($data));
	fclose($h);
	return $id;
}
