<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () {
                (m[i].a = m[i].a || []).push(arguments)
            }
            m[i].l = 1 * new Date()
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, 'script', 'https://mc.yandex.ru/metrika/tag.js', 'ym')

        ym(54955096, 'init', {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true
        })
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/54955096" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
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
							'menu_id'        => 'header-menu',
							'menu_class'     => 'uk-navbar-nav',
							'walker'         => new Header_Menu_Walker(),
						) ); ?>
                    </div>
                </nav>
                <a class="uk-navbar-toggle uk-hidden@m" href="#gk-offcanvas" uk-toggle>
                    <span uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Меню</span>
                </a>
            </div>
        </div>
    </header>

    <!--    OFFCANVAS   -->
    <div id="gk-offcanvas" uk-offcanvas="overlay: true">
        <div class="uk-offcanvas-bar uk-flex uk-flex-column">
            <div class="gk-header-logo header-item">
				<?php the_custom_logo(); ?>
            </div>
			<?php wp_nav_menu(
				array(
					'theme_location' => 'mobile',
					'container'      => false,
					'menu_class'     => 'uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical',
					'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
					'walker'         => new Header_Menu_Walker(),
				)
			);
			?>
            <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical okna-nav">
                <li class="uk-nav-divider"></li>
                <li><?php echo get_option( 'gk_address' ); ?></li>
                <li><a href="tel:<?php echo get_option( 'gk_phone' ); ?>"><?php echo get_option( 'gk_phone' ); ?></a>
                </li>
            </ul>
        </div>
    </div>