<?php
session_start();
if(isset($_SESSION['id_user']))
{
    include('../include/db_connection.php');
    include('../functions/fun_volunteering.php');
    if(isset($_POST['delete_delivery']))
    {
      extract($_POST);
      if(
        isset($id_delivery) && $id_delivery !=''
      )
      {
        $delete_delivery = delete_delivery($id_delivery);
        if($delete_delivery)
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

    $deliverys = (array) [];
    $deliverys = get_delivery();
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
      <br> <br> <br> <br>
      <div class="row">
        <div class="col-md-12">
          <hr>
          <div class="right-content">
            <div class="top-content">
              <h3>عرض <em>  المندوبين  </em>    </h3>
            </div>

            <table style="width:100%">
                <tr>
                    <th>رقم المندوب</th>
                    <th> اسم المندوب</th>
                    <th>رقم الهاتف</th>
                    <th>شركة التوصيل الداعمة</th>
                    <th> نوع النفل</th>
                    <th>  التبرع</th>
                </tr>
                <?php
                foreach($deliverys as $delivery)
                {
                    ?>
                    <tr>
                    <td><?php echo $delivery->id_delivery?> </td>
                    <td><?php echo $delivery->name?> </td>
                    <td><?php echo $delivery->phone?> </td>
                    <td><?php echo $delivery->company?>  </td>
                    <td><?php echo $delivery->type?>  </td>


                   <form id="contact" action="" method="post" >
                    <td>
                      <div class="col-md-12">
                        <fieldset>
                          <input  type="number" name="id_delivery" value="<?php echo $delivery->id_delivery;?>" hidden>
                          <button style="background-color:red;color:white" type="submit" name="delete_delivery" id="form-submit" class="button">حدف</button>
                        </fieldset>
                      </div>
                    </td>
                    </form>
                    <?php
                }
                ?>
            </table>
          </div>
        </div>
      </div>
    </div>
    <br><br><br><br><br><br> <br><br>
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