<?php
$uri = $_SERVER['REQUEST_URI'] ?? '';

// Helper function sederhana untuk cek menu aktif
// Helper function sederhana untuk cek menu aktif
function isSidebarActive($uri, $path)
{
    return strpos($uri, $path) !== false
        ? 'bg-[#FFC81A] text-[#131218] shadow-md shadow-[#FFC81A]/20 font-bold' 
        : 'text-slate-400 hover:bg-[#FFC81A]/10 hover:text-[#FFC81A] transition-colors duration-200';
}

?>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-[#131218] border-r border-white/10 flex flex-col shadow-xl"
    aria-label="Sidebar">

    <div class="h-20 flex items-center px-6 border-b border-white/10 bg-[#FFC81A] shrink-0">
        <a href="<?= url('/admin/dashboard') ?>" class="flex items-center gap-3 group">
            <img src="<?= url('/assets/images/logo-fikom-hitam.png') ?>" alt="Logo ICLABS"
                class="h-14 w-auto object-contain">

            <div class="flex flex-col">
                <span class="text-[12px] font-medium text-slate-800 uppercase tracking-widest">Admin Panel</span>
            </div>
        </a>
    </div>

    <div class="flex-1 px-3 py-6 overflow-y-auto custom-scrollbar">
        <ul class="space-y-1">

            <!-- <li>
                <a href="<?= url('/admin/dashboard') ?>"
                    class="flex items-center p-3 rounded-lg <?= isSidebarActive($uri, '/admin/dashboard') ?>">
                    <i class="bi bi-grid-fill text-lg w-6 text-center"></i>
                    <span class="ms-3 text-sm">Dashboard</span>
                </a>
            </li> -->

            <!-- <li>
                <a href="<?= url('/admin/users') ?>"
                    class="flex items-center p-3 rounded-lg <?= isSidebarActive($uri, '/admin/users') ?>">
                    <i class="bi bi-people-fill text-lg w-6 text-center"></i>
                    <span class="ms-3 text-sm">Pengguna (Users)</span>
                </a>
            </li> -->

            <li>
                <a href="<?= url('/admin/laboratories') ?>"
                    class="flex items-center p-3 rounded-lg <?= isSidebarActive($uri, '/admin/laboratories') ?>">
                    <i class="bi bi-pc-display-horizontal text-lg w-6 text-center"></i>
                    <span class="ms-3 text-sm">Fasilitas</span>
                </a>
            </li>

            <li>
                <a href="<?= url('/admin/head-laboran') ?>"
                    class="flex items-center p-3 rounded-lg <?= isSidebarActive($uri, '/admin/head-laboran') ?>">
                    <i class="bi bi-person-badge-fill text-lg w-6 text-center"></i>
                    <span class="ms-3 text-sm">Sumber Daya</span>
                </a>
            </li>

            <!-- <li>
                <a href="<?= url('/admin/calendar') ?>"
                    class="flex items-center p-3 rounded-lg <?= isSidebarActive($uri, '/admin/calendar') ?>">
                    <i class="bi bi-calendar3 text-lg w-6 text-center"></i>
                    <span class="ms-3 text-sm">Kalender Akademik</span>
                </a>
            </li> -->

            <li>
                <a href="<?= url('/admin/schedules') ?>"
                    class="flex items-center p-3 rounded-lg <?= isSidebarActive($uri, '/admin/schedules') ?>">
                    <i class="bi bi-calendar-week-fill text-lg w-6 text-center"></i>
                    <span class="ms-3 text-sm">Jadwal Kuliah</span>
                </a>
            </li>



            <!-- <li>
                <a href="<?= url('/admin/problems') ?>"
                    class="flex items-center p-3 rounded-lg <?= isSidebarActive($uri, '/admin/problems') ?>">
                    <i class="bi bi-exclamation-triangle-fill text-lg w-6 text-center"></i>
                    <span class="ms-3 text-sm">Laporan Masalah</span>
                </a>
            </li> -->

            <li>
                <a href="<?= url('/admin/activities') ?>"
                    class="flex items-center p-3 rounded-lg <?= isSidebarActive($uri, '/admin/activities') ?>">
                    <i class="bi bi-newspaper text-lg w-6 text-center"></i>
                    <span class="ms-3 text-sm">Berita / Kegiatan</span>
                </a>
            </li>

        </ul>
    </div>

    <div class="border-t border-white/10 p-4 bg-[#131218] shrink-0 space-y-2">

        <a href="<?= url('/') ?>"
            class="flex items-center justify-center w-full p-2.5 text-xs font-bold text-slate-300 bg-white/5 border border-white/10 rounded-lg hover:bg-[#FFC81A] hover:text-[#131218] hover:border-[#FFC81A] transition-all duration-300 group">
            <i class="bi bi-house-door-fill me-2 text-sm"></i>
            HALAMAN DEPAN
        </a>

        <a href="<?= url('/logout') ?>"
            class="flex items-center justify-center w-full p-2.5 text-xs font-bold text-rose-400 bg-rose-950/30 border border-rose-900/50 rounded-lg hover:bg-rose-600 hover:text-white hover:border-rose-600 transition-all duration-300 group">
            <i class="bi bi-box-arrow-right me-2 text-sm group-hover:translate-x-1 transition-transform"></i>
            LOGOUT
        </a>
    </div>

</aside>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: #334155;
        border-radius: 20px;
    }
</style>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        const toast = document.getElementById('toast-notification');
        if (toast) {
            setTimeout(() => {
                toast.classList.remove('translate-x-full', 'opacity-0');
            }, 100);
            setTimeout(() => {
                closeToast();
            }, 5000);
        }
    });

    function closeToast() {
        const toast = document.getElementById('toast-notification');
        if (toast) {
            toast.classList.add('translate-x-full', 'opacity-0');
            setTimeout(() => toast.remove(), 300);
        }
    }
</script>