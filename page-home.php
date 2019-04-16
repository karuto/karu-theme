<!doctype html>
<html <?php language_attributes(); ?>>
	<?php get_template_part( 'templates/partials/head' ); ?>

	<body <?php body_class('karuto-starter-theme'); ?>>
		<div id="page" class="site maxwidth">
		<?php get_template_part( 'templates/partials/header' ); ?>
			<div id="content">
				<section id="primary">
					<main id="main">
          
          <?php get_template_part( 'templates/page-home' ); ?>

					</main>
				</section>

			</div><!-- #content -->
			<?php get_template_part( 'templates/partials/footer' ); ?>
		</div><!-- #page -->

		<!-- TODO: this section below is specific to the site. Make it adaptable later. -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-41636874-3"></script>
    <script>
      window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'UA-41636874-3');
    </script>
	</body>
</html>
