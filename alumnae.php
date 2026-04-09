<?php /* Template Name: Alumnae */ ?>
<?php get_header();
    date_default_timezone_set('EST');
    $currentTime = date('c');
    // 3 query parameters set:
    // maxResults = 2
    // timeMin = currentTime
    // key = API key (obtain from console.developers.google.com - navigate to correct project > create credentials > API key)
    $calendarEventsRequest = wp_remote_get( 'https://www.googleapis.com/calendar/v3/calendars/women.at.scs@gmail.com/events?key=' . GOOGLE_CALENDAR_API_KEY . '&maxResults=2&timeMin=' . $currentTime);
    if ( is_array( $calendarEventsRequest ) ) {
        $calendarEvents = $calendarEventsRequest['body']; // use the content
    }
?>
<head>
<title>Alumnae</title>
</head>
<main>
<div class="jumbotron" style="background-image: url(https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/04/alumni.jpg); background-position: 10% 25%">
  <div class="overlay">
    <h2>Alumnae</h2>
  </div>
</div>
  

  <div class="container">
		<div class="center">
			<h1>Welcome</h1>
			<p>We would very much like our SCS alumnae to be a special part of our community. On those occasions when alumnae have joined us as invited speakers or made themselves available for advice, or simply kept in touch, the experiences have been positive and rewarding for everyone. Our women students value the input of alumnae as role models and mentors.</p>
      <p>If you know of CMU Alumnae that do not know about our community, please tell them about us! We'll update the information on our alumnae section as we receive input from everyone. If you have news to share, please get in touch!
      </p><br>
      <div class="row">
        <div class="column-3">
         <a href="http://www.cmu.edu/alumni/"><img class="hex" src="<?php echo get_template_directory_uri() . '/img/hex2.png';?>" /><br>
          Carnegie Mellon Alumnae Association</a>
        </div>
        <div class="column-3">
          <a href="https://www.linkedin.com/grp/members?gid=6720922"><img class="hex" src="<?php echo get_template_directory_uri() . '/img/hex1.png';?>" /><br>
          LinkedIn Group</a>
        </div>
        <div class="column-3">
          <a href="http://www.cs.cmu.edu/alumni"><img class="hex" src="<?php echo get_template_directory_uri() . '/img/hex3.png';?>" /><br>
          SCS Alumnae</a>
        </div>
      </div>
    </div>
  </div>

<div class="section">
<div class="container">

<center><h1>Our Alumnae</h1></center>
<br>
<ul id="hexagons">
  <li class="pusher"></li>
	<li>
      <div class="hex-container">
	<a href="https://www.women.cs.cmu.edu/test-site/ting-shih-interview/"><img src="https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/04/Screen-Shot-2018-04-17-at-12.34.30-AM.png" alt=""/>
	<div class="alum-name">
	  Ting Shih
	  <br/>Class of 2001
          <br/>CEO at ClickMedix
	</div>
	</a>
    </div>
  </li>
  <li>
    <div class="hex-container">
      <a href="https://www.women.cs.cmu.edu/test-site/alexandra-johnson-alum-bio/"><img src="https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/10/alexandra_johnson.jpg" alt="Alexandra Johnson" min-width="500px"/>
      <div class="alum-name">
      Alexandra Johnson<br/>Class of 2014
      <br/>Software engineer at SigOpt
      </div>
      </a>
    </div>
  </li>
  <li>
  <div class="hex-container">
    <a href="https://www.women.cs.cmu.edu/test-site/mopewa-ogundipe-alum-bio/"><img src="https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/10/mopewa_o.jpg" alt="Mopewa Ogundipe"/>
      <div class="alum-name">
        Mopewa Ogundipe<br/>
        Class of 2016<br/>
        Developer at Medium
      </div>
    </a>
  </div>
</li>
<li>
  <div class="hex-container">
    <a href="https://www.women.cs.cmu.edu/test-site/jenny-liao-alum-bio/"><img src="https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/10/jenny_liao.jpg" alt="Jenny Liao"/>
      <div class="alum-name">
        Jenny Liao<br/>
        Class of 2015<br/>
        Software engineer at Google
      </div>
    </a>
  </div>
</li>
  <li class="pusher"></li>
    <li>
      <div class="hex-container">
	<a href="https://www.women.cs.cmu.edu/test-site/margaret-schervish/"><img src="https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/10/margaret_schervish.jpg" alt=""/>
	<div class="alum-name">
	  Margaret Schervish<br/>
          Class of 2013<br/>
          Principal Engineer at APT
	</div>
	</a>
    </div>
  </li>
  <li>
      <div class="hex-container">
	<a href="https://www.women.cs.cmu.edu/test-site/tiffany-chang-interview/"><img src="https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/04/tchang2.jpg" alt=""/>
	<div class="alum-name">
	  Tiffany Chang<br/>
          Class of 2003<br/>
          Manager at VMWare
	</div>
	</a>
    </div>
  </li>
  <li>
      <div class="hex-container">
	<a href="https://www.women.cs.cmu.edu/test-site/nivedita-chopra-interview/"><img src="https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/10/nivedita_chopra.jpg" width="400px" alt=""/>
	<div class="alum-name">
	  Nivedita Chopra
          <br/>Class of 2015
          <br/>Software engineer at Facebook
	</div>
	</a>
    </div>
  </li>
  
      
 
</ul>
  



</div>
</div>

</main>

<?php get_footer(); ?>
