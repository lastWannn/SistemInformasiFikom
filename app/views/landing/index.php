<?php $title = 'Home - FIKOM'; ?>
<?php include APP_PATH . '/views/layouts/header.php'; ?>
<?php include APP_PATH . '/views/layouts/navbar.php'; ?>

<section class="relative bg-white overflow-hidden pt-4 pb-12">
    <div
        class="absolute top-0 right-0 -mr-20 -mt-20 w-[600px] h-[600px] bg-yellow-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob">
    </div>
    <div
        class="absolute top-0 left-0 -ml-20 -mt-20 w-[500px] h-[500px] bg-yellow-50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000">
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <div id="hero-carousel" class="relative w-full" data-carousel="slide" data-carousel-interval="10000">

            <div class="relative h-[650px] md:h-[550px] overflow-hidden rounded-2xl border border-slate-200 shadow-xl">

                <div class="hidden duration-1000 ease-in-out" data-carousel-item="active">
                    <div class="w-full h-full relative">
                        <img src="<?= BASE_URL ?>/assets/images/GEDUNG%20FIKOM%20UMI%20(1)%20(2).jpg" alt="Gedung FIKOM UMI" class="w-full h-full object-cover" onerror="this.src='https://placehold.co/1200x600/FFF8E7/Eab308?text=Hero+Banner+Belum+Diunggah'">
                        
                        <!-- Overlay Gradient & Text -->
                        <div class="absolute inset-0 bg-gradient-to-r from-brand-black/95 via-brand-black/70 to-transparent flex items-center px-6 md:px-16 lg:px-24">
                            <div class="max-w-2xl text-left">
                                <span class="inline-block bg-brand-yellow text-brand-black text-xs md:text-sm font-extrabold px-3 py-1.5 rounded-lg uppercase tracking-wider shadow-sm mb-4">
                                    Fakultas Ilmu Komputer
                                </span>
                                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight mb-4">
                                    FIKOM <span class="text-brand-yellow">UMI</span>
                                </h1>
                                <p class="text-slate-200 text-xs md:text-sm lg:text-base leading-relaxed font-medium">
                                    Perpaduan ilmu pengetahuan dan nilai-nilai keislaman akan membawa Anda pada sebuah pengalaman belajar yang unik, yang dapat Anda temukan di Fakultas Ilmu Komputer. Hal tersebut tentu saja untuk membentuk karakter yang berintegritas, kreatif dan inovatif. Dengan dukungan lingkungan belajar yang kondusif, kembangkan segala potensi yang Anda miliki.
                                </p>
                                <div class="mt-8 flex flex-wrap gap-4">
                                    <a href="#sarana" class="inline-flex items-center justify-center px-5 py-3 text-xs md:text-sm font-bold rounded-xl text-brand-black bg-brand-yellow hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-yellow transition-all shadow-lg hover:scale-105">
                                        Lihat Fasilitas <i class="bi bi-arrow-down-short ml-1 text-lg"></i>
                                    </a>
                                    <a href="<?= url('/schedule') ?>" class="inline-flex items-center justify-center px-5 py-3 border-2 border-white/20 text-xs md:text-sm font-bold rounded-xl text-white hover:bg-white/10 hover:border-white focus:outline-none transition-all hover:scale-105">
                                        Jadwal Kuliah <i class="bi bi-calendar-event ml-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                    <div class="h-full flex flex-col pt-8 px-4 md:px-20">

                        <div class="text-center mb-6">
                            <h2 class="text-xl font-bold text-yellow-600/80 tracking-widest uppercase">JADWAL HARI INI</h2>
                            <div
                                class="mt-2 inline-block bg-brand-yellow text-brand-black px-4 py-1 rounded-full text-sm font-bold shadow-sm">
                                <?= $currentDayName ?>, <?= $currentDate ?>
                            </div>
                        </div>

                        <div
                            class="w-full max-w-5xl mx-auto bg-slate-50 rounded-2xl border border-slate-200 shadow-xl overflow-hidden flex-1 mb-8 relative">
                            <div class="overflow-y-auto h-full absolute inset-0 custom-scrollbar p-2">

                                <div
                                    class="grid grid-cols-12 gap-4 bg-white p-4 rounded-xl mb-3 text-xs font-bold uppercase text-slate-500 sticky top-0 z-10 hidden md:grid border border-slate-200 shadow-sm">
                                    <div class="col-span-2 text-center tracking-wider">Waktu</div>
                                    <div class="col-span-3 tracking-wider pl-2">Mata Kuliah & Ruangan</div>
                                    <div class="col-span-2 text-center tracking-wider">Kelas</div>
                                    <div class="col-span-3 tracking-wider pl-2">Dosen</div>
                                    <div class="col-span-2 text-center tracking-wider">Status</div>
                                </div>

                                <?php if (empty($todaySchedules)): ?>
                                <div class="flex flex-col items-center justify-center h-64 text-slate-400">
                                    <i class="bi bi-calendar-check text-4xl mb-3 opacity-50"></i>
                                    <p class="font-medium">Tidak ada jadwal kuliah hari ini.</p>
                                </div>
                                <?php else: ?>
                                <div class="space-y-3">
                                    <?php foreach ($todaySchedules as $sch): ?>
                                    <div class="schedule-row group bg-white hover:bg-yellow-50/40 transition-all rounded-xl border border-slate-200 border-l-4 border-l-brand-yellow p-4 md:p-4 grid grid-cols-1 md:grid-cols-12 gap-4 items-center shadow-sm"
                                        data-start="<?= $sch['start_time'] ?>" data-end="<?= $sch['end_time'] ?>">

                                        <div
                                            class="md:col-span-2 text-center flex md:block items-center justify-between">
                                            <div class="md:hidden text-xs font-bold text-slate-500 uppercase">Waktu
                                            </div>
                                            <div
                                                class="font-mono font-bold text-brand-black bg-brand-yellow/20 border border-brand-yellow/40 px-3 py-1.5 rounded-lg inline-block shadow-sm">
                                                <?= formatTime($sch['start_time']) ?> -
                                                <?= formatTime($sch['end_time']) ?>
                                            </div>
                                        </div>

                                        <div class="md:col-span-3 pl-2">
                                            <h3 class="font-bold text-brand-black leading-tight text-base mb-1">
                                                <?= e($sch['course_name']) ?>
                                            </h3>
                                            <span class="inline-flex items-center gap-1 text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded border border-emerald-100">
                                                <i class="bi bi-geo-alt-fill text-[8px]"></i> <?= e($sch['lab_name']) ?>
                                            </span>
                                        </div>

                                        <div class="md:col-span-2 text-center flex md:block items-center justify-between">
                                            <div class="md:hidden text-xs font-bold text-slate-500 uppercase">Kelas</div>
                                            <span class="inline-flex items-center gap-1.5 text-xs font-bold text-brand-black bg-brand-yellow/30 px-2.5 py-1 rounded-md border border-brand-yellow/40">
                                                <i class="bi bi-people-fill"></i> <?= e($sch['class_code']) ?>
                                            </span>
                                        </div>

                                        <div class="md:col-span-3 pl-2 flex flex-col justify-center">
                                            <div class="flex items-center gap-3">
                                                <div class="min-w-0">
                                                    <p class="text-sm font-bold text-brand-black truncate leading-snug">
                                                        <?= e($sch['lecturer_name']) ?></p>
                                                    <p
                                                        class="text-[10px] text-slate-500 font-medium uppercase tracking-wide">
                                                        Dosen</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="md:col-span-2 text-center mt-2 md:mt-0 flex justify-between md:block items-center">
                                            <span
                                                class="md:hidden text-xs font-bold text-slate-500 uppercase">Status</span>
                                            <span
                                                class="status-badge px-3 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-500 border border-slate-200 shadow-sm uppercase tracking-wider block w-fit mx-auto">
                                                Menunggu
                                            </span>
                                        </div>

                                    </div>
                                    <?php endforeach; ?>
                                    
                                    <!-- Dynamic Empty State (Jika semua jadwal telah selesai/hidden) -->
                                    <div id="no-upcoming-schedules" class="hidden flex-col items-center justify-center h-64 text-slate-400">
                                        <i class="bi bi-calendar-check text-4xl mb-3 opacity-50"></i>
                                        <p class="font-medium">Jadwal kuliah untuk hari ini telah selesai dilaksanakan.</p>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full bg-white" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white/50" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            </div>
        </div>
    </div>
