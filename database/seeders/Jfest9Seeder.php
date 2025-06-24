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
            new ActivitySale([
                'unique_id' => 'PS1',
                'name' => 'Pre-Sale 1',
                'price' => 35000,
                'tickets_qty_available' => 200
            ]),
            new ActivitySale([
                'unique_id' => 'PS2',
                'name' => 'Pre-Sale 2',
                'price' => 40000,
                'tickets_qty_available' => 300
            ]),
            new ActivitySale([
                'unique_id' => 'PS3',
                'name' => 'Pre-Sale 3',
                'price' => 45000,
                'tickets_qty_available' => 10000
            ]),
            new ActivitySale([
                'unique_id' => 'OTS',
                'name' => 'On The Spot',
                'price' => 50000,
                'tickets_qty_available' => 10000
            ]),
            new ActivitySale([
                'unique_id' => 'OBA',
                'name' => 'Tiket Obake',
                'price' => 35000,
                'tickets_qty_available' => 500
            ]),
            new ActivitySale([
                'unique_id' => 'BD1',
                'name' => 'Bundle Tiket JFest + Obake',
                'price' => 65000,
                'tickets_qty_available' => 300
            ])
        ])->map(function ($activitySale) {
            $activitySale->save();
            return $activitySale;
        });

        collect([
            new Activity([
                'activity_sale_id' => $sales[0]->id,
                'name' => 'Japanese Festival 8',
                'description' => 'Jfest is a japanese culture special event held by JCOS (Japanese Community of STIKOM Bali)',
                'image_url' => 'https://bucket.jfestbali.id/images/presale1.webp',
                'date' => Carbon::create(2024, 10, 8),
                'purchase_opened_at' => Carbon::create(2025, 1, 1),
                'purchase_closed_at' => Carbon::create(2025, 10, 5)
            ]),
            new Activity([
                'activity_sale_id' => $sales[4]->id,
                'name' => 'Obake Haunted House',
                'description' => 'Wahana rumah hantu spesial bertema Jepang',
                'image_url' => 'https://bucket.jfestbali.id/images/obake.webp',
                'date' => Carbon::create(2025, 10, 18),
                'purchase_opened_at' => Carbon::create(2025, 6, 1),
                'purchase_closed_at' => Carbon::create(2025, 10, 5)
            ]),
            new Activity([
                'activity_sale_id' => $sales[5]->id,
                'name' => 'Bundle Tiket JFest#9 + Obake',
                'description' => 'Nikmati pengalaman JFEST lebih lengkap dengan Bundling Tiket JFEST + Obake!',
                'image_url' => 'https://bucket.jfestbali.id/images/bundling_1.webp',
                'date' => Carbon::create(2025, 10, 18),
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
                'image_url' => 'https://ik.imagekit.io/539r3iqyt/JFEST9/Cos%20comp.webp?updatedAt=1750777164829',
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
                'image_url' => 'https://ik.imagekit.io/539r3iqyt/JFEST9/Cos%20comp.webp?updatedAt=1750777164829',
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
                'image_url' => 'https://ik.imagekit.io/539r3iqyt/JFEST9/Seiyuu_.webp?updatedAt=1750777164839',
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
                'image_url' => 'https://ik.imagekit.io/539r3iqyt/JFEST9/Kana%20Takai.webp?updatedAt=1750777164904',
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
                'image_url' => 'https://ik.imagekit.io/539r3iqyt/JFEST9/Original%20Character_.webp?updatedAt=1750777164779',
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
                'image_url' => 'https://ik.imagekit.io/539r3iqyt/JFEST9/Photography_.webp?updatedAt=1750777164355',
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
                'image_url' => 'https://ik.imagekit.io/539r3iqyt/JFEST9/Coswalk_.webp?updatedAt=1750777164587',
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
                'image_url' => 'https://ik.imagekit.io/539r3iqyt/JFEST9/Cos%20comp.webp?updatedAt=1750777164829',
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
                'image_url' => 'https://ik.imagekit.io/539r3iqyt/JFEST9/Pidato.webp?updatedAt=1750777164761',
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
