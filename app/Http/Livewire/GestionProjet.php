<?php

namespace App\Http\Livewire;

use App\Models\Choix;
use App\Models\Projet;
use Illuminate\Support\Str;
use Livewire\Component;

class GestionProjet extends Component
{
    public $projets, $projet_id, $site, $choix, $total_per;
    public $site2, $installation2, $installation_per2, $configuration2, $configuration_per2, $total_per2;
    public $installation, $installation_per;
    public $onu, $onu_start, $onu_end, $onu_per;
    public $onu2, $onu_start2, $onu_end2, $onu_per2;
    public $rack, $rack_start, $rack_end, $rack_per;
    public $rack2, $rack_start2, $rack_end2, $rack_per2;
    public $fiber, $fiber_start, $fiber_end, $fiber_per;
    public $fiber2, $fiber_start2, $fiber_end2, $fiber_per2;
    public $configuration, $configuration_per;
    public $ip_vlan, $ip_vlan_start, $ip_vlan_end, $ip_vlan_per;
    public $ip_vlan2, $ip_vlan_start2, $ip_vlan_end2, $ip_vlan_per2;
    public $ssh, $ssh_start, $ssh_end, $ssh_per;
    public $ssh2, $ssh_start2, $ssh_end2, $ssh_per2;
    public $snmp, $snmp_start, $snmp_end, $snmp_per;
    public $snmp2, $snmp_start2, $snmp_end2, $snmp_per2;
    public $migration, $migration_start, $migration_end, $migration_per;
    public $migration2, $migration_start2, $migration_end2, $migration_per2;

    public function mount()
    {
        $this->choix = Choix::all();
    }

    public function getProjets()
    {
        $this->projets = Projet::orderBy("total_per", 'desc')->get();
    }

