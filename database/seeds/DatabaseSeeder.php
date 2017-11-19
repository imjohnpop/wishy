<?php

use Illuminate\Database\Seeder;
use App\Comments;
use App\Goals;
use App\Milestones;
use App\Wishes;
use App\Statuses;
use App\Events;
use App\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Comments::create([
            'user_id' => 1,
            'type' => 'goal',
            'target_id' => 1,
            'text' => 'This is so cool!'
        ]);

        Comments::create([
            'user_id' => 2,
            'type' => 'goal',            
            'target_id' => 1,
            'text' => 'Go ahead man!'
        ]);

        Comments::create([
            'user_id' => 2,
            'type' => 'goal',            
            'target_id' => 2,
            'text' => 'Just be careful!'
        ]);

        Goals::create([
            'name' =>'Win a wrestle with a bear',
            'description' => 'The name is quite explanatory, but anyways... I want to fight with huge wild bear, and kick his fat ass. I am little bit scared, but who is scared can\'t go to the forest. Am I right?',
            'is_public' => 1,
            'nr_encouragements' => 2,
            'status_id'=> 2
        ]);
        
        Goals::create([
            'name' =>'Overcome misophonia',
            'description' => 'I wish to stop getting pissed when people are eating apples',
            'is_public' => 0,
            'nr_encouragements' => 0,
            'status_id'=> 1
        ]);

        Goals::create([
            'name' =>'Win the Amazing Race',
            'description' => 'Even though it will be hard, I believe I can accomplish this',
            'is_public' => 1,
            'nr_encouragements' => 10,
            'status_id'=> 3
        ]);

        Milestones::create([
            'text' => 'Learn boxing',
            'due_date' => date('Y-m-d'),
            'is_done' => 0,
            'goal_id' => 1
        ]);
        
        Milestones::create([
            'text' => 'Start running',
            'due_date' => date('Y-m-d'),
            'is_done' => 1,
            'goal_id' => 1
        ]);
        
        Milestones::create([
            'text' => 'Find a bear',
            'due_date' => date('Y-m-d'),
            'is_done' => 0,
            'goal_id' => 1
        ]);
        
        Milestones::create([
            'text' => 'Listen to relaxing music',
            'due_date' => date('Y-m-d'),
            'is_done' => 1,
            'goal_id' => 2
        ]);
        
        Milestones::create([
            'text' => 'Smile when you get annoyed',
            'due_date' => date('Y-m-d'),
            'is_done' => 0,
            'goal_id' => 2
        ]);
        
        Milestones::create([
            'text' => 'Start running',
            'due_date' => date('Y-m-d'),
            'is_done' => 1,
            'goal_id' => 3
        ]);
        
        Milestones::create([
            'text' => 'Sign up for the race',
            'due_date' => date('Y-m-d'),
            'is_done' => 1,
            'goal_id' => 3
        ]);

        Wishes::create([
            'name' => 'Water bottle',
            'description' => 'literally any water bottle',
            'is_public' => 1,
            'user_id' => 1,
            'status_id'=> 3,
            'nr_encouragements'=> 0
        ]);

        Wishes::create([
            'name' => 'Adidas shoes',
            'description' => 'I would prefer them purple',
            'is_public' => 1,
            'user_id' => 1,
            'status_id'=> 1,
            'nr_encouragements'=> 10
        ]);

        Wishes::create([
            'name' => 'New notebook',
            'description' => 'basically anything I can write on',
            'is_public' => 0,
            'user_id' => 1,
            'status_id'=> 3,
            'nr_encouragements'=> 0
        ]);

        Statuses::create([
            'tag' => 'Unacomplished'
        ]);

        Statuses::create([
            'tag' => 'In progress'
        ]);

        Statuses::create([
            'tag' => 'Achieved'
        ]);
        
        Events::create([
            'name' => 'Christmas',
            'date' => '2017-12-25'
        ]);
        
        Events::create([
            'name' => 'New Year',
            'date' => '2018-01-01'
        ]);

        Post::create([
            'user_id' => 1,
            'type' => 'text',
            'text' => 'Some stuff I wrote here',
            'nr_encouragements' => 2 
        ]);

        Post::create([
            'user_id' => 1,
            'type' => 'image',
            'path' => '/img/profile-photo-mat.jpg',
            'text' => 'Look at this pic bruh',
            'nr_encouragements' => 2 
        ]);
    }
}
