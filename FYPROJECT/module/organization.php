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
  <title>Organization-Feed The Hunger</title>
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
            <a class="navbar_background" href="#donation">Donation</a>
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
        <a class="resp_rightnav_bg" href="#donation">Donation</a>
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
        <tr>
          <th>Active Area</th>

          <td><?php echo $_SESSION['user_pincode']; ?></td>
        </tr>
      </table>
    </div>
  </section>
  <section class="secondsection" id="donation">
    <div class="request">
      <h3>Donation</h3>
      <h2>Active Donation Request</h2>
      <?php
      require '../php/connectdb.php';
      $pincode = $_SESSION['user_pincode'];
      $query = "select * from donation_table where dpincode = '$pincode' AND status = 'requested'";
      $result = mysqli_query($conn, $query);
      $num = mysqli_num_rows($result);
      if ($num >= 1) {
        echo '
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
            <th>Delete</th>
          
          </tr>
          </thead>';

        //ddate,dtime,dpincode,dsecond_mob,dquantity,ddescript,requested_at
        $query = "select donation_table.user_id, donation_table.request_id,donation_table.requested_at,usertable.name,usertable.address,usertable.mobno,donation_table.dsecond_mob,usertable.emailid,donation_table.ddate,donation_table.dtime,donation_table.dquantity,donation_table.ddescript FROM donation_table,usertable WHERE donation_table.user_id=usertable.id AND donation_table.dpincode='$pincode' AND donation_table.status='requested'";
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
          <td>';
          echo 'Delete
          </td>
          </tr>';
        };
        echo '</tbody>
          </table>
          </div>';
      } else {
        echo '<table class="table">
          <tr>
            <th>Currently There Are No Any Active Donation Request !!!</th>
          </tr>
          </table>';
      }
      ?>
      <br /><br />
      <h2>Volunteeers List</h2>
      <?php
      $pincode = $_SESSION['user_pincode'];
      $query = "select * from usertable where pincode = '$pincode' AND useras = 'volunteer'";
      $result = mysqli_query($conn, $query);
      $num = mysqli_num_rows($result);
      if ($num >= 1) {
        echo '
          <div class="scroll">
          <table class="table">
          <tr>
            <th>Sr.no</th>
            <th>Volunteer_Id</th>
            <th>Name</th>
            <th>Mobile_No.</th>
            <th>Email_Id</th>
          </tr>';

        //ddate,dtime,dpincode,dsecond_mob,dquantity,ddescript,requested_at
        $query = "select * from usertable where pincode = '$pincode' AND useras = 'volunteer'";
        $result = mysqli_query($conn, $query);
        $srno = 0;
        while ($row = mysqli_fetch_array($result)) {
          echo '<tr>
            <td>';
          $srno++;
          echo $srno;
          echo '</td>
            <td>';
          echo $row['id'];
          echo '</td>
            <td>';
          echo $row['name'];
          echo '</td>
            <td>';
          echo $row['mobno'];
          echo '</td>            
            <td>';
          echo $row['emailid'];
          echo '</td>            
          </tr>';
        };
        echo '</table>
          </div>';
      } else {
        echo '<table class="table">
          <tr>
            <th>Currently No Volunteers Are Present At Your Location !!!</th>
          </tr>
          </table>';
      }

      $pincode = $_SESSION['user_pincode'];
      $query = "select * from donation_table where dpincode = '$pincode' AND status = 'requested'";
      $result1 = mysqli_query($conn, $query);
      $num1 = mysqli_num_rows($result1);
      if ($num1 >= 1) {
        $query = "select * from usertable where pincode = '$pincode' AND useras = 'volunteer'";
        $result = mysqli_query($conn, $query);
        $num = mysqli_num_rows($result);
        if ($num >= 1) {

          echo '<br /><br /> <br /><br />
        <h3>Donation Approval</h3>
        <div class="formbox approve">
        <form action="../php/donation_accept.php" method="POST" id="log_in" class="input dtop">
        <h2 class="v_field">Acceptence</h2><br /><br />
        Request_id:<select name="r_id" class="field" title="Enter Request_id of Donation Request" required/>';
          while ($row1 = mysqli_fetch_array($result1)) {
            echo '<option value="' . $row1['request_id'] . '">';
            echo $row1['request_id'];
            echo '</option>';
          }
          echo '
        </select><br /><br />
        volunteer_id(For multiple id ctrl+select):<select multiple name="v_id[]" class="field v_field" size="3"  title="Enter Volunteer_id Who will pick donation from donor location"/>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<option class="v_field" value="' . $row['id'] . '">';
            echo $row['id'];
            echo '</option>';
          }
          echo '
        </select><br /><br />
        Message:<input type="text" name="message" class="field" placeholder="Add Message for Volunteer" /><br /><br />
        <button type="submit" class="submit">Accept Donation</button>
        </form>
      </div>';
        }
      }
      ?>
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