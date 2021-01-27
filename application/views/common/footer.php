<footer class="site-footer">
          <div class="text-center">
              2018 © FlatLab by VectorLab.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
</footer>
</section>

  <!-- js placed at the end of the document so the pages load faster -->

    <script src="<?=base_url()?>assets/js/bootstrap.bundle.min.js"></script>
    <script class="include" type="text/javascript" src="<?=base_url()?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="<?=base_url()?>assets/js/owl.carousel.js" ></script>
    <script src="<?=base_url()?>assets/js/jquery.customSelect.min.js" ></script>
    <script src="<?=base_url()?>assets/js/respond.min.js" ></script>

    <!--right slidebar-->
    <script src="<?=base_url()?>assets/js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="<?=base_url()?>assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="<?=base_url()?>assets/js/sparkline-chart.js"></script>
    <script src="<?=base_url()?>assets/js/easy-pie-chart.js"></script>
    <script src="<?=base_url()?>assets/js/count.js"></script>
   

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

      $(window).on("resize",function(){
          var owl = $("#owl-demo").data("owlCarousel");
          owl.reinit();
      });

  </script>

  </body>

<!-- Mirrored from thevectorlab.net/flatlab-4/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Dec 2020 12:34:31 GMT -->
</html>