
        <nav class="navbar navbar-expand-lg fixed-top navbar-scroll bg-transparent">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarExample01"
                        aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarExample01">
                    <ul class="navbar-nav justify-content-left aling-items-center fs-5 flex-grow-1 pe-3">
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white font-weight-bold" href="<?php echo ROOT_URL; ?>">STRONA GŁÓWNA</a>
                        </li>  
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white font-weight-bold" href="#go_to_testimonials">GALERIA</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white font-weight-bold" href="#go_to_showcase">OFERTA</a>
                        </li>  
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white font-weight-bold" href="#go_to_contact">KONTAKT</a>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-right aling-items-center gap-3">
                        <?php if(isset($_SESSION['is_logged_in'])) : ?>
                            <?php if(isset($_SESSION['user']['is_admin']) && $_SESSION['user']['is_admin']) : ?>
                                <a class="nav-link text-white font-weight-bold" href="<?php echo ROOT_URL; ?>admin/menu">ADMINISTRACJA</a>
                            <?php endif; ?>
                                <a class="nav-link text-white font-weight-bold" href="<?php echo ROOT_URL; ?>user/profil">PROFIL</a>
                                <a class="nav-link text-white font-weight-bold" href="<?php echo ROOT_URL; ?>user/logout">WYLOGUJ</a>
                        <?php else : ?>
                            <a class="nav-link text-white font-weight-bold" href="<?php echo ROOT_URL; ?>user/login">LOGOWANIE</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
