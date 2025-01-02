<?php require "./src/Views/base/header.php" ?>
<?php require "./src/Views/base/messages.php" ?>

<section class="bg-light my-5">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-9">
                        <div class="card border shadow-0 p-1">
                            <div class="m-4">
                                    <h4 class="card-title mb-4">Podsumowanie</h4>
                                        <?php foreach($orderProductsInfo as $product) : ?>
                                            <div class="card rounded-3 mb-4">
                                                <div class="card-body p-4">
                                                    <div class="row d-flex justify-content-between align-items-center">
                                                        <div class="col-md-3 col-lg-2 col-xl-2">
                                                            <img src="<?php echo($product['url']) ?>" class="img-fluid rounded-3">
                                                        </div>
                                                        <div class="col-md-2 col-lg-3 col-xl-2">
                                                            <h6 class="mb-0"><?php echo($product['product_name']) ?></h6>
                                                        </div>
                                                        <div class="col-md-2 col-lg-2 col-xl-2 d-flex">
                                                            <h6 class="mb-0">Ilość: <?php echo($product['product_quantity'])?> </h6>
                                                        </div>
                                                        <div class="col-md-2 col-lg-2 col-xl-2 d-flex">
                                                            <h6 class="mb-0">Cena: <?php echo($product['product_price'])?> </h6>
                                                        </div>
                                                        <div class="col-md-2 col-lg-2 col-xl-3 d-flex">
                                                            <h6 class="mb-1">Wartość: <?php echo($product['product_sum'])?> </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                            </div>

                            <form method="post" action="<?php echo ROOT_URL; ?>order/confirm"> 
                                <div class="m-4">
                                    <h4 class="card-title mb-4">Dostawa</h4>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="text" name="firstname" value="<?php echo $orderInfo['firstname']; ?>" class="form-control" />
                                                <label class="form-label">Imię</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                        <div class="form-outline">
                                            <input type="text" name="lastname" value="<?php echo $orderInfo['lastname']; ?>" class="form-control" />
                                            <label class="form-label">Nazwisko</label>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="text" name="postalcode" value="<?php echo $orderInfo['postalcode']; ?>" class="form-control" />
                                                <label class="form-label">Kod pocztowy</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                        <div class="form-outline">
                                            <input type="text" name="city" value="<?php echo $orderInfo['city']; ?>" class="form-control" />
                                            <label class="form-label">Miasto</label>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="text" name="street" value="<?php echo $orderInfo['street']; ?>" class="form-control" />
                                                <label class="form-label">Ulica</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                        <div class="form-outline">
                                            <input type="text" name="number" value="<?php echo $orderInfo['number']; ?>" class="form-control" />
                                            <label class="form-label">Numer</label>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="text" name="enail" value="<?php echo $orderInfo['email']; ?>" class="form-control" />
                                                <label class="form-label">Email</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                        <div class="form-outline">
                                            <input type="text" name="phone" value="<?php echo $orderInfo['phone']; ?>" class="form-control" />
                                            <label class="form-label">Telefon</label>
                                        </div>
                                        </div>
                                    </div>                                        
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-success w-100 shadow-0 mb-2" name="order" type="submit">Zamów</button>
                                    <p class="mb-2 text-center"><a href="<?php echo ROOT_URL; ?>" class="text-dark-50 fw-bold">Strona główna</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>    

            </div>
    </section>

<?php require "./src/Views/base/footer.php" ?>