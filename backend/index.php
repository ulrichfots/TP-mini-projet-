<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emploidutemps_db";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
} 

?>
<?php 
$matricule=@$_POST["matricule"];
$nom=@$_POST["nom"];
$contact=@$_POST["contact"];
$mess='';
?>
<?php 
//enregistrement enseignant
if(isset($_POST['benrg'])&&!empty($matricule)&&!empty($nom)&&!empty($contact)){
$sql=mysqli_query($conn,"insert into tb_enseignant(matricule,nom,contact) values('$matricule','$nom','$contact')");
 
if($sql){
 $mess="<b>Enregistrement �ffectu� avec succ�s !</b>";
}
else{
 $mess="<b>Erreur !</b>";
}

}

?>
<?php 
//modification enseignant
if(isset($_POST['bmodif'])&&!empty($matricule)&&!empty($nom)&&!empty($contact)){
 $sql=mysqli_query($conn,"update tb_enseignant set nom='$nom',contact='$contact' where matricule='$matricule'");
if($sql){
 $mess="<b>Modification �ffectu�e avec succ�s !</b>";
}
else{
 $mess="<b>Erreur !</b>";
}

}

?>
<?php 
//suppr�ssion enseignant
if(isset($_POST['bsupp'])&&!empty($matricule)){
 $sql=mysqli_query($conn,"delete from tb_enseignant where matricule='$matricule'");
if($sql){
 $mess="<b>Suppr�ssion �ffectu�e avec succ�s !</b>";
}
else{
 $mess="<b>Erreur !</b>";
}

}

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Education Template - Meeting Detail Page</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">

  </head>

<body>

   

  <!-- Sub Header -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <div class="left-content">
            <p>FJM</p>
          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="right-icons">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="index.html" class="logo">
                          Edu Meeting
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
					  <li><a href="../index.html" class="active">Home</a></li>
                        
                        <li class="scroll-to-section"><a href="../index.html/#apply">Appliquer maintenant</a></li>
                        <li class="has-sub">
                            <a href="javascript:void(0)">Pages</a>
                            <ul class="sub-menu">
							<li><a href="index.php">Authentification</a></li>
                              <li><a href="cours.php">Emploi du temps</a></li>
                              
                            </ul>
                        </li>
                        <li class="scroll-to-section"><a href="../index/#courses">Cours</a></li> 
                        <li class="scroll-to-section"><a href="../index/#contact">Contacter nous</a></li> 
                    </ul>       
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h6>Obtenez tous les détails</h6>
          <h2>Outils d'enseignement et d'apprentissage</h2>
        </div>
      </div>
    </div>
  </section>

  <section class="meetings-page" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-12">
              <div class="meeting-single-item">
                <div class="thumb">
                  <a href="meeting-details.html"><img src="assets/images/single-meeting.jpg" alt=""></a>
                </div>
                <div class="down-content">
      
                  <div align="center">
                    <br>
                    <a href="cours.php">ENREGISTREMENT DES SEANCES DE COURS</a><br><br>
                    <a href="requetes.php">REQUETES</a>
                    <h2>Formulaire d'enregistrement des enseignants</h2>
                    <form action="" method="POST">
                    <fieldset >
                    <legend >Enseignant</legend>
                    <table>
                    <tr><td><b>Matricule </b></td><td><input type="text" name="matricule" value=""></td></tr>
                    <tr><td><b>Nom </b></td><td><input type="text" name="nom" value=""></td></tr>
                    <tr><td><b>Contact </b></td><td><input type="text" name="contact" value=""></td></tr>
                    <tr><td></td><td><input type="submit" name="benrg" value="ENREGISTRER" class="bouton"></td></tr>
                     <tr><td></td><td><input type="submit" name="bmodif" value="MODIFIER" class="bouton"></td></tr>
                    <tr><td></td><td><input type="submit" name="bsupp" value="SUPPRIMER" class="bouton"></td></tr>
                    <tr><td></td><td><?php print $mess;?></td><td></td></tr>
                    </table>
                    </fieldset>
                    </form>
                    
                    <?php 
                    print"<br><br>";
                    //affichage liste enseignants
                    $rq1=mysqli_query($conn,"select * from tb_enseignant ");
                    print'<table border="1" class="tab"><tr><th>Matricule</th><th>Nom</th><th>Contact</th></tr>';
                    while($rst=mysqli_fetch_assoc($rq1)){
                      print"<tr>";
                             echo"<td>".$rst['matricule']."</td>";
                              echo"<td>".$rst['nom']."</td>";
                               echo"<td>".$rst['contact']."</td>";
                            
                             print"</tr>";
                    }
                      print'</table>';
                    ?>
                    </div>


                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <p>Copyright © 2022 Edu Meeting Co., Ltd. All Rights Reserved.</p>
    </div>
  </section>


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

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
</body>


  </body>

</html>
