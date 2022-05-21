<?php 
    require('top_inc.php');
    $categories='';
    $msg="";
    if(isset($_GET['id']) && $_GET['id']!=''){
      $id=get_safe_value($con,$_GET['id']);
      $edit_sql="select * from categories where id='$id'";
      $res=mysqli_query($con,$edit_sql);
      $cheak=mysqli_num_rows($res);
      if($cheak>0){
      $edit_row=mysqli_fetch_assoc($res);
      $categories=$edit_row['categories'];
      }else{  header('location:categories.php');
         die();
      }   
   }
   
    if(isset($_POST['submit'])){
        $categories=get_safe_value($con,$_POST['categories']);
        $sql="select * from categories where categories='$categories'";
        $res=mysqli_query($con,$sql);
        $cheak=mysqli_num_rows($res);
        if($cheak>0){
            $msg="Categories Alredy Exist !!";
        }else{
        $id=get_safe_value($con,$_POST['id']);
        if(isset($_GET['id']) && $_GET['id']!=''){
            mysqli_query($con,"update categories set categories='$categories' where id='$id'");
        }else{
        mysqli_query($con,"insert into categories values('$id','$categories','1')");
        }
        header('location:categories.php');
        die();
    }
   }
?>    
         <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Categories Form</strong></div>
                        <form method="post">
                        <div class="card-body card-block">
                        <div class="form-group">
                        <label for="id" class=" form-control-label">Category ID</label>
                               <input type="text" name="id" placeholder="Enter your category ID" class="form-control" required value= "<?php echo $id; ?>" >
                        <label for="categories" class=" form-control-label">Category</label>
                               <input type="text" name="categories" placeholder="Enter your category name" class="form-control" required value="<?php echo $categories ?>" >
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