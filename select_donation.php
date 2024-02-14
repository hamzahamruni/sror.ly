
<!DOCTYPE html>
<html lang="en" dir="rtl">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>على سُرر متقابلين</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-grad-school.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">

  </head>
  <?php
include('include/db_connection.php');
include("functions/fun_volunteering.php");
if(isset($_POST['insert_donation']))
{
  extract($_POST);
  if(
    isset($name) && $name !=''
 && isset($phone) && $phone !=''
 && isset($type) && $type !=''
 && isset($physically)
 && isset($amount)
 && isset($type_amount)
 && isset($credit)
 && isset($phone_credit)
 && isset($address)  && $address !=''
 && isset($receipt)  && $receipt !=''
  )
  {
    if($type == 'مادي')
    {
      $amount = 'null';
      $type_amount = '';
      $credit = 'null';
      $phone_credit = '';
    }
    else if($type == 'نقدي')
    {
      $physically = '';
      $credit = 'null';
      $phone_credit = '';
    }
    else if($type == 'رصيد')
    {
      $physically = '';
      $amount = 'null';
      $type_amount = '';
    }
    $insert_donation = insert_donation($name,$phone,$type,$physically,$amount,$type_amount,$credit,$phone_credit,$address,$receipt);
    if($insert_donation)
    {
      ?>
      <script>
        alert("تمت الاضافة بنجاح");
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
?>
<body>


  <!--header-->
  <?php
  include('appbar.php')
  ?>
  <section class="section coming-soon" data-section="section3" style="background-color: #faf7f9">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="continer centerIt">
            <div>
            <br><br>
              <br><br>
              <center>
              <h4 style="color: black;">
                  نوع

                <em>  التبرع </em>
              </h4>
              </center>

              <div class="counter" dir="rtl">

                <a href="donation.php">
                  <div class="days" style="background-color: #0022ff;">
                    <i class="fa fa-home"></i>
                    <span style="color: white;font-size:20px;">
                      الاعانة الاسرية
                    </span>
                  </div>
                </a>
                <a href="donation.php">
                  <div class="hours" style="background-color: #7321bf;">
                    <i class="fa fa-home"></i>
                    <span style="color: white;font-size:20px;">
                      التموين الغداءي
                    </span>
                  </div>
                </a>

                <a href="donation.php">
                  <div class="minutes" style="background-color: green;">
                    <i class="fa fa-home"></i>
                    <span style="color: white;font-size:20px;">
                      تجهيز العرايس
                    </span>
                  </div>
                </a>
                <a href="donation.php">
                  <div class="seconds" style="background-color: red;">
                    <i class="fa fa-graduation-cap"></i>
                    <span style="color: white;font-size:20px;">
                      الدعم الدراسي
                    </span>
                  </div>
                </a>




              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br><br><br><br><br> <br><br> <br><br> <br><br>
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
      function type_donation()
      {
        var type_donation = document.getElementById("type").value;
        if(type_donation==='مادي')
        {
          document.getElementById("view_amount").style.display='none'
          document.getElementById('amount').required=false;
          document.getElementById('type_amount').required=false;

          document.getElementById("view_phone_credit").style.display='none'
          document.getElementById('phone_credit').required=false;
          document.getElementById('credit').required=false;

          document.getElementById("view_physically").style.display='block'
          document.getElementById('physically').required=true;
        }
        else if(type_donation==='نقدي')
        {
          document.getElementById('view_physically').style.display='none';
          document.getElementById('physically').required=false;

          document.getElementById("view_phone_credit").style.display='none'
          document.getElementById('phone_credit').required=false;
          document.getElementById('credit').required=false;

          document.getElementById("view_amount").style.display='block'
          document.getElementById('amount').required=true;
          document.getElementById('type_amount').required=true;

        }
        else if(type_donation==='رصيد')
        {
          document.getElementById('view_physically').style.display='none';
          document.getElementById('physically').required=false;

          document.getElementById("view_amount").style.display='none'
          document.getElementById('amount').required=false;
          document.getElementById('type_amount').required=false;

          document.getElementById("view_phone_credit").style.display='block'
          document.getElementById('phone_credit').required=true;
          document.getElementById('credit').required=true;


        }
      }
      function validate_phone_credit()
      {
          // regex pattern for phone number
          const patnn=/^[0-9]{10}$/;
          if(document.getElementById("phone_credit").value == "")
          {
            document.getElementById("lphone_credit").style.color="red";
            //document.getElementById("codemsg").innerHTML="The CODE OR COLOR Is Empty";
            v=false;

          }
          else{
            if(patnn.test(document.getElementById("phone_credit").value) == false)
            {
              document.getElementById("lphone_credit").style.color="red";
              //document.getElementById("codemsg").innerHTML="CODE OR COLOR is Wrong ";
              v=false;
            }

            else
            {
              document.getElementById("lphone_credit").style.color="black";
          //	document.getElementById("codemsg").innerHTML=" ";
            }

          }
      }
        function validatePhone()
        {
            // regex pattern for phone number
            const patnn=/^[0-9]{10}$/;
            if(document.getElementById("phone").value == "")
            {
              document.getElementById("lphone").style.color="red";
              //document.getElementById("codemsg").innerHTML="The CODE OR COLOR Is Empty";
              v=false;

            }
            else{
              if(patnn.test(document.getElementById("phone").value) == false)
              {
                document.getElementById("lphone").style.color="red";
                //document.getElementById("codemsg").innerHTML="CODE OR COLOR is Wrong ";
                v=false;
              }

              else
              {
              document.getElementById("lphone").style.color="black";
            //	document.getElementById("codemsg").innerHTML=" ";
              }

            }
        }
        function validate_dontaion()
        {
            var validation = true;


            var patnn=/^[0-9]{10}$/;
            if(document.getElementById("phone").value == "")
            {
              document.getElementById("lphone").style.color="red";
              validation=false;

            }
            else{
              if(patnn.test(document.getElementById("phone").value) == false)
              {
                document.getElementById("lphone").style.color="red";
                validation=false;
              }

              else
              {
                document.getElementById("lphone").style.color="black";
              }

            }
            return validation;
        }
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