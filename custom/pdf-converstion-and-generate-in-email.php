<?php 
require 'autoload.php';
require '../wp-load.php';
ob_start(); ?>


<!-- HTML GOES HERE -->










<?php $html = ob_get_clean();




// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;



$options = new Options();
$options->set('isRemoteEnabled', true);


$dompdf = new Dompdf($options);


$dompdf->set_option('defaultFont', 'calibri');
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();


// If you want to download this in browser then un comment this below line
// $dompdf->stream();


$output = $dompdf->output();

file_put_contents('pdfconversion.pdf', $output);

$output12 = ABSPATH.'vendor/pdfconversion.pdf';

$attachments = array($output12);
wp_mail($_POST['email'], 'Conversion Equation Evaluator Form' , 'Please find attachment', '' ,$attachments);
wp_mail('Raksha@buildbusinessresults.com', 'Conversion Equation Evaluator Form' , 'Please find attachment', '' ,$attachments);
echo '<script>window.location = "'.$_SERVER['HTTP_REFERER'].'";alert("Thank you for your submission. A PDF of yur results have been sent to you and to our admin team. To learn how to improve your score book a Free 45 minute Marketing Makeover Session with our Marketing Specialist at https://www.buildbusinessresults.com/10K45min!");</script>';