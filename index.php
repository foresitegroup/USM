<?php
$BodyStyle = "home";
include "header.php";
?>

<div class="video-banner">
  <div class="site-width home-menu">
    <a href="#">CONTACT</a> &nbsp; | &nbsp; 414-123-4567
  </div>

  <video playsinline autoplay muted loop poster="video/home-banner.jpg">
    <source src="video/home-banner.mp4" type="video/mp4">
  </video>

  <div class="video-text">
    &ldquo;THE FUTURE OF USM IS NOW IN OUR HANDS.&rdquo;
  </div>

  <img src="images/home-video-triangle.png" alt="" class="video-triangle">
  <img src="images/logo-badge.png" alt="" class="video-badge">
</div>

<?php
include_once "inc/dbconfig.php";

$result = $mysqli->query("SELECT * FROM goals");
while($rows = $result->fetch_array(MYSQLI_ASSOC)) {
  $row[$rows['name']] = $rows;
}

$CapitalRaised = $row['capital']['raised'];
$CapitalGoal = $row['capital']['goal'];
$CapitalPercent = number_format(($CapitalRaised/$CapitalGoal) * 100);
$EndowmentRaised = $row['endowment']['raised'];
$EndowmentGoal = $row['endowment']['goal'];
$EndowmentPercent = number_format(($EndowmentRaised/$EndowmentGoal) * 100);
$USMRaised = $row['usm']['raised'];
$USMGoal = $row['usm']['goal'];
$USMPercent = number_format(($USMRaised/$USMGoal) * 100);
$TotalRaised = $CapitalRaised + $EndowmentRaised + $USMRaised;
$TotalGoal = $CapitalGoal + $EndowmentGoal + $USMGoal;
$TotalPercent = number_format(($TotalRaised/$TotalGoal) * 100);

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

<div class="home-progress">
  OUR PROGRESS SINCE 2017, TOGETHER WE'VE RAISED:

  <div id="total-raised"><noscript>$<?php echo number_format($TotalRaised); ?></noscript></div>

  <div id="total-raised-bar"></div>

  OF OUR CAMPAIGN GOAL OF $<?php echo number_format($TotalGoal); ?>:

  <div class="site-width">
    <div class="one-third">
      <div class="circle">
        <div id="capital-circle" class="preload"></div>

        <div class="circle-text">
          Capital
          <div id="capital-percent"><?php echo $CapitalPercent . "%"; ?></div>
        </div>
      </div>

      <div id="capital-raised"><noscript>$<?php echo number_format($CapitalRaised); ?></noscript></div>
      <div class="goal">Goal: $<?php echo nice_number($CapitalGoal); ?></div>
      The Commons, Performing Arts Center, Innovation Center &amp; Community room.<br>
      <br>

      <a href="#">LEARN MORE</a>
    </div>

    <div class="one-third">
      <div class="circle">
        <div id="endowment-circle" class="preload"></div>

        <div class="circle-text">
          Endowment
          <div id="endowment-percent"><noscript><?php echo $EndowmentPercent . "%"; ?></noscript></div>
        </div>
      </div>

      <div id="endowment-raised"><noscript>$<?php echo number_format($EndowmentRaised); ?></noscript></div>
      <div class="goal">Goal: $<?php echo nice_number($EndowmentGoal); ?></div>
      Faculty Compensation and Innovative Teaching, Experimental Learning and Global Education, Scholarships and Financial Aid.

      <a href="#">LEARN MORE</a>
    </div>

    <div class="one-third">
      <div class="circle">
        <div id="usm-circle" class="preload"></div>

        <div class="circle-text">
          USM Fund
          <div id="usm-percent"><?php echo $USMPercent . "%"; ?></div>
        </div>
      </div>

      <div id="usm-raised"><noscript>$<?php echo number_format($USMRaised); ?></noscript></div>
      <div class="goal">Goal: $<?php echo nice_number($USMGoal); ?> (Over 5 Years)</div>
      Annual Giving Program for Continued Excellence.<br>
      <br>

      <a href="#">LEARN MORE</a>
    </div>
  </div>
</div>

<script type="text/javascript" src="inc/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="inc/jqmeter.min.js"></script>
<script type="text/javascript" src="inc/countUp.min.js"></script>
<script type="text/javascript" src="inc/circle-progress.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(".video-badge").waypoint(function(direction) {
      $(".home .sticky-header").toggleClass("sticky", direction == "down");
    });

    $(".home-progress").waypoint(function() {
      totalRaised.start();

      $('#total-raised-bar').jQMeter({
        goal: '<?php echo $TotalGoal; ?>',
        raised: '<?php echo $TotalRaised; ?>',
        height: '12px',
        bgColor: '#D7D7D7',
        barColor: '#00CCCC'
      });

      setTimeout(function(){
        if (<?php echo $TotalPercent; ?> == 100) {
          $('.inner-therm').addClass("hundred");
          $('.inner-therm span').css("right", "0");
        }
      }, 2000);

      this.destroy();
    },{offset: '75%'});
    
    $(".home-progress .site-width").waypoint(function() {
      $(".home-progress .one-third .circle .preload").removeClass("preload");

      $('#capital-circle').circleProgress({
        value: 0.<?php echo $CapitalPercent; ?>, fill: '#A1B434', size: $('.home-progress .one-third').width(),
        emptyFill: '#D7D7D7', startAngle: 0, thickness: 15, animation: { duration: 2000 }
      });

      $('#endowment-circle').circleProgress({
        value: 0.<?php echo $EndowmentPercent; ?>, fill: '#EDA50B', size: $('.home-progress .one-third').width(),
        emptyFill: '#D7D7D7', startAngle: 0, thickness: 15, animation: { duration: 2000 }
      });

      $('#usm-circle').circleProgress({
        value: 0.<?php echo $USMPercent; ?>, fill: '#003366', size: $('.home-progress .one-third').width(),
        emptyFill: '#D7D7D7', startAngle: 0, thickness: 15, animation: { duration: 2000 }
      });

      capitalPercent.start();
      endowmentPercent.start();
      usmPercent.start();
      capitalRaised.start();
      endowmentRaised.start();
      usmRaised.start();

      this.destroy();
    },{offset: '65%'});
  });

  var opt1 = { prefix: '$' };
  var opt2 = { suffix: '%' };

  var totalRaised = new CountUp("total-raised", 0, <?php echo $TotalRaised; ?>, 0, 2, opt1);

  var capitalPercent = new CountUp("capital-percent", 0, <?php echo $CapitalPercent; ?>, 0, 2, opt2);
  var endowmentPercent = new CountUp("endowment-percent", 0, <?php echo $EndowmentPercent; ?>, 0, 2, opt2);
  var usmPercent = new CountUp("usm-percent", 0, <?php echo $USMPercent; ?>, 0, 2, opt2);

  var capitalRaised = new CountUp("capital-raised", 0, <?php echo $CapitalRaised; ?>, 0, 2, opt1);
  var endowmentRaised = new CountUp("endowment-raised", 0, <?php echo $EndowmentRaised; ?>, 0, 2, opt1);
  var usmRaised = new CountUp("usm-raised", 0, <?php echo $USMRaised; ?>, 0, 2, opt1);
</script>

<div class="site-width">
  <h1>Content (H1)</h1>

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