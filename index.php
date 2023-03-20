<?php
include "helper/koneksi.php";
include_once("helper/function.php");


$login = cekSession();
if ($login == 0) {
    redirect("login.php");
}
$menu = 1;
$nomor = getSingleValDB("numbers", "user_id", "1", "body") ;
$img = "profile.jpg";
$total = "";
$totalgagal = "";
//$total=23;
    $bulan = date('m');
      for($bulan=1;$bulan<=12;$bulan++){
        $thn_ini = date('Y');
        $pemasukan = mysqli_query($koneksi,"select count(pesan) as total_pesan from pesan where month(time)='$bulan' and year(time)='$thn_ini'");
        $pem = mysqli_fetch_assoc($pemasukan);

        $jumlah = $pem['total_pesan'];
        $total .= "'$jumlah'". ", ";
      }
      
      for($bulan=1;$bulan<=12;$bulan++){
        $thn_ini = date('Y');
        $pemasukan = mysqli_query($koneksi,"select count(pesan) as total_pesan from pesan where month(time)='$bulan' and year(time)='$thn_ini' and status='GAGAL'");
        $pem = mysqli_fetch_assoc($pemasukan);

        $jumlah = $pem['total_pesan'];
        $totalgagal .= "'$jumlah'". ", ";
      }
      
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="logo.svg" rel="shortcut icon">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bermainapi - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'sidebar.php';?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                        </li>


                        <!-- Nav Item - Messages -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username'] ?></span>
                                <img class="img-profile rounded-circle" src="<?= $img ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-2 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Nomor </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= countDB("nomor") ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-2 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Terkirim</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= countDB("pesan", "status", "TERKIRIM") ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-2 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Presentase 
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= round(countPresentase()) ?>%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?= round(countPresentase()) ?>%" aria-valuenow="<?= round(countPresentase()) ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-2 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Terjadwal</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= countDB("pesan", "status", "MENUNGGU JADWAL") ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-2 col-md-6 mb-4">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                Template </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= countDB("template") ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-2 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Kategori </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= countDB("kategori") ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Statistik Pesan </h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body" >
                                    <div class="chart-area" style="height: 100%;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Device Info</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body" >
                                <div class="row">
                                    <div class="card shadow offset-1 col-10" style="width: 18rem;">
                                        
                                        <div class="card-body">
                                            <div class="imageee text-center">
                                                <img src="loading.gif" height="250px" width="250px" alt="">
                                            </div>
                                            <div class="statusss text-center">
                                                <div class="alert alert-danger" role="alert" style="display:<?php echo getSingleValDB("numbers", "user_id", "1", "body") == '' ? '' : 'none' ?>">Please add whsatapp number first!</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'footer.php';?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    
    <!-- Page level custom scripts -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script>
        <?php

        toastr_show();

        ?>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        var delayed;
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels : ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"],
                datasets: [{
                    label: 'Pesan Terkirim',
                    data: [<?php echo $total; ?>],
                    backgroundColor: 'rgba(75, 192, 192)',
                    borderColor: 'rgb(75, 192, 192)',
                    borderWidth: 2,
                    borderRadius: 4
                },
                {
                    label: 'Pesan Gagal',
                    data: [<?php echo $totalgagal; ?>],
                    backgroundColor: 'rgba(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    borderWidth: 2,
                    borderRadius: 4
                }
                ]
            },
            options: {
                animation: {
                  onComplete: () => {
                    delayed = true;
                  },
                  delay: (context) => {
                    let delay = 0;
                    if (context.type === 'data' && context.mode === 'default' && !delayed) {
                      delay = context.dataIndex * 300 + context.datasetIndex * 100;
                    }
                    return delay;
                  },
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function(value) {if (value % 1 === 0) {return value;}}
                        }
                    }]
                }
            }
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.0/socket.io.js" integrity="sha512-+l9L4lMTFNy3dEglQpprf7jQBhQsQ3/WvOnjaN/+/L4i0jOstgScV0q2TjfvRF4V+ZePMDuZYIQtg5T4MKr+MQ==" crossorigin="anonymous"></script>
    <script>
        var socket = io();
        var number = <?= $nomor ?>
    
       socket.emit('StartConnection', number)
       
        socket.on('Authenticated',data => {
            $('.imageee').html('');
            $('.statusss').html(`<div class="alert alert-success" role="alert">Connected
            <li class="list-group-item name">Name : ${data.name}</li>
            <li class="list-group-item number">Number : ${data.id.split(':')[0]}</li>
            </div>  
            `)
        })

    </script>

</body>

</html>