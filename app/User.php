<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    public function get_user_products($user_id){
        $products =DB::table('products')->where('user_id',$user_id)->get();
        $unchecked_products=DB::table('unchecked_products')->where('user_id',$user_id)->get();
        $index=0;
        foreach($products as $product){
            $user_products[$index++]=array($product,true);
        }
        foreach($unchecked_products as $unchecked_product){
            $user_products[$index++]=array($unchecked_product,false);
        }
        return $user_products;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
