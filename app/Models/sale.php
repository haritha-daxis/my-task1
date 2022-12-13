<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    use HasFactory;
    protected $table='sales';
    protected $primaryKey='sales_id';
    protected $foreignKey='product_name';
    protected $fillable=['product_name','sales_qty','customer_id'];
}
