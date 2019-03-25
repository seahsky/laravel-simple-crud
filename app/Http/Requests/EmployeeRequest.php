<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'add_employee_first_name' => 'required|string|max:30',
            'add_employee_last_name' => 'required|string|max:30',
            'add_employee_company' => 'required|exists:companies,email',
            'add_employee_phone' => 'required|regex:/(01)[0-9]{8,9}/',
            'add_employee_email' => 'required|string|max:50',
        ];
    }

    public function updateRules()
    {
        return [
            'employee_first_name' => 'required|string|max:30',
            'employee_last_name' => 'required|string|max:30',
            'employee_company' => 'required|exists:companies,email',
            'employee_phone' => 'required|regex:/(01)[0-9]{8,9}/',
            'employee_email' => 'required|string|max:50',
        ];
    }
}
