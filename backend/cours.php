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
$matiere=@$_POST["matiere"];
$heure=@$_POST["heure"];
$jour=@$_POST["jour"];
$classe=@$_POST["classe"];
$mess='';
?>
<?php 
//enregistrement séance cours
if(isset($_POST['benrg'])&&!empty($matricule)&&!empty($matiere)
&&!empty($heure)&&!empty($jour)&&!empty($classe)){
 $sql=mysqli_query($conn,"insert into tb_cours (classe,matiere,Jour,heure,matricule_ens) values('$classe','$matiere','$jour','$heure','$matricule')");
if($sql){
 $mess="<b>Enregistrement éffectué avec succès !</b>";
 mysqli_query($conn,"update tb_cours set num_jour=1 where Jour='LUNDI'");
 mysqli_query($conn,"update tb_cours set num_jour=2 where Jour='MARDI'");
 mysqli_query($conn,"update tb_cours set num_jour=3 where Jour='MERCREDI'");
 mysqli_query($conn,"update tb_cours set num_jour=4 where Jour='JEUDI'");
 mysqli_query($conn,"update tb_cours set num_jour=5 where Jour='VENDREDI'");
 mysqli_query($conn,"update tb_cours set num_jour=6 where Jour='SAMEDI'");
}
else{
 $mess="<b>Erreur !</b>";
}

}

?>
<!-- Created by TopStyle Trial - www.topstyle4.com -->
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Education - List of Meetings</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">

    <link rel="stylesheet" type="text/css" href="mystyle.css">
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
          <h6>Here are our upcoming meetings</h6>
          <h2>Programme</h2>
        </div>
      </div>
    </div>

    
  </section>

  <section class="meetings-page" id="meetings">

<div align="center">
<br>
	<a href="index.php">ENREGISTREMENT DES ENSEIGNANTS</a><br><br>
	<a href="requetes.php">REQUETES</a>
<h2>Liste générale des enseignants</h2>
<?php 
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
<h2>Formulaire d'enregistrement des séances de cours</h2>
<form action="" method="POST" >
<fieldset>
	<legend> <font color="white">Séance</font></legend>
	<table>
	<tr><td><b><font color="white">Classe</font> </b></td><td><select name="classe" id="classe" >
     <option  value="<?php echo $classe; ?>"><?php echo $classe; ?></option>
         <option  value="6eme">6eme</option>
        <option  value="5eme">5eme</option>
        <option  value="4eme">4eme</option>
        <option  value="3eme">3eme</option>
        <option  value="2nde L">2nde L</option>
        <option  value="2nde S">2nde S</option>
        <option  value="1ere L">1ere L</option>
        <option  value="1ere S">1ere S</option>
        <option  value="TA">TA</option>
        <option  value="TD">TD</option>
        <option  value="TC">TC</option>
     </select></td></tr>
	<tr><td><b><font color="white">Matière</font> </b></td><td><input type="text" name="matiere" value=""></td></tr>
	<tr><td><b><font color="white">Jour</font> </b></td><td><select name="jour" id="jour" >
     <option  value="<?php echo $jour; ?>"><?php echo $jour; ?></option>
         <option  value="LUNDI">LUNDI</option>
        <option  value="MARDI">MARDI</option>
        <option  value="MERCREDI">MERCREDI</option>
        <option  value="JEUDI">JEUDI</option>
        <option  value="VENDREDI">VENDREDI</option>
        <option  value="SAMEDI">SAMEDI</option>
     </select></td></tr>
  <tr><td><b><font color="white">Heure</font> </b></td><td><select name="heure" id="heure" >
     <option  value="<?php echo $heure; ?>"><?php echo $heure; ?></option>
         <option  value="1ere et 2eme H">1ere et 2eme H</option>
        <option  value="3eme et 4eme H">3eme et 4eme H</option>
        <option  value="5eme et 6eme H">5eme et 6eme H</option>
        <option  value="1ere H">1ere H</option>
        <option  value="2eme H">2eme H</option>
        <option  value="3eme H">3eme H</option>
        <option  value="4eme H">4eme H</option>
        <option  value="5eme H">5eme H</option>
        <option  value="6eme H">6eme H</option>
        <option  value="2eme et 3eme H">2eme et 3eme H</option>
        <option  value="4eme et 5eme H">4eme et 5eme H</option>
     </select></td></tr>
  <tr><td><b><font color="white">Matricule enseignant</font> </b></td><td><input type="text" name="matricule" value=""></td></tr>
	<tr><td></td><td><input type="submit" name="benrg" value="ENREGISTRER" class="bouton"></td></tr>
	<tr><td></td><td><?php print $mess;?></td><td></td></tr>
	</table>
	</fieldset>
</form>
<?php 
print"<br><br>";
	//affichage liste séances cours
	$rq2=mysqli_query($conn,"select * from tb_cours order by id desc ");
	print'<table border="1" class="tab" ><tr><th>Classe</th><th>Matiere</th><th>Jour</th><th>Heure</th><th>Enseignant</th></tr>';
	while($rst2=mysqli_fetch_assoc($rq2)){
	  print"<tr>";
	         echo"<td>".$rst2['classe']."</td>";
	          echo"<td>".$rst2['matiere']."</td>";
	          echo"<td>".$rst2['Jour']."</td>";
	           echo"<td>".$rst2['heure']."</td>";
	           echo"<td>".$rst2['matricule_ens']."</td>";
	        
	         print"</tr>";
	}
		print'</table>';
	?>
</div>

<div class="footer">
      <p>Copyright © 2022 Edu Meeting Co., Ltd. All Rights Reserved.</p>
    </div>

  </section>
<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/isotope.js"></script>
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
</html>