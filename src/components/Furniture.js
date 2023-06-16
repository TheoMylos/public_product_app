

function Furniture({ dimensions, setDimensions,errorType }) {

  return (
    <>
      <div className='furniture'>
        <h4>Please,provide dimensions (HxWxL):</h4>
       
        <label>Height (CM)</label>
        <input type='number' min='0' id='height' onChange={(e) => { setDimensions({ ...dimensions, height: e.target.value }); }}></input>
        <label>Width  (CM)</label>
        <input type='number' min='0' id='width' onChange={(e) => { setDimensions({ ...dimensions, width: e.target.value }); }} ></input>
        <label>Length (CM)</label>
        <input type='number' min ='0' id='length' onChange={(e) => { setDimensions({ ...dimensions, length: e.target.value }); }} ></input>
         {errorType && <p style={{color:"red",marginTop:"0px"}}>All dimensions are required</p>}
      </div>

    </>
  );
}

export default Furniture;