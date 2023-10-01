<?php if (get_theme_mod('patricia_minimal_header_search', 1) == 1) : ?>
  <div class="header-search-wrapper">
	<button class="toggle-search pull-right menu-toggle" aria-controls="main-navigation" aria-expanded="false">
		<span class="fa fa-search"></span>
		<span class="fa fa-times"></span>
	</button>
  </div>
  <div class="patricia-header-search">
	<div class="patricia-header-search-wrap search-top-bar">
		<?php get_search_form(); ?>
	</div>
  </div>
<?php endif; ?>

<?php if (class_exists( 'woocommerce' )): ?>
	<div class="vt-user-cart">
		<?php echo patricia_minimal_header_cart(); ?>
	</div>
<?php endif; ?>