<?PHP

include('data.php');
include('page.php');
include('model.php');

$category = select_data('category');
$params['page'] = 'cart';

session_start();
if (!isset($_SESSION['bag']))
	$_SESSION['bag'] = [];

function load($name, $params)
{
	if (file_exists("pages/" . $name . ".html"))
		return load_page($name, load_data($name, $params));
}

