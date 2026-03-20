<?php /* Template Name: Grad Sisters Program */ ?>
<?php get_header(); ?>

<main>
<div class="jumbotron" style="background-image: url(https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/09/sisters.jpg); background-position: top;">
  <div class="overlay">
    <h2 style="text-align: right">Graduate Sisters Program</h2>
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
      <h2>Who are the Grad Sisters?</h2>
      <p>Students from the School of Computer Science are invited to participate in the Grad Sisters Program. The program matches undergraduate women with graduate women in computer science to help answer questions about graduate school. Even if students may not be interested in pursuing a graduate degree, this relationship can be a valuable way to learn more about life after college and the different options available. The program hopes to let students learn about little-discussed paths like graduate school, which surprisingly few women in computer science end up choosing.</p>
      <img class="hex" id="what" src="<?php echo get_template_directory_uri() . '/img/hex2.png'; ?>" alt="" /><br>
      <h2>What do Grad Sisters and Little Sisters do?</h2>
      <p>Various events are held during the year to encourage Grad and Little Sisters to bond. The closeness and nature of the relationship is determined entirely by the Grad and Little Sister.</p>
      <img class="hex" id="how" src="<?php echo get_template_directory_uri() . '/img/hex1.png'; ?>" alt="" /><br>
      <h2>How can you get involved?</h2>
      <p>Details to come.</p>
    </div>
  </div>
</section>

<div class="center">
  <p>Also check out our <a href="https://www.women.cs.cmu.edu/test-site/undergraduate-sisters-program/">Undergraduate Sisters Program</a>.</p>
</div>

</main>

<?php get_footer(); ?>
