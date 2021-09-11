    <footer class="site-footer">
      <div class="container">
        <div class="row text-right">
          <div class="col-md-12">
            <p class="copyright">

<?php
    $query = $db->query("SELECT * FROM sitesetting") or die('could not search!');
        while ($row = mysqli_fetch_array($query)) {
            $sitename = $row['sitename'];
            $domain = $row['domain'];
?>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="<?php echo $domain; ?>" target="_blank" ><?php echo $sitename; ?></a>
        <?php } ?>
            </p>
          </div>

        </div>
      </div>
    </footer>

  </div> <!-- .site-wrap -->

  <a href="#top" class="gototop"><span class="icon-angle-double-up"></span></a>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/uikit.min.js"></script>
  <script src="js/all.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>


  <script src="js/main.js"></script>

  </body>
</html>