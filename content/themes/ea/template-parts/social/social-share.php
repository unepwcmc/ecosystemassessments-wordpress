<?php
  $page_url = get_site_url() . $_SERVER['REQUEST_URI'];
  $socials = array( 'facebook', 'twitter', 'email' );
  $social_share_urls = array(
    'email' => 'mailto:',
    'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . $page_url,
    'twitter' => 'https://twitter.com/intent/tweet?url=' . $page_url
  )
?>

<div class="soc-Social">
  <ul class="soc-Social_Icons">
    <?php foreach ($socials as $social) :
      $social_url = $social_share_urls[$social];
      if ($social_url != '') : ?>
        <li class="soc-Social_Icon">
          <a href="<?php echo $social_url; ?>" target="_blank" rel="noreferrer noopener" title="Share via <?php echo ucfirst($social); ?>">
            <span class="utl-ScreenReaderOnly"><?php echo $social; ?></span>
            <?php get_template_part( 'template-parts/icons/icon', $social ); ?>
          </a>
        </li>
      <?php endif; ?>
    <?php endforeach; ?>
  </ul>
</div>
