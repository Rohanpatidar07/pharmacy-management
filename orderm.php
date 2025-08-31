<?php
  $uid=$_SESSION['uid'];
  $role=$_SESSION['role'];
  if($role=='2')
  
   {
     include 'distributorheader.php';
     $sql="select*from addcompany where auid='$uid'";
     $res=mysqli_query($con,$sql);
   }
   elseif($role=='3')
   {
     include 'wholesalerheader.php';
     $sql="select*from adddistributor where auid='$uid'";
     $res=mysqli_query($con,$sql);
   }
   elseif($role=='4')
   {
     include 'retailerheader.php';
     $sql="select*from addwholesaler where auid='$uid'";
     $res=mysqli_query($con,$sql);
   }
 
?>
<div class="page-wrapper p-3">
    <div class="container-fluid bg-white p-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class='text-info'>Order Medicine</h1>
                <hr>
                <h4><?php if(!empty($a))echo $a;?></h4>
                
                <?php 
                 if(!empty($cidd))
                 {
                    ////uid 
                    $sql2="select uid from users where name='$cidd'";
                    $res2=mysqli_query($con,$sql2);
                    $roww=mysqli_fetch_array($res2);
                    $id=$roww['uid'];
                    $sql1="select medicine_name,category from medicine where amuid='$id' and is_delete='0'";
                    $res1=mysqli_query($con,$sql1);
                ?>
                
                <form class="form-group" action="db.php?cid=<?php echo $id;?>" method="post">
                <?php 
                  if($role=='2')
                  {
                ?>
                    <div class="row">
                        <div class="col-lg-3">
                            <lable>Company Name :</lable>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" value="<?php echo $cidd;?>" readonly="readonly" name="cn">
                        </div>
                    </div>
                <?php } ?>
                <?php 
                  if($role=='3')
                  {
                ?>
                    <div class="row">
                        <div class="col-lg-3">
                            <lable>Distributer Name :</lable>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" value="<?php echo $cidd;?>" readonly="readonly" name="cn">
                        </div>
                    </div>
                <?php } ?>
                <?php 
                  if($role=='4')
                  {
                ?>
                    <div class="row">
                        <div class="col-lg-3">
                            <lable>Wholesaler Name :</lable>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" value="<?php echo $cidd;?>" readonly="readonly" name="cn">
                        </div>
                    </div>
                <?php } ?>
                    <div class="row mt-4">
                        <div class="col-lg-3">
                            <lable>MEDICINE NAME :</lable>
                        </div>
                        <div class="col-lg-3">
                            <select class="form-control" name="mn">
                                <?php
                                    foreach($res1 as $row)
                                    {
                                    $mn=$row['medicine_name'];
                                ?>
                                   <option><?php echo $mn;?></option>
                                <?php }?>
                            </select>
                        </div>
                        
                       
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-3">
                            <lable>QUANTITY:</lable>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="qty" class="form-control"> 
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-3">
                            <lable>Delivery time:</lable>
                        </div>
                        <div class="col-lg-3">
                            <input type="date" class="form-control" name="dd"> 
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-3">
                            <lable>Pyment:</lable>
                        </div>
                        <div class="col-lg-3">
                             <select class="form-control" name="pmethod">
                                <?php
                                    $sql4="select*from payment";
                                    $res4=mysqli_query($con,$sql4);
                                    foreach($res4 as $row4)
                                    {
                                     $pay=$row4['payment'];
                                
                                ?>
                                    <option><?php echo $pay;?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <input type="submit" class="btn btn-info" name="ocm">
                        </div>
                    </div>
                    
                </form>
                <?php } 
                else
                {
                    ?>
                    <form class="form-group" action="db.php" method="post">
                    <?php 
                    if($role=='2')
                    {
                    ?>
                    <div class="row">
                        <div class="col-lg-3">
                            <lable>Manufectural Company :</lable>
                        </div>
                        <div class="col-lg-3">
                            <select class="form-control" name='cn'>
                                <?php
                                foreach($res as $row)
                                {
                                $name=$row['cname'];
                                $cid=$row['cid'];
                                ?>
                                <option> <?php echo $name;?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <input type="submit" class="btn btn-info" name="cname">
                        </div>
                    </div>
                    <?php } ?>
                    <?php 
                    if($role=='3')
                    {
                    ?>
                    <div class="row">
                        <div class="col-lg-3">
                            <lable>Distributers Company :</lable>
                        </div>
                        <div class="col-lg-3">
                            <select class="form-control" name='cn'>
                                <?php
                                foreach($res as $row)
                                {
                                $dcname=$row['dcname'];
                                $name=$row['name'];
                                $cid=$row['cid'];
                                ?>
                                <option value='<?php echo $name;?>'> <?php echo $dcname;?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <input type="submit" class="btn btn-info" name="cname">
                        </div>
                    </div>
                    <?php } ?>
                    <?php 
                    if($role=='4')
                    {
                    ?>
                    <div class="row">
                        <div class="col-lg-3">
                            <lable>Wholesaler Company :</lable>
                        </div>
                        <div class="col-lg-3">
                            <select class="form-control" name='cn'>
                                <?php
                                foreach($res as $row)
                                {
                                $dcname=$row['wcname'];
                                $name=$row['name'];
                                $cid=$row['cid'];
                                ?>
                                <option value='<?php echo $name;?>'> <?php echo $dcname;?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <input type="submit" class="btn btn-info" name="cname">
                        </div>
                    </div>
                    <?php } ?>
                
                
            </form>
             <?php }   ?>
            </div>           
        </div>       
    </div>
</div>