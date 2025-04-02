<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'title',
        'description',
        'price',         // Nuevo campo
        'audience',      // Nuevo campo
        'discount',
        'start_date',
        'end_date',
        'status',
        'token', 
        'qr_code'
    ];

    // Relación con Business
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
    public function users()
{
    return $this->belongsToMany(User::class, 'offer_scans'); // Asegúrate de que la tabla pivot sea la correcta

}

}
