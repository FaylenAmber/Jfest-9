<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;
use App\Models\ActivitySale;
use App\Models\Competition;
use Illuminate\Support\Carbon;

class Jfest9Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sales = collect([
            new ActivitySale([ // ID : 0
                'unique_id' => 'PS1',
                'name' => 'Pre-Sale 1',
                'price' => 30000,
                'tickets_qty_available' => 200
            ]),
            new ActivitySale([ // ID : 1
                'unique_id' => 'PS2',
                'name' => 'Pre-Sale 2',
                'price' => 35000,
                'tickets_qty_available' => 450
            ]),
            new ActivitySale([ // ID : 2
                'unique_id' => 'OTS',
                'name' => 'On The Spot',
                'price' => 40000,
                'tickets_qty_available' => 250
            ]),
            new ActivitySale([ // ID : 3
                'unique_id' => 'OBA',
                'name' => 'Obake Ticket',
                'price' => 20000,
                'tickets_qty_available' => 50
            ]),
            new ActivitySale([ // ID : 4
                'unique_id' => 'EX1',
                'name' => 'EXPO Ticket (Offline)',
                'price' => 30000,
                'tickets_qty_available' => 150
            ]),
            new ActivitySale([ // ID : 5
                'unique_id' => 'EX2',
                'name' => 'EXPO Ticket (Online)',
                'price' => 35000,
                'tickets_qty_available' => 150
            ]),
            new ActivitySale([ // ID : 6
                'unique_id' => 'BD1',
                'name' => 'Obake Bundle (2 Tickets)',
                'price' => 30000,
                'tickets_qty_available' => 50
            ]),
            new ActivitySale([ // ID : 7
                'unique_id' => 'BD2',
                'name' => 'Pre-Sale 1 + EXPO (Offline)',
                'price' => 50000,
                'tickets_qty_available' => 50
            ]),
            new ActivitySale([ // ID : 8
                'unique_id' => 'BD3',
                'name' => 'Pre-Sale 2 + EXPO (Online)',
                'price' => 60000,
                'tickets_qty_available' => 50
            ])
        ])->map(function ($activitySale) {
            $activitySale->save();
            return $activitySale;
        });

        collect([
            new Activity([
                'activity_sale_id' => $sales[0]->id, // TIKET PRE-SALE 1 JFEST
                'name' => 'JFEST Ticket',
                'description' => 'JFest is a japanese culture special event held by JCOS (Japanese Community of STIKOM Bali)',
                'image_url' => 'https://bucket.jfestbali.com/images/tickets/presale1.webp',
                'date' => Carbon::create(2025, 10, 5),
                'purchase_opened_at' => Carbon::create(2025, 1, 1),
                'purchase_closed_at' => Carbon::create(2025, 10, 5)
            ]),
            new Activity([
                'activity_sale_id' => $sales[7]->id, // Bundling Pre-Sale 1 + EXPO Offline
                'name' => 'JFEST | EXPO Bundle',
                'description' => 'Nikmati pengalaman penuh JFEST#9 dengan tiket bundling spesial: akses ke seluruh festival dan seminar EXPO secara langsung. Lebih hemat, lebih seru!',
                'image_url' => 'https://bucket.jfestbali.com/images/tickets/bundling_presale1_expo_offline.webp',
                'date' => Carbon::create(2025, 10, 5),
                'purchase_opened_at' => Carbon::create(2025, 6, 1),
                'purchase_closed_at' => Carbon::create(2025, 10, 5)
            ]),
            new Activity([
                'activity_sale_id' => $sales[3]->id, // TIKET OBAKE
                'name' => 'Obake Yashiki',
                'description' => 'Wahana rumah hantu spesial bertema Jepang',
                'image_url' => 'https://bucket.jfestbali.com/images/tickets/obake.webp',
                'date' => Carbon::create(2025, 10, 5),
                'purchase_opened_at' => Carbon::create(2025, 6, 1),
                'purchase_closed_at' => Carbon::create(2025, 10, 5)
            ]),
            new Activity([
                'activity_sale_id' => $sales[6]->id, // Obake Bundle – 2 Tickets
                'name' => 'Obake Ticket Bundle',
                'description' => 'Dapatkan 2 tiket wahana rumah hantu Obake dalam satu bundling spesial! Cocok untuk datang bersama teman atau pasangan, dan nikmati pengalaman horor bertema Jepang yang menegangkan.',
                'image_url' => 'https://bucket.jfestbali.com/images/tickets/obake_bundle.webp',
                'date' => Carbon::create(2025, 10, 5),
                'purchase_opened_at' => Carbon::create(2025, 6, 1),
                'purchase_closed_at' => Carbon::create(2025, 10, 5)
            ]),
            new Activity([
                'activity_sale_id' => $sales[4]->id, // EXPO Offline
                'name' => 'EXPO Offline Pass',
                'description' => 'Seminar offline spesial JFEST#9 dengan narasumber inspiratif yang akan membahas berbagai topik menarik seputar budaya, teknologi, dan kreativitas Jepang.',
                'image_url' => 'https://bucket.jfestbali.com/images/tickets/expo_offline.webp',
                'date' => Carbon::create(2025, 10, 4),
                'purchase_opened_at' => Carbon::create(2025, 6, 1),
                'purchase_closed_at' => Carbon::create(2025, 10, 5),
                'use_name_field' => true,
                'use_nim_field' => true,
            ]),
            new Activity([
                'activity_sale_id' => $sales[5]->id, // EXPO Online
                'name' => 'EXPO Online Pass',
                'description' => 'Ikuti seminar JFEST#9 secara daring! Acara ini menghadirkan pembicara yang akan berbagi wawasan tentang budaya Jepang dan bidang kreatif secara interaktif melalui platform online.',
                'image_url' => 'https://bucket.jfestbali.com/images/tickets/expo_online.webp',
                'date' => Carbon::create(2025, 10, 4),
                'purchase_opened_at' => Carbon::create(2025, 6, 1),
                'purchase_closed_at' => Carbon::create(2025, 10, 5),
                'use_name_field' => true,
                'use_nim_field' => true,
            ]),


        ])->each(function ($activity) {
            $activity->save();
        });

        collect([
            new Competition([
                'name' => 'Cosplay Competition',
                'description' => 'Peserta lomba CossComp akan menampilkan adegan atau scene dari anime, game, dan karya lainnya untuk memberikan penampilan terbaik mereka.',
                'price' => 75000,
                'price_tag' => 'sale',
                'group_url' => 'https://chat.whatsapp.com/L5RqbuEupCsGJ9KkIE0Uda',
                'guide_book_url' => 'https://drive.google.com/file/d/1YfuwZ09NWrVx9Uv2MdLsJgFqTWt-MvPU/view?usp=drive_link',
                'image_url' => 'https://bucket.jfestbali.com/images/competitions/cosplay_competition.webp',
                'with_ticket' => true,
                'use_name_field' => true,
                'use_instagram_field' => true,
                'use_nickname_field' => true,
                'use_institution_field' => false,
                'use_multi_participant' => true,
                'min_participants' => 1,
                'max_participants' => 2,
                'registration_opened_at' => Carbon::create(2025, 7, 10),
                'registration_closed_at' => Carbon::create(2025, 8, 10),
            ]),
            new Competition([
                'name' => 'Japanese Song Cover',
                'description' => 'Peserta lomba J-Song akan menampilkan lagu terbaik mereka untuk bersaing dan membuktikan bahwa mereka layak menjadi seorang Bintang atau Idol.',
                'price' => 50000,
                'price_tag' => 'sale',
                'group_url' => 'https://chat.whatsapp.com/L5RqbuEupCsGJ9KkIE0Uda',
                'guide_book_url' => 'https://drive.google.com/file/d/1WNfEv8mqxcKSdH7OjICOdhWWJDm2j-hs/view?usp=drive_link',
                'image_url' => 'https://bucket.jfestbali.com/images/competitions/japanese_song_cover.webp',
                'with_ticket' => true,
                'use_name_field' => true,
                'use_instagram_field' => true,
                'use_description_field' => true,
                'use_nickname_field' => false,
                'use_multi_participant' => false,
                'min_participants' => 1,
                'max_participants' => 1,
                'registration_opened_at' => Carbon::create(2025, 7, 10),
                'registration_closed_at' => Carbon::create(2025, 8, 10),
                ]),
            new Competition([
                'name' => 'Seiyuu Contest',
                'description' => 'Peserta lomba Seiyuu akan melakukan dubbing dan memerankan ulang karakter dengan suara mereka sendiri, lalu bersaing untuk menjadi yang terbaik dalam peran suara.',
                'price' => 35000,
                'price_tag' => 'sale',
                'group_url' => 'https://chat.whatsapp.com/L5RqbuEupCsGJ9KkIE0Uda',
                'guide_book_url' => 'https://drive.google.com/file/d/1wXILCQr2aT-lMgYu8EFbUKnifbcyqaNh/view?usp=drive_link',
                'image_url' => 'https://bucket.jfestbali.com/images/competitions/seiyuu.webp',
                'with_ticket' => false,
                'use_name_field' => true,
                'use_instagram_field' => true,
                'use_nickname_field' => true,
                'use_institution_field' => true,
                'use_multi_participant' => false,
                'min_participants' => 1,
                'max_participants' => 1,
                'registration_opened_at' => Carbon::create(2025, 7, 10),
                'registration_closed_at' => Carbon::create(2025, 8, 10),
            ]),
            new Competition([
                'name' => 'Kana Taikai',
                'description' => 'Peserta Kana Taikai akan berkompetisi untuk menguji kemampuan membaca dan menulis huruf Hiragana dan Katakana dengan benar dan cepat.',
                'price' => 50000,
                'price_tag' => 'sale',
                'group_url' => 'https://chat.whatsapp.com/L5RqbuEupCsGJ9KkIE0Uda',
                'guide_book_url' => 'https://drive.google.com/file/d/1lO13RJao9haOn1YHs52QjgXsFE54FBWq/view?usp=drive_link',
                'image_url' => 'https://bucket.jfestbali.com/images/competitions/kana_taikai.webp',
                'with_ticket' => false,
                'use_tool_field' => true,
                'use_name_field' => true,
                'use_institution_field' => true,
                'use_nickname_field' => false,
                'use_instagram_field' => false,
                'use_multi_participant' => false,
                'min_participants' => 1,
                'max_participants' => 1,
                'registration_opened_at' => Carbon::create(2025, 7, 10),
                'registration_closed_at' => Carbon::create(2025, 8, 10),
            ]),
            new Competition([
                'name' => 'Original Character',
                'description' => 'Peserta lomba Original Character akan menggambar serta membuat konsep karakter orisinal lengkap dengan cerita dan desain yang unik untuk dikompetisikan.',
                'price' => 55000,
                'price_tag' => 'sale',
                'group_url' => 'https://chat.whatsapp.com/L5RqbuEupCsGJ9KkIE0Uda',
                'guide_book_url' => 'https://drive.google.com/file/d/1mrCOxEkb9jQyJj5RQ70k-_8Dzs_0dCkx/view?usp=drive_link',
                'image_url' => 'https://bucket.jfestbali.com/images/competitions/original_character.webp',
                'with_ticket' => true,
                'use_name_field' => true,
                'use_instagram_field' => true,
                'use_description_field' => true,
                'use_multi_participant' => false,
                'min_participants' => 1,
                'max_participants' => 1,
                'registration_opened_at' => Carbon::create(2025, 7, 10),
                'registration_closed_at' => Carbon::create(2025, 8, 10),
            ]),
            new Competition([
                'name' => 'Jfestography',
                'description' => 'Peserta JFestography akan mengabadikan momen terbaik selama acara berlangsung untuk dilombakan dalam bentuk foto artistik maupun momen spesial.',
                'price' => 50000,
                'price_tag' => 'sale',
                'group_url' => 'https://chat.whatsapp.com/L5RqbuEupCsGJ9KkIE0Uda',
                'guide_book_url' => 'https://drive.google.com/file/d/1G2TUY8DHcBSY7ymziAMXSYPHMbjIe8nf/view?usp=drive_link',
                'image_url' => 'https://bucket.jfestbali.com/images/competitions/jfestography.webp',
                'with_ticket' => true,
                'use_name_field' => true,
                'use_instagram_field' => true,
                'use_nickname_field' => false,
                'use_multi_participant' => false,
                'min_participants' => 1,
                'max_participants' => 1,
                'registration_opened_at' => Carbon::create(2025, 7, 10),
                'registration_closed_at' => Carbon::create(2025, 8, 10),
            ]),
            new Competition([
                'name' => 'Cosplay Walk',
                'description' => 'Peserta Coswalk akan berjalan memperagakan karakter yang mereka perankan dengan penampilan yang menarik dan penuh penghayatan.',
                'price' => 15000,
                'price_tag' => 'OTS',
                'group_url' => 'https://chat.whatsapp.com/L5RqbuEupCsGJ9KkIE0Uda',
                'guide_book_url' => 'https://drive.google.com/file/d/1dZzr833vL9oZ4eHajIqoYn6XhBf15xgJ/view?usp=drive_link',
                'image_url' => 'https://bucket.jfestbali.com/images/competitions/cosplay_walk.webp',
                'with_ticket' => false,
                'use_name_field' => false,
                'use_description_field' => true,
                'use_instagram_field' => false,
                'use_nickname_field' => true,
                'use_multi_participant' => false,
                'min_participants' => 1,
                'max_participants' => 1,
                'registration_opened_at' => Carbon::create(2025, 7, 10),
                'registration_closed_at' => Carbon::create(2025, 8, 10),
            ]),
            new Competition([
                'name' => 'Cerdas Cermat',
                'description' => 'Lomba Cerdas Cermat Jepang (CCJ) adalah kompetisi berbasis soal pilihan ganda yang menguji pengetahuan peserta tentang budaya populer Jepang (J-Pop Culture), seperti anime, musik, dan game Jepang.',
                'price' => 40000,
                'price_tag' => 'sale',
                'group_url' => 'https://chat.whatsapp.com/L5RqbuEupCsGJ9KkIE0Uda',
                'guide_book_url' => 'https://drive.google.com/file/d/1gh994fZZvUuincADkLl0gdUEy9uPCWsZ/view?usp=drive_link',
                'image_url' => 'https://bucket.jfestbali.com/images/competitions/cerdas_cermat.webp',
                'with_ticket' => true,
                'use_name_field' => true,
                'use_institution_field' => true,
                'use_instagram_field' => true,
                'use_multi_participant' => false,
                'min_participants' => 1,
                'max_participants' => 1,
                'registration_opened_at' => Carbon::create(2025, 7, 10),
                'registration_closed_at' => Carbon::create(2025, 8, 10),
            ]),
            new Competition([
                'name' => 'Pidato Bahasa Jepang',
                'description' => 'Peserta akan menyampaikan pidato dalam bahasa Jepang sesuai tema yang telah ditentukan. Penilaian dilakukan berdasarkan ketepatan, pelafalan, dan kepercayaan diri.',
                'price' => 40000,
                'price_tag' => 'sale',
                'group_url' => 'https://chat.whatsapp.com/L5RqbuEupCsGJ9KkIE0Uda',
                'guide_book_url' => 'https://drive.google.com/file/d/19uIz-S30W3ZCi9gD0AGGHOovHnXuayOL/view?usp=drive_link',
                'image_url' => 'https://bucket.jfestbali.com/images/competitions/pidato.webp',
                'with_ticket' => false,
                'use_name_field' => true,
                'use_description_field' => true,
                'use_instagram_field' => false,
                'use_nickname_field' => false,
                'use_institution_field' => true,
                'use_multi_participant' => false,
                'min_participants' => 1,
                'max_participants' => 1,
                'registration_opened_at' => Carbon::create(2025, 7, 10),
                'registration_closed_at' => Carbon::create(2025, 8, 10),
            ]),
        ])->each(function ($competition) {
            $competition->save();
        });
    }
}
