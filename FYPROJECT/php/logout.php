<html>

<body>
    <?php
    session_start();
    session_unset();
    session_destroy();
    echo '<script>window.location.replace("../module/home.php");
    </script>';
    
    ?>
</body>

</html>