<?php 


require 'wp-load.php';

$count = get_post_meta( 10000, 'count_cron', true);


$count = $count+1;
update_post_meta( 10000, 'count_cron', $count);


$count = get_post_meta( 10000, 'count_cron', true);
echo $count;
