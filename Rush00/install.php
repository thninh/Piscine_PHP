#!/usr/bin/php
<?PHP

$table_folder = "data/tables/";

if (!file_exists($table_folder))
	mkdir($table_folder);

$tables = explode(",", trim(file_get_contents("table_list.txt")));
foreach ($tables as $table)
	file_put_contents($table_folder . $table, NULL);

?>
