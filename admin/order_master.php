<?php 
    require('top_inc.php');
    if(isset($_GET['type']) && $_GET['type']!=''){
        $id=get_safe_value($con,$_GET['id']);
        $type=$_GET['type'];
        if($type=='delete'){
            $id=get_safe_value($con,$_GET['id']);
            $delete_sql="delete from `order` where id='$id'";
            mysqli_query($con,$delete_sql);
            $delete_sql="delete from order_detail where order_id='$id'";
            mysqli_query($con,$delete_sql);
            
        }
    }


    $sql="select * from user order by uname desc";
    $res=mysqli_query($con,$sql);
?>    
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h1 class="king">ORDER DETAILS </h1>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                           <table class="table">

                                 <thead>
                                 <tr>
                                                <th class="product-thumbnail">Order ID</th>
                                                <th class="product-name"><span class="nobr">Order Date</span></th>
                                                <th class="product-price"><span class="nobr"> Address </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Payment Type </span></th>
												<th class="product-stock-stauts"><span class="nobr"> Payment Status </span></th>
												<th class="product-stock-stauts"><span class="nobr"> Order Status </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> ACTION </span></th>
                                            </tr>
                                </thead>

                                       <tbody>
											<?php
											
											$res=mysqli_query($con,"select `order`.*,order_status.name as order_status_str from `order`,order_status where  order_status.id=`order`.order_status");
                                            while($row=mysqli_fetch_assoc($res)){
   
											?>
                                            <tr>
												<td class="product-add-to-cart"><a href="order_master_detail.php?id=<?php echo $row['id']?>"> <?php echo $row['id']?></a></td>
                                                <td class="product-name"><?php echo $row['added_on']?></td>
                                                <td class="product-name">
												<?php echo $row['address']?><br/>
												<?php echo $row['city']?><br/>
												<?php echo $row['pincode']?>
												</td>
												<td class="product-name"><?php echo $row['payment_type']?></td>
												<td class="product-name"><?php echo ucfirst($row['payment_status'])?></td>
												<td class="product-name"><?php echo $row['order_status_str']?></td>
                                                <td><?php
                                                echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>&nbsp;&nbsp;&nbsp;"; 
                                        ?></td> 
                                                
                                       
                                     </tr>
                                                <?php } ?>
                                        </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php 
    require('footer_inc.php');
?>