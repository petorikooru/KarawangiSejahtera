<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class chartsHome extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                //
            ];
    }

    public function showCharts()
    {
        // Sample data, you can replace this with actual data from the database
        $populationData = [1200, 1500, 1800, 2100, 2400]; // Replace with actual data
        $genderData = [
            "labels" => ["Male", "Female"],
            "data" => [60, 40], // Replace with actual gender data
        ];

        return view("your-blade-view", compact("populationData", "genderData"));
    }
}
