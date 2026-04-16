<?php /* Template Name: Interview */ ?>
<?php get_header();
    date_default_timezone_set('EST');
    $calendarEventsRequest = wp_remote_get( wscs_get_calendar_api_url( 2 ) );
    if ( is_array( $calendarEventsRequest ) ) {
        $calendarEvents = $calendarEventsRequest['body']; // use the content
    }
?>
<head>
<title>Interviews</title>
</head>
<main>
<div class="jumbotron" style="background-image: url(https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/11/interviews-2.jpg); background-position: top">
  <div class="overlay">
    <h2>Interviews</h2>
  </div>
</div>


  <div class="container">
		<div>
			<h1>Faculty Interviews</h1>
                <p>Find past faculty interviews <a href="https://www.women.cs.cmu.edu/What/Interviews/">here.</a></p><br>
      <br>
<ul id="hexagons">
  <li class="pusher"></li>
	<li>
      <div class="hex-container">
	<a href="https://www.women.cs.cmu.edu/test-site/interview-with-maneula-veloso/"><img src = "https://www.women.cs.cmu.edu/Who/Photos/Interviews/2017/Veloso2012.jpg" alt="Maneula Veloso Interview" min-width="500px"/>
	<div class="alum-name">
      Maneula Veloso
      <br/>Head, Machine Learning Department
      <br/>School of Computer Science
      <br/> (joint in CSD, courtesy in RI, MechE, and ECE)
    </div>
	</a>
    </div>
  </li>
    <li>
        <div class = "hex-container">
    	<a href="https://www.women.cs.cmu.edu/test-site/jean-yang/"><img src = "https://www.women.cs.cmu.edu/Who/Photos/Interviews/2016/yang.jpg" alt="Jean Yang Interview" min-width="500px"/>
	<div class="alum-name" >
      Jean Yang
      <br/>Assistant Professor, Computer Science Department
    </div>
    </a>
    </div>
    </li>
  <li>
    <div class = "hex-container">
    <a href ="https://www.women.cs.cmu.edu/test-site/henny-admoni"><img src = "https://www.women.cs.cmu.edu/Who/Photos/Interviews/2018/admoni_headshot.jpg" alt= "Henny Admoni Interview" min-width = "500px"/>
    <div class = "alum-name">
        Henny Admoni
     <br/>Assistant Professor, Robotics Institute
    </div>
    </a>
    </div>
    </li>
  <li>
    <div class = "hex-container">
    <a href ="https://www.women.cs.cmu.edu/test-site/justine-sherry"><img src = "https://www.women.cs.cmu.edu/Who/Photos/Interviews/2018/sherry_headshot.jpg" alt= "Justine Sherry Interview" min-width = "500px"/>
    <div class = "alum-name">
       Justine Sherry
      <br/>Assistant Professor, Computer Science Department
    </div>
    </a>
    </div>
    </li>
  <li>
    <div class = "hex-container">
    <a href ="https://www.women.cs.cmu.edu/test-site/dilsun-kaynar"><img src = "http://www.cs.cmu.edu/~dilsun/DilsunonWeb.jpg" alt= "Dilsun Kaynar Interview" min-width = "500px"/>
    <div class = "alum-name">
       Dilsun Kaynar
     <br/>Assistant Teaching Professor, Computer Science Department
    </p>
    </div>
    </a>
    </div>
    </li>
  <li>
    <div class = "hex-container">
    <a href ="https://www.women.cs.cmu.edu/test-site/mor-harchol-balter"><img src = "https://www.women.cs.cmu.edu/Who/Photos/FrontPage/mor.jpg" alt= "Mor Harchol-Balter Interview" min-width = "500px"/>
    <div class = "alum-name" >
      Mor Harchol-Balter
      <br/>Professor, Computer Science Department
    </div>
    </a>
    </div>
    </li>
</ul>
</div>
</div>
`

</div>
</div>

</main>

<?php get_footer(); ?>
