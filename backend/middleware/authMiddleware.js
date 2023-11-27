const jwt = require('jsonwebtoken');
const asyncHandler = require('express-async-handler');
const User  = require('../models/userModel');

const protect = asyncHandler(async(req, res, next) => {
    let token

    if (req.headers.authorization && req.headers.authorization.startsWith('Bearer')) { // make sure it's a Bearer Token
        try {
            // Get Token from header
            token = req.headers.authorization.split(' ')[1] // getting from string  and turn it into array  ... token is the second item

            // Verify Token ... decoding and verifying token
            const decoded = jwt.verify(token, process.env.JWT_SECRET);

            // Get User from the token
            req.user = await User.findById(decoded.id).select('-password'); // we don't want the password hash so we select -password(minus)

            next();
        } catch (error) {
            console.log(error);
            res.status(401);
            throw new Error('Not Authorized');
        }  
    }

    if(!token) {
        res.status(401);
        throw new Error('Not authorized, no token');
    }
})

module.exports = {
    protect
}