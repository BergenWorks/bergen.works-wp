jQuery(function($) {

    // Add top padding to compensate for fixed nav
    var navbarOffset = function() {
        var navbarHeight = $('.nav-main').outerHeight();
        $('body').css('padding-top', navbarHeight);
    }
    navbarOffset();
    $(window).resize(navbarOffset);

    var mainMenu = $('#main-menu-content');
    var iconBars = 'fa-bars';
    var iconClose = 'fa-times';

    mainMenu.on('show.bs.collapse', function(){
        $('.navbar-toggler > .fa').removeClass(iconBars).addClass(iconClose);
    });
    mainMenu.on('hide.bs.collapse', function(){
        $('.navbar-toggler > .fa').removeClass(iconClose).addClass(iconBars);
    });
});
