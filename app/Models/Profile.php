<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// class Profile extends Model
// {
class Profile extends User
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'image'
    ];
    // public function getImageAttribute($value){
    //     return $value ?? "no_profile.png";
    // }
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
