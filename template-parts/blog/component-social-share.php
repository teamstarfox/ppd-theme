<?php
global $wp;

$current_url = home_url( add_query_arg( array(), $wp->request ) );
$encoded_url = urlencode( $current_url );

$facebook_sh = "https://www.facebook.com/sharer/sharer.php?u=$encoded_url";
$twitter_sh  = "https://twitter.com/intent/tweet?url=$encoded_url";
$email_sh    = "mailto:?subject=Check%20this%20out&body=$encoded_url";
?>
<div class="social-share social-icons">
    <div class="ss-icons">
        <span>Share:</span>
        <a href="<?php echo $facebook_sh; ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
            <img src="/wp-content/themes/planpackdiscover/assets/svg/social-facebook.svg" class="icon" alt="Facebook">
        </a>

        <a href="<?php echo $twitter_sh; ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
            <img src="/wp-content/themes/planpackdiscover/assets/svg/social-twitter.svg" class="icon" alt="Twitter">
        </a>

        <a href="<?php echo $email_sh; ?>" class="social-icon">
            <img src="/wp-content/themes/planpackdiscover/assets/svg/social-email.svg" class="icon" alt="Email">
        </a>

        <span class="copy-link social-icon" data-url="<?php echo esc_attr( $current_url ); ?>">
            <img src="/wp-content/themes/planpackdiscover/assets/svg/social-copy.svg" class="icon" alt="Copy link">
        </span>
    </div>
</div>
