<html>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require '../php/connectdb.php';
        session_start();
        $org_id = $_SESSION['user_id'];
        $r_id = $_POST['r_id'];
        $vid = $_POST['v_id'];
        $v_id = serialize($vid);
        $message = $_POST['message'];

        $query = "update donation_table set status='accepted',org_id='$org_id',vol_id='$v_id',vol_message='$message' where request_id='$r_id' ";
            mysqli_query($conn, $query);
            
            echo '<script>alert(" Request Accepted ");
            window.location.href="../module/organization.php";
             </script>';

       // echo $user_id;
        //echo $r_id;
        
        //print_r ($v_id);
    }
    ?>
</body>

</html>