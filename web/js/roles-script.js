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
            $(".select2").select2({
                dropdownParent: $("#golfer-modal")
            });
            $("#golfer-golfer_dateofbirth").datepicker({
                autoclose: !0,
                todayHighlight: !0,                
                allowInputToggle: true,
                format: 'dd-mm-yyyy'
            });

            $('.show-datepicker').click(function (event) {
                event.preventDefault();
                $("#golfer-golfer_dateofbirth").focus();
            });
            $('.modal').removeAttr('tabindex');
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

            $(".select2").select2({
                dropdownParent: $("#registration-cards-modal")
            });

            $("#loading-indicator").hide();
        });
    });

    $('body').on('click', '.link-request-cards', function () {
        $("#loading-indicator").show();
        $('#registration-cards-modal').find('.modal-content').load($(this).data('href'), function () {
            var thisModal = $('#registration-cards-modal');
            thisModal.modal('show');
            $("#loading-indicator").hide();
        });
    });

});