<?php 
/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

/**
 * Custom Fields
 */
class Ul_custom_fields{


	function __construct(){
		 
		 add_action( 'add_meta_boxes',  array( $this, 'price_section_add_meta_box') );
		 add_action( 'save_post', array( $this, 'price_section_save') );
	}


	public function price_section_get_meta($value){
		global $post;
		$field = get_post_meta( $post->ID, $value, true );
		if ( ! empty( $field ) ) {
			return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
		} else {
			return false;
		}
	}
	public function price_section_add_meta_box() {
		add_meta_box(
			'price_section-price-section',
			__( 'Price Section', 'price_section' ),
			array( $this, 'price_section_html'),
			'property',
			'side',
			'high'
		);
	}
	public function price_section_html( $post) {
		wp_nonce_field( '_price_section_nonce', 'price_section_nonce' ); ?>
			
			<p>
			<label for="cs_price"><?php _e( 'Price', 'price_section' ); ?></label><br>
			<input type="text" name="cs_price" value="<?php echo $this->price_section_get_meta( 'cs_price' ); ?>">
			</p>

			<?php
		}

	public	function price_section_save( $post_id ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if ( ! isset( $_POST['price_section_nonce'] ) || ! wp_verify_nonce( $_POST['price_section_nonce'], '_price_section_nonce' ) ) return;
		if ( ! current_user_can( 'edit_post', $post_id ) ) return;

		if ( isset( $_POST['cs_price'] ) )
			update_post_meta( $post_id, 'cs_price', esc_attr( $_POST['cs_price'] ) );
		
	}



}


new Ul_custom_fields();
