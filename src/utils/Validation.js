
export default function Validation(product) {
  const errors = {}
  


  if (product.sku === '') {
    errors.sku = 'SKU is required !!!';
  }
  if (product.name === '') {
    errors.name = 'Name is required !!!';
  }
  if (product.price === 0) {
    errors.price = 'Price is required !!!';
  }
  


  return errors;
}