<html>

<body>


    <?php

    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'feed_the_hunger');
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if (!$conn) {
        die("Cannot Connect To Database : " . mysqli_connect_error());
    }
    ?>
</body>

</html>