<?PHP

$data = ['page' => []];
if ('shop' === $params['page'])
{
	$data['page']['product_client_list'] = load_data('product_client_list', $params);
/*	if ($params['category'])
	{
		$category = $params['category'];
		$product_category = select_data('product_category');
		$data['page']['product_client_list'] = array_filter($data['page']['product_client_list'], function ($product) use ($category){
		});
		$data['page'][]
	}*/
}
if ('cart' === $params['page'])
	$data['page']['cart_client'] = load_data('cart_client', $params);

if ('command' === $params['page'])
	$data['page']['command_client_list'] = load_data('command_client_list', $params);

if (!isset($_SESSION['id']) or '' === $_SESSION['id'])
	$data['page']['pleasesignin'] = [[]];
else
	$data['page']['signedin'] = [['id' => $_SESSION['user']]];
return $data;
