<?php $title = 'Manajemen Jadwal (Master)'; ?>
<?php include APP_PATH . '/views/layouts/header.php'; ?>

<div class="antialiased bg-transparent min-h-screen">
    <?php include APP_PATH . '/views/layouts/sidebar.php'; ?>

    <main class="p-4 sm:ml-64 pt-8 transition-all duration-300">
        <div class="max-w-7xl mx-auto">

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-white">Data Mata Kuliah Praktikum</h1>
                    <p class="text-slate-400 text-sm mt-1">
                        Daftar induk jadwal. Klik <strong>"Lihat Sesi"</strong> untuk melihat rincian tanggal per
                        pertemuan.
                    </p>
                </div>

                <div class="flex gap-2">
                    <a href="<?= url('/admin/schedules/import') ?>"
                        class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-[#131218] text-sm font-bold px-4 py-2.5 rounded-xl shadow-sm transition-all">
                        <i class="bi bi-file-earmark-spreadsheet"></i>
                        <span class="hidden sm:inline">Import</span>
                    </a>

                    <a href="<?= url('/admin/schedules/export') ?>"
                        class="inline-flex items-center gap-2 bg-[#1c1b22] border border-white/10 text-slate-400 hover:bg-white/5 hover:text-white text-sm font-medium px-4 py-2.5 rounded-xl shadow-sm transition-all">
                        <i class="bi bi-download"></i>
                        <span class="hidden sm:inline">Export</span>
                    </a>

                    <a href="<?= url('/admin/schedules/create') ?>"
                        class="inline-flex items-center gap-2 bg-primary-500 hover:bg-primary-600 text-[#131218] text-sm font-bold px-5 py-2.5 rounded-xl shadow-lg shadow-primary-500/30 transition-all">
                        <i class="bi bi-plus-lg"></i>
                        <span>Buat Jadwal</span>
                    </a>
                </div>
            </div>

            <?php displayFlash(); ?>

            <div class="bg-[#1c1b22] p-4 rounded-2xl shadow-sm border border-white/10 mb-6">
                <form method="GET" action="<?= url('/admin/schedules') ?>" class="flex gap-4">
                    <div class="relative flex-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="bi bi-search text-slate-400"></i>
                        </div>
                        <input type="text" name="search" value="<?= e($filters['search'] ?? '') ?>"
                            class="block w-full p-2.5 pl-10 text-sm text-white border border-white/10 rounded-lg bg-[#131218] focus:ring-primary-500/20 focus:border-primary-500 placeholder-slate-500"
                            placeholder="Cari Mata Kuliah, Dosen, atau Kode Kelas...">
                    </div>
                    <button type="submit"
                        class="text-[#131218] bg-primary-500 hover:bg-primary-600 font-bold rounded-lg text-sm px-5 py-2.5">
                        Cari
                    </button>
                </form>
            </div>

            <div class="bg-[#1c1b22] border border-white/10 rounded-2xl shadow-sm overflow-hidden flex flex-col">
                <div class="overflow-x-auto w-full">
                    <table class="w-full text-sm text-left text-slate-400">
                        <thead class="text-xs text-slate-400 uppercase bg-white/5 border-b border-white/10">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-bold w-[30%]">Mata Kuliah & Kelas</th>
                                <th scope="col" class="px-6 py-4 font-bold w-[20%]">Laboratorium</th>
                                <th scope="col" class="px-6 py-4 font-bold w-[20%]">Jadwal Dasar</th>
                                <th scope="col" class="px-6 py-4 font-bold w-[15%]">Total Sesi</th>
                                <th scope="col" class="px-6 py-4 font-bold text-right w-[15%]">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            <?php if (!empty($schedules)): ?>
                            <?php foreach ($schedules as $sched): ?>
                            <?php
                                    // Helper Hari Indo
                                    $daysMap = ['Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu', 'Sunday' => 'Minggu'];
                                    $dayIndo = $daysMap[$sched['day']] ?? $sched['day'];

                                    // Avatar Logic (Dosen)
                                    $lecName = $sched['lecturer_name'];
                                    $lecPhoto = !empty($sched['lecturer_photo'])
                                        ? $sched['lecturer_photo']
                                        : 'https://ui-avatars.com/api/?name=' . urlencode($lecName) . '&background=random&size=64';
                                    ?>
                            <tr class="group hover:bg-white/5 transition-colors duration-200">

                                <td class="px-6 py-4 align-top">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-white text-base mb-1">
                                            <?= e($sched['course_name']) ?>
                                        </span>
                                        <div class="flex flex-wrap gap-2 mb-2">
                                            <span
                                                class="bg-blue-500/10 text-blue-400 text-[10px] px-2 py-0.5 rounded border border-blue-500/20 font-bold uppercase">
                                                <?= e($sched['class_code']) ?>
                                            </span>
                                            <span
                                                class="bg-[#131218] text-slate-400 text-[10px] px-2 py-0.5 rounded border border-white/10">
                                                Sem. <?= e($sched['semester']) ?>
                                            </span>
                                        </div>

                                        <div class="flex items-center gap-2 mt-1">
                                            <img src="<?= $lecPhoto ?>" alt="Dosen"
                                                class="w-6 h-6 rounded-full object-cover border border-white/10">
                                            <span class="text-xs text-slate-400 font-medium">
                                                <?= e($lecName) ?>
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 align-top">
                                    <div
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#131218] text-slate-400 border border-white/10 text-xs font-bold">
                                        <i class="bi bi-geo-alt-fill text-slate-400"></i>
                                        <?= e($sched['lab_name']) ?>
                                    </div>
                                </td>

                                <td class="px-6 py-4 align-top">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-bold text-white flex items-center gap-2">
                                            <i class="bi bi-calendar-week text-slate-400"></i>
                                            <?= $dayIndo ?>
                                        </span>
                                        <span
                                            class="text-xs font-mono bg-[#131218] px-2 py-1 rounded border border-white/10 mt-1 w-fit text-slate-400">
                                            <?= date('H:i', strtotime($sched['start_time'])) ?> -
                                            <?= date('H:i', strtotime($sched['end_time'])) ?>
                                        </span>
                                    </div>
                                </td>

                                <td class="px-6 py-4 align-top">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-full bg-primary-500/10 text-primary-400 flex items-center justify-center font-bold text-sm border border-primary-500/20">
                                            <?= $sched['total_generated'] ?>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-xs font-bold text-white">Pertemuan</span>
                                            <span class="text-[10px] text-slate-400">Terjadwal</span>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-right align-middle">
                                    <div class="flex flex-col gap-2 items-end">
                                        <a href="<?= url('/admin/schedules/' . $sched['id'] . '/sessions') ?>"
                                            class="inline-flex items-center gap-2 text-xs font-bold text-primary-400 hover:text-primary-300 bg-primary-500/10 hover:bg-primary-500/20 px-3 py-2 rounded-lg border border-primary-500/20 transition-all w-fit shadow-sm">
                                            <i class="bi bi-calendar-range"></i> Lihat Sesi
                                        </a>

                                        <div class="flex gap-2">
                                            <a href="<?= url('/admin/schedules/' . $sched['id'] . '/edit') ?>"
                                                class="w-8 h-8 flex items-center justify-center rounded-lg text-amber-400 bg-amber-500/10 hover:bg-amber-500/20 border border-transparent hover:border-amber-500/30 transition-all"
                                                title="Edit Master Data">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <form method="POST"
                                                action="<?= url('/admin/schedules/' . $sched['id'] . '/delete') ?>"
                                                onsubmit="return confirm('PERINGATAN: Menghapus data ini akan menghapus SEMUA sesi pertemuan yang terkait. Lanjutkan?');">
                                                <button type="submit"
                                                    class="w-8 h-8 flex items-center justify-center rounded-lg text-rose-400 bg-rose-500/10 hover:bg-rose-500/20 border border-transparent hover:border-rose-500/30 transition-all"
                                                    title="Hapus Semua">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center py-20">
                                    <div
                                        class="w-20 h-20 bg-[#131218] rounded-full flex items-center justify-center text-slate-400 mx-auto mb-4 border border-white/10">
                                        <i class="bi bi-journal-x text-3xl"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold text-white">Belum ada Jadwal</h3>
                                    <p class="text-slate-400 text-sm mt-1">Silakan buat jadwal baru untuk memulainya.
                                    </p>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <?php if ($pagination['total_pages'] > 1): ?>
                <div class="border-t border-white/10 bg-[#131218] px-6 py-4 flex items-center justify-between">
                    <span class="text-sm text-slate-400">
                        Halaman <strong><?= $pagination['current_page'] ?></strong> dari
                        <strong><?= $pagination['total_pages'] ?></strong>
                    </span>

                    <nav aria-label="Page navigation">
                        <ul class="inline-flex -space-x-px text-sm h-8">
                            <li>
                                <a href="<?= url('/admin/schedules') ?>?page=<?= max(1, $pagination['current_page'] - 1) ?>&search=<?= $filters['search'] ?>"
                                    class="flex items-center justify-center px-3 h-8 ml-0 leading-tight text-slate-400 bg-[#1c1b22] border border-white/10 rounded-l-lg hover:bg-white/5 hover:text-white <?= $pagination['current_page'] <= 1 ? 'pointer-events-none opacity-50' : '' ?>">
                                    <i class="bi bi-chevron-left"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?= url('/admin/schedules') ?>?page=<?= min($pagination['total_pages'], $pagination['current_page'] + 1) ?>&search=<?= $filters['search'] ?>"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-slate-400 bg-[#1c1b22] border border-white/10 rounded-r-lg hover:bg-white/5 hover:text-white <?= $pagination['current_page'] >= $pagination['total_pages'] ? 'pointer-events-none opacity-50' : '' ?>">
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
</div>
<?php include APP_PATH . '/views/admin/layouts/footer.php'; ?>