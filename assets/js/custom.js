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

	
// Toggle dropdown on .categorymneu click
jQuery('.categorymneu').click(function(event) {
    // Prevent the click event from reaching the document body
    event.stopPropagation();

    // Toggle the dropdown
    jQuery('.cat_dropdown .dropdown-menu').slideToggle();
});

// Close dropdown when clicking outside
jQuery(document.body).click(function() {
    // Close the dropdown
    jQuery('.cat_dropdown .dropdown-menu').slideUp();
});

// Prevent clicks inside .categorymneu from closing the dropdown
jQuery('.cat_dropdown .dropdown-menu').click(function(event) {
    event.stopPropagation();
});

// Toggle mobile menu on .mobile-menu-hamber click
jQuery('.mobile-menu-hamber').click(function(event) {
    // Prevent the click event from reaching the document body
    event.stopPropagation();

    // Toggle the mobile menu
    jQuery('.top-header .mobile_menu').slideToggle();
    jQuery(this).toggleClass('open');
});

// Close mobile menu when clicking outside
jQuery(document.body).click(function() {
    // Close the mobile menu
    jQuery('.top-header .mobile_menu').slideUp();
    jQuery('.mobile-menu-hamber').removeClass('open');
});

// Prevent clicks inside .mobile-menu-hamber and .top-header .mobile_menu from closing the menu
jQuery('.mobile-menu-hamber, .top-header .mobile_menu').click(function(event) {
    event.stopPropagation();
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
        if (!$(e.target).is('span')) {
            e.preventDefault();
            $(this).parent().toggleClass('active');
            $(this).siblings('.dropdown-menu').slideToggle();
        }
    });
});
