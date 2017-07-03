$(function () {

    /********************************/
    /**********   GolfClub  **********/
    /********************************/

    // Show Add GolfClub Modal
    $('body').on('click', '#createGolfClub', function () {
        $('#addGolfModal').find('.golfModalContent').load($(this).data('href'), function () {
            var thisModal = $('#addGolfModal');
            //setTimeout(function () {
            thisModal.modal('show');
            $("#loading-indicator").hide();
            //}, 1000);
        });
        $("#loading-indicator").show();
    });

    // Show Edit GolfClub Modal
    $('body').on('click', '#editGolfClub', function () {
        $('#editGolfModal').find('.golfModalContent').load($(this).attr('value'), function () {
            var thisModal = $('#editGolfModal');
            //setTimeout(function () {
            thisModal.modal('show');
            $("#loading-indicator").hide();
            //}, 1000);
        });
        $("#loading-indicator").show();
    });

    // Submit GolfClub Form
    $('body').on('click', '#btnSubmitGolfClub', function () {
        $('.golfModalContent form').submit();
    });

    // Club Logo Change
    $('body').on('change', "#ClubLogo", function () {
        readURL(this);
    });


    /********************************/
    /**********   Golfer   ************/
    /********************************/

    // Show Add Golfer Modal
    $('body').on('click', '#createGolfer', function () {
        $('#addGolferModal').find('.golferModalContent').load($(this).data('href'), function () {
            var thisModal = $('#addGolferModal');
            //setTimeout(function () {
            thisModal.modal('show');
            $("#loading-indicator").hide();
            //}, 1000);
        });
        $("#loading-indicator").show();
    });

    // Show Edit Golfer Modal
    $('body').on('click', '#editGolfer', function () {
        $('#editGolferModal').find('.golferModalContent').load($(this).attr('value'), function () {
            var thisModal = $('#editGolferModal');
            //setTimeout(function () {
            thisModal.modal('show');
            $("#loading-indicator").hide();
            //}, 1000);
        });
        $("#loading-indicator").show();
    });

    $('body').on('change', '#player-firstclubid', function () {
        $('#player-ismemberofanotherclub option').removeAttr('selected');
        $('#player-ismemberofanotherclub').prop('selectedIndex', 0);
        $("#player-otherclubname option").removeAttr('selected');
        $("#player-otherclubname option").removeAttr('disabled');
        $('#player-otherclubname').prop('selectedIndex', 0);
        $('#player-otherclubname').attr('disabled', 'disabled');
    });

    $('body').on('change', '#player-ismemberofanotherclub', function () {
        if ($(this).val() === '1') {
            //No
            $("#player-otherclubname option").removeAttr('selected');
            $("#player-otherclubname option").removeAttr('disabled');
            $('#player-otherclubname').prop('selectedIndex', 0);
            $('#player-otherclubname').attr('disabled', 'disabled');
        } else {
            //Yes
            var clubId1 = $('#player-firstclubid').val();
            $('#player-otherclubname').removeAttr('disabled');
            $("#player-otherclubname option[value='" + clubId1 + "']").attr('disabled', 'disabled');
        }
    });

    // Submit Golfer Form
    $('body').on('click', '#btnSubmitGolfer', function () {
        $('.golferModalContent form').submit();
    });

    $('#datepicker').datepicker();

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

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.showClubLogo img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
