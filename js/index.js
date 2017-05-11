/**
 * Created by kanishkarj on 8/4/17.
 */

$(Document).ready(function () {

    //SELECT * FROM `input` ORDER BY date_upl DESC
   //loads all projects
    $('#container').load("app/controllers/insert_main.php?q=date_upl+DESC");
    //disables the normal functioning of search button
    $('#search-form').submit(false);
    // this function performs the search whenever the contents are changed..
    $('#srch-term').on('input',function () {
        var v = $('#srch-term').val();
        var q = v.replace(/ /g, '+');
        $('#container').load("app/controllers/search.php?q=" + q);
    });
    //returns gets the search query from the url
    function getQueryStringValue (key) {
        return decodeURIComponent(window.location.search.replace(new RegExp("^(?:.*[&\\?]" + encodeURIComponent(key).replace(/[\.\+\*]/g, "\\$&") + "(?:\\=([^&]*))?)?.*$", "i"), "$1"));
    }
    //the value of the search query passed from other pages
    var sq =getQueryStringValue("search");
    //checks if the pages was redirected from some other page, if it was then is loads search content, else loads all the projects.
    if(sq.length>0){
        a_onClick();
        $('#srch-term').attr('value',sq);
        $('#container').load("app/controllers/search.php?q=" + sq);
    }
    $("#select-sort").on('change',function () {
        var sel_id = $("#select-sort").val();
        switch(sel_id){
            case "0" :$('#container').load("app/controllers/insert_main.php?q=date_upl+DESC");
                break;
            case "1" : $('#container').load("app/controllers/insert_main.php?q=date_upl+ASC");
                break;
            case "2" :$('#container').load("app/controllers/insert_main.php?q=week_no+DESC");
                break;
            case "3" :$('#container').load("app/controllers/insert_main.php?q=week_no+ASC");
                break;
        }
    });
});
/* this function is executed when the search button is clicked
   this sends search query to search.php, and the result is flushed into #container
*/
function search_onClick() {
    var v = $('#srch-term').val();
    var q = v.replace(/ /g, '+');
    $('#container').load("app/controllers/search.php?q=" + q);
}


