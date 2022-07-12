<?php
include 'inicijalizacija.php';
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
            <h2>Timovi superlige</h2>

            <hr class="bottom-line">
            <table class="table table-hover" >
              <thead>
                <tr >
                  <th class="text-center">Redni broj</th>
                  <th class="text-center">Naziv tima</th>
                  <th class="text-center">Broj utakmica</th>
                  <th class="text-center">Pobede</th>
                  <th class="text-center">Porazi</th>
                  <th class="text-center">Pobednički setovi</th>
                  <th class="text-center">Izgubljeni setovi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $timovi = $db->rawQuery("select * from tabela m join tim t on m.timID=t.timID join grad g on t.gradID=g.id order by m.setovaDatih desc");
                   //var_dump($timovi);
                $brojac = 0;
                foreach ($timovi as $tim) {
                  $brojac++;
                  ?>
                        <tr>                      
                              <td><?php echo ($brojac); ?></td>
                              <td><?php echo ($tim["nazivTima"]); ?></td>
                              <td><?php echo ($tim["ukupnoUtakmica"]); ?></td>
                              <td><?php echo ($tim["pobeda"]); ?></td>
                              <td><?php echo ($tim["poraza"]); ?></td>
                              <td><?php echo ($tim["setovaDatih"]); ?></td>
                              <td><?php echo ($tim["setovaPrimljenih"]); ?></td>
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
