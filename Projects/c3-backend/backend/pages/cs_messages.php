<?php do_action('c3_scripts'); 

global $obj, $wpdb;
?>


<style>
  .container.darker h5 {
    color: #fff;
    font-size: 13px;
    font-weight: 700;
    padding: 0px;
    text-decoration: none;
    background: #2780e3;
    width: 30px;
    height: 30px;
    text-align: center;
    border-radius: 50%;
    float: left;
    margin: 13px 15px;
    line-height: 30px;
}
  .container.blacki h5 {
    color: #fff;
    font-size: 13px;
    font-weight: 700;
    padding: 0px;
    text-decoration: none;
    background: #333;
    width: 30px;
    height: 30px;
    text-align: center;
    border-radius: 50%;
    float: left;
    margin: 13px 15px;
    line-height: 30px;
}
</style>

<div class="row">
 





 <div class="col-md-4">
	<div class="card mb-3">
		<h3 class="card-header">Messages</h3>
		<div class="card-body">
			<ul class="list-group">
				

        <?php
        global $obj,$wpdb;
        $msg = $obj->getRows($wpdb->prefix.'messages', [ 'condition' => 'GROUP BY post_id , sender_id ' ]);
        if ($msg):
          foreach ($msg as $key):
            echo '
            <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="edit.php?post_type=truck_load&page=messages&conversation=true&id='.$key->post_id.'&user_id='.$key->sender_id.'" style="display: block;width: 100%">'.get_the_title($key->post_id).' <span class="badge badge-primary badge-pill pull-right" style="float: right;">'.get_the_unready_message_count_admin($key->sender_id, $key->post_id).'</span></a>
            </li>
            ';
          endforeach;
        else:
          echo "No Message found!";
        endif; ?>









      


			</ul>
		</div>
	</div>
  </div>



<?php if (!empty($_GET['conversation'])): ?>

<div class="col-md-7">
<div class="card mb-3">

    <h3 class="card-header">Chat Messages BY : <?php echo get_user_name($_GET['user_id']); ?></h3>
    <div class="card-body">
      



<div class="msg_history">




      <?php
      global $obj,$wpdb;
 

      $post_id = $_GET['id'];
      $user_id = $_GET['user_id'];
      $wpdb->update($wpdb->prefix.'messages', ['adminstatus' => 'seen'], ['sender_id' => $user_id, 'post_id' => $post_id ]);

      $msg = $obj->getRows($wpdb->prefix.'messages', ['where' =>['sender_id' => $user_id, 'post_id' => $post_id ] ]);
      if ($msg):
        foreach ($msg as $key):
          if ($key->text_by == 'sender') {
            echo '
            <div class="container darker">
            <h5>'.get_user_name_letter($key->sender_id).'</h5>
            <p>'.$key->message.'</p>
            <span class="time-left">'.get_mesg_date($key->date).'</span>
            </div>
            ';
          }else{
            echo '
        <div class="container blacki">
          <h5>A</h5>
          <p>'.$key->message.'</p>
          <span class="time-right">'.get_mesg_date($key->date).'</span>
        </div>
            ';
          }
        endforeach;
      else:
        echo "No Message found!";
      endif; ?>  
</div>


      <form action="" id="messagesubmit">
        <input type="hidden" name="post_id" value="<?php echo $post_id;  ?>">
        <input type="hidden" name="sender_id" value="<?php echo $user_id; ?>">
        <input type="hidden" name="text_by" value="receiver">
        <input type="hidden" name="adminstatus" value="seen">
        <div class="panel-footer">
          <div class="input-group">
            <input name="message" type="text" class="form-control input-sm" placeholder="Type your message here...">
            <span class="input-group-btn">
              <button class="btn btn-primary btn-sm" id="btn-chat">
              Send</button>
            </span>
          </div>
        </div>
      </form>



    </div>

  </div>
</div>



    <script>
  
      jQuery(document).ready(function() {
          // jQuery(".msg_history").animate({scrollTop: jQuery(".msg_history")[0].scrollHeight }, 900);
          jQuery(document).on('submit', '#messagesubmit', function(event) {
            event.preventDefault();
            var t = jQuery(this);
            jQuery(this).append('<div class="porto-ajax-loading"></div>');
            var form = jQuery(this);
            var formData = new FormData(jQuery(this)[0]);
            jQuery.ajax({
              type: 'post',
              url: '<?php echo site_url(''); ?>/wp-admin/admin-ajax.php?action=c3_send_messages',
              dataType: 'json',
              contentType: false,
              processData: false,
              data: formData,
            })
            .done(function(value) {
              console.log(value);
          // jQuery('.porto-ajax-loading').remove();
          jQuery('.msg_history').append(`

            
        <div class="container blacki">
          <h5>A</h5>
          <p>`+value.message+`</p>
          <span class="time-right">`+value.date+`</span>
        </div>
            `);
          t.trigger('reset');
          // jQuery(".msg_history").animate({scrollTop: jQuery(".msg_history")[0].scrollHeight }, 900);
        })
            .fail(function(value) {
              jQuery('.porto-ajax-loading').remove();
              console.log(value);
            });
          });
        });
      </script>




<?php endif ?>

</div>