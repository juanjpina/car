const image1 = () => {
    let turnAngle = 180;
    let i1 = document.getElementById("image1");
    i1.setAttribute("style", "transform: rotatey(" + turnAngle + "deg)");
    turnAngle += 180;

    console.log(turnAngle++);
}


const image2 = () => {
    let turnAngle = 360;
    let i1 = document.getElementById("image1");
    i1.setAttribute("style", "transform: rotatey(" + turnAngle + "deg)");
    turnAngle = turnAngle + 180;
    console.log(turnAngle);
}

setInterval(image1, 6000);
setInterval(image2, 12000);
// setInterval(() => {
//     let k=360;
//     let i6 = document.getElementById("image2");
//     // k += 180;
//     i6.style.transform = "rotatey(" + k + "deg)";
//     i6.style.transitionDuration = "0.9s"

// }, 5000);