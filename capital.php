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
  <div class="goals-two-col cf">
    <div class="goals-two-col-text">
      <h3>The Commons</h3>

      The feeling of community is everywhere &mdash; in our hallways, classrooms, and advising groups, on our athletic fields, in the smiles of our youngest students, and in the memories of our oldest alumni.  Ask our teachers, students, parents, and alumni about their USM experiences, and inevitably they mention "community," the defining attribute of our School.<br>
      <br>

      And yet the School is without a true center for campus life, a gathering place much like those now found at our peer independent schools and on college campuses across the country.<br>
      <br>

      <a href="#" class="button">GIVING OPPORTUNITIES</a>
    </div>

    <div class="goals-two-col-images">
      <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="image1 swipebox-video overlay" rel="commons"><img src="images/commons1.jpg" alt=""><div class="play-text"><div class="play"></div><br>PLAY FLY-THROUGH</div></a>
      <img src="images/commons2.jpg" alt="" class="image2">
      <img src="images/commons3.jpg" alt="" class="image3">
    </div>
  </div>

  <div class="goals-cols">
    <div class="one-fourth">
      A new Commons will enhance USM's ability to promote our core belief in the power of community and of lasting relationships &mdash; and allow us to strengthen our traditional cultural touchstones.
    </div>

    <div class="one-fourth">
      A new Commons will preserve and enrich our tradition of students dining with faculty. It will offer an atmosphere and space more conducive to fostering conversations, connections, and mentoring relationships.
    </div>

    <div class="one-fourth">
      The Commons will offer flexible-use areas for presentations, intimate gatherings, studying, and collaborative learning. It will also provide room for House meetings; in essence, a space to be used throughout the day.
    </div>

    <div class="one-fourth">
      A new lobby for the Upper School, with an elevator and separate entrance, will allow us to host off-hours events in the Commons for alumni, parents, and the community.
    </div>

    <br><br>

    <link rel="stylesheet" href="inc/slick/slick.css">
    <script type="text/javascript" src="inc/slick/slick.min.js"></script>
    <script type="text/javascript" src="inc/slick/slick.init.goals-slider.js"></script>

    <div class="goals-slider">
      <img src="images/commons-slide1.jpg" alt="">
      <img src="images/commons-slide2.jpg" alt="">
      <img src="images/commons-slide3.jpg" alt="">
      <img src="images/commons-slide4.jpg" alt="">
    </div>
  </div>
</div>

<hr>

<div class="site-width">
  <div class="goals-two-col cf text-first">
    <div class="goals-two-col-text">
      <h3>Performing Arts Center</h3>

      The performing arts are an essential part of the student experience at USM, from the first note heard in a preschool music class to the final bow taken on stage in the Virginia Henes Young Theatre.<br>
      <br>

      Our collaborative arts programs&mdash;including the visual arts, drama, music, and dance&mdash;provide amazing opportunities for students to discover a passion and to hone an artistic skill. These arts experiences lead to success in other areas of life as students learn self-discipline, collaboration, problem solving, and public speaking.<br>
      <br>

      Whether it is by picking up a paintbrush, a camera, a musical instrument or a script, our students are pushing themselves to new levels of achievement through the arts. The quality of USM's superb arts programs must be matched by the quality of our facilities.<br>
      <br>

      Our theatre was built in 1985 when USM consolidated its two campuses, and is now in need of enhancement. <br>
      <br>

      <a href="#" class="button">GIVING OPPORTUNITIES</a>
    </div>

    <div class="goals-two-col-images">
      <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="image1 swipebox-video overlay" rel="pac"><img src="images/pac1.jpg" alt=""><div class="play-text"><div class="play"></div><br>PLAY FLY-THROUGH</div></a>
      <img src="images/pac2.jpg" alt="" class="image2">
      <img src="images/pac3.jpg" alt="" class="image3">
    </div>
  </div>

  <div class="goals-cols">
    <div class="one-third">
      Theatre additions will include new and larger dressing rooms, ample storage, new restrooms, and rehearsal spaces for our band and orchestra.
    </div>

    <div class="one-third">
      Additional seating will provide needed space for our large audiences and allow all students and faculty in an individual division to sit together for assemblies, including presentations by guest speakers and Senior Speeches.
    </div>

    <div class="one-third">
      We will transform the theatre lobby into a dynamic hub, showcasing the arts at USM. It will include a large art gallery as well as collaboration zones: flexible spaces for small group rehearsals, impromptu performances, and revolving art installations.
    </div>

    <br><br>

    <div class="goals-slider">
      <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="image1 swipebox-video" rel="pac-slide1"><img src="images/pac-slide1.jpg" alt=""><div class="play-text"><div class="play"></div><br>PLAY VIDEO</div></a>
      <img src="images/pac-slide2.jpg" alt="">
      <img src="images/pac-slide3.jpg" alt="">
      <img src="images/pac-slide4.jpg" alt="">
    </div>
  </div>
</div>

<hr>

<div class="site-width">
  <div class="goals-two-col cf">
    <div class="goals-two-col-text">
      <h3>Innovation Center</h3>

      Terrific ideas often start with a spark, and not always a textbook. Real-world innovation requires the kind of intellectual horsepower that comes from roll-up-your-sleeves curiosity.<br>
      <br>

      The world and the workplace are looking for the solvers and the doers--the bold thinkers who seize a "eureka" moment by taking vision to prototype and making it into something great. Colleges are looking for these kinds of students as well.<br>
      <br>

      At USM, we are committed to fostering a culture of discovery and inquiry. Our students are equipped and inspired to solve real-world problems and to build skills that are both meaningful and marketable. We believe that our innovative programs and talented faculty provide our students with the entrepreneurial edge they will need in their future careers.<br>
      <br>

      Our new Innovation Center will serve as a central hub of experiential, technology-based experimentation and learning. Demand and interest are high. The current innovation spaces&mdash;House of Technology, Nerdvana, and Wildcat Creation Station&mdash;are utilized at full capacity by students in all three divisions. <br>
      <br>

      <a href="#" class="button">GIVING OPPORTUNITIES</a>
    </div>

    <div class="goals-two-col-images">
      <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="image1 swipebox-video overlay" rel="innovation"><img src="images/innovation1.jpg" alt=""><div class="play-text"><div class="play"></div><br>PLAY FLY-THROUGH</div></a>
      <img src="images/innovation2.jpg" alt="" class="image2">
      <img src="images/innovation3.jpg" alt="" class="image3">
    </div>
  </div>

  <div class="goals-cols">
    <div class="one-third">
      Large, flexible space and highly adaptable work stations will facilitate collaboration, team projects, and free-form experimentation.
    </div>

    <div class="one-third">
      Tools and technology will include laser cutters, 3D printers, and other equipment for interest- powered and production-centered learning.
    </div>

    <div class="one-third">
      The Innovation Center will support USM's independent and collaborative study programs, such as Compass 9, that engage students in longer-term, inquiry-based projects and ultimately set them apart in their readiness for college and beyond.
    </div>

    <br><br>

    <div class="goals-slider">
      <img src="images/innovation-slide1.jpg" alt="">
      <img src="images/innovation-slide2.jpg" alt="">
      <img src="images/innovation-slide3.jpg" alt="">
      <img src="images/innovation-slide4.jpg" alt="">
    </div>
  </div>
</div>

<hr>

<div class="site-width">
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