<?php

namespace App\Http\Requests\Api\Referrals;


use App\Http\DTOs\Referrals\AttachDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ReferralAttachRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return !is_null(request()->attributes->get('current_master'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'exists:masters,referral_code'],
        ];
    }

    /**
     *
     * @return AttachDTO
     */
    public function getDTO(): AttachDTO
    {
        return new AttachDTO(code: $this->validated('code'),
            master: request()->attributes->get('current_master'));
    }
}
