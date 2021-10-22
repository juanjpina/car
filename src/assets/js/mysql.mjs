import { conection } from './conection.mjs';
// const mysql = require('mysql');

// const conection = mysql.createConnection({
//     host: 'localhost',
//     user: 'root',
//     password: '',
//     database: 'car'
// });

// conection.connect((err) => {
//     if (err) throw err
//     console.log('conectados')

// });

conection.query("SELECT * FROM user WHERE email LIKE 'test@test.com'", (err, rows) => {
    if (err) throw err
    console.log(rows)

});
let emails = document.getElementById('email');

emails.addEventListener("keyup", () => {
    let mail = emails.value;

    console.log(mail);

});

// function sendRequest() {
//     const xhr = new XMLHttpRequest();
//     xhr.open("POST", "src/controllers/newLoginControllers.php", true);
//     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//     xhr.onreadystatechange = function() {


//     }

//     // xhr.send(mail);
// }








//     const xhr = new XMLHttpRequest();
//     xhr.open("POST", "src/controllers/users/newLoginController.php");
//     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//     xhr.send('mail=' + mail);
//     xhr.onreadystatechange = function () {
//         console.log(222);
//         console.log(xhr.responseText);

//     }


// });











// conection.end();