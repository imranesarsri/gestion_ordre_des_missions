<?php

namespace App\Exports\pkg_OrderDesMissions;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\pkg_OrderDesMissions\Transports;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class MissionExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
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
            'numero_mission',
            'nature',
            'lieu',
            'type_de_mission',
            'numero_ordre_mission',
            'data_ordre_mission',
            'date_debut',
            'date_fin',
            'date_depart',
            'heure_de_depart',
            'date_return',
            'heure_de_return',
            'transport_utiliser',
            'marque',
            'puissance_fiscal',
            'numiro_plaque',
            'reference',
        ];
    }

    public function collection()
    {
        $data = collect();
        $transports = Transports::all();
        foreach ($this->data as $mission) {
            $users = $mission->users; // Assuming $mission->users returns a collection or array
            // $transports = $mission->moyensTransport; // Assuming $mission->moyensTransport returns a collection or array

            for ($i = 0; $i < count($users); $i++) {
                $user = $users[$i];
                foreach ($transports as $transport) {
                    if ($transport->user == $user->id && $transport->mission_id == $mission->id) {
                        $data->push([
                            'nom' => $user->nom,
                            'prenom' => $user->prenom,

                            'numero_mission' => $mission->numero_mission,
                            'nature' => $mission->nature,
                            'lieu' => $mission->lieu,
                            'type_de_mission' => $mission->type_de_mission,
                            'numero_ordre_mission' => $mission->numero_ordre_mission,
                            'data_ordre_mission' => $mission->data_ordre_mission,
                            'date_debut' => $mission->date_debut,
                            'date_fin' => $mission->date_fin,
                            'date_depart' => $mission->date_depart,
                            'heure_de_depart' => $mission->heure_de_depart,
                            'date_return' => $mission->date_return,
                            'heure_de_return' => $mission->heure_de_return,

                            'transport_utiliser' => $transport->transport_utiliser,
                            'marque' => $transport->marque,
                            'puissance_fiscal' => $transport->puissance_fiscal,
                            'numiro_plaque' => $transport->numiro_plaque,
                            'reference' => $mission->id . '__' . $user->id . '__' . $user->nom . '__' . $user->prenom . '__' . $transport->moyens_transports_id,
                        ]);
                    }
                }

            }
        }


        return $data;
    }


    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();

        $sheet->getStyle("A1:E{$lastRow}")->applyFromArray([
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

        $sheet->getStyle("A1:E1")->applyFromArray([
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