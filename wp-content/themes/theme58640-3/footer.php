		<footer class="motopress-wrapper footer">
			<script>
			var geocoder;
			var map;

			var isDraggable = $(document).width() > 768 ? true : false;

			function initialize() {
				geocoder = new google.maps.Geocoder();
					
				var mapOptions = {
					zoom: <?php echo of_get_option('place_zoom'); ?>,
					disableDefaultUI: false,
					scrollwheel: false,
					panControl: true,
					scaleControl: true,
					draggable: isDraggable,
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					styles: [ { "featureType": "water", "elementType": "geometry", "stylers": [ { "visibility": "on" }, { "color": "#73b0c9" } ] },{ "featureType": "landscape.natural", "stylers": [ { "color": "#e3d5bf" } ] },{ "featureType": "road", "stylers": [ { "color": "#f8f0d9" } ] },{ } ]
				}

				map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
				codeAddress();
			}

			function codeAddress() {
			  var address = "<?php echo of_get_option('place'); ?>";
			  geocoder.geocode( { 'address': address}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					map.setCenter(results[0].geometry.location);
					var iconBase = '<?php echo get_bloginfo("stylesheet_directory") ?>/images/';
					var marker = new google.maps.Marker({
				        map: map,
				        icon: iconBase + 'map-icon.png',
				        position: results[0].geometry.location
				    });
				} else {
				  alert('Geocode was not successful for the following reason: ' + status);
				}
			  });
			}

			google.maps.event.addDomListener(window, 'load', initialize);

			</script>
			<?php if(of_get_option('map_display') !== 'off') { ?>
				<div id="map-canvas" class="<?php if(of_get_option('map_display') !== 'true') { ?>with-map-on-pages<?php } ?>"></div>
			<?php } ?>
			<div class="container">
				<div class="row">
					<div class="<?php echo cherry_get_layout_class( 'full_width_content' ); ?>" data-motopress-wrapper-file="wrapper/wrapper-footer.php" data-motopress-wrapper-type="footer" data-motopress-id="<?php echo uniqid() ?>">
						<?php get_template_part('wrapper/wrapper-footer'); ?>
					</div>
				</div>
			</div>
		</footer>
		<!--End #motopress-main-->
	</div>
	<div id="back-top-wrapper" class="visible-desktop">
		<p id="back-top">
			<?php echo apply_filters( 'cherry_back_top_html', '<a href="#top"><span></span></a>' ); ?>
		</p>
	</div>
	<?php if(of_get_option('ga_code')) { ?>
		<script type="text/javascript">
			<?php echo stripslashes(of_get_option('ga_code')); ?>
		</script>
		<!-- Show Google Analytics -->
	<?php } ?>
	<?php wp_footer(); ?> <!-- this is used by many Wordpress features and for plugins to work properly -->
</body>
</html>