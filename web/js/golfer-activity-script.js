/* global $ */

$(function () {

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

    $('body').on('change', '#playeractivity-cardid', function () {
        var card_id = $(this).val();
        var url = $(this).data('url');

        $.ajax({
            url: url,
            data: {id: card_id},
            type: 'GET',
            dataType: 'JSON',
            success: function (response) {
                if (response.status == true) {
                    var html = '<p><strong>' + response.name + '</strong> from <strong>' + response.club + '</strong>.</p>';
                    $('.show-golfer-information .col-md-12').html(html);
                    $('.show-golfer-information').show();
                } else {
                    $('.show-golfer-information .col-md-12').html('');
                    $('.show-golfer-information').hide();
                }
            }
        });
    });

    $('body').on('change', '#playeractivity-club_id', function () {
        var club_id = $(this).val();
        var url = $(this).data('url');

        $.ajax({
            url: url,
            data: {id: club_id},
            type: 'GET',
            dataType: 'JSON',
            success: function (response) {
                if (response.status == true) {
                    ///var html = '<option value="">Select Reader</option>';
                    var selected = '';
                    $.each(response.list, function (index, item) {
                        html += '<option value="' + index + '">' + item + '</option>';
                    });
                    $('#playeractivity-readerid').html(html);

                    console.log($('#playeractivity-readerid option').length);
                    if ($('#playeractivity-readerid option').length > 1) {
                        $('.show-card-readers').show();
                    }
                } else {
                    var html = '<option value="">Select Reader</option>';
                    $('#playeractivity-readerid').html(html);
                    $('.show-card-readers').hide();
                }
            }
        });
    });

});