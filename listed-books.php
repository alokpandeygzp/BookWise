<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{ 
    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Library Management System | Issued Books</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <style>
    .book-card {
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        padding: 15px;
        margin: 15px;
        background-color: #fff;
        transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
    }

    .book-card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        transform: scale(1.05); /* Increase the scale to make it "pop" */
    }

    .book-card img {
        max-width: 100%;
        max-height: 150px; /* Adjust the max-height to your preference */
        height: auto;
    }

    .book-card-title {
        font-weight: bold;
        margin-top: 10px;
    }

    .book-card-info {
        margin-top: 5px;
    }

    .book-card-issued {
        color: red;
        margin-top: 5px;
    }
</style>







</head>

<body>
    <!------MENU SECTION START-->
    <?php
include('includes/header.php');
?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Manage Issued Books</h4>
            </div>
        </div>

        <div class="row">
            <?php
            $sql = "SELECT tblbooks.BookName, tblcategory.CategoryName, tblauthors.AuthorName, tblbooks.ISBNNumber, tblbooks.BookPrice, tblbooks.id as bookid, tblbooks.bookImage, tblbooks.isIssued from  tblbooks join tblcategory on tblcategory.id = tblbooks.CatId join tblauthors on tblauthors.id = tblbooks.AuthorId";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);

            if ($query->rowCount() > 0) {
                foreach ($results as $result) {
            ?>
                    <div class="col-md-12">
                        <div class="book-card">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="admin/bookimg/<?php echo htmlentities($result->bookImage); ?>"
                                        alt="Book Image" class="book-image">
                                </div>
                                <div class="col-md-8">
                                    <h4 class="book-card-title"><?php echo htmlentities($result->BookName); ?></h4>
                                    <p class="book-card-info">
                                        <?php echo htmlentities($result->CategoryName); ?><br />
                                        <?php echo htmlentities($result->AuthorName); ?><br />
                                        <?php echo htmlentities($result->ISBNNumber); ?><br />
                                    </p>
                                    <?php if ($result->isIssued == '1') : ?>
                                        <p class="book-card-issued">Book Already issued</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
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
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>

</html>
<?php } ?>