<?php
 $uid=$_SESSION['uid'];
 $role=$_SESSION['role'];
 if($role=='2')
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
?>
<div class="page-wrapper p-3">
    <div class="container-fluid bg-white p-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class='text-info'>Manage Purchase  Medicine</h1>
                <hr>
               
                <table class="table table-bordered">
                        <thead class="bg-dark text-white">
                        <tr>
                        <?php 
                                if($role=='3')
                                {

                                   echo'<th>Distributer name</th>';
                                }
                                elseif($role=='4')
                                {

                                   echo'<th>Wholesaler name</th>';
                                }
                                elseif($role=='2')
                                {

                                   echo'<th>Company name</th>';
                                }
                               ?>   

                            <th>Medicine name</th>
                            <th>quantity</th>
                            <th>Order time</th>
                            <th>Delivery time</th>
                            <th>Order_status</th>
                            <th>action</th>
                            
                        </tr>
                        </thead>
                        <?php
                            $sql="SELECT orders.medicine_name,orders.quantity,orders.o_status,orders.order_date,orders.oid,orders.d_date,users.name
                            FROM (orders INNER JOIN users ON orders.roid = users.uid) where orders.soid='$uid'";
                            $res=mysqli_query($con,$sql);
                            foreach($res as $row)
                            {
                              $name=$row['name'];
                              $mn=$row['medicine_name'];
                              $qty=$row['quantity'];
                              $od=$row['order_date'];
                              $dd=$row['d_date'];
                              $os=$row['o_status'];
                              $oid=$row['oid'];
                           
                         ?>
                         <tbody>
                            <tr>
                               <td><?php echo $name;?></td>
                               <td><?php echo $mn;?></td>
                               <td><?php echo $qty;?></td>
                               <td><?php echo $od;?></td>
                               <td><?php echo $dd;?></td>
                               <td><?php echo $os;?></td>
                               
                               <td>
                                   <?php 
                                   if($os=='order send')
                                   {
                                     echo "<a href='db.php?rmedicine=$oid' class='btn btn-info'>recive</a>";
                                    
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