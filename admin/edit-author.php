<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['update']))
{
$athrid=intval($_GET['athrid']);
$author=$_POST['author'];
$email=$_POST['email'];
$sql="update  tblauthors set AuthorName=:author, Email=:email where id=:athrid";
$query = $dbh->prepare($sql);
$query->bindParam(':author',$author,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':athrid',$athrid,PDO::PARAM_STR);
$query->execute();
$_SESSION['updatemsg']="Author info updated successfully";
header('location:manage-authors.php');



}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Add Author</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
    .footer-section {
        text-align: center;
        padding: 20px;
        position: absolute;
        bottom: 0;
        width: 100%;
    }
    </style>
</head>

<body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php');?>
    <!-- MENU SECTION END-->

    <div class="container">
        <hr />
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Author</h4>

            </div>

        </div>

        <form role="form" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Author Name:</label>
                <?php 
$athrid=intval($_GET['athrid']);
$sql = "SELECT * from  tblauthors where id=:athrid";
$query = $dbh -> prepare($sql);
$query->bindParam(':athrid',$athrid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
                <input class="form-control" type="text" name="author"
                    value="<?php echo htmlentities($result->AuthorName);?>" required />
                    <br>
                <input class="form-control" type="email" name="email"
                    value="<?php echo htmlentities($result->Email);?>" required />
                <?php }} ?>
            </div>
            <button type="submit" name="update" class="btn btn-info">Update </button>
        </form>

    </div>

    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>

</html>
<?php } ?>