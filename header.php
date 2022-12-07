<?php do_action('wp_head'); ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body <?php body_class(); ?>>

  <header class="banner">
    <div class="container">
      <nav class="header-banner-navigation">
        <a href="/" title="Home">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/src/bookstore_logo.png'); ?>" alt="Bookstore logo" width="100" height="100" />
        </a>
        <?php wp_nav_menu(['menu' => 'Main menu']); ?>
      </nav>
    </div><!-- .container -->
  </header><!-- .banner -->

  <div id="content" class="container site-content">