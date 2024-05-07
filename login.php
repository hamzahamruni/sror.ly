<?php
session_start();
if(isset($_SESSION['id_user']))
{
  header('Location: Home/home.php');

}
else
{
  @session_unset();
}
//@session_destroy();

include('include/db_connection.php');
//_____________________________________________________________
//            Log In
  $msg = false;
  if(isset($_POST['login']))
  {
    extract($_POST);
    if(isset($username) && isset($password))
    {
      $username = mysqli_real_escape_string($connection, $username);
      $sql_login = "SELECT id_user,name,username FROM users WHERE
      username = '$username' AND password = '$password' AND del=0";
      $admin_set = mysqli_query($connection,$sql_login);
      if( $admin = mysqli_fetch_object($admin_set) )
      {
        $_SESSION['id_user'] = $admin->id_user;
        $_SESSION['name'] = $admin->name;
        $_SESSION['username'] = $admin->username;
        header('Location: Home/home.php');

      }
      else
      {
        ?>
        <script>
          alert('المستخدم غير موجود ');
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

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>سرر</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-grad-school.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 557 Grad School

https://templatemo.com/tm-557-grad-school

-->
  </head>

<body>


  <!--header-->
  <?php
    include('appbar.php')
  ?>

  <section class="section contact" data-section="section4" >
    <div class="container-fluid" style="padding-top:150px">
      <div class="row">

        <div class="col-md-12">
          <center>
            <h3 style="color:#ffa5d2">تسجيل الدخول</h3>
            </center>
        </div>

        <div class="col-md-4 "></div>

        <div class="col-md-4 ">
          <form id="contact" action="" method="post">
            <div class="row">
                <div class="col-md-12">
                  <fieldset>
                    <input name="username" type="text" class="form-control" id="username" placeholder="UserName" required>
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" required="">
                  </fieldset>
                </div>

              <div class="col-md-12">
              <center>
                <fieldset>
                  <button name="login" value="login" type="submit" id="form-submit" style="color:white" class="button">تسجيل دخول</button>
                </fieldset>
                </center>
              </div>

            </div>
          </form>
        </div>

      </div>
    </div>
    <br><br><br> <br><br>
  </section>


  <footer>
      <div class="container">
          <div class="row">
          <div class="col-md-12">
              <p><i class="fa fa-copyright"></i>  2024 حقوق النشر محفوظة

                | تم صناعة الموقع الإلكتروني بواسطة : <a href="" style="color:white" rel="sponsored" target="_parent"> sror.ly  </a></p>
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