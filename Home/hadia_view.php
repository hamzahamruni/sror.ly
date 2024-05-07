<?php
session_start();
if(isset($_SESSION['id_user']))
{
    include('../include/db_connection.php');
    include('../functions/fun_volunteering.php');
    if(isset($_POST['delete_hadia']))
    {
      extract($_POST);
      if(
        isset($id_hadia) && $id_hadia !=''
      )
      {
        $delete_hadia = delete_hadia($id_hadia);
        if($delete_hadia)
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

    $hadias = (array) [];
    $hadias = get_hadia();
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
              <h3>عرض <em>  الهدايا  🎁 </em>    </h3>
            </div>

            <table style="width:100%">
                <tr>
                    <th>رقم الهدية</th>
                    <th> اسم المهدي</th>
                    <th>رقم الهاتف</th>
                    <th>  اسم المهدي اليه</th>
                    <th>  المهدي اليه رقم الهاتف</th>
                    <th>  تبليغ</th>
                    <th>  القيمة</th>
                    <th> طريقة الاستلام</th>
                    <th> تاريخ الاضافة</th>
                    <th>  اجراء</th>
                </tr>
                <?php
                foreach($hadias as $hadia)
                {
                    ?>
                    <tr>
                    <td><?php echo $hadia->id_hadia?> </td>
                    <td><?php echo $hadia->name?> </td>
                    <td><?php echo $hadia->phone?> </td>
                    <td><?php echo $hadia->name_to?> </td>
                    <td><?php echo $hadia->phone_to?> </td>
                    <td><?php
                      if($hadia->tag)
                      {
                        echo 'تبليغ باسم المهدي';
                      }
                      else
                      {
                        echo 'عدم تبليغ  ';
                      }
                    ?>  </td>
                    <td><?php echo $hadia->amount?>  دينار</td>
                    <td><?php echo $hadia->receipt?>  </td>


                    <td><?php echo $hadia->date_create?></td>

                   <form id="contact" action="" method="post" >
                    <td>
                      <div class="col-md-12">
                        <fieldset>
                          <input  type="number" name="id_hadia" value="<?php echo $hadia->id_hadia;?>" hidden>
                          <button style="background-color:red;color:white" type="submit" name="delete_hadia" id="form-submit" class="button">حدف</button>
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