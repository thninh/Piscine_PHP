<?PHP

$data = array('page' => array('product_admin' => array(), 'category_admin' => array()));
$data['page']['product_admin'] = select_data('product');
$data['page']['category_admin'] = select_data('category');
$data['page']['product_category_admin'] = 
$product_category = select_data('product_category', [], 'product');

//print_r($product_category);
foreach ($data['page']['product_admin'] as &$product)
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
	$product['page']['product_category_admin'] = array_merge($cat, $cat2);
}
//insert_data("product_category", array("product" => 'e', 'category' => 'lol'));

//print_r($data);

return $data;
