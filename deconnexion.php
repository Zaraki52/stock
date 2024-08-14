<?php  
include("config.php");
$login= $_SESSION['manager'];
$_SESSION=array();
session_regenerate_id();
session_unset(); //destruction de la variable
session_destroy(); ///detruire la session
echo'<script type="text/javascript">
alert("Bye Bye!");
window.location.href="login.php";
</script>';exit(1); 

?>

