<?php

namespace App\Models;

//use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
  //  use Uuids;
    //use HasFactory;
    use HasFactory;
    protected $table='product';
    protected $primaryKey ='id';
   //protected $foreignKey ='category_id';
    protected $fillable = ['name','price','category_id'];
}
