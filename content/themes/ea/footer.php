<?php
/**
 * The template for displaying the footer
 */
?>
					<?php if ( is_active_sidebar( 'after-content' ) ) { ?>
						<div class="wgt-Widgets">
							<div class="wgt-Widgets_Body">
								<div class="wgt-Widgets_Items">
									<?php dynamic_sidebar( 'after-content' ); ?>
								</div>
							</div>
						</div>
					<?php }?>
				</main>

				<!-- Footer  -->
				<footer class="lyt-Footer">
					<div class="ft-Footer">
						<div class="ft-Footer_Inner">
							<div class="ft-Footer_Header">
								<?php if ( is_active_sidebar( 'footer' ) ) { ?>
									<div class="ft-Widgets">
										<div class="ft-Widgets_Items">
											<?php dynamic_sidebar( 'footer' ); ?>
										</div>
									</div>
								<?php }?>
							</div>
							<div class="ft-Footer_Body">
								<!-- Footer Navigation -->
								<?php if ( has_nav_menu( 'footer' ) ) : ?>
									<?php get_template_part( 'template-parts/navigation/navigation', 'footer' ); ?>
								<?php endif; ?>
							</div>
							<div class="ft-Footer_Footer">
								<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
							</div>
						</div>
					</div>
				</footer>
			</div>

		<?php wp_footer(); ?>
	</body>
</html>
