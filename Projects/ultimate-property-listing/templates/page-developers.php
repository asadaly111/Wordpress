<?php get_header(); ?>
<?php
$development = get_terms('developer', array('orderby' => 'slug', 'hide_empty' => true));
?>


<div class="main-contents">
    <?php 
    if(have_posts()) : 
        while(have_posts()) : the_post();
            the_content();
        endwhile; 
    endif;
    ?>
</div>


<div class="main-contents">
    <ul class="width-25 developers">
        <?php
        foreach ($development as $key):
            $developer_phone = get_term_meta( $key->term_id, 'developer_phone', true );
            $developer_email = get_term_meta( $key->term_id, 'developer_email', true );
            $developer_Whatsapp = get_term_meta( $key->term_id, 'developer_Whatsapp', true );
            $image_id = get_term_meta( $key->term_id, 'developer_image_id', true );

            // pr(wp_get_attachment_metadata($image_id));

            ?>
            <li>
                <div class="inner-box">
                    <div class="inner-box-img">
                        <a href="<?php echo site_url('/developer/'.$key->slug); ?>">
                            <?php if( $image_id ) {
                                $thumbnail = wp_get_attachment_image_src($image_id,'thumbnail', true); ?>
                                <img src="<?php echo $thumbnail[0]; ?>" alt="">
                            <?php } ?>
                        </a>
                    </div>
                    <div class="grey-area">
                        <a href="#" data-phone="<?php echo $developer_phone;  ?>" data-name="<?php echo $key->name;  ?>" href="#" class="btn-modal" data-toggleModal="myModal1"><i class="fa fa-phone"></i></a>
                        <a href="https://web.whatsapp.com/send?phone=<?php echo $developer_Whatsapp; ?>&amp;text=Hi, I am Interested in 'Amora in Golf Verde'. Kindly let me know when we can meet and discuss about the project. Thank you." class="whatsapp-anchor"><i class="fa fa-whatsapp"></i></a>
                        <a href="#" data-whatsapp="<?php echo $developer_email; ?>" class="btn-modal" data-toggleModal="myModal2"><i class="fa fa-envelope"></i></a>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div style="clear: both;"></div>



<div id="myModal1" class="modal">
    <div class="modal-content"> <span  class="close" data-toggleModal="myModal1" >&times;</span>
        <img src="<?php echo $thumbnail[0]; ?>" alt="">
        <h3 class="developerName"></h3>
        <a href="#" class="developerPhone"></a>
        <h2>IMPORTANT NOTE:</h2>
        <p>This contact information is strictly limited for Real Estate Property Inquiries. Kindly do NOT contact on this for any other reasons.</p>
        <p>Thank you!</p>
    </div>
</div>

<div id="myModal2" class="modal">
    <form class="submitform" action="" method="POST">
        <div class="modal-content modal-content-big"> <span  class="close" data-toggleModal="myModal2" >&times;</span>
            <div class="modal-header"><h4 class="modal-title" id="contactLabel">
            Request a Meeting</h4><div class="modal-header-agent">
            <img src="" alt="">
            </div><div class="clearfix"></div></div>
            <ul class="width-50">
                <li>
                    <label>Text</label>
                    <input type="text" name="Name" required="">
                </li>
                <li>
                    <label>Email</label>
                    <input type="email" name="Email" required="">
                </li>
                <li>
                    <label>Phone</label>
                    <input type="tel" name="Phone" required="">
                </li>
                <li>
                    <label>Message</label>
                    <input type="text" name="message" required="">
                </li>
                <li>
                    <input type="submit">
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </form>
</div>



<?php get_footer(); ?>

<script type="text/javascript" src="<?php echo ULMAINURL; ?>/assets/vendor/loadingoverlay.min.js"></script> 
<script type="text/javascript" src="<?php echo ULMAINURL; ?>/assets/vendor/sweetalert.min.js"></script> 

<script>
jQuery(document).on('submit', '.submitform', function(event) {
  event.preventDefault();
  jQuery.LoadingOverlay("show");
  var form = jQuery(this);
  var formData = new FormData(jQuery(this)[0]);
  jQuery.ajax({
    type: 'post',
    url: '<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=ul_form_submit_email',
    dataType: 'json',
    contentType: false,
    processData: false,
    data: formData,
  })
  .done(function(value) {
    jQuery.LoadingOverlay("hide");
    if (value.status) {
      form.trigger('reset');
       swal('Thank You!', 'Your Request has been submited!','success');
    }
    console.log(value);
  })
  .fail(function() {
    jQuery.LoadingOverlay("hide");
    console.log("error");
  });
});










 jQuery(document).ready(function(){

  jQuery(".btn-modal").click(function(){

    if (jQuery(this).attr('data-toggleModal') =='myModal1') {
        jQuery('#myModal1 .developerName').text('');
        jQuery('#myModal1 .developerPhone').text('');
        jQuery('#myModal1 img').attr('src', '');

        var phone = jQuery(this).data('phone');
        var name = jQuery(this).data('name');
        var img = jQuery(this).closest('.inner-box').find('.inner-box-img a img').attr('src');
        jQuery('#myModal1 .developerName').text(name);
        jQuery('#myModal1 .developerPhone').text(phone);
        jQuery('#myModal1 img').attr('src', img);
    }

    if (jQuery(this).attr('data-toggleModal') =='myModal2') {
        jQuery('#myModal2 img').attr('src', '');
        var name = jQuery(this).data('name');
        var img = jQuery(this).closest('.inner-box').find('.inner-box-img a img').attr('src');
        jQuery('#myModal2 img').attr('src', img);
    }


     jQuery("#"+jQuery(this).attr('data-toggleModal')).css('display', 'block');
 });

  jQuery(".close").click(function(){
     jQuery("#"+jQuery(this).attr('data-toggleModal')).css('display', 'none');
 });

  jQuery(document).click(function(event) {
    if(jQuery(event.target).is('.modal')) {
       jQuery(".modal").css('display', 'none');
   } 
});

});

</script>