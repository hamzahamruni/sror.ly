<?php
    include('../include/db_connection.php');
    include('../functions/fun_volunteering.php');
    if(isset($_POST['delete_donation']))
    {
      extract($_POST);
      if(
        isset($id_donation) && $id_donation !=''
      )
      {
        $delete_donation_family = delete_donation($id_donation);
        if($delete_donation_family)
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

    $donationes = (array) [];
    $donationes = get_donation(1);
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
              <h3>عرض <em>  التبرعات  </em>    </h3>
            </div>

            <table style="width:100%">
                <tr>
                    <th>رقم التبرع</th>
                    <th> اسم المتبرع</th>
                    <th>رقم الهاتف</th>
                    <th>العنوان</th>
                    <th> نوع التبرع</th>
                    <th>  التبرع</th>
                    <th> طريقة الاستلام</th>
                    <th> تاريخ الاضافة</th>
                    <th>  اجراء</th>
                </tr>
                <?php
                foreach($donationes as $donation)
                {
                    ?>
                    <tr>
                    <td><?php echo $donation->id_donation?> </td>
                    <td><?php echo $donation->name?> </td>
                    <td><?php echo $donation->phone_number?> </td>
                    <td><?php echo $donation->address?>  </td>
                    <td><?php echo $donation->type?>  </td>
                    <td><?php
                    if($donation->type ==='نقدي')
                    {
                      echo $donation->amount.' د،ل';
                      echo '<br>'.$donation->type_amount;
                    }
                    else if($donation->type ==='رصيد')
                    {
                      echo $donation->credit.' د،ل';
                      echo '<br>'.$donation->phone_credit;
                    }
                    else{
                      echo $donation->physically;

                    }
                    ?>  </td>

                    <td><?php echo $donation->receipt?>  </td>
                    <td><?php echo $donation->date_create?></td>
                    <?php
                    $familys = get_family_not_id_donation($donation->id_donation,$donation->type)
                    ?>
                   <form id="contact" action="" method="post" >

                    <td>
                      <div class="col-md-12">
                        <fieldset>
                          <input  type="number" name="id_donation" value="<?php echo $donation->id_donation;?>" hidden>
                          <button style="background-color:red;color:white" type="submit" name="delete_donation" id="form-submit" class="button">حدف</button>
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