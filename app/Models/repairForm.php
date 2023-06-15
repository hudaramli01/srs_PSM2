<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class repairForm extends Model
{
    protected $table = 'form';
    protected $fillable = [
        'id',
        'receivedDate',
        'customerID',
        'brandName',
        'modelName',
        'password',
        'probDesc',
        'probType',
        'solution',
        'product',
        'managedBy',
        'dueDate',
        'payment',
        'status',
    ];

    public function solution()
    {
        return $this->belongsTo(Solution::class, 'probType', 'solutionName');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'solution', 'serviceName');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product', 'productName');
    }
}