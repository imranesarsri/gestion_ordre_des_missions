<?php

namespace App\Exports\pkg_PriseDeServices;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;

class PersonnelExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function headings(): array
    {
        return [
            'nom',
            'prenom',
            'nom_arab',
            'prenom_arab',
            'cin',
            'date_naissance',
            'telephone',
            'email',
            'address',
            'images',
            'matricule',
            'ville_id',
            'fonction_id',
            'ETPAffectation_id',
            'grade_id',
            'specialite_id',
            'etablissement_id',
            'avancement_id',
        ];
    }

    public function collection()
    {
        return $this->data->map(function ($personnel) {
            return [
                'nom' => $personnel->nom,
                'prenom' => $personnel->prenom,
                'nom_arab' => $personnel->nom_arab,
                'prenom_arab' => $personnel->prenom_arab,
                'cin' => $personnel->cin,
                'date_naissance' => $personnel->date_naissance,
                'telephone' => $personnel->telephone,
                'email' => $personnel->email,
                'address' => $personnel->address,
                'images' => $personnel->images,
                'matricule' => $personnel->matricule,
                'ville_id' => $personnel->ville_id,
                'fonction_id' => $personnel->fonction_id,
                'ETPAffectation_id' => $personnel->ETPAffectation_id,
                'grade_id' => $personnel->grade_id,
                'specialite_id' => $personnel->specialite_id,
                'etablissement_id' => $personnel->etablissement_id,
                'avancement_id' => $personnel->avancement_id,
            ];
        });
    }


    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();

        $sheet->getStyle("A1:R{$lastRow}")->applyFromArray([
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'FFFFFF',
                ],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        $sheet->getStyle("A1:R1")->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'FFD3D3D3',
                ],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);
    }
}
