<?php
include_once("helper/koneksi.php");
include_once("helper/function.php");


$login = cekSession();
if ($login == 0) {
    redirect("login.php");
}
$menu = 2;
function compress($source, $destination, $quality) {
    $info = getimagesize($source);
 
    if ($info['mime'] == 'image/jpeg') 
        $image = imagecreatefromjpeg($source);
 
    elseif ($info['mime'] == 'image/gif') 
        $image = imagecreatefromgif($source);
 
    elseif ($info['mime'] == 'image/png') 
        $image = imagecreatefrompng($source);
    imagescale($image,1920);
    imagejpeg($image, $destination, $quality);
 
    return $destination;
}
if (post("keyword")) {
    $keyword = post("keyword");
    $response = post("response");
    $type = post("type");
    $footer = post("footer");
    $btn1 = post("btn1");
    $btn2 = post("btn2");
    $footertemp = post("footertemp");
    $template1 = post("template1");
    $template2 = post("template2");
    
    switch ($type) {
            case 'text':
                $reply = ["text" => $response];
                break;
            case 'image';
                if (!empty($_FILES['media']) && $_FILES['media']['error'] == UPLOAD_ERR_OK) {
                    // Be sure we're dealing with an upload
                    if (is_uploaded_file($_FILES['media']['tmp_name']) === false) {
                        throw new \Exception('Error on upload: Invalid file definition');
                    }
                    
                    if ($_FILES["media"]["size"] > 100000) {
                      toastr_set("error", "File terlalu besar, Max 100kb");
                        redirect("autoreply.php");
                        exit;
                    }
            
                    // Rename the uploaded file
                    $uploadName = $_FILES['media']['name'];
                    $ext = strtolower(substr($uploadName, strripos($uploadName, '.') + 1));
            
                    $allow = ['png', 'jpeg', 'pdf', 'jpg', 'xlsx', 'xls', 'doc','docx'];
                    if (in_array($ext, $allow)) {
                        if ($ext == "png") {
                            $filename = round(microtime(true)) . mt_rand() . '.png';
                        }
            
                        if ($ext == "pdf") {
                            $filename = round(microtime(true)) . mt_rand() . '.pdf';
                        }
            
                        if ($ext == "jpg") {
                            $filename = round(date(true)) . mt_rand() . '.jpg';
                        }
            
                        if ($ext == "jpeg") {
                            $filename = round(microtime(true)) . mt_rand() . '.jpg';
                        }
                        if ($ext == "xlsx") {
                            $filename = round(microtime(true)) . mt_rand() . '.xls';
                        }
                        if ($ext == "xls") {
                            $filename = round(microtime(true)) . mt_rand() . '.xls';
                        }
                        if ($ext == "docx") {
                            $filename = round(microtime(true)) . mt_rand() . '.doc';
                        }
                        if ($ext == "doc") {
                            $filename = round(microtime(true)) . mt_rand() . '.doc';
                        }
                        
                    } else {
                        toastr_set("error", "Format png, jpg, pdf, xlsx, xls, docx, doc only");
                        redirect("autoreply.php");
                        exit;
                    }
            
                    move_uploaded_file($_FILES['media']['tmp_name'], 'uploads/' . $filename);
                    // Insert it into our tracking along with the original name
                    $media = $base_url . "uploads/" . $filename;
                }
                $reply = [
                   "image" => ["url" => $media ],
                   "caption" => $response
                ];
                break;
            case 'button':
                $buttons = [
                    ["buttonId" => "id1" , "buttonText" => ["displayText" => $btn1], "type" => 1], 
                    ["buttonId" => "id2" , "buttonText" => ["displayText" => $btn2], "type" => 1] 
                ];
                $buttonMessage = [
                    "text" => $response,
                    "footer" => $footer,
                    "buttons" => $buttons,
                    "headerType" => 1
                ];
                $reply = $buttonMessage;
                break;
            case 'template':
                if(!strpos($template1,'|') || !strpos($template2,'|')){
                    toastr_set("error", "format template tidak valid");
                    redirect("autoreply.php");
                } 
               
                try {
                    $allowType = ['callButton','urlButton'];
                    
                    $type1 = explode('|',$template1)[0].'Button';
                    $text1 = explode('|',$template1)[1];
                    $urlOrNumber1 = explode('|',$template1)[2];
                    
                    $type2 = explode('|',$template2)[0].'Button';
                    $text2 = explode('|',$template2)[1];
                    if(!in_array($type1,$allowType) || !in_array($type2,$allowType)){
                        toastr_set("error", "format template tidak valid");
                        redirect("autoreply.php");
                    }
                    $urlOrNumber2 = explode('|',$template2)[2];
                    $typePurpose1 = explode('|',$template1)[0] === 'url' ? 'url' : 'phoneNumber';
                    $typePurpose2 = explode('|',$template2)[0] === 'url' ? 'url' : 'phoneNumber';
                    $templateButtons = [
                        ["index" => 1, $type1 => ["displayText" => $text1,$typePurpose1 => $urlOrNumber1]],
                        ["index" => 2, $type2 => ["displayText" => $text2,$typePurpose2 => $urlOrNumber2]],
                    ];
                    $templateMessage = [
                        "text" => $response,
                        "footer" => $footertemp,
                        "templateButtons" => $templateButtons
                    ];
                    $reply = $templateMessage;
                } catch (Exception $e) {
                    echo 'Message: ' .$e->getMessage();
                }
              
                break;
            default:
                # code...
                break;
        }
        $device = sender();
        $jsonReply = json_encode($reply);
        $q = mysqli_query($koneksi, "INSERT INTO autoreplies(`user_id`, `device`, `keyword`, `type`, `reply`)
            VALUES('1', '$device', '$keyword', '$type', '$jsonReply')");
            toastr_set("success", "Sukses menambahkan autoreply");
    

    
}

if (get("act") == "hapus") {
    $id = get("id");

    $q = mysqli_query($koneksi, "DELETE FROM autoreplies WHERE id='$id'");
    toastr_set("success", "Sukses menghapus autoreply");
    redirect("autoreply.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bermainapi - Auto Reply</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
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

                    <!-- DataTales Example -->
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">
                        Tambah Autoreply
                    </button>
                    <br>
                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Autoreply</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="autoreplies" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Keyword</th>
                                            <th>Response</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $q = mysqli_query($koneksi, "SELECT * FROM autoreplies");

                                        while ($row = mysqli_fetch_assoc($q)) {
                                            echo '<tr>';
                                            echo '<td>' . $row['id'] . '</td>';
                                            echo '<td>' . $row['keyword'] . '</td>';
                                            if ($row['type']=="text"){
                                                $jsonobj = $row['reply'];
                                                $data = json_decode($jsonobj);
                                                $text = $data->text;
                                                echo '<td><h5><span class="badge badge-secondary">' . $text . '</span></h5></td>';
                                            }if ($row['type']=="image"){
                                                 $jsonobj = $row['reply'];
                                                $data = json_decode($jsonobj);
                                                $url = $data->image->url;
                                                echo '<td><a class="btn btn-danger" href="' . $url. '" target="_blank">View</a></td>';
                                            }else if ($row['type']=="button"){
                                                $jsonobj = $row['reply'];
                                                $data = json_decode($jsonobj);
                                                $btn1 = $data->buttons[0]->buttonText->displayText;
                                                $btn2 = $data->buttons[1]->buttonText->displayText;
                                                echo '<td><a class="btn btn-info">' . $btn1. '</a> <a class="btn btn-info">' . $btn2 . '</a></td>';
                                            }else if ($row['type']=="template"){
                                                $jsonobj = $row['reply'];
                                                $data = json_decode($jsonobj);
                                                $btn1 = $data->templateButtons[0]->callButton->displayText;
                                                $phone = $data->templateButtons[0]->callButton->phoneNumber;
                                                $btn2 = $data->templateButtons[1]->urlButton->displayText;
                                                $url = $data->templateButtons[1]->urlButton->url;
                                                echo '<td><a class="btn btn-primary">' . $btn1.' ' .$phone. '</a> <a class="btn btn-primary">' . $btn2. ' '.$url . '</a></td>';
                                            }
                                            echo '<td>' . $row['type'] . '</td>';
                                            echo '<td><a class="btn btn-danger" href="autoreply.php?act=hapus&id=' . $row['id'] . '">Hapus</a></td>';
                                            echo '</tr>';
                                        }

                                        ?>
                                    </tbody>
                                </table>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Autoreply</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label for="type" class="form-label">Type Reply</label>
                        <select name="type" id="type" onchange="yesnoCheck(this);" class="js-states form-control" tabindex="-1" style=" width: 100%" required>
                          <option selected  disabled>Select One</option>
                            <option value="text">Text Message</option>
                            <option value="image">Image Message</option>
                            <option value="button">Button Message</option>
                            <option value="template">Template Message</option>
                           
                        </select>
                        <div id="keyword" style="display: none;">
                            <br>
                            <label> Keyword </label>
                            <input type="text" name="keyword" required class="form-control">
                        </div>
                        <div id="response" style="display: none;">
                            <br>
                            <label> Response </label>
                            <textarea name="response" class="form-control" required></textarea>
                        </div>
                        <div id="media" style="display: none;">
                            <br>
                            <label> Media </label>
                            <input type="file" name="media" class="form-control">
                        </div>
                        <div id="btn" style="display: none;">
                            <br>
                            <label> Footer </label>
                            <input type="text" name="footer" class="form-control">
                            <br>
                            <label for="btn1">Button 1</label> 
                            <select class="form-control js-example-basic-multiple" id="btn1" name="btn1" style="width: 100%" >
                                        <option value="" selected >Select Respond</option>
                                        <?php
                                        $q = mysqli_query($koneksi, "SELECT * FROM autoreplies");
                                    
                                        while ($row = mysqli_fetch_assoc($q)) {
                                            echo '<option value="' . $row['keyword'] . '">' . $row['keyword'] . ' </option>';
                                        }
                                        ?>
                            </select>
                            <br>
                            <label for="btn2">Button 2</label> 
                            <select class="form-control js-example-basic-multiple" id="btn2" name="btn2" style="width: 100%" >
                                        <option value="" selected>Select Respond</option>
                                        <?php
                                        $q = mysqli_query($koneksi, "SELECT * FROM autoreplies");
                                    
                                        while ($row = mysqli_fetch_assoc($q)) {
                                            echo '<option value="' . $row['keyword'] . '">' . $row['keyword'] . ' </option>';
                                        }
                                        ?>
                            </select>
                        </div>
                        <div id="template" style="display: none;">
                            <br>
                            <label> Footer Template </label>
                            <input type="text" name="footertemp" class="form-control">
                            
                            <br>
                            <label for="template1">Template 1</label> 
                            <input type="text" name="template1" class="form-control">
                            <p class="small-text">call|hubungi kami|6282246698567</p>
                            
                            <label for="template2">Template 2</label> 
                            <input type="text" name="template2" class="form-control">
                            <p class="small-text">url|Visit us|https://bermainapi.com</p>
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script>
    function yesnoCheck(that) 
    {
        if(that.value == "text"){
            document.getElementById("keyword").style.display = "block";
            document.getElementById("response").style.display = "block";
        }else{
            document.getElementById("keyword").style.display = "none";
            document.getElementById("response").style.display = "none";
        }
        
        if (that.value == "image"){
            document.getElementById("keyword").style.display = "block";
            document.getElementById("response").style.display = "block";
            document.getElementById("media").style.display = "block";
        }else{
            document.getElementById("media").style.display = "none";
        }
        
        if (that.value == "button"){
            document.getElementById("keyword").style.display = "block";
            document.getElementById("response").style.display = "block";
            document.getElementById("btn").style.display = "block";
        }else{
            document.getElementById("btn").style.display = "none";
        }
        
        if (that.value == "template"){
            document.getElementById("keyword").style.display = "block";
            document.getElementById("response").style.display = "block";
            document.getElementById("template").style.display = "block";
        }else{
            document.getElementById("template").style.display = "none";
        }
        
    }
        <?php

        toastr_show();

        ?>
    </script>
    <script>
            $('#autoreply').dataTable( {
                "pageLength": 20,
                "orderFixed": [ 0, 'desc' ]
            } );
    </script>
</body>

</html>