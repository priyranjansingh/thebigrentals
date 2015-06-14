<?php

Yii::import("application.modules.admin.models.MonthlySubscriptionChart", true);

class DefaultController extends Controller {

    public $layout = '//layouts/column2';

    public function actionIndex() {

        $subscription_data = MonthlySubscriptionChart::model()->getMonthlySubscriptionData('2015');
        $income_data = MonthlyIncomeChart::model()->getMonthlyIncomeData('2015');
        $property_data = MonthlyPropertyChart::model()->getMonthlyPropertyData('2015');
        if (!Yii::app()->user->isGuest) {
            $this->render('index', array(
                'subscription_data' => $subscription_data,
                'income_data' => $income_data,
                'property_data' => $property_data,
            ));
        }
    }

    public function actionChart() {
        $year = $_POST['year'];
        $data['subscription'] =  MonthlySubscriptionChart::model()->getMonthlySubscriptionData($year);
        $data['income']  = MonthlyIncomeChart::model()->getMonthlyIncomeData($year);
        $data['property'] = MonthlyPropertyChart::model()->getMonthlyPropertyData($year);
        echo json_encode($data);
    }

}
