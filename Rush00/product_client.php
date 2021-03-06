<?PHP

$data = array('page' => array('product_client' => array(), 'category_client' => array()));
$data['page']['product_client'] = select_data('product');
$data['page']['category_client'] = select_data('category');
$data['page']['product_category_client'] = 
$product_category = select_data('product_category', [], 'product');

foreach ($data['page']['product_client'] as &$product)
{
	$cat = [];
	$cat2 = $product_category[$product['id']] ? $product_category[$product['id']] : [];
	foreach ($GLOBALS['category'] as $a)
	{
		$found = false;
		foreach ($cat2 as $b)
			if ($b['category'] === $a['category'])
				$found = true;
		if (!$found)
			$cat[] = ['category' => $a['category'], 'product' => $product['id']];
	}
	foreach ($cat as &$b)
		$b['product'] = $product['id'];
	$product['page']['product_category_client'] = array_merge($cat, $cat2);
}

return $data;
