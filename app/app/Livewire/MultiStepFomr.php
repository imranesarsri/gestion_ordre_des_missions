<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use GuzzleHttp\Psr7\Request;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Models\pkg_OrderDesMissions\Mission;
use App\Models\pkg_OrderDesMissions\Transports;
use App\Models\pkg_OrderDesMissions\MoyensTransport;
use App\Models\pkg_OrderDesMissions\MissionPersonnel;

class MultiStepFomr extends Component
{
    use WithFileUploads;

    // Form data properties
    public $numero_mission;
    public $nature;
    public $lieu;
    public $type_de_mission;
    public $numero_ordre_mission;
    public $data_ordre_mission;
    public $date_debut;
    public $date_fin;
    public $date_depart;
    public $heure_de_depart;
    public $date_return;
    public $heure_de_return;
    public $users = [];
    public $moyens_transports = [];
    public $marque = [];
    public $puissance_fiscal = [];
    public $numiro_plaque = [];

    //? dataToEdit of the form ('create' or 'update')
    public $dataToEdit;
    public $ID;
    // ? data update
    public $setUser;
    public $setMissions;
    public $setTransports;


    // Multi-step form controls
    public $totalSteps = 4;
    public $currentStep = 1;

    // Loaded data from database
    public $personnels;
    public $moyensTransportsValues;
    public $missionsValue;
    public $transports;

    // Get user name by ID
    public function getUserNameById($id)
    {
        $user = User::find($id);
        return $user ? $user->nom : null;
    }

    // Get transport used by ID
    public function getTransportUtiliserById($id)
    {
        $user = MoyensTransport::find($id);
        return $user ? $user->nom : null;
    }

    public function getTransportUtiliserByName($name)
    {
        $user = MoyensTransport::where('nom', $name)->first();
        return $user ? $user->id : null;
    }



    //? Mount method to initialize properties
    public function mount()
    {
        $this->currentStep = 1;
        $this->personnels = User::all();
        $this->moyensTransportsValues = MoyensTransport::all();
        if ($this->dataToEdit == "update") {
            $this->setMissions = Mission::with('users', 'moyensTransport')->find($this->ID);
            $this->setTransports = Transports::where('mission_id', $this->setMissions->id)->get();
            // dd($this->setTransports);
            $this->numero_mission = $this->setMissions->numero_mission;
            $this->nature = $this->setMissions->nature;
            $this->lieu = $this->setMissions->lieu;
            $this->type_de_mission = $this->setMissions->type_de_mission;
            $this->numero_ordre_mission = $this->setMissions->numero_ordre_mission;
            $this->data_ordre_mission = $this->setMissions->data_ordre_mission;
            $this->date_debut = $this->setMissions->date_debut;
            $this->date_fin = $this->setMissions->date_fin;
            $this->date_depart = $this->setMissions->date_depart;
            $this->heure_de_depart = $this->setMissions->heure_de_depart;
            $this->date_return = $this->setMissions->date_return;
            $this->heure_de_return = $this->setMissions->heure_de_return;
            // users
            $UsersID = [];
            foreach ($this->setMissions->users as $user) {
                $UsersID[] = $user->id;
                $this->users[] = $user->id;
            }

            //! transports
            // dd($this->setTransports);
            foreach ($this->setTransports as $index => $transport) {
                $userId = $UsersID[$index];
                $this->moyens_transports[$userId] = $this->getTransportUtiliserByName($transport->transport_utiliser);
                $this->marque[$userId] = $transport->marque;
                $this->puissance_fiscal[$userId] = $transport->puissance_fiscal;
                $this->numiro_plaque[$userId] = $transport->numiro_plaque;
            }
            // dd($this->numiro_plaque);
        }
    }

    // Render the Livewire component view
    public function render()
    {
        return view('livewire.multi-step-fomr');
    }

    // Move to the next step
    public function increaseStep()
    {
        $this->resetErrorBag();
        $this->valdateData();

        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    // Move to the previous step
    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }


