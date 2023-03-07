var btn1 = document.querySelector('.actionMap');
var btn2 = document.querySelector('.actionList');
var body = document.querySelector("body")
var blabla = document.querySelector(".blabla")

btn1.addEventListener('click', function() {
    body.classList.remove("listView")
    document.body.classList.add("mapView");

}, false);
btn2.addEventListener('click', function() {
    body.classList.remove("mapView")
    document.body.classList.add("listView");

}, false);

blabla.addEventListener('click', function() {
    var element = document.querySelector(".blablacontent");
    if (element.style.display === "none") {
        element.style.display = "block";
    } else {
        element.style.display = "none";
    }
}, false);

document.querySelector(".blablacontent .close").addEventListener('click', function() {
    var element = document.querySelector(".blablacontent");
    element.style.display = "none";
}, false);



document.onclick = function(e) {

    let width = e.target.offsetWidth;
    let height = e.target.offsetHeight;
    scrollimgto(width, height)


}