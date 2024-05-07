
<?php
session_start();
if(isset($_SESSION['id_user']))
{
    include('../include/db_connection.php');
    include('../functions/fun_volunteering.php');
if(isset($_POST['insert_needy']))
{
  extract($_POST);
  if(
    isset($name) && $name !=''
 && isset($phone) && $phone !=''
 && isset($family_number) && $family_number !=''
 && isset($bank_number) && $bank_number !=''
 && isset($living) && $living !=''
 && isset($address)  && $address !=''
 && isset($source_income)  && $source_income !=''
 && isset($by_whom)  && $by_whom !=''
 && isset($family_needs)  && $family_needs !=''
 && isset($department)  && $department !=''
  )
  {

    $insert_needy = insert_needy($name,$phone,$family_number,$bank_number,$living,$address,$source_income,$by_whom,$family_needs,$department);
    if($insert_needy)
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
          <h3>  المحتاجين</h3>
          </center>
        </div>
        <div class="col-md-2 "></div>
        <div class="col-md-8">
          <form id="contact" action="" method="post" onsubmit="return validate_dontaion();">
            <div class="row">
                <div class="col-md-6">
                  <fieldset>
                  <label> اسم العائلة </label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="اسم العائلة المحتاجة" maxlength="200" required="">
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
                  <label> الوضع العائلي</label>
                    <input name="family_number" type="number" class="form-control" id="family_number" placeholder="الوضع العائلي" min="100" max="99999999999" required="">
                  </fieldset>
                </div>




                <div class="col-md-6"  >
                    <div class="row">
                      <div class="col-md-6">
                        <fieldset>
                        <label id="lamount" > رقم الحساب</label>
                          <input name="bank_number" type="text"  class="form-control" id="bank_number"  maxlength="20" placeholder=" رقم الحساب" required="">
                        </fieldset>
                      </div>

                        <div class="col-md-6">
                            <fieldset>
                                <label> السكن </label>
                                <select name="living" class="form-control" id="living" required="">
                                <option class="form-control">   </option>
                                <option class="form-control"  value="ملك">ملك</option>
                                <option class="form-control"  value="أجار">     أجار</option>
                                </select>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                  <fieldset>
                  <label>   مكان السكن</label>
                    <input name="address" type="text" class="form-control" id="address" placeholder="مكان السكن" maxlength="100" required="">
                  </fieldset>
                </div>

				      <div class="col-md-6">
                  <fieldset>
                  <label>      مصدر الدخل</label>
                    <input name="source_income" type="text" class="form-control" id="source_income" placeholder="مصدر الدخل" maxlength="90" required="">
                  </fieldset>
                </div>

				        <div class="col-md-6">
                  <fieldset>
                  <label>        عن طريق من</label>
                    <input name="by_whom" type="text" class="form-control" id="by_whom" placeholder="عن طريق من" maxlength="200" required="">
                  </fieldset>
                </div>

                <div class="col-md-6">
                  <fieldset>
                  <label>        لقسم المسجل به</label>
                    <input name="department" type="text" class="form-control" id="department" placeholder="القسم المسجل به" maxlength="90" required="">
                  </fieldset>
                </div>


							    <div class="col-md-12">
                  <fieldset>
                  <label>       احتباجات العائلة  </label>
                  <textarea name="family_needs"  class="form-control" id="family_needs" placeholder="  احتباجات العائلة " required="" rows="4" cols="10"></textarea>
                  </fieldset>
                </div>





            <div class="col-md-5"> </div>
              <div class="col-md-6">

                <fieldset>
                  <button name="insert_needy" value="insert_needy" type="submit" id="form-submit" class="button"> حفظ  </button>
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