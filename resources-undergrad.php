<?php /* Template Name: Undergrad Resources*/ ?>
<?php get_header();
    date_default_timezone_set('EST');
?>
<head>
<title>Undergraduate Sisters Program</title>
</head>
<main>
<div class="jumbotron" style="background-image: url(https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/09/IMG_1234.jpg); background-size: cover; position:relative; height:400px; background-position: top;">
  <div class="overlay">
  <h2 style = "text-align: right">Undergraduate Resources</h2>
  </div>

</div>

<center>
<div class="row resource-icons">
    <div class="col s6 m6 l6">
	<h2>Tom Cortina's Research Opportunities</h2>
        <a href = "https://docs.google.com/document/d/17LK18JBGR5Z9zp2gEgHjuTCjKTLtOwotUJNzvjyRyww/edit?usp=sharing">
		<img src="<?php echo get_template_directory_uri() . '/img/svg/spreadsheet.svg';?>" class="resource-icon"/>
        </a>
    </div>

    <div class="col s6 m6 l6">
	<h2>Schedule an Appointment with Kevin Collins (CPDC)</h2>
        <a href = "https://cmu.joinhandshake.com/">
		<img src="<?php echo get_template_directory_uri() . '/img/svg/calendar.svg';?>" class="resource-icon"/>
	</a>
	<p>Log in, select 'Appointments' on the 'Career Center' drop-down menu at the top of the page, then click on 'Schedule a New Appointment.'</p>
    </div>
