<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;


class ProjectStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultProjectStatuses = [
            'Active',
            'On Deck',
            'Complete'
        ];

        foreach ($defaultProjectStatuses as $defaultProjectStatus) {
            \App\Models\ProjectStatus::create(['name' => $defaultProjectStatus]);
        }
    }
}
