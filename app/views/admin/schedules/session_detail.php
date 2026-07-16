<?php $title = 'Detail Sesi Pertemuan'; ?>
<?php include APP_PATH . '/views/layouts/header.php'; ?>

<div class="antialiased bg-[#131218] min-h-screen">
    <?php include APP_PATH . '/views/layouts/sidebar.php'; ?>

    <main class="p-4 sm:ml-64 pt-8 transition-all duration-300">
        <div class="max-w-4xl mx-auto">

            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                <a href="<?= url('/admin/schedules/' . $session['course_plan_id'] . '/sessions') ?>"
                    class="group inline-flex items-center gap-2 text-slate-400 hover:text-primary-600 transition-colors">
                    <div
                        class="w-8 h-8 rounded-full bg-[#1c1b22] border border-white/10 flex items-center justify-center shadow-sm group-hover:border-primary-200 transition-all">
                        <i class="bi bi-arrow-left text-sm"></i>
                    </div>
                    <span class="font-medium text-sm">Kembali ke Daftar Sesi</span>
                </a>

                <?php
                $dateObj = new DateTime($session['session_date']);
                $isPast = $dateObj < new DateTime('today');
                $statusLabel = $isPast ? 'Selesai' : 'Terjadwal';
                $statusClass = $isPast ? 'bg-slate-100 text-slate-400 border-white/10' : 'bg-emerald-100 text-emerald-700 border-emerald-200';
                ?>
                <div
                    class="px-3 py-1 rounded-full border text-xs font-bold uppercase tracking-wider <?= $statusClass ?>">
                    <?= $statusLabel ?>
                </div>
            </div>

            <?php displayFlash(); ?>

            <div class="bg-[#1c1b22] rounded-2xl shadow-sm border border-white/10 overflow-hidden">

                <div
                    class="bg-[#131218] border-b border-white/5 p-8 text-center sm:text-left sm:flex sm:items-center sm:justify-between">
                    <div>
                        <span class="text-primary-600 font-bold tracking-wide text-xs uppercase mb-2 block">
                            Pertemuan Ke-<?= $session['meeting_number'] ?>
                        </span>
                        <h1 class="text-3xl font-extrabold text-white mb-2"><?= e($session['course_name']) ?></h1>
                        <p class="text-slate-400 font-medium">Kelas <?= e($session['class_code']) ?></p>
                    </div>

                    <div
                        class="mt-6 sm:mt-0 flex flex-col items-center justify-center w-24 h-24 bg-[#1c1b22] rounded-2xl border border-white/10 shadow-sm text-slate-200">
                        <span class="text-3xl font-black leading-none"><?= $dateObj->format('d') ?></span>
                        <span
                            class="text-xs font-bold uppercase text-primary-600 mt-1"><?= $dateObj->format('F Y') ?></span>
                    </div>
                </div>

                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        <div class="space-y-6">
                            <h3
                                class="font-bold text-slate-200 text-lg flex items-center gap-2 border-b border-white/5 pb-2">
                                <i class="bi bi-clock-history text-primary-500"></i> Detail Waktu
                            </h3>

                            <div class="space-y-4">
                                <div>
                                    <label class="text-xs font-bold text-slate-400 uppercase">Hari</label>
                                    <p class="text-slate-300 font-semibold text-lg">
                                        <?php
                                        $daysID = ['Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu', 'Sunday' => 'Minggu'];
                                        echo $daysID[$dateObj->format('l')] ?? $dateObj->format('l');
                                        ?>
                                    </p>
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-slate-400 uppercase">Jam Pelaksanaan</label>
                                    <div class="flex items-center gap-2 text-slate-300 font-mono text-lg font-medium">
                                        <span><?= date('H:i', strtotime($session['start_time'])) ?></span>
                                        <i class="bi bi-arrow-right text-slate-300 text-sm"></i>
                                        <span><?= date('H:i', strtotime($session['end_time'])) ?></span>
                                    </div>
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-slate-400 uppercase">Lokasi</label>
                                    <div class="flex items-center gap-2 mt-1">
                                        <div
                                            class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center">
                                            <i class="bi bi-geo-alt-fill"></i>
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-200 text-sm"><?= e($session['lab_name']) ?>
                                            </p>
                                            <p class="text-xs text-slate-400">
                                                <?= e($session['location'] ?? 'Gedung Laboratorium') ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <h3
                                class="font-bold text-slate-200 text-lg flex items-center gap-2 border-b border-white/5 pb-2">
                                <i class="bi bi-people-fill text-emerald-500"></i> Petugas
                            </h3>

                            <div class="space-y-4">
                                <div class="flex items-center gap-3 p-3 rounded-xl border border-white/5 bg-[#131218]">
                                    <div
                                        class="w-10 h-10 rounded-full bg-[#1c1b22] border border-white/10 overflow-hidden flex items-center justify-center text-slate-300">
                                        <?php if (!empty($session['lecturer_photo'])): ?>
                                        <img src="<?= e($session['lecturer_photo']) ?>"
                                            class="w-full h-full object-cover">
                                        <?php else: ?>
                                        <i class="bi bi-person-fill text-xl"></i>
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <p class="text-xs font-bold text-slate-400 uppercase">Dosen</p>
                                        <p class="text-sm font-bold text-slate-200"><?= e($session['lecturer_name']) ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-3 p-3 rounded-xl border border-white/5 bg-[#131218]">
                                    <div
                                        class="w-10 h-10 rounded-full bg-[#1c1b22] border border-white/10 overflow-hidden flex items-center justify-center text-slate-300">
                                        <?php if (!empty($session['assistant_1_photo'])): ?>
                                        <img src="<?= e($session['assistant_1_photo']) ?>"
                                            class="w-full h-full object-cover">
                                        <?php else: ?>
                                        <i class="bi bi-person-badge text-xl"></i>
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <p class="text-xs font-bold text-slate-400 uppercase">Asisten 1</p>
                                        <p class="text-sm font-bold text-slate-200">
                                            <?= e($session['assistant_1_name']) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="bg-[#131218] border-t border-white/5 p-6 flex justify-between items-center">
                    <p class="text-xs text-slate-400 italic">
                        ID Sesi: #<?= $session['id'] ?> &bull; Dibuat otomatis oleh sistem.
                    </p>

                    <form method="POST" action="<?= url('/admin/sessions/' . $session['id'] . '/delete') ?>"
                        onsubmit="return confirm('PERINGATAN: Anda akan menghapus sesi pertemuan tanggal <?= $dateObj->format('d M Y') ?> ini saja. Data master tidak akan terhapus. Lanjutkan?');">
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-[#1c1b22] border border-rose-200 text-rose-600 rounded-lg text-sm font-bold hover:bg-rose-50 hover:border-rose-300 transition-all shadow-sm">
                            <i class="bi bi-trash"></i> Hapus Sesi Ini
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </main>
</div>
<?php include APP_PATH . '/views/layouts/footer.php'; ?>