/**
 * Created by kanishkarj on 8/4/17.
 */

$(Document).ready(function () {
   //loads all projects
    $('#container').load("php/insert_main.php");
    //disables the normal functioning of search button
    $('#search-form').submit(false);
    // this function performs the search whenever the contents are changed..
    $('#srch-term').on('input',function () {
        var q = $('#srch-term').val();
        $('#container').load("php/search.php?q=" + q);
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
        $('#container').load("php/search.php?q=" + sq);
    }
});
/* this function is executed when the search button is clicked
   this sends search query to search.php, and the result is flushed into #container
*/
function search_onClick() {
    var q = $('#srch-term').val();
    $('#container').load("php/search.php?q=" + q);
}

