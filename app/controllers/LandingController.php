<?php

class LandingController extends Controller
{
    public function index()
    {
        $labModel = $this->model('LaboratoryModel');
        $activityModel = $this->model('LabActivityModel');
        $userModel = $this->model('UserModel');

        // 1. Data Statistik (Dashboard)
        $stats = [
            'students_count' => '1.450',
            'alumni_count' => '2.878',
            'lecturers_count' => '40',
            'staff_count' => '23'
        ];

        // 2. LOGIKA CAROUSEL (Slide 1: Banner, Slide 2: Jadwal Hari Ini)
        $allLabs = $labModel->getAllLaboratories(); // Ambil semua lab + Fotonya
        
        $staticSchedules = $this->getStaticSchedules();
        $todayEnglish = date('l');
        
        // Filter static schedules by today's day (e.g. 'Monday', 'Tuesday', etc.)
        $todaySchedules = array_filter($staticSchedules, function($s) use ($todayEnglish) {
            return strcasecmp($s['day'], $todayEnglish) === 0;
        });
        
        // Sort by start_time ascending
        usort($todaySchedules, function($a, $b) {
            return strcmp($a['start_time'], $b['start_time']);
        });

        $data = [
            'stats' => $stats,
            'labs' => $allLabs,
            'activities' => $activityModel->getRecentActivities(3),
            'todaySchedules' => $todaySchedules,
            'currentDayName' => $this->getIndonesianDay($todayEnglish),
            'currentDate' => date('d F Y')
        ];

        $this->view('landing/index', $data);
    }

    private function getIndonesianDay($englishDay)
    {
        $days = [
            'Sunday' => 'MINGGU',
            'Monday' => 'SENIN',
            'Tuesday' => 'SELASA',
            'Wednesday' => 'RABU',
            'Thursday' => 'KAMIS',
            'Friday' => 'JUMAT',
            'Saturday' => 'SABTU'
        ];
        return $days[$englishDay] ?? $englishDay;
    }

