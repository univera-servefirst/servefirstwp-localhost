/* 
 * This code makes the caption for featured images the width of the image.
 */


jQuery(document).ready(function() {

    var pic = jQuery('.image-shifter img');
    var width = pic.width(); 
    jQuery('.image-caption').css({'width':width});
  
});