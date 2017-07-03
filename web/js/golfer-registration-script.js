/* global $ */

$(function () {
    
    $('#registerSuccess').modal('show');

    $('body').on('change', '#user-firstclubid', function () {
        if ($(this).val() !== '') {
            $('#user-ismemberofanotherclub').removeAttr('disabled');
        } else {
            $('#user-ismemberofanotherclub').attr('disabled', 'disabled');
        }

        $('#user-ismemberofanotherclub').prop('selectedIndex', 0);
        $("#user-otherclubname option").removeAttr('selected');
        $("#user-otherclubname option").removeAttr('disabled');
        $('#user-otherclubname').prop('selectedIndex', 0);
        $('#user-otherclubname').attr('disabled', 'disabled');
    });

    $('body').on('change', '#user-ismemberofanotherclub', function () {
        if ($(this).val() === '1') {
            //No
            $("#user-otherclubname option").removeAttr('selected');
            $("#user-otherclubname option").removeAttr('disabled');
            $('#user-otherclubname').prop('selectedIndex', 0);
            $('#user-otherclubname').attr('disabled', 'disabled');
        } else {
            //Yes
            var clubId1 = $('#user-firstclubid').val();
            $('#user-otherclubname').removeAttr('disabled');
            $("#user-otherclubname option[value='" + clubId1 + "']").attr('disabled', 'disabled');
        }
    });

    var dt = new Date();
    dt.setFullYear(new Date().getFullYear() - 18);
    $("#user-dateofbirth").datepicker({
        autoclose: !0,
        todayHighlight: !0,
        endDate: dt,
        allowInputToggle: true,
        format: 'yyyy-mm-dd'
    });

    $('.show-datepicker').click(function (event) {
        event.preventDefault();
        $("#user-dateofbirth").focus();
    });

    // Get County from Country Id
    $('body').on('change', '#user-country', function () {
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
                $('#user-county').html(html);
            }
        });
    });

});