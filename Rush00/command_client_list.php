<?PHP

$data = ['page' => []];
$data['page']['command_client'] = select_data("command");

foreach($data['page']['command_client'] as &$command)
{
	foreach(select_data('command_product', ['command' => $command['id']]) as $command_product)
	{
		$command['page']['command_product_client'][] =
			array_shift(select_data('product', ['id' => $command_product['product']]));
	}
}

return $data;
