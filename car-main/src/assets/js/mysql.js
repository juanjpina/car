import { conection } from './conection.js';

conection.query("SELECT * FROM user WHERE email LIKE 'test@test.com'", (err, rows) => {
    if (err) throw err
    console.log(rows)

})

// let emails = document.getElementById('email')

// emails.addEventListener("keyup", () => {
//     let mail = emails.value;
//     console.log(121);
//     console.log(emails.value);
// })

