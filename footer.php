<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

  <?php if( $has_subheader != true ): ?>
    <!-- Only endtag if has no subheader, since those end before here -->
    </div><!-- .layout-main-inner-wrap -->
  </div><!-- #main .layout-main-wrap -->
  <?php endif; ?>
  
<!--   <div class="layout-footer-wrap">

    <footer id="colophon" class="main-footer" role="contentinfo">
      <figure class="footer-plug">
        We talk about Manga with Love.
      </figure>
    </footer>

  </div> -->

</div><!-- #page .layout-page-wrap -->

<?php wp_footer(); ?>
</body>
</html>