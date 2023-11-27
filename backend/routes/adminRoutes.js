const express = require('express');
const { getDrugs, addDrug, editDrug, deleteDrug } = require('../controllers/adminController');
const router = express.Router();

router.route('/drugs').get(getDrugs).post(addDrug);
router.route('/drugs/:id').put(editDrug).delete(deleteDrug);

module.exports = router;
