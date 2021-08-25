<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sells';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    // protected $primaryKey = 'id

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['created_date', 'item_id', 'price', 'discount', 'employee_id'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'price' =>      'integer',
    ];

    /**
     * Relationship
     *
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Accessor
     *
     */
    public function getPriceAttribute($value)
    {
        return $value / 100;
    }

    public function getDiscountAttribute($value)
    {
        return round($value * 100, 2);
    }

    /**
     * Mutators
     *
     */
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }

    public function setDiscountAttribute($value)
    {
        $this->attributes['discount'] = round($value / 100, 2);
    }
}
