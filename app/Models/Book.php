<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use BeyondCode\Vouchers\Traits\HasVouchers;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory, HasVouchers;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'books';


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
        'title',
        'description',
        'author_id',
        'book_type',
        'price',
    ];

    /**
     * The roles that belong to the user.
     */
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }    

}
