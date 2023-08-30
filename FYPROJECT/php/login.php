<html>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require '../php/connectdb.php';

        $userid = $_POST['luserid'];
        $password = $_POST['lpassword'];

        $s = "select * from usertable where emailid = '$userid'";
        $result = mysqli_query($conn, $s);

        $num = mysqli_num_rows($result);
        if ($num == 1) {
            while ($row = mysqli_fetch_assoc($result))
                if (password_verify($password, $row['password'])) {
                    session_start();
                    $_SESSION['email_id'] = $userid;
                    $query = "select id,useras,name,address,pincode,mobno,datetime from usertable where emailid = '$userid'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['user_id'] = $row["id"];
                    $_SESSION['user_as'] = $row["useras"];
                    $_SESSION['username'] = $row["name"];
                    $_SESSION['user_address'] = $row["address"];
                    $_SESSION['user_pincode'] = $row["pincode"];
                    $_SESSION['user_mobno'] = $row["mobno"];
                    $_SESSION['created_at'] = $row["datetime"];
                    if ($row["useras"] == "donator")
                        header("location:../module/donator.php");
                    elseif ($row["useras"] == "organization")
                        header("location:../module/organization.php");
                    else
                        header("location:../module/volunteer.php");
                } else {
                    echo '<script>alert(" Warning : PASSWORD IS NOT MATCHING !!! ");
            window.location.href="../module/home.php#login";
            </script>';
                }
        } else {
            echo '<script>alert(" Warning : USERNAME DOES NOT EXISTS !!! ");
    window.location.href="../module/home.php#login";
    </script>';
        }
    }
    ?>
</body>

</html>