<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $guarded = false;

    public $statusNames = [
        1 => "Принят",
        2 => "Выполняется",
        3 => "Готов",
        4 => "Отказ",
        5 => "Остановлен"
    ];

    public $payMethodNames = [
        1 => "Картой",
        2 => "Кредит",
        3 => "Наличными",
        4 => "Наложный платеж"
    ];

    public function getStatusNameAttribute() {
        return $this->statusNames[$this->status];
    }

    public function getPayMethodNameAttribute() {
        return $this->payMethodNames[$this->pay_method];
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class, 'order_products')
            ->withPivot('price', 'quantity')
            ->selectRaw('products.*, (order_products.quantity * order_products.price) as subtotal');
    }

    public function getTotalAttribute()
    {
        return $this->products->sum(function($product) {
            return $product->pivot->quantity * $product->pivot->price;
        });
    }

}
