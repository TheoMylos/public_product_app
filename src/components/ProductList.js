import React, { useState,useEffect } from 'react';
import Card from './Card';
import { Link } from 'react-router-dom';
import axios from 'axios';

function ProductList() {
  const [data,setData]=useState([]);
  const [checked, setChecked]=useState([])
  
  


  useEffect(() => {
      axios.get("http://127.0.0.1/scandiweb_api/index.php").then((response) => {
        const products = response.data;
      
      setData(products);
  
        })
        .catch((err) => {
          console.log(err);
        })   
    }, []);


    const handlecheckbox = (e)=>{
      let updatedList =[...checked]
     

     if (e.target.checked){
      updatedList = [...checked,e.target.value];
       }
       else{
        updatedList.splice(checked.indexOf(e.target.value),1);
       }
       setChecked(updatedList);
       
        }
        const massDelete = ()=>{
          axios.post("http://127.0.0.1/scandiweb_api/delete.php",checked);
          setTimeout(()=>{   window.location.reload(false);},500)
       
        }
      
  
  return (
    <div>
      <div className="title">
        <h1>Product List</h1>
      </div>
      <span className="buttons">
        <Link to='add'>
          <button > ADD </button>
        </Link>
        <button onClick={massDelete}>MASS DELETE</button>
      </span>
      <hr></hr>
      <div className='list'>

       
        {data[0]?.map((dvd) => { return <Card key={dvd.id} SKU={dvd.sku} name={dvd.name} price={dvd.price} desc={dvd.size} dvd={true}  checkbox ={dvd.id} handlecheckbox={handlecheckbox}/> })} 
        {data[1]?.map((book) => { return <Card key={book.id} SKU={book.sku} name={book.name} price={book.price} desc={book.weight} book={true}  checkbox={book.id} handlecheckbox={handlecheckbox}/>})}
        {data[2]?.map((furniture) => { return <Card key={furniture.id} SKU={furniture.sku} name={furniture.name} price={furniture.price} desc={furniture.dimensions} furniture={true} checkbox ={furniture.id} handlecheckbox={handlecheckbox}/> })} 
       
      </div>
      <hr></hr>
      <div className='footer'>
        Scandiweb Test assignment
      </div>
    </div>
  )






}

export default ProductList;