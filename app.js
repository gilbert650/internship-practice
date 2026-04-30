const express = require("express");
const mysql = require("mysql2/promise");
const fs = require("fs");

const app = express();
const PORT = 5000;


app.use(express.json());

// MySQL connection
const con = mysql.createPool({
  host: "localhost",
  user: "root",
  password: "",
  database: "shop"
});

// ---------------- PRODUCT ROUTES ----------------

// Add product
app.post('/add_produ', async (req, res) => {
  try {
    const { p_name, price, description } = req.body;

    const insertQuery = `
      INSERT INTO product (p_name, price, description)
      VALUES (?, ?, ?)
    `;

    await con.execute(insertQuery, [p_name, price, description]);

    res.status(201).json({ message: "Product inserted ✅" });

  } catch (error) {
    res.status(500).json({ error: error.message });
  }
});

// Get all products
app.get('/view', async (req, res) => {
  try {
    const [rows] = await con.execute('SELECT * FROM product');

    if (rows.length === 0) {
      return res.status(404).json({ message: "Empty stock" });
    }

    res.status(200).json(rows);

  } catch (error) {
    res.status(500).json({ error: error.message });
  }
});

// Get product by ID
app.get('/view_product/:id', async (req, res) => {
  try {
    const { id } = req.params;

    const [rows] = await con.execute(
      "SELECT * FROM product WHERE id = ?",
      [id]
    );

    if (rows.length === 0) {
      return res.status(404).json({ message: "Product not found" });
    }

    res.status(200).json(rows[0]);

  } catch (error) {
    res.status(500).json({ error: error.message });
  }
});

// ---------------- FILE-BASED USER DELETE ----------------

app.delete("/users/:id", (req, res) => {
  const id = parseInt(req.params.id);

  fs.readFile("data.json", "utf8", (err, data) => {
    if (err) {
      return res.status(500).json({ message: "Error reading file" });
    }

    let users = JSON.parse(data);

    const userExists = users.find(user => user.id === id);
    if (!userExists) {
      return res.status(404).json({ message: "User not found" });
    }

    const updatedUsers = users.filter(user => user.id !== id);

    fs.writeFile("data.json", JSON.stringify(updatedUsers, null, 2), err => {
      if (err) {
        return res.status(500).json({ message: "Error writing file" });
      }

      res.json({ message: "User deleted successfully" });
    });
  });
});

// Start server
app.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});