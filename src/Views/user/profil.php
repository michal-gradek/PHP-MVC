<?php require "./src/Views/base/header.php" ?>
<?php require "./src/Views/base/messages.php" ?>

<section class="masthead">
<div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-9">
                        <div class="card border shadow-0 p-3">
                            <form method="post" action="<?php echo ROOT_URL; ?>user/update"> 
                                <div class="m-4">
                                    <h4 class="card-title mb-4">Profil użytkownika</h4>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="text" name="firstname" value="<?php echo $userData['firstname'] ?>" class="form-control" />
                                                <label class="form-label">Imię</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                        <div class="form-outline">
                                            <input type="text" name="lastname" value="<?php echo $userData['lastname'] ?>" class="form-control" />
                                            <label class="form-label">Nazwisko</label>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="text" name="email" value="<?php echo $userData['email'] ?>" class="form-control" disabled />
                                                <label class="form-label">Email</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                        <div class="form-outline">
                                            <input type="text" name="phone" value="<?php echo $userData['phone'] ?>" class="form-control" />
                                            <label class="form-label">Telefon</label>
                                        </div>
                                        </div>
                                    </div> 

                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="text" name="postalcode" value="<?php echo $userData['postalcode'] ?>" class="form-control" />
                                                <label class="form-label">Kod pocztowy</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                        <div class="form-outline">
                                            <input type="text" name="city" value="<?php echo $userData['city'] ?>" class="form-control" />
                                            <label class="form-label">Miasto</label>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="text" name="street" value="<?php echo $userData['street'] ?>" class="form-control" />
                                                <label class="form-label">Ulica</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                        <div class="form-outline">
                                            <input type="text" name="number" value="<?php echo $userData['number'] ?>" class="form-control" />
                                            <label class="form-label">Numer</label>
                                        </div>
                                        </div>
                                    </div>
                                       
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-dark w-100 shadow-0 mb-2" name="edit" type="submit">Zapisz</button>
                                    <p class="mb-2 text-center"><a href="<?php echo ROOT_URL; ?>" class="text-dark-50 fw-bold">Strona główna</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>    

            </div>
</section>