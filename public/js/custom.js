$(document).ready(function() {

    $("#rg-span").css("display", "none");

    $('select').on('change', function() {
        if (this.value == 'sp') {
            $('#idRG').prop('required', true);
            $("#rg-span").css("display", "contents");
        } else {
            $('#idRG').prop('required', false);
            $("#rg-span").css("display", "none");
        }
    });

    $('#idDate').focusout(function() {
        var local = $('#idNascimento').val();
        var years = new Date(new Date() - new Date(this.value)).getFullYear() - 1970;
        if (years < 18 && local == 'ba') {
            alert('Não é permitido cadastro para menoridade');
            $('#idDate').val('');
        }
    });
});