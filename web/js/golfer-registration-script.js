/* global $ */

$(function () {

    $('#registerSuccess').modal('show');

    $('.btnRegisterGolfer').on('click', function (e) {
        if ($('#golfer-golfer_ismemberofanotherclub').val() == 2) {
            //alert($('#golfer-golfer_otherclubid').val());
            if ($('#golfer-golfer_otherclubid').val() == '') {
                $('.field-golfer-golfer_otherclubid').addClass('has-error');
                $('.field-golfer-golfer_otherclubid').find('#golfer-golfer_otherclubid').attr('aria-invalid', true);
                $('.field-golfer-golfer_otherclubid').find('.help-block').addClass('help-block-error').html('Please select Other Club');
                return false;
            } else {
                $('.field-golfer-golfer_otherclubid').removeClass('has-error');
                $('.field-golfer-golfer_otherclubid').find('#golfer-golfer_otherclubid').removeAttr('aria-invalid');
                $('.field-golfer-golfer_otherclubid').find('.help-block').removeClass('help-block-error').html('');
            }
        }
    });

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
            $('.field-golfer-golfer_otherclubid').removeClass('has-error');
            $('.field-golfer-golfer_otherclubid').find('#golfer-golfer_otherclubid').attr('aria-invalid', false);
            $('.field-golfer-golfer_otherclubid').find('.help-block').removeClass('help-block-error').html('');
        } else {
            //Yes
            var clubId1 = $('#golfer-golfer_firstclubid').val();
            $('#golfer-golfer_otherclubid').removeAttr('disabled');
            $("#golfer-golfer_otherclubid option[value='" + clubId1 + "']").attr('disabled', 'disabled');
            $('.field-golfer-golfer_otherclubid').addClass('has-error');
            $('.field-golfer-golfer_otherclubid').find('#golfer-golfer_otherclubid').attr('aria-invalid', true);
            $('.field-golfer-golfer_otherclubid').find('.help-block').addClass('help-block-error').html('Please select Other Club');

        }
    });

//    $('#golfer-golfer_otherclubid').on('change', function () {
//        if ($(this).val() == '') {
//            $('.field-golfer-golfer_otherclubid').addClass('has-error');
//            $('.field-golfer-golfer_otherclubid').find('#golfer-golfer_otherclubid').attr('aria-invalid', true);
//            $('.field-golfer-golfer_otherclubid').find('.help-block').addClass('help-block-error').html('Please select Other Club');
//        }
//    });

    //var dt = new Date();
    //dt.setFullYear(new Date().getFullYear() - 18);
    $("#golfer-golfer_dateofbirth").datepicker({
        autoclose: !0,
        todayHighlight: !0,
        // endDate: dt,
        allowInputToggle: true,
        format: 'dd-mm-yyyy'
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