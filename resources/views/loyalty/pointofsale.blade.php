

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Receipt</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .receipt {
            width: 400px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .hotel-info {
            margin-bottom: 20px;
        }

        .guest-info {
            margin-bottom: 20px;
        }

        .item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .total {
            margin-top: 20px;
            font-weight: bold;
            font-size: 18px;
        }

        hr {
            border: 0;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }

        p {
            margin: 0;
        }
    </style>
</head>
<body>

    <div class="receipt">
        <div class="header">
            <h2>ANAA HOTEL</h2>
            <p>Providing Exceptional Hospitality</p>
        </div>

        <div class="hotel-info">
            <p>Blk 3 Lot 4 Hulo Street, Hipolito Compound Valenzuela City</p>
            <p>Phone: (123) 456-7890</p>
            <p>Email: info@yourhotel.com</p>
        </div>

        <hr>

        <div class="guest-info">
            <p>Guest: John Doe</p>
            <p>Check-in: January 1, 2024</p>
            <p>Check-out: January 5, 2024</p>
        </div>

        <div class="item">
            <span>Room Charges:</span>
            <span>$500.00</span>
        </div>

        <div class="item">
            <span>Food & Beverage:</span>
            <span>$75.00</span>
        </div>

        <hr>

        <div class="total">
            <p>Total: $<span id="totalAmount"></span></p>
        </div>
        
    </div>

    <script>
        // Calculate total amount
        const roomCharges = 500.00;
        const foodAndBeverage = 75.00;
        const totalAmount = roomCharges + foodAndBeverage;
        document.getElementById('totalAmount').textContent = totalAmount.toFixed(2);
    </script>



</body>
</html>

