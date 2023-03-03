<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Delete all tables starting with Mailcoach force it even for relations
        $tables = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
        Schema::disableForeignKeyConstraints();
        foreach ($tables as $table) {
            if (str_starts_with($table, 'mailcoach')) {
                Schema::dropIfExists($table);
            }
        }
        Schema::enableForeignKeyConstraints();
    }
};
