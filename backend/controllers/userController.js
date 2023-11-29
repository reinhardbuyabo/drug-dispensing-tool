const bcrypt = require("bcryptjs");
const User = require("../models/userModel");
const {generateToken} = require("../controllers/adminController");

// @desc Register User here
// @route POST /user/register
// @access Public
const registerUser = async (req, res) => {
    // 1. Require Input Fields
    const { name, email, password } = req.body;

    if (!name || !email || !password) {
        res.status(400);
        throw new Error("Please Input All Fields");
    }

    // 2. Check if user given already exists
    const userExists = await User.findOne({ email });

    if(userExists) {
        res.status(400);
        throw new Error("User Already Exists");
    }

    // 3. Begin processing new user:
    const salt = await bcrypt.genSalt(10);
    const hashedPassword = await bcrypt.hash(password, salt);

    // 4. Create User
    const user = await User.create({
        name,
        email,
        password: hashedPassword
    });

    if (user) {
        res.status(200).json({
            _id: user.id,
            name: user.name,
            email: user.email
        });
    }
}

// @desc Login User
// @route POST /users/login
// @access Public
const loginUser = async (req, res) => {
    // We need user email and password for login
    const { email, password } = req.body;

    if(!email || !password) {
        res.status(400);
        throw new Error("Please input all fields");
    }

    const user = await User.findOne({email});

    if (user && (await bcrypt.compare(password, user.password))) {
        res.status(200).json({
            _id: user.id,
            name: user.name,
            email: user.email,
            token: generateToken(user.id)
        });
    } else {
        res.status(400);
        throw new Error("Invalid User Details");
    }

}

module.exports = {
    registerUser,
    loginUser
}