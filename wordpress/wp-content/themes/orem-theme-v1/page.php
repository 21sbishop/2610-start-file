<?php
get_header();

while ( have_posts() ) :
  the_post();

  // The homepage content has its own hero <h1>, so only other pages show the title.
  // The title and content sit directly inside <main> for the scoped main > rules.
  if ( ! is_front_page() ) :
    ?>
    <h1><?php the_title(); ?></h1>
    <?php
  endif;

  the_content();
endwhile;

get_footer();
