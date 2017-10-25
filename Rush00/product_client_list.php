<?PHP

$data = ['page' => ['product_client' => [], 'category_client' => []]];
$data['page']['product_client'] = select_data('product');
$data['page']['category_client'] = select_data('category');
$data['page']['product_category_client'] = 
$product_category = select_data('product_category', [], 'product');

foreach($_SESSION['bag'] as $bagprod)
	foreach($data['page']['product_client'] as &$pageprod)
		if ($pageprod['id'] == $bagprod['id'] and $bagprod['quantity'] > 0)
			$pageprod['page']['product_bagged']['quantity'] = $bagprod['quantity'];

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
