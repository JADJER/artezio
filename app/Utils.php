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

    public function setSign($check_arr)
    {
        foreach ($check_arr as $item)
        {
            if (empty($item))
                return 2;
        }


        if (!$this->checkKey($check_arr))
            return 2;

        return 1;
    }

    public function checkKey($check_arr)
    {


        //бик 044525225
        // счет 30301810000006000001
        //кор счет 30101810400000000225
        return true;

    }

}