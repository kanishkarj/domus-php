/**
 * Created by kanishkarj on 14/5/17.
 */



var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex-1].style.display = "block";
}

var converter = new showdown.Converter(),
    text      = document.getElementById("project_desc").innerHTML,
    html      = converter.makeHtml(text);
document.getElementById("project_desc").innerHTML = html;
