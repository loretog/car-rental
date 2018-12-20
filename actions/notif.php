
<?php
require 'src/Clockwork.php';
require 'src/ClockworkException.php';
?>

<?php 

try
{
    // Create a Clockwork object using your API key
    $clockwork = new mediaburst\ClockworkSMS\Clockwork( $API_KEY );

    // Setup and send a message
    $message = array( 'to' => '441234567891', 'message' => 'This is a test!' );
    $result = $clockwork->send( $message );

    // Check if the send was successful
    if($result['success']) {
        echo 'Message sent - ID: ' . $result['id'];
    } else {
        echo 'Message failed - Error: ' . $result['error_message'];
    }
}
catch (mediaburst\ClockworkSMS\ClockworkException $e)
{
    echo 'Exception sending SMS: ' . $e->getMessage();
}

?>

