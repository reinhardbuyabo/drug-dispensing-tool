import { configureStore } from "@reduxjs/toolkit";
import authReducer from '../features/auth/authSlice'

/**
 * STORE
 * The current Redux application state lives in an object called the store .
   The store is created by passing in a reducer, and has a method called getState that returns the current state value
    */
export const store = configureStore({
    reducer: {
        auth: authReducer
    }
}); 