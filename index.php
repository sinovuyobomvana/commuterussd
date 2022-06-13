<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];
$code        = $_POST["code"];

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON Welcome to the TBC service. Your balance is R37.50
    Select your action from the menu below:\n\n";
    $response .= "1. Pay for a trip\n";
    $response .= "2. View payment history\n";
    $response .= "3. Top up wallet";
} else if ($text == "1") {
    // Business logic for first level response
    $response = "CON To pay for your trip please enter the taxi code:\n\n";
    $response .= "1. CY359186\n";
    $response .= "0. Back";

    if($text !== "" && )
    {
        $response = "CON this is your code".$text;
    }
    // $code = $text;
    
} else if($text == "1*1") { 
    // This is a second level response where the user selected 1 in the first instance
     $response = "CON You have selected CY359186 as your taxi from Njoli to Greenacres.
     Please note that R10 will be deducted from your TeksiPay wallet.\n\n";
     $response .= "1. Confirm\n";
     $response .= "0. Back\n";
    // This is a terminal request. Note how we start the response with END
  //  $response = "END Your account number is ".$accountNumber;
} else if($text == "1*1*1") { 
    // This is a second level response where the user selected 1 in the first instance

     $response .= "END Payment successful. Win your share of R4 million in INSTANT cash and airtime with SHOPRITE! Visit your nearest SHOPRITE store and ENTER!";

 }


// Echo the response back to the API
header('Content-type: text/plain');
echo $response;