<?php

namespace Modules\Cart\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Modules\Cart\Models\Cart;

class Carts extends Component
{
    public $coupon_code;
    public $total_price,$total_discount;
    public $coupon_discount = 0;

    public function deleteCartCourse($cart_id): void
    {
        Cart::destroy($cart_id);
//        $this->alert('success', 'دوره از سبد شما حذف شد');
    }

//    public function checkCoupon(): void
//    {
//        if($this->coupon_code){
//            $coupon = Coupon::query()
//                ->where('coupon_code', $this->coupon_code)
//                ->where('status', CouponStatus::Active->value)
//                ->first();
//            if($coupon){
//                $this->coupon_discount = ($this->total_price * $coupon->coupon_percent)/100;
//            }else{
//                $this->alert('error', 'کد تخفیف معتبر نمی باشد');
//            }
//        }
//    }

//    public function payment()
//    {
//        DB::beginTransaction();
//        try {
//            $order = Order::query()->create([
//                'user_id'=> auth()->user()->id,
//                'order_code'=> OrderCodeGenerator::generateRandomInteger(6),
//                'total_price'=>$this->total_price,
//                'discount'=>$this->total_discount,
//                'discount_code'=>$this->coupon_code
//            ]);
//
//            $carts =  Cart::query()->where('user_id', auth()->user()->id)
//                ->get();
//            foreach ($carts as $cart){
//                OrderDetail::query()->create([
//                    'order_id'=>$order->id,
//                    'course_id'=>$cart->course_id,
//                    'price'=>$cart->course->price,
//                    'discount'=>$cart->course->discount,
//                ]);
//            }
//
//            DB::commit();
//
//            $pay_price = $this->total_price - $this->total_discount;
//            $result =  Payment::purchase(
//                (new Invoice)->amount($pay_price),
//                function($driver, $transactionId) use ($order) {
//                    $order->update([
//                        'transaction_id'=>  $transactionId
//                    ]);
//                }
//            )->pay()->toJson();
//
//            $carts =  Cart::query()->where('user_id', auth()->user()->id)
//                ->get();
//            foreach ($carts as $cart){
//                $cart->delete();
//            }
//            return $this->redirect(json_decode($result)->action);
//
//        }catch (\Exception $exception){
//            DB::rollBack();
//            Log::error($exception->getMessage());
//        }
//
//
//    }


    #[Layout('homepage::components.layouts.app') , Title('سبد خرید')]
    public function render(): view
    {
        $carts =  Cart::query()->where('user_id', auth()->user()->id)
            ->get();
        $this->total_price=0;
        $this->total_discount= 0;

        foreach ($carts as $cart) {
            $this->total_price += $cart->course->price;
            $this->total_discount += ($cart->course->price * $cart->course->discount)/100;
        }
        if(!count($carts)){
            $this->coupon_discount =0;
        }
        $this->total_discount += $this->coupon_discount;
        return view('cart::livewire.carts' , compact('carts'));
    }
}

// Mohsen was here mmosalla36@gmail.com 😎
