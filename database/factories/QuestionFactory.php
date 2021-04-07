<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => rtrim($this->faker->sentence(rand(5,10)),'.'),
            'body' => $this->faker->paragraphs(rand(3,7),true),
            'views' => rand(5,10),
            'answers_count' => rand(5,10),
            'votes' => rand(-3,10)
        ];
    }
}
