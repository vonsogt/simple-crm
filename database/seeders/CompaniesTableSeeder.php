<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $companies = array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Theodore Murphy',
                'email' => 'rice.isai@example.net',
                'logo' => 'sample-logo.png',
                'website_link' => 'http://bechtelar.biz/pariatur-perferendis-maiores-explicabo-aperiam-blanditiis-molestias-delectus',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Mr. Khalil Muller IV',
                'email' => 'kihn.blanca@example.org',
                'logo' => 'sample-logo.png',
                'website_link' => 'http://shields.com/impedit-aliquid-aperiam-quos-eum-suscipit-quae',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'Mortimer Lindgren',
                'email' => 'gussie76@example.org',
                'logo' => 'sample-logo.png',
                'website_link' => 'http://ritchie.com/iusto-odit-eius-maxime-facere-non-a-deleniti.html',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            3 =>
            array(
                'id' => 4,
                'name' => 'Glenna Harvey',
                'email' => 'oweissnat@example.org',
                'logo' => 'sample-logo.png',
                'website_link' => 'http://www.hodkiewicz.com/autem-libero-dolores-ea-fugit',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            4 =>
            array(
                'id' => 5,
                'name' => 'Prof. Britney Runte',
                'email' => 'mattie01@example.net',
                'logo' => 'sample-logo.png',
                'website_link' => 'http://www.casper.com/commodi-aut-sed-temporibus-aspernatur-exercitationem-quia-sint-culpa',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            5 =>
            array(
                'id' => 6,
                'name' => 'Elaina Adams',
                'email' => 'angela45@example.com',
                'logo' => 'sample-logo.png',
                'website_link' => 'http://www.walsh.com/sed-eveniet-et-ea-hic-aut-fugiat-rerum',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            6 =>
            array(
                'id' => 7,
                'name' => 'Alexys Willms',
                'email' => 'tyrese.simonis@example.net',
                'logo' => 'sample-logo.png',
                'website_link' => 'http://www.bahringer.info/',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            7 =>
            array(
                'id' => 8,
                'name' => 'Annabel Predovic II',
                'email' => 'shyann.howell@example.net',
                'logo' => 'sample-logo.png',
                'website_link' => 'http://breitenberg.com/et-reprehenderit-nostrum-soluta-sapiente.html',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            8 =>
            array(
                'id' => 9,
                'name' => 'Mr. Horace Lubowitz',
                'email' => 'trevion.turcotte@example.net',
                'logo' => 'sample-logo.png',
                'website_link' => 'http://dare.biz/consequatur-aut-quos-sint-sint.html',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            9 =>
            array(
                'id' => 10,
                'name' => 'Alvah Yost IV',
                'email' => 'kathlyn66@example.com',
                'logo' => 'sample-logo.png',
                'website_link' => 'http://www.gerlach.info/',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            10 =>
            array(
                'id' => 11,
                'name' => 'Lexie Pacocha',
                'email' => 'art32@example.com',
                'logo' => 'sample-logo.png',
                'website_link' => 'http://www.hills.net/aliquam-dignissimos-quo-consequatur-corrupti-voluptatibus-magnam-ut-aspernatur',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            11 =>
            array(
                'id' => 12,
                'name' => 'Lillie Reichert Sr.',
                'email' => 'renner.jordane@example.com',
                'logo' => 'sample-logo.png',
                'website_link' => 'http://www.predovic.com/',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            12 =>
            array(
                'id' => 13,
                'name' => 'Miss Viola Wuckert',
                'email' => 'cmarks@example.com',
                'logo' => 'sample-logo.png',
                'website_link' => 'https://www.oreilly.com/consequatur-aut-veniam-animi',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            13 =>
            array(
                'id' => 14,
                'name' => 'Jennyfer Hudson Jr.',
                'email' => 'thiel.johnny@example.com',
                'logo' => 'sample-logo.png',
                'website_link' => 'http://cormier.biz/eum-similique-provident-enim-ipsam-est-tempore',
                'created_at' => '2021-08-02 12:52:31',
                'updated_at' => '2021-08-02 12:52:31',
            ),
            14 =>
            array(
                'id' => 15,
                'name' => 'Osvaldo Howell',
                'email' => 'mikel.lind@example.net',
                'logo' => 'sample-logo.png',
                'website_link' => 'http://wintheiser.com/',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            15 =>
            array(
                'id' => 16,
                'name' => 'Aisha Klocko',
                'email' => 'mozell.hickle@example.com',
                'logo' => 'sample-logo.png',
                'website_link' => 'http://www.koss.com/quia-voluptatem-modi-sit-cum',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            16 =>
            array(
                'id' => 17,
                'name' => 'Janessa Bins',
                'email' => 'alexandra.hermann@example.net',
                'logo' => 'sample-logo.png',
                'website_link' => 'http://schultz.info/in-vero-quae-fuga-laudantium-aperiam-facere-cumque.html',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            17 =>
            array(
                'id' => 18,
                'name' => 'Dr. Everette Moore',
                'email' => 'name56@example.org',
                'logo' => 'sample-logo.png',
                'website_link' => 'https://www.christiansen.com/id-omnis-eveniet-ipsam-repudiandae-odit',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            18 =>
            array(
                'id' => 19,
                'name' => 'Issac Bartell',
                'email' => 'lboyle@example.org',
                'logo' => 'sample-logo.png',
                'website_link' => 'http://www.nicolas.com/omnis-dolor-optio-fuga-nisi-dolor-atque-aut',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            19 =>
            array(
                'id' => 20,
                'name' => 'Miss Darby Kub',
                'email' => 'courtney49@example.com',
                'logo' => 'sample-logo.png',
                'website_link' => 'http://veum.com/',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            20 =>
            array(
                'id' => 21,
                'name' => 'Miss Vicky Friesen',
                'email' => 'alysson26@example.org',
                'logo' => 'sample-logo.png',
                'website_link' => 'http://ferry.com/qui-maxime-assumenda-ea-voluptatibus-eius',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            21 =>
            array(
                'id' => 22,
                'name' => 'Sally Rolfson',
                'email' => 'einar21@example.com',
                'logo' => 'sample-logo.png',
                'website_link' => 'http://www.walsh.com/',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            22 =>
            array(
                'id' => 23,
                'name' => 'German Bradtke',
                'email' => 'casey.zboncak@example.org',
                'logo' => 'sample-logo.png',
                'website_link' => 'http://friesen.com/eos-ut-autem-eum-nihil',
                'created_at' => $now,
                'updated_at' => $now,
            ),
        );

        // Checking if the table already have a query
        if (is_null(DB::table('companies')->first()))
            DB::table('companies')->insert($companies);
        else
            echo "\e[31mTable is not empty, therefore NOT ";
    }
}
