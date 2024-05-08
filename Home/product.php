

<?php
session_start();
if(isset($_SESSION['id_user']))
{

 include('../include/db_connection.php');
 include('../functions/fun_volunteering.php');
if(isset($_POST['insert_product']))
{
  extract($_POST);
  if(
     isset($name) && $name !=''
     && isset($price) && $price !=''
    && isset($detiles) && $detiles !=''
  )
  {
    $image = file_get_contents($_FILES['img']["tmp_name"]);
    $image = base64_encode($image);
    $insert =  insert_product($name,$price,$detiles,$image);
    if($insert)
    {
      ?>
      <script>
        alert("تمت الاضافة بنجاح");
        </script>

      <?php
    }
    else
    {
      ?>
      <script>
      alert("يوجد خطأ");
      </script>
    <?php
    }
  }
  else
  {
    ?>
    <script>
      alert("خطأ في ادخال البيانات");
    </script>
    <?php
  }
}
//_____________________________________________________
//              edit تعديل
if(isset($_POST['get_product']))
{
  extract($_POST);
  if(
    isset($id_product) && $id_product !=''
  )
  {
    $product = get_id_product($id_product);

  }
}
if(isset($_POST['edit_product']))
{
  extract($_POST);
  if(
    isset($id_product) && $id_product !=''
    && isset($name) && $name !=''
    && isset($price) && $price !=''
    && isset($detiles) && $detiles !=''
  )
 {
  if(isset($_FILES['img']["tmp_name"]) && $_FILES['img']["tmp_name"])
  {
    $image = file_get_contents($_FILES['img']["tmp_name"]);
    $image = base64_encode($image);
  }
  else
  {
    $image = null;
  }


   $edit = edit_product($id_product,$name,$price,$detiles,$image);
    if($edit)
    {
      ?>
      <script>
        alert("تمت تعديل بنجاح");
        </script>

      <?php
    }
    else
    {
      ?>
      <script>
      alert("يوجد خطأ");
      </script>
    <?php
    }
  }
  else
  {
    ?>
    <script>
      alert("خطأ في ادخال البيانات");
    </script>
    <?php
  }
}
//_____________________________________________________
$volunteerings =  get_product();

?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
  <?php
  include('../include/head.php')
  ?>
  <body>
  <?php
  include('../include/appbar.php')
  ?>
  <section class="section contact" data-section="section4" style="padding-top: 100px;">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">
          <center>
          <h3>اضافة منتج للدعم</h3>
          </center>
        </div>
        <div class="col-md-2 "></div>
        <div class="col-md-8">
          <form id="contact" action="" method="post" enctype="multipart/form-data" >
            <div class="row">
                <div class="col-md-6">
                  <fieldset>
                  <label>  اسم المنتج </label>
                    <input name="name" type="text" <?php if(isset($product->name)) echo 'value="'.$product->name.'"'?> class="form-control" id="name" placeholder="اسم المنتج" maxlength="200" required="">
                  </fieldset>
                </div>
                <div class="col-md-6">
                  <fieldset>
                  <label>  سعر المنتج </label>
                    <input name="price" type="number" <?php if(isset($product->price)) echo 'value="'.$product->price.'"'?> class="form-control" id="price" placeholder="سعر المنتج" maxlength="200" required="">
                  </fieldset>
                </div>
               <div class="col-md-6">
                  <fieldset>
                    <label > صورة المنتج</label>
                    <input name="img" type="file"  <?php if(isset($product->img)) {echo 'value="'.$product->img.'"';}else{echo 'required="true"';}?> class="form-control" accept="image" id="img">
                  </fieldset>
                </div>

              <div class="col-md-6">
               		<fieldset>
                  <label>      التفاصيل  </label>
                  <textarea name="detiles" class="form-control" <?php if(isset($product->detiles)) echo 'value="'.$product->detiles.'"'?>  id="detiles" placeholder="  التفاصيل " style="color:black;" required="" rows="4" cols="4"><?php if(isset($product->detiles)) echo $product->detiles;?></textarea>
                  </fieldset>
                </div>

            <div class="col-md-5"> </div>
              <div class="col-md-6">

                <fieldset>
                  <?php
                  //_____________________________________________________
                  //                      edit تعديل
                  if(isset($product->id_product))
                  {
                    ?>
                    <input type="number" value=<?php echo $product->id_product;?> name='id_product' hidden />
                      <button name="edit_product" value="edit_product" type="submit" id="form-submit" class="button"> تعديل المنتج </button>
                    <?php
                  }
                  //_____________________________________________________
                  else
                  {
                    ?>
                      <button name="insert_product" value="insert_product" type="submit" id="form-submit" class="button"> حفظ المنتج </button>

                    <?php
                  }
                  ?>
                </fieldset>
              </div>

          </form>
        </div>

      </div>
    </div>
    <br><br>
  </section>

  <section class="section courses" data-section="section4" dir="ltr">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>
            المنتجات
            </h2>
          </div>
        </div>
        <div class="owl-carousel owl-theme">
         <?php
         foreach($volunteerings as $volunteering)
         {
          $img ='uploads_img/3.jpg';
          $img = 'uploads_img/'.$volunteering->img;
          ?>
           <div id="itemm" >
              <div class="item" style="text-align: center"   >

                <?php echo '<img src="data:image/jpeg;base64,'.$volunteering->img.'" height="300"/>'; ?>
                <div class="down-content" style="direction: rtl;">
                  <h4><?php echo $volunteering->name?></h4>
                  <h4><?php echo $volunteering->price?> د.ل</h4>
                    <hr>
                  <p><?php echo $volunteering->detiles;?></p>
                  <center>
                  <div class='row'>
                  <?php
                  //_____________________________________________________
                  //                      edit تعديل
                  ?>
                    <div class="col-md-6">

                      <form id="contact" action="" method="post" style="display: inline" >
                        <fieldset>
                          <input  type="number" name="id_product" value="<?php echo $volunteering->id_product;?>" hidden>
                          <button style="background-color:#ffa5d2;color:white" type="submit" name="get_product" id="form-submit" class="button">تعديل</button>
                        </fieldset>

                      </form>
                    </div>
                  <?php
                  //_____________________________________________________
                  //                      edit تعديل
                  ?>

                  <div class="col-md-6">
                  <form id="contact" action="" method="post" style="display: inline" >

                  <fieldset>
                    <input  type="number" name="id_product" value="<?php echo $volunteering->id_product;?>" hidden>
                    <button style="background-color:red;color:white" type="submit" name="delete_product" id="form-submit" class="button">حدف</button>

                  </fieldset>
                  </form>

                  </div>
            </div>

              </center>
             </div>
           </div>
           </div>
          <?php
         }
          ?>
        </div>
      </div>
    </div>
  </section>
  <?php
    include('../include/footer.php')
    ?>
</body>
</html>
<?php
}
else
{
  header('Location: ../login.php');
}