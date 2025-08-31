<?php 
$uid=$_SESSION['uid'];
$role=$_SESSION['role'];
if($role=='4')
{
    include 'retailerheader.php';
}
$sql="select*from addcustomer where auid='$uid' and is_delete='0'";
$res=mysqli_query($con,$sql);
?>
<div class="page-wrapper p-3">
    <div class="container-fluid bg-white p-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class='text-info'>Sale medicine Customer</h1>
                
                <hr>
                <?php
            
                if(!empty($m))
                {
                    $aa=count($m);
                ?>
                <form action="db.php" method="post" class="shadow p-3">
                    <h3 class="text-info"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Card</h3>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2">
                            <lable>Customer name :</lable>
                        </div>
                        <div class="col-lg-6">
                           <input type="text" class="form-control" value="<?php echo $cn;?> (location=<?php echo $ad?>)">
                           <input type="hidden" class="form-control" value="<?php echo $cid;?>" name="cn">
                        </div>
                    </div>
                    <table class="table table-bordered mt-2">
                        <thead class="bg-dark text-white">
                        <tr>
                           
                            <th>Name</th>
                            <th>Category</th>
                            <th>Available quantity</th>
                            <th>Expiry date</th>
                            <th>Saleprice</th>
                            <th>Quantity</th>
                            
                        </tr>
                        </thead>
             
                        <?php
                              for ($i=0; $i<$aa; $i++)
                              { 
                                 $sql4="select*from medicine where is_delete='0' and mid='$m[$i]'";
                                 $res4=mysqli_query($con,$sql4);
                                 $row4=mysqli_fetch_array($res4);
                                       $name1=$row4['medicine_name'];
                                       $cat1=$row4['category'];
                                       $qty1=$row4['quantity'];
                                       $ex1=$row4['expiry'];
                                       $mrp1=$row4['mrp'];
                                       $mid1=$row4['mid'];
                                       $bb=1+$i;

                        ?>
                         <tbody>
                            <tr>
                                
                                <td><?php echo $name1?><input type="hidden" class="form-control" name='mname[]' value="<?php echo $name1;?>"></td>

                                <td><?php echo $cat1?><input type="hidden" class="form-control" name='mcat[]' value="<?php echo $cat1;?>"></td>

                                <td><?php echo $qty1?><input type="hidden" class="form-control" name='aqty[]' value="<?php echo $qty1;?>"></td>

                                <td><?php echo $ex1?><input type="hidden" class="form-control" name='ex[]' value="<?php echo $ex1;?>"></td>

                                <td><?php echo $mrp1?> <input type="hidden" class="form-control" name='mrp[]' value="<?php echo $mrp1;?>"></td>

                                <td><input type="text" class="form-control" name='sqty[]'>
                                </td>
                            </tr>
                        </tbody>

                        
                          <?php }?>
                         
                    </table>
                    <div class="row mt-3">
                                            
                    <div class="col-lg-2">
                        <lable>Pyment method :</lable>
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
                
                </div>
                    <input type="submit" class="btn btn-primary" name="smc">
                              </form>
                <?php }
                else
                { ?>
                    <hr>
                <form action="db.php" method="post">
                <div class='row'>
                    <div class="col-lg-2">
                        <lable>Customer Name</lable>
                    </div>
                    <div class="col-lg-5">
                        <select class="form-control" name="dcname">
                            <?php
                                foreach($res as $row)
                                {
                                    $n=$row['name'];
                                    $a=$row['address'];
                                    $em=$row['email'];
                            ?>
                            <option value="<?php echo $em;?>"><?php echo $n;?> (Name=<?php echo $n?>) (Location=<?php echo $a?>)</option>
                            <?php }?>
                        </select>
                    </div>
                   
                </div>
                
                <hr>
                <table class="table table-bordered">
                        <thead class="bg-dark text-white">
                        <tr>
                            <th>Select</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>quantity</th>
                            <th>Expiry date</th>
                            <th>Saleprice</th>
                            
                        </tr>
                        </thead>
             
                        <?php
                            $sql="select*from medicine where is_delete='0' and amuid='$uid'";
                            $res=mysqli_query($con,$sql);
                            foreach($res as $row)
                            {
                              $name=$row['medicine_name'];
                              $cat=$row['category'];
                              $qty=$row['quantity'];
                              $expiry=$row['expiry'];
                              $mrp=$row['mrp'];
                              $mid=$row['mid'];
                        

                        ?>
                         <tbody>
                            <tr>
                                <td><input type="checkbox" name="medi[]" value="<?php echo $mid;?>"></td>
                                <td><?php echo $name?></td>
                                <td><?php echo $cat?></td>
                                <td><?php echo $qty?></td>
                                <td><?php echo $expiry?></td>
                                <td><?php echo $mrp?></td>
                            </tr>
                        </tbody>
                        
                <?php }?>
                </table>
                <input type="submit" class="btn btn-info" name="m">
                </form>
              <?php  }
                ?>
               
                </form>
             
            </div>
        </div>
       
    </div>
</div>
