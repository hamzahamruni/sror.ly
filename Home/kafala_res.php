<?php
    include('../include/db_connection.php');
    include('../functions/fun_volunteering.php');


    $deliverys = (array) [];
    $deliverys =  get_all_kafala_res();
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
              <h3>عرض <em>  الكفاله الكفالات  </em>    </h3>
            </div>

            <table style="width:100%">
                <tr>
                    <th>اسم الكفالة</th>
                    <th>  صورة الكفالة</th>
                    <th>نوع الكفالة</th>
                    <th>  اسم الكافل</th>
                    <th> رقم الكافل</th>
                    <th> عنوان الكافل</th>
                </tr>
                <?php
                foreach($deliverys as $delivery)
                {
                    ?>
                    <tr>
                    <td><?php echo $delivery->name?> </td>
                    <td ><?php  echo '<img src="data:image/jpeg;base64,'.$delivery->img.'" width="200" height="100"/> ';?> </td>

                    <td><?php
                        if($delivery->type == 'year')
                        {
                        echo 'سنوية';
                        }
                        else
                        {
                        echo 'شهرية';
                        }
                        ?> 
                    </td>
                    <td><?php echo $delivery->name_res?>  </td>
                    <td><?php echo $delivery->phone?>  </td>
                    <td><?php echo $delivery->address?>  </td>



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