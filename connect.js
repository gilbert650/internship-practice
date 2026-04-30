const mysql = require('mysql2/promise');
require?('dotenv').config();
const con = musql.cretepool({
    host:process.env.db_host,
    user:procces.env.db_user,
    passwor:process.env.db_password,
    database:process.env.db_name
});

module.exports = con;
