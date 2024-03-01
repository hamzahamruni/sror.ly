<?php
  include("include/db_connection.php");
  include('functions/fun_orphans_sponsorships.php');
  include('functions/fun_volunteering.php');
  insert_vister();
  $volunteerings = get_activities();;


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

     <?php
      include('appbar.php')
      ?>

    <header class="main-header clearfix" dir="rtl" style="width:auto;top:50%;right:-20;height:auto;border-radius: 30px;border: 3px solid white;" dir="rtl">

      <nav  >
        <ul class="main-menu">
          <li ><a href="hadia.php" class="external" style="margin-left: 0px" >  هدية 🎁</a></li>
          <li ><a href="select_donation.php" class="external" style="margin-left: 0px"> تبرع سريع 👋</a></li>
        </ul>
      </nav>
    </header>


  <section class="section courses" data-section="section4" dir="ltr">

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <br><br><br><br><br><br>
            <h3>
             النشاطات
            </h3>
          </div>
        </div>

        <div class="owl-carousel owl-theme"  >
        <?php
          foreach($volunteerings as $volunteering)
          {
          $img = 'Home/uploads_img/'.$volunteering->img;
          ?>
            <div id="itemm" >
            <div class="item" style="text-align: center"   >
            <?php echo '<img src="data:image/jpeg;base64,'.$volunteering->img.'"/>'; ?>
              <div class="down-content" style="direction: rtl;">
                <h4><?php echo $volunteering->name;?></h4>
                <p>
                  <?php echo substr($volunteering->detiles, 0, 30);?>
                <a href=<?php echo "view_activities.php?id_activities=".$volunteering->id_activities;?> style="color: #ffa5d2;"> المزيد <i class="fa fa-angle-double-left"></i></a>
                </p>
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