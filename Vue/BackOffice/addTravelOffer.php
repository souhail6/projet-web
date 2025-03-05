<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Add a new travel offer to the dashboard">
    <meta name="author" content="Travel Booking Team">

    <title>Add Travel Offer - Dashboard</title>

    <!-- Custom fonts and styles -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <nav class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">Travel Booking</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        </nav>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </nav>
                <!-- End of Topbar -->

                <!-- Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Add a Travel Offer</h1>

                    <div class="row">
                        <div class="col-xl-8 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <form id="addTravelOfferForm" action="Verification.php" method="POST">
                                        
                                        <div class="form-group">
                                            <label for="title">Title:</label>
                                            <input type="text" id="title" name="title" class="form-control">
                                            <span id="title_error"></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="destination">Destination:</label>
                                            <input type="text" id="destination" name="destination" class="form-control">
                                            <span id="destination_error"></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="departure_date">Departure Date:</label>
                                            <input type="date" id="departure_date" name="departure_date" class="form-control">
                                            <span id="departure_date_error"></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="return_date">Return Date:</label>
                                            <input type="date" id="return_date" name="return_date" class="form-control">
                                            <span id="return_date_error"></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Price:</label>
                                            <input type="number" id="price" name="price" step="0.01" class="form-control">
                                            <span id="price_error"></span>
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" name="disponible">
                                                <label class="custom-control-label" for="customCheck">Available</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="category">Category:</label>
                                            <select id="category" name="category" class="form-control">
                                                <option value="adventure">Adventure</option>
                                                <option value="relaxation">Relaxation</option>
                                                <option value="culture">Culture</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block" onclick="validerFormulaire()">Add Offer</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Content -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; Travel Booking 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="js/addOffer.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>
</html>
