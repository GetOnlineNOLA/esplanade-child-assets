// JavaScript Document
jQuery(document).ready(function(){
	var acf_cols_title = jQuery(".acf-th-title, .acf-field-title").addClass('collapse');
	
    jQuery(".acf-th-title").click(function(){
        acf_cols_title.toggleClass('collapse');
    });
	var acf_cols_image = jQuery(".acf-th-image, .acf-field-image").addClass('collapse');
    jQuery(".acf-th-image").click(function(){
        acf_cols_image.toggleClass('collapse');
    });
	var acf_cols_text = jQuery(".acf-th-text, .acf-field-text").addClass('collapse');
    jQuery(".acf-th-text").click(function(){
        acf_cols_text.toggleClass('collapse');
    });
	var acf_cols_link = jQuery(".acf-th-page_link, .acf-field-page-link").addClass('collapse');
    jQuery(".acf-th-link").click(function(){
        acf_cols_link.toggleClass('collapse');
    });
	/*// this one doesn't target correctly - it's a wysiwyg
	var acf_cols_cta = jQuery(".acf-th-cta, .acf-field-cta").addClass('collapse');
    jQuery(".acf-th-cta").click(function(){
        acf_cols_cta.toggleClass('collapse');
    });*/
	jQuery(".acf-row-handle").addClass('thin-collapse');
});