<?php 
    require('top_inc.php');
    if(isset($_GET['type']) && $_GET['type']!=''){
        $type=get_safe_value($con,$_GET['type']);
        if($type=='delete'){
            $name=get_safe_value($con,$_GET['name']);
            $delete_sql="delete from customize where name='$name'";
            mysqli_query($con,$delete_sql);
        }
        if($type=='contact'){
            
        }
    }


    $sql="select * from customize order by name desc";
    $res=mysqli_query($con,$sql);
?>    
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h1 class="box-title">CUSTOMIZE ORDER DETAILS </h1>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>Name</th>
                                       <th>Product</th>
                                       <th>material</th>
                                       <th>Foam</th>
                                       <th>Dimessions</th>
                                       <th>email</th>
                                       
                                       <th>address</th>
                                       <th>Mobile</th>
                                       <th>Added_on</th>
                                       <th>CONTACT</th>
                                       <th>DELETE</th>
                                    </tr>
                                </thead>
                                <?php 
                                    $i=1;
                                    while($row=mysqli_fetch_assoc($res)){?>
                                 <tbody>
                                    <tr>
                                       <td class="serial"><?php echo $i++; ?></td>
                                       
                                       <td><?php echo $row['name']; ?></td>
                                       <td><?php echo $row['product']; ?></td>
                                       <td><?php echo $row['material']; ?></td>
                                       <td><?php echo $row['foam']; ?></td>
                                       <td><?php echo $row['dim']; ?></td>
                                       <td><?php echo $row['email']; ?></td>
                                       <td><?php echo $row['addrs']; ?></td>
                                       <td><?php echo $row['mob']; ?></td>
                                       <td><?php echo $row['added_on']; ?></td>
                                       <td><?php echo "<span class='badge badge-complete'><a href='?type=contact&name=".$row['name']."'>Contact</a></span>&nbsp;&nbsp;&nbsp;"; 
                                        ?></td>
                                       <td><?php echo "<span class='badge badge-delete'><a href='?type=delete&name=".$row['name']."'>Delete</a></span>&nbsp;&nbsp;&nbsp;"; 
                                        ?></td>                                                        
                                    </tr>
                                    <?php }?>
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