    private function getStaticSchedules()
    {
        return [
            [
                'id' => 1,
                'day' => 'Wednesday',
                'start_time' => '15:40:00',
                'end_time' => '17:20:00',
                'frequency' => 'Mingguan',
                'course_name' => 'Bahasa Indonesia',
                'class_code' => 'C1',
                'program_study' => 'Teknik Informatika (S1)',
                'lab_name' => 'Ruang U4_01',
                'location' => 'Lantai 4',
                'lecturer_name' => 'Andi Puspitasari, S.Pd., M.Pd.',
                'lecturer_photo' => '',
                'assistant_1_name' => '-',
                'assistant_1_photo' => '',
                'assistant_2_name' => '-',
                'assistant_2_photo' => '',
                'semester' => '2',
                'description' => 'Mata kuliah pengembangan kepribadian Bahasa Indonesia.'
            ],
            [
                'id' => 2,
                'day' => 'Wednesday',
                'start_time' => '16:30:00',
                'end_time' => '18:10:00',
                'frequency' => 'Mingguan',
                'course_name' => 'Aljabar Matriks',
                'class_code' => 'C1',
                'program_study' => 'Teknik Informatika (S1)',
                'lab_name' => 'Ruang U4_07',
                'location' => 'Lantai 4',
                'lecturer_name' => 'Dr. Tasrif Hasanuddin, S.T., M.Cs.',
                'lecturer_photo' => '',
                'assistant_1_name' => '-',
                'assistant_1_photo' => '',
                'assistant_2_name' => '-',
                'assistant_2_photo' => '',
                'semester' => '2',
                'description' => 'Konsep aljabar linier, matriks, dan transformasi linier.'
            ],
            [
                'id' => 3,
                'day' => 'Tuesday',
                'start_time' => '07:00:00',
                'end_time' => '09:30:00',
                'frequency' => 'Mingguan',
                'course_name' => 'Elektronika Dasar',
                'class_code' => 'C1',
                'program_study' => 'Teknik Informatika (S1)',
                'lab_name' => 'Ruang U4_07',
                'location' => 'Lantai 4',
                'lecturer_name' => 'Ir. Farniwati Fattah, S.T., M.T., MTA.',
                'lecturer_photo' => '',
                'assistant_1_name' => '-',
                'assistant_1_photo' => '',
                'assistant_2_name' => '-',
                'assistant_2_photo' => '',
                'semester' => '2',
                'description' => 'Pengenalan komponen elektronika dasar dan rangkaian listrik.'
            ],
            [
                'id' => 4,
                'day' => 'Thursday',
                'start_time' => '15:40:00',
                'end_time' => '18:10:00',
                'frequency' => 'Mingguan',
                'course_name' => 'Matematika Diskrit',
                'class_code' => 'C1',
                'program_study' => 'Teknik Informatika (S1)',
                'lab_name' => 'Ruang U3_01',
                'location' => 'Lantai 3',
                'lecturer_name' => 'Muh. Aliyazid Mude, S.Kom., M.Kom.',
                'lecturer_photo' => '',
                'assistant_1_name' => '-',
                'assistant_1_photo' => '',
                'assistant_2_name' => '-',
                'assistant_2_photo' => '',
                'semester' => '2',
                'description' => 'Logika matematika, teori himpunan, graf, dan kombinatorika.'
            ],
            [
                'id' => 5,
                'day' => 'Friday',
                'start_time' => '11:20:00',
                'end_time' => '14:40:00',
                'frequency' => 'Mingguan',
                'course_name' => 'Algoritma & Pemrograman 2',
                'class_code' => 'C1',
                'program_study' => 'Teknik Informatika (S1)',
                'lab_name' => 'Lab TI-408',
                'location' => 'Lantai 4',
                'lecturer_name' => 'Ramdaniah, S.Kom., M.T., MTA.',
                'lecturer_photo' => '',
                'assistant_1_name' => '-',
                'assistant_1_photo' => '',
                'assistant_2_name' => '-',
                'assistant_2_photo' => '',
                'semester' => '2',
                'description' => 'Kelanjutan pemrograman terstruktur dan analisis kompleksitas algoritma.'
            ],
            [
                'id' => 6,
                'day' => 'Friday',
                'start_time' => '07:00:00',
                'end_time' => '09:30:00',
                'frequency' => 'Mingguan',
                'course_name' => 'Basis Data I',
                'class_code' => 'C1',
                'program_study' => 'Teknik Informatika (S1)',
                'lab_name' => 'Lab TI-409',
                'location' => 'Lantai 4',
                'lecturer_name' => 'Amaliah Faradibah, S.Kom., M.Kom., MTA.',
                'lecturer_photo' => '',
                'assistant_1_name' => '-',
                'assistant_1_photo' => '',
                'assistant_2_name' => '-',
                'assistant_2_photo' => '',
                'semester' => '2',
                'description' => 'Pengenalan SQL, pemodelan ERD, dan perancangan basis data.'
            ],
            [
                'id' => 7,
                'day' => 'Wednesday',
                'start_time' => '07:00:00',
                'end_time' => '12:10:00',
                'frequency' => 'Mingguan',
                'course_name' => 'Pencerahan Qalbu',
                'class_code' => 'C1',
                'program_study' => 'Teknik Informatika (S1)',
                'lab_name' => 'Lab TI-408',
                'location' => 'Lantai 4',
                'lecturer_name' => 'Dra. St. Samsuduha, M.A',
                'lecturer_photo' => '',
                'assistant_1_name' => '-',
                'assistant_1_photo' => '',
                'assistant_2_name' => '-',
                'assistant_2_photo' => '',
                'semester' => '2',
                'description' => 'Mata kuliah pembinaan keislaman dan karakter mulia UMI.'
            ],
            [
                'id' => 8,
                'day' => 'Tuesday',
                'start_time' => '13:00:00',
                'end_time' => '16:30:00',
                'frequency' => 'Mingguan',
                'course_name' => 'Basis Data I',
                'class_code' => 'A1',
                'program_study' => 'Teknik Informatika (S1)',
                'lab_name' => 'Lab IoT',
                'location' => 'Lantai 3',
                'lecturer_name' => 'Amaliah Faradibah, S.Kom., M.Kom., MTA.',
                'lecturer_photo' => '',
                'assistant_1_name' => '-',
                'assistant_1_photo' => '',
                'assistant_2_name' => '-',
                'assistant_2_photo' => '',
                'semester' => '2',
                'description' => 'Praktikum dan teori basis data relasional menggunakan MySQL.'
            ],
            [
                'id' => 9,
                'day' => 'Monday',
                'start_time' => '08:40:00',
                'end_time' => '12:10:00',
                'frequency' => 'Mingguan',
                'course_name' => 'Basis Data I',
                'class_code' => 'A2',
                'program_study' => 'Teknik Informatika (S1)',
                'lab_name' => 'Lab IoT',
                'location' => 'Lantai 3',
                'lecturer_name' => 'Amaliah Faradibah, S.Kom., M.Kom., MTA.',
                'lecturer_photo' => '',
                'assistant_1_name' => '-',
                'assistant_1_photo' => '',
                'assistant_2_name' => '-',
                'assistant_2_photo' => '',
                'semester' => '2',
                'description' => 'Praktikum dan teori basis data relasional menggunakan MySQL.'
            ],
            [
                'id' => 10,
                'day' => 'Monday',
                'start_time' => '09:40:00',
                'end_time' => '12:10:00',
                'frequency' => 'Mingguan',
                'course_name' => 'Struktur Data',
                'class_code' => 'A1',
                'program_study' => 'Teknik Informatika (S1)',
                'lab_name' => 'Lab Computer Vision',
                'location' => 'Lantai 3',
                'lecturer_name' => 'Ramdaniah, S.Kom., M.T., MTA.',
                'lecturer_photo' => '',
                'assistant_1_name' => '-',
                'assistant_1_photo' => '',
                'assistant_2_name' => '-',
                'assistant_2_photo' => '',
                'semester' => '2',
                'description' => 'Implementasi tipe data abstrak, linked list, stack, queue, dan tree.'
            ],
            [
                'id' => 11,
                'day' => 'Monday',
                'start_time' => '09:40:00',
                'end_time' => '12:10:00',
                'frequency' => 'Mingguan',
                'course_name' => 'Struktur Data',
                'class_code' => 'B1',
                'program_study' => 'Teknik Informatika (S1)',
                'lab_name' => 'Lab Multimedia',
                'location' => 'Lantai 3',
                'lecturer_name' => 'Siska Anraeni, S.Kom., M.T., MCF.',
                'lecturer_photo' => '',
                'assistant_1_name' => '-',
                'assistant_1_photo' => '',
                'assistant_2_name' => '-',
                'assistant_2_photo' => '',
                'semester' => '2',
                'description' => 'Implementasi tipe data abstrak, linked list, stack, queue, dan tree.'
            ],
            [
                'id' => 12,
                'day' => 'Monday',
                'start_time' => '13:00:00',
                'end_time' => '14:40:00',
                'frequency' => 'Mingguan',
                'course_name' => 'Organisasi dan Arsitektur Komputer',
                'class_code' => 'A1',
                'program_study' => 'Teknik Informatika (S1)',
                'lab_name' => 'Ruang U3_01',
                'location' => 'Lantai 3',
                'lecturer_name' => 'Andi Ulfah Tenripada, S.Kom., M.Kom., MTA.',
                'lecturer_photo' => '',
                'assistant_1_name' => '-',
                'assistant_1_photo' => '',
                'assistant_2_name' => '-',
                'assistant_2_photo' => '',
                'semester' => '2',
                'description' => 'Struktur dan fungsi sistem komputer, arsitektur CPU dan memori.'
            ]
        ];
    }

