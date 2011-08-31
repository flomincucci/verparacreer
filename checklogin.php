<?php
    include_once("system.php");
    $pass = crypt($_POST["pass"],SALT);
    $user = $_POST["user"];
    $criterio = "santoysenia='$pass' and mail_personal='$user'";
    $result = execute_select("usuario",array('id','tipousuario'),$criterio);
    if(count($result)==1)
    {
        $_SESSION["user_id"]= $result[0]["id"];
        ?>
				<?php
					switch($result[0]['tipousuario']) {
						case 0:
							echo '0';
							$destino = 'home.php';
							break;
						case 1:
							echo '1';
							$destino = 'agenda.php';
							break;
						case 2:
							echo '2';
							$destino = BACKEND_URL;
							break;
					}
				?>
        <script type="text/javascript">
            document.location = "<?php echo $destino ?>";
        </script>
        <?php
    }
    else
    {
        $_SESSION["error"] = true;
        ?>
        <script type="text/javascript">
            document.location = "<?=BACKEND_URL?>";
        </script>
        <?php
    }
?>