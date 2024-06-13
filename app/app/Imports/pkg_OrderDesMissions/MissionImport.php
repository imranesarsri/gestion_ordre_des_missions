<?php

namespace App\Imports\pkg_OrderDesMissions;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use App\Models\pkg_OrderDesMissions\Mission;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\pkg_OrderDesMissions\Transports;
use App\Models\pkg_OrderDesMissions\MissionPersonnel;

class MissionImport implements ToModel, WithHeadingRow
{
    // Implement the method to check if a mission already exists in the application
    private function missionExists(array $row): bool
    {
        // Logic to check if a mission with the same attributes exists in the database
        // For example, you can check if a mission with the same name and dates already exists
        $existingMission = Mission::where('numero_mission', $row['numero_mission'])
            ->exists();
        return $existingMission;
    }

    // Implement the model() method to import missions
    public function model(array $row)
    {
        $referenceData = explode("__", $row['reference']);
        // dd($referenceData[1]);

        // Check if the mission already exists in the application
        if ($this->missionExists($row)) {
            // Mission already exists, skip importing it
            return null;
        }

        // Use a transaction to ensure atomicity
        DB::beginTransaction();
        try {
            // Create the Mission entry
            $mission = Mission::create([
                'numero_mission' => $row["numero_mission"],
                'nature' => $row["nature"],
                'lieu' => $row["lieu"],
                'type_de_mission' => $row["type_de_mission"],
                'numero_ordre_mission' => $row["numero_ordre_mission"],
                'data_ordre_mission' => $row["data_ordre_mission"],
                'date_debut' => $row["date_debut"],
                'date_fin' => $row["date_fin"],
                'date_depart' => $row["date_depart"],
                'heure_de_depart' => $row["heure_de_depart"],
                'date_return' => $row["date_return"],
                'heure_de_return' => $row["heure_de_return"],
            ]);

            // Create the Transports entry
            Transports::create([
                'transport_utiliser' => $row["transport_utiliser"],
                'marque' => $row["marque"],
                'puissance_fiscal' => $row["puissance_fiscal"],
                'numiro_plaque' => $row["numiro_plaque"],
                'user' => $referenceData[1],
                'moyens_transports_id' => $referenceData[4],
                'mission_id' => $mission->id,
            ]);

            // Create the MissionPersonnel entry
            MissionPersonnel::create([
                'user_id' => $referenceData[1],
                'mission_id' => $mission->id,
            ]);

            // Commit the transaction
            DB::commit();

            // Return the Mission object
            return $mission;
        } catch (\Exception $e) {
            // Rollback the transaction in case of any error
            DB::rollBack();
            // Handle the exception as needed, e.g., log the error, rethrow, etc.
            throw $e;
        }
    }
}