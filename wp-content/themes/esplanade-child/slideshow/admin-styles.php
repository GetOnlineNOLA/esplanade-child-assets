<?php

//hide unused fields based on slideshow template

function gon_slideshow_hide_acf_fields(){ ?>

<style type="text/css">

<?php 

$slideshow = get_field('select_slideshow_style','option');
switch ($slideshow) {
  case 'standard': ?>
    
.acf-field[data-name="static-slideshow-text"],
.acf-field[data-name="static-slideshow-cta"],
.acf-field[data-name="static-slideshow-cta-link"] {display: none;}
div#acf-group_5d1cea732a215 {display: none!important;}

    <?php break;
  case 'overlay': ?>

div#acf-group_5d1cea732a215 {display: none!important;}

    <?php break;
  case 'tiled': ?>

.acf-field[data-name="static-slideshow-text"],
.acf-field[data-name="static-slideshow-cta"],
.acf-field[data-name="static-slideshow-cta-link"] {display: none;}
div#acf-group_5d1cea732a215 {display: none!important;}

    <?php break;
  case 'swoosh': ?>

.acf-field[data-name="static-slideshow-text"],
.acf-field[data-name="static-slideshow-cta"],
.acf-field[data-name="static-slideshow-cta-link"] {display: none;}
.acf-field[data-name="swoosh-image"] {display: block!important;}
div#acf-group_5d1cea732a215 {display: none!important;}

    <?php break;

    case 'video': ?>
    
div#acf-group_57854f05fdsdfd566e {display: none!important;}

    <?php break;
  
  default:
    break;
} ?>

</style>


<?php }




add_action('acf/input/admin_head', 'gon_slideshow_hide_acf_fields');
