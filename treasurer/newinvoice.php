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
	<title>Welly - New Invoice</title>
</head>

<body>
    <div class="section white">
        <div class="row container">
            <form class="col s12" action="/core/addpayee.php" id="payee" method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <select>
                            <option value="" disabled selected>Select Payee</option>
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
                                    echo "<option value=".$payeeno.">".$firstname." ".$lastname."</option>";
                                }
                            }

                            /* close statement */
                            $stmt->close();
                        ?>
                        </select>
                        <label>Payee</label>
                    </div>
                </div>
			</form>
        </div>
    </div>
    
</body>   