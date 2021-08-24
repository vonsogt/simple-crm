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
        return (int) ($value * 100);
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
        $this->attributes['discount'] = $value / 100;
    }
}
