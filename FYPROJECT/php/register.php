<html>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require '../php/connectdb.php';

        $name = $_POST['rname'];
        $address = $_POST['raddress'];
        $pincode = $_POST['rpincode'];
        $mobno = $_POST['rmobno'];
        $emailid = $_POST['remailid'];
        $password = $_POST['rpassword'];
        $useras = $_POST['roption'];
        $hashpass = password_hash($password, PASSWORD_DEFAULT);

        $s = "select * from usertable where emailid = '$emailid'";
        $result = mysqli_query($conn, $s);

        $num = mysqli_num_rows($result);
        if ($num == 1) {
            echo '<script>alert(" Warning : EMAIL_ID ALREADY EXISTS !!! ");
        window.location.href="../module/home.php#login";
        </script>';
        } else {
            $reg = "insert into usertable(useras,name,address,pincode,mobno,emailid,password,datetime) value('$useras','$name','$address','$pincode','$mobno','$emailid','$hashpass',current_timestamp())";
            mysqli_query($conn, $reg);
            echo '<script>alert(" Success : REGISTRATION SUCCESSFULL PLEASE LOGIN AGAIN ");
        window.location.href="../module/home.php#login";
        </script>';
        }
    }
    ?>
</body>

</html>