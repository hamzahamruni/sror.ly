<?php
session_start();
if(isset($_SESSION['id_user']))
{
    include('../include/db_connection.php');
    include('../functions/fun_users.php');
    $users = (array) [];
    if(isset($_POST['serach_users']))
    {
      extract($_POST);
      if(isset($username) && isset($name) )
      {
        $users = get_search_users($username,$name);
      }
      else
      {
        $users = get_users(0);
      }
    }
    else
    {
      $users = $users = get_users(0);
      //_______________________________________________________________
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
    <section class="section coming-soon" data-section="section3" >
      <div class="container">
        <div class="row">
          <div class="col-md-12"><hr>
          <br><br><br>
            <div class="right-content">
              <div class="top-content">
                <h3>عرض <em>المستخدمين  </em>    </h3>
              </div>
              <form id="contact" action="" method="post" style="padding: 10px 40px;">
                <div class="row">
                    <div class="col-md-3">
                      <fieldset>
                        <input name="username" type="text" class="form-control" <?php if(isset($username)) echo 'value="'.$username.'"'; ?> placeholder="  اسم المستخدم" >
                      </fieldset>
                    </div>

                  <div class="col-md-3">
                      <fieldset>
                      <input name="name" type="text" class="form-control"  <?php if(isset($name)) echo 'value="'.$name.'"'; ?> placeholder="  اسم  الموظف" >
                    </fieldset>
                  </div>

                  <div class="col-md-2">
                    <fieldset>
                      <button  style="color:#ffa5d2;background-color:white" type="submit" name="serach_users" id="form-submit" class="button col-md-6">عرض</button>
                    </fieldset>
                  </div>

                </div>
              </form>

              <table style="width:100%">
                  <tr>
                      <th>رقم المستخدم</th>
                      <th>اسم الموظف</th>
                      <th>رقم الهاتف</th>
                      <th>اسم المستخدم</th>
                      <th>كلمة المرور</th>
                      <th>نوع المستخدم</th>
                      <th>صلاحيات المستخدم</th>

                  </tr>
                  <?php
                  foreach($users as $user)
                  {
                      ?>
                      <tr>
                        <td><?php echo $user->id_user?> </td>
                        <td><?php echo $user->name?> </td>
                        <td><?php echo $user->phone?> </td>
                        <td><?php echo $user->username?> </td>
                        <td><?php echo $user->password?> </td>
                        <td>
                          <?php
                          if($user->power=='A') echo 'مسوؤل';
                          else echo 'مستخدم';
                          ?> 
                        </td>
                        <?php
                        $user_permissions =  get_user_permissions($user->id_user);
                        ?>
                        <td style="color:green">
                        <?php
                        if($user_permissions)
                        {

                          if($user_permissions->hadia) echo 'إدارة الهدايا','<br>';
                          if($user_permissions->donation) echo ' إدارة التبرعات','<br>';
                          if($user_permissions->volunteering) echo ' إدارة الاقساك','<br>';
                          if($user_permissions->users) echo ' إدارة المستخدمين','<br>';
                        }
                        ?>
                        </td>
                      </tr>
                      <?php
                  }
                  ?>
              </table>
            </div>
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
?>