<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        $user = User::factory()->create();
        return [
            'user_id' => $user->id,
            'name' => $this->faker->sentence(3),
            'url' => $this->faker->url(),
            'description' => $this->faker->paragraph(),
        ];
    }


}
