<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | User Dash Board</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
    .dashboard-box {
        text-align: center;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 5px;
        background-color: #fff;
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.2);
        transition: transform 0.2s;
    }

    .dashboard-box:hover {
        transform: translateY(-5px);
    }

    .dashboard-box i {
        color: #333;
    }

    .success-box {
        border: 2px solid #5cb85c;
        color: #5cb85c;
    }

    .warning-box {
        border: 2px solid #f0ad4e;
        color: #f0ad4e;
    }

    .dashboard-box h3 {
        font-size: 36px;
        margin-bottom: 5px;
    }

    .dashboard-box p {
        font-size: 18px;
    }
</style>


</head>

<body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php');?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
    <div class="container">
    <br><br><br>
        <div class="row">
            <a href="listed-books.php">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="dashboard-box success-box">
                        <i class="fa fa-book fa-5x"></i>
                        <?php 
                            $sql ="SELECT id from tblbooks ";
                            $query = $dbh -> prepare($sql);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            $listdbooks=$query->rowCount();
                        ?>
                        <h3><?php echo htmlentities($listdbooks);?></h3>
                        <p>Books Listed</p>
                    </div>
                </div>
            </a>

            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="dashboard-box warning-box">
                    <i class="fa fa-recycle fa-5x"></i>
                    <?php 
                        $rsts=0;
                        $sid=$_SESSION['stdid'];
                        $sql2 ="SELECT id from tblissuedbookdetails where StudentID=:sid and (ReturnStatus=:rsts || ReturnStatus is null || ReturnStatus='')";
                        $query2 = $dbh -> prepare($sql2);
                        $query2->bindParam(':sid',$sid,PDO::PARAM_STR);
                        $query2->bindParam(':rsts',$rsts,PDO::PARAM_STR);
                        $query2->execute();
                        $results2=$query2->fetchAll(PDO::FETCH_OBJ);
                        $returnedbooks=$query2->rowCount();
                    ?>
                    <h3><?php echo htmlentities($returnedbooks);?></h3>
                    <p>Books Not Returned Yet</p>
                </div>
            </div>

            <a href="issued-books.php">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="dashboard-box success-box">
                        <i class="fa fa-book fa-5x"></i>
                        <?php 
                            $sid=$_SESSION['stdid'];
                            $sql="SELECT tblbooks.BookName,tblbooks.ISBNNumber,tblissuedbookdetails.IssuesDate,tblissuedbookdetails.ReturnDate,tblissuedbookdetails.id as rid,tblissuedbookdetails.fine from  tblissuedbookdetails join tblstudents on tblstudents.StudentId=tblissuedbookdetails.StudentId join tblbooks on tblbooks.id=tblissuedbookdetails.BookId where tblstudents.StudentId=:sid order by tblissuedbookdetails.id desc";
                            $query = $dbh -> prepare($sql);
                            $query-> bindParam(':sid', $sid, PDO::PARAM_STR);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                        ?>
                        <h3><?php echo htmlentities($query->rowCount());?></h3>
                        <p>Issued Books</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
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