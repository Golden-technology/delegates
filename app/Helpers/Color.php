<?php

use App\Models\Order;

if (!function_exists('getClass')) {
    /**
     * Returns a background-color 
     *
     * @param string type
     * 
     *
    */
    function getClass($status) : string
    {
        switch ($status) {
            case Order::STATUS_WAITTING :
                return "bg-warning";
                break;
            case Order::STATUS_DONE :
                return "bg-success text-white";
                break;
            case Order::STATUS_CANCEL :
                return "bg-danger text-white";
                break;
            default:
                return "bg-default";
                break;
        }
    }
}