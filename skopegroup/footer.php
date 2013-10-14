		<div class="row row-footer">

			<footer role="contentinfo" class="footer clearfix">
				<div class="small-6 large-3 columns">
					<div class="navigation-inline">
						<?php wp_nav_menu( array( 'menu' => 'footer-nav', 'container_class' => 'menu-container' ) ); ?>
						<span class="copyright-traffic">
						&copy; Copyright Skope Goup 2013<br>
						Website by Traffic <a href="http://www.traffic.com.au/" target="_blank" class="digital-agency">Digital Agency</a>
						</span>
					</div>
				</div>
				<div class="small-6 large-3 columns left">
					<span class="footer-contact">
					National office<br>
					02 8677 5425<br>
					<a href="mailto:info@skopegroup.com.au">info@skopegroup.com.au</a>
					</span>
					<?php get_search_form(); ?>
				</div>
			</footer>

		</div>

		<?php wp_footer(); ?>

	</body>
</html>