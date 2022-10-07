<!DOCTYPE html>
<html>
  <head>
    <title>CV_PROJECT</title>
    <link rel="stylesheet" type="text/css" href="stylesbackup1.css">
    <style>
    .navactive {
        color: white;
        background-color: #bcb562;
    }
    </style>
  </head>
  <div class="header">
    <div class="logoWrapper">
      <img class="logo" src="CV.png" border="0" />
      <div class="topnav">
        <a href="usersignin.php">Log in</a>
        <a href="userregister.php">Sign up</a>
        <a href="usermanagement.php">Home</a>
      </div>
    </div>

  </div>
  <body>

    <div class="registerContent">
      <div class="registerDiv">
        <h1>Sign Up (USER)</h1>
        <hr>
        <br>
        <form action="userfinishregister.php" method="post">


          <label for="fname">First Name</label>
          <input type="text" id="fname" name="firstName" placeholder="Your name..">

          <label for="lname">Last Name</label>
          <input type="text" id="lname" name="lastName" placeholder="Your last name..">


          <label for="status">Gender</label>
          <select class="statusSelect" name="gender">
            <option value="M">Male</option>
            <option value="F">Female</option>
          </select>

          <label for="mobileNo">Mobile number</label>
          <input type="text" name="mobileNo" class="fields" placeholder="Enter Mobile No." required onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="([0-9]){10,}" title="Enter a valid phone number">

          <label for="address">Address</label>
          <input type="address" id="address" name="address" placeholder="Phahonyothin Rd, Tambon Khlong Nung, Amphoe Khlong Luang, Chang Wat Pathum Thani 12120">

          <label for="mail">Email</label>
          <input type="text" id="mail" name="email" placeholder="Your Email" pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})" title="Enter a valid email id">

          <label for="userId">User id</label>
          <input type="text" id="userId" name="userId" placeholder="Your userId">

          <label for="password">Password</label>
          <input type="password"  name="password" class="fields" placeholder="Your password" value="" maxlength="15" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="password must contain at least one number and one uppper case and one lowercase letter and 8 characters" required>

          <label for="rePassword">Retype Password</label>
          <input type="password" id="rePassword" name="rePassword" placeholder="Your password">


          <input type="submit" name="userRegisterSubmit" value="Submit">
        </form>
      </div>
    </div>
      <div class="regisImageWrapper">
        <img src="regis.jpg" alt="">
      </div>

  <footer>
    <div class="footerContent">
      <div class="leftFooter">
        <h1 id="followUs">Follow us . . </h1>
        <div class="iconWrapper">
          <a href="https://www.facebook.com/">
            <img class="socialIcon" src="facebook.png" border="0" />
          </a>
          <a href="https://www.instagram.com/">
            <img class="socialIcon" src="ig.png" border="0" />
          </a>
          <a href="https://twitter.com/">
            <img class="socialIcon" src="twitter.png" border="0" />
          </a>
        </div>
      </div>
      <div class="rightFooter">
        <div class="memberCredit">
          <h1>Created by</h1>
        </div>
        <div class="nameList">
          <ul id="name">
            <li>Chethan.C.Gowda</li>
            <li>Vishnu Das</li>
          </ul>

        </div>
      </div>
    </div>
  </footer>

  </body>

</html>
