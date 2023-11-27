const express = require('express');
const dotenv = require("dotenv");

// App Config
const app = express();
dotenv.config();
const port = process.env.PORT;

// Middlware
// DB Config
// API Endpoints
app.use("/admin", require('./routes/adminRoutes'));
app.use("/user", require('./routes/userRoutes'));

// Listener
app.listen(port, () => console.log(`Listening on port ${port}`));