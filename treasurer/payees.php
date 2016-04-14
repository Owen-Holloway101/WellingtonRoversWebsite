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
    <script type="text/javascript">
        function addpayee() {
            var url = "/core/addpayee.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#addpayee").serialize(), // serializes the form's elements.
                success: function(data) {
                    location.reload();
                }
            });

            return false; // avoid to execute the actual submit of the form.
        }
        
        function openUpdateDialog($payeeno) {
            
        }
        
        function updatepayee() {
            var url = "/core/addpayee.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#addpayee").serialize(), // serializes the form's elements.
                success: function(data) {
                    location.reload();
                }
            });

            return false; // avoid to execute the actual submit of the form.
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
                    <th data-field="edit">View & Update</th>
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
                                        <td><i style=\"cursor: pointer\"class=\"material-icons\">assignmentt</i></td>
                                    </tr>";
                            }
                        }

                        /* close statement */
                        $stmt->close();
                    ?>
            </tbody>
        </table>
        <!-- Modal Trigger -->
        <a class="modal-trigger waves-effect waves-light btn" href="#newpayee">New Payee</a>
        </div>
    </div>
    
    <!-- Modal Structure -->
    <div id="newpayee" class="modal modal-fixed-footer">
        <div class="modal-content">
        <h4>Add Payee</h4>
        <form class="col s12" action="/core/addpayee.php" id="addpayee" method="post">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="icon_prefix" type="text" name="firstname" class="validate">
                        <label for="icon_prefix">First Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="icon_prefix" type="text" name="lastname" class="validate">
                        <label for="icon_prefix">Last Name</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">email</i>
                        <input id="icon_prefix" type="email" name="email" class="validate">
                        <label for="icon_prefix">Email</label>
                    </div>
                </div>
			</form>
        </div>
        <div class="modal-footer">
        <a href="#!" onclick="addpayee()" class="modal-action modal-close waves-effect waves-green btn-flat ">Add</a>
        </div>
    </div>
    </div>
</body>      
