<?php
	function ft_is_sort($tab)
	{
		$tab_sort = $tab;
		sort($tab_sort);
		if (array_diff_assoc($tab, $tab_sort ) == NULL)
			return true;
		else
			return false;
	}
?>
