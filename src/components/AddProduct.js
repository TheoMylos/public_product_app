import React, { useState} from 'react';
import { Link,useNavigate } from 'react-router-dom';
import Dvd from './Dvd';
import Book from './Book';
import Furniture from './Furniture';
import Validation from '../utils/Validation';
import axios from 'axios';






function AddProduct() {


  const [productType, setProductType] = useState('DVD');
  const [product, setProduct] = useState({
    sku: '',
    name: '',
    price: 0,
    });
  const [size, setSize] = useState(0);
  const [weight, setWeight] = useState(0);
  const [dimensions, setDimensions] = useState({
    height: 0,
    width: 0,
    length: 0
  });
  const [errors, setErrors] = useState({});
  const [errorType,setErrortype]= useState(false)
  const navigate =useNavigate();
 
 
  

  

  



  function handleinput(e) {
    const obj = { ...product, [e.target.name]: e.target.value }
    setProduct(obj);
  
  }
  const getChoice = (e) => {
    setProductType(e.target.value);
  }
  const handleSubmit = () => {
    
    setErrors(Validation(product));
    if( (productType==='DVD' && size === 0) || (productType==='Book' && weight === 0) || (productType==='Furniture' && (dimensions.height === 0 || dimensions.width === 0 || dimensions.length === 0))){
      setErrortype(true);
    }else{
      setErrortype(false);
    }

    
    if (productType ==='DVD' && errorType === false && product.sku !=='' && product.name !=='' && product.price !==0){
    axios.post("https://127.0.0.1/scandiweb_api/create.php",{
      type:'DVD',
      sku:product.sku,
      name:product.name,
      price:product.price,
      size:size
  })
  setTimeout(() => {
    navigate('/');
 }, 500);
    }
    else if(productType ==='Book' && errorType === false && product.sku !=='' && product.name !=='' && product.price !==0){
      axios.post("http://127.0.0.1/scandiweb_api/create.php",{
      type:'Book',
      sku:product.sku,
      name:product.name,
      price:product.price,
      weight:weight})
      setTimeout(() => {
        navigate('/');
     }, 500);
    }
    else if(productType ==='Furniture' && errorType === false && product.sku !=='' && product.name !=='' && product.price !==0){
      
      axios.post("http://127.0.0.1/scandiweb_api/create.php",{
        type:'Furniture',
        sku:product.sku,
        name:product.name,
        price:product.price,
        dimensions:`${dimensions.height}x${dimensions.width}x${dimensions.length}`});
        setTimeout(() => {
           navigate('/');
        }, 500);
       
      
      
      
    }
  }



  return (
    <div>
      <div className='container'>
        <div className="title">
          <h1>Product Add</h1>
        </div>
        <span className="buttons">
          <button type='submit' name='submit' onClick={handleSubmit}> Save </button>
          <Link to='/'>
            <button>Cancel</button>
          </Link>
        </span>
        <hr></hr>

        <form id='product_form' method='POST' action='scandiweb_api/create.php' onSubmit={handleSubmit}>
          <div className='skufield'>
            <label>SKU</label>
            <input type='text' id='sku' name='sku' onChange={handleinput}></input>
            {errors.sku && <p style={{ color: "red" }}>{errors.sku}</p>}
          </div>
          <div className='namefield'>
            <label>Name</label>
            <input type='text' id='name' name='name' onChange={handleinput}></input>
            {errors.name && <p style={{ color: "red" }}>{errors.name}</p>}
          </div>
          <div className='pricefield'>
            <label>Price ($)</label>
            <input type='number' min='0' id='price' name='price' onChange={handleinput}></input>
            {errors.price && <p style={{ color: "red" }}>{errors.price}</p>}
          </div>
          <label>Type Switcher</label>
          <select id='productType' onChange={getChoice}>
            <option disabled>Type Switcher</option>
            <option id='DVD' value='DVD'>DVD</option>
            <option id='Book' value='Book'>Book</option>
            <option id='Furniture' value='Furniture'>Furniture</option>
          </select>

          {productType === 'DVD' &&  <Dvd size={size} setSize={setSize} errorType={errorType}/>}
          {productType === 'Book' && <Book weight={weight} setWeight={setWeight} errorType={errorType}/>}
          {productType === 'Furniture' && <Furniture dimensions={dimensions} setDimensions={setDimensions} errorType={errorType}/>}

        </form>
      </div>

      <hr></hr>
      <div className='footer'>
        Scandiweb Test assignment
      </div>
    </div>

  );
}

export default AddProduct;