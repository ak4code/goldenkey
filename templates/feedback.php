<?php
/**
 * @package realtor
 * created by akweb
 * Template Name: Шаблон страницы отзывов
 */

get_header(); ?>
    <div class="uk-container gk-page">
        <header class="page-header uk-margin-top">
            <h1 class="uk-h2 gk-title gk-heading-border"><?php the_title(); ?>
                <span class="uk-align-right">
                    <comment-modal post="<?php echo get_the_ID(); ?>"></comment-modal>
                </span>
            </h1>
        </header>
        <comment-list post="<?php echo get_the_ID(); ?>"></comment-list>
    </div>
<?php get_footer();
