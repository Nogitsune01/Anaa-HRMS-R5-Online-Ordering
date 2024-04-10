<!DOCTYPE html>
<html lang="en">

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
  <div class="container">
    <form action="/action_page.php">
      <h3>BILLING INFORMATION</h3>

      <div class="input-container">
        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
        <input type="text" id="fname" name="firstname" placeholder="John Loumel P. Dela Cruz">
      </div>

      <div class="input-container">
        <label for="email"><i class="fa fa-envelope"></i> Email</label>
        <input type="text" id="email" name="email" placeholder="loumel69@example.com">
      </div>

      <div class="input-container">
        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
        <input type="text" id="adr" name="address" placeholder="Blk 3 Lot 4 Hulo St.">
      </div>

      <div class="input-container">
        <label for="city"><i class="fa fa-institution"></i> City</label>
        <input type="text" id="city" name="city" placeholder="Valenzuela">
      </div>

      <div class="row">
        <div class="col-50">
          <label for="zip">Zip</label>
          <input type="text" id="zip" name="zip" placeholder="1440">
        </div>
      </div>

      <div class="btn">
        <a href="{{ url('payment')}}" class="payBtn">PAYMENT METHOD</a>
      </div>
    </form>
  </div>
</body>

</html>
