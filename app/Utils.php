<?php
/**
 * Created by PhpStorm.
 * User: jadjer
 * Date: 24.12.16
 * Time: 0:03
 */

namespace app;

use App\OrderType;
use App\OrderStatus;

class Utils
{

    public function getOrderType($arg)
    {
        return OrderType::find($arg)->order_type;
    }

    public function getOrderStatus($arg)
    {
        return OrderStatus::find($arg)->status;
    }
}