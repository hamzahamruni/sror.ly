

<?php
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
if(isset($_POST['delete_product']))
{
  extract($_POST);
  if(
    isset($id_product) && $id_product !=''
  )
  {
    $delete = delete_product($id_product);
    if($delete)
    {
      ?>
      <script>
        alert("تمت الغاء بنجاح");
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
                    <input name="name" type="text" class="form-control" id="name" placeholder="اسم المنتج" maxlength="200" required="">
                  </fieldset>
                </div>
                <div class="col-md-6">
                  <fieldset>
                  <label>  سعر المنتج </label>
                    <input name="price" type="number" class="form-control" id="price" placeholder="سعر المنتج" maxlength="200" required="">
                  </fieldset>
                </div>
               <div class="col-md-6">
                  <fieldset>
                    <label > صورة المنتج</label>
                    <input name="img" type="file" class="form-control" accept="image" id="img" value="" required="">
                  </fieldset>
                </div>

              <div class="col-md-6">
               		<fieldset>
                  <label>      التفاصيل  </label>
                  <textarea name="detiles" class="form-control" id="detiles" placeholder="  التفاصيل " required="" rows="4" cols="4"></textarea>
                  </fieldset>
                </div>

            <div class="col-md-5"> </div>
              <div class="col-md-6">

                <fieldset>
                  <button name="insert_product" value="insert_product" type="submit" id="form-submit" class="button"> حفظ المنتج </button>
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

             <?php echo '<img src="data:image/jpeg;base64,'.$volunteering->img.'"/>'; ?>
             <div class="down-content" style="direction: rtl;">
               <h4><?php echo $volunteering->name?></h4>
               <h4><?php echo $volunteering->price?> د.ل</h4>
                <hr>
               <p><?php echo $volunteering->detiles;?></p>
               <center>
               <form id="contact" action="" method="post" >
                    <div class="col-md-12">
                      <fieldset>
                        <input  type="number" name="id_product" value="<?php echo $volunteering->id_product;?>" hidden>
                        <button style="background-color:red;color:white" type="submit" name="delete_product" id="form-submit" class="button">حدف</button>
                      </fieldset>
                    </div>

                  </form>
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