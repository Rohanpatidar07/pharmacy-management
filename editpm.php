<?php
include 'company.php';
$sql="select*from purchase where pid='$pid'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$name=$row['medicine_name'];
$cat=$row['category'];
$qty=$row['quantity'];
$expiry=$row['expiry'];

?>
<div class="page-wrapper p-3">
    <div class="container-fluid bg-white p-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class='text-info'>Edit Medicine</h1>
                <hr>
                <form class="form-group" action="db.php?updatemedicine=<?php echo $mid?>" method="post">
                    <div class="row">
                        <div class="col-lg-2">
                            <lable>MEDICINE NAME :</lable>
                        </div>
                        <div class="col-lg-2">
                            <input type="text" name="name" class="form-control" value="<?php echo $name;?>">
                        </div>
                        <div class="col-lg-2">
                            <lable>CATEGORY:</lable>
                        </div>
                        <div class="col-lg-2">
                            <select class="form-control" name="category">
                                <?php
                                    $sql1="select*from category";
                                    $res1=mysqli_query($con,$sql1);
                                    foreach($res1 as $roww)
                                    {
                                    $category=$roww['category'];
                                
                                ?>
                                    <option <?php if($cat==$category) echo 'selected';?>><?php echo $category;?></option>
                                <?php }?>
                            </select>
                        </div>
                      
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <lable>QUANTITY:</lable>
                        </div>
                        <div class="col-lg-2">
                            <input type="text" name="qty" class="form-control" value="<?php echo $qty;?>"> 
                        </div>
                        <div class="col-lg-2">
                            <lable>EXPIRY_DATE:</lable>
                        </div>
                        <div class="col-lg-2">
                            <input type="date" name="ex" class="form-control" value="<?php echo $expiry;?>"> 
                        </div>
                    </div>
                    
                    <div class="row mt-2">

                        
                    </div>
                    <hr>
                    <input type="submit" class="btn btn-primary" name="updatepm">
                    
                </form>
            </div>           
        </div>       
    </div>
</div>