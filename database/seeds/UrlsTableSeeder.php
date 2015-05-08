<?php

use Illuminate\Database\Seeder;

class UrlsTableSeeder extends Seeder {

    public function run()
    {
        $urls = array(
            [
                'original_url' => 'http://www.google.com',
                'shortened_url' => 'af2mL3',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'original_url' => 'http://facebook.com',
                'shortened_url' => 'aD4mdA3',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'original_url' => 'http://news.ycombinator.com',
                'shortened_url' => 'z9dH30s',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
        );

        DB::table('urls')->insert($urls);
    }

}