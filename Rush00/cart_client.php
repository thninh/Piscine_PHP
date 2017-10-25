<?PHP

$data = ['page' => []];

foreach(select_data('product') as &$pageprod)
	foreach($_SESSION['bag'] as $bagprod)
		if ($pageprod['id'] == $bagprod['id'] and $bagprod['quantity'] > 0)
		{
			$temp = $pageprod;
			$temp['page']['product_cart_bagged']['quantity'] = $bagprod['quantity'];
			$temp['page']['product_cart_bagged']['price_total'] = (string) ($bagprod['quantity'] * $pageprod['price']);
			$data['page']['product_cart_client'][] = $temp;
		}
if (isset($data['page']['product_cart_client']))
{
	$product_total = array_reduce($data['page']['product_cart_client'], function ($carry, $item) {
		return ($carry + $item['page']['product_cart_bagged']['quantity']);
	}, 0);

	$data['quantity'] = $product_total;
	$data['price_total'] = array_reduce($data['page']['product_cart_client'], function ($carry, $item) {
		return ($carry + $item['page']['product_cart_bagged']['price_total']);
	}, 0);
}

return $data;
