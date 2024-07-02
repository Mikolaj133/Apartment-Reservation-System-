<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apartment>
 */
class ApartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = fake()->numberBetween(20 ,70);


        $imageLinksPath = storage_path('apartment_photos.txt');

        $imageLinks = file($imageLinksPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if (empty($imageLinks)) {
            throw new \Exception("No image links found in the specified file: $imageLinksPath");
        }
        $randomImageLink = $imageLinks[array_rand($imageLinks)];

        return [
            'rooms' => fake()->numberBetween(0 , 5),
            'square_feet' => fake()->numberBetween(33 , 122),
            'floor' => fake()->numberBetween(0 , 10),
            'number_of_persons' =>fake()->numberBetween(2 , 10),
            'location' =>fake()->streetAddress(),
            'picture' => $randomImageLink,
            'original_price' => $price,
            'price_per_night' => $price,
        ];
    }
}
