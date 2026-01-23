<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  use WithoutModelEvents;

  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // generate with good ratings only
    Book::factory(33)->create()->each(function ($book) {
      $numReviews = random_int(5, 30);
      Review::factory($numReviews)
        ->goodRating()
        ->for($book)
        ->create();
    });

    // generate with average ratings only
    Book::factory(33)->create()->each(function ($book) {
      $numReviews = random_int(5, 30);
      Review::factory()->count($numReviews)
        ->averageRating()
        ->for($book)
        ->create();
    });

    // generate with bad ratings only
    Book::factory(34)->create()->each(function ($book) {
      $numReviews = random_int(5, 30);
      Review::factory()->count($numReviews)
        ->badRating()
        ->for($book)
        ->create();
    });
  }
}
