<?php require "./src/Views/base/header.php" ?>
<?php require "./src/Views/base/messages.php" ?>

<section class="masthead">
  <div class="container py-1">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
                <h2 class="fw-bold mb-2 ">Logowanie</h2>

                <form method="post" action="<?php echo ROOT_URL; ?>user/authenticate">
                    <div class="form-outline form-white mb-4">
                        <input type="email" name="email" class="form-control form-control-lg" />
                        <label class="form-label" for="typeEmailX">Email</label>
                    </div>

                    <div class="form-outline form-white mb-4">
                        <input type="password" name="password" class="form-control form-control-lg" />
                        <label class="form-label" for="typePasswordX">Hasło</label>
                    </div>
                    
                    <button class="btn btn-outline-light btn-lg px-5" name="login" type="submit">Zaloguj się</button>
              </form>

            </div>

            <div>
              <p class="mb-0">Nie masz konta ? <a href="<?php echo ROOT_URL; ?>user/register" class="text-white-50 fw-bold">Rejestracja</a>
              </p>
              <p class="mb-1"><a href="<?php echo ROOT_URL; ?>" class="text-white-50 fw-bold">Powrót</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>