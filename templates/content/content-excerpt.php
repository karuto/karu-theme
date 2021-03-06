<?php
/**
 * Template part for displaying post archives and search results.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('feed'); ?>>

	<a href="<?php the_permalink(); ?>">
		<h2 class="feed__title"><?php the_title(); ?></h1>
	</a>

	<div class="feed__excerpt">
		<?php echo get_the_excerpt(); ?>
	</div>

	<div class="feed__metas">
    <?php get_template_part( 'templates/content/content-post-meta' ); ?>
	</div>

</article>
