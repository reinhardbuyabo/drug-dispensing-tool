const express = require('express');
const dotenv = require("dotenv");

// App Config
const app = express();
dotenv.config();
const port = process.env.PORT;

// Middlware
// DB Config
// API Endpoints
app.get('/', (req, res) => {
    res.status(200).json({message: "Initial Commit"})
})
// Listener
app.listen(port, () => console.log(`Listening on port ${port}`));