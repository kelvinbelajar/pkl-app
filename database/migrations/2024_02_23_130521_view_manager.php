<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_manager AS
            SELECT
                managers.id,
                projects.project_name,
                managers.manager_name,
                managers.manager_contact
                
            FROM managers
            INNER JOIN projects ON managers.id_project = projects.id 
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("
            DROP VIEW view_manager
        ");
    }
};
