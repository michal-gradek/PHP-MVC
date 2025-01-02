<?php require "./src/Views/base/header.php" ?>
<?php require "./src/Views/base/messages.php" ?>


    <section class="bg-light my-1">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-8">
                        <div class="card shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info mb-1">Liczba zamówień [dzień]</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo($orderCountDaily) ?></div>
                                    </div>
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info mb-1">Liczba zamówień [tydz]</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo($orderCountWeek) ?></div>
                                    </div>
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info mb-1">Liczba zamówień [msc]</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo($orderCountMonth) ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4 col-md-8">
                        <div class="card shadow h-100 py-1">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary mb-1">Wartość zamówień [dzień]</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo($orderValueDaily) ?> zł.</div>
                                    </div>
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary mb-1">Wartość zamówień [tydz]</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo($orderValueWeek) ?> zł.</div>
                                    </div>
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary mb-1">Wartość zamówień [msc]</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo($orderValueMonth) ?> zł.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="card shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-success mb-1">Zysk [dzień]</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo($orderProfitDaily) ?> zł.</div>
                                    </div>
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-success mb-1">Zysk [tydz]</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo($orderProfitWeek) ?> zł.</div>
                                    </div>
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-success mb-1">Zysk [msc]</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo($orderProfitMonth) ?> zł.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div> 
                
                <div class="row justify-content-center my-5">
                    <div class="col-lg-4 col-md-12">
                        <div class="card shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <h3 class="box-title text-center">Wykres dzienny</h3>
                                        <div id="chart1"><canvas id="q1"></canvas></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="card shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <h3 class="box-title text-center">Wykres tygodniowy</h3>
                                        <div id="chart1"><canvas id="q2"></canvas></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="card shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <h3 class="box-title text-center">Wykres miesieczny</h3>
                                        <div><canvas id="q3"></canvas></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row justify-content-center my-5">
                    <div class="col-lg-7 col-md-12">
                        <div class="card shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <h3 class="box-title text-center">Ostatnie zamówienia</h3>

                                        <div class="card-block">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th>Imię</th>
                                                            <th>Nazwisko</th>
                                                            <th class="text-right">Liczba produktów</th>
                                                            <th class="text-right">Wartość produktów</th>
                                                            <th class="text-center">Status</th>
                                                        </tr>
                                                    </thead>   
                                                    <tbody>
                                                        <?php foreach($orderUsers as $order) : ?>
                                                            <tr>
                                                                <td><?php echo($order['firstname']) ?></td>
                                                                <td><?php echo($order['lastname']) ?></td>
                                                                <td class="text-right"><?php echo($order['counts']) ?></td>
                                                                <td class="text-right"><?php echo($order['val']) ?></td>
                                                                <td class="text-right"><span class="badge badge-<?php echo($orderStatus[$order['order_status']]["color"])?>"><?php echo($orderStatus[$order['order_status']]["text"]) ?></span></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-12">
                        <div class="card shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <h3 class="box-title text-center">Top 5 użytkowników</h3>

                                        <div class="card-block">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th>Imię</th>
                                                            <th>Nazwisko</th>
                                                            <th class="text-right">Liczba zamówień</th>
                                                            <th class="text-right">Kwota zamówień</th>
                                                        </tr>
                                                    </thead>   
                                                    <tbody>
                                                        <?php foreach($users as $user) : ?>
                                                            <tr>
                                                                <td><?php echo($user['firstname']) ?></td>
                                                                <td><?php echo($user['lastname']) ?></td>
                                                                <td class="text-right"><?php echo($user['counts']) ?></td>
                                                                <td class="text-right"><?php echo($user['val']) ?> zł.</td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
            </div>
            <?php
                echo '
                    <script type="text/javascript" src="'.ROOT_URL.'src/Assets/js/chart.js"></script>
                    <script type="text/javascript">
                        genChart(`q1`, '.json_encode( array_keys($chartDataDaily) ).','.json_encode( $chartDataDaily ).');
                        genChart(`q2`,'.json_encode( array_keys($chartDataWeek) ).','.json_encode( $chartDataWeek ).');
                        genChart(`q3`, '.json_encode( array_keys($chartDataMonth) ).','.json_encode( $chartDataMonth ).');
                    </script>
                ';
            ?>
    </section>