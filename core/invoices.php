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
                    <th data-field="name">Invoice</th>
                    <th data-field="id">Payee</th>
                    <th data-field="price">Total</th><!--TODO rename-->
                    <th data-field="date">Due By</th>
                    <th data-field="price">Outstanding</th>
                    <th data-field="edit">Update</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td><div>001</div></td>
                    <td><div>Owen Holloway</div></td>
                    <td><div>$0.87</div></td>
                    <td><div>11th April 2016</div></td>
                    <td><div>$0.00</div></td>
                    <td><i class="material-icons">mode_edit</i></td>
                </tr>

                <?php
                    //Add invoices to the page
                ?>
            </tbody>
        </table>
        </div>
    </div>
    
</body>      
