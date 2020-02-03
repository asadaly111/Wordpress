<?php do_action('easy_booking');
if (!empty($_POST)) {
    update_option('chat_appid', $_POST['appid']);
    update_option('chat_appkey', $_POST['appkey']);
    update_option('chat_secretkey', $_POST['secretkey']);
    update_option('chat_domain', $_POST['domain']);
    echo '<div class="notice notice-success is-dismissible"><p>Record updated!</p></div>';
}
?>
<div class="card mb-3">
    <h3 class="card-header">Chat Credentials</h3>
    <div class="card-body">
        <form method="post">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">App ID</label>
                <div class="col-sm-10">
                    <input type="text" name="appid" class="form-control" value="<?php echo get_option('chat_appid'); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">App Key</label>
                <div class="col-sm-10">
                    <input type="text" name="appkey" class="form-control" value="<?php echo get_option('chat_appkey'); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Secret Key</label>
                <div class="col-sm-10">
                    <input type="text" name="secretkey" class="form-control" value="<?php echo get_option('chat_secretkey'); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">App Domain</label>
                <div class="col-sm-10">
                    <input type="text" name="domain" class="form-control" value="<?php echo get_option('chat_domain'); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card mb-3">
    <h3 class="card-header">Shortcodes Generator:</h3>
    <div class="card-body">
        <form action="#" method="post" id="my_form">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><p>Is Global Chat?</p></label>
                <div class="col-sm-10">
                    <select class="custom-select" name="global">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><p>leftPanelBgColor</p></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" value="#fff" name="leftPanelBgColor">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><p>leftPanelUsersColor?</p></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" value="#fff" name="leftPanelUsersColor">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><p>chatWindowBgColor?</p></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" value="#fff" name="chatWindowBgColor">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><p>senderBubble?</p></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" value="#fff" name="senderBubble">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><p>recieverBubble?</p></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" value="#fff" name="recieverBubble">
                </div>
            </div>
        </form>
        <div class="form-group row">
            <label for="my_submit" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <button type="button" class="btn btn-primary" id="my_submit">Submit</button>
            </div>
        </div>
    </div>
</div>
<div class="card mb-3 my_shortcodeee" style="display: none;">
    <h3 class="card-header">Shortcodes</h3>
    <div class="card-body">
        <p>Show chat frame:</p>
        <code class="main_shortcode">[Soa-chat-main global="0"]</code>
        <br><br>
        <p>Add firends:</p>
        <code>[add-friend]</code>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function(jQuery) {
        jQuery("#my_submit").click(function(event) {
            event.preventDefault();
            var form = jQuery("#my_form").serializeArray();
            var shortcode ='[Soa-chat-main ';
            jQuery.each(form, function(index, val) {
                shortcode += val.name+'="'+val.value+'" ';
            });
            shortcode +=']';
            jQuery(".my_shortcodeee code.main_shortcode").text(shortcode);
            jQuery(".my_shortcodeee").show();
            console.log(shortcode);
            console.log(form);
        });

    });
</script>