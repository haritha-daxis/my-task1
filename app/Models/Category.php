<?php

namespace App\Models;

//use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   // use Uuids;
    //use HasFactory;
    use HasFactory;
    //
protected $table='category';
protected $primaryKey='id';
protected $fillable = ['category_id','category_desc'];

    // protected $guarded = [];
    // public function subcategories(){
    //     return $this->hasMany('App\Models\Category', 'parent_id');

   // }
    //

}
