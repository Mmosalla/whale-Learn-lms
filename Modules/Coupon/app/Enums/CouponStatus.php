<?php

namespace Modules\Coupon\app\Enums;

enum CouponStatus:string
{
  case Active = 'active';
  case Expired = 'expired';

}
