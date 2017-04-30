$(document).ready(function () {
    $("#titre_header").addClass('place');
    $("#soustitre_header").addClass('place');
    $("#more").click(function () {
        $(".moreplus").toggleClass('rotate');
    });
    
    var acc = document.getElementsByClassName("parcours_head");
    var i;
    for (i = 0; i < acc.length; i++) {
        acc[i].onclick = function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            }
            else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        }
    }
    
    $("#menu").hide();
    $("#open").click(function(){
        $("#menu").fadeToggle();
    });
    $("#close").click(function(e){
        $("#menu").fadeToggle();
        e.stopPropagation();

    });
    $("#menu").click(function(){
        $("#menu").fadeToggle();
    });
    
    $(window).scroll(function() {
        if($(window).scrollTop()>=150){
            $(".hamburger").addClass("black");
        }
        else{
            $(".hamburger").removeClass("black");
        }
    });
    
});