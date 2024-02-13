
<?php
 include('../include/db_connection.php');
 include('../functions/fun_volunteering.php');
if(isset($_POST['insert_campaigns']))
{
  extract($_POST);
  if(
    isset($name) && $name !=''
 && isset($detiles) && $detiles !=''

  )
  {
    $upload_img_to_folder = upload_img_to_folder("img","uploads_img/");
    $insert_campaigns = insert_campaigns($name,$detiles,$upload_img_to_folder);
    if($insert_campaigns)
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
if(isset($_POST['delete_campaigns']))
{
  extract($_POST);
  if(
    isset($id_campaigns) && $id_campaigns !=''
  )
  {
    $delete_campaigns = delete_campaigns($id_campaigns);
    if($delete_campaigns)
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
$volunteerings =  get_campaigns();
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
          <h3>  الحملات </h3>
          </center>
        </div>
        <div class="col-md-2 "></div>
        <div class="col-md-8">
          <form id="contact" action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                  <fieldset>
                  <label> اسم الحملة </label>
                    <input name="name" type="text" class="form-control" id="name" placeholder=" اسم الحملة " maxlength="50" required="">
                  </fieldset>
                </div>

			        	<div class="col-md-6">
                  <fieldset>
                    <label > صورة الحملة</label>
                    <input name="img" type="file" class="form-control" accept="image/*" id="img" value="" required="">
                  </fieldset>
                </div>

                <div class="col-md-6">
               		<fieldset>
                  <label>      التفاصيل  </label>
                  <textarea name="detiles" class="form-control" id="detiles" placeholder="  التفاصيل " required="" rows="4" cols="10"></textarea>
                  </fieldset>
                </div>

              <div class="col-md-5"> </div>
              <div class="col-md-6">

                <fieldset>
                  <button name="insert_campaigns" value="insert_campaigns" type="submit" id="form-submit" class="button"> حفظ الحملة  </button>
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
            الحملات
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
             <img src="<?php echo $img;?>" alt="Course #2">
             <div class="down-content" style="direction: rtl;">
               <h4><?php echo $volunteering->name?></h4>
                <hr>
               <p><?php echo $volunteering->detiles;?></p>
               <center>
               <form id="contact" action="" method="post" >
                    <div class="col-md-12">
                      <fieldset>
                        <input  type="number" name="id_campaigns" value="<?php echo $volunteering->id_campaigns;?>" hidden>
                        <button style="background-color:red;color:white" type="submit" name="delete_campaigns" id="form-submit" class="button">حدف</button>
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