let mcEmail = document.getElementById('mcEmail')
mcEmail.addEventListener("keyup", () => {
    let mail = mcEmail.value;
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "<?= $router->generate('sendAdmin') ?>");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded", true);
    xhr.send('mail=' + mail);
    xhr.onreadystatechange = function () {
        // console.log(xhr.responseText);
        if (xhr.responseText !== 'ok') {
            mcEmail.style.border = '4px solid green';
        } else {
            mcEmail.style.border = '4px solid red';
        }
    }
});