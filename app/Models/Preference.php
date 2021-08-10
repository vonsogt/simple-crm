<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'preferences';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'data'];

     /**
     * timestamps
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Relationship
     */
    public function user()
    {
        $this->belongsTo(User::class);
    }
}
