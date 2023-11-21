jQuery(function(){

	jQuery(window).scroll(function(){
	  var social = jQuery('.single-media-sidebar'),
	      scroll = jQuery(window).scrollTop();

	  if (scroll >= 200) social.addClass('show');
	  else social.removeClass('show');
	});

jQuery(window).scroll(function(){
  var stickyh = jQuery('.top-header'),
      scrollh = jQuery(window).scrollTop();

  if (scrollh >= 70) stickyh.addClass('fixed');
  else stickyh.removeClass('fixed');
});

	
jQuery('.categorymneu').click(function(){
	jQuery('.cat_dropdown .dropdown-menu') .slideToggle();
});

jQuery('.mobile-menu-hamber').click(function(){
	jQuery('.top-header .mobile_menu') .slideToggle();
	jQuery(this).toggleClass('open');
});
jQuery( ".desktop_menu li.menu-item" ).hover(function() {  // mouse enter
    jQuery( this ).find( " > .dropdown-menu" ).show(); // display immediate child

}, function(){ // mouse leave
    if ( !jQuery(this).hasClass("current_page_item") ) {  // check if current page
        jQuery( this ).find( ".dropdown-menu" ).hide(); // hide if not current page
    }
});

});

jQuery(document).ready(function($) {
    $('.mobile-menu li.active > a').siblings('.dropdown-menu').slideDown();
    $('.mobile-menu .menu-item-has-children > a').on('click', function(e) {
        e.preventDefault();
        $(this).parent().toggleClass('active');
        $(this).siblings('.dropdown-menu').slideToggle();
        
    });
});
