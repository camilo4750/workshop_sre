<?php

namespace Database\Factories;

use App\Entities\EmployeeManagement\Payment\PaymentEntity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Entities\EmployeeManagement\Payment\>
 */
class EmployeePaymentFactory extends Factory
{
    /**
     *
     * @var string
     */
    protected $model = PaymentEntity::class;

    /**
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => $this->faker->numberBetween(7, 20),
            'start_period' => $this->faker->date(),
            'end_period' => $this->faker->date(),
            'payment_method_id' => $this->faker->randomElement([1, 2]),
            'payment' => $this->faker->randomFloat(2, 100000, 500000),
            'overtime_total' => $this->faker->numberBetween(1, 12),
            'overtime_payment' => $this->faker->randomFloat(2, 10000, 50000),
            'bonus' => $this->faker->randomFloat(2, 100000, 500000),
            'total_accrued' => $this->faker->randomFloat(2, 100000, 500000),
            'payment_status_id' => $this->faker->randomElement([1, 2, 3, 4]),
            'observations' => $this->faker->text(100),
        ];
    }
}
