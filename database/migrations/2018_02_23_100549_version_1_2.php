<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $now = \Carbon\Carbon::now()->toDateTimeString();
        Permission::insert([
            [
                'name' => 'profit_loss_report.view',
                'guard_name' => 'web',
                'created_at' => $now,
            ],
            [
                'name' => 'direct_sell.access',
                'guard_name' => 'web',
                'created_at' => $now,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
