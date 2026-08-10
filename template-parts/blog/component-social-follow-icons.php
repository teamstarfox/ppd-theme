<?php
$facebook_follow    = get_field('social_follow', 'option')['facebook'];
$instagram_follow   = get_field('social_follow', 'option')['instagram'];
$tiktok_follow      = get_field('social_follow', 'option')['tiktok'];
$twitter_follow     = get_field('social_follow', 'option')['twitter'];
?>

<a href="<?php echo $facebook_follow; ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
    <img src="/wp-content/themes/planpackdiscover/assets/svg/social-facebook.svg" class="icon" alt="Facebook">
</a>

<a href="<?php echo $instagram_follow; ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
    <img src="/wp-content/themes/planpackdiscover/assets/svg/social-instagram.svg" class="icon" alt="Instagram">
</a>

<a href="<?php echo $tiktok_follow; ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
    <img src="/wp-content/themes/planpackdiscover/assets/svg/social-tiktok.svg" class="icon" alt="TikTok">
</a>

<a href="<?php echo $twitter_follow; ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
    <img src="/wp-content/themes/planpackdiscover/assets/svg/social-twitter.svg" class="icon" alt="Twitter">
</a>