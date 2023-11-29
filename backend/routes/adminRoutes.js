const express = require('express');
const { getDrugs, addDrug, editDrug, deleteDrug, getUsers, addUser, editUser, deleteUser, selfRegisteredUserToken } = require('../controllers/adminController');
const router = express.Router();

router.route('/drugs').get(getDrugs).post(addDrug);
router.route('/drugs/:id').put(editDrug).delete(deleteDrug);

router.route('/users').get(getUsers).post(addUser);
router.route('/users/:id').put(editUser).delete(deleteUser);
router.route('/users/generateToken/:id').put(selfRegisteredUserToken);

module.exports = router;
