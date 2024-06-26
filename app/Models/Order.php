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
        return $this->belongsToMany(Product::class)->withPivot(['quantity','price','total'])->as('orderd');
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
            case 'تم توصيل طلبك اليك':
                return "100%" ;
            default:
                return "0%" ;
        }
    }
}
