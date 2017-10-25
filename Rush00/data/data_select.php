<?PHP


function select_data($table, $filter = array(), $groupby = NULL)
{
	$folder = $_SERVER["DOCUMENT_ROOT"] . "/rush00/data/tables/";
	$filename = $folder . $table;
	if (!file_exists($filename))
		return NULL;
	$h = fopen($filename, "r");
	flock($h, LOCK_SH);
	$data = json_decode(file_get_contents($filename), true);
	fclose($h);
	if (NULL === $data)
		$data = [];
	$res = array_filter($data, function ($entry) use ($filter){
		foreach ($filter as $key => $value)
			if ($entry[$key] !== $value)
				return false;
		return true;
	});
	if ($groupby)
	{
		return array_reduce($res, function ($carry, $item) use ($groupby) {
			$carry[$item[$groupby]][] = $item;
			return $carry;
		}, []);
	}
	return $res;
}
