<?php
include 'inicijalizacija.php';
$poruka = '';
if (isset($_POST["unesi"])) {

  include("mecClass.php");
  $mec = new Mec($db);

  if ($mec->izmeniNaziv()) {
    $poruka = 'Uspešno izmenjen naziv tima';
  } else {
    $poruka = 'Greška pri izmeni';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Superliga Srbije</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

  </head>
  <body>
    <?php include 'navbar.php'; ?>


    <section id ="feature" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h2>Izmena naziva tima</h2>
            <p><?php
              echo ($poruka);
              ?></p>
            <hr class="bottom-line">
            <form class="" method="post" action="">
                <div class="form-group">
                  <label for="tim" class="cols-sm-2 control-label">Tim</label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                      <select id="tim" class="form-control" name="tim" >
                        <?php
                        $tim = $db->get('tim');
                        foreach ($tim as $t) {
                          ?>
                                  <option value="<?php echo ($t['timID']); ?>"><?php echo ($t['nazivTima']); ?></option>
                                <?php

                              }
                              ?>
                      </select>
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <label for="naziv" class="cols-sm-2 control-label">Naziv</label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-thumbs-up fa" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="naziv" id="naziv"  placeholder="Naziv"/>
                    </div>
                  </div>
                </div>



                <div class="form-group ">
                  <button type="submit" name="unesi" id="button" class="btn btn-primary btn-lg btn-block login-button">Izmeni naziv</button>
                </div>

              </form>
          </div>
        </div>
      </div>
    </section>

    <?php include 'footer.php'; ?>



    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>

  </body>
</html>
