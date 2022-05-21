<?php 
    require('top_inc.php');
    $categories_id='';
    $name='';
    $mrp='';
    $price='';
    $qty='';
    $img='';
    $short_desc='';
    $description='';
    $meta_title='';
    $meta_desc='';
    $meta_keyword='';
    $status='';
    $msg="";
    $img_required="required";
  if(isset($_GET['id']) && $_GET['id']!=''){
      $img_required="";
      $id=get_safe_value($con,$_GET['id']);
      $edit_sql="select * from product where id='$id'";
      $res=mysqli_query($con,$edit_sql);
      $cheak=mysqli_num_rows($res);
      if($cheak>0){
      $edit_row=mysqli_fetch_assoc($res);
      $id=$edit_row['id'];
      $categories_id=$edit_row['categories_id'];
      $name=$edit_row['name'];
      $mrp=$edit_row['mrp'];
      $price=$edit_row['price'];
      $qty=$edit_row['qty'];
      $short_desc=$edit_row['short_desc'];
      $description=$edit_row['description'];
      $meta_title=$edit_row['meta_title'];
      $meta_desc=$edit_row['meta_desc'];
      $meta_keyword=$edit_row['meta_keyword'];
      $status=$edit_row['status'];
      }else{  header('location:product.php');
         die();
      }   
   }
    if(isset($_POST['submit'])){
        $id=get_safe_value($con,$_POST['id']);
        $categories_id=get_safe_value($con,$_POST['categories_id']);
        $name=get_safe_value($con,$_POST['name']);
        $mrp=get_safe_value($con,$_POST['mrp']);
        $price=get_safe_value($con,$_POST['price']);
        $qty=get_safe_value($con,$_POST['qty']);
        $short_desc=get_safe_value($con,$_POST['short_desc']);
        $description=get_safe_value($con,$_POST['description']);
        $meta_title=get_safe_value($con,$_POST['meta_title']);
        $meta_desc=get_safe_value($con,$_POST['meta_desc']);
        $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
        $status=get_safe_value($con,$_POST['status']);
        $sql="select * from product where name='$name'";
        $res=mysqli_query($con,$sql);
        $cheak=mysqli_num_rows($res);
        if($cheak>0){
            $msg="Product Already Exist !!";
        }else{
        if(isset($_GET['id']) && $_GET['id']!=''){
            if($_FILES['img']['name']!=''){
                $img=rand(111,999).'_'.$_FILES['img']['name'];
                 move_uploaded_file($_FILES['img']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$img);
                 $update_sql="update product set id='$id',categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',img='$img',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',status='$status' where id='$id'";     
                }else{
                $update_sql="update product set id='$id',categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',status='$status' where id='$id'";
            }   
            if(mysqli_query($con,$update_sql)){echo "true";}
            }
            else
            {
            $img=rand(111,999).'_'.$_FILES['img']['name'];
            move_uploaded_file($_FILES['img']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$img);
            
            $sql="insert into product(id,categories_id,name,mrp,price,qty,img,short_desc,description,meta_title,meta_desc,meta_keyword,status) values('$id','$categories_id','$name','$mrp','$price','$qty','$img','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword','$status')";    
            mysqli_query($con,$sql);
  
            } 
    }
      header('location:product.php');
    die();
    }
   
   ?>    
         <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Products Form</strong></div>
                        <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                        <div class="form-group">
                              <label for="id" class=" form-control-label">Product ID</label>
                               <input type="text" name="id" placeholder="Enter your Product ID" class="form-control" required value="<?php echo $id ?>" >
                            </div>                    
                     
                        <div class="form-group">
                        <label for="categories" class="form-control-label">Category</label>
                                 <select class=" form-control" name="categories_id" required>
                                 <option>Select Categories</option> 
                                 <?php
                                 $res=mysqli_query($con,"select id,categories from categories order by id asc");
                                 while($row=mysqli_fetch_assoc($res)){
                                       if($row['id']==$categories_id){
                                          echo "<option selected value=".$row['id'].">".$row['categories']."</option>";    
                                       }else{
                                       echo "<option value=".$row['id'].">".$row['categories']."</option>";
                                 } }
                                 ?>
                                 </select>
                            </div>
                              <div class="form-group">
                              <label for="name" class=" form-control-label">Product Name</label>
                               <input type="text" name="name" placeholder="Enter your Product name" class="form-control" required value="<?php echo $name ?>" >
                            </div>
                            <div class="form-group">
                              <label for="mrp" class=" form-control-label">MRP</label>
                               <input type="text" name="mrp" placeholder="Enter your Product MRP" class="form-control" required value="<?php echo $mrp ?>" >
                            </div>
                            <div class="form-group">
                              <label for="price" class=" form-control-label">Price</label>
                               <input type="text" name="price" placeholder="Enter your Product price" class="form-control" required value="<?php echo $price ?>" >
                            </div>
                            <div class="form-group">
                              <label for="qty" class=" form-control-label">Product Quantity</label>
                               <input type="text" name="qty" placeholder="Enter your Product Quantity" class="form-control" required value="<?php echo $qty ?>" >
                            </div>
                            <div class="form-group">
                              <label for="name" class=" form-control-label">Product Image</label>
                               <input type="file" name="img" class="form-control" <?php echo $img_required ?> >
                            </div>

                            <div class="form-group">
                              <label for="short_desc" class=" form-control-label">Product Short Description</label>
                               <textarea name="short_desc" placeholder="Enter your Product Short Description" class="form-control" ><?php echo $short_desc ?></textarea>
                            </div>

                            <div class="form-group">
                              <label for="description" class=" form-control-label">Product Description</label>
                               <textarea name="description" placeholder="Enter your Product Description" class="form-control" ><?php echo $description ?></textarea>
                            </div>

                            <div class="form-group">
                              <label for="meta_title" class=" form-control-label">Product Meta Title</label>
                               <textarea name="meta_title" placeholder="Enter your Product meta title" class="form-control" ><?php echo $meta_title ?></textarea>
                            </div>

                            <div class="form-group">
                              <label for="meta_desc" class=" form-control-label">Product Meta Description</label>
                               <textarea name="meta_desc" placeholder="Enter your Product meta Description" class="form-control" ><?php echo $meta_desc ?></textarea>
                            </div>

                            <div class="form-group">
                              <label for="meta_keyword" class=" form-control-label">Product Meta Keyword</label>
                               <textarea name="meta_keyword" placeholder="Enter your Product meta Keyword" class="form-control" ><?php echo $meta_keyword ?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="status" class=" form-control-label">Product Status</label>
                               <input type="text" name="status" placeholder="Enter your Product Status" class="form-control" required value="<?php echo $status ?>" >
                            </div>

                           <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount">Submit</span>
                           </button>
                           <div class="field_error"><?php echo $msg; ?>
                           </div>
                        </form>        
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
          <?php 
    require('footer_inc.php');
?>


