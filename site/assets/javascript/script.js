/*jslint browser: true*/
/*global $*/

'use strict';

var line_max_length = 16;
var warning_alert_length = 5;

function perview(input, output, count) {
    $(input).keyup(function () {
        $(output).text($(this).val());

        var character_count = $(this).val().length;

        $(count).text(line_max_length - character_count);

        if (character_count < line_max_length - warning_alert_length) {
            $(input).parent().removeClass('has-error');
            $(input).parent().removeClass('has-warning');
        }

        if (character_count >= line_max_length - warning_alert_length) {
            $(input).parent().removeClass('has-error');
            $(input).parent().addClass('has-warning');
        }

        if (character_count > line_max_length) {
            $(input).parent().removeClass('has-warning');
            $(input).parent().addClass('has-error');
        }
    });
}

function redirectWhenLockFileDisappears() {
    if ($('body').hasClass('lock-file-activated')) {
        $.ajax({
            type: 'GET',
            url: './lock.txt',
            success: function(resp) {
                return true;
            },
            statusCode: {
                404: function() {
                    window.location = ('./index.php');
                }
            }
        })
    }
}

$(document).ready(function () {
    perview('#input-line-1', '#js-line-1', '#input-line-1-character-count');
    perview('#input-line-2', '#js-line-2', '#input-line-2-character-count');
    setInterval(redirectWhenLockFileDisappears, 3000);
});
