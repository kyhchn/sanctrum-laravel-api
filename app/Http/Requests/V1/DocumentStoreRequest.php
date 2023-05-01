<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DocumentStoreRequest extends FormRequest{
    //validation

    public function rules():array{
        return ['id'];
    }
}