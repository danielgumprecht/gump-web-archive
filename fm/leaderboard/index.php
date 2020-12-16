<!DOCTYPE html>

<html>

  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon-precomposed" sizes="500x500" href="../pictures/pb.jpg">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">

    <link rel="shortcut icon" type="image/jpg" href="../pictures/pb.jpg"/>

    <title>gump - Facemash</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">

</head>
<body>
<div id="header">
    <a href="https://gump.us/fm">
        <img src="../images/logo.png" height="80" width="500" class="responsive">
    </a>
</div>
<div class="flex-container">
    <?php

    include "../backend/facemash/mysql.php";

    $sql = "SELECT URI FROM entrys ORDER BY Rank DESC";
    $result = mysqli_query($conn, $sql);
    $rank = 1;
    while($row = mysqli_fetch_array(($result))) {

        echo '<div class="inner-flex-container"><img src="../images/'.$row[URI].'.jpg" width="200" height="200" style="border-radius: 20px"><div class="rank">'.$rank.'</div></div>';
        $rank++;
    }
    ?>
    <div>
</body>
</html>
