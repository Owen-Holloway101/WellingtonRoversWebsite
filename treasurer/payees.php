<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//Internet explorer 10 and below are broken
if(preg_match('/MSIE/',$_SERVER['HTTP_USER_AGENT']))
{
	header("Location: /core/iepage.html");
	die();
}


require_once $_SERVER["DOCUMENT_ROOT"]."/core/corestyles.php";
require_once $_SERVER['DOCUMENT_ROOT']."/core/treasurerfunctions.php";

if($userPermission == 50) {
    
} else {
    errorHandle("You do not have permission to be here");
}

?>

<head>
	<title>Welly - Payees</title>
    <script>
        function updatepayee($payeeno) {
            
        }
    </script>
</head>

<body>
    <div class="section white">
        <div class="row container">
        <table class="striped">
            <thead>
                <tr>
                    <th data-field="name">Payee</th>
                    <th data-field="email">Email</th>
                    <th data-field="price">Total Outstanding</th>
                    <th data-field="price">Total Credit</th>
                    <th data-field="edit">Update</th>
                </tr>
            </thead>

            <tbody>
                    <?php

                        require $_SERVER['DOCUMENT_ROOT']."/core/db.php";

                        $query = "SELECT * FROM payee";

                        if ($stmt = $db->prepare($query)) {

                            /* execute statement */
                            $stmt->execute();

                            /* bind result variables */
                            $stmt->bind_result($payeeno,$firstname,$lastname,$email,$credit);

                            /* fetch values */
                            while ($stmt->fetch()) {
                                echo "
                                    <tr>
                                        <td><div>".$firstname." ".$lastname."</div></td>
                                        <td><div><a href=\"mailto:".$email."?Subject=[Wellington Treasurer]%20\" target=\"_top\">".$email."</div></td>
                                        <td><div>$0.00<!--TODO get outstanding--></div></td>
                                        <td><div>$".$credit."</div></td>
                                        <td><i style=\"cursor: pointer\"class=\"material-icons\">mode_edit</i></td>
                                    </tr>";
                            }
                        }

                        /* close statement */
                        $stmt->close();
                    ?>
            </tbody>
        </table>
        </div>
    </div>
    
</body>      
