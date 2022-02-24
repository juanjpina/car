/**
 * moves the icons - login
 */

let i1 = document.getElementById("image1");

let turnAngle = 180;
const image1 = () => {
    turnAngle += 180;
    i1.setAttribute("style", "transform: rotatey(" + turnAngle + "deg)");
    i1.style.transitionDuration = "2s"
}

setTimeout(image1, 2000);

i1.addEventListener('mouseover', (event) => {
    i1.setAttribute("style", "transform: rotatey(360 deg)");

})