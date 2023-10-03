<!DOCTYPE html>
<!--
// Author: Don Bowers
// Date: Oct 1, 2018
// Purpose: Collect information for Bob's auto parts - requires processOrder.php
-->
<html>
    <head>
      <title>Bob's Auto Parts</title>
    </head>
    <body>
        <h1>Bob's Auto Parts</h1>
        <h2>Order Form</h2>

        <form action="processOrder.php" method="post">
            <table style="border:none;">
            <tr style="background-color: #cccccc">
              <td style="width:150px">Item</td>
              <td style="width:15px">Quantity</td>
            </tr>
            <tr>
              <td>Tires</td>
              <td style="text-align:left;"><input type="text" name="tireQty" size="3" maxlength="3"/></td>
            </tr>
            <tr>
              <td>Oil</td>
                <td style="text-align:left;"><input type="text" name="oilQty" size="3" maxlength="3"/></td>
            </tr>
            <tr>
              <td>Spark Plugs</td>
                <td style="text-align:left;"><input type="text" name="sparkQty" size="3" maxlength="3"/></td>
            </tr>
            <tr>
              <td>Shipping Address</td>
                <td style="text-align:left;"><input type="text" name="address" size="40" maxlength="40"/></td>
            </tr>
            <tr>
              <td colspan="2" style="text-align:center;"><input type="submit" value="Submit Order"/></td>
            </tr>
            </table>
        </form>
    </body>
</html>

