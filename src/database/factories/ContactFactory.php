<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;
use App\Models\Category;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'gender' => $this->faker->randomElement(['男性', '女性', 'その他']),
            'tel' => $this->faker->numerify('090########'),
            'address' => $this->faker->address,
            'building' => $this->faker->optional()->secondaryAddress,
            'category_id' => Category::inRandomOrder()->first()->content ?? '一般的なお問い合わせ', // カテゴリー名を使用
            'detail' => $this->faker->realText(50),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
