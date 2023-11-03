<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();
?>

<script>
    alert("Anda telah berhasil log out.");
    window.location.href = "login.php";
</script>

<?php
// Make sure to exit the PHP script after the JavaScript code
exit;
?>