<?php
include 'inicijalizacija.php';  //da bi mogli da koristimo bazu
$orderBy = '';

if (isset($_GET['sort'])) {
  if ($_GET['sort'] == 'rastuce') {
    $orderBy = ' order by t.nazivTima asc';
  }
  if ($_GET['sort'] == 'opadajuce') {
    $orderBy = ' order by t.nazivTima desc';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, iNazivanitial-scale=1">
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
            <h2>Timovi superlige</h2>
            <p>Sortiraj: 

            <a href="index.php?sort=rastuce">Rastuće - naziv tima</a>
            |
            <a href="index.php?sort=opadajuce">Opadajuće - naziv tima</a>


          </p>
            <hr class="bottom-line">
            <table class="table table-stripped" >
              <thead>
                <tr >
                  <th class="text-center">Redni broj</th>
                  <th class="text-center">Naziv tima</th>
                  <th class="text-center">Broj igrača</th>
                  <th class="text-center">Grad</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $timovi = $db->rawQuery("select * from tim t join grad g on t.gradID=g.id" . $orderBy);
                $brojac = 0;
                foreach ($timovi as $tim) {
                  ?>
                    <tr>
                        <td><?php echo (++$brojac); ?></td>
                        <td><?php echo ($tim["nazivTima"]); ?></td>
                        <td><?php echo ($tim["brojIgraca"]); ?></td>
                        <td><?php echo ($tim["naziv"]); ?></td>
                    </tr>
                  <?php

                }
                ?>
              </tbody>
            </table>
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