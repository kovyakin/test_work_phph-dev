<?php

namespace App\Http\Requests\Api\Referrals;

use App\Models\Master;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class GetMasterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return !is_null(request()->attributes->get('current_master'));
    }

    /**
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge(['id' => request()->attributes->get('current_master')?->id]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:masters,id',
        ];
    }

    /**
     *
     * @return int
     */
    public function getMasterId(): int
    {
        return $this->validated('id');
    }

}
