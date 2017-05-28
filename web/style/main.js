/**
 * Created by erevos13 on 18/5/2017.
 */
$(document).ready(function(){

    $("h1").hover(function(){
            $(this).addClass('animated  bounce');
        },
        function(){
            $(this).removeClass('animated bounce');
        });
});

