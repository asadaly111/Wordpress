<?php do_action('easy_booking');
global $bokingobj, $wpdb, $obj;
$data = json_decode($bokingobj->allreservations() );
?>
<div class="card mb-3">
  <h3 class="card-header">Inquiries</h3>
  <div class="card-body">
    <table class="table table-hover">
      <thead>
        <tr class="table-active">
          <th scope="col">Name</th>
          <th scope="col">Phone</th>
          <th scope="col">Email</th>
          <th scope="col">Date</th>
          <th scope="col">Start Time</th>
          <th scope="col">End Time</th>
          <th scope="col">Payment Status</th>
          <th scope="col">Transaction ID</th>
        </tr>
      </thead>
      <tbody>

        <?php if ($data->slots): ?>
          <?php foreach ($data->slots as $key):
            $get = $obj->getRows($wpdb->prefix.'easybooking', ['where' => ['booking_id' =>$key->id], 'return_type' => 'single' ]);
            ?>
            <tr>
              <th scope="row"><?php echo $key->name; ?></th>
              <td><?php echo $key->phone; ?></td>
              <td><?php echo $key->email; ?></td>
              <td><?php echo $key->date; ?></td>
              <td><?php echo $key->starttime; ?></td>
              <td><?php echo $key->endtime; ?></td>
              <td>
                <?php if ($get): echo $get->status; ?>

                <?php endif ?>
              </td>
              <td>
                <?php if ($get): echo $get->transactionid; ?>

                <?php endif ?>
              </td>
            </tr>
          <?php endforeach ?>
        <?php endif ?>
        
      </tbody>
    </table>
    
  </div>
</div>