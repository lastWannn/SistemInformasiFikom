<?php $title = 'Import Jadwal Kuliah';
$adminLayout = true; ?>
<?php include APP_PATH . '/views/layouts/header.php'; ?>

<div class="antialiased bg-[#131218] min-h-screen">
    <?php include APP_PATH . '/views/layouts/sidebar.php'; ?>

    <main class="p-4 sm:ml-64 pt-8 transition-all duration-300">
        <div class="max-w-4xl mx-auto">

            <div class="flex items-center gap-4 mb-8">
                <a href="<?= url('/admin/schedules') ?>"
                    class="w-10 h-10 flex items-center justify-center rounded-xl bg-[#1c1b22] border border-white/10 text-slate-400 hover:text-primary-600 shadow-sm transition-all">
                    <i class="bi bi-arrow-left text-lg"></i>
                </a>
                <div>
                    <h1 class="text-2xl font-bold text-white">Import Jadwal Kuliah</h1>
                    <p class="text-slate-400 text-sm mt-1">Generate jadwal semester otomatis dari file Excel.</p>
                </div>
            </div>

            <?php displayFlash(); ?>

            <?php if (isset($_SESSION['import_report'])): ?>
            <?php $report = $_SESSION['import_report'];
                unset($_SESSION['import_report']); ?>

            <div class="mb-8 animate-fade-in-down">
                <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-4 mb-4 flex items-center gap-3">
                    <div
                        class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-600">
                        <i class="bi bi-check-lg text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-emerald-800">Import Selesai</h4>
                        <p class="text-emerald-600 text-sm">Berhasil mengimpor
                            <strong><?= $report['success'] ?></strong> jadwal mata kuliah.
                        </p>
                    </div>
                </div>

                <?php if (!empty($report['errors'])): ?>
                <div class="bg-[#1c1b22] border border-rose-200 rounded-xl shadow-sm overflow-hidden">
                    <div class="bg-rose-50 px-6 py-4 border-b border-rose-100 flex items-center justify-between">
                        <h3 class="font-bold text-rose-800 flex items-center gap-2">
                            <i class="bi bi-exclamation-octagon-fill"></i> Laporan Kegagalan & Konflik
                        </h3>
                        <span
                            class="bg-rose-100 text-rose-700 text-xs font-bold px-2 py-1 rounded-full"><?= count($report['errors']) ?>
                            Isu</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-[#131218] text-slate-400 border-b border-white/10">
                                <tr>
                                    <th class="px-6 py-3 w-20">Baris</th>
                                    <th class="px-6 py-3 w-1/3">Mata Kuliah</th>
                                    <th class="px-6 py-3">Penyebab Gagal / Konflik</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <?php foreach ($report['errors'] as $err): ?>
                                <tr class="hover:bg-[#131218]">
                                    <td class="px-6 py-3 font-bold text-slate-400">#<?= $err['row'] ?></td>
                                    <td class="px-6 py-3 font-medium text-slate-200">
                                        <?= htmlspecialchars($err['course']) ?></td>
                                    <td class="px-6 py-3 text-rose-600"><?= $err['reason'] ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <hr class="border-white/10 my-8">
            <?php endif; ?>
            <div class="bg-[#1c1b22] rounded-2xl shadow-sm border border-white/10 p-8">
                <form action="<?= url('/admin/schedules/import') ?>" method="POST" enctype="multipart/form-data">

                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-bold text-slate-300">File Jadwal (Excel/CSV)</label>
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-48 border-2 border-slate-300 border-dashed rounded-2xl cursor-pointer bg-[#131218] hover:bg-white/10 transition-all">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <i class="bi bi-calendar-range text-4xl text-slate-400 mb-3"></i>
                                <p class="mb-2 text-sm text-slate-400"><span class="font-semibold">Klik upload</span>
                                    atau drag file</p>
                                <p id="filename" class="text-xs text-slate-400">Support: .xlsx, .xls, .csv</p>
                            </div>
                            <input id="dropzone-file" name="file" type="file" class="hidden" accept=".csv, .xlsx, .xls"
                                onchange="document.getElementById('filename').innerText = this.files[0].name"
                                required />
                        </label>
                    </div>

                    <div
                        class="bg-amber-50 border border-amber-100 rounded-xl p-4 mb-8 text-xs text-amber-800 space-y-2">
                        <p class="font-bold"><i class="bi bi-exclamation-triangle-fill mr-1"></i> Penting:</p>
                        <ul class="list-disc list-inside ml-1 space-y-1">
                            <li>Pastikan nama <strong>Laboratorium</strong> sama persis dengan database.</li>
                            <li>Sistem akan mendeteksi <strong>Bentrok Waktu</strong> secara otomatis.</li>
                            <li>Format Tanggal Excel: <code>YYYY-MM-DD</code>.</li>
                        </ul>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                            class="flex-1 bg-primary-600 hover:bg-primary-700 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-primary-500/30 transition-all">
                            <i class="bi bi-magic mr-2"></i> Generate Jadwal Otomatis
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </main>
</div>
<?php include APP_PATH . '/views/admin/layouts/footer.php'; ?>