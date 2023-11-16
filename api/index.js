const express = require("express");
const app = express();
const mongoose = require("mongoose");
const dotenv = require("dotenv");

const PORT = 3000;
dotenv.config();

mongoose.connect(process.env.MONGO_URI);

app.listen(PORT, ()=>{
    console.log(`Listening on port ${PORT}`);
});