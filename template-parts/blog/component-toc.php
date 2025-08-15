<?php
/**
 * Template part for displaying Table of Content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package planpackdiscover
 */
if(is_single()):
?>
<div id="table-of-contents">
	<h4 class="toc-header">Table of Contents</h4>
	<div class="toc-body">
		<ul id="table-of-contents-list"></ul>
	</div>
	<img src="/wp-content/themes/planpackdiscover/assets/svg/downarrow-white.svg" class="toc-icon" alt="expand or collapse the table of contents">
</div>
<?php endif; ?>