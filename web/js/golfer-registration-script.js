/* global $ */

$(function () {
    
    $('#registerSuccess').modal('show');

    $('body').on('change', '#golfersignupform-golfer_firstclubid', function () {
        if ($(this).val() !== '') {
            $('#golfersignupform-golfer_ismemberofanotherclub').removeAttr('disabled');
        } else {
            $('#golfersignupform-golfer_ismemberofanotherclub').attr('disabled', 'disabled');
        }

        $('#golfersignupform-golfer_ismemberofanotherclub').prop('selectedIndex', 0);
        $("#golfersignupform-golfer_otherclubid option").removeAttr('selected');
        $("#golfersignupform-golfer_otherclubid option").removeAttr('disabled');
        $('#golfersignupform-golfer_otherclubid').prop('selectedIndex', 0);
        $('#golfersignupform-golfer_otherclubid').attr('disabled', 'disabled');
    });

    $('body').on('change', '#golfersignupform-golfer_ismemberofanotherclub', function () {
        if ($(this).val() === '1') {
            //No
            $("#golfersignupform-golfer_otherclubid option").removeAttr('selected');
            $("#golfersignupform-golfer_otherclubid option").removeAttr('disabled');
            $('#golfersignupform-golfer_otherclubid').prop('selectedIndex', 0);
            $('#golfersignupform-golfer_otherclubid').attr('disabled', 'disabled');
        } else {
            //Yes
            var clubId1 = $('#golfersignupform-golfer_firstclubid').val();
            $('#golfersignupform-golfer_otherclubid').removeAttr('disabled');
            $("#golfersignupform-golfer_otherclubid option[value='" + clubId1 + "']").attr('disabled', 'disabled');
        }
    });

    var dt = new Date();
    dt.setFullYear(new Date().getFullYear() - 18);
    $("#golfersignupform-golfer_dateofbirth").datepicker({
        autoclose: !0,
        todayHighlight: !0,
        endDate: dt,
        allowInputToggle: true,
        format: 'yyyy-mm-dd'
    });

    $('.show-datepicker').click(function (event) {
        event.preventDefault();
        $("#golfersignupform-golfer_dateofbirth").focus();
    });

    // Get County from Country Id
    $('body').on('change', '#golfersignupform-golfer_country', function () {
        var country_id = $(this).val();
        var url = $(this).data('url');

        $.ajax({
            url: url,
            data: {id: country_id},
            type: 'GET',
            dataType: 'JSON',
            success: function (response) {
                var html = '<option value="">Select County</option>';
                if (response.status == true) {
                    $.each(response.counties, function (index, item) {
                        html += '<option value="' + index + '">' + item + '</option>';
                    });
                }
                $('#golfersignupform-golfer_county').html(html);
            }
        });
    });

});