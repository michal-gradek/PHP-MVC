<?php
namespace MVC\Controllers;

use MVC\Controller;
use MVC\Models\Dashboard;

class DashboardController extends Controller {

    public function dashboard() {
        $model = new Dashboard();

        $orderCountDaily = $model->getOrderCountDaily();
        $orderCountWeek = $model->getOrderCountWeek();
        $orderCountMonth = $model->getOrderCountMonth();

        $orderValueDaily = $model->getOrderValueDaily();
        $orderValueWeek = $model->getOrderValueWeek();
        $orderValueMonth = $model->getOrderValueMonth();

        $orderProfitDaily = $model->getOrderProfitDaily();
        $orderProfitWeek = $model->getOrderProfitWeek();
        $orderProfitMonth = $model->getOrderProfitMonth();

        $orderStatus = $model->getOrderStatus();
        $orderUsers = $model->getLastUserOrder();
        $orderUsersTop = $model->getOrderUserTop();
        $productsName = $model->getProductsName();

        $chartDataDaily = $model->getChartDataDaily();
        $chartDataWeek = $model->getChartDataWeek();
        $chartDataMonth = $model->getChartDataMonth();

        $this->render('admin/dashboard', [ 
            "orderCountDaily" => $orderCountDaily,
            "orderCountWeek" => $orderCountWeek, 
            "orderCountMonth" => $orderCountMonth,
            "orderValueDaily" => $orderValueDaily,
            "orderValueWeek" => $orderValueWeek, 
            "orderValueMonth" => $orderValueMonth,
            "orderProfitDaily" => $orderProfitDaily,
            "orderProfitWeek" => $orderProfitWeek,  
            "orderProfitMonth" => $orderProfitMonth,
            "productsName" => $productsName,
            "orderStatus" => $orderStatus,
            "orderUsers" => $orderUsers,
            "chartDataDaily" => $chartDataDaily,
            "chartDataWeek" => $chartDataWeek,
            "chartDataMonth" => $chartDataMonth,
            "users" => $orderUsersTop
        ]);
    }

}
?>