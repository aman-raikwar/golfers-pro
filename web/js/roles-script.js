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

    $('body').on('click', '.link-golf-club-change-password', function () {
        $("#loading-indicator").show();
        $('#golf-club-modal').find('.modal-content').load($(this).data('href'), function () {
            var thisModal = $('#golf-club-modal');
            thisModal.modal('show');
            $("#loading-indicator").hide();
        });
    });

    $('body').on('click', '.link-golfer-change-password', function () {
        $("#loading-indicator").show();
        $('#golfer-modal').find('.modal-content').load($(this).data('href'), function () {
            var thisModal = $('#golfer-modal');
            thisModal.modal('show');
            $("#loading-indicator").hide();
        });
    });

    $('body').on('click', '.link-golfer-notes', function () {
        $("#loading-indicator").show();
        $('#golfer-modal').find('.modal-content').load($(this).data('href'), function () {
            var thisModal = $('#golfer-modal');
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

    $('body').on('click', '.link-golfer-activity', function () {
        $("#loading-indicator").show();
        $('#golfer-activity-modal').find('.modal-content').load($(this).data('href'), function () {
            var thisModal = $('#golfer-activity-modal');
            thisModal.modal('show');

            $(".select2").select2({
                dropdownParent: $("#golfer-activity-modal")
            });

            $("#playeractivity-activity_date").datepicker({
                autoclose: !0,
                todayHighlight: !0,
                allowInputToggle: true,
                format: 'dd-mm-yyyy'
            });

            $('.show-datepicker').click(function (event) {
                event.preventDefault();
                $("#playeractivity-activity_date").focus();
            });

            var h = new Date().getUTCHours();
            var m = new Date().getUTCMinutes();
            $("#playeractivity-activity_time").timepicker({
                defaultTime: h + ':' + m,
                showMeridian: !1,
                icons: {
                    up: 'fa fa-angle-up fa-2x',
                    down: 'fa fa-angle-down fa-2x'
                }
            });            

            $('.show-timepicker').click(function (event) {
                event.preventDefault();
                $("#playeractivity-activity_time").focus();
            });

            $("#loading-indicator").hide();
        });
    });

    $('body').on('click', '.link-add-card-readers', function () {
        $("#loading-indicator").show();
        $('#card-readers-modal').find('.modal-content').load($(this).data('href'), function () {
            var thisModal = $('#card-readers-modal');
            thisModal.modal('show');

            $(".select2").select2({
                dropdownParent: $("#card-readers-modal")
            });

            $("#loading-indicator").hide();
        });
    });

    $('body').on('click', '.link-edit-card-readers', function () {
        $("#loading-indicator").show();
        $('#card-readers-modal').find('.modal-content').load($(this).data('href'), function () {
            var thisModal = $('#card-readers-modal');
            thisModal.modal('show');

            $(".select2").select2({
                dropdownParent: $("#card-readers-modal")
            });

            $("#loading-indicator").hide();
        });
    });

});