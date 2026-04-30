const express=require("express")
const app=express();
const port=5000;

const mysql2=require('mysql2');
app.use(express.json());

    //insert
    app.post('/insert',async(req,res)) => {
     try {
        const{p_name,price,description} = req.body;
        const insertQuery ="INSERT INTO `product`(`p_name`, `price`, `description`) VALUES ('?,?,?')";
        
     } catch (error) {
        
     }
    }
