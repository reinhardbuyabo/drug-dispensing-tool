import React from 'react'
import { useState,useEffect } from 'react'
import {useNavigate} from 'react-router-dom'
import {useSelector} from 'react-redux'
import DrugCard from '../components/DrugCard'
import DrugSearch from '../components/DrugSearch'
import Spinner from '../components/Spinner'

function Dashboard() {
  // Todo: Get Drugs
  const [drugs, setDrugs] = useState([]);
  const [isLoading, setIsLoading] = useState(true);
  // For search bar
  const [term, setTerm] = useState('');
  // Routing based on authentication
  const navigate = useNavigate();
  const {user} = useSelector(state => state.auth);
  
  useEffect(() => {
    if(!user) {
      navigate('/login');
    } 
  }, [user, navigate]);
  //Routing based on authentication

  useEffect(() => {
    // Get Drugs here, results are based on QUERY PARAMETERS as per the db
      
  });

  return (
    // 1. Rendering Our Data
    <div className="container mx-auto">
      {/* 2. Search Bar for Drugs: Currently Not Usable */}
      {/* <DrugSearch searchText={(text) => setTerm(text)} /> */}

      {!isLoading && drugs.length === 0 && <h1 className="text-5xl text-center mx-auto mt-32">
          No Drugs Found
        </h1>
      }

      {
        isLoading ? <Spinner /> :
        // 3. Returned array of drugs mapped: Each drug is an object
        <div className="grid grid-cols-3 gap-4">
        {drugs.map(drug => (
          <DrugCard key={drug.id} drug={drug}/>
        ))}
      </div>
      }
    </div>
  )
}

export default Dashboard