$(document).ready(function ($) {
    var shortenedUrl = $("#shortened_url");
    var shortenedUrlCopy = $("#shortened_url_copy");

    shortenedUrl.focus(function () {
        $(this).select();
    });

    // Copy to clipboard button
    var clientTarget = new ZeroClipboard(shortenedUrlCopy, {
        moviePath: "https://cdnjs.cloudflare.com/ajax/libs/zeroclipboard/2.2.0/ZeroClipboard.swf",
        debug: false
    });

    clientTarget.on( "aftercopy", function(event) {
        $('#click-to-copy-success').fadeIn().delay(1500).slideUp();
    });
});