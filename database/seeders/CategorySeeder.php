<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::truncate();
        $eventCategories = [
            [
                'name'  => 'Spirituality',
                'slug'  => 'spirituality',
                'type' => 'event'
            ],
            [
                'name'  => 'Relationship & Lifestyle',
                'slug'  => 'relationship-lifestyle',
                'type' => 'event'
            ],
            [
                'name'  => 'Business & Networking',
                'slug'  => 'business-networking',
                'type' => 'event'
            ],
            [
                'name'  => 'Competitions',
                'slug'  => 'competitions',
                'type' => 'event'
            ],
            [
                'name'  => 'Drama & Comedy',
                'slug'  => 'drama-comedy',
                'type' => 'event'
            ],
            [
                'name'  => 'Music Concert',
                'slug'  => 'music-concert',
                'type' => 'event'
            ],
            [
                'name'  => 'Beauty & Fashion',
                'slug'  => 'beauty-fashion',
                'type' => 'event'
            ],
            [
                'name'  => 'Conferences',
                'slug'  => 'conferences',
                'type' => 'event'
            ],
            [
                'name'  => 'Sports & Fitness',
                'slug'  => 'sport-fitness',
                'type' => 'event'
            ],
            [
                'name'  => 'Exhibition',
                'slug'  => 'exhibition',
                'type' => 'event'
            ],
            [
                'name'  => 'Performing Arts',
                'slug'  => 'performing-arts',
                'type' => 'event'
            ],
            [
                'name'  => 'Entertainment & Party',
                'slug'  => 'entertainment-party',
                'type' => 'event'
            ]
        ];
      Category::insert($eventCategories);

      $itemCategories = [
        [
            'name'  => 'Books & Stationaries',
            'slug'  => 'book-stationery',
            'type' => 'item'
        ],
        [
            'name'  => 'Electronics',
            'slug'  => 'electronics',
            'type' => 'item'
        ],
        [
            'name'  => 'Fashion Items',
            'slug'  => 'fashion-items',
            'type' => 'item'
        ],
        [
            'name'  => 'Games',
            'slug'  => 'games',
            'type' => 'item'
        ],
        [
            'name'  => 'Groceries',
            'slug'  => 'groceries',
            'type' => 'item'
        ],
        [
            'name'  => 'Health & Beauty',
            'slug'  => 'health-beauty',
            'type' => 'item'
        ],
        [
            'name'  => 'Interior & Furniture',
            'slug'  => 'interior-furniture',
            'type' => 'item'
        ],
        [
            'name'  => 'Phones',
            'slug'  => 'phone-laptop',
            'type' => 'item'
        ],
        [
            'name'  => 'Sports & Fitness',
            'slug'  => 'sports-fitness',
            'type' => 'item'
        ],
        [
            'name'  => 'Automobile',
            'slug'  => 'automobile',
            'type' => 'item'
        ]
      ];
      Category::insert($itemCategories);
      $serviceCategories = [
        [
            'name'  => 'Freelance',
            'slug'  => 'freelance',
            'type' => 'service'
        ],
        [
            'name'  => 'Beauty',
            'slug'  => 'beauty',
            'type' => 'service'
        ],
        [
            'name'  => 'Event Planning',
            'slug'  => 'event-planning',
            'type' => 'service'
        ],
        [
            'name'  => 'Maintenance & Repair',
            'slug'  => 'maintenance-repair',
            'type' => 'service'
        ],
        [
            'name'  => 'Decor',
            'slug'  => 'decor',
            'type' => 'service'
        ],
        [
            'name'  => 'Tutor',
            'slug'  => 'tutor',
            'type' => 'service'
        ],
        [
            'name'  => 'Health & Fitness',
            'slug'  => 'health-fitness',
            'type' => 'service'
        ],
        [
            'name'  => 'Food',
            'slug'  => 'food',
            'type' => 'service'
        ],
        [
            'name'  => 'Fashion',
            'slug'  => 'fashion',
            'type' => 'service'
        ],
        [
            'name'  => 'Art & Creativity',
            'slug'  => 'art-creativity',
            'type' => 'service'
        ]
      ];
      Category::insert($serviceCategories);
    }
}
