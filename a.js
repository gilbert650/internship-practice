       const express=require("express");
const mysql=require("mysql2/Promise");
const app=express();
const port=5000;
 app.listen(port,(res,req) => {
console.log("server is running on${port}");
 });

// middleware for that application
app.use(express.json());
