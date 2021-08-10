<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

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

    /**
     * timestamps
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * dates
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'email',
        'phone',
        'password',
        'created_by_id',
        'updated_by_id',
        'created_at',
        'updated_at',
    ];

    /**
     * Accessor
     *
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getCreatedAtAttribute($value)
    {
        if ($value) {
            $date = date_format(date_create($value), 'Y-m-d H:i:s');
            return Carbon::create($date)->setTimezone(config('app.timezone'));
        }
    }

    public function getUpdatedAtAttribute($value)
    {
        if ($value) {
            $date = date_format(date_create($value), 'Y-m-d H:i:s');
            return Carbon::create($date)->setTimezone(config('app.timezone'));
        }
    }

    /**
     * Relationship
     *
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
