<div class="messaging">
  <div class="inbox_msg">
    <div class="mesgs">
      <div class="msg_history">

        <?php
        global $obj,$wpdb;
        $msg = $obj->getRows($wpdb->prefix.'black_messages', ['where' =>['sender_id' =>$user_id, 'post_id' => $post->ID ] ]);
        if ($msg):
          foreach ($msg as $key):
            if ($key->text_by == 'sender') {
              echo '
              <div class="outgoing_msg">
              <div class="sent_msg">
              <p>'.$key->message.'</p>
              <span class="time_date">'.get_mesg_date($key->date).'</span>
              </div>
              </div>
              ';
            }else{
              echo '
              <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="'.feature_img($key->post_id).'" alt="sunil"> </div>
              <div class="received_msg">
              <div class="received_withd_msg">
              <p>'.$key->message.'
              </p>
             <span class="time_date">'.get_mesg_date($key->date).'</span>
              </div>
              </div>
              </div>
              ';
            }
          endforeach;
        endif ?>

      </div>
      <div class="type_msg">
        <form action="" id="messagesubmit">
          <div class="input_msg_write">
            <input type="hidden" name="post_id" value="<?php echo $post->ID;  ?>">
            <input type="hidden" name="reciver_id" value="<?php echo $post->post_author;  ?>">
            <input type="hidden" name="sender_id" value="<?php echo $user_id; ?>">
            <input type="hidden" name="text_by" value="sender">
            <input type="text" name="message" class="write_msg" placeholder="Type a message"/>
            <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  jQuery(document).ready(function() {
    jQuery(".msg_history").animate({scrollTop: jQuery(".msg_history")[0].scrollHeight }, 900); 
    jQuery(document).on('submit', '#messagesubmit', function(event) {
      event.preventDefault();
      var t = jQuery(this);
      jQuery(this).append('<div class="porto-ajax-loading"></div>');
      var form = jQuery(this);
      var formData = new FormData(jQuery(this)[0]);
      jQuery.ajax({
        type: 'post',
        url: '<?php echo site_url(''); ?>/wp-admin/admin-ajax.php?action=black_send_messages',
        dataType: 'json',
        contentType: false,
        processData: false,
        data: formData,
      })
      .done(function(value) {
        console.log(value);
        jQuery('.porto-ajax-loading').remove();

        jQuery('.msg_history').append(`
          <div class="outgoing_msg">
          <div class="sent_msg">
          <p>`+value.message+`</p>
          <span class="time_date">`+value.date+`</span> 
          </div>
          </div>
          `);
        t.trigger('reset');
        jQuery(".msg_history").animate({scrollTop: jQuery(".msg_history")[0].scrollHeight }, 900);  
       })
      .fail(function(value) {
        jQuery('.porto-ajax-loading').remove();
        console.log(value);
      });
    });
  });
</script>
