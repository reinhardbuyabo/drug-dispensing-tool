import axios from "axios";
import { useState, useEffect } from "react" 

function AdminPanel() {
  const [formData, setFormData] = useState({
    name: '',
    drugUrl: '',
    category: '',
  });

  const {name, drugUrl, category } = formData;

  useEffect(() => {
    const fetchData = async () => {
      const response = await axios.post("http://localhost:3000", formData);

      console.log(response.data);
      return response.data
    }

  }, [])

  const onSubmit = (e) => {
    e.preventDefault();

    const formData = {
      name,
      
    }
  }


  return (
    <>
    <section className="heading">
      <h1>
        <FaSignInAlt/> Login
      </h1>
      <p>Log in and Get Access to our Services</p>
    </section>

    <section className="form">
      <form onSubmit={onSubmit}>
        <div className="form-group">
          <input type="name" className='form-control' id='name' name='name' value={name} placeholder='Enter your name' onChange={onChange}/>
        </div>
        <div className="form-group">
          <input type="password" className='form-control' id='password' name='password' value={password} placeholder='Enter your password' onChange={onChange}/>
        </div>

        <div className="form-group">
          <button type="submit" className='btn btn-block'>Submit</button>
        </div>
      </form>
    </section>
    </>
  )
}

export default AdminPanel