<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $employees = array(
            0 =>
            array(
                'id' => 1,
                'first_name' => 'Bette',
                'last_name' => 'Donnelly',
                'company_id' => 1,
                'email' => 'bwyman@example.org',
                'phone' => '856-681-2583',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            1 =>
            array(
                'id' => 2,
                'first_name' => 'Hassan',
                'last_name' => 'Lehner',
                'company_id' => 1,
                'email' => 'catharine74@example.org',
                'phone' => '+1.820.761.5755',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            2 =>
            array(
                'id' => 3,
                'first_name' => 'Ayla',
                'last_name' => 'Champlin',
                'company_id' => 1,
                'email' => 'garrick.schulist@example.org',
                'phone' => '(971) 432-6175',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            3 =>
            array(
                'id' => 4,
                'first_name' => 'Lavonne',
                'last_name' => 'Pagac',
                'company_id' => 2,
                'email' => 'pjast@example.net',
                'phone' => '830-804-1414',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            4 =>
            array(
                'id' => 5,
                'first_name' => 'Esperanza',
                'last_name' => 'King',
                'company_id' => 2,
                'email' => 'zbogan@example.net',
                'phone' => '332.589.3850',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            5 =>
            array(
                'id' => 6,
                'first_name' => 'Beryl',
                'last_name' => 'Collier',
                'company_id' => 2,
                'email' => 'yadira.haag@example.org',
                'phone' => '+1 (872) 523-5385',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            6 =>
            array(
                'id' => 7,
                'first_name' => 'Lyda',
                'last_name' => 'Hammes',
                'company_id' => 3,
                'email' => 'bradly.pacocha@example.org',
                'phone' => '+1-731-665-1047',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            7 =>
            array(
                'id' => 8,
                'first_name' => 'Emmy',
                'last_name' => 'Smitham',
                'company_id' => 3,
                'email' => 'raynor.margarett@example.com',
                'phone' => '+1.361.797.2938',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            8 =>
            array(
                'id' => 9,
                'first_name' => 'Myrtis',
                'last_name' => 'Heller',
                'company_id' => 3,
                'email' => 'darrel.hilpert@example.org',
                'phone' => '708.392.2124',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            9 =>
            array(
                'id' => 10,
                'first_name' => 'Maud',
                'last_name' => 'Hickle',
                'company_id' => 4,
                'email' => 'penelope27@example.net',
                'phone' => '301.535.1353',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            10 =>
            array(
                'id' => 11,
                'first_name' => 'Eduardo',
                'last_name' => 'Gerhold',
                'company_id' => 4,
                'email' => 'zzieme@example.org',
                'phone' => '+1 (847) 630-9094',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            11 =>
            array(
                'id' => 12,
                'first_name' => 'Donavon',
                'last_name' => 'Windler',
                'company_id' => 4,
                'email' => 'alvah22@example.org',
                'phone' => '718.504.1965',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            12 =>
            array(
                'id' => 13,
                'first_name' => 'Vincenzo',
                'last_name' => 'Ankunding',
                'company_id' => 5,
                'email' => 'sawayn.dallin@example.org',
                'phone' => '1-231-358-3891',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            13 =>
            array(
                'id' => 14,
                'first_name' => 'Efren',
                'last_name' => 'Brown',
                'company_id' => 5,
                'email' => 'znitzsche@example.org',
                'phone' => '520.874.9714',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            14 =>
            array(
                'id' => 15,
                'first_name' => 'Jalyn',
                'last_name' => 'Kertzmann',
                'company_id' => 5,
                'email' => 'milton.lehner@example.com',
                'phone' => '+1-872-356-2714',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            15 =>
            array(
                'id' => 16,
                'first_name' => 'Marcelo',
                'last_name' => 'Jerde',
                'company_id' => 6,
                'email' => 'qratke@example.org',
                'phone' => '985-665-4144',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            16 =>
            array(
                'id' => 17,
                'first_name' => 'Lori',
                'last_name' => 'Stracke',
                'company_id' => 6,
                'email' => 'saul35@example.net',
                'phone' => '646.700.9722',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            17 =>
            array(
                'id' => 18,
                'first_name' => 'Alexys',
                'last_name' => 'Hauck',
                'company_id' => 6,
                'email' => 'gerson24@example.net',
                'phone' => '1-332-242-2257',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            18 =>
            array(
                'id' => 19,
                'first_name' => 'Garnett',
                'last_name' => 'Harber',
                'company_id' => 7,
                'email' => 'tferry@example.org',
                'phone' => '(856) 834-5116',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            19 =>
            array(
                'id' => 20,
                'first_name' => 'Moshe',
                'last_name' => 'Leuschke',
                'company_id' => 7,
                'email' => 'laura77@example.org',
                'phone' => '1-304-485-7598',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            20 =>
            array(
                'id' => 21,
                'first_name' => 'Ashtyn',
                'last_name' => 'Rippin',
                'company_id' => 7,
                'email' => 'jerome29@example.com',
                'phone' => '+14307367478',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            21 =>
            array(
                'id' => 22,
                'first_name' => 'Jordyn',
                'last_name' => 'Torphy',
                'company_id' => 8,
                'email' => 'coberbrunner@example.org',
                'phone' => '+1.267.610.0945',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            22 =>
            array(
                'id' => 23,
                'first_name' => 'Kyleigh',
                'last_name' => 'Purdy',
                'company_id' => 8,
                'email' => 'tfadel@example.com',
                'phone' => '951-845-2511',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            23 =>
            array(
                'id' => 24,
                'first_name' => 'Mellie',
                'last_name' => 'Shanahan',
                'company_id' => 8,
                'email' => 'faltenwerth@example.com',
                'phone' => '(509) 355-7321',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            24 =>
            array(
                'id' => 25,
                'first_name' => 'Cortez',
                'last_name' => 'Little',
                'company_id' => 9,
                'email' => 'ryley33@example.org',
                'phone' => '878.419.3980',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            25 =>
            array(
                'id' => 26,
                'first_name' => 'Guadalupe',
                'last_name' => 'Romaguera',
                'company_id' => 9,
                'email' => 'heathcote.ana@example.org',
                'phone' => '661-876-2566',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            26 =>
            array(
                'id' => 27,
                'first_name' => 'Nils',
                'last_name' => 'Witting',
                'company_id' => 9,
                'email' => 'jackeline75@example.net',
                'phone' => '479.491.4528',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            27 =>
            array(
                'id' => 28,
                'first_name' => 'Loyce',
                'last_name' => 'D\'Amore',
                'company_id' => 10,
                'email' => 'elza.murray@example.org',
                'phone' => '+1.559.826.1133',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            28 =>
            array(
                'id' => 29,
                'first_name' => 'Olin',
                'last_name' => 'Berge',
                'company_id' => 10,
                'email' => 'brakus.jewel@example.org',
                'phone' => '1-843-956-6373',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            29 =>
            array(
                'id' => 30,
                'first_name' => 'Rozella',
                'last_name' => 'Kertzmann',
                'company_id' => 10,
                'email' => 'buster.metz@example.com',
                'phone' => '602-476-0134',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            30 =>
            array(
                'id' => 31,
                'first_name' => 'Russ',
                'last_name' => 'Volkman',
                'company_id' => 11,
                'email' => 'ebert.darien@example.com',
                'phone' => '+1 (341) 853-5654',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            31 =>
            array(
                'id' => 32,
                'first_name' => 'Annetta',
                'last_name' => 'Larson',
                'company_id' => 11,
                'email' => 'kris.vada@example.net',
                'phone' => '1-520-903-1505',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            32 =>
            array(
                'id' => 33,
                'first_name' => 'Mable',
                'last_name' => 'Howe',
                'company_id' => 11,
                'email' => 'jody45@example.net',
                'phone' => '507-439-8016',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            33 =>
            array(
                'id' => 34,
                'first_name' => 'Marley',
                'last_name' => 'Greenfelder',
                'company_id' => 12,
                'email' => 'gerlach.arjun@example.com',
                'phone' => '678-408-4581',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            34 =>
            array(
                'id' => 35,
                'first_name' => 'Pat',
                'last_name' => 'Fahey',
                'company_id' => 12,
                'email' => 'flavio.cassin@example.net',
                'phone' => '463-222-9003',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            35 =>
            array(
                'id' => 36,
                'first_name' => 'Evangeline',
                'last_name' => 'Baumbach',
                'company_id' => 12,
                'email' => 'gibson.clifton@example.com',
                'phone' => '+1-425-554-0019',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            36 =>
            array(
                'id' => 37,
                'first_name' => 'Lilyan',
                'last_name' => 'Schimmel',
                'company_id' => 13,
                'email' => 'jennings.ferry@example.org',
                'phone' => '1-252-950-2718',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            37 =>
            array(
                'id' => 38,
                'first_name' => 'Jackie',
                'last_name' => 'Frami',
                'company_id' => 13,
                'email' => 'bernhard.izabella@example.com',
                'phone' => '+1.731.561.6307',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            38 =>
            array(
                'id' => 39,
                'first_name' => 'Virgie',
                'last_name' => 'Donnelly',
                'company_id' => 13,
                'email' => 'agustin.parker@example.org',
                'phone' => '1-314-522-3395',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            39 =>
            array(
                'id' => 40,
                'first_name' => 'Noe',
                'last_name' => 'Schaden',
                'company_id' => 14,
                'email' => 'auer.albert@example.net',
                'phone' => '+1.323.405.0467',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            40 =>
            array(
                'id' => 41,
                'first_name' => 'Bradford',
                'last_name' => 'Kling',
                'company_id' => 14,
                'email' => 'mona27@example.net',
                'phone' => '435.771.7413',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            41 =>
            array(
                'id' => 42,
                'first_name' => 'Riley',
                'last_name' => 'Quitzon',
                'company_id' => 14,
                'email' => 'chanelle07@example.net',
                'phone' => '1-530-584-2729',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            42 =>
            array(
                'id' => 43,
                'first_name' => 'Hubert',
                'last_name' => 'Larson',
                'company_id' => 15,
                'email' => 'tiana.pacocha@example.com',
                'phone' => '+1.854.219.2616',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            43 =>
            array(
                'id' => 44,
                'first_name' => 'Caitlyn',
                'last_name' => 'Veum',
                'company_id' => 15,
                'email' => 'efrain.brown@example.org',
                'phone' => '218.557.7968',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            44 =>
            array(
                'id' => 45,
                'first_name' => 'Delpha',
                'last_name' => 'Lowe',
                'company_id' => 15,
                'email' => 'adele58@example.com',
                'phone' => '(810) 558-1561',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            45 =>
            array(
                'id' => 46,
                'first_name' => 'Torrance',
                'last_name' => 'Barton',
                'company_id' => 16,
                'email' => 'sabryna10@example.net',
                'phone' => '+1-413-900-8820',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            46 =>
            array(
                'id' => 47,
                'first_name' => 'Myrtle',
                'last_name' => 'Bartoletti',
                'company_id' => 16,
                'email' => 'xreichel@example.org',
                'phone' => '704-780-8736',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            47 =>
            array(
                'id' => 48,
                'first_name' => 'Sonia',
                'last_name' => 'Schuppe',
                'company_id' => 16,
                'email' => 'kimberly.lakin@example.org',
                'phone' => '918-930-6236',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            48 =>
            array(
                'id' => 49,
                'first_name' => 'Caterina',
                'last_name' => 'Bruen',
                'company_id' => 17,
                'email' => 'darrel90@example.net',
                'phone' => '281-888-8580',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            49 =>
            array(
                'id' => 50,
                'first_name' => 'Meta',
                'last_name' => 'Hoeger',
                'company_id' => 17,
                'email' => 'toney.crona@example.org',
                'phone' => '+1 (623) 742-1506',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            50 =>
            array(
                'id' => 51,
                'first_name' => 'Rickey',
                'last_name' => 'Willms',
                'company_id' => 17,
                'email' => 'bledner@example.org',
                'phone' => '540-932-6034',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            51 =>
            array(
                'id' => 52,
                'first_name' => 'Christina',
                'last_name' => 'Boyer',
                'company_id' => 18,
                'email' => 'tmoore@example.com',
                'phone' => '470.310.3709',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            52 =>
            array(
                'id' => 53,
                'first_name' => 'Katheryn',
                'last_name' => 'Doyle',
                'company_id' => 18,
                'email' => 'lucinda.mcclure@example.org',
                'phone' => '743-564-0121',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            53 =>
            array(
                'id' => 54,
                'first_name' => 'Amara',
                'last_name' => 'Waelchi',
                'company_id' => 18,
                'email' => 'jaqueline77@example.org',
                'phone' => '+1-279-922-5817',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            54 =>
            array(
                'id' => 55,
                'first_name' => 'Madalyn',
                'last_name' => 'Collins',
                'company_id' => 19,
                'email' => 'ohara.nayeli@example.com',
                'phone' => '(463) 753-8742',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            55 =>
            array(
                'id' => 56,
                'first_name' => 'Brando',
                'last_name' => 'Considine',
                'company_id' => 19,
                'email' => 'mariane.huels@example.net',
                'phone' => '838-809-8441',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            56 =>
            array(
                'id' => 57,
                'first_name' => 'Aryanna',
                'last_name' => 'Kautzer',
                'company_id' => 19,
                'email' => 'ggoodwin@example.com',
                'phone' => '+1-332-722-0658',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            57 =>
            array(
                'id' => 58,
                'first_name' => 'Bryon',
                'last_name' => 'Blanda',
                'company_id' => 20,
                'email' => 'tom96@example.org',
                'phone' => '1-323-886-3473',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            58 =>
            array(
                'id' => 59,
                'first_name' => 'Jarrett',
                'last_name' => 'Herzog',
                'company_id' => 20,
                'email' => 'flo.wintheiser@example.com',
                'phone' => '417.455.3362',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            59 =>
            array(
                'id' => 60,
                'first_name' => 'Aylin',
                'last_name' => 'Beier',
                'company_id' => 20,
                'email' => 'hayley.terry@example.com',
                'phone' => '(662) 393-6984',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            60 =>
            array(
                'id' => 61,
                'first_name' => 'Margarita',
                'last_name' => 'Mraz',
                'company_id' => 21,
                'email' => 'malcolm.schroeder@example.net',
                'phone' => '+1.541.864.1008',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            61 =>
            array(
                'id' => 62,
                'first_name' => 'Justice',
                'last_name' => 'Thiel',
                'company_id' => 21,
                'email' => 'icruickshank@example.com',
                'phone' => '1-283-297-2889',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            62 =>
            array(
                'id' => 63,
                'first_name' => 'Chelsea',
                'last_name' => 'Prosacco',
                'company_id' => 21,
                'email' => 'jerad.kilback@example.net',
                'phone' => '+1-818-748-3882',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            63 =>
            array(
                'id' => 64,
                'first_name' => 'Edwardo',
                'last_name' => 'Runte',
                'company_id' => 22,
                'email' => 'ruthe84@example.org',
                'phone' => '+19036256021',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            64 =>
            array(
                'id' => 65,
                'first_name' => 'Ashleigh',
                'last_name' => 'Gusikowski',
                'company_id' => 22,
                'email' => 'magali.mcglynn@example.org',
                'phone' => '380.323.5254',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            65 =>
            array(
                'id' => 66,
                'first_name' => 'Etha',
                'last_name' => 'Nader',
                'company_id' => 22,
                'email' => 'ksimonis@example.com',
                'phone' => '+1.860.238.8699',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            66 =>
            array(
                'id' => 67,
                'first_name' => 'Kaycee',
                'last_name' => 'Brekke',
                'company_id' => 23,
                'email' => 'murphy.aryanna@example.org',
                'phone' => '(971) 504-4831',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            67 =>
            array(
                'id' => 68,
                'first_name' => 'Bud',
                'last_name' => 'Lemke',
                'company_id' => 23,
                'email' => 'laverne38@example.org',
                'phone' => '480.503.1858',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            68 =>
            array(
                'id' => 69,
                'first_name' => 'Lori',
                'last_name' => 'Wisoky',
                'company_id' => 23,
                'email' => 'yost.gertrude@example.com',
                'phone' => '+1 (323) 877-4130',
                'created_at' => $now,
                'updated_at' => $now,
            ),
        );

        // Checking if the table already have a query
        if (is_null(DB::table('employees')->first()))
            DB::table('employees')->insert($employees);
        else
            echo "\e[31mTable is not empty, therefore NOT ";
    }
}
