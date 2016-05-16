$(document).ready(function() {

    $('.input-group-focus-button').click(function() {
        $(this).closest('.input-group').find('input').first().focus();
    });

});
