<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{ 
if(isset($_POST['update']))
{    
$sid=$_SESSION['stdid'];  
$fname=$_POST['fullanme'];
$mobileno=$_POST['mobileno'];

$sql="update tblstudents set FullName=:fname,MobileNumber=:mobileno where StudentId=:sid";
$query = $dbh->prepare($sql);
$query->bindParam(':sid',$sid,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->execute();

echo '<script>alert("Your profile has been updated")</script>';
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Online Library Management System | Student Signup</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />

    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>

<body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php');?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">My Profile</h4>
                </div>
            </div>



            <form name="signup" method="post">
                <?php 
                    $sid=$_SESSION['stdid'];
                    $sql="SELECT StudentId,FullName,EmailId,MobileNumber,Status from  tblstudents  where StudentId=:sid ";
                    $query = $dbh -> prepare($sql);
                    $query-> bindParam(':sid', $sid, PDO::PARAM_STR);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0) {
                        foreach($results as $result) {
                ?>
                <div class="form-group">
                    <label for="studentId">Student ID:</label>
                    <input type="email" class="form-control" value="<?php echo htmlentities($result->StudentId);?>"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="profileStatus">Profile Status:</label>
                    <input type="text" class="form-control" id="profileStatus"
                        value="<?php echo ($result->Status == 1) ? 'Active' : 'Blocked'; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="fullName">Full Name:</label>
                    <input type="text" class="form-control" value="<?php echo htmlentities($result->FullName);?>" id="fullName" placeholder="Enter Full Name" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label for="mobileNo">Mobile No:</label>
                    <input type="text" class="form-control" id="mobileNo" placeholder="Enter Mobile No" maxlength="10" value="<?php echo htmlentities($result->MobileNumber);?>" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Email" value="<?php echo htmlentities($result->EmailId);?>" autocomplete="off" required readonly> 
                </div>


                <?php }} ?>
                <button type="submit" class="btn btn-primary">Update Now</button>
            </form>
        </div>
    </div>

    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>

</html>
<?php } ?>