<?php
session_start();
if(isset($_SESSION['id_user']))
{
?>
  <!DOCTYPE html>
  <html lang="en" dir="rtl">
  <?php
  include('../include/head.php')
  ?>
  <body>
  <?php
  include('../include/appbar.php');
  include('../include/db_connection.php');
  include('../functions/fun_orphans_sponsorships.php');
  ?>
  <section class="section coming-soon" data-section="section3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="continer centerIt">
            <div>
            <br><br>
              <br><br>
              <center>
              <h4>
                  إحصائيات

                <em>  المؤسسة </em>
              </h4>
              </center>

              <div class="counter" dir="rtl">

                <div class="days">
                <div ><?php echo count_donation();?></div>
                  <span>عدد التبرعات</span>
                </div>

                <div class="hours">
                  <div ><?php echo count_hadia();?></div>
                  <span>عدد الهدايا</span>
                </div>

                <div class="minutes">
                  <div class="value"><?php echo count_vister();?></div>
                  <span>  زوار الموقع</span>
                </div>

                <div class="seconds">
                  <div class="value"><?php echo count_hadia();?></div>
                  <span>  الاقسام</span>
                </div>

              </div>
            </div>
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