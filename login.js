const express = require('express');
const session = require('express-session');
const bodyParser = require('body-parser');

const app = express();

// Middleware to parse form data
app.use(bodyParser.urlencoded({ extended: true }));

// Session setup
app.use(session({
    secret: 'secret-key',
    resave: false,
    saveUninitialized: true
}));

// Fake user database
const user = {
    username: "admin",
    password: "1234"
};

// Home route
app.get('/', (req, res) => {
    if (req.session.loggedIn) {
        res.send(`Welcome ${req.session.username} <br><a href="/logout">Logout</a>`);
    } else {
        res.send(`
            <form method="POST" action="/login">
                <input name="username" placeholder="Username"/><br>
                <input name="password" type="password" placeholder="Password"/><br>
                <button type="submit">Login</button>
            </form>
        `);
    }
});

// Login route
app.post('/login', (req, res) => {
    const { username, password } = req.body;

    if (username === user.username && password === user.password) {
        req.session.loggedIn = true;
        req.session.username = username;
        res.redirect('/');
    } else {
        res.send('Invalid credentials');
    }
});

// Logout route
app.get('/logout', (req, res) => {
    req.session.destroy(() => {
        res.redirect('/');
    });
});

app.listen(3000, () => console.log("Server running on http://localhost:3000"));