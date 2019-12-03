<?php

namespace common\helpers;

class JResponse // JSON Response
{
    public static function format($data, $success, $code = null, $hash = null)
    {
        return [
            'success'    => $success,
            'data'      => $data
        ];
    }

    public static function success($data = null, $code = null, $hash = null)
    {
        return self::format($data, true);
    }

    public static function error($data = null, $code = null, $hash = null)
    {
        return self::format($data, false);
    }
}