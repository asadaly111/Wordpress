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
