<?php
$PageTitle = "Capital";
$BodyStyle = "capital-page";
include "header.php";
?>

<div class="site-width-small goals-menu">
  <ul>
    <li class="current"><a href="capital.php">CAPITAL</a></li>
    <li><a href="endowment.php">ENDOWMENT</a></li>
    <li><a href="usm-fund.php">USM FUND</a></li>
  </ul>
</div>

<div class="goal-header">
  <div class="site-width">
    <div class="goal-text">
      <h2>Capital Projects</h2>

      Our capital projects will yield significant academic returns and long-lasting value to the School, while extending the spirit of community so central to our mission. It is critical that our facilities continue to set USM apart.<br>
      <br>

      <span class="greentext">Projects include:</span> The Commons, Performing Arts Center, Innovation Center and Lee Community Room.<br>
      <br>

      <div class="button">CAPITAL PROJECTS <i class="fa fa-chevron-down" aria-hidden="true"></i></div>
    </div>
  </div>

  <div class="goal-meter">
    <?php
    include_once "inc/dbconfig.php";

    $result = $mysqli->query("SELECT * FROM goals WHERE name = 'capital'");
    $row = $result->fetch_array(MYSQLI_ASSOC);

    $Raised = $row['raised'];
    $Goal = $row['goal'];
    $Percent = number_format(($Raised/$Goal) * 100);

    function nice_number($num) {
      if ($num < 1000) {
        $num_format = number_format($num);
      } elseif ($num < 1000000) {
        $num_format = number_format($num / 1000) . " Thousand";
      } else {
        $num_format = number_format($num / 1000000) . " Million";
      }

      return $num_format;
    }
    ?>
    <div class="circle">
      <div id="capital-circle"></div>

      <div class="circle-text">
        Capital
        <div id="capital-percent"><?php echo $Percent . "%"; ?></div>
      </div>
    </div>

    <div id="capital-raised"><noscript>$<?php echo number_format($Raised); ?></noscript></div>
    <div class="goal">Goal: $<?php echo nice_number($Goal); ?></div>

    <script type="text/javascript" src="inc/countUp.min.js"></script>
    <script type="text/javascript" src="inc/circle-progress.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#capital-circle').circleProgress({
          value: 0.<?php echo $Percent; ?>, fill: '#A1B434', size: $('.goal-meter .circle').width(),
          emptyFill: '#D7D7D7', startAngle: 0, thickness: 21, animation: { duration: 2000 }
        });
      });

      var Percent = new CountUp("capital-percent", 0, <?php echo $Percent; ?>, 0, 2, {suffix: '%'});
      var Raised = new CountUp("capital-raised", 0, <?php echo $Raised; ?>, 0, 2, {prefix: '$'});
      Percent.start();
      Raised.start();
    </script>
  </div>
</div>

