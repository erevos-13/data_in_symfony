/**
 * Created by erevos13 on 18/5/2017.
 */
$(document).ready(function(){

    $("p").hover(function(){
            $(this).addClass('hovered');
        },
        function(){
            $(this).removeClass('hovered');
        });
});

