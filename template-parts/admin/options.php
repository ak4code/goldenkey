<?php
/**
 * @package realtor
 * created by akweb
 */
?>

    <div class="wrap">
        <h1>Настройки темы Золотой ключ</h1>
        <form method="post" action="options.php">
			<?php
			settings_fields( 'goldenkey' );
			do_settings_sections( 'goldenkey' );
			submit_button();
			?>
        </form>
    </div>

<?php
if ( ! did_action( 'wp_enqueue_media' ) ) {
	wp_enqueue_media();
}
?>