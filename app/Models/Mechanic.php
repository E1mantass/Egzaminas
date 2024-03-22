<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\Service;
class Mechanic extends Model
{
    use HasFactory;

    protected $fillable = ['firstName', 'lastName', 'specialization', 'poster', 'city', 'service', 'user_id'];

    public function service(){
        return $this->belongsTo(Service::class);
    }
}