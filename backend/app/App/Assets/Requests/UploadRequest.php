<?php

namespace App\App\Assets\Requests;

use App\Domain\Assets\DTO\AssetData;
use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'file' => ['required', 'image'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function dto(): AssetData
    {
        return AssetData::from($this->validated());
    }
}
