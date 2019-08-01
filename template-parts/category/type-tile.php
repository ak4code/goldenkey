<?php
/**
 * @package realtor
 * created by akweb
 */

?>

<div class="gk-type-tile uk-box-shadow-medium uk-border-rounded uk-padding-small">
    <div class="inner">
        <h2 class="gk-title"><?php echo $realty_type->name; ?></h2>
    </div>
    <a class="type-link" title="<?php echo $realty_type->name; ?>" href="<?php echo get_term_link( $realty_type ); ?>"></a>
</div>
