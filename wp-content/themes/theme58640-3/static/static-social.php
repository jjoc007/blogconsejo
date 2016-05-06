<?php /* Static Name: Social Links */ ?>
<ul class="social">
	<?php
		$social_networks = array("google_plus", "pinterest", "twitter", "facebook");
		for($i=0, $array_lenght=count($social_networks); $i<$array_lenght; $i++){
			if(of_get_option($social_networks[$i]) != "") {
				if( $social_networks[$i] == "google_plus") {
					echo '<li class="'.$social_networks[$i].'"><a href="'.of_get_option($social_networks[$i]).'" title="'.$social_networks[$i].'"><i class="icon-google-plus"></i></a></li>';
				} else {
					echo '<li class="'.$social_networks[$i].'"><a href="'.of_get_option($social_networks[$i]).'" title="'.$social_networks[$i].'"><i class="icon-'.$social_networks[$i].'"></i></a></li>';
				}
			}
		}
	?>
</ul>