</section>

<section class="py-12 bg-white border-b border-slate-100">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="text-center text-yellow-600 font-bold tracking-widest text-sm uppercase mb-10">SUMBER DAYA</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div class="group">
                <div
                    class="w-16 h-16 mx-auto bg-yellow-50 rounded-2xl border-2 border-brand-yellow/30 shadow-sm flex items-center justify-center text-yellow-600 mb-4 group-hover:bg-brand-yellow group-hover:text-brand-black group-hover:scale-110 transition-all">
                    <i class="bi bi-mortarboard text-3xl"></i>
                </div>
                <h3 class="text-3xl font-extrabold text-brand-black"><?= $stats['students_count'] ?></h3>
                <p class="text-xs text-slate-500 font-bold uppercase mt-1 tracking-wide">Mahasiswa</p>
            </div>
            <div class="group">
                <div
                    class="w-16 h-16 mx-auto bg-yellow-50 rounded-2xl border-2 border-brand-yellow/30 shadow-sm flex items-center justify-center text-yellow-600 mb-4 group-hover:bg-brand-yellow group-hover:text-brand-black group-hover:scale-110 transition-all">
                    <i class="bi bi-award text-3xl"></i>
                </div>
                <h3 class="text-3xl font-extrabold text-brand-black"><?= $stats['alumni_count'] ?></h3>
                <p class="text-xs text-slate-500 font-bold uppercase mt-1 tracking-wide">Alumni<br><span class="text-[9px] text-slate-400 font-medium normal-case">(2018 - 2023)</span></p>
            </div>
            <div class="group">
                <div
                    class="w-16 h-16 mx-auto bg-yellow-50 rounded-2xl border-2 border-brand-yellow/30 shadow-sm flex items-center justify-center text-yellow-600 mb-4 group-hover:bg-brand-yellow group-hover:text-brand-black group-hover:scale-110 transition-all">
                    <i class="bi bi-person-workspace text-3xl"></i>
                </div>
                <h3 class="text-3xl font-extrabold text-brand-black"><?= $stats['lecturers_count'] ?></h3>
                <p class="text-xs text-slate-500 font-bold uppercase mt-1 tracking-wide">Dosen</p>
            </div>
            <div class="group">
                <div
                    class="w-16 h-16 mx-auto bg-yellow-50 rounded-2xl border-2 border-brand-yellow/30 shadow-sm flex items-center justify-center text-yellow-600 mb-4 group-hover:bg-brand-yellow group-hover:text-brand-black group-hover:scale-110 transition-all">
                    <i class="bi bi-people text-3xl"></i>
                </div>
                <h3 class="text-3xl font-extrabold text-brand-black"><?= $stats['staff_count'] ?></h3>
                <p class="text-xs text-slate-500 font-bold uppercase mt-1 tracking-wide">Staff</p>
            </div>
        </div>
    </div>
