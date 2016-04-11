<?php
//Internet explorer 10 and below are broken
if(preg_match('/MSIE/',$_SERVER['HTTP_USER_AGENT']))
{
	header("Location: /core/iepage.html");
	die();
}

require_once $_SERVER["DOCUMENT_ROOT"]."/core/corestyles.php";

if($userPermission == 50) {
    
} else {
    errorHandle("You do not have permission to be here");
}

?>

<head>
	<title>Welly - Invoices</title>
</head>

<body>
    <div class="section white">
        <div class="row container">
        <table class="striped">
            <thead>
                <tr>
                    <th data-field="id">Name</th>
                    <th data-field="name">Invoice</th>
                    <th data-field="price">Item Price</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><div contenteditable>Alvin</div></td>
                    <td><div contenteditable>Eclair</div></td>
                    <td><div contenteditable>$0.87</div></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</body>      
