/* global $ */

$(function () {

    $('body').on('change', '#golfer-golfer_firstclubid', function () {
        if ($(this).val() !== '') {
            $('#golfer-golfer_ismemberofanotherclub').removeAttr('disabled');
        } else {
            $('#golfer-golfer_ismemberofanotherclub').attr('disabled', 'disabled');
        }

        $('#golfer-golfer_ismemberofanotherclub').prop('selectedIndex', 0);
        $("#golfer-golfer_otherclubid option").removeAttr('selected');
        $("#golfer-golfer_otherclubid option").removeAttr('disabled');
        $('#golfer-golfer_otherclubid').prop('selectedIndex', 0);
        $('#golfer-golfer_otherclubid').attr('disabled', 'disabled');
    });

    $('body').on('change', '#golfer-golfer_ismemberofanotherclub', function () {
        if ($(this).val() === '1') {
            //No
            $("#golfer-golfer_otherclubid option").removeAttr('selected');
            $("#golfer-golfer_otherclubid option").removeAttr('disabled');
            $('#golfer-golfer_otherclubid').prop('selectedIndex', 0);
            $('#golfer-golfer_otherclubid').attr('disabled', 'disabled');
        } else {
            //Yes
            var clubId1 = $('#golfer-golfer_firstclubid').val();
            $('#golfer-golfer_otherclubid').removeAttr('disabled');
            $("#golfer-golfer_otherclubid option[value='" + clubId1 + "']").attr('disabled', 'disabled');
        }
    });

    if ($('#golfer-golfer_otherclubid').is(':disabled') == false) {
        var clubId1 = $('#golfer-golfer_firstclubid').val();
        $("#golfer-golfer_otherclubid option[value='" + clubId1 + "']").attr('disabled', 'disabled');
    }

    var dt = new Date();
    dt.setFullYear(new Date().getFullYear() - 18);
    $("#golfer-golfer_dateofbirth").datepicker({
        autoclose: !0,
        todayHighlight: !0,
        endDate: dt,
        allowInputToggle: true,
        format: 'yyyy-mm-dd'
    });

    $('.show-datepicker').click(function (event) {
        event.preventDefault();
        $("#golfer-golfer_dateofbirth").focus();
    });

    // Get County from Country Id
    $('body').on('change', '#golfer-golfer_country', function () {
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
                $('#golfer-golfer_county').html(html);
            }
        });
    });

});