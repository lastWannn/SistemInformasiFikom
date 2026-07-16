<?php $title = 'Tambah Staff'; ?>
<?php include APP_PATH . '/views/layouts/header.php'; ?>

<div class="antialiased bg-transparent min-h-screen">
    <?php include APP_PATH . '/views/layouts/sidebar.php'; ?>

    <main class="p-4 sm:ml-64 pt-8 transition-all duration-300">
        <div class="max-w-5xl mx-auto">

            <div class="flex items-center gap-4 mb-8">
                <a href="<?= url('/admin/head-laboran') ?>"
                    class="w-10 h-10 flex items-center justify-center rounded-xl bg-[#1c1b22] border border-white/10 text-slate-400 hover:text-primary-500 hover:border-primary-500 shadow-sm transition-all"
                    title="Kembali">
                    <i class="bi bi-arrow-left text-lg"></i>
                </a>
                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-white">Tambah Staff Baru</h1>
                    <p class="text-slate-400 text-sm mt-1">Daftarkan user sebagai staff atau kepala laboratorium.</p>
                </div>
            </div>

            <?php displayFlash(); ?>

            <form method="POST" action="<?= url('/admin/head-laboran/create') ?>" enctype="multipart/form-data">

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <div class="lg:col-span-1 space-y-6">
                        <div class="bg-[#1c1b22] rounded-2xl shadow-sm border border-white/10 p-6">
                            <h2
                                class="text-sm font-bold text-white uppercase tracking-wider mb-6 pb-2 border-b border-white/10">
                                Identitas Staff
                            </h2>

                            <div class="mb-6 flex flex-col items-center">
                                <label class="relative group cursor-pointer">
                                    <div
                                        class="w-32 h-32 rounded-full border-4 border-[#131218] shadow-md overflow-hidden bg-[#131218] relative flex items-center justify-center">
                                        <img id="photo-preview" class="hidden w-full h-full object-cover">
                                        <div id="photo-placeholder" class="text-slate-400 flex flex-col items-center">
                                            <i class="bi bi-person-plus-fill text-4xl mb-1"></i>
                                            <span class="text-[10px] uppercase font-bold">Upload</span>
                                        </div>
                                    </div>
                                    <div
                                        class="absolute bottom-0 right-0 w-8 h-8 bg-primary-500 text-[#131218] rounded-full shadow border-2 border-[#1c1b22] flex items-center justify-center group-hover:bg-primary-600 transition-colors">
                                        <i class="bi bi-camera-fill text-xs"></i>
                                    </div>
                                    <input type="file" name="photo_file" id="photo_file" class="hidden" accept="image/*"
                                        onchange="previewImage(this)">
                                </label>
                                <p class="text-xs text-slate-400 mt-3 text-center">Format: JPG/PNG, Max 2MB.</p>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label class="block mb-2 text-xs font-semibold text-white uppercase">Pilih User
                                        <span class="text-rose-500">*</span></label>
                                    <div class="relative">
                                        <select name="user_id"
                                            class="w-full px-4 py-2.5 bg-[#131218] border border-white/10 text-white text-sm rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 block appearance-none"
                                            required>
                                            <option value="">-- Pilih Akun User --</option>
                                            <?php foreach ($users as $user): ?>
                                            <option value="<?= $user['id'] ?>"><?= e($user['name']) ?>
                                                (<?= e($user['role_name'] ?? 'User') ?>)</option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-slate-400">
                                            <i class="bi bi-chevron-down text-xs"></i>
                                        </div>
                                    </div>
                                </div>


                                <div>
                                    <label class="block mb-2 text-xs font-semibold text-white uppercase">Kategori
                                        Jabatan <span class="text-rose-500">*</span></label>
                                    <div class="grid grid-cols-2 gap-4">
                                        <label class="cursor-pointer">
                                            <input type="radio" name="category" value="head" class="peer sr-only">
                                            <div
                                                class="p-3 rounded-xl border border-white/10 bg-[#131218] text-slate-400 peer-checked:bg-primary-500/10 peer-checked:border-primary-500 peer-checked:text-primary-400 transition-all text-center">
                                                <i class="bi bi-star-fill mb-1 block text-lg"></i>
                                                <span class="text-sm font-bold">Kepala Lab</span>
                                            </div>
                                        </label>
                                        <label class="cursor-pointer">
                                            <input type="radio" name="category" value="staff" class="peer sr-only"
                                                checked>
                                            <div
                                                class="p-3 rounded-xl border border-white/10 bg-[#131218] text-slate-400 peer-checked:bg-white/10 peer-checked:border-slate-500 peer-checked:text-white transition-all text-center">
                                                <i class="bi bi-people-fill mb-1 block text-lg"></i>
                                                <span class="text-sm font-bold">Staff / Laboran</span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <label class="block mb-2 text-xs font-semibold text-white uppercase">Nama
                                        Jabatan Spesifik <span class="text-rose-500">*</span></label>
                                    <input type="text" name="position"
                                        class="w-full px-4 py-2.5 bg-[#131218] border border-white/10 text-white text-sm rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 block transition-all placeholder-slate-500"
                                        placeholder="Contoh: Kepala Lab Multimedia" required>
                                </div>

                                <div>
                                    <label class="block mb-2 text-xs font-semibold text-white uppercase">No.
                                        WhatsApp</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none text-slate-400 font-bold border-r border-white/10 pr-3 mr-1">
                                            +62
                                        </div>
                                        <input type="number" name="phone"
                                            class="w-full ps-16 p-2.5 bg-[#131218] border border-white/10 text-white text-sm rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 block transition-all placeholder:text-slate-400"
                                            placeholder="81234567890">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-2 space-y-6">
                        <div class="bg-[#1c1b22] rounded-2xl shadow-sm border border-white/10 p-6">
                            <h2
                                class="text-sm font-bold text-white uppercase tracking-wider mb-6 pb-2 border-b border-white/10 flex items-center gap-2">
                                <i class="bi bi-toggle-on text-primary-500"></i> Status Kehadiran Awal
                            </h2>

                            <div class="mb-6">
                                <label class="block mb-2 text-sm font-semibold text-white">Set Status Awal <span
                                        class="text-rose-500">*</span></label>
                                <div class="grid grid-cols-2 gap-4">
                                    <label
                                        class="group relative flex items-center justify-between p-4 bg-[#131218] border rounded-xl cursor-pointer hover:bg-white/5 transition-all focus-within:ring-2 focus-within:ring-emerald-500 border-white/10 has-[:checked]:border-emerald-500 has-[:checked]:bg-emerald-500/10 has-[:checked]:ring-1 has-[:checked]:ring-emerald-500">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="flex items-center justify-center w-5 h-5 border-2 rounded-full border-slate-500 group-has-[:checked]:border-emerald-500">
                                                <div
                                                    class="w-2.5 h-2.5 rounded-full bg-emerald-500 hidden group-has-[:checked]:block">
                                                </div>
                                            </div>
                                            <div>
                                                <span class="block text-sm font-bold text-white">Active</span>
                                                <span class="block text-xs text-slate-400">Hadir / Standby</span>
                                            </div>
                                        </div>
                                        <input type="radio" name="status" value="active" class="hidden" checked
                                            onclick="toggleReturnTime(false)">
                                    </label>

                                    <label
                                        class="group relative flex items-center justify-between p-4 bg-[#131218] border rounded-xl cursor-pointer hover:bg-white/5 transition-all focus-within:ring-2 focus-within:ring-rose-500 border-white/10 has-[:checked]:border-rose-500 has-[:checked]:bg-rose-500/10 has-[:checked]:ring-1 has-[:checked]:ring-rose-500">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="flex items-center justify-center w-5 h-5 border-2 rounded-full border-slate-500 group-has-[:checked]:border-rose-500">
                                                <div
                                                    class="w-2.5 h-2.5 rounded-full bg-rose-500 hidden group-has-[:checked]:block">
                                                </div>
                                            </div>
                                            <div>
                                                <span class="block text-sm font-bold text-white">Inactive</span>
                                                <span class="block text-xs text-slate-400">Keluar / Izin</span>
                                            </div>
                                        </div>
                                        <input type="radio" name="status" value="inactive" class="hidden"
                                            onclick="toggleReturnTime(true)">
                                    </label>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block mb-2 text-sm font-semibold text-white">Lokasi Awal</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none text-slate-400">
                                            <i class="bi bi-geo-alt"></i>
                                        </div>
                                        <input type="text" name="location"
                                            class="w-full ps-10 p-2.5 bg-[#131218] border border-white/10 text-white text-sm rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 block transition-all placeholder-slate-500"
                                            placeholder="Contoh: Lab Komputer 1">
                                    </div>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-semibold text-white">Jam Masuk</label>
                                    <input type="time" name="time_in"
                                        class="w-full p-2.5 bg-[#131218] border border-white/10 text-white text-sm rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 block transition-all">
                                </div>
                            </div>

                            <div class="mb-6">
                                <label class="block mb-2 text-sm font-semibold text-white">Catatan /
                                    Keterangan</label>
                                <textarea name="notes" rows="3"
                                    class="w-full p-3 bg-[#131218] border border-white/10 text-white text-sm rounded-xl focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 block transition-all resize-none placeholder-slate-500"
                                    placeholder="Tambahkan catatan awal (Opsional)..."></textarea>
                            </div>

                            <div id="return-time-container"
                                class="transition-all duration-300 opacity-50 grayscale pointer-events-none">
                                <div class="p-4 bg-rose-500/10 rounded-xl border border-rose-500/20">
                                    <div class="flex items-center gap-2 mb-2 text-rose-400">
                                        <i class="bi bi-clock-history"></i>
                                        <label class="text-sm font-bold">Estimasi Kembali</label>
                                    </div>
                                    <p class="text-xs text-rose-500/70 mb-3">Wajib diisi jika memilih status "Inactive".
                                    </p>
                                    <input type="datetime-local" name="return_time"
                                        class="bg-[#131218] border border-rose-500/30 text-white text-sm rounded-lg block w-full p-2.5 focus:border-rose-500 focus:ring-rose-500/20">
                                </div>
                            </div>

                        </div>

                        <div class="flex items-center gap-4 pt-4">
                            <button type="submit"
                                class="flex-1 text-[#131218] bg-primary-500 hover:bg-primary-600 focus:ring-4 focus:ring-primary-500/20 font-bold rounded-xl text-sm px-5 py-3 transition-all shadow-lg shadow-primary-500/30 flex justify-center items-center gap-2">
                                <i class="bi bi-person-check-fill"></i>
                                Tambah Staff
                            </button>
                            <a href="<?= url('/admin/head-laboran') ?>"
                                class="text-slate-400 bg-[#1c1b22] border border-white/10 hover:bg-white/5 hover:text-white font-medium rounded-xl text-sm px-6 py-3 transition-all">
                                Batal
                            </a>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </main>
</div>

<?php include APP_PATH . '/views/admin/layouts/footer.php'; ?>

<script>
function previewImage(input) {
    const preview = document.getElementById('photo-preview');
    const placeholder = document.getElementById('photo-placeholder');
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            placeholder.classList.add('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function toggleReturnTime(isInactive) {
    const container = document.getElementById('return-time-container');
    if (isInactive) {
        container.classList.remove('opacity-50', 'grayscale', 'pointer-events-none');
        container.classList.add('opacity-100');
    } else {
        container.classList.add('opacity-50', 'grayscale', 'pointer-events-none');
        container.classList.remove('opacity-100');
    }
}
</script>