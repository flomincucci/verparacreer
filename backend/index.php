<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?
require_once 'system.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<title>Ver para Creer - Backoffice</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(document).pngFix( );
    <?
    if(isset($_SESSION["error"]))
    {
        ?>
            $("#loginerror").slideDown("slow");
        <?
        unset($_SESSION["error"]);
    }
    ?>
    $("#loginerror").click(function(){
        $(this).slideUp("slow");
    });
});
</script>
</head>
<body id="login-bg">
    <a href="javascript:void(0);" id="loginerror">
        Error de usuario o contrase&ntilde;a
    </a>
    <!-- Start: login-holder -->
    <div id="login-holder">
        <!--  start loginbox ................................................................................. -->
        <div id="loginbox">
        <!--  start login-inner -->
            <div id="login-inner">
                <form action="login.php" method="post">
                    <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                            <th>Mail:</th>
                            <td><input type="text" name="user" class="login-inp" /></td>
                    </tr>
                    <tr>
                            <th>Password:</th>
                            <td><input type="password" name="pass"  onfocus="this.value=''" class="login-inp" /></td>
                    </tr>
                    <tr>
                            <th></th>
                            <td><input type="submit" class="submit-login"  /></td>
                    </tr>
                    </table>
                </form>
            </div>
        </div>
        <!--  end loginbox -->
    </div>
    <!-- End: login-holder -->
</body>
</html>