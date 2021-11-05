// const mysql = require('mysql');
import mysql from 'mysql';

export const conection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'car'
});

conection.connect((err) => {
    if (err) throw err
    console.log('conectados')

});
