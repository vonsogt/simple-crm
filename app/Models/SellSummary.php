<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellSummary extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sell_summaries';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    // protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['date', 'employee_id', 'created_date', 'last_update', 'price_total', 'discount_total', 'total'];

    /**
     * Relationship
     *
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Accessor
     *
     */
    public function getPriceTotalAttribute($value)
    {
        return $value / 100;
    }

    public function getDiscountTotalAttribute($value)
    {
        return $value / 100;
    }

    public function getTotalAttribute($value)
    {
        return $value / 100;
    }

    /**
     * Mutators
     *
     */
    public function setPriceTotalAttribute($value)
    {
        $this->attributes['price_total'] = $value * 100;
    }

    public function setDiscountTotalAttribute($value)
    {
        $this->attributes['discount_total'] = $value * 100;
    }

    public function setTotalAttribute($value)
    {
        $this->attributes['total'] = $value * 100;
    }
}
