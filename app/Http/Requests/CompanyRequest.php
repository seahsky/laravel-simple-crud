<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        if($this->isMethod('post')) {
            return $this->createRules();
        }
        else if ($this->isMethod('put')) {
            return $this->updateRules();
        }
    }

    public function createRules()
    {
        return [
            'add_company_name' => 'required|string|max:30',
            'add_company_email' => 'required|email',
            'add_company_logo' => 'required|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=100,min_height=100',
            'add_company_website' => 'required|string|max:100'
        ];
    }

    public function updateRules()
    {
        return [
            'company_name' => 'required|string|max:30',
            'company_email' => 'required|email',
            'company_logo' => 'image|mimes:jpeg,png,jpg,gif|dimensions:min_width=100,min_height=100',
            'company_website' => 'required|string|max:100'
        ];
    }
}
