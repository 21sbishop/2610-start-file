<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php the_title(); ?> | <?php bloginfo( 'name' ); ?></title>
  <meta name="description" content="Discover Orem, Utah — at the foot of Mt. Timpanogos. Trails, Utah Lake, community events, and small-town charm minutes from the city." />

  <!-- Open Graph -->
  <meta property="og:title" content="Discover Orem — A Mountain Town Worth Exploring" />
  <meta property="og:description" content="Discover Orem, Utah — at the foot of Mt. Timpanogos. Trails, Utah Lake, community events, and small-town charm minutes from the city." />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://lightslategrey-woodpecker-601101.hostingersite.com/" />
  <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/og-image.jpg" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta property="og:image:alt" content="Discover Orem: Mt. Timpanogos above fall foliage in Utah County" />
  <meta property="og:logo" content="<?php echo get_template_directory_uri(); ?>/images/android-chrome-512x512.png" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Discover Orem — A Mountain Town Worth Exploring" />
  <meta name="twitter:description" content="Discover Orem, Utah — at the foot of Mt. Timpanogos. Trails, Utah Lake, community events, and small-town charm minutes from the city." />
  <meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/images/og-image.jpg" />

  <!-- Favicons -->
  <link rel="icon" href="/favicon.ico?v=2" sizes="any" />
  <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png" />
  <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
  <link rel="manifest" href="/site.webmanifest" />
  <meta name="theme-color" content="#1f6f8b" />
  <meta name="apple-mobile-web-app-title" content="Orem" />

  
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />


  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/styles/styles.min.css?v=5" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <!-- Scripts -->
  <script src="<?php echo get_template_directory_uri(); ?>/scripts/year.js" defer></script>
  <script src="<?php echo get_template_directory_uri(); ?>/scripts/navigation.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
  <script src="<?php echo get_template_directory_uri(); ?>/scripts/swiper.js" defer></script>
</head>
<body>
  <a class="skip-link" href="#main">Skip to main content</a>

  <header class="site-header">
    <div class="container site-header__inner">
      <a class="brand" href="<?php echo home_url( '/' ); ?>">
        <img class="brand__mark" src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="" width="36" height="27" loading="lazy" />
        <span class="brand__name">OREM</span>
      </a>
      <button class="hamburger-button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="primary-nav"></button>
    </div>
  </header>

  <nav class="primary-nav" id="primary-nav" aria-label="Primary">
    <div class="container">
      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'site-navigation',
          'menu_class'     => 'site-nav',
          'container'      => false,
        )
      );
      ?>
    </div>
  </nav>

  <main id="main"<?php echo is_front_page() ? '' : ' class="page"'; ?>>
