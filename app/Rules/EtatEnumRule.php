<?php

namespace App\Rules;

use App\Models\EtatEnum;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EtatEnumRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }

    public function passes($attribute, $value)
    {
        return in_array($value, array_keys(EtatEnum::asSelectArray()));
    }
    public function message()
    {
        return 'The :attribute is invalid.';
    }
}