    // Validate data based on the current step
    public function valdateData()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'numero_mission' => 'required|max:10', //|unique:missions,numero_mission
                'users' => 'required|array',
                'nature' => 'nullable|max:40',
                'type_de_mission' => 'required|max:100',
                'numero_ordre_mission' => 'required|max:10',
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'lieu' => 'required|max:100',
                'data_ordre_mission' => 'required|date',
                'date_debut' => 'required|date|before:date_fin', // |before:date_fin
                'date_fin' => 'required|date|after:date_debut', // |after:date_debut
                'date_depart' => 'required|date',
                'heure_de_depart' => 'required',
                'date_return' => 'required|date|after:date_depart',  //|after:date_depart
                'heure_de_return' => 'required',
            ]);
        } elseif ($this->currentStep == 3) {

            // ! sss
            foreach ($this->users as $user) {
                if (!isset($this->moyens_transports[$user])) {
                    $this->moyens_transports[$user] = '1';
                }
            }
        }

    }

    // val
    public function validationStapThree()
    {
        //? validation
        $this->resetErrorBag();
        if ($this->currentStep == 4) {
            $validationRules = [];
            $customAttributes = [];

            foreach ($this->users as $user) {
                $validationRules['moyens_transports.' . $user] = [
                    'required',
                    function ($attribute, $value, $fail) {
                        if ($value === 'not_empth') {
                            $fail('Un élément doit être sélectionné');
                        }
                    }
                ];
                if (isset($this->moyens_transports[$user]) && $this->moyens_transports[$user] == '1') {
                    $validationRules['marque.' . $user] = 'nullable|max:100';
                    $validationRules['puissance_fiscal.' . $user] = 'nullable|max:100';
                    $validationRules['numiro_plaque.' . $user] = 'nullable|max:100';
                } elseif (isset($this->moyens_transports[$user]) && $this->moyens_transports[$user] == '2') {
                    $validationRules['marque.' . $user] = 'required|max:100';
                    $validationRules['puissance_fiscal.' . $user] = 'nullable|max:100';
                    $validationRules['numiro_plaque.' . $user] = 'required|max:100';
                } else {
                    $validationRules['marque.' . $user] = 'required|max:100';
                    $validationRules['puissance_fiscal.' . $user] = 'required|max:100';
                    $validationRules['numiro_plaque.' . $user] = 'required|max:100';
                }
                // Customize attribute names for error messages
                $customAttributes['moyens_transports.' . $user] = 'moyens transports';
                $customAttributes['marque.' . $user] = 'marque';
                $customAttributes['puissance_fiscal.' . $user] = 'puissance fiscale';
                $customAttributes['numiro_plaque.' . $user] = 'numéro de plaque';
            }

            $this->validate($validationRules, [], $customAttributes);
        }
    }
    // Store or update the mission
    public function store()
    {
        $this->validationStapThree();

        $this->resetErrorBag();
        $MissionData = [
            'numero_mission' => $this->numero_mission,
            'nature' => $this->nature,
            'lieu' => $this->lieu,
            'type_de_mission' => $this->type_de_mission,
            'numero_ordre_mission' => $this->numero_ordre_mission,
            'data_ordre_mission' => $this->data_ordre_mission,
            'date_debut' => $this->date_debut,
            'date_fin' => $this->date_fin,
            'date_depart' => $this->date_depart,
            'heure_de_depart' => $this->heure_de_depart,
            'heure_de_return' => $this->heure_de_return,
            'date_return' => $this->date_return,
        ];

        $mission = Mission::create($MissionData);

        foreach ($this->users as $userId) {
            MissionPersonnel::create([
                'user_id' => $userId,
                'mission_id' => $mission->id,
            ]);
        }

        foreach ($this->users as $user) {
            Transports::create([
                'transport_utiliser' => $this->getTransportUtiliserById($this->moyens_transports[$user] ?? ''),
                'marque' => $this->marque[$user] ?? '',
                'puissance_fiscal' => $this->puissance_fiscal[$user] ?? '',
                'numiro_plaque' => $this->numiro_plaque[$user] ?? '',
                'user' => $user,
                'moyens_transports_id' => isset($this->moyens_transports[$user]) ? (int) $this->moyens_transports[$user] : null, // Ensure it is an integer or null
                'mission_id' => $mission->id,
            ]);
        }

        return redirect()->route('missions.index')->with('success', 'Mission created successfully.');
        // dd($MissionData);
    }

    //  UPDATE

    public function update()
    {
        $this->validationStapThree();
        $mission = Mission::find($this->ID);
        $MissionData = [
            'numero_mission' => $this->numero_mission,
            'nature' => $this->nature,
            'lieu' => $this->lieu,
            'type_de_mission' => $this->type_de_mission,
            'numero_ordre_mission' => $this->numero_ordre_mission,
            'data_ordre_mission' => $this->data_ordre_mission,
            'date_debut' => $this->date_debut,
            'date_fin' => $this->date_fin,
            'date_depart' => $this->date_depart,
            'heure_de_depart' => $this->heure_de_depart,
            'heure_de_return' => $this->heure_de_return,
            'date_return' => $this->date_return,
        ];

        $mission->update($MissionData);

        MissionPersonnel::where('mission_id', $this->ID)->delete();
        foreach ($this->users as $userId) {
            MissionPersonnel::create([
                'user_id' => $userId,
                'mission_id' => $mission->id,
            ]);
        }

        Transports::where('mission_id', $this->ID)->delete();
        foreach ($this->users as $user) {
            Transports::create([
                'transport_utiliser' => $this->getTransportUtiliserById($this->moyens_transports[$user] ?? ''),
                'marque' => $this->marque[$user] ?? '',
                'puissance_fiscal' => $this->puissance_fiscal[$user] ?? '',
                'numiro_plaque' => $this->numiro_plaque[$user] ?? '',
                'user' => $user,
                'moyens_transports_id' => isset($this->moyens_transports[$user]) ? (int) $this->moyens_transports[$user] : null, // Ensure it is an integer or null
                'mission_id' => $mission->id,
            ]);
        }


        return redirect()->route('missions.index')->with('success', 'Mission updated successfully.');

    }


}