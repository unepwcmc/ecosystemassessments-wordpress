<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php if ( comments_open() ) :?>
		<div id="disqus_thread"></div>
		<script type="application/javascript">
			/**
			*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
			*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
			*/
			var disqus_config = function () {
				this.page.url = '<?php echo get_permalink(); ?>';
				if ( is_plugin_active( 'disqus-comment-system/disqus.php' ) ) {
					this.page.identifier = '<?php /* echo dsq_identifier_for_post($post); */ ?>';
				}
			};
			(function() {  // DON'T EDIT BELOW THIS LINE
				var d = document, s = d.createElement('script');

				s.src = '//www-iucnurbanalliance-org.disqus.com/embed.js';

				s.setAttribute('data-timestamp', +new Date());
				(d.head || d.body).appendChild(s);
			})();
		</script>
		<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<?php endif; // comments_open ?>
