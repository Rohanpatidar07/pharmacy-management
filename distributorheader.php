<?php
    $id=$_SESSION['uid'];
    $sql="select name,img from users where uid='$id'";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($res);
    $name=$row['name'];
    $img=$row['img'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>


        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/sidenav.css">
        <link rel="stylesheet" href="css/profile.css">
        <link rel="stylesheet" href="css/home.css">
        <script type="text/javascript">
        var pid = "none";
        function showhide(id) {
            var elements = document.getElementById(id).childNodes;
            var menu = elements[3];
            var arrow = ((elements[1].childNodes)[4].childNodes)[1];
            if(menu.style.display == 'block') {
            menu.style.display = "none";
            arrow.style.transform = "rotate(0deg)";
            elements[1].style.color = "#eeeeee";
            }
            else {
            menu.style.display = "block";
            arrow.style.transform = "rotate(270deg)";
            elements[1].style.color = "#ff5252";
            }
            if(pid == id)
            pid = "none";
            if(pid != "none") {
            elements = document.getElementById(pid).childNodes;
            menu = (document.getElementById(pid).childNodes)[3];
            arrow = ((elements[1].childNodes)[4].childNodes)[1];
            if(menu.style.display == 'block') {
                menu.style.display = "none";
                arrow.style.transform = "rotate(0deg)";
                elements[1].style.color = "#eeeeee";
            }
            }
            pid = id;
        }

        function showOptions() {
            var flag = document.getElementById('options');
            if(flag.style.display == 'block') {
            flag.style.display = "none";
            document.getElementById('mark').style.display = "none";
            }
            else {
            flag.style.display = "block";
            document.getElementById('mark').style.display = "block";
            }
        }
        </script>
    </head>
    <body>

            <div class="sidenav">
            <div class="card">
                <div class="card-body">
                <div class="logo">
                    <img src="<?php echo $img;?>" class="profile" height="100px" width="140px"/>
                    <h1 class="logo-caption"><?php echo $name;?><br><span class="tweak">Dis</span>tributor</h1>
                </div> <!-- logo class -->

                <!-- dashboard start -->
                <div class="main-menu-item">
                    <a href="db.php?dashboard"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                </div>
                <!-- dashboard end -->
                <!-- profile start -->
                <div class="main-menu-item">
                    <a href="db.php?myprofile"><i class="fa fa-user" aria-hidden="true"></i><span>My_profile</span></a>
                </div>
                <!--profile end -->

                

               
                <div id="abhi" class="main-menu-item" onclick="showhide(this.id);">
                    <a href="#">
                    <i class="fa fa-bath" aria-hidden="true"></i><span>Purchase Medi</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu" style="display: none;">
                        <li class="treeview"><a href="db.php?orderm">Purchase Medicine</a></li>
                        <li class="treeview"><a href="db.php?morderm">manage Purchase Medicine</a></li>
                       
                    </ul>
                </div>
                 <!-- medicine strat -->
                 <div id="third" class="main-menu-item" onclick="showhide(this.id);">
                    <a href="#">
                    <i class="fa fa-medkit" aria-hidden="true"></i><span>Medicine</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu" style="display: none;">
                        <li class="treeview"><a href="db.php?addm">add Medicine</a></li>
                        <li class="treeview"><a href="db.php?viewmedi">View Medicine</a></li>
                        <li class="treeview"><a href="db.php?manage_pm">View Purchase Medicine</a></li>
                        <li class="treeview"><a href="db.php?outofstock">Out of stock Medicine</a></li>
                    </ul>
                </div>
                 <!-- recive order-->
                 <div class="main-menu-item">
                    <a href="db.php?rorder"><i class="fa fa-first-order" aria-hidden="true"></i><span>Recive order</span></a>
                </div>
                <div class="main-menu-item">
                    <a href="db.php?ex"><i class="fa fa-arrow-down" aria-hidden="true"></i><span>Expired Medicine</span></a>
                </div>
                <!-- medicine end -->
                <!-- distributor start -->
                <div id="second" class="main-menu-item" onclick="showhide(this.id);">
                    <a href="#">
                        <i class="fa fa-handshake"></i><span>Company</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu" style="display: none;">
                        <li class="treeview"><a href="db.php?ac">Add Company</a></li>
                        <li class="treeview"><a href="db.php?managec">Manage Company</a></li>
                    </ul>
                </div>
                <!-- distributor end -->
                <div id="abhii" class="main-menu-item" onclick="showhide(this.id);">
                    <a href="#">
                    <i class="fa fa-male" aria-hidden="true"></i><span>Wholsaler</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu" style="display: none;">
                        <li class="treeview"><a href="db.php?aw">Add Wholesaler</a></li>
                        <li class="treeview"><a href="db.php?mw">Manage Wholesaler</a></li>
                    </ul>
                </div>
                
                <!-- Sale strat -->
                <div id="first" class="main-menu-item" onclick="showhide(this.id);">
                    <a  href="#">
                        <i class="fa fa-balance-scale"></i><span>Sale Medicine</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu" style="display: none;">
                        <li class="treeview"><a href="db.php?sale">New Sale</a></li>
                        <li class="treeview"><a href="db.php?managesales">Manage Seles</a></li>
                    </ul>
                </div>
                <!-- sale end -->

               <!-- report start -->
                <div id="sixth" class="main-menu-item" onclick="showhide(this.id);">
                    <a href="#">
                        <i class="fa fa-book"></i><span>Report</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu" style="display: none;">
                    <li class="treeview"><a href="db.php?payment">Pyment repoat</a></li>
                    </ul>
                </div>
                <!-- report end -->
                <!-- logout-->
                <div class="main-menu-item">
                    <a href="db.php?logout"><i class="fa fa-sign-out" aria-hidden="true"></i><span>Logout</span></a>
                </div>
               

                </div> <!-- card-body class -->
            </div> <!-- card  -->
         
            </div>
            <div class="container-fluid">
                <div class="container">
                    
                </div>
            </div>
         
    </body>
    </html>
