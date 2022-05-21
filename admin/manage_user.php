<?php 
    require('top_inc.php');
    if(isset($_GET['type']) && $_GET['type']!=''){
        $type=get_safe_value($con,$_GET['type']);
        if($type=='delete'){
            $uname=get_safe_value($con,$_GET['uname']);
            $delete_sql="delete from user where uname='$uname'";
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
                           <h1 class="box-title">USER DETAILS </h1>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th class="avatar">username</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Mobile</th>
                                       <th>address</th>
                                       <th>password</th>
                                       <th>Added_on</th>
                                       <th>ACTION</th>
                                    </tr>
                                </thead>
                                <?php 
                                    $i=1;
                                    while($row=mysqli_fetch_assoc($res)){?>
                                 <tbody>
                                    <tr>
                                       <td class="serial"><?php echo $i++; ?></td>
                                       <td><?php echo $row['uname']; ?></td>
                                       <td><?php echo $row['name']; ?></td>
                                       <td><?php echo $row['email']; ?></td>
                                       <td><?php echo $row['mob']; ?></td>
                                       <td><?php echo $row['addrs']; ?></td>
                                       <td><?php echo $row['pass']; ?></td>
                                       <td><?php echo $row['added_on']; ?></td>
                                        <td><?php echo "<span class='badge badge-delete'><a href='?type=delete&uname=".$row['uname']."'>Delete</a></span>&nbsp;&nbsp;&nbsp;"; 
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