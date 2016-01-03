<?php global $option_setting; ?>
<?php if ($option_setting['facebook']) : ?>
<a target="_blank" title="<?php _e('Facebook','professional') ?>" id="facebook" href="<?php echo esc_url($option_setting['facebook']) ?>"></a>
<?php endif; ?>
<?php if ($option_setting['google']) : ?>
<a target="_blank" title="<?php _e('Google Plus','professional') ?>" id="google" href="<?php echo esc_url($option_setting['google']) ?>"></i></a>
<?php endif; ?>
<?php if ($option_setting['twitter']) : ?>
<a target="_blank" title="<?php _e('Twitter','professional') ?>" id="twitter" href="<?php echo esc_url($option_setting['twitter']) ?>"></a>
<?php endif; ?>
<?php if ($option_setting['rss-feed']) : ?>
<a target="_blank" title="<?php _e('RSS Feed','professional') ?>" id="rss" href="<?php echo esc_url($option_setting['rss-feed']) ?>"></a>
<?php endif; ?>
<?php if ($option_setting['instagram']) : ?>
<a target="_blank" title="<?php _e('Instagram','professional') ?>" id="instagram" href="<?php echo esc_url($option_setting['instagram']) ?>"></a>
<?php endif; ?>
<?php if ($option_setting['flickr']) : ?>
<a target="_blank" title="<?php _e('Flickr','professional') ?>" id="flickr" href="<?php echo esc_url($option_setting['flickr']) ?>"></a>
<?php endif; ?>