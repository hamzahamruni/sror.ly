<?php
  include("include/db_connection.php");
  include('functions/fun_orphans_sponsorships.php');
  include('functions/fun_volunteering.php');
  insert_vister();
  $volunteerings =  get_volunteering('اقسام الخدمات',0);
  $volunteerings_ =  get_volunteering('اقسام النشطات',0);
  session_start();

  $medias =  get_medias();
  // echo '<pre>';print_r($medias);echo '</pre>';die();
?>
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
<style>

#itemm:hover{
  border: 3px solid #ffa5d2;

}
</style>
  </head>
<body >


      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100 h-11" src="./assets/images/pp1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100  h-11" src="./assets/images/pp2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100  h-11 " src="./assets/images/pp3.jpg" alt="Third slide">
            </div>
			    <div class="carousel-item">
              <img class="d-block w-100  h-11" src="./assets/images/pp4.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
  <!--header-->



     <?php
      include('appbar.php')
      ?>

    <header class="main-header clearfix" dir="rtl" style="width:auto;top:50%;right:-20;height:auto;border-radius: 30px;border: 3px solid white;" dir="rtl">

      <nav  >
        <ul class="main-menu">
          <li ><a href="hadia.php" class="external" style="margin-left: 0px" >  هدية 🎁</a></li>
          <li ><a href="donation.php" class="external" style="margin-left: 0px"> تبرع سريع 👋</a></li>
        </ul>
      </nav>
    </header>


  <section class="section courses" data-section="section4" dir="ltr">

          <div class="col-md-12 col-xs-12">
            <div class="continer centerIt">
              <div >
                <center>
                  <br>
                <h2> قال الله تعالي  </h2>
                <h2>       <em> مَّن ذَا الَّذِي يُقْرِضُ اللَّهَ قَرْضًا حَسَنًا فَيُضَاعِفَهُ لَهُ أَضْعَافًا كَثِيرَةً </em></h2>

                </center>
                <div>
            <div>
          <div>
          <hr><br><br>

    <?php
    if(isset($_SESSION['id_user']))
    {
    ?>
      <div id="demo" dir="rtl">
            <div class="container" style="max-width:100% !important;position: relative;text-align: center;color: white">
              <div class="row">
                <div class="span12">
                  <div id="owl-demo" class="owl-carousel" style="width:170% !important;">

                    <div class="item" >
                      <a href="./Home/delivery_view.php" style="color: #ffa5d2;">
                        <img src="assets/images/pp1.jpg" alt="Owl Image" >
                        <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);font-size:20px;color: white">الاعلامي</div>
                        <center>
                            &nbsp &nbsp &nbsp &nbsp
                            الاعلامي <i class="fa fa-angle-double-up"></i>
                        </center>
                        </a>
                    </div>

                    <div class="item" >
                      <a href="./Home/delivery_view.php" style="color: #ffa5d2;">
                        <img src="assets/images/pp1.jpg" alt="Owl Image" >
                        <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);font-size:20px;color: white">النقل و التوصيل</div>

                        <center>
                            &nbsp &nbsp &nbsp &nbsp
                            النقل و التوصيل  <i class="fa fa-angle-double-up"></i>
                        </center>
                        </a>
                    </div>

                    <div class="item" >
                      <a href="./Home/needy_view.php" style="color: #ffa5d2;">
                        <img src="assets/images/pp1.jpg" alt="Owl Image" >
                        <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);font-size:20px;color: white">المحتاجين</div>
                        <center>
                            &nbsp &nbsp &nbsp &nbsp
                            المحتاجين  <i class="fa fa-angle-double-up"></i>
                        </center>
                        </a>
                    </div>


                  </div>

                </div>
              </div>
            </div>
          </div>
          <hr><br><br>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h3 style="color : black">
          اقسام الخدمات
          </h3>
          </div>
        </div>
        <div class="owl-carousel owl-theme">
         <?php
         foreach($volunteerings as $volunteering)
         {
          $img = 'Home/uploads_img/'.$volunteering->img;
          ?>
           <div id="itemm" >
           <div class="item" style="text-align: center"   >
             <img src="<?php echo $img;?>" alt="Course #2">
             <div class="down-content" style="direction: rtl;">
               <h4><?php echo $volunteering->title;?></h4>
               <p><?php echo $volunteering->date;?></p>
                <hr>
               <p><?php echo $volunteering->note;?></p>
              <center>
                <a href=<?php echo "view_volunteering.php?id_volunteering=".$volunteering->id_volunteering;?> style="color: #ffa5d2;"> المزيد <i class="fa fa-angle-double-left"></i></a>
                &nbsp &nbsp &nbsp &nbsp
                <a href="donation.php" style="color: #ffa5d2;">تبرع الان <i class="fa fa-angle-double-up"></i></a>
             </center>
             </div>
           </div>
           </div>
          <?php
         }
          ?>
        </div>
      </div>
    </div>
    <br> <hr><br>
    <div class="btn_view">

    </div>
    <?php
    }
    ?>

    <div id="demo" dir="rtl">
      <div class="container" style="max-width:100% !important;position: relative;text-align: center;color: white">
        <div class="row">
          <div class="span12">
          <div id="owl-demo" class="owl-carousel" style="width:170% !important;">



              <div class="item" >
                <a href="campaigns.php" style="color: #ffa5d2;">
                  <img src="assets/images/pp1.jpg" alt="Owl Image" >
                  <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);font-size:20px;color: white">الحملات</div>
                  <center>
                      &nbsp &nbsp &nbsp &nbsp
                      الحملات <i class="fa fa-angle-double-up"></i>
                  </center>
                  </a>
              </div>

              <div class="item" >
                <a href="volunteering.php" style="color: #ffa5d2;">
                  <img src="assets/images/pp1.jpg" alt="Owl Image" >
                  <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);font-size:20px;color: white">النشطات</div>

                  <center>
                      &nbsp &nbsp &nbsp &nbsp
                      النشطات  <i class="fa fa-angle-double-up"></i>
                  </center>
                  </a>
              </div>

              <div class="item" >
                <a href="achievements.php" style="color: #ffa5d2;">
                  <img src="assets/images/pp1.jpg" alt="Owl Image" >
                  <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);font-size:20px;color: white">الانجازات</div>
                  <center>
                      &nbsp &nbsp &nbsp &nbsp
                       الانجازات  <i class="fa fa-angle-double-up"></i>
                  </center>
                  </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h3>
            اخر النشاطات
            </h3>
          </div>
        </div>
        <div class="owl-carousel owl-theme"  >
         <?php
         foreach($volunteerings_ as $volunteering)
         {
          $img = 'Home/uploads_img/'.$volunteering->img;
          ?>
          <div id="itemm" >
           <div class="item" style="text-align: center"   >
             <img src="<?php echo $img;?>" alt="Course #2">
             <div class="down-content" style="direction: rtl;" ">
               <h4 ><?php echo $volunteering->title;?></h4>
               <p ><?php echo $volunteering->date;?></p>
               <hr>
               <p><?php echo $volunteering->note;?></p>
              <center>
                <a style="color: #ffa5d2;" href=<?php echo "view_volunteering.php?id_volunteering=".$volunteering->id_volunteering;?> "> المزيد <i class="fa fa-angle-double-left"></i></a>
                &nbsp &nbsp &nbsp &nbsp
                <a href="donation.php" style="color: #ffa5d2;">تبرع الان <i class="fa fa-angle-double-up"></i></a>
             </center>
             </div>
           </div>
           </div>
          <?php
         }
          ?>
        </div>
      </div>
    </div>

  </section>
