<?php /* Template Name: Calendar */ ?>
<?php get_header();
    $json = wscs_fetch_gcal_events( 2, true );
?>
<head>
<title>Calendar</title>
</head>
<main>
<div class="jumbotron" style="background-image: url(https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/04/2015SistersatRazzy.jpg); background-position: 50% 40%">
  <div class="overlay">
    <h2>Calendar</h2>
  </div>
</div>

<div class="container">
<center><h1 style = "margin-bottom: 10px;">Upcoming Events</h1></center>
  <div class="row events-row">
<div class="col s12 m12 l6 events-col">
    <?php
    if ( ! $json || empty( $json["items"] ) ) {
        echo 'No upcoming events scheduled at this time. Check back again later!';
    } else {
            usort($json["items"], function($a, $b) {
              $dateStringA = isset($a["start"]["date"]) ? $a["start"]["date"] : $a["start"]["dateTime"];
              $dateStringB = isset($b["start"]["date"]) ? $b["start"]["date"] : $b["start"]["dateTime"];
              return strtotime($dateStringA) - strtotime($dateStringB);
            });

    	      foreach ($json["items"] as $event) {
	        		$dateString = isset($event["start"]["date"]) ? $event["start"]["date"] : $event["start"]["dateTime"];
	        		$date = date_create($dateString);
	        		$formattedDate = date_format($date,"M j");
              $formattedTime = date_format($date, "h:iA");
	        		echo
	        			'<div class="row"><div class="event-hexa"><div class="hex-overlay"><h1>' . esc_html( $formattedDate ) . '</h1></div></div>
                 <div class="event-heading" style="padding-left: 220px"><h3>' . esc_html( $event["summary"] ) . '</h3>
                 <p>' . esc_html( $event["location"] ) . '
                 <br>'  . esc_html( $formattedTime ) . '</p></div></div>';

              }
    }
?>
	<a href="https://calendar.google.com/calendar/b/2?cid=d29tZW4uYXQuc2NzQGdtYWlsLmNvbQ"><div class="overlay" style="background: #7C5567; float: right; position: inherit; width: max-content; padding: 10px;"><b style="color: white">Our Calendar</b></div></a>


  </div>


  <div class="col l6 hide-on-small" style="padding:5%">
    <a href="https://www.women.cs.cmu.edu/test-site/photo-gallery/"><img src="https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2017/11/20171002_195419-800x600-640x480_c.jpg" width="100%"/></a>
  </div>
  </div>
  </div>


<div class="section">
<div class="container">
<center><h1>General Events</h1></center>
<br>
	<div class="row"  style = "margin-right: 0px; margin-left: 0px;">
	<div class="column-events">
		<h3>Biweekly Women@SCS Meetings</h3>
		<p>Women@SCS has general body meetings every other week on Mondays at Gates 8115. Everyone is welcome, so please stop by to learn more about our mission, what events we will be planning for the month, and more!</p>
		<center><img class="hex" src="<?php echo get_template_directory_uri() . '/img/hex1.png';?>" /></center>
		<h3>Tech Nights</h3>
		<p>Tech Nights is an outreach program run by Women@SCS that has workshops for middle school girls every Tuesday in the fall or spring. You can learn more <a href="https://www.women.cs.cmu.edu/test-site/outreach/">here</a> if you're a student looking to join the program, or if you want to volunteer to help with a workshop!</p>
	</div>
	<div class="column-events">
		<h3>Biweekly SCS4ALL Meetings</h3>
		<p>On the weeks alternating Women@SCS meetings, our partner organization SCS4All has its meetings in the same room (Gates 8115). SCS4All often organizes different events and activities, so please drop by to learn more about what they're doing!</p>
		<center><img class="hex" src="<?php echo get_template_directory_uri() . '/img/hex3.png';    ?>" /></center>
		<h3>Other Events</h3>
		<p>We regularly have other events scheduled, whether it's a student-faculty lunch, an alumnae panel, or a talk given by upperclassmen. You can find these events scheduled in our calendar above!</p>
	</div>
	</div>
</div>
</div>
</main>

<?php get_footer(); ?>
