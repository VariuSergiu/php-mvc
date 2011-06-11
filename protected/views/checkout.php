<?php include 'templates/header.php'; ?>
<?php if ($_SESSION['cart']) : ?>

<form action="http://localhost/php-mvc/product/update" method="post">
    <div id="items-box">
    <table id="items" summary="Full view of your basket including update options">
        <thead>
            <tr>
                <th>Items</th>
                <th>Item Price</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['cart'] as $id=>$qty) : 
                $product->findByPk($id);?>
            <tr>
                <td><?php echo $product->title; ?></td>
                <td><?php echo number_format($product->price, 2); ?></td>
                <td><input type="text" size="2" name="<?php echo $product->id; ?>" maxlength="2" value ="<?php echo $qty; ?>"/></td>
                <td><?php echo $product->price * $qty; ?></td>
            <?php endforeach; ?>
            </tr>
        </tbody>
    </table>
    <p><input type="image" src="../protected/views/images/update.png" value="update" /></p>
    <input type="hidden" name="submitted" value="TRUE" />
    </div>
</form>

<?php else : ?>
    <p><?php echo 'your cart is empty'; ?></p>
<?php endif; ?>
<?php include 'templates/footer.php'; ?>