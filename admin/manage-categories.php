<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from tblcategory  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$_SESSION['delmsg']="Category deleted scuccessfully ";
header('location:manage-categories.php');

}


    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Manage Categories</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        transform: scale(1.05);
        /* Increase the scale to make it "pop" */
    }

    .book-card img {
        max-width: 100%;
        max-height: 150px;
        /* Adjust the max-height to your preference */
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

    container2 {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        height: 100vh;
    }

    .row2 {
        width: 100%;
    }
    </style>
</head>

<body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php');?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Manage Categories</h4>
            </div>
        </div>
        <div class="row">
            <?php if ($_SESSION['error'] != "") { ?>
                <div class="col-md-6">
                    <div class="alert alert-danger">
                        <strong>Error:</strong>
                        <?php echo htmlentities($_SESSION['error']); ?>
                        <?php echo htmlentities($_SESSION['error'] = ""); ?>
                    </div>
                </div>
            <?php } ?>
            <?php if ($_SESSION['msg'] != "") { ?>
                <div class="col-md-6">
                    <div class="alert alert-success">
                        <strong>Success:</strong>
                        <?php echo htmlentities($_SESSION['msg']); ?>
                        <?php echo htmlentities($_SESSION['msg'] = ""); ?>
                    </div>
                </div>
            <?php } ?>
            <?php if ($_SESSION['updatemsg'] != "") { ?>
                <div class="col-md-6">
                    <div class="alert alert-success">
                        <strong>Success:</strong>
                        <?php echo htmlentities($_SESSION['updatemsg']); ?>
                        <?php echo htmlentities($_SESSION['updatemsg'] = ""); ?>
                    </div>
                </div>
            <?php } ?>
            <?php if ($_SESSION['delmsg'] != "") { ?>
                <div class="col-md-6">
                    <div class="alert alert-success">
                        <strong>Success:</strong>
                        <?php echo htmlentities($_SESSION['delmsg']); ?>
                        <?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- Add search bar and button here -->
        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Categories">
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $sql = "SELECT * from tblcategory";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
                foreach ($results as $result) {
            ?>
                <div class="col-md-6">
                    <div class="book-card">
                        <h4 class="book-card-title"><?php echo htmlentities($result->CategoryName); ?></h4>
                        <p class="book-card-info">
                            Status: 
                            <?php if ($result->Status == 1) { ?>
                                <span class="active-status">Active</span>
                            <?php } else { ?>
                                <span class="inactive-status">Inactive</span>
                            <?php } ?>
                        </p>
                        <div class="book-card-actions">
                            <a href="edit-category.php?catid=<?php echo htmlentities($result->id); ?>" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="manage-categories.php?del=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger">
                                <i class="fa fa-pencil"></i> Delete
                            </a>
                        </div>
                    </div>
                </div>
            <?php
                $cnt = $cnt + 1;
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get a reference to the input element and the author cards
        const searchInput = document.querySelector('input[type="text"]');
        const authorCards = document.querySelectorAll('.book-card');

        // Function to handle search
        function handleSearch() {
            const searchValue = searchInput.value.toLowerCase();

            authorCards.forEach(function (card) {
                const authorName = card.querySelector('.book-card-title').textContent.toLowerCase();
                const isVisible = authorName.includes(searchValue);

                card.style.display = isVisible ? 'block' : 'none';
            });
        }

        // Attach an event listener to the search input
        searchInput.addEventListener('input', handleSearch);
    });
</script>
 

</body>

</html>
<?php } ?>