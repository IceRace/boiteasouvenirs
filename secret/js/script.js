$(document).ready(function () {
    
$('#editimage').hide();
    
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
    
    
    /*-------------------------------*/

    
    var maxHeight = Math.max.apply(null, $(".carte_obj").map(function ()
            {
                return $(this).height();
            }).get());

            $(".carte_obj").height(maxHeight);
    
    $( window ).resize(function() {
        if($( window ).width()>723){
            var maxHeight = Math.max.apply(null, $(".carte_obj").map(function ()
            {
                return $(this).height();
            }).get());

            $(".carte_obj").height(maxHeight);
        }
        else{
            $(".carte_obj").height("auto");
        }
    });
    
    /*-------------------------------*/


    if ($('#switchelec').is(':checked')) {
        $("#hideelec").show();
        $('.input_cache').prop('required',true);

    }
    else{
        $("#hideelec").hide();
    }
    
    $("#switchelec").click(function(){
        $("#hideelec").slideToggle();
        
        $('.input_cache').toggle(function(){
            if($(this).prop('required')){
                $(this).show();
                $(this).prop('required',false);
            }
            else{
                $(this).show();
                $(this).prop('required',true);
                $(this).prev().addClass('required');
            }
        });

    });
    
    /*-------------------------------*/
    
    
    $('form').find('input').each(function(){
        if($(this).prop('required'))
        {
            $(this).prev().addClass('required');
        }
    });
    
    $('form').find('textarea').each(function(){
        if($(this).prop('required'))
        {
            $(this).prev().addClass('required');
        }
    });
    
    $('form').find('select').each(function(){
        if($(this).prop('required'))
        {
            $(this).prev().addClass('required');
        }
    });
    
    
});


    /*-------------------------------*/


$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_wrap"); //Fields wrapper
    var add_button      = $(".add_etape"); //Add button ID
    
    var x = 0; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="input_etape"><input type="text" name="etape'+ x +'"/><p title="Supprimer cette étape" class="remove_field material-icons">remove_circle</p></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});


    /*-------------------------------*/


$(document).ready(function () {
    setTimeout(function () {
        $(".msg").fadeOut();
    }, 2000);
});


function toggleEditImage(){
    $("#editimage").slideToggle();
}