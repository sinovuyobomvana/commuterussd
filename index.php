<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

//3. Explode the text to get the value of the latest interaction - think 1*1
$textArray=explode('*', $text);
$userResponse=trim(end($textArray));

switch ($text) {
    case '':
        if ($text == "") {
            // This is the first request. Note how we start the response with CON
            $response  = "CON Welcome to the TBC service. Your balance is R37.50
            Select your action from the menu below:\n\n";
            $response .= "1. Pay for a trip\n";
            $response .= "2. View payment history\n";
            $response .= "3. Top up wallet";
        } 
        break;
    case '1':
        if ($text == "1") {
            // Business logic for first level response
            $response = "CON To pay for your trip please enter the taxi code:\n\n";
            $response .= "0. Back";
            
        } 
        break;
        
    switch ($userResponse) {
        case 'XYZ123':
            if($userResponse == "XYZ123")
        {
            $response = "CON You have selected ".$userResponse." as your taxi from Njoli to Greenacres.
            Please note that R10 will be deducted from your TeksiPay wallet.\n\n";
            $response .= "1. Confirm\n";
            $response .= "0. Back\n";
             
        } 
            break;
            
    }
        
        if($text == "1*XYZ123*1") { 
        
             $response .= "END Payment successful. Win your share of R4 million in INSTANT cash and airtime with SHOPRITE! Visit your nearest SHOPRITE store and ENTER!";
        } 
        break;
    
    default:
    $response .= "END Network Issue, please try again later!";
        break;
}



// Echo the response back to the API
header('Content-type: text/plain');
echo $response;