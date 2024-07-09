<!-- @app/mail/order.php -->

<p>Dear Customer,</p>

<p>Thank you for your order!</p>

<p>Order Details:</p>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($session['cart'] as $id=>$item): ?>
    <tr>
        <td><?= $item['title'] ?></td>
        <td><?= $item['qty'] ?></td>
        <td><?= $item['price'] ?></td>
        <td><?= $item['qty'] * $item['price'] ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<p>Regards,<br>
    E-shopper Team</p>
