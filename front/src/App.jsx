import './App.css'
import CreateProduct from './component/CreateProduct'
import Home from './component/Home'
import { Routes, Route } from "react-router";

function App() {

 return (

        <Routes>
          <Route exact path="/" element={<Home/>} /> 
          <Route path="/create" element={<CreateProduct/>} />
        </Routes>
    
  )
}

export default App
