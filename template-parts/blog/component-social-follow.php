<?php
global $wp;

$current_url = home_url( add_query_arg( array(), $wp->request ) );
$encoded_url = urlencode( $current_url );

?>
<div class="social-follow social-icons">
    <div class="ss-icons">
        <span>Follow me:</span>
        <?php get_template_part( 'template-parts/blog/component', 'social-follow-icons' ); ?>
    </div>
</div>
