<!DOCTYPE html>
<html>
    <head>
        <link   href="style.css"
                rel="stylesheet"
                type="text/css">
        <title>Eden</title>
    </head>

    <body>
        <h3>Enter your payment details to complete transaction:</h3>
        <form method="get" action="order.php">
            <table>
                <tr><td>First Name</td>
                <td><input  type='text'
                            name="fname"></td></tr>
                <tr><td>Last Name</td>
                <td><input  type='text'
                            name="lname"></td></tr>
                <tr><td>Card Number:</td>
                <td><input  type='text'
                            name="cardnum"></td></tr>
                <tr><td>Expiry Date</td>
                <td><input  type='text'
                            name="exp"></td></tr>
                <tr><td><input  type='submit'
                                value='Submit'></td></tr>
            </table>
        </form>
    </body>
</html>

<!--
    first name
    last name
    card number
    expiry date