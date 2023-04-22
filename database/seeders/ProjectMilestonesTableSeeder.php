<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;


class ProjectMilestonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultProjectMilestones = [
            'Fab Drawing' => [
                'Notify Engineering',
                'Waiting for Drawings',
                'Drawings Received'
            ],
            'Purchase List' => [],
            'Order' => [],
            'Fabrication' => [],
            'Finish' => [],
            'Deliver' => [],
            'Follow Up' => [],
            'Complete' => []
        ];

        foreach ($defaultProjectMilestones as $name => $steps) {
            $milestone = \App\Models\ProjectMilestone::create(['name' => $name]);
            foreach ($steps as $step) {
                $milestone->projectMilestoneSteps()->create(['name' => $step]);
            }
        }
    }
}
