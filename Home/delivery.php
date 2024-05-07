
<?php
session_start();
if(isset($_SESSION['id_user']))
{
 include('../include/db_connection.php');
 include('../functions/fun_volunteering.php');
if(isset($_POST['insert_delivery']))
{
  extract($_POST);
  if(
    isset($name) && $name !=''
 && isset($phone) && $phone !=''
 && isset($company) && $company !=''
 && isset($type) && $type !=''
  )
  {

    $insert_delivery = insert_delivery($name,$phone,$company,$type);
    if($insert_delivery)
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
          <h3>  النقل والتوصيل</h3>
          </center>
        </div>
        <div class="col-md-2 "></div>
        <div class="col-md-8">
          <form id="contact" action="" method="post" onsubmit="return validate_dontaion();">
            <div class="row">
                <div class="col-md-6">
                  <fieldset>
                  <label> اسم المندوب </label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="الإسم" maxlength="50" required="">
                  </fieldset>
                </div>
                <div class="col-md-6">
                  <fieldset>
                  <label id="lphone" >رقم الهاتف</label>
                    <input name="phone" type="text" onkeyup="validatePhone();" class="form-control" id="phone"  maxlength="10" placeholder="091xxxxxxx" required="">
                  </fieldset>
                </div>

                <div class="col-md-6">
                  <fieldset>
                  <label> شركة التوصيل الداعمة</label>
                    <input name="company" type="text" class="form-control" id="company" placeholder="اسم الشركة" maxlength="50" required="">
                  </fieldset>
                </div>





                <div class="col-md-6"  >
                    <div class="row">

                        <div class="col-md-6">
                            <fieldset>
                                <label> نوع النفل </label>
                                <select name="type" class="form-control" id="type" required="">
                                <option class="form-control">   </option>
                                <option class="form-control"  value="سيارة">سيارة</option>
                                <option class="form-control"  value="كنتر">  كنتر</option>
                                </select>
                            </fieldset>
                        </div>
                    </div>
                </div>


            <div class="col-md-5"> </div>
              <div class="col-md-6">

                <fieldset>
                  <button name="insert_delivery" value="insert_delivery" type="submit" id="form-submit" class="button"> حفظ المندوب 🎁</button>
                </fieldset>
              </div>

          </form>
        </div>

      </div>
    </div>
    <br><br>
  </section>

    <script>

        function validatePhone()
        {
            // regex pattern for phone number
            const patnn=/^[0-9]{10}$/;
            if(document.getElementById("phone").value == "")
            {
              document.getElementById("lphone").style.color="red";
              //document.getElementById("codemsg").innerHTML="The CODE OR COLOR Is Empty";
              v=false;

            }
            else{
              if(patnn.test(document.getElementById("phone").value) == false)
              {
                document.getElementById("lphone").style.color="red";
                //document.getElementById("codemsg").innerHTML="CODE OR COLOR is Wrong ";
                v=false;
              }

              else
              {
              document.getElementById("lphone").style.color="black";
            //	document.getElementById("codemsg").innerHTML=" ";
              }

            }
        }
    </script>
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