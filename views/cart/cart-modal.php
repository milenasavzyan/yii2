<?php if(!empty($session['cart'])): ?>


    <table class="table">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($session['cart'] as $id => $item) : ?>
            <tr>
                <td><?= yii\helpers\Html::img("@web/{$item['image']}", ['style' => 'width: 50px; height: 50px;']) ?></td>
                <td><?= $item['title'] ?></td>
                <td><?= $item['qty'] ?></td>
                <td>$<?= $item['price'] ?></td>
            </tr>

        <?php endforeach; ?>

        <tr>
            <td colspan="4">Quantity</td>
            <td id="cart-qty"><?= $session['cart.qty'] ?></td>
        </tr>
        <tr>
            <td colspan="4">Total</td>
            <td id="cart-sum">$<?= $session['cart.sum'] ?></td>
        </tr>
        </tbody>
    </table>



<?php else: ?>
<h3>Your cart is empty</h3>

<?php endif;?>
