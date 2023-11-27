const Drug = require('../models/drugModel');
// @desc Create New Drug
// @route GET /admin/drug
// @access Public
const getDrugs = async (req, res) => {
    const drugs = await Drug.find();

    res.status(200).json(drugs); // should initially return an empty array
}

// @desc Create New Drug
// @route POST /admin/drug
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
const editDrug = (req, res) => {
    res.status(200).json({message: "Edit new Drug"});
}

// @desc Create New Drug
// @route DELETE /admin/drug
// @access Private
const deleteDrug = (req, res) => {
    res.status(200).json({message: "Delete new Drug"});
}

module.exports = {
    getDrugs,
    addDrug,
    editDrug,
    deleteDrug
}