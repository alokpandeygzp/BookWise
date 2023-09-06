<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Issued Books</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
    /* Card Styles */
.card {
    border: none;
    border-radius: 10px;
    margin-bottom: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
}

.card:hover {
    transform: scale(1.02);
}

.card-header {
    background-color: #343a40;
    color: #fff;
    padding: 15px;
    font-weight: bold;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.card-body {
    padding: 20px;
    background-color: #fff;
}

.card-title {
    font-size: 24px;
    margin-bottom: 10px;
    color: #333;
}

.card-text {
    font-size: 16px;
    line-height: 1.5;
    color: #555;
}

    </style>

</head>

<body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php');?>
    <!-- MENU SECTION END-->
    <div class="container">
        <br><br>
        <h1 class="my-4">Welcome to Library Management System</h1><br>
        <p>Discover a world of knowledge and literature with our state-of-the-art Library Management System. Our platform is designed to make accessing and managing your library's resources a breeze. Whether you're a student, educator, or a passionate bookworm, our system offers an array of features to enhance your reading experience.</p>
        <br><br>
        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Why Choose Our Library Management System?</h4>
                        <p class="card-text">Choose our Library Management System for seamless digital access to a diverse collection of resources, available 24/7.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Effortless Book Search:</h4>
                        <p class="card-text">Easily search for books using various parameters like title, author, genre, or ISBN, ensuring a seamless book-finding experience.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User-Centric Design</h4>
                        <p class="card-text">We've designed our system with you in mind. Intuitive navigation, personalized dashboards, and a visually appealing interface make your library interactions enjoyable.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
<br><br>
        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-7">
                <h2>Key Features</h2>
                <ul>
                    <li>Effortless Book Browsing</li>
                    <li>Quick and Convenient Checkout</li>
                    <li>Personalized Profiles</li>
                    <li>Educational Resources</li>
                </ul>
            </div>
            <div class="col-lg-3">
                <img class="img-fluid rounded" src="assets/img/2.jpg" alt="" height="250px" width="450px">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="row mb-10">
            <div class="col-md-12">
            <h2>All in one</h2>
                <p>Our Library Management System redefines library services, providing a user-friendly platform for readers, librarians, and institutions. It offers efficient book searches, personalized recommendations, and adapts to evolving library needs in the digital age.</p>
            </div>
        </div><br><br>
    </div>

    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END-->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>

</html>
