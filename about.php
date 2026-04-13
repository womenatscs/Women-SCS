<?php /* Template Name: About */ ?>
<?php get_header();
    $calendarEvents = wscs_fetch_calendar_events( 2 );
?>
<head>
<title>About</title>
</head>
<main>
<div class="jumbotron" style="background-image: url(https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/11/20181105_164006.jpg); background-size: cover; position:relative; height:400px">
  <div class="overlay">
  <h2>About</h2>
  </div>
</div>


<div class="container">
<div class="center">
      <h3><i>Women@SCS' mission is to create, encourage, and support women's academic, social and professional opportunities in the computer sciences and to promote the breadth of the field and its diverse community.</i></h3>

</div>
</div>

<div class="section">
  <div class="container">
		<div class="center">
  		<h1>Our Committee</h1>
		<p>The Women@SCS Advisory Committee consists of undergraduate students, graduate students, and faculty within the School of Computer Science.</p><img class="hex" src="<?php echo get_template_directory_uri() . '/img/hex2.png';?>" /><br><p>Members of the Committee have initiated many programs, such as <a href="https://www.women.cs.cmu.edu/test-site/undergraduate-sisters-program/"> the Big/Little Sister program for undergraduates</a>, the Student-Faculty Lunch Series, and other social and academic events. Women@SCS also sponsors <a href="https://www.women.cs.cmu.edu/test-site/outreach/">outreach projects</a>, such as the Women@SCS Outreach Roadshow and TechNights, a free weekly series of workshops for middle school girls taught by our students.</p><img class="hex" src="<?php echo get_template_directory_uri() . '/img/hex1.png';?>" /><br><p> In general, the committee strives to promote a healthy and supportive community atmosphere for ALL. Making a difference and solving problems serve as the basic motivating purposes of the organization.</p>
    </div>
  </div>
</div>
<div class="pattern">
<div class="container">
	<div class="center">
		<h1>FAQ</h1>
	</div>
	<div class="row" style = "margin-right: 0px; margin-left: 0px;">
		<br><h5>How can schools get more women involved in CS-related activities?</h5>
		<p>Definitely publicize. Set up a distribution list (dlist) of all the women in the Computer Science department and send emails to inform them about the exciting activities you are planning! Ask other women in the department for their input on what activities to run so that more people are involved in the activity planning process.</p>
		<br><h5>How did you expand the size of your committee?</h5>
		<p>We opened up the Women@SCS committee to anyone who is dedicated to helping this program succeed, and just as importantly, to anyone who is committed to succeeding in the field of computer science. The commitment and success of the Women@SCS organization at CMU is a testimonial to the dedication and time that our members put forth for the group. As we’ve expanded our visibility to the community by sponsoring events on campus and organizing outreach programs such as the Roadshow, more and more people have decided to be a part of this team.</p>
		<br><h5>How does the Big Sister/Little Sister program work?</h5>
		<p>At the start of the academic year, we email all of the upperclassmen in the organization asking them if they want to mentor a freshman, as well as send out an interest form to the freshmen who would like to have a Women@SCS mentor for the year. We then match these mentors up with the interested freshmen based on common interests or hobbies. Join our mailing list and get notified the next time we do Big/Little matchings!</p>
		<br><h5>How do you budget time for all these activities and events?</h5>
		<p>Within our undergraduate committee, different members work on different projects at the same time so we can streamline our planning process. We have pre-planned agendas for our weekly meetings, in which we organize upcoming events and delegate responsibilities.</p>
	</div>
</div>
</div>
</main>

<?php get_footer(); ?>
