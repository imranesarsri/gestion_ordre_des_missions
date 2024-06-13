<?php

namespace App\helpers\pkg_Absences;

use Carbon\Carbon;
use App\Models\pkg_Absences\JourFerie;
use App\Models\pkg_Parametres\Fonction;
use App\Models\pkg_Absences\AnneeJuridique;

class AbsenceHelper
{
    public static function getHolidaysInRange($annee, $isFonction, $startDate, $endDate)
    {
        $anneJuridique = AbsenceHelper::getAnneeJuridique($annee);

        return JourFerie::where('annee_juridique_id', $anneJuridique)->where($isFonction, true)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('date_debut', [$startDate, $endDate])
                    ->orWhereBetween('date_fin', [$startDate, $endDate])
                    ->orWhere(function ($query) use ($startDate, $endDate) {
                        $query->where('date_debut', '<=', $startDate)
                            ->where('date_fin', '>=', $endDate);
                    });
            })->get();
    }

    public static function getAbsenceDatesExcludingHolidays($annee, $isFonction, $startDate, $endDate)
    {
        $holidays = self::getHolidaysInRange($annee, $isFonction, $startDate, $endDate);
        $holidayDates = [];

        foreach ($holidays as $holiday) {
            $holidayPeriod = new \DatePeriod(
                new \DateTime($holiday->date_debut),
                new \DateInterval('P1D'),
                (new \DateTime($holiday->date_fin))->modify('+1 day')
            );

            foreach ($holidayPeriod as $date) {
                $holidayDates[] = $date->format('Y-m-d');
            }
        }

        $start = new \DateTime($startDate);
        $end = new \DateTime($endDate);
        $end->modify('+1 day');

        $absencePeriod = new \DatePeriod($start, new \DateInterval('P1D'), $end);
        $absenceDates = [];

        foreach ($absencePeriod as $date) {
            if (!in_array($date->format('Y-m-d'), $holidayDates)) {
                $absenceDates[] = $date->format('Y-m-d');
            }
        }

        return $absenceDates;
    }

    public static function calculateAbsenceDuration($annee, $isFonction, $startDate, $endDate)
    {
        $absenceDates = self::getAbsenceDatesExcludingHolidays($annee, $isFonction, $startDate, $endDate);
        return count($absenceDates);
    }

    public static function getPersonnelFonction($id)
    {
        return Fonction::where('id', $id)->pluck('nom')->first();
    }

    public static function getAnneeJuridique($annee)
    {
        return AnneeJuridique::where("annee", $annee)->pluck('id')->first();
    }

    public static function convertToAnneeJuridique($date)
    {
        $carbonDate = Carbon::parse($date);
        $year = $carbonDate->year;
        $month = $carbonDate->month;

        if ($month > 6) {
            // If the month is after June, the legal year is current year to next year
            $anneeJuridique = $year . '-' . ($year + 1);
        } else {
            // If the month is before or in June, the legal year is previous year to current year
            $anneeJuridique = $year - 1 . '-' . $year;
        }

        return $anneeJuridique;
    }

    public static function calculateAbsenceDurationForPersonnel($absence)
    {
        $fonction = self::getPersonnelFonction($absence->personnel->fonction_id);
        $role = ($fonction == 'Formateur') ? 'is_formateur' : 'is_administrateur';
        $anneeJuridique = self::convertToAnneeJuridique($absence->date_debut);

        return self::calculateAbsenceDuration(
            $anneeJuridique,
            $role,
            $absence->date_debut,
            $absence->date_fin
        );
    }

}
