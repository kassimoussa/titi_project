<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    protected $fillable = [
        'site', 'status', 'commentaire', 'total_per',

        'installation',  'installation_per', 
        'onu', 'onu_start', 'onu_end', 'onu_per',
        'rack', 'rack_start', 'rack_end','rack_per',
        'fiber', 'fiber_start', 'fiber_end', 'fiber_per',

        'configuration', 'configuration_per',
        'ip_vlan', 'ip_vlan_start', 'ip_vlan_end', 'ip_vlan_per',
        'ssh', 'ssh_start', 'ssh_end', 'ssh_per',
        'snmp', 'snmp_start', 'snmp_end', 'snmp_per',

        'migration', 'migration_start', 'migration_end', 'migration_per',
      
    ];
}
