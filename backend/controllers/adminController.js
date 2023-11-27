// @desc Create New Drug
// @route GET /admin/drug
// @access Public
const getDrugs = (req, res) => {
    res.status(200).json({message: "Get Drugs"});
}

// @desc Create New Drug
// @route POST /admin/drug
// @access Private
const addDrug = (req, res) => {
    res.status(200).json({message: "Create new Drug"});
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