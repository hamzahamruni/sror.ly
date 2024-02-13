<?php
session_start();
if(isset($_SESSION['id_user']))
{
include('../include/db_connection.php');
include('../functions/fun_volunteering.php');
$today = gmdate("Y-m-d", time() + 2 * 3600);
$msg=0;

if(isset($_POST['insert_volunteering']))
{
  extract($_POST);
//   print_r($_POST);die();
  if(
     isset($title) && $title!=''
  && isset($type) && $type!=''
  && isset($note) && $note!=''
  && isset($date)
  )
  {
    if($date=='')$date='NULL';else $date = "'".$date."'";
    $upload_img_to_folder = upload_img_to_folder("img","uploads_img/");
    $insert_volunteering =  insert_volunteering($type,$title,$date,$upload_img_to_folder,$note,$_SESSION['id_user']);
    if($insert_volunteering)
    {
      $msg='';
      ?>
      <script>
        alert('تم الإضافة بنجاح');
      </script>
      <?php
    }
    else
    {
      $msg='';
      ?>
      <script>
        alert('خطاء ارجو الاتصال  بالدعم الفني');
      </script>
      <?php
    }
  }
  else
  {
    $msg='';
    ?>
    <script>
      alert(' ارجو ادخال  بيانات صحيحة');
    </script>
    <?php
  }
}
if(isset($_GET['id_volunteering_delete']))
{
    $volunteering =  delete_volunteering($_GET['id_volunteering_delete']);
    if($volunteering)
    {
      ?>
      <script>
        alert('تم الغاء بنجاح');
      </script>
      <?php
    }
    else
    {
      ?>
      <script>
        alert('خطاء ارجو الاتصال  بالدعم الفني');
      </script>
      <?php
    }
}


$volunteerings =  get_volunteering('اقسام الخدمات',0);
$volunteerings_ =  get_volunteering('اقسام النشطات',0);

?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<?php
include('../include/head.php')
?>
<style>

#itemm:hover{
  border: 3px solid #ffa5d2;

}
</style>
<body>
<?php
include('../include/appbar.php')
?>

  <section class="section coming-soon" data-section="section3">
  <br><br>
    <div class="container">
      <div class="row">
        <div class="col-md-12"><hr>
          <div class="right-content">
            <div class="top-content">
              <h3 style="color: white;">إضافة <em>  قسم جديد  </em> جديده  </h6>
            </div>
            <form id="contact" action="" method="post" enctype="multipart/form-data">
              <div class="row">

                <div class="col-md-3">
                  <fieldset>
                    <label style="color: white;">نوع القسم</label>
                      <select name="type" class="form-control" id="type" required="نوع">
                      <option class="form-control">   </option>
                      <option class="form-control"  value='اقسام الخدمات'>   اقسام الخدمات </option>
                      <option class="form-control"  value="اقسام النشطات">  اقسام  النشطات</option>
                    </select>
                  </fieldset>
                </div>

                <div class="col-md-4">
                  <fieldset>
                    <label style="color: white;">عنوان  القسم</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="عنوان القسم " maxlength="100" required="">
                  </fieldset>
                </div>

                <div class="col-md-2">
                  <fieldset>
                    <label style="color: white;" >تايخ  </label>
                    <input name="date" type="date" class="form-control" id="date" placeholder="تايخ" value="<?php  null;?>" min="<?php echo $today?>" >
                  </fieldset>
                </div>

                <div class="col-md-3">
                  <fieldset>
                    <label style="color: white;">صورة</label>
                    <input name="img" type="file" class="form-control"  class="form-control" accept="image/*" id="img" value="<?php echo NULL?>"  required="">
                  </fieldset>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <fieldset>
                    <label style="color: white;"> ملاحظة</label>
                    <textarea id="note" name="note" rows="4" cols="50" maxlength="200" placeholder="تفاصيل"  required=""></textarea>
                  </fieldset>
                </div>
                <div class="col-md-3"></div>

                <div class="col-md-12">
                  <fieldset>
                    <button style="color:#ffa5d2;background-color:white" type="submit" name="insert_volunteering" id="form-submit" class="button">حفظ</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section courses" data-section="section4" dir="ltr">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>
            اقسام الخدمات
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
               <h4><?php echo $volunteering->title?></h4>
               <p><?php echo $volunteering->date;?></p>
                <hr>
               <p><?php echo $volunteering->note;?></p>
               <center>
                  <a  style="color: #ffa5d2;" href=<?php echo "view_volunteering.php?id_volunteering=".$volunteering->id_volunteering;?> style="color: #f5a425;"> المزيد <i class="fa fa-angle-double-left"></i></a>
                  &nbsp &nbsp &nbsp &nbsp
                  <a  style="color: red" href=<?php echo "volunteering.php?id_volunteering_delete=".$volunteering->id_volunteering;?> style="color: #f5a425;"> حدف <i class="fa fa-close"></i></a>
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


  <section class="section courses" data-section="section4" dir="ltr">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>
            اقسام النشطات
            </h2>
          </div>
        </div>
        <div class="owl-carousel owl-theme">
         <?php
         foreach($volunteerings_ as $volunteering)
         {
          $img ='uploads_img/3.jpg';

          $img = 'uploads_img/'.$volunteering->img;
          ?>
           <div id="itemm" >
           <div class="item" style="text-align: center"   >
             <img src="<?php echo $img;?>" alt="Course #2">
             <div class="down-content" style="direction: rtl;">
               <h4><?php echo $volunteering->title?></h4>
               <p><?php echo $volunteering->date;?></p>
               <hr>
               <p><?php echo $volunteering->note;?></p>
               <center>
                  <a  style="color: #ffa5d2;" href=<?php echo "view_volunteering.php?id_volunteering=".$volunteering->id_volunteering;?> style="color: #f5a425;"> المزيد <i class="fa fa-angle-double-left"></i></a>
                  &nbsp &nbsp &nbsp &nbsp
                  <a  style="color: red" href=<?php echo "volunteering.php?id_volunteering_delete=".$volunteering->id_volunteering;?> style="color: #f5a425;"> حدف <i class="fa fa-close"></i></a>
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