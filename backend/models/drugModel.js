const mongoose = require('mongoose');

const drugSchema = mongoose.Schema({
    user: {
        type: mongoose.Schema.Types.ObjectId,
        ref: 'User'
    },
    img: {
        type: String,
        required: true,
        ref: 'Image'
    },
    name: {
        type: String,
        required: [true, 'Please add a name']
    },
    category: {
        type: String,
        required: [true, 'Please add a category']
    }, 
});

module.exports = mongoose.model('Drug', drugSchema);