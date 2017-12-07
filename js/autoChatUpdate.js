/**
 * Created by SMITDOSHI on 12/6/17.
 */


$(document).ready(function () {

    var updateInterval = setInterval( function () {
        $.ajax({
            url: 'chatUpdate.php',
            success:function (data) {
                $('#chatDisplay').html(data);
            }
        });
    }, 1000);
});