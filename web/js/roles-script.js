/* global $ */

$(function () {

    $('body').on('click', '.link-role', function () {
        $("#loading-indicator").show();
        $('#role-modal').find('.modal-content').load($(this).data('href'), function () {
            var thisModal = $('#role-modal');
            thisModal.modal('show');
            $("#loading-indicator").hide();
        });
    });    

});