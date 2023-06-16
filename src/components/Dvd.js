
function Dvd({ size, setSize,errorType }) {



  return (
    <div className='dvd'>
      <h4>Please,provide Size:</h4>
      <label>Size (MB)</label>
      <input type='number' min='0' value={size} name='size' id='size' onChange={(e) => setSize(e.target.value)}></input>
    {errorType && <p style={{color:"red"}}>Size is required !!!</p>}
    </div>
  );
}

export default Dvd;