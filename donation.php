
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

  <section class="section contact" data-section="section4" style="padding-top: 100px;">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">
          <center>
          <h3> التبرع</h3>
          </center>
        </div>
        <div class="col-md-2 "></div>
        <div class="col-md-8">
          <form id="contact" action="" method="post" onsubmit="return validate_dontaion();">
            <div class="row">
                <div class="col-md-6">
                  <fieldset>
                  <label>الاسم  </label>
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
                  <label id="laddress" > العنوان</label>
                    <input name="address" type="text"  class="form-control" id="address"  maxlength="100" placeholder="ادخل العنوان" required="">
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

                <div class="col-md-6">
                  <fieldset>
                    <label> نوع التبرع</label>
                      <select name="type" class="form-control" id="type" required="" onchange="type_donation()">
                      <option class="form-control">   </option>
                      <option class="form-control"  value="مادي">تبرع مادي</option>
                      <option class="form-control"  value="نقدي">  تبرع  نقدي</option>
                      <option class="form-control"  value="رصيد"> تبرع برصيد</option>

                    </select>
                  </fieldset>
                </div>


                <div class="col-md-6" id="view_physically" style="display:none">
                  <fieldset >
                    <label> نوع مادي</label>
                      <select name="physically" class="form-control" id="physically" >
                      <option class="form-control">   </option>
                      <option class="form-control"  value="سلعة تموينية">سلعة تموينية</option>
                      <option class="form-control"  value="أجهزة كهرومنزلية">أجهزة كهرومنزلية </option>
                      <option class="form-control"  value="ملابس">ملابس  </option>
                      <option class="form-control"  value="أثاث">أثاث </option>
                      <option class="form-control"  value="قيمة مالية">قيمة مالية</option>
                      <option class="form-control"  value="أدوية">أدوية</option>
                      <option class="form-control"  value="حفر بئر">حفر بئر</option>
                      <option class="form-control"  value="غير ذلك">غير ذلك</option>
                    </select>
                  </fieldset>
                </div>

                <div class="col-md-6"  id="view_amount" style="display:none">
                    <div class="row">
                      <div class="col-md-6">
                        <fieldset>
                        <label id="lamount" > القيمة</label>
                          <input name="amount" type="number"  class="form-control" id="amount"  min="0" max="100000000" placeholder="دينار">
                        </fieldset>
                      </div>
                      <div class="col-md-6">
                        <fieldset>
                          <label> طريقة الدفع</label>
                            <select name="type_amount" class="form-control" id="type_amount"  >
                            <option class="form-control">   </option>
                            <option class="form-control"  value="كاش">كاش</option>
                            <option class="form-control"  value="حواله مصرفية">  حواله  مصرفية</option>
                          </select>
                        </fieldset>
                      </div>
                    </div>
                </div>

                <div class="col-md-6"  id="view_phone_credit" style="display:none">
                    <div class="row">
                      <div class="col-md-6">
                        <fieldset>
                        <label id="lcredit" > قيمة الرصيد</label>
                          <input name="credit" type="number"  class="form-control" id="credit"  min="1" max="100000000" placeholder="الرصيد">
                        </fieldset>
                      </div>
                      <div class="col-md-6">
                        <fieldset>
                        <label id="lphone_credit" >رقم الهاتف</label>
                          <input name="phone_credit" type="text" onkeyup="validate_phone_credit();" class="form-control" id="phone_credit"  maxlength="10" placeholder="091xxxxxxx" >
                        </fieldset>
                      </div>
                    </div>
                </div>
            </div>

            <center>
              <div class="col-md-12">
              <br>
                <fieldset>
                  <button name="insert_donation" value="insert_donation" type="submit" id="form-submit" class="button">تبرع الآن</button>
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