    public function store()
    {

        if ($this->onu == "OK" && $this->rack == "OK" && $this->fiber == "OK") {
            $this->installation = "OK";
        } elseif ($this->onu == "Non" && $this->rack == "Non" && $this->fiber == "Non") {
            $this->installation = "Non";
        } else {
            $this->installation = "En cours";
        }

        if ($this->ip_vlan == "OK" && $this->ssh == "OK" && $this->snmp == "OK") {
            $this->configuration = "OK";
        } elseif ($this->ip_vlan == "Non" && $this->ssh == "Non" && $this->snmp == "Non") {
            $this->configuration = "Non";
        } else {
            $this->configuration = "En cours";
        }

        //installation percentage
        if ($this->onu == "OK") {
            $this->onu_per = "100";
        } elseif ($this->onu == "Non") {
            $this->onu_per = "0";
        } else {
            $this->onu_per = "50";
        }
        if ($this->rack == "OK") {
            $this->rack_per = "100";
        } elseif ($this->rack == "Non") {
            $this->rack_per = "0";
        } else {
            $this->rack_per = "50";
        }
        if ($this->fiber == "OK") {
            $this->fiber_per = "100";
        } elseif ($this->fiber == "Non") {
            $this->fiber_per = "0";
        } else {
            $this->fiber_per = "50";
        }

        //configuration percentage
        if ($this->ip_vlan == "OK") {
            $this->ip_vlan_per = "100";
        } elseif ($this->ip_vlan == "Non") {
            $this->ip_vlan_per = "0";
        } else {
            $this->ip_vlan_per = "50";
        }
        if ($this->ssh == "OK") {
            $this->ssh_per = "100";
        } elseif ($this->ssh == "Non") {
            $this->ssh_per = "0";
        } else {
            $this->ssh_per = "50";
        }
        if ($this->snmp == "OK") {
            $this->snmp_per = "100";
        } elseif ($this->snmp == "Non") {
            $this->snmp_per = "0";
        } else {
            $this->snmp_per = "50";
        }

        //migration percentage
        if ($this->migration == "OK") {
            $this->migration_per = "100";
        } elseif ($this->migration == "Non") {
            $this->migration_per = "0";
        } else {
            $this->migration_per = "50";
        }

        $this->installation_per = ($this->onu_per + $this->rack_per + $this->fiber_per) / 3;
        $this->configuration_per = ($this->ip_vlan_per + $this->ssh_per + $this->snmp_per) / 3;
        $this->total_per = ($this->installation_per +  $this->configuration_per + $this->migration_per) / 3;


        $projet = new Projet();
        $projet->site = Str::title($this->site);
        $projet->installation = $this->installation;
        $projet->installation_per = $this->installation_per;
        $projet->onu = $this->onu;
        $projet->onu_start = $this->onu_start;
        $projet->onu_end = $this->onu_end;
        $projet->onu_per = $this->onu_per;
        $projet->rack = $this->rack;
        $projet->rack_start = $this->rack_start;
        $projet->rack_end = $this->rack_end;
        $projet->rack_per = $this->rack_per;
        $projet->fiber = $this->fiber;
        $projet->fiber_start = $this->fiber_start;
        $projet->fiber_end = $this->fiber_end;
        $projet->fiber_per = $this->fiber_per;
        $projet->configuration = $this->configuration;
        $projet->configuration_per = $this->configuration_per;
        $projet->ip_vlan = $this->ip_vlan;
        $projet->ip_vlan_start = $this->ip_vlan_start;
        $projet->ip_vlan_end = $this->ip_vlan_end;
        $projet->ip_vlan_per = $this->ip_vlan_per;
        $projet->ssh = $this->ssh;
        $projet->ssh_start = $this->ssh_start;
        $projet->ssh_end = $this->ssh_end;
        $projet->ssh_per = $this->ssh_per;
        $projet->snmp = $this->snmp;
        $projet->snmp_start = $this->snmp_start;
        $projet->snmp_end = $this->snmp_end;
        $projet->snmp_per = $this->snmp_per;
        $projet->migration = $this->migration;
        $projet->migration_start = $this->migration_start;
        $projet->migration_end = $this->migration_end;
        $projet->migration_per = $this->migration_per;
        $projet->total_per = $this->total_per;

        $query = $projet->save();

        if ($query) {
            $this->getProjets();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Ajout réussi!']
            );
            $this->dispatchBrowserEvent('close-modal');
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => "Erreur lors de l'ajout!"]
            );
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function loadid($projet_id)
    {
        $this->projet_id = $projet_id;
        $projet = Projet::find($projet_id);
        $this->site2 = $projet->site;
        $this->installation2 = $projet->installation;
        $this->installation_per2 = $projet->installation_per;
        $this->onu2 = $projet->onu;
        $this->onu_start2 = $projet->onu_start;
        $this->onu_end2 = $projet->onu_end;
        $this->onu_per2 = $projet->onu_per;
        $this->rack2 = $projet->rack;
        $this->rack_start2 = $projet->rack_start;
        $this->rack_end2 = $projet->rack_end;
        $this->rack_per2 = $projet->rack_per;
        $this->fiber2 = $projet->fiber;
        $this->fiber_start2 = $projet->fiber_start;
        $this->fiber_end2 = $projet->fiber_end;
        $this->fiber_per2 = $projet->fiber_per;
        $this->configuration2 = $projet->configuration;
        $this->configuration_per2 = $projet->configuration_per;
        $this->ip_vlan2 = $projet->ip_vlan;
        $this->ip_vlan_start2 = $projet->ip_vlan_start;
        $this->ip_vlan_end2 = $projet->ip_vlan_end;
        $this->ip_vlan_per2 = $projet->ip_vlan_per;
        $this->ssh2 = $projet->ssh;
        $this->ssh_start2 = $projet->ssh_start;
        $this->ssh_end2 = $projet->ssh_end;
        $this->ssh_per2 = $projet->ssh_per;
        $this->snmp2 = $projet->snmp;
        $this->snmp_start2 = $projet->snmp_start;
        $this->snmp_end2 = $projet->snmp_end;
        $this->snmp_per2 = $projet->snmp_per;
        $this->migration2 = $projet->migration;
        $this->migration_start2 = $projet->migration_start;
        $this->migration_end2 = $projet->migration_end;
        $this->migration_per2 = $projet->migration_per;
        $this->total_per2 = $projet->total_per;
    }
    public function update()
    {
        $projet = Projet::find($this->projet_id);

        if ($this->onu2 == "OK" && $this->rack2 == "OK" && $this->fiber2 == "OK") {
            $this->installation2 = "OK";
        } elseif ($this->onu2 == "Non" && $this->rack2 == "Non" && $this->fiber2 == "Non") {
            $this->installation2 = "Non";
        } else {
            $this->installation2 = "En cours";
        }

        if ($this->ip_vlan2 == "OK" && $this->ssh2 == "OK" && $this->snmp2 == "OK") {
            $this->configuration2 = "OK";
        } elseif ($this->ip_vlan2 == "Non" && $this->ssh2 == "Non" && $this->snmp2 == "Non") {
            $this->configuration2 = "Non";
        } else {
            $this->configuration2 = "En cours";
        }

        //installation percentage
        if ($this->onu2 == "OK") {
            $this->onu_per2 = "100";
        } elseif ($this->onu2 == "Non") {
            $this->onu_per2 = "0";
        } else {
            $this->onu_per2 = "50";
        }
        if ($this->rack2 == "OK") {
            $this->rack_per2 = "100";
        } elseif ($this->rack2 == "Non") {
            $this->rack_per2 = "0";
        } else {
            $this->rack_per2 = "50";
        }
        if ($this->fiber2 == "OK") {
            $this->fiber_per2 = "100";
        } elseif ($this->fiber2 == "Non") {
            $this->fiber_per2 = "0";
        } else {
            $this->fiber_per2 = "50";
        }

        //configuration percentage
        if ($this->ip_vlan2 == "OK") {
            $this->ip_vlan_per2 = "100";
        } elseif ($this->ip_vlan2 == "Non") {
            $this->ip_vlan_per2 = "0";
        } else {
            $this->ip_vlan_per2 = "50";
        }
        if ($this->ssh2 == "OK") {
            $this->ssh_per2 = "100";
        } elseif ($this->ssh2 == "Non") {
            $this->ssh_per2 = "0";
        } else {
            $this->ssh_per2 = "50";
        }
        if ($this->snmp2 == "OK") {
            $this->snmp_per2 = "100";
        } elseif ($this->snmp2 == "Non") {
            $this->snmp_per2 = "0";
        } else {
            $this->snmp_per2 = "50";
        }

        //migration percentage
        if ($this->migration2 == "OK") {
            $this->migration_per2 = "100";
        } elseif ($this->migration2 == "Non") {
            $this->migration_per2 = "0";
        } else {
            $this->migration_per2 = "50";
        }

        $this->installation_per2 = ($this->onu_per2 + $this->rack_per2 + $this->fiber_per2) / 3;
        $this->configuration_per2 = ($this->ip_vlan_per2 + $this->ssh_per2 + $this->snmp_per2) / 3;
        $this->total_per2 = ($this->installation_per2 +  $this->configuration_per2 + $this->migration_per2) / 3;

        $query = $projet->update([
            'site' => $this->site2,
            'installation' => $this->installation2,
            'installation_per' => $this->installation_per2,
            'onu' => $this->onu2,
            'onu_start' => $this->onu_start2,
            'onu_end' => $this->onu_end2,
            'onu_per' => $this->onu_per2,
            'rack' => $this->rack2,
            'rack_start' => $this->rack_start2,
            'rack_end' => $this->rack_end2,
            'rack_per' => $this->rack_per2,
            'fiber' => $this->fiber2,
            'fiber_start' => $this->fiber_start2,
            'fiber_end' => $this->fiber_end2,
            'fiber_per' => $this->fiber_per2,
            'ip_vlan' => $this->ip_vlan2,
            'ip_vlan_start' => $this->ip_vlan_start2,
            'ip_vlan_end' => $this->ip_vlan_end2,
            'ip_vlan_per' => $this->ip_vlan_per2,
            'configuration' => $this->configuration2,
            'configuration_per2' => $this->configuration_per2,
            'ssh' => $this->ssh2,
            'ssh_start' => $this->ssh_start2,
            'ssh_end' => $this->ssh_end2,
            'ssh_per' => $this->ssh_per2,
            'snmp' => $this->snmp2,
            'snmp_start' => $this->snmp_start2,
            'snmp_end' => $this->snmp_end2,
            'snmp_per' => $this->snmp_per2,
            'migration' => $this->migration2,
            'migration_start' => $this->migration_start2,
            'migration_end' => $this->migration_end2,
            'migration_per' => $this->migration_per2,
            'total_per' => $this->total_per2,
        ]);

        if ($query) {
            $this->getProjets();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Modification réussi!']
            );
            $this->dispatchBrowserEvent('close-modal');
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => "Erreur lors de la modification!"]
            );
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function delete()
    {
        $projet = Projet::find($this->projet_id);
        $projet->delete();
        $this->getProjets();

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Suppression éffectuée avec succès!']
        );
    }

    public function images($projet_id)
    {
        return redirect()->route('images')->with($projet_id);
    }

    public function render()
    {
        $this->getProjets();
        return view('livewire.gestion-projet');
    }
}
