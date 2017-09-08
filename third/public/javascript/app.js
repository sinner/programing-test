(function(){

    var english = true;

    jQuery('#message button').on('click', function() {

        english = !english;

        if(english){
            jQuery('#message div span:first-child').html('Bienvenido');
        }
        else {
            jQuery('#message div span:first-child').html('Welcome');
        }

    });

})();
