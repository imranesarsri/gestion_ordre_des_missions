<?php

namespace App\helpers;

class TranslationHelper
{
    public static function getTitle(string $class, string $lang): string
    {
        $translationKeys = [
            'fr' => 'Liste des :class',
            'en' => 'List of :class',
        ];

        $lang = ($lang == 'fr') ? 'fr' : 'en';
        $translatedClass = $class;
        $translationKey = $translationKeys[$lang];
        return trans($translationKey, ['class' => $translatedClass]);
    }
}
