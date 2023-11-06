<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string("site")->nullable();  
            $table->string("installation")->nullable(); 
            $table->string("installation_per")->nullable(); 
            $table->string("onu")->nullable();
            $table->string("onu_start")->nullable();
            $table->string("onu_end")->nullable();
            $table->string("onu_per")->nullable();
            $table->string("rack")->nullable();
            $table->string("rack_start")->nullable();
            $table->string("rack_end")->nullable();
            $table->string("rack_per")->nullable();  
            $table->string("fiber")->nullable();
            $table->string("fiber_start")->nullable();
            $table->string("fiber_end")->nullable();
            $table->string("fiber_per")->nullable(); 
            $table->string("configuration")->nullable(); 
            $table->string("configuration_per")->nullable(); 
            $table->string("ip_vlan")->nullable();
            $table->string("ip_vlan_start")->nullable();
            $table->string("ip_vlan_end")->nullable();
            $table->string("ip_vlan_per")->nullable(); 
            $table->string("ssh")->nullable();
            $table->string("ssh_start")->nullable();
            $table->string("ssh_end")->nullable();
            $table->string("ssh_per")->nullable(); 
            $table->string("snmp")->nullable();
            $table->string("snmp_start")->nullable();
            $table->string("snmp_end")->nullable();
            $table->string("snmp_per")->nullable();  
            $table->string("migration")->nullable();
            $table->string("migration_start")->nullable();
            $table->string("migration_end")->nullable();
            $table->string("migration_per")->nullable(); 
            $table->string("status")->nullable(); 
            $table->string("commentaire")->nullable(); 
            $table->integer("total_per")->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
