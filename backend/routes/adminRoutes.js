const express = require('express');
const { getDrugs, addDrug } = require('../controllers/adminController');
const router = express.Router();

router.route('/drug').get(getDrugs).post(addDrug);

module.exports = router;
