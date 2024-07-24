<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['number', 'total', 'is_delivered', 'user_id'];

    protected $searchableFields = ['*'];

    protected $casts = [
        'is_delivered' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity','price','total'])->as('ordered');
    }

    public function calculateTotal()
    {
         $this->total = $this->products->sum('ordered.total');
         $this->save();
         return;

    }
    public function percent()
    {
        switch ($this->status) {
            case 'تم إستلام طلبك':
                return "25%" ;
            case 'طلبك قيد الاعداد':
                return "50%" ;
            case 'طلبك قيد التوصيل':
                return "75%" ;
            case 'تم التسليم':
                return "100%" ;
            default:
                return "0%" ;
        }
    }

           /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            $model->number =$model->id;
            $model->save();
        });
        
   
    }


}

