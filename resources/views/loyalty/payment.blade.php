<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
 body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

form {
    background-color: #fff;
    padding: 30px; /* Increase padding for more space */
    border-radius: 10px; /* Increase border-radius for rounded corners */
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); /* Increase box-shadow for a more pronounced effect */
    width: 100%;
    max-width: 500px; /* Increase max-width for a wider form */
    box-sizing: border-box; /* Include padding and border in total width */
}

h1, h3 {
    text-align: center;
    color: #333;
    font-size: 40px;
}

input[type="text"],
input[type="email"],
input[type="date"],
select {
    width: calc(100% - 22px);
    padding: 15px; /* Increase padding for larger input fields */
    margin-top: 10px; /* Increase margin-top for more spacing */
    margin-bottom: 15px; /* Increase margin-bottom for more spacing */
    border: 2px solid #ddd; /* Increase border width for a more visible border */
    border-radius: 6px; /* Increase border-radius for rounded input fields */
    box-sizing: border-box;
    font-size: 16px; /* Increase font size for better readability */
}

input[type="submit"],
.payBtn {
    width: 100%;
    padding: 15px;
    border: none;
    border-radius: 6px;
    box-sizing: border-box;
    background-color: #007bff;
    color: white;
    cursor: pointer;
    font-size: 18px; /* Increase font size for a more prominent button */
    text-decoration: none;
    display: block;
    text-align: center;
    margin-bottom: 15px;
    transition: background-color 0.3s;
}

input[type="submit"]:hover,
.payBtn:hover {
    background-color: #0056b3;
}

</style>
</head>
<body>


<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">
      

          <div class="col-50">
            <h3>PAYMENT</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John Loumel Perez Dela Cruz">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>

        <div class="btn">
             <a href="{{ url ('dashboard')}}"class="payBtn">CHECKOUT</a>
        </div>
        
      </form>
    </div>
  </div>
  
  </div>
</div>

</body>
</html>



