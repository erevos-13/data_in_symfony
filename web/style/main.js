/**
 * Created by erevos13 on 18/5/2017.
 */
$(document).ready(function(){
    //language=JQuery-CSS
    $(".btn btn-primary").hover(function() {

        $(this).addClass('transition');

    }, function() {
        $(this).removeClass('transition');
    });
});