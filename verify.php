<?php
   include("scripts/verify_apply.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Request Response</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>APPLICATION NUMBER <b><?php echo $_SESSION["app_id"]; ?></b>. WAS <b><?php echo ($_SESSION["app_result"] == 0 ? "REJECTED" : "ACCEPTED"); ?></b>.</h1> 
    </div>
    <p>
        <a href="welcome.php" class="btn btn-warning">Main Page</a>
    </p>
</body>
</html> 
