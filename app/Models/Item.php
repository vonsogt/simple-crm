<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'items';

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
    protected $fillable = ['name', 'price'];

    /**
     * Accessor
     *
     */
    public function getPriceAttribute($value)
    {
        return $value / 100;
    }

    /**
     * Mutators
     *
     */
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }
}
