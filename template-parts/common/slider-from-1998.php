<div class="autoplay slider-from-1998">
	<?php
		$rows = get_field('logos_work_with__', 'option')["from-1998"];
		$rows2 = [];
		$row;
		while($row = array_pop($rows)) {
			$rows2[] = $row;
			$img = $row['image'];
			$url = $img['url'];
			$w = $img['width'];
			?>
			<div><img src="<?=$url?>" alt="" width="<?=$w?>"></div>
		<?php
		}
		$row;
		while($row = array_shift($rows2)) {
			$img = $row['image'];
			$url = $img['url'];
			$w = $img['width'];
			?>
			<div><img src="<?=$url?>" alt="" width="<?=$w?>"></div>
		<?php
		}
	?>
</div>