<?php /* Template Name: Sisters Programs */ ?>
<?php get_header(); ?>

<main>
<div class="jumbotron" style="background-image: url(https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/09/IMG_1234.jpg); background-position: top;">
  <div class="overlay">
    <h2 style="text-align: right">Undergraduate Sisters Program</h2>
  </div>
</div>

<div class="row" style="margin-bottom: 0px">
    <div class="col s4 m4 l4">
        <a href="#who">
            <img src="https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/09/whohex.png" class="center-hexagon" alt="Who">
        </a>
    </div>
    <div class="col s4 m4 l4">
        <a href="#what">
            <img src="https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/09/whathex.png" class="center-hexagon" alt="What">
        </a>
    </div>
    <div class="col s4 m4 l4">
        <a href="#how">
            <img src="https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/09/howhex.png" class="center-hexagon" alt="How">
        </a>
    </div>
</div>

<div id="who"></div>
<section class="section">
  <div class="container">
    <div class="center">
      <h2>Who are the Big Sisters?</h2>
      <p>The program matches first year women with sophomore, junior, or senior women with the goal of strengthening bonds between women in the CS community. The Big Sister/Little Sister relationship serves as an excellent connection for first years with an upperclassman whom they can go to for friendship, advice, and support. Big Sisters have an opportunity to mentor others and share their experiences and perceptions of computer science.</p>
      <img class="hex" id="what" src="<?php echo get_template_directory_uri() . '/img/hex2.png'; ?>" alt="" /><br>
      <h2>What do Big Sisters and Little Sisters do?</h2>
      <p>The Women@SCS Commitee organizes events so prospective Big and Little Sisters can meet and connect. Then, based on preferences, the commitee matches every freshman with a Big Sister. Various events are held during the year to encourage Big and Little Sisters to bond. The closeness and nature of the relationship is determined entirely by the Big and Little Sister.</p>
      <img class="hex" id="how" src="<?php echo get_template_directory_uri() . '/img/hex1.png'; ?>" alt="" /><br>
      <h2>How can you get involved?</h2>
      <p>Matches are usually made in September at the beginning of the new academic year. At any other time, please contact <a href="mailto:ayerneni@andrew.cmu.edu">Anita Yerneni</a>.</p>
    </div>
  </div>
</section>

<div class="container">
  <div class="center">
    <h2>Mentoring Resources</h2>
    <p>Interested in mentoring others? Check out the <a href="https://www.women.cs.cmu.edu/test-site/mentoring/">Mentoring Webpage</a> for some mentoring tips and strategies.</p>
  </div>
</div>

</main>

<?php get_footer(); ?>
