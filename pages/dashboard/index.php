<section class="row itemsFlex flexWrapMobile">

<section class="w80 w100Mobile marginDownBiggerMobile">
    
    <section class="containerDices marginDownBigger">
        <div class="wrap itemsFlex w90 center slideMobile">
            <div class="card itemsFlex w30">
                <div class="col w30">
                    <i class="ri-archive-fill"></i>
                </div>
                <div class="col w70">
                    <p>Produtos</p>
                    <h4><?php $products = \models\productsModel::getProducts(); echo count($products); ?></h4>
                    <p class="fontSmall">+<?php 
                        $totalProducts = \models\dashboardModel::getProducts();
                        $percetageProducts = 1000;
                        $percetageProductsValor = count($totalProducts);
                        $resultPercetageProducts = ($percetageProductsValor / $percetageProducts) * 100;
                        echo $resultPercetageProducts;
                    ?>%</p>
                </div>
            </div>
            <div class="card itemsFlex w30">
                <div class="col w30">
                    <i class="ri-bubble-chart-fill"></i>
                </div>
                <div class="col w70">
                    <p>Visitas</p>
                    <h4><?php $visits = \models\dashboardModel::getVisits(); echo count($visits); ?></h4>
                    <p class="fontSmall">+<?php 
                        $totalVisits = \models\dashboardModel::getVisits();
                        $percetageVisits = 1000;
                        $percetageVisitsValor = count($totalVisits);
                        $resultPercetageVisits = ($percetageVisitsValor / $percetageVisits) * 100;
                        echo $resultPercetageVisits;
                    ?>%</p>
                </div>
            </div>
            <div class="card itemsFlex w30">
                <div class="col w30">
                    <i class="ri-question-answer-fill"></i>
                </div>
                <div class="col w70">
                    <p>Feedbacks</p>
                    <h4><?php $feedbacks = \models\dashboardModel::getFeedbacks(); echo count($feedbacks); ?></h4>
                    <p class="fontSmall">+<?php 
                        $totalFeedback = \models\dashboardModel::getFeedbacks();
                        $percetageFeedbacks = 1000;
                        $percetageFeedbacksValor = count($totalFeedback);
                        $resultPercetageFeedbacks = ($percetageFeedbacksValor / $percetageFeedbacks) * 100;
                        echo $resultPercetageFeedbacks;
                    ?>%</p>
                </div>
            </div>
            <div class="card itemsFlex w30">
                <div class="col w30">
                    <i class="ri-money-dollar-circle-line"></i>
                </div>
                <div class="col w70">
                    <p>Faturamento</p>
                    <h4>24K</h4>
                    <p class="fontSmall">+33.45%</p>
                </div>
            </div>
        </div>
    </section>

    <section class="containerChart marginDownSmall">
        <div class="wrap w90 center">
            <div id="chart"></div>
        </div>
    </section>

    <section class="containerInfos marginDownBigger">
        <div class="wrap w90 center itemsFlex slideMobile">
            <div class="card itemsFlex alignCenter w25">
                <div class="col w30 marginRightDefault">
                    <a><i class="ri-group-fill"></i></a>
                </div>
                <div class="col w70">
                    <p class="fontSmall">New Subscribers</p>
                    <h4><?php $users = \models\dashboardModel::getUsers(); echo count($users); ?></h4>
                    <p>+<?php 
                        $totalUsers = \models\dashboardModel::getUsers();
                        $percetageUsers = 1000;
                        $percetageUsersValor = count($totalUsers);
                        $resultPercetageUsers = ($percetageUsersValor / $percetageUsers) * 100;
                        echo $resultPercetageUsers;
                    ?>%</p>
                </div>
            </div>
            <div class="card itemsFlex alignCenter w25">
                <div class="col w30 marginRightDefault">
                    <a><i class="ri-time-fill"></i></a>
                </div>
                <div class="col w70">
                    <p class="fontSmall">New Visits</p>
                    <h4><?php echo count($visits); ?></h4>
                    <p>+<?php 
                        echo $resultPercetageVisits;
                    ?>%</p>
                </div>
            </div>
            <div class="card itemsFlex alignCenter w25">
                <div class="col w30 marginRightDefault">
                    <a><i class="ri-price-tag-3-fill"></i></a>
                </div>
                <div class="col w70">
                    <p class="fontSmall">New Products</p>
                    <h4><?php echo count($products); ?></h4>
                    <p>+<?php echo $resultPercetageProducts; ?>%</p>
                </div>
            </div>
            <div class="card itemsFlex alignCenter w25">
                <div class="col w30 marginRightDefault">
                    <a><i class="ri-stack-fill"></i></a>
                </div>
                <div class="col w70">
                    <p class="fontSmall">New Orders</p>
                    <h4><?php $orders = \models\dashboardModel::getOrders(); echo count($orders); ?></h4>
                    <p>+<?php 
                        $totalOrders = \models\dashboardModel::getOrders();
                        $percetageOrders = 1000;
                        $percetageOrdersValor = count($totalOrders);
                        $resultPercetageOrders = ($percetageOrdersValor / $percetageOrders) * 100;
                        echo $resultPercetageOrders;
                    ?>%</p>
                </div>
            </div>
        </div>
    </section>

    <section class="containerUsersInfos">
        <div class="wrap w90 center">
            <div class="slideMobile">
                <table class="w100">
                    <thead>
                        <tr>
                            <td><p>Nome</p></td>
                            <td><p>Email</p></td>
                            <td><p>Cidade</p></td>
                            <td><p>Data</p></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $usersOrders = \models\dashboardModel::getOrders();
                            foreach($usersOrders as $key => $value){
                                $id = (int)$value['user_id'];
                                $user = \MySql::connect()->prepare("SELECT * FROM `users` WHERE id = $id");
                                $user->execute();
                                $user = $user->fetch();
                        ?>
                        <tr>
                            <td><p><?php echo @$user['name']; ?></p></td>
                            <td><p><?php echo @$user['email']; ?></p></td>
                            <td><p><?php echo @$user['cep']; ?></p></td>
                            <td><p class="status"><?php echo @$value['created']; ?></p></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</section>


<section class="w20 w100Mobile">
    
    <section class="tabsContainer marginDownBigger">
        <div class="wrap w90 center">
            <nav>
                <li class="marginDownSmall">
                    <a class="tab box itemsFlex alignCenter">
                        <div class="col w50">
                            <p>Visitas</p>
                            <h4><?php echo count($visits); ?></h4>
                        </div>
                        <div class="col w50 textRight">
                            <i class="ri-arrow-right-line"></i>
                        </div>
                    </a>
                </li>
                <li class="marginDownSmall">
                    <a class="tab box itemsFlex alignCenter">
                        <div class="col w50">
                            <p>Usuários</p>
                            <h4><?php echo count($users); ?></h4>
                        </div>
                        <div class="col w50 textRight">
                            <i class="ri-arrow-right-line"></i>
                        </div>
                    </a>
                </li>
                <li class="marginDownSmall">
                    <a class="tab box itemsFlex alignCenter">
                        <div class="col w50">
                            <p>Pedidos</p>
                            <h4><?php echo count($orders); ?></h4>
                        </div>
                        <div class="col w50 textRight">
                            <i class="ri-arrow-right-line"></i>
                        </div>
                    </a>
                </li>
            </nav>
        </div>
    </section>

    <section class="container">
        <div class="wrap w90 center">
            <div class="boxChart">
                <div class="col itemsFlex alignCenter justSpaceBetween">
                    <h4>Dados</h4>
                    <p class="status">Visitas</p>
                </div>
                <div id="chartDices"></div>
            </div>
        </div>
    </section>

</section>

</section>


<?php include('js/charts.php'); ?>