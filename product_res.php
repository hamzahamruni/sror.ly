
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
if(isset($_POST['insert_product_res_2']))
{
  extract($_POST);
  if(
    isset($id_product) && $id_product !=''
    &&  isset($name) && $name !=''
    && isset($phone) && $phone !=''
    && isset($address) && $address !=''
  )
  {

    $insert = insert_product_res($id_product,$name,$phone,$address);
    if($insert)
    {
      ?>
      <script>
        alert("تمت الحجز بنجاح");
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
if(
    (isset($_POST['insert_product_res']) &&  isset($_POST['id_product']))
    ||
    isset($id_product)
)
{
    $product = get_id_product($_POST['id_product']);
}
?>
<body>


  <!--header-->
  <?php
  include('appbar.php')
  ?>

  <section class="section contact" data-section="section4" style="padding-top: 100px;">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">
          <center>
          <h3>
            حجر منتج
            <?php
            if(isset($product->name))
            {
                echo $product->name;
                echo '<br>';
                echo '<img src="data:image/jpeg;base64,'.$product->img.'" width="300" height="200"/> ';
                echo '<br>';
                echo $product->price.' د.ل';
                echo '<hr>';
            }
            ?>
          </h3>
          </center>
        </div>
        <div class="col-md-2 ">

        </div>
        <div class="col-md-8">
          <form id="contact" action="" method="post" >
            <div class="row">
                <div class="col-md-6">
                  <fieldset>
                  <label>الاسم  </label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="الإسم" maxlength="50" required="">
                  </fieldset>
                </div>
                <div class="col-md-3">
                  <fieldset>
                  <label id="lphone" >رقم الهاتف</label>
                    <input name="phone" type="text" onkeyup="validatePhone();" class="form-control" id="phone"  maxlength="10" placeholder="091xxxxxxx" required="">
                  </fieldset>
                </div>

                <div class="col-md-3">
                  <fieldset>
                  <label id="laddress" > العنوان</label>
                    <input name="address" type="text"  class="form-control" id="address"  maxlength="100" placeholder="ادخل العنوان" required="">
                  </fieldset>
                </div>

            </div>

            <center>
              <div class="col-md-12">
              <br>
                <fieldset>
                    <?php
                    if(isset($product->name))
                    {
                        ?>
                        <input  type="number" name="id_product" value="<?php echo $product->id_product;?>" hidden>
                        <?php

                    }
                    ?>
                  <button name="insert_product_res_2" value="insert_product_res_2" type="submit" id="form-submit" class="button">تاكيد الحجر</button>
                </fieldset>
              </div>
            </center>
          </form>
        </div>

      </div>
    </div>
    <br><br><br> <br>
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