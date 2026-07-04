<?php

namespace Modules\Coupon\app\Helpers;

use Modules\Coupon\Models\Coupon;

class CouponCodeGenerator
{

    public static function generateRandomString($length): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $codeExist = Coupon::query()->where('coupon_code', $randomString)->first();
        if ($codeExist) {
            return self::generateRandomString(6);
        }

        return $randomString;
    }

}
