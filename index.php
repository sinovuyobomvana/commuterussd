<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON Welcome to the TBC service. Select your action from the from the menu below: \n";
    $response .= "1. Start a trip\n";
    $response .= "2. Check running total\n";
    $response .= "3. End trip";
} else if ($text == "1") {
    // Business logic for first level response
    $response = "CON Select your trip details: \n";
    $response .= "1. Njoli - Greenacres\n";
    $response .= "2. Njoli - Summerstrand\n";
    $response .= "0. Back\n";

} else if($text == "1*1") { 
    // This is a second level response where the user selected 1 in the first instance
     $response = "CON Your trip has been started. Select your action from the menu below : \n";
     $response .= "1. Check running total\n";
     $response .= "2. End trip\n";
    // This is a terminal request. Note how we start the response with END
  //  $response = "END Your account number is ".$accountNumber;
} else if($text == "1*1*1") { 
    // This is a second level response where the user selected 1 in the first instance
     $response = "CON Your TBC running balance for Njoli - Greenacresas at 04/05/2022 16:32 is R160.00\n
     2 outstanding payments:\n";
     $response .= "1. End trip\n";
     $response .= "2. View paid commuters\n";
     $response .= "0. Back\n";
   
    // This is a terminal request. Note how we start the response with END
    //$response = "END Your account number is";
}else if($text == "1*1*1*2") {
     $response = "CON Paid commuters\n";
      $response .= "1. Kelly\n";
      $response .= "2. Aviwe\n";
      $response .= "3. Chim\n";
      $response .= "4. Sandile\n";
      $response .= "5. More\n";
}
else if($text == "1*1*1*1") {
    // $response = "CON Paid commuters\n";
       $response = "END You have successfully ended your TBC trip!";
}
// Echo the response back to the API
header('Content-type: text/plain');
echo $response;