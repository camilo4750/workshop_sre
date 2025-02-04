<?php

namespace Database\Factories;

use App\Entities\EmployeeManagement\Employee\EmployeeEntity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Entities\EmployeeManagement\Employee\>
 */
class EmployeeFactory extends Factory
{
    /**
     * El nombre del modelo asociado al factory.
     *
     * @var string
     */
    protected $model = EmployeeEntity::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->numberBetween(100, 1000),
            'full_name' => $this->faker->name,
            'type_document_id' => $this->faker->randomElement([1, 2, 3, 4]),
            'document_number' => $this->faker->unique()->numerify('##########'),
            'municipality_id' => $this->faker->randomElement([1, 2, 3, 4]),
            'address' => $this->faker->address(),
            'telephone' => $this->faker->phoneNumber(),
            'gender_id' => $this->faker->randomElement([1, 2]),
            'job_position_id' => $this->faker->randomElement([1, 2, 3, 4]),
            'eps_id' => $this->faker->randomElement([1, 2, 3, 4]),
            'pension_fund_id' => $this->faker->randomElement([1, 2, 3, 4]),
            'arl_id' => $this->faker->randomElement([1, 2, 3, 4]),
            'contract_type_id' => $this->faker->randomElement([1, 2, 3, 4]),
            'salary' => $this->faker->randomFloat(2, 100000, 500000),
            'entry_date' => $this->faker->date(),
            'withdrawal_date' => $this->faker->optional()->date(),
            'bank_id' => $this->faker->randomElement([1, 2, 3, 4]),
            'bank_account_number' => $this->faker->numberBetween(100, 100000),
            'emergency_contact' => $this->faker->phoneNumber(),
            'employee_status_id' => $this->faker->randomElement([1, 2, 3, 4]),
        ];
    }
}
