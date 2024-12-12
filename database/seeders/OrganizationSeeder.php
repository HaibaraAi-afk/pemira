<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $bem = Organization::query()->create([
        //     "name" => "BEM",
        //     "logo" => "/organizations/bem.jpg",
        //     "ordering" => 1,
        // ]);

        // $bem->groups()->create([
        //     "name" => "Ketua & Wakil Ketua",
        //     "ordering" => 1,
        // ])->candidates()->createMany([
        //     [
        //         "organization_id" => $bem->id,
        //         "name_1" => "Candidate 1A",
        //         "name_2" => "Candidate 1B",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        //     [
        //         "organization_id" => $bem->id,
        //         "name_1" => "Candidate 2A",
        //         "name_2" => "Candidate 2B",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        //     [
        //         "organization_id" => $bem->id,
        //         "name_1" => "Candidate 3A",
        //         "name_2" => "Candidate 3B",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ]
        // ]);

        // $blj = Organization::query()->create([
        //     "name" => "BLM",
        //     "logo" => "/organizations/blj.jpg",
        //     "ordering" => 2,
        // ]);

        // $blj->groups()->create([
        //     "name" => "BLM Informatika",
        //     "major" => 10,
        //     "ordering" => 1,
        // ])->candidates()->createMany([
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 1",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 2",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 3",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        // ]);

        // $blj->groups()->create([
        //     "name" => "BLM Sistem Informasi",
        //     "major" => 20,
        //     "ordering" => 1,
        // ])->candidates()->createMany([
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 1",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 2",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 3",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        // ]);

        // $blj->groups()->create([
        //     "name" => "BLM Sains Data",
        //     "major" => 30,
        //     "ordering" => 1,
        // ])->candidates()->createMany([
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 1",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 2",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 3",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        // ]);

        // $blj->groups()->create([
        //     "name" => "BLM Bisnis Digital",
        //     "major" => 40,
        //     "ordering" => 1,
        // ])->candidates()->createMany([
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 1",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 2",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 3",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        // ]);

        // $createGroups = function (Organization $organization) {
        //     $organization->groups()->create([
        //         "name" => "BLJ 2024",
        //         "year" => 24,
        //         "major" => $organization->major,
        //         "ordering" => 1,
        //     ])->candidates()->createMany([
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 1",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ],
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 2",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ],
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 3",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ]
        //     ]);

        //     $organization->groups()->create([
        //         "name" => "BLJ 2023",
        //         "year" => 23,
        //         "major" => $organization->major,
        //         "ordering" => 1,
        //     ])->candidates()->createMany([
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 1",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ],
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 2",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ],
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 3",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ]
        //     ]);

        //     $organization->groups()->create([
        //         "name" => "BLJ 2022",
        //         "year" => 22,
        //         "major" => $organization->major,
        //         "ordering" => 1,
        //     ])->candidates()->createMany([
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 1",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ],
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 2",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ],
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 3",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ]
        //     ]);

        //     $organization->groups()->create([
        //         "name" => "Ketua & Wakil Ketua",
        //         "major" => $organization->major,
        //         "ordering" => 2,
        //     ])->candidates()->createMany([
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 1A",
        //             "name_2" => "Candidate 1B",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ],
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 2A",
        //             "name_2" => "Candidate 2B",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ],
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 3A",
        //             "name_2" => "Candidate 3B",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ]
        //     ]);
        // };

        // $if = Organization::query()->create([
        //     "name" => "HIMATIFA",
        //     "major" => 10,
        //     "logo" => "/organizations/himatifa.jpg",
        //     "ordering" => 3,
        // ]);
        // $createGroups($if);

        // $sifo = Organization::query()->create([
        //     "name" => "HIMASIFO",
        //     "major" => 20,
        //     "logo" => "/organizations/himasifo.jpg",
        //     "ordering" => 4,
        // ]);
        // $createGroups($sifo);

        $sifo = Organization::query()->create([
            "name" => "HIMASIFO",
            "major" => 20,
            "logo" => "/organizations/himasifo.jpg",
            "ordering" => 4,
        ]);

        // BLJ 2024 HIMASIFO
        $sifo->groups()->create([
            "name" => "BLJ 2024",
            "year" => 24,
            "major" => $sifo->major,
            "ordering" => 1,
        ])->candidates()->createMany([
            [
                "organization_id" => $sifo->id,
                "name_1" => "Najwa Wahida Almaira Kuswono",
                "vision" => "Menjadi Badan Legislatif yang profesional, transparan, dan inovatif dalam mewakili aspirasi mahasiswa, berkomitmen untuk memperjuangkan kepentingan mahasiswa dalam meningkatkan kualitas pendidikan dan kehidupan kampus, serta mengurangi praktik senioritas dalam internal organisasi demi terciptanya lingkungan yang inklusif dan adil bagi seluruh anggota.",
                "mission" => "1. Mengakomodasi aspirasi mahasiswa dengan cara mendengarkan dan menyampaikan kebutuhan serta keluhan mahasiswa kepada pihak yang berwenang di tingkat jurusan maupun universitas.\n2. Meningkatkan komunikasi dan koordinasi antara mahasiswa, pengurus organisasi, dan pihak kampus untuk menciptakan lingkungan yang lebih baik dan kondusif bagi perkembangan mahasiswa.\n3. Menghasilkan kebijakan yang relevan dan berpihak pada mahasiswa melalui proses musyawarah yang transparan dan berdasarkan pada data dan fakta yang akurat.",
                "picture" => "/blj241.jpg",
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Imanuel Felix Yafianto",
                "vision" => "Menjadi anggota BLJ yang profesional serta aspiratif guna bersinergi dalam menciptakan inovasi dan perubahan.",
                "mission" => "1. Menjalankan tugas dan kewajiban sesuai dengan hukum yang berlaku\n2. Menjalankan setiap fungsi secara proaktif.\n3. Melakukan pengawasan terhadap produk hukum yang telah dibuat.\n4. Menjaring aspirasi dan masukan dari KM Sistem Informasi dalam menilai kinerja dari Himpunan Mahasiswa\n5. Membangun komunikasi yang baik dan efektif antara mahasiswa dan dosen sistem informasi untuk memastikan transparansi dalam pengambilan setiap keputusan",
                "picture" => "/blj242.jpg",
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Zahidah Fathia Mardhiah",
                "vision" => "Menjadi delegasi yang aktif dan berintegritas dalam menyuarakan aspirasi mahasiswa Sistem Informasi, serta berkontribusi dalam membentuk program kerja yang mendukung pengembangan akademik dan organisasi mahasiswa.",
                "mission" => "1. Menggalang komunikasi dua arah antara mahasiswa Sistem Informasi dan badan legislatif jurusan untuk memastikan aspirasi tersampaikan dengan baik.\n2. Berkontribusi dalam penyusunan program kerja yang relevan, transparan, dan berdampak positif bagi mahasiswa Sistem Informasi secara khusus dan civitas akademika secara umum.\n3. Mendorong inisiatif program legislasi yang mendukung pengembangan akademik, kreativitas, dan kompetensi mahasiswa.\n4. Menjunjung tinggi nilai-nilai integritas, profesionalitas, dan tanggung jawab sebagai delegasi badan legislatif jurusan.",
                "picture" => "/blj243.jpg",
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Achmad Atfal Jaya Rafliansyah",
                "vision" => "Mewujudkan himpunan mahasiswa yang inklusif, transparan, dan berorientasi pada aspirasi.",
                "mission" => "1. Menampung dan menyampaikan aspirasi mahasiswa dengan efektif.\n2. Meningkatkan transparansi dan akuntabilitas dalam kebijakan.\n3. Membangun kolaborasi internal dan eksternal yang strategis.\n4. Menciptakan lingkungan inklusif bagi semua anggota Badan Legislatif Jurusan HIMASIFO.",
                "picture" => "/blj244.jpg",
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Evan Putra Pratama",
                "vision" => "Mewujudkan Badan Legislatif Jurusan transparan, dan progresif dalam memperjuangkan aspirasi mahasiswa serta mengawasi segala kegiatan dan program agar mendukung terciptanya kebijakan yang berfokus pada pengembangan akademik, organisasi, dan kesejahteraan mahasiswa sehingga terlaksanakannya Tri Dharma perguruan tinggi dalam lingkup KM SIFO.",
                "mission" => "1. Mendengar dan menyuarakan aspirasi mahasiswa untuk mendorong pembuatan kebijakan yang dibutuhkan oleh mahasiswa, dan menciptakan kanal komunikasi guna menjembatani antara pembuat kebijakan dan mahasiswa.\n2. Meningkatkan transparansi dan akuntabilitas kinerja BLJ dan melibatkan mahasiswa dalam mengawasi kegiatan serta program kerja yang dilaksanakan baik melalui sosial media ataupun langsung.\n3. Mendukung pengembangan potensi mahasiswa melalui pengawasan program kerja, serta membuat usulan program kerja yang sehingga dapat sesuai dengan fungsi organisasi sebagai wadah untuk membantu mahasiswa dalam mengembangkan potensinya.\n4. memastikan kebijakan yang berlaku sesuai dengan apa yang dibutuhkan mahasiswa dan tidak dibuat atas keinginan pribadi.\n5. memastikan organisasi tetap teguh dan melaksanakan visi dan misi yang telah ditentukannya dan memberikan saran ataupun teguran apabila gagal dalam memenuhi dan melaksanakan visi dan misinya.\n6. memastikan semua kegiatan yang dilakukan telah berhasil memenuhi Tri Dharma perguruan tinggi",
                "picture" => "/blj245.jpg",
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Hafizh Akmal Rabbani",
                "vision" => "Menjadikan Jurusan Sistem Informasi 2024 sebagai wadah yang inovatif, sinergis dan kolaboratif, dalam mewujudkan keadilan dan kemajuan bagi KM Himasifo",
                "mission" => "1. Pengawasan terhadap Himasifo agar meningkatkan sinergi dan kinerja bersama untuk mencapai tujuan yang telah ditetapkan\n2. Menyerap dan menyampaikan aspirasi secara aktif melalui forum dan komunikasi terbuka untuk mendapatkan keadilan dan kemajuan bersama secara kolaboratif bagi KM Himasifo.\n3. Menyusun regulasi yang adil, inovatif, dan sesuai dengan identitas KM Himasifo untuk mendukung pertumbuhan dan pengembangan anggota. KM Himasifo.\n4. Mengevaluasi Kinerja Himasifo untuk meningkatkan kualitas yang baik dan terarah ke depannya",
                "picture" => "/blj246.jpg",
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Digta Rifky Afada",
                "vision" => "Terwujudnya badan legislatif jurusan sebagai badan yang mandiri, dipercaya, adil dalam menjalankan setiap wewenang.",
                "mission" => "1. Menjalankan fungsi legislatif dengan penuh\n2. Menciptakan alur koordinasi yang efektif dan efisien untuk setiap keanggotaan\n3. Menegakkan dan bertanggung jawab penuh pada setiap fungsi dengan profesional dan objektif.\n4. Melakukan peninjauan undang undang yang telah ditetapkan, untuk tetap menjaga relevansi pada masa kini.",
                "picture" => "/blj247.jpg",
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Helen Risky Dwi Wahyuni",
                "vision" => "Menjadi perwakilan mahasiswa jurusan yang transparan dan solutif dalam mewujudkan lingkungan akademik dan non akademik yang berkualitas",
                "mission" => "1. Menghimpun dan menyampaikan aspirasi mahasiswa melalui forum rutin dan platform digital.\n2. Meningkatkan kualitas pembelajaran melalui seminar, pelatihan, dan kolaborasi dengan dosen serta alumni.\n3. Mendukung kegiatan non-akademik dengan memfasilitasi kebutuhan mahasiswa di bidang seni, olahraga, dan organisasi.\n4. Menjamin transparansi dalam pengelolaan program kerja dan anggaran.\n5. Membangun solidaritas melalui kegiatan yang mempererat hubungan antarangkatan.",
                "picture" => "/blj248.jpg",
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Hugo Gario Putra",
                "vision" => "Menjadi penghubung inspiratif antara mahasiswa Sistem Informasi dengan BLJ, menciptakan ruang aspirasi yang inklusif, kolaboratif, dan solutif.",
                "mission" => "1. Membuka ruang diskusi aktif agar mahasiswa mudah menyampaikan aspirasi.\n2. Menyampaikan aspirasi mahasiswa secara transparan dan memastikan hasilnya dapat diakses oleh semua pihak.\n3. Mengawasi jalannya organisasi jurusan, terutama HIMA, agar bekerja transparan, akuntabel, dan sesuai fungsi utamanya.",
                "picture" => "/blj249.jpg",
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Filippo Dafa Yudistira",
                "vision" => "Mewujudkan jurusan yang berdaya saing tinggi dengan menciptakan lingkungan akademik yang inovatif dan kolaboratif.",
                "mission" => "1. Mewakili Suara Mahasiswa: Menjadi jembatan antara mahasiswa dan pihak jurusan dengan mendengarkan aspirasi, keluhan, dan ide-ide dari seluruh mahasiswa untuk menciptakan kebijakan yang lebih baik.\n2. Meningkatkan Keterlibatan Mahasiswa: Mengadakan berbagai kegiatan dan program yang dapat meningkatkan partisipasi mahasiswa dalam kegiatan akademik dan non-akademik, serta memperkuat rasa kebersamaan di antara mahasiswa.\n3. Mendorong Inovasi dan Kreativitas: Mengembangkan program yang mendukung inovasi dan kreativitas mahasiswa, seperti kompetisi, seminar, dan workshop yang relevan dengan bidang studi.",
                "picture" => "/blj2410.jpg"
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Muhammad Devan Fahredy",
                "vision" => "Mewujudkan kampus yang dinamis, inklusif, dan responsif terhadap kebutuhan mahasiswa, melalui kebijakan yang memperjuangkan hak, kepentingan, dan kesejahteraan seluruh civitas akademika.",
                "mission" => "1. Melindungi hak mahasiswa\n2. Menampung dan menyalurkan aspirasi mahasiswa\n3. Menjaga keadilan dan inklusivitas\n4. Meningkatkan komunikasi.",
                "picture" => "/blj2411.jpg"
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Findo Rizhanta",
                "vision" => "Mewujudkan KM Sifo yang Berkembang, Demokratis, dan Berdaya Saing tinggi melalui Aspirasi Mahasiswa yang mengikuti kemajuan inovasi sekarang.",
                "mission" => "1. Melakukan Pengawasan Terhadap Proker Himasifo\n2. Mampu Mengawasi Transparasi perputaran dana yang dikelola himasifo\n3. Memastikan kualitas pengembangan dan sosialisasi masyarakat yang dapat bersaing dengan lainya\n4. Mengawasi jalanya aturan yang sudah ditetapkan untuk Himasifo beserta prosedurnya\n5. Memberi Saran secara demokratis untuk memajukan kinerja Himasifo.",
                "picture" => "/blj2412.jpg"
            ]
        ]);

        // BLJ 2023 HIMASIFO
        $sifo->groups()->create([
            "name" => "BLJ 2023",
            "year" => 23,
            "major" => $sifo->major,
            "ordering" => 1,
        ])->candidates()->createMany([
            [
                "organization_id" => $sifo->id,
                "name_1" => "Arnoldy Mahesa Riadhino",
                "vision" => "Meningkatkan kualitas SDM KM SIFO",
                "mission" => "1. Menjadi wadah aspirasi dan contoh yang baik bagi KM SIFO",
                "picture" => "/blj231.jpg",
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Zaky Dextra Daufa",
                "vision" => "Mewujudkan badan legislatif jurusan yang transparan, responsif, dan inovatif dalam memperjuangkan aspirasi mahasiswa serta mendukung terciptanya lingkungan akademik yang progresif dan inklusif.",
                "mission" => "1. Menyerap Aspirasi Mahasiswa Menjadi jembatan yang efektif antara mahasiswa dan pihak jurusan melalui forum diskusi terbuka dan survei berkala.\n2. Mewujudkan Transparansi dan Akuntabilitas Mengelola setiap kebijakan dan kegiatan dengan prinsip keterbukaan, dilengkapi laporan berkala yang mudah diakses oleh seluruh mahasiswa.\n3. Mendorong Inovasi dan Kreativitas Mendukung program-program pengembangan diri mahasiswa yang sejalan dengan kebutuhan akademik dan profesional.\n4. Memperkuat Kolaborasi Membina hubungan yang harmonis dengan organisasi mahasiswa lain untuk menciptakan ekosistem kampus yang solid dan sinergis.\n5. Menjamin Keberlanjutan Program Menyusun program kerja yang berorientasi pada manfaat jangka panjang untuk kepentingan mahasiswa jurusan.",
                "picture" => "/blj232.jpg",
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Zikhaila Diva Priamita",
                "vision" => "Mewujudkan Badan Legislatif Jurusan yang transparan, aspiratif, dan progresif dalam memperjuangkan hak dan kepentingan mahasiswa agar menciptakan lingkungan akademik yang inklusif, inovatif, dan berintegritas",
                "mission" => "1. Menjadi penyambung suara mahasiswa kepada jurusan.\n2. Mengawasi jalannya kebijakan agar sesuai dengan kebutuhan mahasiswa.\n3. Menciptakan lingkungan yang mendukung kegiatan akademik dan non-akademik.",
                "picture" => "/blj233.jpg",
            ]
        ]);

        // BLJ 2022 HIMASIFO
        $sifo->groups()->create([
            "name" => "BLJ 2022",
            "year" => 22,
            "major" => $sifo->major,
            "ordering" => 1,
        ])->candidates()->createMany([
            [
                "organization_id" => $sifo->id,
                "name_1" => "Putri Nurul Hidayati",
                "vision" => "Terwujudnya BLJ sebagai lembaga legislatif yang profesional, aktif, aspiratif, intelektual, dan inofatif yang berdasarkan kekeluargaan dalam melaksanakan tugas dan melayani keluarga mahasiswa.",
                "mission" => "1. Menumbuh kembangkan rasa solidaritas persaudaraan dan kekeluargaan KM SIFO.\n2. Memperkuat komunikasi dan kedekatan kelembagaan Badan Legislatif Jurusan sebagai representasi mahasiswa.\n3. Mengoptimalkan peran dan fungsi legislasi, pengawasan, dan anggaran dalam lingkup SIFO.",
                "picture" => "/blj221.jpg",
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Bagus Adi Suryaputra",
                "vision" => "Menjadikan Organisasi BLJ sebagai Ormawa garda penggerak organisasi yang komunikatif, solutif, dan berintegritas dalam mengawasi serta mendukung keberhasilan program kerja himpunan mahasiswa sistem informasi secara menyeluruh.",
                "mission" => "1. Menguatkan Komunikasi dan Transparansi Internal Membangun hubungan intensif dengan setiap departemen melalui koordinasi rutin serta menjamin transparansi informasi dalam pengawasan program kerja sejak tahap persiapan hingga evaluasi pasca acara.\n2. Menjadi Mitra Kolaboratif yang Solutif Tidak hanya berperan sebagai pengawas, tetapi juga aktif memberikan solusi atas kendala yang dihadapi setiap departemen untuk mendukung pencapaian tujuan bersama.\n3. Meningkatkan Kualitas Pengawasan Melanjutkan penugasan anggota BLJ secara proporsional untuk berperan langsung dalam monitoring kegiatan setiap departemen dengan pendekatan yang konstruktif.\n4. Mengutamakan Profesionalisme Mengedepankan sikap profesional dalam setiap proses pengawasan, dengan fokus pada solusi konkret daripada mencari kesalahan.",
                "picture" => "/blj222.jpg",
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Kevin Joy Nasserino",
                "vision" => "Mewujudkan BLJ sebagai lembaga yang profesional, aktif, aspiratif, dan inovatif dengan asas kekeluargaan dalam melaksanakan tugas dan melayani mahasiswa",
                "mission" => "1. Mengoptimalkan fungsi legislasi, pengawasan, dan pemeriksaan dalam lingkup KM SIFO\n2. Meningkatkan loyalitas dan solidaritas anggota BLJ SIFO\n3. Meningkatkan komunikasi dan relasi antar lembaga dan mahasiswa\n4. Menumbuhkan rasa kekeluargaan dan persaudaraan.",
                "picture" => "/blj223.jpg",
            ]
        ]);

        $sifo->groups()->create([
            "name" => "Ketua & Wakil Ketua",
            "major" => $sifo->major,
            "ordering" => 2,
        ])->candidates()->createMany([
            [
                "organization_id" => $sifo->id,
                "name_1" => "Jonatan Risa Siswanto",
                "name_2" => "Helbi Iswantono",
                "vision" => "Mewujudkan HIMASIFO yang ekspresif, inovatif, dan kolaboratif dengan menampilkan aksi nyata dari KM untuk KM.",
                "mission" => "1. Mengembangkan internal Himasifo menjadi organisasi yang progresif dan Visioner.\n2. Meningkatkan harmoni antara pencapaian akademik dan non-akademik KM Sifo.\n3. Memperluas jejaring dengan industri dan alumni untuk mendukung KM SIFO mendapatkan pengalaman dan peluang kerja.\n4. Mengaplikasikan teknologi secara kolaboratif dengan kontribusi sosial melalui program pengabdian masyarakat yang selaras dengan bidang keilmuan Sistem Informasi.",
                "picture" => "/kahima1.jpg",
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Tahta Karisma Tiwi Shine Prameswari",
                "name_2" => "Ahmad Faiq Shalahuddin Wafa",
                "vision" => "Memperkuat profesionalisme, kekeluargaan dan komitmen Himasifo untuk memberikan kontribusi nyata bagi KM Sifo dan lingkungan sekitar",
                "mission" => "1. Mewujudkan internal himasifo yang solid kuat dengan menciptakan budaya inklusif, adaptif, dan progressif\n2. Mengembangkan aspek himasifo yang profesional dan berintegritas melalui penguatan organisasi, peningkatan kompetensi, dan penerapan tata kelola yang transparan.\n3. Mengoptimalkan peran Himasifo sebagai wadah yang mendukung aspirasi dan pengembangan KM Sifo, baik dalam akademik maupun non-akademik.\n4. Memperkuat jejaring kolaboratif dengan KM Sifo, alumni, civitas akademika, masyrakat luar, dan stakeholder lainnya untuk menciptakan dampak positif yang berkelanjutan.",
                "picture" => "/kahima2.jpg",
            ]
        ]);
    }
}
