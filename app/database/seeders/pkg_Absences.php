<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Seeders\pkg_Absences\{
    AbsenceSeerder,
    AnneeJuridiqueSeerder,
    JourFerieSeerder,
};

class pkg_Absences extends Seeder
{
    public function run(): void
    {
        $this->call(pkg_Absences::Classes());
    }

    public static function Classes(): array
    {
        return [
            AbsenceSeerder::class,
            AnneeJuridiqueSeerder::class,
            JourFerieSeerder::class,
        ];
    }
}
