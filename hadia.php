
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
$msg='';
include('include/db_connection.php');
include("functions/fun_volunteering.php");
if(isset($_POST['insert_hadia']))
{
  extract($_POST);
  if(
    isset($name) && $name !=''
 && isset($phone) && $phone !=''
 && isset($name_to) && $name_to !=''
 && isset($phone_to) && $phone_to !=''
 && isset($tag) && ($tag==1 || $tag==0)
 && isset($amount)
 && isset($receipt)  && $receipt !=''
  )
  {

    $insert_hadia = insert_hadia($name,$phone,$name_to,$phone_to,$tag,$amount,$receipt);
    if($insert_hadia)
    {
      header('Location: hadia.php?msg=success');
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


  <?php
    include('appbar.php')
  ?>

  <section class="section contact" data-section="section4" style="padding-top: 100px;">
    <div class="container-fluid">
      <div class="row">
      <?php
      if(isset($_GET['msg']))
      {
      ?>
      <div id="hideDiv">
        تمت الاضافة بنجاح
      </div>
      <?php
      }
      ?>
        <div class="col-md-12">
          <center>
          <h3>🎁 هدية</h3>
          </center>
        </div>



        <div class="col-md-2 "></div>
        <div class="col-md-8">
          <form id="contact" action="" method="post" onsubmit="return validate_dontaion();">
            <div class="row">
                <div class="col-md-6">
                  <fieldset>
                  <label> اسم الهدي </label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="الإسم" maxlength="50" required="">
                  </fieldset>
                </div>
                <div class="col-md-6">
                  <fieldset>
                  <label id="lphone" >رقم الهاتف</label>
                    <input name="phone" type="text" onkeyup="validatePhone();" class="form-control" id="phone"  maxlength="10" placeholder="091xxxxxxx" required="">
                  </fieldset>
                </div>

                <div class="col-md-6">
                  <fieldset>
                  <label> اسم الهدي اليه</label>
                    <input name="name_to" type="text" class="form-control" id="name_to" placeholder="الإسم" maxlength="50" required="">
                  </fieldset>
                </div>
                <div class="col-md-6">
                  <fieldset>
                  <label id="lphone_to" >رقم الهاتف المهدي اليه</label>
                    <input name="phone_to" type="text" onkeyup="validatePhone_to();" class="form-control" id="phone_to"  maxlength="10" placeholder="091xxxxxxx" required="">
                  </fieldset>
                </div>


                <div class="col-md-6">
                    <label>  ابلاغ المهدي اليه باسم المهدي</label>
                    <div class="row">
                        <div class="col-md-6">
                        <label> ابلاغ
                        <input name="tag" value="1" type="radio" class="form-control col-md-5" id="tag" style="display: inline;" required="">
                        </label>
                        </div>

                        <div class="col-md-6">
                        <label> بدون ابلاغ
                        <input name="tag" value="0" type="radio" class="form-control col-md-3" id="tag" style="display: inline;" required="">
                        </label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6"  >
                    <div class="row">
                      <div class="col-md-6">
                        <fieldset>
                        <label id="lamount" > القيمة</label>
                          <input name="amount" type="number"  class="form-control" id="amount"  min="1" max="100000000" placeholder="دينار" required="">
                        </fieldset>
                      </div>
                        <div class="col-md-6">
                            <fieldset>
                                <label> طريقة الاستلام </label>
                                <select name="receipt" class="form-control" id="receipt" required="">
                                <option class="form-control">   </option>
                                <option class="form-control"  value="مندوب">مندوب</option>
                                <option class="form-control"  value="حضور للمؤسسة">  حضور  للمؤسسة</option>

                                </select>
                            </fieldset>
                        </div>
                    </div>
                </div>


            <div class="col-md-5"> </div>
              <div class="col-md-6">

                <fieldset>
                  <button name="insert_hadia" value="insert_hadia" type="submit" id="form-submit" class="button"> اهداء 🎁</button>
                </fieldset>
              </div>

          </form>
        </div>

      </div>
    </div>
    <br><br>
  </section>



  <footer>
    <br><br><br>
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <p><i class="fa fa-copyright"></i>  2023 حقوق النشر محفوظة

                | تم صناعة الموقع الإلكتروني بواسطة : <a href="" rel="sponsored" target="_parent"> sror.ly  </a></p>
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
  $(function() {
	setTimeout(function() { $("#hideDiv").fadeOut(1500); }, 5000)

	})
      function validatePhone_to()
        {
            // regex pattern for phone number
            const patnn=/^[0-9]{10}$/;
            if(document.getElementById("phone_to").value == "")
            {
              document.getElementById("lphone_to").style.color="red";
              //document.getElementById("codemsg").innerHTML="The CODE OR COLOR Is Empty";
              v=false;

            }
            else{
              if(patnn.test(document.getElementById("phone_to").value) == false)
              {
                document.getElementById("lphone_to").style.color="red";
                //document.getElementById("codemsg").innerHTML="CODE OR COLOR is Wrong ";
                v=false;
              }

              else
              {
              document.getElementById("lphone_to").style.color="black";
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