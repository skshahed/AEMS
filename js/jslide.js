function slideSwitch() {
    var $active = $('#SS IMG.active');
    if ( $active.length == 0 ) $active = $('#SS IMG:last');
    var $next =  $active.next().length ? $active.next()
        : $('#SS IMG:first');
    $active.addClass('last-active');
    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 2000, function() {
            $active.removeClass('active last-active');
        });
}
$(function() {
    setInterval( "slideSwitch()", 6000 );
});