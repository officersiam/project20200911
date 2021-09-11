<?php
    include("functions.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Alpona Housing</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/uikit.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">

          <div class="col-9 col-xl-3">

<?php
    $query = $db->query("SELECT * FROM sitesetting") or die('could not search!');
        while ($row = mysqli_fetch_array($query)) {
            $sitelogo = $row['sitelogo'];
?>
            <h1 class="mb-0 site-logo m-0 p-0"><a href="index.php" class="mb-0"><img src="img/<?php echo $sitelogo; ?>" alt="Alpona Housing" width="100px"></a></h1>
        <?php } ?>

            <?php
              if (isadmin()) { ?><a class="uk-button uk-button-default" style="background: #fff;color: #000" href="#modal-site_logo" uk-toggle><i class="fas fa-edit"></i></a>

<div id="modal-site_logo" uk-modal>
    <div class="uk-modal-dialog">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Site Logo</h2>
        </div>

            <form method="POST" enctype="multipart/form-data" action="index.php" class="uk-form-horizontal">
        <div class="uk-modal-body" uk-overflow-auto>

        <div class="uk-margin" uk-margin>
            <label class="uk-form-label" for="form-horizontal-text">Site Logo</label>
            <div class="uk-form-controls">
                  <input name="sitelogo" type="file">
            </div>
        </div>

        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button name="sitelogo" class="uk-button uk-button-primary" type="submit">Submit</button>
        </div>
      </div>
</form>

    </div>
</div>
            <?php  }
            ?>
          </div>
          <div class="col-12 col-md-9 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="#properties-section" class="nav-link">Properties</a></li>
                <li><a href="#about-section" class="nav-link">About</a></li>
                <li><a href="#services-section" class="nav-link">Services</a></li>
                <li><a href="#contact-section" class="nav-link">Contact</a></li>

            <?php
              if (isadmin()) { ?><li><a class="uk-button uk-button-default" style="background: #fff;color: #000" href="#modal-site_settings" uk-toggle><i class="fas fa-edit"></i></a></li>

<div id="modal-site_settings" uk-modal>
    <div class="uk-modal-dialog">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Site Settings</h2>
        </div>

            <form method="POST" action="index.php" class="uk-form-horizontal">
        <div class="uk-modal-body" uk-overflow-auto>
<?php
    $query = $db->query("SELECT * FROM sitesetting") or die('could not search!');
        while ($row = mysqli_fetch_array($query)) {
            $sitename = $row['sitename'];
            $domain = $row['domain'];
            $facebook = $row['facebook'];
            $phone = $row['phone'];
            $email = $row['email'];
            $address = $row['address'];
?>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Site Name</label>
        <div class="uk-form-controls">
            <input name="sitename" class="uk-input" id="form-horizontal-text" type="text" value="<?php echo $sitename; ?>">
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Domain Name</label>
        <div class="uk-form-controls">
            <input name="domain" class="uk-input" id="form-horizontal-text" type="text" value="<?php echo $domain; ?>">
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Facebook Link</label>
        <div class="uk-form-controls">
            <input name="facebook" class="uk-input" id="form-horizontal-text" type="text" value="<?php echo $facebook; ?>">
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Phone Number</label>
        <div class="uk-form-controls">
            <input name="phone" class="uk-input" id="form-horizontal-text" type="text" value="<?php echo $phone; ?>">
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Email Address</label>
        <div class="uk-form-controls">
            <input name="email" class="uk-input" id="form-horizontal-text" type="text" value="<?php echo $email; ?>">
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Address</label>
        <div class="uk-form-controls">
            <input name="address" class="uk-input" id="form-horizontal-text" type="text" value="<?php echo $address; ?>">
        </div>
    </div>

        </div>

        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button name="sitesetting" class="uk-button uk-button-primary" type="submit">Save</button>
        </div>

</form>

    </div>
</div>
            <?php  }}
            ?>
              </ul>
            </nav>
          </div>


          <div class="col-3 d-inline-block d-xl-none ml-md-0 py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>

    </header>