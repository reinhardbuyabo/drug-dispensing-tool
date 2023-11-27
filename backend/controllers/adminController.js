const Drug = require('../models/drugModel');
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

module.exports = {
    getDrugs,
    addDrug,
    editDrug,
    deleteDrug
}