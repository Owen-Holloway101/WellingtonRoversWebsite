<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//Code for sending an email.

function sendEmail($item,$price,$name,$email) {

$amountofitems = count($item);
$totalPrice = 0;
$items = "";
 
for ($x = 0; $x < $amountofitems; $x++) {
    $items .= "
    <tr class=\"item\" style=\"border-bottom:1px solid #eee;\">
    <td>
        ".$item[$x]."
    </td>        
    <td style=\"text-align: right;\">
        $".$price[$x]."
    </td>
</tr>";

    $totalPrice +=$price[$x];

} 

$itemsum="
<tr class=\"total\" style=\"border-top:2px solid #eee; font-weight:bold;\">
    <td>
        Total:
    </td>        
    <td style=\"text-align: right;\">
        $".$totalPrice."
    </td>
</tr>";


$message="<!doctype html>
<html>
<head>
    <meta charset=\"utf-8\">
    <!--Based off https://github.com/NextStepWebs/simple-html-invoice-template-->
    <title>Wellington Invoice</title>
    
    <style>
    @import url(https://fonts.googleapis.com/css?family=Rokkitt:700);
    </style>
</head>

<body style=\"font-family: 'Rokkitt', serif;\">
    <div class\"invoice-box\" style=\"
        margin:auto;
        padding:20px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        color:#555;\">
        <table stlyle=\"width:100%; line-height:inherit; text-align:left;\" cellpadding=\"0\" cellspacing=\"0\">
            <tr class=\"top\" style=\"padding-bottom:20px; width:100%;\">
                <td colspan=\"2\" style=\" width:100%;\">
                    <table style=\" width:100%;\">
                        <tr>
                            <td class=\"title\" style=\"font-size:45px; line-height:45px; color:#333;\">
                                <!--!!!!!!TODO UPDATE THIS !!!!!-->
                                <img src=\"http://zeryter.mooo.com/assets/WellyLogoHorizontalColour.png\" style=\"width:100%; max-width:300px;\">
                                <!--!!!!!!TODO UPDATE THIS !!!!!-->
                            </td>
                            
                            <td style=\"text-align: right;\">
                                Invoice #: 123<br>
                                Created: January 1, 2015<br>
                                Due: February 1, 2015
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class=\"information\" style=\"padding-bottom:40px; width:100%;\">
                <td colspan=\"2\" style=\" width:100%;\">
                    <table style=\" width:100%;\">
                        <tr style=\" width:100%;\">
                            <td>
                                Wellington Rover Crew<br>
                                wellington.rovers@gmail.com<br>
                            </td>
                            
                            <td style=\"text-align: right;\">
                                ".$name."<br>
                                ".$email."
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class=\"heading\" style=\"background:#eee; border-bottom:1px solid #ddd; font-weight:bold;\">
                <td>
                    Item
                </td>
                
                <td style=\"text-align: right;\">
                    Price
                </td>
            </tr>
            
            <!--ITEMS-->"
            .$items.
           "<!--END OF ITEMS-->
            
            <!--ITEMS SUM-->"
            .$itemsum.
           "<!--END OF ITEMS SUM-->
            
            <tr class=\"heading\" style=\"background:#eee; border-bottom:1px solid #ddd; font-weight:bold;\">
                <td>
                    Payment Details
                </td>
                <td>
                    
                </td>
            </tr>
            
            <tr class=\"item\" style=\"border-bottom:1px solid #eee;\">
                <td>
                    <u>Bank Transfer</u><br>
                    Name: Wellington Rover Crew<br>
                    BSB:037001<br>
                    Account:433819<br>
                    Reference:INV#<br>
                </td>
                <td style=\"text-align: right;\">
                    <u>Other Methods</u><br>
                    Cash or cheque made out to Wellington Rover Crew.
                </td>
            </tr>
            <tr style=\"border-bottom:1px solid #eee; width: 100%;\">
            	<td style=\"width: 100%;\">
            	Please pay within 30 days of receiving this invoice. If you have issues paying please email me (the Wellington treasurer) at:   
         		<a href=\"mailto:owen.holloway101@gmail.com?Subject=[Wellington Treasurer]%20\" target=\"_top\">owen.holloway101@gmail.com</a>
            	</td>
            </tr>
        </table> 
    </div>
</body>
</html>";

$to = $email;
$subject = "[Wellington Invoice]";

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'From: Wellington Rovers <test@zeryter.moooo.com>' . "\r\n";
$headers .= "Reply-To: wellington.rovers@gmail.com \r\n";

mail($to, $subject, $message, $headers);

}

sendEmail(array("item1","items2"),array(20,10),"Owen Holloway","owen.holloway101@gmail.com");
echo "email sent";

?>