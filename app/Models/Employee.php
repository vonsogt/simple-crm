<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employees';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    // protected $primaryKey = 'id';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'email',
        'phone',
        'created_at',
        'updated_at',
    ];

    // Accessor
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    // Relation
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
