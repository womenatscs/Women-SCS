<?php /* Template Name: Mentoring */ ?>
<?php get_header();
    date_default_timezone_set('EST');
    $currentTime = date('c');
    // 3 query parameters set:
    // maxResults = 2
    // timeMin = currentTime
    // key = API key (obtain from console.developers.google.com - navigate to correct project > create credentials > API key)
    $api_key = defined( 'GOOGLE_CALENDAR_API_KEY' ) ? GOOGLE_CALENDAR_API_KEY : '';
    $calendarEventsRequest = wp_remote_get( 'https://www.googleapis.com/calendar/v3/calendars/women.at.scs@gmail.com/events?key=' . urlencode( $api_key ) . '&maxResults=2&timeMin=' . $currentTime);
    if ( is_array( $calendarEventsRequest ) ) {
        $calendarEvents = $calendarEventsRequest['body']; // use the content
    }
?>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Mentoring</title>
</head>
<main>
<div class="jumbotron" style="background-image: url(https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/09/20161116_093046-1.jpg); background-position: 0 -100px; background-repeat: no-repeat; background-size: cover; position:relative; height:400px">
  <div class="overlay">
  <h2>Mentoring</h2>
  </div>
</div>


<div class="container">
<div class="center">
      <h3>There are a number of mentoring programs available for women in the School of Computer Science at Carnegie Mellon University. Also, feel free to refer to the mentoring tips and other mentoring resources to gain more insight on what mentoring is.</h3>

</div>
</div>

<div class="section">
  <div class="container">
		<div class="center">
		<h1>Programs and Resources</h1>
		<div class="centered toggleButtons">
			<button id="sisButton"><i class="fa fa-users fa-lg"></i><br>Undergraduate Sisters</button>
			<button id="mentorButton"><i class="fa fa-lightbulb-o fa-lg"></i><br>Mentoring Tips </button>
			<button id="resButton"><i class="fa fa-book fa-lg"></i><br>Other Resources </button>
		</div>
		</div>
			<div id="undergrad">
				<p>The <a title="Undergraduate Sisters Program" href="https://www.women.cs.cmu.edu/test-site/?page_id=68">Undergraduate Big Sister/Little Sister Program</a> matches first year women with sophomore, junior, or senior women with the goal of strengthening bonds between women in the CS community. The Big Sister/Little Sister relationship serves as an excellent way for first years to get to connect with someone whom they can go to for friendship, advice, and support. Big Sisters have an opportunity to mentor others and share their experiences and perceptions of computer science.</p>
			</div>
		<div id="tips" class="hidden">
			<h4><a title="Making Sisters Work For You" href="https://www.women.cs.cmu.edu/test-site/?page_id=94">Making Sisters Work for YOU</a></h4> 
<p>A look at the basic elements of successful mentoring programs, based on research and evaluation of Women@SCS, MentorNet and other programs.</p>
<h4><a href="https://www.women.cs.cmu.edu/test-site/?page_id=97">The 10 Commandments of Mentoring</a></h4>
<p>Learn all about women mentoring other women. Find out how it relates to the success of your own career. Learn the common myths and commandments of mentoring.</p>
		</div>
		<div id="resources" class="hidden">
			<p>MentorNet is a service available to women in engineering, CS, and other sciences -- undergraduate and graduate. MentorNet pairs students with professionals in industry for year-long, structured mentoring relationships conducted via email. It's a wonderful opportunity for students potentially interested in careers in industry at the conclusion of their studies.</p>
<h4><a href="https://cra.org/cra-w/dreu/">CRA-W Distributed Research Experiences for Undergraduates</a></h4>
<p>The CRA-W DREU's goal is to increase the number of women who go to graduate school to study computer science and engineering. Undergraduate women are paired with faculty mentors for a summer research experience.</p>
		</div>
    </div>
  </div>
</div>
</main>

    <script type="text/javascript">
    	var sisButton = document.getElementById('sisButton');
	var mentorButton = document.getElementById('mentorButton');
	var resButton = document.getElementById('resButton');

	var sis = document.getElementById('undergrad');
	var tips = document.getElementById('tips');
	var resources = document.getElementById('resources');

	sisButton.onclick = function() {
		sis.style.display = 'block'; tips.style.display = 'none'; resources.style.display = 'none';
		sisButton.style.backgroundColor = '#B9CDDA'; mentorButton.style.backgroundColor = '#00000000'; resButton.style.backgroundColor = '#00000000';
	}

	mentorButton.onclick = function() {
		tips.style.display = 'block'; sis.style.display = 'none'; resources.style.display = 'none';mentorButton.style.backgroundColor = '#B9CDDA'; sisButton.style.backgroundColor = '#00000000'; resButton.style.backgroundColor = '#00000000';
	}

	resButton.onclick = function() {
		resources.style.display = 'block'; tips.style.display = 'none'; sis.style.display = 'none';
		resButton.style.backgroundColor = '#B9CDDA'; mentorButton.style.backgroundColor = '#00000000'; sisButton.style.backgroundColor = '#00000000';
	}
    </script>

<?php get_footer(); ?>
