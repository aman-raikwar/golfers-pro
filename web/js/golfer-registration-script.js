$(function () {
    
    $('#registerSuccess').modal('show');

    $('body').on('change', '#golferregitration-firstclubid', function () {
        if ($(this).val() !== '') {
            $('#golferregitration-ismemberofanotherclub').removeAttr('disabled');
        } else {
            $('#golferregitration-ismemberofanotherclub').attr('disabled', 'disabled');
        }

        $('#golferregitration-ismemberofanotherclub').prop('selectedIndex', 0);
        $("#golferregitration-otherclubname option").removeAttr('selected');
        $("#golferregitration-otherclubname option").removeAttr('disabled');
        $('#golferregitration-otherclubname').prop('selectedIndex', 0);
        $('#golferregitration-otherclubname').attr('disabled', 'disabled');
    });

    $('body').on('change', '#golferregitration-ismemberofanotherclub', function () {
        if ($(this).val() === '1') {
            //No
            $("#golferregitration-otherclubname option").removeAttr('selected');
            $("#golferregitration-otherclubname option").removeAttr('disabled');
            $('#golferregitration-otherclubname').prop('selectedIndex', 0);
            $('#golferregitration-otherclubname').attr('disabled', 'disabled');
        } else {
            //Yes
            var clubId1 = $('#golferregitration-firstclubid').val();
            $('#golferregitration-otherclubname').removeAttr('disabled');
            $("#golferregitration-otherclubname option[value='" + clubId1 + "']").attr('disabled', 'disabled');
        }
    });

    var dt = new Date();
    dt.setFullYear(new Date().getFullYear() - 18);
    $("#golferregitration-dateofbirth").datepicker({
        autoclose: !0,
        todayHighlight: !0,
        endDate: dt,
        allowInputToggle: true,
        format: 'yyyy-mm-dd'
    });

    $('.show-datepicker').click(function (event) {
        event.preventDefault();
        $("#golferregitration-dateofbirth").focus();
    });

    // Get County from Country Id
    $('body').on('change', '#golfcourse-country', function () {
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
                $('#golfcourse-county').html(html);
            }
        })
    });

});