<section class="section coming-soon" data-section="section3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ">
          <div class="continer centerIt">
            <div>
              <center>
              <h4>
                  إحصائيات

                <em>  المؤسسة </em>
              </h4>
              </center>
              <div class="counter" style="text-align: center,float: center;">

                <div class="days" style="float: center;">
                  <div ><?php echo count_donation();?></div>
                  <span>عدد التبرعات</span>
                </div>

                <div class="days" style="float: center;">
                  <div ><?php echo count_hadia();?></div>
                  <span>عدد الهدايا</span>
                </div>

                <div class="days">
                  <div ><?php echo count_vister();?></div>
                  <span>عدد الزوار</span>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br><br>
  </section>

  <section class="section courses" data-section="section5" dir="rtl">

        <div class="col-md-12">
          <div class="row">
          <div class='col-md-6'>
              <center>

              <br><br><br>
                  <h2  dir="ltr"><i class="fa fa-start"></i> تواصل معنا</h2>
                  <hr>

                  <h5  dir="ltr"><i class="fa fa-phone"></i> +218 91 555 8655</h5>
                  <h5  dir="ltr"><i class="fa fa-send"></i>  info@gmail.com</h5>
                  <h5  dir="ltr"><i class="fa fa-flag"></i> طرابلس   </h5>



              </center>
            </div>

            <div class='col-md-6'>
            <br><br>
              <center>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d418.8270923576369!2d13.220134609772426!3d32.88185846518099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13a893ab4e092695%3A0x66e378fc8a07481!2z2KfZhNis2YXYudmK2Kkg2KfZhNmE2YrYqNmjkjK2Kkg2YTZg9mB2KfZhNipINin2YTZitiq2YrZhQ!5e0!3m2!1sar!2sly!4v1690822576568!5m2!1sar!2sly" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </center>
            </div>
          </div>

        </div>
  </section>




  <footer>
      <div class="container">
          <div class="row">
          <div class="col-md-12">
              <p><i class="fa fa-copyright"></i>  2024 حقوق النشر محفوظة

                سرر : <a href="" rel="sponsored" style="color:white" target="_parent"> sror.ly  </a></p>
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
        $('.carousel').carousel({
  interval: 2000
})
    </script>




    <!-- Demo -->
    <style>
    #owl-demo .item{
        margin: 3px;
    }
    #owl-demo .item img{
        display: block;
        width: 100%;
        height: auto;
    }
    </style>


    <script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
        autoPlay: 3000,
        items : 100,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
      });

    });
    </script>



</body>
</html>