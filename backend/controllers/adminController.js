const Drug = require('../models/drugModel');
const User = require('../models/userModel');
const bcrypt = require("bcryptjs");
const jwt = require("jsonwebtoken");

// @desc Create New Drug
// @route GET /admin/drugs
// @access Public
const getDrugs = async (req, res) => {
    const drugs = await Drug.find();

    res.status(200).json(drugs); // should initially return an empty array
}

// @desc Create New Drug
// @route POST /admin/drugs
// @access Private
const addDrug = async (req, res) => {
    if (!req.body.name){
        res.status(400);
        throw new Error('Please add a Drug Name');
    }

    if(!req.body.category){
        res.status(400);
        throw new Error('Please add a Drug Category');
    }

    if(!req.body.img) {
        res.status(400);
        throw new Error('Please add a Drug Image');
        }

    const drugCreated = await Drug.create({
        name: req.body.name,
        category: req.body.category,
        img: req.body.img
    })

    res.status(200).json(drugCreated);
}

// @desc edit New Drug
// @route PUT /admin/drug
// @access Private
const editDrug = async (req, res) => {
    // 1. Query db for id
    const drug = await Drug.findById(req.params.id);
    // 2. Check if drug has been found, if not throw err
    if(!drug){
        res.status(400);
        throw new Error('Drug Not Found');
    }
    // 3. Update drug
    const updatedDrug = await Drug.findByIdAndUpdate(req.params.id, req.body, {
        new: true
    })

    res.status(200).json(updatedDrug);
}

// @desc Create New Drug
// @route DELETE /admin/drug
// @access Private
const deleteDrug = (req, res) => {
    res.status(200).json({message: "Delete new Drug"});
}

// @desc Get New User
// @route GET /admin/users
// @access Public
const getUsers = async (req, res) => {
    //1. Query db
    const users = await User.find();

    //2. Return response
    res.status(200).json(users);
}

// @desc Create New User
// @route POST /admin/users
// @access Private(admin-side) / Public
const addUser = async (req, res) => {
    // 1. Require Input Data
    const { name, email, password } = req.body;

    if(!name || !email || !password) {
        res.status(400);
        throw new Error('Please Add All Fields');
    }

    // 2. Check if user given already exists
    const userExists = await User.findOne({email});

    if(userExists){
        res.status(400);
        throw new Error('User Already Exists');
    }

    // 3. Begin processing of new user ... start with hashing the password:
    const salt = await bcrypt.genSalt(10);
    const hashedPassword = await bcrypt.hash(password, salt);

    // 4. You can now create a user:
    const user = await User.create({
        name,
        email,
        password: hashedPassword
    });

    // 5. Return Response after creating user, else Throw Error due to invalidity of data:
    if(user){
        res.status(201).json({
            _id: user.id,
            name: user.name,
            email: user.email,
            token: generateToken(user._id)
        })
    } else {
        res.status(400);
        throw new Error("Invalid User Details");
    }

    // res.status(200).json({message: "Add New User"});    
}

const editUser = async (req, res) => {
    // 1. Query DB
    const user = await User.findById(req.params.id);
    // 2. Check if user was found
    if(!user){
        res.status(400);
        throw new Error("User Not Found");
    }
    // 3. Update User
    const editedUser = await User.findByIdAndUpdate(req.params.id, req.body, { new: true });
    // 4. Return response
    res.status(200).json(editedUser);
}

const deleteUser = async (req, res) => {
    // 1. Query DB
    const user = await User.findById(req.params.id);

    // 2. Check if User was found
    if(!user){
        res.status(400);
        throw new Error("User Not Found");
    }
    // 3. Delete User
    await user.deleteOne();

    // 4. Return Response
    res.status(200).json({id: user.id});
}

const generateToken = id => jwt.sign({ id }, process.env.JWT_SECRET, { expiresIn: '30d' });

module.exports = {
    getDrugs,
    addDrug,
    editDrug,
    deleteDrug,
    getUsers,
    addUser,
    editUser,
    deleteUser
}