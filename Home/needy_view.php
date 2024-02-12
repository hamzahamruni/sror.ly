<?php
    include('../include/db_connection.php');
    include('../functions/fun_volunteering.php');
    if(isset($_POST['delete_needy']))
    {
      extract($_POST);
      if(
        isset($id_needy) && $id_needy !=''
      )
      {
        $delete_needy = delete_needy($id_needy);
        if($delete_needy)
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

    $needys = (array) [];
    $needys = get_needy();
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
              <h3>عرض <em>  المحتاجين  </em>    </h3>
            </div>

            <table style="width:100%">
                <tr>
                    <th> المحتاج</th>
                    <th> اسم العائلة</th>
                    <th>رقم الهاتف</th>
                    <th>الوضع العائلي</th>
                    <th> رقم الحساب </th>
                    <th>  السكن</th>
                    <th> مكان السكن</th>
                    <th> مصدر الدخل</th>
                    <th>  عن طريق من</th>
                    <th>  لقسم المسجل به</th>
                    <th>  احتباجات العائلة</th>
                    <th>  اجراء</th>
                </tr>
                <?php
                foreach($needys as $needy)
                {
                    ?>
                    <tr>
                    <td><?php echo $needy->id_needy?> </td>
                    <td><?php echo $needy->name?> </td>
                    <td><?php echo $needy->phone?> </td>
                    <td><?php echo $needy->family_number?>  </td>
                    <td><?php echo $needy->bank_number?>  </td>
                    <td><?php echo $needy->living?>  </td>
                    <td><?php echo $needy->address?>  </td>
                    <td><?php echo $needy->source_income?>  </td>
                    <td><?php echo $needy->by_whom?>  </td>
                    <td><?php echo $needy->family_needs?>  </td>
                    <td><?php echo $needy->department?>  </td>
                   <form id="contact" action="" method="post" >

                    <td>
                      <div class="col-md-12">
                        <fieldset>
                          <input  type="number" name="id_needy" value="<?php echo $needy->id_needy;?>" hidden>
                          <button style="background-color:red;color:white" type="submit" name="delete_needy" id="form-submit" class="button">حدف</button>
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