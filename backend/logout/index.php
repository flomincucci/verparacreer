<?php
include("../system.php");
unset($_SESSION["user_id"]);
?>
<script type="text/javascript">
    document.location = "<?=BACKEND_URL?>";
</script>