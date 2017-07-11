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

    $('body').on('click', '.link-golfer', function () {
        $("#loading-indicator").show();
        $('#golfer-modal').find('.modal-content').load($(this).data('href'), function () {
            var thisModal = $('#golfer-modal');
            thisModal.modal('show');
            $("#loading-indicator").hide();
        });
    });

    $('body').on('click', '.link-golf-club', function () {
        $("#loading-indicator").show();
        $('#golf-club-modal').find('.modal-content').load($(this).data('href'), function () {
            var thisModal = $('#golf-club-modal');
            thisModal.modal('show');
            $("#loading-indicator").hide();
        });
    });

    $('body').on('click', '.link-registration-cards', function () {
        $("#loading-indicator").show();
        $('#registration-cards-modal').find('.modal-content').load($(this).data('href'), function () {
            var thisModal = $('#registration-cards-modal');
            thisModal.modal('show');
            $("#loading-indicator").hide();
        });
    });

});