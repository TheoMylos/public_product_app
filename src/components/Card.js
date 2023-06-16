

import React from 'react';




function Card({ SKU, name, price, desc, dvd , book , furniture,handlecheckbox,checkbox}) {

 
  


  return (
    <div className='card'>
      <input  type='checkbox' className='delete-checkbox' value={checkbox} onChange={handlecheckbox}></input>
      <ul>
        <li>{SKU}</li>
        <li>{name}</li>
        <li>{price} $</li>
       {dvd && <li>Size: {desc}MB</li>}
       {book && <li>Weight: {desc}KG</li>}
       {furniture && <li>Dimensions: {desc}</li>}
      </ul>

    </div>

  );
}

export default Card;