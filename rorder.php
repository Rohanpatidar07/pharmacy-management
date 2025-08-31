<?php
 $uid=$_SESSION['uid'];
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
 
  

?>
<div class="page-wrapper p-3">
    <div class="container-fluid bg-white p-5"  style="background-image:url('img/f.webp');background-size=100% 100%">
        <div class="row">
            <div class="col-lg-12">
                <h1 class='text-white'>Recive  order  Medicine</h1>
                <hr class='bg-white'>
               
                <table class="table table-bordered">
                        <thead class="bg-dark text-warning">
                        <tr>
                            <?php 
                            if($role=='1')
                            {
                               echo '<th>Distributor name</th>';
                            }
                            elseif($role=='2')
                            {
                               echo '<th>Wholesaler name</th>';
                            }
                            elseif($role=='3')
                            {
                               echo '<th>Retailer name</th>';
                            }
                            ?>
                            <th>Medicine name</th>
                            <th>quantity</th>
                            <th>Order time</th>
                            <th>Delivery time</th>
                            <th>order Status</th>
                            <th>action</th>
                            
                        </tr>
                        </thead>
                        <?php
                            $sql="SELECT orders.oid,orders.medicine_name,orders.quantity,orders.order_date,orders.d_date,users.name,orders.o_status
                            FROM (orders INNER JOIN users ON orders.soid = users.uid) where orders.roid='$uid'";
                            $res=mysqli_query($con,$sql);
                            foreach($res as $row)
                            {
                              $name=$row['name'];
                              $mn=$row['medicine_name'];
                              $qty=$row['quantity'];
                              $od=$row['order_date'];
                              $dd=$row['d_date'];
                              $oid=$row['oid'];
                              $os=$row['o_status'];

                           
                         ?>
                         <tbody class='text-white'>
                            <tr>
                               <td><?php echo $name;?></td>
                               <td><?php echo $mn;?></td>
                               <td><?php echo $qty;?></td>
                               <td><?php echo $od;?></td>
                               <td><?php echo $dd;?></td>
                               <td><?php echo $os;?></td>
                               <td>
                                   <?php 
                                   if($os=='order confirm')
                                   {
                                    ?>
                                     <a href="db.php?sendmedicine=<?php echo $oid;?>" class="btn btn-info">send</a>
                                     <?php }
                                     elseif($os=='order pending')
                                     {
                                         ?>
                                         <a href="db.php?vmedicine=<?php echo $oid;?>" class="btn btn-info">Verify</a>
                                         <?php
                                     }
                                     else
                                     {
                                      
                                        echo '<a href="" class="btn btn-info"><i class="fa fa-check" aria-hidden="true"></i></a>';
                                    
                                        }
                                     ?>
                                   

                                        

                                </td>
                            </tr>
                        </tbody>
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>