<?php

namespace App\Http\Requests;

use App\DTO\SaveEpreuveDto;
use Illuminate\Foundation\Http\FormRequest;

class EpreuveRequete extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'libelle' => ['required', 'string', 'max:255'],
        ];
    }
    public function messages()
    {
        return [
            'libelle.required' => "Le libelle est obligatoire.",
        ];
    }

    public function toDTO(): SaveEpreuveDto
    {
        return new SaveEpreuveDto(
            isset($this->id) ? (int) $this->id : 0,
            $this->libelle,
        );
    }

}
