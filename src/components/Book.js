

function Book({ weight, setWeight,errorType }) {

  return (
    <div className='dvd'>
      <h4>Please,provide Weight:</h4>
      <label>Weight (KG)</label>
      <input type='number' min='0' id='weight' value={weight} onChange={(e) => {setWeight(e.target.value); }} ></input>
      {errorType && <p style={{color:"red"}}>Weight is required !!!</p>}
    </div>
  );
}

export default Book;