// Auth Part of our Global State

// This is where our reducers and initial state goes ... we could call it users, but we're not using users as a resource

import { createSlice, createAsyncThunk } from "@reduxjs/toolkit" // Thunk functions ... middleware ... so that we can have asynchronous functions and update state, with what we're getting back from the server ... this makes it easier
import authService from './authService'

const user = JSON.parse(localStorage.getItem('user')) // we're looking for user in localStorage within browser

// initial state pertaining to user
const initialState = {
    user: user ? user : null,
    isError: false,
    isSuccess: false, //
    isLoading: false, // if you wanna show a Spinner
    message: ''
}

// Register ... we can have a service that handles all the http stuff ... we're using axios also to make request
export const register = createAsyncThunk('auth/register',  async (user, thunkAPI) => {
// 1st arg: user: is passed from the register component
// 2nd arg: thunkAPI has a couple things we're gonna use

try {
    // where we make our request
    return await authService.register(user); // created in authService // making request there ... // here we are returning a promise ... whose resolution contains user data
} catch (error) {
    const message = (error.response && error.response.data && error.response.data.message) || error.message || error.toString()
    return thunkAPI.rejectWithValue(message); //  this returns error message(asynchronously?) ..// passing the message as the value/PAYLOAD ... i.e action.payload
}

}); // ... 1st param: String with the action 'auth/register' .... 2nd param async callback fn ..

export const login = createAsyncThunk('auth/login', async (user, thunkAPI) => {
    try {
        return await authService.login(user);
    } catch (error) {
        const message = (error.response && error.response.data && error.response.data.message) || error.message || error.toString()
        return thunkAPI.rejectWithValue(message);
    }
});

export const logout = createAsyncThunk('auth/logout', async () => {
    
});

// when we register/login we get back a token, and other user data ... we need a token to access protected routes

export const authSlice = createSlice({ // Actual Slice ...
    name: 'auth',  // name for Slice
    initialState, // Initial State
    reducers: { // Reducers: anything we put in here, these are not gonna be asynchronous, they're not gonna be Thunk
        reset: (state) => { // Regular Reducers.
            state.isLoading = false
            state.isSuccess = false
            state.isError = false
            state.message = ''
        }
    },
    extraReducers: (builder) => { // Asynchronous/THUNK ...// states ... pending ... fulfilled, rejected ...
        builder
            .addCase(register.pending, (state) => {
                state.isLoading = true
            })
            .addCase(register.fulfilled, (state, action) => {
                state.isLoading = false
                state.isSuccess = true
                state.user = action.payload
            })
            .addCase(register.rejected, (state, action) => {
                state.isLoading = false
                state.isError = true
                state.message = action.payload
                state.user = null
            })
            .addCase(logout.fulfilled, (state) => {
                state.user = null;
            })
            .addCase(login.pending, (state) => {
                state.isLoading = true
            })
            .addCase(login.fulfilled, (state, action) => {
                state.isLoading = false
                state.isSuccess = true
                state.user = action.payload
            })
            .addCase(login.rejected, (state, action) => {
                state.isLoading = false
                state.isError = true
                state.message = action.payload
                state.user = null
            })
    } 
});

export const { reset } = authSlice.actions
export default authSlice.reducer 
