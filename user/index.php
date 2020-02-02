<?php 
session_start();
require '../config/UserProcess.php';

use point_of_sale\config\User;

if (isset($_SESSION['email'])) {

$user = new User;
$data_user = $user->show_data();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Datta Able Free Bootstrap 4 Admin Template</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Free Datta Able Admin Template come up with latest Bootstrap 4 framework with basic components, form elements and lots of pre-made layout options" />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template"/>
    <meta name="author" content="CodedThemes"/>

    <!-- Favicon icon -->
    <link rel="icon" href="../datta-lite/assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="../datta-lite/assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="../datta-lite/assets/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="../datta-lite/assets/css/style.css">

</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    
    <?php 
    include '../template/navigation.php';
    include '../template/header.php';
     ?>


    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->

                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            
							<!-- [ Table ] start -->
							<div class="col-xl-12">
							    <div class="card Recent-Users">
							        <div class="card-header">
							            <h5>User</h5>
							        </div>
							        <div class="card-block table-border-style">
							        	<button class="btn btn-primary"><a class="text-light" href="add.php">Add User</a></button>
							            <div class="table-responsive">
							                <table class="table table-hover">
							                    <thead>
							                        <tr>
							                            <th>No</th>
							                            <th>Name</th>
                                                        <th>Email</th>
							                            <th>Action</th>
							                        </tr>
							                    </thead>
							                    <tbody>
							                        <?php 
							                        $no = 1;
							                        foreach ($data_user as $row) {
							                        ?>
							                        <tr>
							                            <th scope="row"><?= $no++ ?></th>
							                            <td>
                                                            <div class="avatar d-inline-block mr-3" style="width: 40px; height: 40px;">
                                                                <img src="../avatar/<?=$row['avatar']?>" alt="" width="100%">
                                                            </div>
                                                            <?= $row['name']; ?>        
                                                        </td>
                                                        <td><?= $row['email']; ?></td>
							                            <td>
							                            	<a href="edit.php?id=<?=$row['id']?>" class="label theme-bg2 text-white f-12">Edit</a>
							                            	<a href="process.php?id=<?=$row['id']?>&action=delete" class="label theme-bg text-white f-12">Delete</a>
							                            </td>
							                        </tr>
							                        <?php 
							                        }
							                        ?>
							                    </tbody>
							                </table>
							            </div>
							        </div>
							    </div>
							</div>
							<!-- [ Table ] end -->							

                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
    
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Js -->
	<script src="../datta-lite/assets/js/vendor-all.min.js"></script>
	<script src="../datta-lite/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../datta-lite/assets/js/pcoded.min.js"></script>
    <script>
        $('document').ready(function(){
            $(".user-nav").addClass("active");
        });
    </script>

</body>
</html>
<?php 
} else { 
    header('location:../authentication/login.php');
}
?>