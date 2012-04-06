<?php include 'templates/header.php'; ?>
<?php foreach ($data as $datas) : ?>
<div class="game">
    <span class="xbox-title">
        <?php echo $datas['title']; ?>"/>
    </span>
    <span class="game-pack">
        <?php echo $datas['image']; ?>
    </span>
    <span class="game-txt">
        <?php echo $datas['body']; ?>
    </span>
    <p><a href="http://localhost/php-mvc/product/add&id=<?php echo $datas['id']; ?>" >
        <img src="../protected/views/images/buyme.png" alt="buy me" class="buyme" /></a>  <?php echo $datas['price']; ?></p>

<?php endforeach; ?>
    <?php //print_r($product);?>
    <?php //print_r($_SESSION['cart']); ?>
    <?php //print_r($_SESSION['total_items']); ?>
</div>
</div>
<?php include 'templates/footer.php'; ?>