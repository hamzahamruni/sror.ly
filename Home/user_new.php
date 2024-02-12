<?php
session_start();
if(isset($_SESSION['id_user']))
{
  include('../include/db_connection.php');
  include('../functions/fun_users.php');
  $today = gmdate("Y-m-d", time() + 2 * 3600);
  $msg=0;
  if(isset($_POST['insert_user']))
  {
    extract($_POST);

    if(
       isset($name) && $name!=''
    && isset($phone) && $phone!=''
    && isset($username) && $username!=''
    && isset($password) && $password!=''
    && isset($power) && $power!=''
    )
    {
      if(! isset($hadia)) $hadia =0;
      if(! isset($donation)) $donation =0;
      if(! isset($delivery)) $delivery =0;
      if(! isset($needy)) $needy =0;
      if(! isset($needy)) $needy =0;
      if(! isset($volunteering)) $volunteering =0;
      if(! isset($users)) $users =0;
      if(! have_username($username))
      {
        $id_user = insert_user($name,$phone,$username,$password,$power,$hadia,$donation,$delivery,$volunteering,$users);
        if($id_user)
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
        ?>
        <script>
          alert('المستخدم  موجود مسباقاُ');
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
  ?>
  <!DOCTYPE html>
  <html lang="en" dir="rtl">
  <?php
  include('../include/head.php')
  ?>
  <style>
    label {
      color : white
    }
  </style>
  <body>
  <?php
  include('../include/appbar.php')
  ?>
  <section class="section coming-soon" data-section="section3">
    <div class="container">
      <div class="row">

        <div class="col-md-12"><hr>
        <br><br><br>
          <div class="right-content">
            <div class="top-content">
              <h3>إضافة <em> مستخدم  </em> جديد   </h3>
            </div>
            <form id="contact" action="" method="post">
                <div class="row" style="padding-top: 10px;">
                    <div class="col-md-3">
                        <label >اسم الموظف</label>
                        <fieldset>
                            <input name="name" id="name" type="text" class="form-control"  placeholder="اسم الموظف "   maxlength="100" required="">
                        </fieldset>
                    </div>

                    <div class="col-md-3">
                        <label> رقم الهاتف </label>
                        <fieldset>
                            <input name="phone" id="phone" type="text" class="form-control" placeholder=" رقم  الهاتف "  maxlength="14" required="">
                        </fieldset>
                    </div>

                    <div class="col-md-3">
                        <label>اسم المستخدم</label>
                        <fieldset>
                            <input name="username" id="username" type="text" class="form-control"  placeholder="اسم المستخدم"   maxlength="50" required="">
                        </fieldset>
                    </div>

                    <div class="col-md-3">
                        <label>كلمة المرور</label>
                        <fieldset>
                            <input name="password" id="password" type="password" class="form-control"  placeholder="كلمة المرور"   maxlength="50" required="">
                        </fieldset>
                    </div>

                    <div class="col-md-2">
                      <fieldset>
                        <label> نوع المستخدم</label>
                          <select name="power" class="form-control" id="power" required="">
                          <option class="form-control">   </option>
                          <option class="form-control"  value="A">  مسوؤل </option>
                          <option class="form-control"  value="U">   موظف </option>
                        </select>
                      </fieldset>
                    </div>


                    <div class="col-md-12">
                      <hr>
                      <center>
                      <label> الصلاحيات</label>
                      </center>
                      <fieldset>
                        <br>

                        <label> إدارة الهدايا
                          <input name="hadia" value="1" type="checkbox" class="form-control col-md-3" id="sponsor" style="display: inline;">
                        </label>
                        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                        <label> إدارة التبرعات
                          <input name="donation" value="1" type="checkbox" class="form-control col-md-3" id="donation" style="display: inline;">
                        </label>
                        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                        <label> إدارة المندوبين
                          <input name="delivery" value="1" type="checkbox" class="form-control col-md-3" id="delivery" style="display: inline;">
                        </label>

                        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                        <label> إدارة المحتاجين
                          <input name="needy" value="1" type="checkbox" class="form-control col-md-3" id="needy" style="display: inline;">
                        </label>

                        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                        <label> إدارة الاقسام
                          <input name="volunteering" value="1" type="checkbox" class="form-control col-md-3" id="volunteering" style="display: inline;">
                        </label>

                        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                        <label> إدارة المستخدمين
                          <input name="users" value="1" type="checkbox" class="form-control col-md-2" id="users" style="display: inline;">
                        </label>
                      </fieldset>
                    </div>

                    <div class="col-md-12">
                        <fieldset>
                            <button style="color:#ffa5d2;background-color:white"  type="submit" name="insert_user" id="form-submit" class="button">حفظ</button>
                        </fieldset>
                    </div>

                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <br><br><br><br><br>
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
?>