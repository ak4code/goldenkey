<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="app">
    <header class="gk-header">
        <div class="uk-container uk-flex uk-flex-wrap">
            <div class="uk-navbar-left">
                <div class="gk-header-logo header-item">
					<?php the_custom_logo(); ?>
                </div>
            </div>
            <div class="uk-navbar-right">
                <nav class="uk-navbar-container uk-navbar-transparent uk-visible@s" uk-navbar="mode: click">
                    <div class="uk-navbar-right">
						<?php wp_nav_menu( array(
							'theme_location' => 'header',
							'container'      => '',
							'menu_id'        => '',
							'menu_class'     => 'uk-navbar-nav',
						) ); ?>
                    </div>
                </nav>
            </div>
        </div>
    </header>