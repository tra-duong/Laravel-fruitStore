<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_name',
        'items',
        'author_id',
    ];

    protected $casts = [
        'items' => 'json',
    ];

    /**
     * Get the author of the invoice.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

}
