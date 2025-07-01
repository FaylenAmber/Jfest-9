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
                'name' => 'EXPO Ticket',
                'price' => 30000,
                'tickets_qty_available' => 150
            ]),
            new ActivitySale([ // ID : 5
                'unique_id' => 'EX2',
                'name' => 'EXPO Ticket',
                'price' => 35000,
                'tickets_qty_available' => 150
            ]),
            new ActivitySale([ // ID : 6
                'unique_id' => 'BD1',
                'name' => 'Obake Bundle – 2 Tickets',
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
                'description' => 'Jfest is a japanese culture special event held by JCOS (Japanese Community of STIKOM Bali)',
                'image_url' => 'https://bucket.jfestbali.id/images/presale1.webp',
                'date' => Carbon::create(2025, 10, 5),
                'purchase_opened_at' => Carbon::create(2025, 1, 1),
                'purchase_closed_at' => Carbon::create(2025, 10, 5)
            ]),
            new Activity([
                'activity_sale_id' => $sales[7]->id, // Bundling Pre-Sale 1 + EXPO Offline
                'name' => 'JFEST | EXPO Bundle',
                'description' => 'Nikmati pengalaman penuh JFEST#9 dengan tiket bundling spesial: akses ke seluruh festival dan seminar EXPO secara langsung di lokasi. Lebih hemat, lebih seru!',
                'image_url' => 'https://bucket.jfestbali.id/images/bundling_presale1_expo_offline.webp',
                'date' => Carbon::create(2025, 10, 5),
                'purchase_opened_at' => Carbon::create(2025, 6, 1),
                'purchase_closed_at' => Carbon::create(2025, 10, 5)
            ]),
            new Activity([
                'activity_sale_id' => $sales[3]->id, // TIKET OBAKE
                'name' => 'Obake Haunted House',
                'description' => 'Wahana rumah hantu spesial bertema Jepang',
                'image_url' => 'https://bucket.jfestbali.id/images/obake.webp',
                'date' => Carbon::create(2025, 10, 5),
                'purchase_opened_at' => Carbon::create(2025, 6, 1),
                'purchase_closed_at' => Carbon::create(2025, 10, 5)
            ]),
            new Activity([
                'activity_sale_id' => $sales[6]->id, // Obake Bundle – 2 Tickets
                'name' => 'Obake Haunted House Bundle',
                'description' => 'Dapatkan 2 tiket wahana rumah hantu Obake dalam satu bundling spesial! Cocok untuk datang bersama teman atau pasangan, dan nikmati pengalaman horor bertema Jepang yang menegangkan.',
                'image_url' => 'https://bucket.jfestbali.id/images/obake_bundle.webp',
                'date' => Carbon::create(2025, 10, 5),
                'purchase_opened_at' => Carbon::create(2025, 6, 1),
                'purchase_closed_at' => Carbon::create(2025, 10, 5)
            ]),
            new Activity([
                'activity_sale_id' => $sales[4]->id, // EXPO Offline
                'name' => 'EXPO Ticket (Offline)',
                'description' => 'Seminar offline spesial JFEST#9 dengan narasumber inspiratif yang akan membahas berbagai topik menarik seputar budaya, teknologi, dan kreativitas Jepang.',
                'image_url' => 'https://bucket.jfestbali.id/images/expo_offline.webp',
                'date' => Carbon::create(2025, 10, 4),
                'purchase_opened_at' => Carbon::create(2025, 6, 1),
                'purchase_closed_at' => Carbon::create(2025, 10, 5)
            ]),
            new Activity([
                'activity_sale_id' => $sales[5]->id, // EXPO Online
                'name' => 'EXPO Ticket (Online)',
                'description' => 'Ikuti seminar JFEST#9 secara daring! Acara ini menghadirkan pembicara yang akan berbagi wawasan tentang budaya Jepang dan bidang kreatif secara interaktif melalui platform online.',
                'image_url' => 'https://bucket.jfestbali.id/images/expo_online.webp',
                'date' => Carbon::create(2025, 10, 4),
                'purchase_opened_at' => Carbon::create(2025, 6, 1),
                'purchase_closed_at' => Carbon::create(2025, 10, 5)
            ])

        ])->each(function ($activity) {
            $activity->save();
        });

        collect([
            new Competition([
                'name' => 'Cosplay Competition',
                'description' => 'PESERTA LOMBA COSSCOMP AKAN MELAKUKAN DRAMA SUATU ADEGAN/SCENE DI ANIME, GAME, DLL UNTUK MEMBERIKAN PENAMPILAN TERBAIK MEREKA',
                'price' => 75000,
                'price_tag' => 'sale',
                'group_url' => 'https://chat.whatsapp.com/L5RqbuEupCsGJ9KkIE0Uda',
                'guide_book_url' => 'https://drive.google.com/file/d/1_C2kZH5gbqoVzcIjsc2JgTY5nEEaAyTa/view?usp=drive_link',
                'image_url' => 'https://bucket.jfestbali.id/images/competitions/coscomp.webp',
                'with_ticket' => true,
                'use_name_field' => true,
                'use_instagram_field' => true,
                'use_nickname_field' => true,
                'use_institution_field' => false,
                'use_multi_participant' => true,
                'min_participants' => 1,
                'max_participants' => 2,
                'registration_opened_at' => Carbon::create(2025, 6, 10),
                'registration_closed_at' => Carbon::create(2025, 8, 10),
            ]),
            new Competition([
                'name' => 'Japanese Song Cover',
                'description' => 'PESERTA LOMBA J-SONG AKAN BERNYANYI DENGAN LAGU TERBAIK MEREKA DAN AKAN DIPERLOMBAKAN UNTUK MEMBUKTIKAN BAHWA MEREKA BISA UNTUK MENJADI SEORANG STAR/IDOL',
                'price' => 50000,
                'price_tag' => 'sale',
                'group_url' => 'https://chat.whatsapp.com/L5RqbuEupCsGJ9KkIE0Uda',
                'guide_book_url' => 'https://drive.google.com/file/d/1_C2kZH5gbqoVzcIjsc2JgTY5nEEaAyTa/view?usp=drive_link',
                'image_url' => 'https://bucket.jfestbali.id/images/competitions/japanese-song-cover.webp',
                'with_ticket' => true,
                'use_name_field' => true,
                'use_instagram_field' => true,
                'use_description_field' => true,
                'use_nickname_field' => false,
                'use_multi_participant' => false,
                'min_participants' => 1,
                'max_participants' => 1,
                'registration_opened_at' => Carbon::create(2025, 6, 10),
                'registration_closed_at' => Carbon::create(2025, 8, 10),
                ]),
            new Competition([
                'name' => 'Seiyuu Contest',
                'description' => 'PESERTA SEIYUU AKAN MELAKUKAN DUBBING DAN PEMERANAN ULANG DENGAN SUARA MEREKA SENDIRI DAN AKAN BERSAING UNTUK MENJADI YANG TERBAIK DALAM PERAN SUARA',
                'price' => 35000,
                'price_tag' => 'sale',
                'group_url' => 'https://chat.whatsapp.com/L5RqbuEupCsGJ9KkIE0Uda',
                'guide_book_url' => 'https://drive.google.com/file/d/1_C2kZH5gbqoVzcIjsc2JgTY5nEEaAyTa/view?usp=drive_link',
                'image_url' => 'https://bucket.jfestbali.id/images/competitions/seiyuu.webp',
                'with_ticket' => false,
                'use_name_field' => true,
                'use_instagram_field' => true,
                'use_nickname_field' => true,
                'use_institution_field' => true,
                'use_multi_participant' => false,
                'min_participants' => 1,
                'max_participants' => 1,
                'registration_opened_at' => Carbon::create(2025, 6, 10),
                'registration_closed_at' => Carbon::create(2025, 8, 10),
            ]),
            new Competition([
                'name' => 'Kana Taikai',
                'description' => 'PESERTA KANA TAIKAI AKAN DIPERTANDINGKAN UNTUK MENGUJI KEMAMPUAN MEMBACA DAN MENULIS HURUF HIRAGANA DAN KATAKANA DENGAN BENAR DAN CEPAT',
                'price' => 50000,
                'price_tag' => 'sale',
                'group_url' => 'https://chat.whatsapp.com/L5RqbuEupCsGJ9KkIE0Uda',
                'guide_book_url' => 'https://drive.google.com/file/d/1_C2kZH5gbqoVzcIjsc2JgTY5nEEaAyTa/view?usp=drive_link',
                'image_url' => 'https://bucket.jfestbali.id/images/competitions/kanatakai.webp',
                'with_ticket' => false,
                'use_tool_field' => true,
                'use_name_field' => true,
                'use_institution_field' => true,
                'use_nickname_field' => false,
                'use_instagram_field' => false,
                'use_multi_participant' => false,
                'min_participants' => 1,
                'max_participants' => 1,
                'registration_opened_at' => Carbon::create(2025, 6, 10),
                'registration_closed_at' => Carbon::create(2025, 8, 10),
            ]),
            new Competition([
                'name' => 'Original Character',
                'description' => 'PESERTA ORIGINAL CHARACTER AKAN MENGGAMBAR DAN MENGKONSEPKAN KARAKTER ORIGINAL DENGAN CERITA DAN DESAIN YANG UNIK UNTUK DIPERTANDINGKAN',
                'price' => 55000,
                'price_tag' => 'sale',
                'group_url' => 'https://chat.whatsapp.com/L5RqbuEupCsGJ9KkIE0Uda',
                'guide_book_url' => 'https://drive.google.com/file/d/1_C2kZH5gbqoVzcIjsc2JgTY5nEEaAyTa/view?usp=drive_link',
                'image_url' => 'https://bucket.jfestbali.id/images/competitions/original-character.webp',
                'with_ticket' => true,
                'use_name_field' => true,
                'use_instagram_field' => true,
                'use_description_field' => true,
                'use_multi_participant' => false,
                'min_participants' => 1,
                'max_participants' => 1,
                'registration_opened_at' => Carbon::create(2025, 6, 10),
                'registration_closed_at' => Carbon::create(2025, 8, 10),
            ]),
            new Competition([
                'name' => 'Jfestography',
                'description' => 'PESERTA JFESTOGRAPHY AKAN MENGAMBIL MOMEN TERBAIK SELAMA EVENT BERLANGSUNG UNTUK DILOMBAKAN DALAM BENTUK FOTO ARTISTIK MAUPUN MOMENTUM',
                'price' => 50000,
                'price_tag' => 'sale',
                'group_url' => 'https://chat.whatsapp.com/L5RqbuEupCsGJ9KkIE0Uda',
                'guide_book_url' => 'https://drive.google.com/file/d/1_C2kZH5gbqoVzcIjsc2JgTY5nEEaAyTa/view?usp=drive_link',
                'image_url' => 'https://bucket.jfestbali.id/images/competitions/photography.webp',
                'with_ticket' => true,
                'use_name_field' => true,
                'use_instagram_field' => true,
                'use_nickname_field' => false,
                'use_multi_participant' => false,
                'min_participants' => 1,
                'max_participants' => 1,
                'registration_opened_at' => Carbon::create(2025, 6, 10),
                'registration_closed_at' => Carbon::create(2025, 8, 10),
            ]),
            new Competition([
                'name' => 'Cosplay Walk',
                'description' => 'PESERTA COSWALK AKAN BERJALAN MEMPERAGAKAN KARAKTER YANG MEREKA PERANKAN SECARA MENDALAM DAN MENARIK',
                'price' => 15000,
                'price_tag' => 'ots',
                'group_url' => 'https://chat.whatsapp.com/L5RqbuEupCsGJ9KkIE0Uda',
                'guide_book_url' => 'https://drive.google.com/file/d/1_C2kZH5gbqoVzcIjsc2JgTY5nEEaAyTa/view?usp=drive_link',
                'image_url' => 'https://bucket.jfestbali.id/images/competitions/coswalk.webp',
                'with_ticket' => false,
                'use_name_field' => false,
                'use_description_field' => true,
                'use_instagram_field' => false,
                'use_nickname_field' => true,
                'use_multi_participant' => false,
                'min_participants' => 1,
                'max_participants' => 1,
                'registration_opened_at' => Carbon::create(2025, 6, 10),
                'registration_closed_at' => Carbon::create(2025, 8, 10),
            ]),
            new Competition([
                'name' => 'Cerdas Cermat Jepang',
                'description' => 'LOMBA CERDAS CERMAT JEPANG (CCJ) ADALAH KOMPETISI BERBASIS SOAL PILIHAN GANDA YANG MENGUJI PENGETAHUAN PESERTA SEPUTAR BUDAYA POPULER JEPANG (J-POP CULTURE), SEPERTI ANIME, MUSIK, DAN GAME JEPANG.',
                'price' => 40000,
                'price_tag' => 'sale',
                'group_url' => 'https://chat.whatsapp.com/L5RqbuEupCsGJ9KkIE0Uda',
                'guide_book_url' => 'https://drive.google.com/file/d/1_C2kZH5gbqoVzcIjsc2JgTY5nEEaAyTa/view?usp=drive_link',
                'image_url' => 'https://bucket.jfestbali.id/images/competitions/mading.webp',
                'with_ticket' => true,
                'use_name_field' => true,
                'use_institution_field' => true,
                'use_instagram_field' => true,
                'use_multi_participant' => false,
                'min_participants' => 1,
                'max_participants' => 1,
                'registration_opened_at' => Carbon::create(2025, 6, 10),
                'registration_closed_at' => Carbon::create(2025, 8, 10),
            ]),
            new Competition([
                'name' => 'Pidato Bahasa Jepang',
                'description' => 'PESERTA AKAN MENYAMPAIKAN PIDATO DALAM BAHASA JEPANG SESUAI TEMA YANG TELAH DITENTUKAN, DINILAI BERDASARKAN KETEPATAN, PENGUCAPAN, DAN KEPERCAYAAN DIRI',
                'price' => 40000,
                'price_tag' => 'sale',
                'group_url' => 'https://chat.whatsapp.com/L5RqbuEupCsGJ9KkIE0Uda',
                'guide_book_url' => 'https://drive.google.com/file/d/1_C2kZH5gbqoVzcIjsc2JgTY5nEEaAyTa/view?usp=drive_link',
                'image_url' => 'https://bucket.jfestbali.id/images/competitions/pidato.webp',
                'with_ticket' => false,
                'use_name_field' => true,
                'use_description_field' => true,
                'use_instagram_field' => false,
                'use_nickname_field' => false,
                'use_institution_field' => true,
                'use_multi_participant' => false,
                'min_participants' => 1,
                'max_participants' => 1,
                'registration_opened_at' => Carbon::create(2025, 6, 10),
                'registration_closed_at' => Carbon::create(2025, 8, 10),
            ]),
        ])->each(function ($competition) {
            $competition->save();
        });
    }
}
