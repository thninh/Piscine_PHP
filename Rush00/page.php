<?PHP

function load_page($page, $data)
{
	if (NULL === $data)
		return NULL;
	return preg_replace_callback('#<\((.*?)\)>#', function ($m) use ($data) {
		if (0 === strpos($m[1], 'page:'))
		{
			$page = substr($m[1], 5);
			if ($data['page'][$page])
				return (load_page($page, $data['page'][$page]));
		}
		elseif (0 === strpos($m[1], '*page:'))
		{
			$page = substr($m[1], 6);
			if ($data['page'][$page])
				return implode('', array_map(function ($sub_data) use ($page) {
					return load_page($page, $sub_data);
				}, $data['page'][$page]));
		}
		else
			return ($data[$m[1]]);
	}, file_get_contents('pages/' . $page . '.html'));
}
