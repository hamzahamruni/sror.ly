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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-grad-school.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link rel="stylesheet" href="assets/css/style.css">


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

  <section class="section contact" data-section="section4" style="padding-top: 100px;">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">
          <div class="section-heading">
            <h3 style="color : #ffa5d2"> تواصل معنا</h3>

          </div>
        </div>
        <div class="col-md-12" dir="rtl">
            <fieldset>
              <h4 style="color: black;text-align: right;" >
              نص
              </h4>
            <br>
            <p style="color: black;font-size:20px;text-align: right;">
            نص
            </p>

            <h4 style="color: black;text-align: right;" >
            نص
          </h4>
            <br>
            <p style="color: black;text-align: right;">
            نص
            </p>

            <h4 style="color: black;text-align: right;" >
            نص
            </h4>
            <br>
            <p style="color: black;text-align: right;">
            نص
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