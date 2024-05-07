
<?php
session_start();
if(isset($_SESSION['id_user']))
{
 include('../include/db_connection.php');
 include('../functions/fun_volunteering.php');
if(isset($_POST['insert_activities']))
{
  extract($_POST);
  if(
     isset($name) && $name !=''
    && isset($link) && $link !=''
    && isset($detiles) && $detiles !=''
  )
  {
    $image = file_get_contents($_FILES['img']["tmp_name"]);
    $image = base64_encode($image);

    $insert_activities = insert_activities($name,$link,$detiles,$image);
    if($insert_activities)
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
if(isset($_POST['delete_activities']))
{
  extract($_POST);
  if(
    isset($id_activities) && $id_activities !=''
  )
  {
    $delete_activities = delete_activities($id_activities);
    if($delete_activities)
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
$volunteerings =  get_activities();
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
          <h3>   النشاطات</h3>
          </center>
        </div>
        <div class="col-md-2 "></div>
        <div class="col-md-8 col-12">
          <form id="contact" action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 ">
                  <fieldset>
                  <label> اسم النشاط</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="اسم النشاط" maxlength="200" required="">
                  </fieldset>
                </div>
	            <div class="col-md-6">
                  <fieldset>
                  <label> رابط النشاط</label>
                    <input name="link" type="text" class="form-control" id="link" placeholder="الرابط" maxlength="100" required="">
                  </fieldset>
                </div>
				        <div class="col-md-6">
                  <fieldset>
                    <label >صورة</label>
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
                  <button name="insert_activities" value="insert_activities" type="submit" id="form-submit" class="button"> حفظ النشاط  </button>
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
            النشاطات
            </h2>
          </div>
        </div>
        <div class="owl-carousel owl-theme">
         <?php
         foreach($volunteerings as $volunteering)
         {
          ?>
           <div id="itemm" >
           <div class="item" style="text-align: center"   >
           <?php echo '<img src="data:image/jpeg;base64,'.$volunteering->img.'" height="300"/>'; ?>
             <div class="down-content" style="direction: rtl;">
               <h4><?php echo $volunteering->name?></h4>
               <h6><?php echo $volunteering->link?></h6>
                <hr>
               <p><?php echo $volunteering->detiles;?></p>
               <center>
               <form id="contact" action="" method="post" >
                    <div class="col-md-12">
                      <fieldset>
                        <input  type="number" name="id_activities" value="<?php echo $volunteering->id_activities;?>" hidden>
                        <button style="background-color:red;color:white" type="submit" name="delete_activities" id="form-submit" class="button">حدف</button>
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
<?php
}
else
{
  header('Location: ../login.php');
}