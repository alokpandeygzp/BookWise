<div class="navbar navbar-inverse set-radius-two">
    <div class="container">
    <div class="navbar-header left-div">
            <p style="font-size:26px;margin-left: -75px;margin-top: 5px;color:black;"><img  src="assets/img/nitc_logo.jpeg" height="60px" />
                <B><a href="dashboard.php" style="color: black; margin-left:-30px;background-image: url(assets/img/text_background_1.png); background-size: cover; background-clip:text;-webkit-background-clip:text; color:transparent">NITC LIBRARY MANAGEMENT SYSTEM</a></B>
                <img style="margin-top: 20px;"  src="assets/img/banner.png" >
            </p>
            
        </div>

<?php if(isset($_SESSION['login']))
{
?>
        <div class="right-div">
            <a style="margin-top: 20px;"  href="logout.php" class="btn btn-danger pull-right">LOG OUT</a>
        </div>
        <?php }?>
    </div>
</div>




    <!-- LOGO HEADER END-->
<?php if(isset($_SESSION['login']))
{
?>    
<section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="dashboard.php" class="menu-top-active">DASHBOARD</a></li>
                            <li><a href="issued-books.php">Issued Books</a></li>
                             <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Account <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="my-profile.php">My Profile</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="change-password.php">Change Password</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php } else { ?>
        <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">                        
                          
      <li><a href="index.php">Home</a></li>
      <li><a href="userlogin.php">User Login</a></li>
                            <li><a href="signup.php">User Signup</a></li>
                         
                            <li><a href="adminlogin.php">Admin Login</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php } ?>