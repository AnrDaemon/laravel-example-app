<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Validation\Validator;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
    ];

    public function validate($data): Validator
    {
        return ValidatorFacade::make($data, [
            'name' => 'required|string|max:255',
        ]);
    }
}
