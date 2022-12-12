<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    use HasFactory;
    protected $table='sales';
    protected $primaryKey='sales_id';
    protected $fillable=['sales_item','sales_qty','customer_id'];
}
