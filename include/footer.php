<footer>
<br><br><br><br><br><br>
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <p><i class="fa fa-copyright"></i>  2020 حقوق النشر محفوظة

                | تم صناعة الموقع الإلكتروني بواسطة : <a href="" rel="sponsored" target="_parent" style="color: white" > sror.ly  </a></p>
        </div>
        </div>
    </div>
</footer>

<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../assets/js/isotope.min.js"></script>
<script src="../assets/js/owl-carousel.js"></script>
<script src="../assets/js/lightbox.js"></script>
<script src="../assets/js/tabs.js"></script>
<script src="../assets/js/video.js"></script>
<script src="../assets/js/slick-slider.js"></script>
<script src="../assets/js/custom.js"></script>
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
          document.getElementById("lphone").style.color="white";
        //	document.getElementById("codemsg").innerHTML=" ";
          }

        }
    }
    function validatePhoneFamily()
    {

        // regex pattern for phone number
        const patnn=/^[0-9]{10}$/;
        if(document.getElementById("phone_family").value == "")
        {
          document.getElementById("lphone_family").style.color="red";
          //document.getElementById("codemsg").innerHTML="The CODE OR COLOR Is Empty";
          v=false;

        }
        else{
          if(patnn.test(document.getElementById("phone_family").value) == false)
          {
            document.getElementById("lphone_family").style.color="red";
            //document.getElementById("codemsg").innerHTML="CODE OR COLOR is Wrong ";
            v=false;
          }

          else
          {
            document.getElementById("lphone_family").style.color="white";
        //	document.getElementById("codemsg").innerHTML=" ";
          }

        }
    }

    function validateNational_number()
    {

        // regex pattern for phone number
        const patnn=/^[1-2]{1}[0-9]{11}$/;
        if(document.getElementById("national_number").value == "")
        {
          document.getElementById("lnational_number").style.color="red";
          //document.getElementById("codemsg").innerHTML="The CODE OR COLOR Is Empty";
          v=false;

        }
        else{
          if(patnn.test(document.getElementById("national_number").value) == false)
          {
            document.getElementById("lnational_number").style.color="red";
            //document.getElementById("codemsg").innerHTML="CODE OR COLOR is Wrong ";
            v=false;
          }

          else
          {
          document.getElementById("lnational_number").style.color="white";
        //	document.getElementById("codemsg").innerHTML=" ";
          }

        }
    }
    function validateFamilyNumbrt()
    {

        // regex pattern for phone number
        const patnn=/^[0-9]{4,12}$/;
        if(document.getElementById("family_number").value == "")
        {
          document.getElementById("lfamily_number").style.color="red";
          //document.getElementById("codemsg").innerHTML="The CODE OR COLOR Is Empty";
          v=false;

        }
        else{
          if(patnn.test(document.getElementById("family_number").value) == false)
          {
            document.getElementById("lfamily_number").style.color="red";
            //document.getElementById("codemsg").innerHTML="CODE OR COLOR is Wrong ";
            v=false;
          }

          else
          {
            document.getElementById("lfamily_number").style.color="white";
        //	document.getElementById("codemsg").innerHTML=" ";
          }

        }
    }


</script>