    public function schedule()
    {
        $search = isset($_GET['search']) ? trim($_GET['search']) : '';
        $schedules = $this->getStaticSchedules();

        if (!empty($search)) {
            $schedules = array_filter($schedules, function ($s) use ($search) {
                $searchLower = strtolower($search);
                return strpos(strtolower($s['course_name'] ?? ''), $searchLower) !== false ||
                       strpos(strtolower($s['lecturer_name'] ?? ''), $searchLower) !== false ||
                       strpos(strtolower($s['class_code'] ?? ''), $searchLower) !== false ||
                       strpos(strtolower($s['lab_name'] ?? ''), $searchLower) !== false;
            });
        }

        $data = [
            'schedules' => $schedules,
            'search' => $search,
            'pagination' => [
                'current' => 1,
                'total_pages' => 1,
                'total_rows' => count($schedules)
            ]
        ];

        $this->view('landing/schedule', $data);
    }

    public function presence()
    {
        $this->view('landing/presence', ['presenceList' => $this->model('HeadLaboranModel')->getAllPresence()]);
    }
    public function labActivities()
    {
        $this->view('landing/activities', ['activities' => $this->model('LabActivityModel')->getPublicActivities(20)]);
    }
    public function scheduleDetail($id)
    {
        $schedules = $this->getStaticSchedules();
        $schedule = null;
        foreach ($schedules as $s) {
            if ($s['id'] == $id) {
                $schedule = $s;
                break;
            }
        }

        if (!$schedule) {
            $this->redirect('/schedule');
        }

        $data = [
            'schedule' => $schedule
        ];

        $this->view('landing/schedule-detail', $data);
    }

    // ==========================================
    // HALAMAN LIST SEMUA KEGIATAN
    // ==========================================
    public function activities()
    {
        $activityModel = $this->model('LabActivityModel');

        // Ambil semua kegiatan
        $activities = $activityModel->getAllActivities();

        $data = [
            'activities' => $activities
        ];

        // PERBAIKAN: Pastikan ini 'landing/activities' (sesuai nama file)
        $this->view('landing/activities', $data);
    }

    // ==========================================
    // HALAMAN DETAIL KEGIATAN
    // ==========================================
    public function activityDetail($id)
    {
        $activityModel = $this->model('LabActivityModel');
        $activity = $activityModel->find($id);

        if (!$activity) {
            // Jika berita tidak ditemukan, redirect ke halaman list
            $this->redirect('/activities');
        }

        // Ambil berita lain untuk rekomendasi di sidebar (kecuali yang sedang dibuka)
        $otherActivities = $activityModel->getRecentActivities(3, $id);

        $data = [
            'activity' => $activity,
            'related' => $otherActivities
        ];

        $this->view('landing/activity-detail', $data);
    }
}
