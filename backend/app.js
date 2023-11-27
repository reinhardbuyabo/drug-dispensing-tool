const express = require('express');
const dotenv = require("dotenv");
const { urlencoded } = require('body-parser');
const connectDB = require('./config/db');
const { errorHandler } = require('./middleware/errorMiddleware');

// App Config
const app = express();
dotenv.config();
const port = process.env.PORT;

// Middlware
app.use(express.json());
app.use(urlencoded({extended: false}));

// DB Config
connectDB();

// API Endpoints
app.use("/admin", require('./routes/adminRoutes'));
app.use("/user", require('./routes/userRoutes'));

// Error handling
app.use(errorHandler);

// Listener
app.listen(port, () => console.log(`Listening on port ${port}`));