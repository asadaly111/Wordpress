<style>
.featured-box .box-content {padding-bottom: 0;}
.con-contact-admin-form .chat_list {cursor: pointer;}
.mesgs{position: relative;}
</style>
<div class="heading heading-primary heading-border heading-bottom-border">
  <h3 class="heading-primary">Messages</h3>
</div>
<?php
global $user, $obj, $wpdb;
$sql = 'SELECT post.ID, post.Post_title FROM Black_wp_posts as post INNER JOIN Black_wp_black_messages as msg on post.ID = msg.post_id WHERE post.post_author = '.$user->ID.' AND post.post_status = "publish" AND post.post_type = "services" GROUP BY post.ID ';
$dataservices = $wpdb->get_results($sql);

// $dataservices = $obj->getRows($wpdb->prefix.'posts', ['where' =>['post_author' => $user->ID,'post_status'=> 'publish', 'post_type'=> 'services']]);
if (empty($_GET['messages'])):
  // echo '<h4>Message notifications</h4>';
  foreach ($dataservices as $key): ?>
    <a href="?messages=true&id=<?php echo $key->ID; ?>"><?php echo $key->Post_title; ?></a><br>
  <?php endforeach;
  
else:
  global $user_id, $obj;
  $usersmessages = $obj->getRows($wpdb->prefix.'black_messages', ['where' =>['reciver_id' =>$user_id, 'post_id' => $_GET['id'] ] , 'condition' => 'GROUP BY sender_id' ]); ?>
  <div class="con-contact-admin-form full-chat">
    <div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
          </div>
          <div class="inbox_chat">
            <?php if ($usersmessages):
              foreach ($usersmessages as $key): //$usersmessages->post_id ?>
                <div class="chat_list" data-reciever="<?php echo $user_id; ?>" data-sender="<?php echo $key->sender_id; ?>" data-postid="<?php echo $key->post_id; ?>">
                  <div class="chat_people">
                    <div class="chat_img"> <img src="<?php echo feature_img($key->post_id); ?>" alt="sunil"> </div>
                    <div class="chat_ib">
                      <h5><?php echo $obj->get_user_name($key->sender_id); ?> <span class="chat_date"><?php echo get_date($key->date); ?></span></h5>
                    </div>
                  </div>
                </div>
              <?php endforeach;
            endif; ?>
          </div>
        </div>
        <div class="mesgs">
          <div class="msg_history">
              Recent chat
          </div>
          <div class="type_msg">
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    jQuery(document).ready(function() {
      var msg = jQuery('.mesgs');
      jQuery(document).on('click', '.chat_list', function(event) {
        event.preventDefault();
        jQuery('.porto-ajax-loading').remove();
        jQuery('.chat_list').removeClass('active_chat');
        jQuery(this).addClass('active_chat');
        msg.append('<div class="porto-ajax-loading"></div>');
        var sender = jQuery(this).data('sender');
        var postid = jQuery(this).data('postid');
        var reciever = jQuery(this).data('reciever');
        jQuery.post('<?php echo site_url(''); ?>/wp-admin/admin-ajax.php?action=black_reciver_send_messages', { sender: sender , postid: postid  }, function(data, textStatus, xhr) {
          console.log(data);
          jQuery('.msg_history').html(data);
          jQuery('.type_msg').html(`
            <form action="" id="messagesubmit">
            <div class="input_msg_write">
            <input type="hidden" name="post_id" value="`+postid+`">
            <input type="hidden" name="reciver_id" value="`+reciever+`">
            <input type="hidden" name="sender_id" value="`+sender+`">
            <input type="hidden" name="text_by" value="receiver">
            <input type="text" name="message" class="write_msg" placeholder="Type a message"/>
            <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
            </form>
            `);
          jQuery('.porto-ajax-loading').remove();
        });
      });
    });
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
            <span class="time_date"> `+value.date+`</span>
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
  <?php endif; ?>