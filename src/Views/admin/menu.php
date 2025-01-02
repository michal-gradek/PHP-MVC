<?php require "./src/Views/base/header.php" ?>
<?php require "./src/Views/base/messages.php" ?>

<section class="masthead">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-6">
                <div class="card border shadow-0 p-3">
                    <div class="form-group">
                        <button class="btn btn-dark w-100 shadow-0 mb-1 mt-3"onclick="location.href='/'">Zamówienia</button>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-dark w-100 shadow-0 mb-1" onclick="location.href='/'">Produkty</button>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-dark w-100 shadow-0 mb-1" onclick="location.href='/'">Adresy</button>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-dark w-100 shadow-0 mb-1" onclick="location.href='/'">Użytkownicy</button>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-dark w-100 shadow-0" onclick="location.href='/admin/dashboard'">Podsumowanie</button>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</section>