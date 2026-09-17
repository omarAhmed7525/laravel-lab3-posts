<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected array $topics = [
        'Laravel Tips and Tricks', 'Understanding Eloquent Relationships', 'Getting Started with REST APIs',
        'Database Design Basics', 'Clean Code Practices', 'Introduction to OOP Concepts',
        'Version Control with Git', 'Working with Migrations', 'Authentication Guide',
        'Testing Your Application', 'Understanding Middleware', 'Caching Strategies Explained',
        'Queue Jobs in Laravel', 'File Uploads Made Easy', 'Validation Rules Deep Dive',
        'Routing Best Practices', 'Blade Templates for Beginners', 'Working with Collections',
        'Building Your First API', 'Deploying Laravel Applications',
    ];

    protected array $sentences = [
        'This post explains the topic in a simple and practical way.',
        'We will walk through the main concepts step by step.',
        'Understanding this helps you build better applications.',
        'Many developers struggle with this at the beginning.',
        'Once you get the basics right, everything else becomes easier.',
        'This approach is widely used in real world projects.',
        'Let us break down the process into small simple steps.',
        'By the end of this post you will have a clear picture.',
        'This is one of the most common questions from beginners.',
        'A good understanding of this topic saves a lot of time later.',
        'We also cover some common mistakes and how to avoid them.',
        'Feel free to try the examples on your own project.',
    ];

    public function definition(): array
    {
        $topic = $this->faker->randomElement($this->topics);

        $number = $this->faker->unique()->numberBetween(1, 999999);

        return [
            'title' => $topic . ' #' . $number,
            'description' => implode(' ', $this->faker->randomElements($this->sentences, 4)),
            'user_id' => User::factory(),
        ];
    }
}