</section>

<section id="sarana" class="py-20 bg-white relative overflow-hidden">
    <div class="max-w-6xl mx-auto px-4 relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-yellow-600 font-bold tracking-widest text-sm uppercase mb-2">FASILITAS LABORATORIUM</h2>
            <h2 class="text-3xl md:text-4xl font-extrabold text-brand-black">Sarana Penunjang Praktikum</h2>
        </div>

        <div class="relative">
            <div
                class="absolute left-8 md:left-1/2 top-0 bottom-0 w-1 border-r-4 border-dashed border-brand-yellow/40 transform md:-translate-x-1/2 h-full z-0">
            </div>

            <div class="space-y-24">
                <?php foreach ($labs as $index => $lab): ?>
                <?php
                    $isEven = ($index % 2 == 0);
                    $staticImages = [
                        'assets/images/FOTO%20FIKOM_4.jpg',
                        'assets/images/WORKING%20SPACE_13.png',
                        'assets/images/PUBLIC%20SPACE%20LUAR.jpg',
                        'assets/images/photo1701933053.jpeg'
                    ];
                    $staticImage = $staticImages[$index % count($staticImages)];
                    $bgImage = BASE_URL . '/' . $staticImage;
                    ?>
                <div class="relative flex flex-col md:flex-row items-center justify-between w-full z-10">
                    <div
                        class="absolute left-8 md:left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-white border-4 border-brand-yellow shadow-lg z-20 flex items-center justify-center">
                        <div class="w-3 h-3 bg-brand-black rounded-full"></div>
                    </div>
                    <div
                        class="w-full md:w-[48%] pl-20 md:pl-0 <?= $isEven ? 'md:text-right order-2 md:order-1 pr-0 md:pr-6' : 'order-2 md:order-3 pl-0 md:pl-6' ?>">
                        <h3 class="text-2xl md:text-3xl font-extrabold text-brand-black mb-4"><?= e($lab['lab_name']) ?>
                        </h3>
                        <p class="text-slate-600 leading-relaxed mb-6">
                            <?= e($lab['description'] ?? 'Laboratorium dengan spesifikasi tinggi.') ?></p>
                        <div class="flex items-center gap-4 justify-start <?= $isEven ? 'md:justify-end' : '' ?>">
                            <div class="text-center group">
                                <div
                                    class="w-16 py-2 bg-brand-yellow/20 rounded-t-lg text-xl font-black text-brand-black group-hover:bg-brand-yellow transition-colors">
                                    <?= $lab['pc_count'] ?? 0 ?></div>
                                <div
                                    class="w-16 py-1 bg-slate-100 border-t border-slate-300 rounded-b-lg text-[10px] font-bold text-slate-500 uppercase">
                                    PC</div>
                            </div>
                            <div class="text-center group">
                                <div
                                    class="w-16 py-2 bg-brand-black/10 rounded-t-lg text-xl font-black text-brand-black group-hover:bg-brand-black group-hover:text-brand-yellow transition-colors">
                                    <?= $lab['tv_count'] ?? 0 ?></div>
                                <div
                                    class="w-16 py-1 bg-slate-50 border-t border-slate-200 rounded-b-lg text-[10px] font-bold text-slate-500 uppercase">
                                    LCD</div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="w-full md:w-[48%] pl-20 md:pl-0 mb-6 md:mb-0 <?= $isEven ? 'order-1 md:order-3 pl-0 md:pl-6' : 'order-1 md:order-1 pr-0 md:pr-6' ?>">
                        <div
                            class="relative group rounded-2xl shadow-xl overflow-hidden border-4 border-white transform transition-transform duration-500 hover:scale-[1.02]">
                            <img src="<?= e($bgImage) ?>" alt="<?= e($lab['lab_name']) ?>" loading="lazy"
                                class="w-full h-auto object-cover aspect-video">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section id="activity" class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <a href="<?= url('/activities') ?>" class="block text-center mb-12 group">
            <h2
                class="text-3xl font-bold text-yellow-600 uppercase tracking-wide group-hover:text-yellow-700 transition-colors inline-flex items-center gap-2">
                Kegiatan Terbaru
            </h2>
        </a>

        <div class="grid gap-8 md:grid-cols-3">
            <?php
            $hasActivities = false;
            if (!empty($activities)):
                foreach ($activities as $news):
                    if (($news['status'] ?? 'published') !== 'published') continue;
                    $hasActivities = true;
            ?>
            <article
                class="flex flex-col bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-xl hover:shadow-brand-yellow/10 hover:-translate-y-2 transition-all duration-300 group h-full">
                <a href="<?= url('/activity/' . $news['id']) ?>" class="relative h-56 overflow-hidden block">
                    <?php
                            $imageSrc = 'https://placehold.co/600x400/131218/FFC81A?text=No+Image';
                            if (!empty($news['image_cover'])) {
                                $imageSrc = (strpos($news['image_cover'], 'http') === 0) ? $news['image_cover'] : BASE_URL . $news['image_cover'];
                            }
                            ?>
                    <img src="<?= e($imageSrc) ?>"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700"
                        alt="<?= e($news['title']) ?>" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-60"></div>
                    <div class="absolute top-4 left-4 flex gap-2">
                        <span
                            class="bg-brand-yellow text-brand-black text-[10px] font-bold px-3 py-1.5 rounded-lg uppercase tracking-wider shadow-sm">
                            <?= getActivityTypeLabel($news['activity_type']) ?>
                        </span>
                    </div>
                </a>
                <div class="p-6 flex flex-col flex-1 relative">
                    <div
                        class="absolute -top-5 right-6 bg-brand-black text-brand-yellow text-xs font-bold px-3 py-2 rounded-lg shadow-lg flex flex-col items-center border-2 border-white">
                        <span class="text-lg leading-none"><?= date('d', strtotime($news['activity_date'])) ?></span>
                        <span class="uppercase text-[10px]"><?= date('M', strtotime($news['activity_date'])) ?></span>
                    </div>
                    <div class="mt-2 mb-3">
                        <h3
                            class="text-xl font-bold text-brand-black leading-snug group-hover:text-yellow-600 transition-colors line-clamp-2">
                            <a href="<?= url('/activity/' . $news['id']) ?>"><?= e($news['title']) ?></a>
                        </h3>
                    </div>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6 line-clamp-3 flex-1">
                        <?= e($news['description']) ?></p>
                    <div class="pt-6 border-t border-slate-100 flex items-center justify-between mt-auto">
                        <span class="text-xs text-slate-400 font-medium flex items-center gap-1">
                            <i class="bi bi-clock"></i> <?= date('Y', strtotime($news['activity_date'])) ?>
                        </span>
                        <a href="<?= url('/activity/' . $news['id']) ?>"
                            class="inline-flex items-center text-yellow-600 font-bold text-sm hover:gap-2 gap-1 transition-all group">
                            Baca Selengkapnya<i
                                class="bi bi-arrow-right transition-transform group-hover:translate-x-1"></i>
                        </a>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!$hasActivities): ?>
            <div class="col-span-3 text-center py-10">
                <i class="bi bi-journal-x text-4xl text-slate-300 mb-2 block"></i>
                <p class="text-slate-500">Belum ada kegiatan terbaru.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    function updateScheduleStatus() {
        const now = new Date();
        const currentTime = now.toTimeString().split(' ')[0];
        const rows = document.querySelectorAll('.schedule-row');
        let visibleCount = 0;
        
        rows.forEach(row => {
            const start = row.getAttribute('data-start');
            const end = row.getAttribute('data-end');
            const badge = row.querySelector('.status-badge');
            
            if (currentTime >= start && currentTime <= end) {
                row.style.setProperty('display', 'grid', 'important');
                row.classList.add('bg-blue-50/50', 'border-l-4', 'border-l-blue-500');
                if (badge) {
                    badge.className =
                        'status-badge px-3 py-1 rounded-full text-[10px] font-bold bg-blue-100 text-blue-700 animate-pulse border border-blue-200 uppercase tracking-wider block w-fit mx-auto';
                    badge.innerHTML = '<i class="bi bi-record-circle-fill mr-1"></i> Berlangsung';
                }
                visibleCount++;
            } else if (currentTime > end) {
                // Hide completely
                row.style.setProperty('display', 'none', 'important');
            } else {
                row.style.setProperty('display', 'grid', 'important');
                row.classList.remove('bg-blue-50/50', 'border-l-4', 'border-l-blue-500');
                if (badge) {
                    badge.className =
                        'status-badge px-3 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-500 border border-slate-200 shadow-sm uppercase tracking-wider block w-fit mx-auto';
                    badge.textContent = 'Menunggu';
                }
                visibleCount++;
            }
        });
        
        const emptyState = document.getElementById('no-upcoming-schedules');
        if (emptyState) {
            if (visibleCount === 0 && rows.length > 0) {
                emptyState.classList.remove('hidden');
                emptyState.classList.add('flex');
            } else {
                emptyState.classList.add('hidden');
                emptyState.classList.remove('flex');
            }
        }
    }
    updateScheduleStatus();
    setInterval(updateScheduleStatus, 15000); // Check status every 15 seconds
});
</script>

<?php include APP_PATH . '/views/layouts/footer.php'; ?>