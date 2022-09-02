<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory, Searchable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cars';


    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'model',
        'mechanic_id'
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
    */
    public function searchableAs()
    {
        return 'car_index';
    }

    public function mechanic () {
        return $this->belongsTo(Mechanic::class, 'mechanic_id');
    }

}
