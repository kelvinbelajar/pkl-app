<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
        CREATE VIEW view_budget AS
            SELECT
                budgets.id,
                projects.project_name,
                budgets.total_budget,
                sources.source_name

            FROM budgets    
            INNER JOIN projects ON budgets.id_project = projects.id 
            INNER JOIN sources ON sources.id_project = projects.id 
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("
            DROP VIEW view_budget
        ");
    }
};
