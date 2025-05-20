
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['phone']) && isset($_POST['token'])) {
    $phone = $_POST['phone'];
    $token = $_POST['token'];

    $fields = array(
        "sender_id" => "FSTSMS",
        "message" => "Your Appointment Token Number is: $token - Sri Kamala Hospital",
        "language" => "english",
        "route" => "p",
        "numbers" => $phone,
    );

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($fields),
        CURLOPT_HTTPHEADER => array(
            "authorization: YOUR_FAST2SMS_API_KEY",
            "accept: */*",
            "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        echo "cURL Error: " . $err;
    } else {
        echo "SMS Sent: " . $response;
    }
} else {
    echo "Missing parameters";
}
?>
