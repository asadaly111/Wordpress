<?php global $current_user; ?>      
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>Global Logistics Solutions</title>
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
  rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/css/vendors.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN STACK CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/css/app.css">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/css/core/menu/menu-types/vertical-menu.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/vendors/css/tables/datatable/datatables.min.css">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns">
<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-light navbar-border">
  <div class="navbar-wrapper">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
        <li class="nav-item">
          <a class="navbar-brand" href="index.html">
            <img class="brand-logo" alt="stack admin logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png">
          </a>
        </li>
        <li class="nav-item d-md-none">
          <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a>
        </li>
      </ul>
    </div>
    <div class="navbar-container content">
      <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="nav navbar-nav mr-auto float-left">
        </ul>
        <ul class="nav navbar-nav float-right">
          <li class="dropdown dropdown-user nav-item">
            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
              <span class="avatar avatar-online">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span>
                <span class="user-name"><?php echo $current_user->data->display_name; ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a>
         <!--        <a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a>
                <a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a>
                <a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo wp_logout_url(site_url('/login/')); ?>"><i class="ft-power"></i> Logout</a>
              </div>
            </li>
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="main-menu menu-fixed menu-light menu-accordion" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="nav-item"><a href="<?php echo site_url('/carrier-dashboard/'); ?>"><i class="fa fa-truck"></i><span class="menu-title" data-i18n="">Dashboard</span></a></li>
        <li class=" nav-item"><a href="<?php echo site_url('/find-a-load/'); ?>"><i class="fa fa-search"></i><span class="menu-title" data-i18n="">Find a load</span></a></li>
        <li class=" nav-item active"><a href="<?php echo site_url('/discussion/'); ?>"><i class="fa fa-comments"></i><span class="menu-title" data-i18n="">Discussion </span></a></li>
      </ul>
    </div>
  </div>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-body">
        <!-- Basic form layout section start -->
        <section id="configuration">
          <div class="row">
            <div class="col-12">
              <div class="card">


<?php if (empty($_GET['discussion'])): ?>




  <div class="disucs-thread-inner">
    <h1>Discussion Thread</h1>
    <h2>Conversation with admin!</h2>
    <div class="clearfix"></div>
    <?php
    global $obj,$wpdb;
    $user_id  = get_current_user_id();
    $msg = $obj->getRows($wpdb->prefix.'messages', ['where' =>['sender_id' => $user_id], 'condition' => 'GROUP BY post_id ' ]);
    if ($msg):
      foreach ($msg as $key):
        echo '
        <div class="row disucs-thread-inner-row">
        <div class="right-discs">
        <h5>'.get_the_title($key->post_id).'</h5>
        <p>Message Unread: '.get_the_unready_message_count($user_id, $key->post_id).'</p>
        <a href="'.site_url('/carrier-dashboard/discussion/?discussion=true&id='.$key->post_id).'">Go to message thread</a>
        </div>
        </div>
        ';
      endforeach;
    else:
      echo "No Message found!";
    endif; ?>
  </div>




<?php else: ?>
         
           <div class="disucs-thread-inner">
                  <h1>Discussion Thread</h1>
                  <h2>I got a  amazone things..!</h2>
                    <!--      <span class="tag1">Online</span>
                    <span class="tag2">Shopping</span>
                    <span class="tag3">Ecommerce</span> -->
                    <div class="clearfix"></div>
                    <div class="msg_history">
                      <?php
                      global $obj,$wpdb;
                      $user_id  = get_current_user_id();
                      
                      $wpdb->update($wpdb->prefix.'messages', ['status' => 'seen'], ['sender_id' =>$user_id, 'post_id' => $_GET['id']]);

                      $msg = $obj->getRows($wpdb->prefix.'messages', ['where' =>['sender_id' =>$user_id, 'post_id' => $_GET['id'] ] ]);
                      if ($msg):
                        foreach ($msg as $key):
                          if ($key->text_by == 'sender') {
                            echo '
                            <div class="row disucs-thread-inner-row">
                            <span class="name-red">'.get_user_name_letter($key->sender_id).'</span>
                            <div class="right-discs">
                            <h5>'.get_user_name($key->sender_id).'</h5>
                            <p>'.$key->message.'</p>
                            <p>'.get_mesg_date($key->date).'</p>
                            <a href="#message"><i class="fa fa-reply"></i>Reply</a>
                            <div class="pull-right">
                            <a href="#"><i class="fa fa-commenting"></i>Comment</a>
                            <a href="#"><i class="fa fa-heart"></i>Like</a>
                            </div>
                            </div>
                            </div>
                            ';
                          }else{
                            echo '
                            <div class="row disucs-thread-inner-row">
                            <span class="name-green">A</span>
                            <div class="right-discs">
                            <h5>Admin</h5>
                            <p>'.$key->message.'</p>
                            <p>'.get_mesg_date($key->date).'</p>
                            <a href="#message"><i class="fa fa-reply"></i>Reply</a>
                            <div class="pull-right">
                            <a href="#"><i class="fa fa-commenting"></i>Comment</a>
                            <a href="#"><i class="fa fa-heart"></i>Like</a>
                            </div>
                            </div>
                            </div>
                            ';
                          }
                        endforeach;
                      else:
                        echo "No Message found!";
                      endif; ?>
                    </div>
                    <form action="" id="messagesubmit">
                      <input type="hidden" name="post_id" value="<?php echo $_GET['id'];  ?>">
                      <input type="hidden" name="sender_id" value="<?php echo $user_id; ?>">
                      <input type="hidden" name="text_by" value="sender">
                      <div class="disucs-comment-sec clearfix" id="message">
                        <label><i class="fa fa-commenting"></i> Comment Here</label>
                        <div class="disucs-comment-sec-txtara clearfix">
                          <textarea name="message"></textarea>
                          <a href="#"><i class="fa fa-file-text"></i></a>
                          <a href="#"><i class="fa fa-paperclip"></i></a>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                      </div><!--discus comment sec end-->
                    </form>
                  </div><!--discus thread inner end-->




       <?php endif ?>   
  




                </div>
              </div>
            </div>
          </section>
          <!-- // Basic form layout section end -->
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <footer class="footer footer-static footer-dark">
      <p>2018 © C3. All Right Reserved.  </p>
    </footer>
    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN STACK JS-->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/js/core/app.js" type="text/javascript"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/js/scripts/modal/components-modal.js" type="text/javascript"></script>
    <script>
      $(function () {
        $("tr").after('<tr class="tr-spacer"/>');
      });
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
            <div class="row disucs-thread-inner-row">
            <span class="name-red">`+value.userletter+`</span>
            <div class="right-discs">
            <h5>`+value.username+`</h5>
            <p>`+value.message+`</p>
            <p>`+value.date+`</p>
            <a href="#"><i class="fa fa-reply"></i>Reply</a>
            <div class="pull-right">
            <a href="#"><i class="fa fa-commenting"></i>Comment</a>
            <a href="#"><i class="fa fa-heart"></i>Like</a>
            </div>
            </div>
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
    </body>
    </html>