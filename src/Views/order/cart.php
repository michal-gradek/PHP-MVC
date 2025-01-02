<?php require "./src/Views/base/header.php" ?>
<?php require "./src/Views/base/messages.php" ?>

    <section class="bg-light my-5">
        <form method="post" action="<?php echo ROOT_URL; ?>order/checkout"> 
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-lg-9">
                            <div class="card border shadow-0 p-1">
                                <div class="m-4">
                                    <h4 class="card-title mb-4">Zamówienie</h4>

                                <?php foreach($products as $product) : ?>
                                    <div class="card rounded-3 mb-4">
                                        <div class="card-body p-4">
                                            <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img src="<?php echo($product['url']) ?>"  style="width: 100px; height: 100px;" class="img-fluid rounded-2">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <p class="lead fw-normal mb-2"><?php echo($product['product_name']) ?></p>
                                                <p><span class="text-muted">Dostępność: </span><?php echo($product['stock_quantity'])?></p>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                <input id="form1" min="0" max="<?php echo($product['stock_quantity'])?>" name="<?php echo($product['product_id'])?>" value="0" type="number"
                                                class="form-control form-control-sm" />
                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h6 class="mb-0"><?php echo($product['price']) ?> zł/szt.</h6>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                        <div class="mt-3">
                                    <button class="btn btn-success w-100 shadow-0 mb-2" name="order" type="submit">Dalej</button>
                                    <p class="mb-2 text-center"><a href="<?php echo ROOT_URL; ?>" class="text-dark-50 fw-bold">Strona główna</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

<?php require "./src/Views/base/footer.php" ?>