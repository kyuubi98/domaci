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
            <p><a href="noviMec.php" class="btn btn-danger btn-lg">Novi meč <i class="fa fa-plus"></i></a>
            <a href="izmenaNaziva.php" class="btn btn-danger btn-lg">Izmena naziva <i class="fa fa-refresh"></i></a>

          </p>
            <hr class="bottom-line">


            <select id="timoviSelect" class="form-control" onchange="popuniTabelu()">
              <option value="0">----SVI MEČEVI----</option>
              <?php
                   //ako je vrednost nula, onda prikazuje sve timove; ako nije, onda prikazuje tim koji smo selektovali 

              $timovi = $db->get('tim');
              foreach ($timovi as $t) {
                ?>
                        <option value="<?php echo ($t['timID']); ?>"><?php echo ($t['nazivTima']); ?></option>
                      <?php

                    }
                    ?>
            </select>
            <div id="tabela"></div>
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
    <script>

      		function popuniTabelu(){

            var timID = $("#timoviSelect").val();
            
      			$.ajax({
      				url: "podaciSearch.php",
      				data: "id="+timID,
      				success: function(result){


      				var text = '<table class="table table-hover"><thead><tr><th>Meč</th><th>Rezultat</th><th>Grad</th><th>Brisanje</th></tr></thead><tbody>';

      				$.each($.parseJSON(result), function(i, val) {
                text += 
                `
                <tr class="text-left">
      					  <td>${val.domacin} - ${val.gost}</td>
      					  <td>${val.setovaDomacin} : ${val.setovaGost}</td>
      					  <td>${val.grad}</td>
      					  <td><a href="obrisi.php?id=${val.mecID}">Obrisi</a></td>
                </tr>
                `;
      					});

      					text+='</tbody></table>';
                
                document.getElementById('tabela').innerHTML = text;
      			}});
      		}

      </script>
      <script>
      		$( document ).ready(function() {
      			popuniTabelu();
      		});
      </script>
  </body>
</html>