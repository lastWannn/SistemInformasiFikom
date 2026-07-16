<?php $title = 'Import User Massal'; $adminLayout = true; ?>
<?php include APP_PATH . '/views/layouts/header.php'; ?>

<div class="antialiased bg-transparent min-h-screen">
    <?php include APP_PATH . '/views/layouts/sidebar.php'; ?>

    <main class="p-4 sm:ml-64 pt-8 transition-all duration-300">
        <div class="max-w-3xl mx-auto">

            <div class="flex items-center gap-4 mb-8">
                <a href="<?= url('/admin/users') ?>"
                    class="w-10 h-10 flex items-center justify-center rounded-xl bg-[#1c1b22] border border-white/10 text-slate-400 hover:text-primary-500 hover:border-primary-500 shadow-sm transition-all">
                    <i class="bi bi-arrow-left text-lg"></i>
                </a>
                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-white">Import User Massal</h1>
                    <p class="text-slate-400 text-sm mt-1">Upload file Excel untuk mendaftarkan user sekaligus.</p>
                </div>
            </div>

            <?php displayFlash(); ?>

            <div class="bg-[#1c1b22] rounded-2xl shadow-sm border border-white/10 overflow-hidden">
                <div class="p-8">

                    <form action="<?= url('/admin/users/import') ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-bold text-white">File Excel / CSV</label>

                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file"
                                    class="flex flex-col items-center justify-center w-full h-48 border-2 border-white/10 border-dashed rounded-2xl cursor-pointer bg-[#131218] hover:bg-white/5 transition-all">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <i class="bi bi-cloud-arrow-up text-4xl text-slate-400 mb-3"></i>
                                        <p class="mb-2 text-sm text-slate-400"><span class="font-semibold">Klik untuk
                                                upload</span> atau drag and drop</p>
                                        <p class="text-xs text-slate-500">XLSX, XLS, atau CSV (MAX. 5MB)</p>
                                    </div>
                                    <input id="dropzone-file" name="file" type="file" class="hidden"
                                        accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                        onchange="showFileName(this)" required />
                                </label>
                            </div>
                            <p id="file-name" class="mt-2 text-sm text-primary-600 font-medium text-center hidden"></p>
                        </div>

                        <div class="bg-blue-500/10 border border-blue-500/20 rounded-xl p-4 mb-8">
                            <h4 class="font-bold text-blue-400 text-sm mb-2 flex items-center gap-2">
                                <i class="bi bi-info-circle-fill"></i> Ketentuan Import:
                            </h4>
                            <ul class="list-disc list-inside text-xs text-blue-300 space-y-1 ml-1">
                                <li>Pastikan header kolom sesuai template: <strong>Nama, Email, Role, Status,
                                        Password</strong>.</li>
                                <li>Sistem akan melewati baris jika <strong>Email</strong> sudah terdaftar.</li>
                                <li>Penulisan Role tidak case-sensitive (misal: "Admin", "admin", "ADMIN" dianggap
                                    sama).</li>
                                <li>Password akan otomatis di-enkripsi oleh sistem.</li>
                            </ul>
                        </div>

                        <div class="flex gap-3">
                            <button type="submit"
                                class="flex-1 bg-primary-500 hover:bg-primary-600 text-[#131218] font-bold py-3.5 rounded-xl shadow-lg shadow-primary-500/30 transition-all">
                                <i class="bi bi-file-earmark-spreadsheet mr-2"></i> Proses Import
                            </button>
                            <a href="<?= url('/admin/users') ?>"
                                class="px-6 py-3.5 bg-white/5 border border-white/10 text-slate-300 font-bold rounded-xl hover:bg-white/10 transition-all">
                                Batal
                            </a>
                        </div>
                    </form>

                </div>

                <div class="bg-[#131218] px-8 py-4 border-t border-white/10 flex justify-between items-center">
                    <span class="text-xs text-slate-400">Butuh template?</span>
                    <a href="#" onclick="alert('Gunakan file user.xlsx yang Anda miliki.')"
                        class="text-xs font-bold text-primary-500 hover:underline">
                        Download Template User
                    </a>
                </div>
            </div>

        </div>
    </main>
</div>

<?php include APP_PATH . '/views/admin/layouts/footer.php'; ?>

<script>
function showFileName(input) {
    const fileName = input.files[0]?.name;
    const label = document.getElementById('file-name');
    if (fileName) {
        label.textContent = "File terpilih: " + fileName;
        label.classList.remove('hidden');
    }
}
</script>