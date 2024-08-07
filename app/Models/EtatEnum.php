<?php
namespace App\Models;

use Illuminate\Validation\Rules\Enum;

class EtatEnum
{
    const BON_ETAT = 'bon_etat';
    const EN_REPARATION = 'en_reparation';
    const EN_DOMMAGE = 'endommage';

    public static function set($etat){
        return new Enum(self::class, $etat);
    }

    public static function asSelectArray(){
        return [
            self::BON_ETAT => 'Bon etat',
            self::EN_REPARATION => 'En reparation',
            self::EN_DOMMAGE => 'Endommage',
        ];
    }


}
