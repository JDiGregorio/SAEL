<?php
	function tree_element($entry, $all_entries)
	{
		
			echo '<li>';
			echo $entry->name;


			$children = [];
			foreach ($all_entries as  $subentry) {
				if ($subentry->parent_id == $entry->id) {
					$children[] = $subentry;
				}
			}

			$children = collect($children)->sortBy('lft');

			if (count($children)) {
				echo '<ol>';
				foreach ($children as $child) {
					tree_element($child, $all_entries);
				}
				echo '</ol>';
			}
			echo '</li>';
		

		return $entry;
	}
?>

<?php
	$all_entries = $menus;
	$root_entries = $all_entries->filter(function ($item) {
		return $item->parent_id == 0;
	});
	
	foreach ($root_entries as $entry){
		tree_element($entry, $all_entries);
	}
?>