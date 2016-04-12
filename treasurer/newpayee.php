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
	<title>Welly - New Payee</title>
</head>

<body>
    <div class="section white">
        <div class="row container">
            <form class="col s12" action="/core/addpayee.php" id="payee" method="post">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="icon_prefix" type="text" name="firstname" class="validate">
                        <label for="icon_prefix">First Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="icon_prefix" type="text" name="lastname" class="validate">
                        <label for="icon_prefix">Last Name</label>
                    </div>
                    <div class="input-field col s10">
                        <i class="material-icons prefix">email</i>
                        <input id="icon_prefix" type="email" name="email" class="validate">
                        <label for="icon_prefix">Email</label>
                    </div>
                    <div class="col s2">
                        <button class="btn waves-effect waves-light" onclick="$('#payee').submit();" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
			</form>
        </div>
    </div>
    
</body>   