<div class="site-width">
  <div class="commons cf">
    <div class="commons-text">
      <h3>The Commons</h3>

      The feeling of community is everywhere &mdash; in our hallways, classrooms, and advising groups, on our athletic fields, in the smiles of our youngest students, and in the memories of our oldest alumni.  Ask our teachers, students, parents, and alumni about their USM experiences, and inevitably they mention "community," the defining attribute of our School.<br>
      <br>

      And yet the School is without a true center for campus life, a gathering place much like those now found at our peer independent schools and on college campuses across the country.<br>
      <br>

      <a href="#" class="button">GIVING OPPORTUNITIES</a>
    </div>

    <div class="commons-images">
      <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="image1 swipebox-video" rel="commons"><img src="images/commons1.jpg" alt=""><div class="play"></div></a>
      <img src="images/commons2.jpg" alt="" class="image2">
      <img src="images/commons3.jpg" alt="" class="image3">
    </div>
  </div>

  Bacon ipsum dolor sit amet sausage bacon biltong, salami drumstick hamburger ham hock. Filet mignon ribeye meatball flank tri-tip tongue boudin, doner pig tenderloin. Beef cow turducken pork belly. Corned beef andouille short loin spare ribs. Short ribs frankfurter pig beef ribs. Sausage salami kielbasa cow jowl. Pork ribeye sirloin sausage bacon ham swine turkey biltong tenderloin boudin beef ribs pig hamburger.<br>
  <br>

  Pig shankle andouille venison ham frankfurter strip steak ham hock, swine jerky ball tip flank hamburger. Leberkas cow short loin capicola ham hock bresaola. Pig beef ribs salami shankle, ham hock shank flank kielbasa sausage hamburger tenderloin. Salami shankle prosciutto sausage pork chop tri-tip. Short loin shankle tail capicola bresaola chuck drumstick pork belly t-bone shoulder hamburger salami corned beef leberkas meatloaf. Corned beef t-bone drumstick jowl shoulder brisket sirloin meatball turkey.<br>
  <br>

  Bacon sirloin jowl tail pork loin corned beef sausage ribeye rump. Pork chop spare ribs turkey andouille strip steak. Venison pig bresaola ground round. Leberkas frankfurter pastrami prosciutto bresaola jowl.<br>
  <br>

  Bacon ipsum dolor sit amet sausage bacon biltong, salami drumstick hamburger ham hock. Filet mignon ribeye meatball flank tri-tip tongue boudin, doner pig tenderloin. Beef cow turducken pork belly. Corned beef andouille short loin spare ribs. Short ribs frankfurter pig beef ribs. Sausage salami kielbasa cow jowl. Pork ribeye sirloin sausage bacon ham swine turkey biltong tenderloin boudin beef ribs pig hamburger.<br>
  <br>

  Pig shankle andouille venison ham frankfurter strip steak ham hock, swine jerky ball tip flank hamburger. Leberkas cow short loin capicola ham hock bresaola. Pig beef ribs salami shankle, ham hock shank flank kielbasa sausage hamburger tenderloin. Salami shankle prosciutto sausage pork chop tri-tip. Short loin shankle tail capicola bresaola chuck drumstick pork belly t-bone shoulder hamburger salami corned beef leberkas meatloaf. Corned beef t-bone drumstick jowl shoulder brisket sirloin meatball turkey.<br>
  <br>

  Bacon sirloin jowl tail pork loin corned beef sausage ribeye rump. Pork chop spare ribs turkey andouille strip steak. Venison pig bresaola ground round. Leberkas frankfurter pastrami prosciutto bresaola jowl.<br>
  <br>

  Bacon ipsum dolor sit amet sausage bacon biltong, salami drumstick hamburger ham hock. Filet mignon ribeye meatball flank tri-tip tongue boudin, doner pig tenderloin. Beef cow turducken pork belly. Corned beef andouille short loin spare ribs. Short ribs frankfurter pig beef ribs. Sausage salami kielbasa cow jowl. Pork ribeye sirloin sausage bacon ham swine turkey biltong tenderloin boudin beef ribs pig hamburger.<br>
  <br>

  Pig shankle andouille venison ham frankfurter strip steak ham hock, swine jerky ball tip flank hamburger. Leberkas cow short loin capicola ham hock bresaola. Pig beef ribs salami shankle, ham hock shank flank kielbasa sausage hamburger tenderloin. Salami shankle prosciutto sausage pork chop tri-tip. Short loin shankle tail capicola bresaola chuck drumstick pork belly t-bone shoulder hamburger salami corned beef leberkas meatloaf. Corned beef t-bone drumstick jowl shoulder brisket sirloin meatball turkey.<br>
  <br>

  Bacon sirloin jowl tail pork loin corned beef sausage ribeye rump. Pork chop spare ribs turkey andouille strip steak. Venison pig bresaola ground round. Leberkas frankfurter pastrami prosciutto bresaola jowl.<br>
  <br>

  Bacon ipsum dolor sit amet sausage bacon biltong, salami drumstick hamburger ham hock. Filet mignon ribeye meatball flank tri-tip tongue boudin, doner pig tenderloin. Beef cow turducken pork belly. Corned beef andouille short loin spare ribs. Short ribs frankfurter pig beef ribs. Sausage salami kielbasa cow jowl. Pork ribeye sirloin sausage bacon ham swine turkey biltong tenderloin boudin beef ribs pig hamburger.<br>
  <br>

  Pig shankle andouille venison ham frankfurter strip steak ham hock, swine jerky ball tip flank hamburger. Leberkas cow short loin capicola ham hock bresaola. Pig beef ribs salami shankle, ham hock shank flank kielbasa sausage hamburger tenderloin. Salami shankle prosciutto sausage pork chop tri-tip. Short loin shankle tail capicola bresaola chuck drumstick pork belly t-bone shoulder hamburger salami corned beef leberkas meatloaf. Corned beef t-bone drumstick jowl shoulder brisket sirloin meatball turkey.<br>
  <br>

  Bacon sirloin jowl tail pork loin corned beef sausage ribeye rump. Pork chop spare ribs turkey andouille strip steak. Venison pig bresaola ground round. Leberkas frankfurter pastrami prosciutto bresaola jowl.
</div>

<?php include "footer.php"; ?>