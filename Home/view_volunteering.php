<?php
session_start();
if(isset($_SESSION['id_user']))
{
 include("../include/db_connection.php");
 include('../functions/fun_orphans_sponsorships.php');
 include('../functions/fun_volunteering.php');
if(isset($_GET['id_volunteering']))
{
    $volunteering =  get_volunteering_id($_GET['id_volunteering'],0);
    if(!$volunteering)
    {
        header('Location: index.php');
    }
}
else
{
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en" dir="rtl">

<?php
include('../include/head.php')
?>

<body>


  <!--header-->
  <?php
  include('../include/appbar.php')
  ?>

  <section class="section contact" data-section="section4" style="padding-top: 100px;">
    <div class="container-fluid">
      <div class="row">


        <div class="col-md-12">
        <img src='<?php echo 'uploads_img/'.$volunteering->img; ?>' width="500" alt="Course #2">
            <fieldset>
              <h4 style="color: black;" >
              <?php echo $volunteering->title; ?>
              </h4>
            <hr>
            <p style="color: black;font-size:20px">
            <?php echo $volunteering->note; ?>
            </p>


            </fieldset>
          </div>
        </div>
      </div>
    </div>

  </section>







  <footer>
    <br><br><br>
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <p><i class="fa fa-copyright"></i>  2023 حقوق النشر محفوظة

                | تم صناعة الموقع الإلكتروني بوسطة : <a href="" rel="sponsored" target="_parent"> هبه و حنين  </a></p>
            </div>
            </div>
        </div>
    </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .scroll-to-section').on('click', 'a', function (e) {
          if($(e.target).hasClass('external')) {
            return;
          }
          e.preventDefault();
          $('#menu').removeClass('active');
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
</body>
</html>
<?php
}
else
{
  header('Location: ../login.php');
}