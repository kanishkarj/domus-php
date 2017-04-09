/**
 * Created by kanishkarj on 8/4/17.
 */

$(Document).ready(function () {

    $('#container').load("php/insert_main.php");
    $('#search-form').submit(false);
    $('#srch-term').on('input',function () {
        var q = $('#srch-term').val();
        $('#container').load("php/search.php?q=" + q);
    });
    function getQueryStringValue (key) {
        return decodeURIComponent(window.location.search.replace(new RegExp("^(?:.*[&\\?]" + encodeURIComponent(key).replace(/[\.\+\*]/g, "\\$&") + "(?:\\=([^&]*))?)?.*$", "i"), "$1"));
    }
    var sq =getQueryStringValue("search");
    if(sq.length>0){
        a_onClick();
        $('#srch-term').attr('value',sq);
        $('#container').load("php/search.php?q=" + sq);
    }
});
function search_onClick() {
    var q = $('#srch-term').val();
    $('#container').load("php/search.php?q=" + q);
}