</div>
</center>
<div class="section">
    <div class="container">
        <div class="center">
            <h1>More Tips & Resources</h1>
            <div class="centered toggleButtons">
                <button id="jobButton">Job Applications</button>
                <button id="researchButton">Research Opportunities</button>
                <button id="linkButton">Other Links</button>
            </div>
        </div>
        <div id="job">
            <div class="row">
                <div class="col s6 m6 l6">
                    <ol>
                        <li>Follow <a href="http://thetartan.org/2011/9/19/special/resume">these tips</a> for writing a good resume.</li>
                        <li>Go to career fairs and impress recruiters with your pitch and experience!</li>
                        <li>Prepare for technical interviews using <a href="http://www.crackingthecodinginterview.com/">Cracking the Coding Interview</a>.</li>
                        <li>Land your dream job!</li>
                    </ol>
                </div>
                <div class="col s6 m6 l6">
                    <h3>Other Job Resources</h3>
                    <ul style="list-style: none">
                        <li><a href="http://callacarter.com/csfrosh/">A Freshman's Guide to Tech Internships</a></li>
                        <li><a href="https://github.com/cassidoo/getting-a-gig">Getting a Gig</a></li>
                        <li><a href="https://evykassirer.github.io/playing-the-internship-game/">Playing the Internship Game</a></li>
                        <li><a href="https://github.com/Ladies-Storm-Hackathons/Resources/blob/master/Job-Resources.md">Job Resources from Ladies Storm Hackathons</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="research" class="hidden">
            <div class="row">
                <div class="col s6 m6 l6">
                    <h3>Opportunities at Carnegie Mellon University</h3>
                    <ul>
                        <li><a href="http://www.cs.cmu.edu/ourcs/index.html">CMU OurCS Research Conference</a></li>
                        <li><a href="https://www.csd.cs.cmu.edu/directory/faculty"> Computer Science Department (CSD) Faculty Research Guide </a></li>
                        <li><a href="https://www.cs.cmu.edu/research">Research Areas in SCS</a></li>
                        <li><a href="http://www.cmu.edu/adm/uri/">CMU Undergraduate Research Initiative</a></li>
                        <li><a href="http://www.csd.cs.cmu.edu/education/bscs/research.html">Undergraduate Research Options</a></li>
                    </ul>
                </div>
                <div class="col s6 m6 l6">
                    <h3>Opportunities at Other Universities</h3>
                    <ul>
                        <li><a href="https://women.acm.org/category/scholarship/">ACM-W Scholarships for Attendance at Research Conferences</a></li>
                        <li><a href="https://cra.org/cra-w/creu/">CRA-W Coalition to Diversify Computing (CREU)</a></li>
                        <li><a href="http://www.cs.hope.edu/reu/">Hope College Undergraduate Research</a></li>
                        <li><a href="http://dimacs.rutgers.edu/REU">Rutgers Research Experiences for Undergrads.</a></li>
                        <li><a href="http://cs.stanford.edu/research/">Stanford CS Research Areas</a></li>
                        <li><a href="http://www.cs.uiuc.edu/research/">University ofIllinois (UC) Research</a></li>
                        <li><a href="http://www.utexas.edu/research">University of Texas (Austin) Research</a></li>
                        <li><a href="http://www.washington.edu/research/urp/">University of Washington (Seattle) Opportunities</a></li>
                    </ul>
                </div>
            </div>
        </div> 
        <div id="other" class="hidden">
            <div class="row">
                <div class="col s6 m6 l6">
                    <h3>Organizations at Carnegie Mellon University</h3>
                    <ul>
                        <li><a href="https://stugov.andrew.cmu.edu/gsa/">Graduate Student Assembly</a></li>
                        <li><a href="http://www.ece.cmu.edu/~ieee/">IEEE Student Chapter</a></li>
                        <li><a href="http://www.cmunsbe.com/">National Society of Black Engineers (NSBE)</a></li>
                        <li><a href="https://cmuswe.org/">Society of Women Engineers (SWE)</a></li>
                        <li><a href="http://www.cmushpe.com/">Society of Hispanic Professional Engineers (SHPE)</a></li>
                            <li><a href="https://scottylabs.org/">ScottyLabs</a></li>
                    </ul>
                </div>
                <div class="col s6 m6 l6">
                    <h3>Other Organizations</h3>
                    <ul>
                        <li><a href="http://www.aas.org/~cswa/">American Astronomical Society Committee on the Status of Women</a></li>
                        <li><a href="http://women.acm.org/">ACM Committee on Women in Computing</a></li>
                        <li><a href="http://www.aauw.org/">American Association of University Women</a></li>
                        <li><a href="http://www.awc-hq.org/">Association for Women in Computing</a></li>
                        <li><a href="http://www.awis.org/">Association for Women in Science</a></li>
                        <li><a href="http://www.awise.org/">Association for Women in Science and Engineering</a></li>
                        <li><a href="http://www.witec-eu.net/">European Network of Women in Science, Engineering and Technology</a></li>
                        <li><a href="http://www.expandingyourhorizons.org/">Expanding Your Horizons Network</a></li>
                        <li><a href="http://www.linuxchix.org/">LinuxChix</a></li>
                        <li><a href="http://www.swe.org/">Society of Women Engineers</a></li>
                        <li><a href="http://www.webgrrls.com/">Webgrrls International</a></li>
                        <li><a href="http://www.wepan.org/">Women in Engineering Programs and Advocates Network (WEPAN)</a></li>
                        <li><a href="http://www.witi.com/">Women in Technology International</a></li>
                        <li><a href="http://www.wes.org.uk/">Women's Engineering Society</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</main>

<script type="text/javascript">
    function select(elem, sec) {
	            sec.style.display = 'block';
		            elem.style.backgroundColor = '#B9CDDA';
		        }
    function deselect(elem, sec) {
	            sec.style.display = 'none';
		            elem.style.backgroundColor = '#00000000';
		        }
    var jobButton = document.getElementById('jobButton');
    var researchButton = document.getElementById('researchButton');
        var linkButton = document.getElementById('linkButton');

    var job = document.getElementById('job');
    var research = document.getElementById('research');
    var other = document.getElementById('other');

    jobButton.onclick = function() {
        select(jobButton, job);
        deselect(researchButton, research);
        deselect(linkButton, other);
    }

    researchButton.onclick = function() {
        select(researchButton, research);
        deselect(jobButton, job);
        deselect(linkButton, other);
    }

    linkButton.onclick = function() {
        select(linkButton, other);
        deselect(researchButton, research);
        deselect(jobButton, job);
    }
</script>

<?php get_footer(); ?>


