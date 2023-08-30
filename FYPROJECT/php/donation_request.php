<html>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require '../php/connectdb.php';
        session_start();
        $user_id = $_SESSION['user_id'];
        $ddate = $_POST['ddate'];
        $dtime = $_POST['dtime'];
        $dpincode = $_SESSION['user_pincode'];
        $dsecond_mob = $_POST['dsecond_mob'];
        $dquantity = $_POST['dquantity'];
        $ddescript = $_POST['ddescript'];
        $query = "SELECT * FROM `usertable` WHERE pincode='$dpincode' AND useras= 'organization' ";
        $result = mysqli_query($conn, $query);

        $row = mysqli_num_rows($result);
        if ($row >= 1) {
            
            $query = "insert into donation_table(user_id,ddate,dtime,dpincode,dsecond_mob,dquantity,ddescript,requested_at,status) value('$user_id','$ddate','$dtime','$dpincode','$dsecond_mob','$dquantity','$ddescript',current_timestamp(),'requested')";
            mysqli_query($conn, $query);
            
            echo '<script>alert(" Requested : ORGANIZATION/NGO WILL ACCEPT YOUR REQUEST SHORTLY !!! ");
            window.location.href="../module/donator.php";
             </script>';
        } else {
            echo '<script>alert(" Sorry : Currently There Are No Any Active NGOs/Organization At Your Location(pincode) !!! ");
    window.location.href="../module/donator.php";
    </script>';
        }
    }
    ?>
</body>

</html>