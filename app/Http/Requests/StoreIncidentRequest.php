<?php
namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class StoreIncidentRequest extends FormRequest
{
public function authorize(): bool { return true; }


public function rules(): array
{
return [
'contract_id' => 'required|string|max:255',
'date' => 'required|date',
'description' => 'required|string',
'location' => 'required|string|max:255',
];
}
}

?>