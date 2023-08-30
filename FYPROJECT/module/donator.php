<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("location:../module/home.php#login");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/responsive.css" />
  <title>Donation-Feed The Hunger</title>
</head>

<body>

  <div class="header">
    <div class="head_start"></div>
    <nav class="navbar navbar_background">
      <div class="logo navbar_background">
        <img src="../image/logo.jpg" alt="Feed The Hunger" />
      </div>

      <div class="rightnav navbar_background">
        <ul class="navlist navbar_background">
          <li class="navbar_background">
            <p class="navbar_background">
              Welcome
              <?php echo $_SESSION['username']; ?>
            </p>
          </li>
          <li class="navbar_background">
            <a class="navbar_background" href="#profile">Profile</a>
          </li>
          <li class="navbar_background">
            <a class="navbar_background" href="#donate">Donate</a>
          </li>
          <li class="navbar_background">
            <a class="navbar_background" href="../php/logout.php">Logout</a>
          </li>
        </ul>
      </div>
      <div class="burger show">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
      <div class="Close">
        <p>X</p>
      </div>
    </nav>
  </div>
  <div class="resp_rightnav resp_rightnav_bg">
    <ul class="navlist resp_rightnav_bg">
      <li class="resp_rightnav_bg">
        <p class="resp_rightnav_bg">
          Welcome
          <?php echo $_SESSION['username']; ?>
        </p>
      </li>
      <li class="resp_rightnav_bg">
        <a class="resp_rightnav_bg" href="#profile">Profile</a>
      </li>
      <li class="resp_rightnav_bg">
        <a class="resp_rightnav_bg" href="#donate">Donate</a>
      </li>
      <li class="resp_rightnav_bg">
        <a class="resp_rightnav_bg" href="../php/logout.php">Logout</a>
      </li>
    </ul>
  </div>
  <section class="secondsection" id="profile">
    <div class="profile">
      <h3>Profile</h3>
      <h2>Personal Information</h2>

      <table class="table">

        <tr>
          <th>Name</th>
          <td><?php echo $_SESSION['username']; ?></td>
        </tr>
        <tr>
          <th>Mobile No.</th>
          <td><?php echo $_SESSION['user_mobno']; ?></td>
        </tr>
        <tr>
          <th>Email Id</th>
          <td><?php echo $_SESSION['email_id']; ?></td>
        </tr>
        <tr>
          <th>Address</th>
          <td><?php echo $_SESSION['user_address']; ?></td>
        </tr>
        <tr>
          <th>Pincode</th>
          <td><?php echo $_SESSION['user_pincode']; ?></td>
        </tr>
      </table>

      <br /><br />
      <h2>Role Information</h2>

      <table class="table">
        <tr>
          <th>UserRole</th>
          <td><?php echo $_SESSION['user_as']; ?></td>
        </tr>
        <tr>
          <th>Account Created At</th>
          <td><?php echo $_SESSION['created_at']; ?></td>
        </tr>

      </table>
    </div>
    <br /><br />
    <div class="history">

      <?php
      require '../php/connectdb.php';
      $user_id = $_SESSION['user_id'];
      $mob_no = $_SESSION['user_mobno'];
      $query = "select * from donation_table where user_id = '$user_id'";
      $result = mysqli_query($conn, $query);
      $num = mysqli_num_rows($result);
      if ($num >= 1) {
        echo '<h2>Donation History</h2>
        <table class="table">
        <tr>
          <th>Sr.no</th>
          <th>Request_id</th>
          <th>Date</th>
          <th>Time</th>
          
          <th>Mobile_No.</th>
          <th>Quantity</th>
          <th>Description</th>
          <th>Requested_At</th>
         
        </tr>';

        //ddate,dtime,dpincode,dsecond_mob,dquantity,ddescript,requested_at
        $query = "select * from donation_table where user_id = '$user_id'";
        $result = mysqli_query($conn, $query);
        $srno = 0;
        while ($row = mysqli_fetch_array($result)) {
          echo '<tr>
                <td>';
          $srno++;
          echo $srno;
          echo '</td>
                <td>';
          echo $row['request_id'];
          echo '</td>
                <td>';
          echo $row['ddate'];
          echo '</td>
                <td>';
          echo $row['dtime'];
          echo '</th>
                <td>';
          
          if ($row['dsecond_mob'] == 0)
            echo $mob_no;
          else
            echo $row['dsecond_mob'];
          echo '</td>
                <td>';
          echo $row['dquantity'];
          echo '&nbsp;Kg</td>
                <td>';
          if ($row['ddescript'] == '')
            echo 'NA';
          else
            echo $row['ddescript'];
          echo '</td>
                <td>';
          echo $row['requested_at'];
          echo '</td>
               
              </tr>';
        };
        echo '</table>';
      }
      ?>

    </div>
    <div class="request">
     
      
      <?php
      $user_id = $_SESSION['user_id'];
      $pincode = $_SESSION['user_pincode'];
      $query = "select * from donation_table where user_id = '$user_id' AND dpincode = '$pincode' AND status = 'accepted'";
      $result = mysqli_query($conn, $query);
      $num = mysqli_num_rows($result);
      if ($num >= 1) {
        echo '
        <br> <br>
        <h2>Accepted Donation</h2>
          <div class="scroll">
          <table class="table">
          <thead>
          <tr>
            <th>Sr.no</th>
            <th>Request_Id</th>
            <th>Requested_At</th>
            <th>Name</th>
            <th>Address</th>
            <th>Mobile_No.</th>
            <th>Email_Id</th>
            <th>Date</th>
            <th>Time</th>
            <th>Quantity</th>
            <th>Description</th>
           
          
          </tr>
          </thead>';

        //ddate,dtime,dpincode,dsecond_mob,dquantity,ddescript,requested_at
        $query = "select donation_table.user_id, donation_table.request_id,donation_table.requested_at,usertable.name,usertable.address,usertable.mobno,donation_table.dsecond_mob,usertable.emailid,donation_table.ddate,donation_table.dtime,donation_table.dquantity,donation_table.ddescript FROM donation_table,usertable WHERE donation_table.user_id=usertable.id AND donation_table.dpincode='$pincode' AND donation_table.status='accepted'";
        $result = mysqli_query($conn, $query);
        $srno = 0;


        echo '<tbody>';
        while ($row = mysqli_fetch_array($result)) {
          echo '<tr>
            <td>';
          $srno++;
          echo $srno;
          echo '</td>
            <td>';
          echo $row['request_id'];
          echo '</td>
            <td>';
          echo $row['requested_at'];
          echo '</td>
            <td>';
          echo $row['name'];
          echo '</td>
            <td>';
          echo $row['address'];
          echo '</td>
            
            <td>';
          if ($row['dsecond_mob'] == 0)
            echo $row['mobno'];
          else {
            echo $row['mobno'];
            echo '/&#010;';
            echo $row['dsecond_mob'];
          }
          echo '</td>
            <td>';
          echo $row['emailid'];
          echo '</td>
            <td>';
          echo $row['ddate'];
          echo '</td>
            <td>';
          echo $row['dtime'];
          echo '</td>
            
            <td>';

          echo $row['dquantity'];
          echo '&nbsp;Kg</td>
            <td>';
          if ($row['ddescript'] == '')
            echo 'NA';
          else
            echo $row['ddescript'];
          echo '</td>
          
          </tr>';
        };
        echo '</tbody>
          </table>
          </div>';
      } else {
        echo '<table class="table">
          <tr>
            <th>Currently There Are No Any Active Donation !!!</th>
          </tr>
          </table>';
      }
      ?>
    </div>
  </section>
  <hr>
  <section class="secondsection" id="donate">
    <div class="donate">
      <h3>Donate</h3>
      <div class="formbox">

        <form action="../php/donation_request.php" method="POST" id="log_in" class="input dtop">
          Date:<input type="date" name="ddate" class="field" title="Select Date Of Food Donation" required />
          Time:<input type="time" name="dtime" class="field" title="Select Time Of Food Donation" required />
          
          Secondary Mobile No.:<input type="tel" name="dsecond_mob" class="field" pattern="[0-9]{10}" minlength="10" maxlength="10" title="Must Contain 10 Digits Without Country Code" placeholder="Secondary Mob. no" />
          Quantity:<input type="number" name="dquantity" class="field" min="1" max="50" placeholder="Quantity of Food in Kg" required />
          Description:<input type="text" name="ddescript" class="field" placeholder="Add Description of Donation" />
          <input type="checkbox" required />&nbsp;&nbsp;I agree to the <abbr title="Terms & conditions: &#010;1.We accept prepared/cooked/ready-to-eat food items. &#010;2.Food items should be handled properly and stored at safe temperature. &#010;3.Every items has it's self life that should be checked before donating. &#010;4.Volunteers have all right to check the quality and standards of food items. &#010;5.Volunteers have right to ACCEPT or REFUSE the donation after doing all checks related to donation during pick-up. &#010;Reasons for refusal: &#010;1.If food items are stale. &#010;2.If food items shows signs of decay, odor or mishandling. "> terms & conditions </abbr>
          <button type="submit" class="submit">Request</button>
        </form>
      </div>
    </div>
  </section>
</body>
<footer>
  <p class="footer">
    Copyright &copy; www.feedthehunger.com - All rights reserved
  </p>
</footer>
<script src="../javascript/resp.js"></script>

</html>