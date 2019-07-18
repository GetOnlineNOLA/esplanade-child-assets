<?php

//hide unused fields based on columns template

function gon_columns_hide_acf_fields(){ ?>

<style type="text/css">

/*gitenberg block edits*/
.acf-field-5cc3652dd7594 *, .acf-field-5cc3652dd7594 {
    padding: 1px!important;
}



.visible-6 .col3,
.visible-6 .col4 {display: none!important;}

.visible-4 .col4 {display: none!important;}


@media (min-width: 600px){

  .visible-3 .col1,
  .visible-3 .col2, 
  .visible-3 .col3,
  .visible-3 .col4 {width: 25%!important;float: left;clear: none;}

  .visible-4 .col1,
  .visible-4 .col2, 
  .visible-4 .col3 {width: 33.33%!important;float: left;clear: none;}

  .visible-6 .col1,
  .visible-6 .col2 {width: 50%!important;float: left;clear: none;}

}

<?php 

$columns = get_field('select_columns_style','option');
switch ($columns) {
  case 'standard':
    break;
  case 'expand': ?>
.acf-field[data-name="left_column_image"],
.acf-field[data-name="title_below_image_left"],
.acf-field[data-name="middle_column_image"],
.acf-field[data-name="title_below_image_middle"],
.acf-field[data-name="right_column_image"],
.acf-field[data-name="title_below_image_right"] {display: none;}
    <?php break;
  case 'full':
    break;
  case 'overlay':
    break;
  default:
    break;
} ?>

</style>


<script type="text/javascript">

jQuery(document).ready(function(){
  jQuery(document).click(function(e){
    var clicked = jQuery(e.target);
    if( clicked.parents('.col-select').length > 0 && clicked.val() ){
      var columns = clicked.val();
      clicked.parents('.acf-row').removeClass('visible-6 visible-4 visible-3').addClass('visible-'+columns);
    }
  });
});


</script>


<?php }




add_action('acf/input/admin_head', 'gon_columns_hide_acf_fields');
