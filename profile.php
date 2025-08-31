<?php
    $id=$_SESSION['uid'];
    $role=$_SESSION['role'];
    if($role=='1')
    {
      include 'company.php';
    }
    elseif($role=='2')
    {
      include 'distributorheader.php';
    }
    elseif($role=='3')
    {
      include 'wholesalerheader.php';
    }
    elseif($role=='4')
    {
      include 'retailerheader.php';
    }

    $sql="select*from users where uid='$id'";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($res);
    $n=$row['name'];
    $m=$row['mobile'];
    $e=$row['email'];
    $ad=$row['address'];
    $img=$row['img'];
?>
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center bg-secondary p-5">
            <div class="col-xl-6 col-md-12 rounded">
                    <div class="row m-l-0 m-r-0">
                     
                        <div class="col-sm-5 bg-c-lite-green user-profile rounded">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="<?php echo $img;?>" height="200" width="200" class="rounded">
                                <form action="db.php" method="post" enctype="multipart/form-data" class="mb-5">
                                    <input type="file" name="img" class='ml-1'>
                                    <input type="submit" name="upload" value="upload" class="btn btn-info ml-2 mt-3">
                                </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7 bg-white border rounded">
                            <div class="card-block">
                            <h4 class='text-info'><?php if(!empty($a))echo $a;?></h4>
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Name</p>
                                        <h6 class="text-muted f-w-400"><?php echo $n;?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400"><?php echo $e;?></h6>
                                    </div>

                                   
                                </div>
                                <div class="row">
                                   <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400"><?php echo $m;?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Address</p>
                                        <h6 class="text-muted f-w-400"><?php echo $ad;?></h6>
                                    </div>
                                </div>
                                <hr>
                                <button type="button" class="btn btn-primary d-block" data-toggle="modal" data-target="#abhiiiii">
                                      Change address
                                  </button>
                                  <button type="button" class="btn btn-danger d-block mt-2" data-toggle="modal" data-target="#singh">
                                      Password change
                                  </button>
                                  <button type="button" class="btn btn-dark mt-2" data-toggle="modal" data-target="#pratap">
                                      Edit profile
                                  </button>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
</div>
            <!-- Modal address -->
           <div class="modal fade" id="abhiiiii" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Address change</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="db.php" methode="post">
                        <textarea col="600" rows="2" name="address"></textarea><br>
                        <input type="submit" name="add" value="chenge_address" class="btn btn-info">
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div>
                <!-- password chenge modal-->
                <div class="modal fade" id="singh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Password chenge</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <form class="form-group" action="db.php" method="post">
                                <input type="text" name="old" class="form-control" placeholder="Enter old password" style="margin-top:10px">
                                <input type="text" name="new" class="form-control" placeholder="Enter new password" style="margin-top:10px">
                                <input type="text" name="re" class="form-control" placeholder="re enter new password" style="margin-top:10px">
                                <input type="submit" name="chengeps" class="bg-info text-white mt-5 btn btn-info mt-2" style="margin-top:10px">
                        </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
             <!-- edit profile model -->

             <div class="modal fade" id="pratap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                          <h1 class="text-info text-center">Edit profile detail</h1>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            <form class="form-group shadow shadow-lg p-5" action="db.php" method="post">
                                          
                              <?php if(!empty($in)) echo $in;?>
                              <div class="form-group">
                                  <lable>Name:</lable>
                                  <input type="text" name="name" class="form-control p-4" value="<?php echo $n?>">
                                  <lable>Email:</lable>
                                  <input type="email" name="email" class="form-control p-4" value="<?php echo $e?>" >
                                  <lable>Mobile number:</lable>
                                  <input type="text" name="number" class="form-control p-4" value="<?php echo $m?>">
                                  <input type="submit" name="update" class="bg-info text-white mt-5 btn btn-info mt-2" style="margin-top:10px">
                              </div>
                            </form>
                              
                                              
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                    </div>
              </div>