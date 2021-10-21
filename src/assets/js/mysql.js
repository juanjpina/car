const mysql = require('mysql');

const conection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'car'
});

conection.connect((err) => {
    if (err) throw err
    console.log('conectados')

});


conection.query('SELECT * FROM user', (err, rows) => {
    if (err) throw err
    console.log(rows)

})




conection.end();