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

<link rel="stylesheet" href="inc/swipebox/swipebox.css">
<script type="text/javascript" src="inc/swipebox/jquery.swipebox.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(".swipebox-video").swipebox({autoplayVideos: true});
  });
</script>

<div id="home-campaign">
  <div class="site-width">
    <div class="campaign-text">
      <h2>Our Common Bond Campaign</h2>

      For generations, University School of Milwaukee has served as a pillar of academic excellence, built on the heritage of our predecessor schools that include Milwaukee Country Day School, Milwaukee Downer Seminary, and Milwaukee University School.<br>
      <br>

      It is with confidence and pride that we now launch Our Common Bond: The Campaign for University School of Milwaukee, seeking funding that will enhance critical areas of School life and provide us with the ability to "think big" across our curriculum.<br>
      <br>

      <a href="#" class="more">LEARN MORE</a>
    </div>

    <div class="campaign-images">
      <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="image1 swipebox-video" rel="home-campaign"><img src="images/home-campaign1.jpg" alt=""><div class="play"></div></a>
      <img src="images/home-campaign2.jpg" alt="" class="image2">
      <img src="images/home-campaign3.jpg" alt="" class="image3">
    </div>
  </div>
</div>

<div class="site-width">
  <link rel="stylesheet" href="inc/slick/slick.css">
  <script type="text/javascript" src="inc/slick/slick.min.js"></script>
  <script type="text/javascript" src="inc/slick/slick.init.home-slider.js"></script>
  <script type="text/javascript" src="inc/slick/slick.init.home-slider-inner.js"></script>

  <div class="home-slider">
    <div class="cf">
      <div class="home-slider-text">
        <h2>Capital</h2>
        Our capital projects will yield significant academic returns and long-lasting value to the School, while extending the spirit of community so central to our mission. It is critical that our facilities continue to set USM apart.<br>
        <br>

        <a href="#" class="more">LEARN MORE</a>
      </div>
      
      <div class="home-slider-inner">
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="swipebox-video" rel="cap1"><img src="images/home-slider-cap1.jpg" alt=""><div class="play"></div></a>

        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="swipebox-video" rel="cap2"><img src="images/home-slider-cap2.jpg" alt=""><div class="play"></div></a>

        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="swipebox-video" rel="cap3"><img src="images/home-slider-cap3.jpg" alt=""><div class="play"></div></a>

        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="swipebox-video" rel="cap4"><img src="images/home-slider-cap4.jpg" alt=""><div class="play"></div></a>
      </div>
    </div>

    <div>
      <div class="home-slider-text">
        <h2>Endowment</h2>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac ultrices ligula, quis bibendum arcu. Maecenas fringilla felis in tempor fermentum. Sed eleifend elit et nunc consectetur dictum. Vivamus ullamcorper nisi leo.<br>
        <br>

        <a href="#" class="more">LEARN MORE</a>
      </div>
      
      <div class="home-slider-inner">
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="swipebox-video" rel="end1"><img src="images/home-slider-end1.jpg" alt=""><div class="play"></div></a>

        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="swipebox-video" rel="end2"><img src="images/home-slider-end2.jpg" alt=""><div class="play"></div></a>

        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="swipebox-video" rel="end3"><img src="images/home-slider-end3.jpg" alt=""><div class="play"></div></a>

        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="swipebox-video" rel="end4"><img src="images/home-slider-end4.jpg" alt=""><div class="play"></div></a>
      </div>
    </div>

    <div>
      <div class="home-slider-text">
        <h2>USM Fund</h2>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur nunc in dignissim viverra. Suspendisse iaculis nisl vitae tempus suscipit. Mauris feugiat viverra vestibulum. Phasellus interdum elit tortor.<br>
        <br>

        <a href="#" class="more">LEARN MORE</a>
      </div>
      
      <div class="home-slider-inner">
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="swipebox-video" rel="usm1"><img src="images/home-slider-usm1.jpg" alt=""><div class="play"></div></a>

        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="swipebox-video" rel="usm2"><img src="images/home-slider-usm2.jpg" alt=""><div class="play"></div></a>

        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="swipebox-video" rel="usm3"><img src="images/home-slider-usm3.jpg" alt=""><div class="play"></div></a>

        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="swipebox-video" rel="usm4"><img src="images/home-slider-usm4.jpg" alt=""><div class="play"></div></a>
      </div>
    </div>
  </div>
</div>

<div id="home-stories">
  STORIES
</div>

<div id="timeline" class="site-width">
  CAMPAIGN TIMELINE
</div>

<?php include "footer.php"; ?>