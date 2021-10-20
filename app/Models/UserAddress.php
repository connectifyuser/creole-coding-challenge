<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'addressline1',
        'addressline2',
        'country',
        'state',
        'pincode',
        'city',
        'user_id'
    ];

     public function users(){
        return $this->belongsTo(User::class);
    }
}
