<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
         'title'       => 'required|string|max:255',
        'description' => 'required|string',
        
        'image'       => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        'status'      => 'required|in:pending,in_progress,completed', //يمنع إرسال قيمة غير موجودة في enum.
        'priority'    => 'required|in:low,medium,high', //يمنع إرسال قيمة غير موجودة في enum.
       
        'due_date'    => 'required|date'
            // يعني:

            // الحقل إجباري.
            // يجب أن يكون تاريخًا.
            // لا يمكن اختيار تاريخ سابق لليوم.
            
            
            
            
        ];
    }

public function messages(): array
{
    return [
        'title.required'          => 'Le titre est obligatoire.',
        'title.string'            => 'Le titre doit être une chaîne de caractères.',
        'title.max'               => 'Le titre ne doit pas dépasser 255 caractères.',

        'description.required'    => 'La description est obligatoire.',
        'description.string'      => 'La description doit être une chaîne de caractères.',

        'image.image'             => 'Le fichier sélectionné doit être une image.',
        'image.mimes'             => 'L’image doit être au format PNG, JPG ou JPEG  ou WEBP.',
        'image.max'               => 'La taille de l’image ne doit pas dépasser 2 Mo.',

        'status.required'       => 'La status est obligatoire.',
        'status.in'             => 'La status sélectionnée est invalide.',

        'priority.required'       => 'La priorité est obligatoire.',
        'priority.in'             => 'La priorité sélectionnée est invalide.',

        'due_date.required'       => 'La date d’échéance est obligatoire.',
        'due_date.date'           => 'La date d’échéance doit être une date valide.',
        
    ];
}

}
