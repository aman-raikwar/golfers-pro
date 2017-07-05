$(function () {

    // Club Logo Change
    $('body').on('change', "#golfclub_logo", function () {
        readURL(this);
    });

    // Get County from Country Id
    $('body').on('change', '#golfclub-golfclub_countryid', function () {
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
                $('#golfclub-golfclub_countyid').html(html);
            }
        })
    });
});

function readURL(input) {
    if (input.files && input.files[0] && input.files[0].type !== '') {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.showClubLogo img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
