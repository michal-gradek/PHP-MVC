<?php require "./src/Views/base/header.php" ?>
<?php require "./src/Views/base/messages.php" ?>
<?php require "./src/Views/base/menu.php" ?>

        <header class="masthead" id="go_to_masthead">
            <div class="container h-75 d-flex align-items-end">
                <div class="row">
                    <div class="col-12">
                        <div class="row mt-2 d-flex">
                            <h1 class="display-4 text-white font-weight-bold">Cukiernia Paula</h1>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row mt-2 d-flex">
                            <button class="col-lg-6 col-md-4 col-sm-12 font-weight-bold" onclick="location.href='/order/cart'">ZAMÓWIENIE</button>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="testimonials text-center bg-light">
            <div class="container">
                <div class="row mx-auto p-5">
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-8" src="/src/Assets/img/ciasto.png" alt="..." width="200" height="250" />
                            <h3>Ciasta</h3>
                            </div>
                        </div>
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-8" src="/src/Assets/img/tort.png" alt="..." width="200" height="250" />
                            <h3>Torty</h3>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-8" src="/src/Assets/img/makaroniki.png" alt="..." width="200" height="250" />
                            <h3>Ciasteczka</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="showcase" id="go_to_showcase">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img">
                        <img class="w-100" src="/src/Assets/img/produkt1.jpg" alt="..." height="640">
                    </div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Jaki jest Idealny Tort na urodziny? Idealny Tort dla Żony? Idealny Tort dla Męża? A może tort dla dziecka?</h2>
                        <p class="lead mb-0">Na każde z tych pytań mamy jedną odpowiedź - Idealny tort to taki jaki samemu chciało by się dostać. Nie każdy zakład cukierniczy czy cukiernia rzemieślnicza zaproponuje Państwu to, co my.</p>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-6 text-white showcase-img">
                        <img class="w-100" src="/src/Assets/img/produkt2.jpg" alt="..." height="640">
                    </div>
                    <div class="col-lg-6 my-auto showcase-text">
                        <h2>Ciasto z blachy to nieodzowny element naszej kultury...</h2>
                        <p class="lead mb-0">Trudno wyobrazić sobie rodzinną imprezę, zabawę, czy też spotkanie przy kawie bez kawałka ciasta. Skuszą się na nie i starsi, i młodsi, zwłaszcza że wśród ogromnej różnorodności wypieków każdy może znaleźć taki, który szczególnie przypadnie mu do gustu.</p>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img">
                        <img class="w-100" src="/src/Assets/img/produkt3.jpg" alt="..." height="640">
                    </div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Pyszne i aromatyczne ciasteczka, idealne do kawy...</h2>
                        <p class="lead mb-0">Ciasteczko podane swoim gościom, niezależnie czy klientom w kawiarni czy znajomym w domu, jest małym gestem o niezwykłym znaczeniu - przekonaj się sam/a</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="testimonials text-center bg-light" id="go_to_testimonials">
            <div class="container-fluid">
                <div class="row mx-auto p-3 justify-content-center">
                    <h1 class="text-center">Galeria</h1>
                </div>

                <div class="row mx-auto p-4">
                    <div id="gallery-lightbox" class="row" data-toggle="modal" data-target="#exampleModal">
                        <div class="col-6 col-md-4 col-lg-3 p-0">
                        <img class="w-100" src="/src/Assets/img/galeria4.jpg" alt="First slide" data-target="#carouselExample" data-slide-to="0">
                        </div>
                        <div class="col-6 col-md-4 col-lg-3 p-0">
                        <img class="w-100" src="/src/Assets/img/galeria3.jpg" alt="First slide" data-target="#carouselExample" data-slide-to="1">
                        </div>
                        <div class="col-6 col-md-4 col-lg-3 p-0">
                        <img class="w-100" src="/src/Assets/img/galeria2.jpg" alt="First slide" data-target="#carouselExample" data-slide-to="2">
                        </div>
                        <div class="col-6 col-md-4 col-lg-3 p-0">
                        <img class="w-100" src="/src/Assets/img/galeria1.jpg" alt="First slide" data-target="#carouselExample" data-slide-to="3">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
                <button type="button" class="close m-0 p-3 text-white position-absolute right-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content bg-transparent">
                        <div class="modal-body p-0">
                            <div id="carouselExample" class="carousel slide carousel-fade" data-ride="false">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" width="1280" height="640" src="/src/Assets/img/galeria4.jpg" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" width="1280" height="640" src="/src/Assets/img/galeria3.jpg" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" width="1280" height="640" src="/src/Assets/img/galeria2.jpg" alt="Third slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" width="1280" height="640" src="/src/Assets/img/galeria1.jpg" alt="Fourth slide">
                                </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>       
        </section>

        <section class="showcase" id="go_to_contact">
            <div class="container-fluid">
                    <div class="row mx-auto p-5">
                        <div class="col-md-4">
                            <h5><i class="fa fa-road"></i> Informacje</h5>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <ul class="list-unstyled">
                                        <li><a class="font-weight-bold" href='/order/menu'>Zamówienia</a></li>
                                        <li><a class="font-weight-bold" href="#go_to_testimonials">Galeria</a></li>
                                        <li><a class="font-weight-bold" href="#go_to_showcase">O nas</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h5 class="text-md-left">Kontakt</h5>
                            <hr>
                            <ul class="list-unstyled">
                                <li><span class="font-weight-bold">Adres: 20-607, Lublin</span></li>
                                <li><span class="font-weight-bold">Telefon: +48 123 456 789</span></li>
                                <li><span class="font-weight-bold">Email: michal.grradek@gmail.com</span></li>
                            </ul>
                        </div>

                        <div class="col-md-4">
                            <h5 class="text-md-left">Mapa</h5>
                            <hr>
                            <div id="map-container-google-1" class="z-depth-1-half map-container-4">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d159939.76039154694!2d22.398964225766797!3d51.217993268260315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x472257141e154061%3A0x5528ee7af6e8e95f!2sLublin!5e0!3m2!1spl!2spl!4v1704802912437!5m2!1spl!2spl" style="width: 100%; height: 100%" frameborder="0" style="border:0;" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="/src/Assets/js/scripts.js"></script>

<?php require "./src/Views/base/footer.php" ?>