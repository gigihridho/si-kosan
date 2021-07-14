<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pengeluaran' => 'required|string',
            'nominal' => 'required|numeric',
            'date' => 'date',
            'keterangan' => 'required|string',
            'status' => 'required|boolean'
        ];
    }
}