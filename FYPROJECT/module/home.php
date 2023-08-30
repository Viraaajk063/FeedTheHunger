<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/responsive.css" />
  <title>Feed The Hunger</title>
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
            <a class="navbar_background" href="#home">Home</a>
          </li>
          <li class="navbar_background">
            <a class="navbar_background" href="#about">About</a>
          </li>
          <li class="navbar_background">
            <a class="navbar_background" href="#login">Login</a>
          </li>
          <li class="navbar_background">
            <a class="navbar_background" href="#help">Help</a>
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
        <a class="resp_rightnav_bg" href="#home">Home</a>
      </li>
      <li class="resp_rightnav_bg">
        <a class="resp_rightnav_bg" href="#about">About</a>
      </li>
      <li class="resp_rightnav_bg">
        <a class="resp_rightnav_bg" href="#login">Login</a>
      </li>
      <li class="resp_rightnav_bg">
        <a class="resp_rightnav_bg" href="#help">Help</a>
      </li>
    </ul>
  </div>
  <section class="firstsection" id="home">
    <div class="quote">
      <p>Build A Better Community By Fighting Hunger Today</p>
      <div class="buttons">
        <button class="btn sbtn">Locate</button>
        <button class="btn">Donate</button>
      </div>
      <div class="locate locatehide">
        <input type="number" name="search" class="searchbox" placeholder="Search by Pincode" required />
        <button type="submit" class="search_submit">Search</button>
      </div>
      <div class="donate">

      </div>
    </div>
    <div class="bgimg">
      <img src="../image/bg_img.png" alt="Food Donation" />
    </div>
  </section>

  <section class="secondsection" id="about">
    <div class="about">
      <h3>About Us</h3>
      <p>
        According to the survey, there's a tendency that if you put an item on
        a plate, there's a higher probability that you're not going to fully
        consume that item and that's a leftover. And so it's probably going to
        go to waste. Around 1.3 billion tons of food is thrown as waste every
        year. Additionally, one-third of the food consumed is stated as
        leftovers. The primary cause of food wastage is overproduction or
        surplus food production. It can be seen in various parties, ceremony
        and restaurants.
      </p>
      <div class="gallery">
        <div class="set">
          <img src="../image/img1.jpg" alt="Gallery" class="photo" />

          <img src="../image/img2.jpg" alt="Gallery" class="photo" />

          <img src="../image/img3.jpg" alt="Gallery" class="photo" />
        </div>
      </div>
      <p>
        To reduce the amount of food wasted it can be distributed to the needy
        people. India is home to the largest number of hungry people in the
        world. In the ranking of the Global Hunger Index 2017 it covers
        position 100 out of 119 ranked countries. Every night, one out of
        seven people on the planet go to bed hungry. The Solution to reduce
        the amount of food wasted and being used to the needy people is to
        build a System which will end hunger and no wasting of food to make a
        hungry-free world.
      </p>
    </div>
    <div class="gallery">
      <div class="set">
        <img src="../image/img4.jpg" alt="Gallery" class="photo" />

        <img src="../image/img6.jpg" alt="Gallery" class="photo" />

        <img src="../image/img5.jpg" alt="Gallery" class="photo" />
      </div>
    </div>
  </section>
  <section class="thirdsection" id="login">
   
    <div class="log">
      <h3>Login</h3>
      <div class="formbox">
        <div class="buttonbox">
          <div id="bttn"></div>
          <button type="button" class="togglebtn" onclick="login()">
            Log in
          </button>
          <button type="button" class="togglebtn" onclick="register()">
            Register
          </button>
        </div>

        <form action="../php/login.php" method="post" id="log_in" class="input">
          <input type="email" name="luserid" class="field" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Your Registered Email Id" placeholder="User ID" required />
          <input type="password" name="lpassword" class="field" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Password Contains at least ONE NUMBER and ONE UPPERCASE and ONE LOWERCASE letter,and atleast 5 OR MORE CHARACTERS" placeholder="Password" required />
          <button type="submit" class="submit">Log in</button>
        </form>

        <form action="../php/register.php" method="post" id="register" class="input top">
          <input type="text" name="rname" class="field" placeholder="Name/Org.Name" required />
          <input type="text" name="raddress" class="field" placeholder="Address" required />
          <input type="tel" name="rpincode" class="field" pattern="[0-9]{6}" minlength="6" maxlength="6" title="Must Contain 6 Digits Pincode" placeholder="Pin Code" required />
          <input type="tel" name="rmobno" class="field" pattern="[0-9]{10}" minlength="10" maxlength="10" title="Must Contain 10 Digits Without Country Code" placeholder="Mob. no" required />
          <input type="email" name="remailid" class="field" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email ID" required />
          <input type="password" name="rpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Must Contain at least ONE NUMBER and ONE UPPERCASE and ONE LOWERCASE letter,and atleast 5 OR MORE CHARACTERS" class="field" placeholder="Password" required />
          <p>Register as</p>
          <div class="buttonbox option">
            <div id="bn"></div>
            <input type="radio" name="roption" class="hidebx" value="donator" id="op1" onclick="donator()" checked="checked">
            <label class="togglebtn" for="op1">Donator</label>

            </input>
            <input type="radio" name="roption" class="hidebx" value="organization" id="op2" onclick="organization()">
            <label class="togglebtn" for="op2">Organization</label>

            </input>
            <input type="radio" name="roption" class="hidebx" value="volunteer" id="op3" onclick="volunteer()">
            <label class="togglebtn" for="op3">Volunteer</label>

            </input>
          </div>


          <button type="submit" class="submit" >Register</button>
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