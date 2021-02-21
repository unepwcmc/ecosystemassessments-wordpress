<?php
/**
 * The template for displaying the footer
 */
?>
					<?php if ( is_active_sidebar( 'after-content' ) ) { ?>
						<div class="widgets">
							<div class="widgets__body">
								<div class="widgets__items">
									<?php dynamic_sidebar( 'after-content' ); ?>
								</div>
							</div>
						</div>
					<?php }?>
				</main>

				<!-- Footer  -->
				<footer class="layout__footer">
					<div class="footer">
						<div class="footer__inner">
							<div class="footer__header">
								<?php if ( is_active_sidebar( 'footer' ) ) { ?>
									<div class="footer-widgets">
										<div class="footer-widgets__items">
											<?php dynamic_sidebar( 'footer' ); ?>
										</div>
									</div>
								<?php }?>
							</div>
							<div class="footer__body">
								<!-- Footer Navigation -->
								<?php if ( has_nav_menu( 'footer' ) ) : ?>
									<?php get_template_part( 'template-parts/navigation/navigation', 'footer' ); ?>
								<?php endif; ?>
							</div>
							<div class="footer__footer">
								<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
							</div>
						</div>
					</div>
				</footer>
			</div>

		<?php wp_footer(); ?>
	</body>
</html>
