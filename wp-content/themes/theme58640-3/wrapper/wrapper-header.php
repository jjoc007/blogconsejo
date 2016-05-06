<?php /* Wrapper Name: Header */ ?>
<div class="stick-wrap">
	<div class="row">
		<div class="span6">
			<div class="logo-wrap" data-motopress-type="static" data-motopress-static-file="static/static-logo.php">
				<?php get_template_part("static/static-logo"); ?>
			</div>
			<div class="nav-wrap" data-motopress-type="static" data-motopress-static-file="static/static-nav.php">
				<?php get_template_part("static/static-nav"); ?>
			</div>
		</div>
		<div class="span6">
			<?php if (of_get_option('facebook') || of_get_option('twitter') || of_get_option('google_plus') || of_get_option('pinterest')) { ?>
				<div class="social-wrap" data-motopress-type="static" data-motopress-static-file="static/static-social.php">
					<?php get_template_part("static/static-social"); ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>