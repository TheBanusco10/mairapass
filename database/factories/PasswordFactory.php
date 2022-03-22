<?php

namespace Database\Factories;

use App\Http\Controllers\EncryptionController;
use App\Models\Password;
use Illuminate\Database\Eloquent\Factories\Factory;

class PasswordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Password::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 9,
            'web' => EncryptionController::encrypt($this->faker->domainName),
            'url_web' => EncryptionController::encrypt($this->faker->domainName),
            'email' => EncryptionController::encrypt($this->faker->unique()->safeEmail),
            'password' => EncryptionController::encrypt('admin'), // password
        ];
    }
}
