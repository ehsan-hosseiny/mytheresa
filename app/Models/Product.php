<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $appends = ['sku'];
    protected $fillable=['category_id','name','price','discount'];

    const CURRENCY = 'EUR';

    protected $hidden=['id','category_id','discount','created_at','updated_at'];

    /**
     * @return string
     */
    public function getSkuAttribute()
    {
        return str_pad($this->id, 6, '0',STR_PAD_LEFT);
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
