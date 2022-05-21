<?php 
    require('top_inc.php');
    if(isset($_GET['type']) && $_GET['type']!=''){
        $type=get_safe_value($con,$_GET['type']);
        if($type=='delete'){
            $id=get_safe_value($con,$_GET['id']);
            $delete_sql="delete from contactus where id='$id'";
            mysqli_query($con,$delete_sql);
        }
    }


    $sql="select * from contactus order by id desc";
    $res=mysqli_query($con,$sql);
?>    
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h1 class="box-title">Contact Us </h1>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th class="avatar">ID</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Mobile</th>
                                       <th>Query</th>
                                       <th>Date</th>
                                       <th>Delete</th>
                                    </tr>
                                </thead>
                                <?php 
                                    $i=1;
                                    while($row=mysqli_fetch_assoc($res)){?>
                                 <tbody>
                                    <tr>
                                       <td class="serial"><?php echo $i++; ?></td>
                                       <td><?php echo $row['id']; ?></td>
                                       <td><?php echo $row['name']; ?></td>
                                       <td><?php echo $row['email']; ?></td>
                                       <td><?php echo $row['mobile']; ?></td>
                                       <td><?php echo $row['comment']; ?></td>
                                       <td><?php echo $row['time']; ?></td>
                                        <td><?php echo "<a class='badge badge-delete' href='?type=delete&id=".$row['id']."'>Delete</a>&nbsp;&nbsp;&nbsp;"; 
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