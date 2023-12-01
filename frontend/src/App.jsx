import { BrowserRouter as Router, Routes, Route } from 'react-router-dom'
import { ToastContainer } from 'react-toastify'
import 'react-toastify/dist/ReactToastify.css'
import Header from './components/Header'
import Dashboard from './pages/Dashboard'
import Login from './pages/Login'
import Register from './pages/Register'
import { useSelector } from 'react-redux'
import Footer from './components/Footer'
import AdminLogin from './pages/AdminLogin'
import AdminPanel from './components/AdminPanel'

function App() {
  const {user} = useSelector(state => state.auth);
  
  return (
    <>
      <Router>
        <div className="container">

          { user ? (user.name == 'admin' ? '' : <Header />): <Header /> }
          

          <Routes>
            <Route path='/' element={<Dashboard />}></Route>
            <Route path='/login' element={<Login />}></Route>
            <Route path='/register' element={<Register />}></Route>
            <Route path='/adminLogin' element={<AdminLogin />}></Route>
            {/* <Route path='/app' element={<AdminPanel />} ></Route>  */}
          </Routes>

          <Footer />
        </div>
      </Router>

      <ToastContainer/>
    </>
  )
}

export default App
