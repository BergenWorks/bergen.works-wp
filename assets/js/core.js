jQuery(function($) {

    // Add top margin to compensate for fixed nav
    var navbarHeight = $('.nav-main').height();
    $('body').css('padding-top', navbarHeight);

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
