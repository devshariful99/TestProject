<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


    protected $fillable = [
        'name',
        'slug',
        'image',
        'status',
    ];

    protected $casts = [
        'status' => 'integer',
    ];

    public function getStatusTitle()
    {
        switch ($this->status) {
            case 1:
                return 'Active';
                break;
            case 0:
                return 'Inactive';
                break;
        }
    }

    public function getStatusBg()
    {
        switch ($this->status) {
            case 1:
                return 'bg-success';
                break;
            case 0:
                return 'bg-danger';
                break;
        }
    }

    public function getStatusBtnTitle()
    {
        switch ($this->status) {
            case 1:
                return 'Inactive';
                break;
            case 0:
                return 'Active';
                break;
        }
    }

    public function getStatusBtnBg()
    {
        switch ($this->status) {
            case 1:
                return 'btn-warning';
                break;
            case 0:
                return 'btn-success';
                break;
        }
    }
}
