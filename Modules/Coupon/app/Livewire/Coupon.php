<?php

namespace Modules\Coupon\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Coupon\app\Enums\CouponStatus;
use Modules\Coupon\app\Helpers\CouponCodeGenerator;

class Coupon extends Component
{
    use WithPagination;

    #[Validate('required')]
    public $title;
    public $coupon_code;
    #[Validate('required')]
    public $coupon_percent;
    public $editedIndex;
    protected $paginationTheme = 'bootstrap';


    public function createRow(): void
    {
        $this->validate();
        \Modules\Coupon\Models\Coupon::query()->create([
            'title' => $this->title,
            'coupon_code' => CouponCodeGenerator::generateRandomString(6),
            'coupon_percent' => $this->coupon_percent,
        ]);

        $this->reset('title', 'coupon_percent');
        session()->flash('message', 'کد تخفیف ایجاد شد');
    }

    public function editRow($id): void
    {
        $coupon = \Modules\Coupon\Models\Coupon::query()->find($id);
        $this->title = $coupon->title;
        $this->coupon_percent = $coupon->coupon_percent;
        $this->editedIndex=$id;
    }

    public function updateRow(): void
    {
        $this->validate();
        \Modules\Coupon\Models\Coupon::query()->find($this->editedIndex)->update([
            'title' => $this->title,
            'coupon_percent' => $this->coupon_percent
        ]);

        $this->reset('title', 'coupon_percent');
        session()->flash('message', 'کد تخفیف ویرایش شد');
        $this->editedIndex=null;
    }

    public function changeCouponStatus($coupon_id): void
    {
        $coupon = \Modules\Coupon\Models\Coupon::query()->find($coupon_id);
        if($coupon->status === CouponStatus::Active->value){
            $coupon->update([
                'status'=>CouponStatus::Expired->value
            ]);
        }elseif ($coupon->status === CouponStatus::Expired->value){
            $coupon->update([
                'status'=>CouponStatus::Active->value
            ]);
        }
    }


    #[Layout('panel::components.layouts.app'), Title('کد های تخفیف')]
    public function render():view
    {
        return view('coupon::livewire.coupon');
    }
}
//Mohsen was here mmosalla36@gmail.com 😎
