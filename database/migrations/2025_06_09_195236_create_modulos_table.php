<?php

use App\Models\Fabricante;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->id();

            $table->string('name');                     // Modelo do módulo
            $table->foreignIdFor(Fabricante::class);    // Fabricante do módulo

                // Definição        // Nome original        // Descrição
            $table->float('ocv');                       // Open Circuit Voltage
            $table->float('scc');                       // Short Circuit Current
            $table->float('vmax');                      // Maximum voltage at 25C
            $table->float('imax');                      // Maximum current at 25C
            $table->float('pmp');                       // Maximum power at 25C
            $table->float('vsmax');     // Vmax         // Maximum system voltage
            $table->float('ocvt');                      // Open Circuit Voltage Temperature (V/C)
            $table->float("otvmp");                     // Output Temperature Coefficient (V/ºC)
            $table->float("tcisc");                     // Short Circuit Current Temperature Coefficient (%/ºC)
            $table->float("weig");                      // Weight (kg)
            $table->float("deph");                      // Depth (mm)
            $table->float("widt");                      // Width (mm)
            $table->float("leng");                      // Length (mm)
            $table->float("icost");                     // Index used to optimize and select the pv
            $table->float("ef");                        // Efficiency (%)
            $table->float("area");                      // Area (m²)
            $table->integer("ncel");                    // Number of cells per PV
            $table->float("tol");                       // Tolerance of the capacity (%)
            $table->integer("dur");                     // Durability (years)
            $table->integer("tcell");                   // Cell material type [1-4]
            $table->float("mintemp");   // temp         // Minimum operational temperature
            $table->float("maxtemp");   // TEMP         // Maximum operational temperature
            $table->string("tier");                     // Certification standards
            $table->float("noct");                      // Nominal Operating Cell Temperature
            $table->integer("inop");                    // Max. series fuse rating

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modulos');
    }
};
