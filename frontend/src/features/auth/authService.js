// Strictly for making the HTTP Request, and sending data back, and setting the local storage ...
import axios from 'axios'

const API_URL = '/api/users'; // ? // so this goes to our url ... // it looks at 'localhost:3000' instead of 'localhost:5000' or we could go to pacakge.json and add proxy ...  

// Register User
const register = async (userData) => {
    const response = await axios.post(`${API_URL}/register`, userData); // sending request ... with userData fetched from register component

    if(response.data) { // we wanna check if we have the data ...
        localStorage.setItem('user', JSON.stringify(response.data)); // we have to put strings in localStorage ... that data will include our token
    }

    return response.data;
}

// Login User
const login = async (userData) => {
    const response = await axios.post(`${API_URL}/login`, userData);

    if(response.data) {
        localStorage.setItem('user', JSON.stringify(response.data));
    }

    return response.data;
}

// Logout User
const logout = () => {
    localStorage.removeItem('user');
}

const authService = { // any functions we export, we wanna put them here
    register,
    login,
    logout
}

export default authService