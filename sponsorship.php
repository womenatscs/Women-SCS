<?php /* Template Name: Sponsorship */ ?>
<?php get_header();
    date_default_timezone_set('EST');
    $currentTime = date('c');
    $calendarApiUrl = wscs_get_calendar_api_url( 'women.at.scs@gmail.com', 2 );
    $calendarEventsRequest = $calendarApiUrl ? wp_remote_get( $calendarApiUrl . $currentTime ) : array();
    if ( is_array( $calendarEventsRequest ) ) {
        $calendarEvents = $calendarEventsRequest['body']; // use the content
    }
?>
<head>
<title>Sponsorship</title>
</head>
<main>
<div class="jumbotron" style="background-image: url(https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/10/IMG_0519.jpg); background-size: cover; background-position: center; position:relative; height:400px">
  <div class="overlay">
  <h2>Sponsorship</h2>
  </div>
</div>


<div class="container">
<div class="center">
  <h3><i>Women@SCS has a tradition of working closely with industry and research groups to both understand critical gender issues in professional settings, as well as exploring job opportunities for women in computing related domains. The School of Computer Science at Carnegie Mellon University welcomes industry sponsors to join us in supporting Women@SCS as we work to engage, and sustain a strong cohort of women in the field.</i></h3>
</div>
</div>

<div class="section">
  <div class="container">
    <h3>The three primary value propositions for sponsors are:</h3>
    <div class="sponsor-val">
      <img src='https://www.women.cs.cmu.edu/test-site/wp-content/themes/Women-SCS/img/hex1.png'>
      <p>Taking a high-profile leadership position in the global effort to recognize and encourage women in computer science</p>
    </div>

    <div class="sponsor-val">
      <img src='https://www.women.cs.cmu.edu/test-site/wp-content/themes/Women-SCS/img/hex2.png'>
      <p>Direct connection to a pool of top talent in the field, including access to student resumes (with their permission)</p>
    </div>
    <div class="sponsor-val">
      <img src='https://www.women.cs.cmu.edu/test-site/wp-content/themes/Women-SCS/img/hex3.png'>
      <p>Sending a strong message about diversity among your company values</p>
    </div>
  </div>
</div>
<div class="pattern">
<div class="container">
	<div class="center">
		<h1>Opportunities</h1>
		<br><br>
		<ul id="hexagons">
  <li>
    <div class="hex-container">
      <img src="https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2017/12/20170826_144013.jpg" alt="Orientation 2017"/>
        <div class="alum-name opp-name">Mentoring Programs</div>
    </div>
  </li>
  <li>
    <div class="hex-container">
      <img src="https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/04/2015SistersatRazzy.jpg" alt="Sisters Razzy Fresh event"/>
        <div class="alum-name opp-name">Social Programs
        </div>
    </div>
  </li>
  <li>
    <div class="hex-container">
      <img src="https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/10/ghc_carol.jpg" alt="Carol Frieze at Grace Hopper Conference 2017"/>
        <div class="alum-name opp-name">Conferences
        </div>
    </div>
  </li>

  <li class="pusher"></li>
  <li>
    <div class="hex-container">
      <img src="https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2015/02/panel_small.jpg" alt="Master's Student Panel"/>
        <div class="alum-name opp-name">Professional Events
        </div>
    </div>
  </li>
  <li>
    <div class="hex-container">
      <img src="https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/09/IMG_0866.jpg" alt="TechNights Workshop"/>
        <div class="alum-name opp-name">Outreach
        </div>
    </div>
  </li>
</ul>
		<div class="opps">
	<h2 class="center">If you're interested in sponsoring Women@SCS, please contact <a href="mailto:cfrieze@cs.cmu.edu">Carol Frieze</a>.</h2>
</div>
<div class="center"><h3>We would like to thank our current and previous industry sponsors!</h3>
  <div class="sponsors">
    <a href="https://www.google.com/"><img src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png"></a>
    <a href="http://www.predictivetechnologies.com/"><img src="https://www.predictivetechnologies.com/themes/custom/apt_theme/logo.svg"></a>
    <a href="https://www.capitalone.com/"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/Capital_One_logo.svg/1200px-Capital_One_logo.svg.png"></a>
    <a href="https://www.oracle.com/index.html"><img src="https://www.oracle.com/webfolder/s/brand/assets/i/specimens/identity/logo/primary-badge.gif"></a>
    <a href="https://twitter.com/"><img src="https://help.twitter.com/content/dam/help-twitter/big-bird-card.jpeg"></a>
    <a href="https://www.dropbox.com/?landing=dbv2"><img src="https://cfl.dropboxstatic.com/static/images/logo_catalog/dropbox_logo_glyph_2015_m1-vfleInWIl.svg"></a>
    <a href="https://www.microsoft.com/en-us/"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Microsoft_logo_%282012%29.svg/440px-Microsoft_logo_%282012%29.svg.png"></a>
    <a href="http://www.theharrisfoundation.org/"><img src="http://www.theharrisfoundation.org/images/logo_sub.jpg"></a>
    <a href="https://www.yahoo.com/"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Yahoo%21_logo.svg/512px-Yahoo%21_logo.svg.png"></a>
    <a href="https://www.facebook.com/"><img src="https://en.facebookbrand.com/wp-content/uploads/2016/05/flogo_rgb_hex-brc-site-250.png"></a>
    <a href="https://www.cisco.com/"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Cisco_logo.svg/800px-Cisco_logo.svg.png"></a>
    <a href="https://www.lockheedmartin.com/en-us/index.html"><img src="https://upload.wikimedia.org/wikipedia/en/thumb/9/95/Lockheed_Martin.svg/440px-Lockheed_Martin.svg.png"></a>
    <a href="http://www.boeing.com/"><img src="https://www.boeing.co.uk/resources/images/boeing_logo.png"></a>
    <a href="https://www.intuit.com/"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Intuit_Logo.svg/230px-Intuit_Logo.svg.png"></a>
    <a href="https://www.duolingo.com/"><img src="https://upload.wikimedia.org/wikipedia/en/thumb/c/cb/Duolingo_logo_with_owl.svg/447px-Duolingo_logo_with_owl.svg.png"></a>
</div>
</div>
</div>
</main>

<?php get_footer(); ?>
