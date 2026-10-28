<?php
/**
 * Mid Florida Scholars Academy - Admin Panel Database Engine
 * High-performance file-based JSON repository with atomic operations and auto-seeding.
 */

class JsonDb {
    private static $dataDir = __DIR__ . '/../data/';

    private static function getFilePath($table) {
        if (!is_dir(self::$dataDir)) {
            mkdir(self::$dataDir, 0777, true);
        }
        return self::$dataDir . $table . '.json';
    }

    public static function all($table) {
        self::ensureTable($table);
        $file = self::getFilePath($table);
        if (!file_exists($file)) {
            return [];
        }
        $content = file_get_contents($file);
        $data = json_decode($content, true);
        return is_array($data) ? $data : [];
    }

    public static function find($table, $id) {
        $items = self::all($table);
        foreach ($items as $item) {
            if (isset($item['id']) && (string)$item['id'] === (string)$id) {
                return $item;
            }
        }
        return null;
    }

    public static function where($table, callable $filter) {
        $items = self::all($table);
        return array_values(array_filter($items, $filter));
    }

    public static function count($table, callable $filter = null) {
        $items = self::all($table);
        if ($filter === null) {
            return count($items);
        }
        return count(array_filter($items, $filter));
    }

    public static function insert($table, array $record) {
        self::ensureTable($table);
        $items = self::all($table);
        
        if (!isset($record['id'])) {
            $record['id'] = 'rec_' . time() . '_' . rand(100, 999);
        }
        if (!isset($record['created_at'])) {
            $record['created_at'] = date('Y-m-d H:i:s');
        }
        
        array_unshift($items, $record);
        self::save($table, $items);
        return $record;
    }

    public static function update($table, $id, array $updates) {
        $items = self::all($table);
        $updated = null;
        
        foreach ($items as $key => $item) {
            if (isset($item['id']) && (string)$item['id'] === (string)$id) {
                $updates['updated_at'] = date('Y-m-d H:i:s');
                $items[$key] = array_merge($item, $updates);
                $updated = $items[$key];
                break;
            }
        }
        
        if ($updated !== null) {
            self::save($table, $items);
        }
        return $updated;
    }

    public static function delete($table, $id) {
        $items = self::all($table);
        $newItems = [];
        $deleted = false;
        
        foreach ($items as $item) {
            if (isset($item['id']) && (string)$item['id'] === (string)$id) {
                $deleted = true;
                continue;
            }
            $newItems[] = $item;
        }
        
        if ($deleted) {
            self::save($table, $newItems);
        }
        return $deleted;
    }

    public static function getSettings() {
        self::ensureTable('settings');
        $file = self::getFilePath('settings');
        if (!file_exists($file)) {
            return [];
        }
        $data = json_decode(file_get_contents($file), true);
        return is_array($data) ? $data : [];
    }

    public static function saveSettings(array $settings) {
        $file = self::getFilePath('settings');
        file_put_contents($file, json_encode($settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), LOCK_EX);
    }

    private static function save($table, array $data) {
        $file = self::getFilePath($table);
        file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), LOCK_EX);
    }

    private static function ensureTable($table) {
        $file = self::getFilePath($table);
        if (!file_exists($file)) {
            $seedData = self::getSeedData($table);
            file_put_contents($file, json_encode($seedData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), LOCK_EX);
        }
    }

    public static function seedAll() {
        $tables = ['tours', 'inquiries', 'applications', 'transcripts', 'events', 'blog', 'testimonials', 'faculty', 'settings'];
        foreach ($tables as $t) {
            self::ensureTable($t);
        }
    }

    private static function getSeedData($table) {
        switch ($table) {
            case 'tours':
                return [
                    [
                        'id' => 'tour_101',
                        'parent_name' => 'Michael & Sarah Jenkins',
                        'email' => 'mjenkins@windermeretech.com',
                        'phone' => '(407) 555-0192',
                        'student_name' => 'Liam Jenkins',
                        'grade_level' => 'Grade 6 (Middle School)',
                        'tour_date' => '2026-10-24',
                        'tour_time' => '10:00 AM',
                        'status' => 'Confirmed',
                        'interests' => 'Flexible enrollment for competitive tennis, STEM curriculum',
                        'created_at' => '2026-10-18 14:22:00'
                    ],
                    [
                        'id' => 'tour_102',
                        'parent_name' => 'Elena Rodriguez',
                        'email' => 'elena.rodriguez@gmail.com',
                        'phone' => '(407) 555-0348',
                        'student_name' => 'Sophia Rodriguez',
                        'grade_level' => 'Grade 1 (Lower School)',
                        'tour_date' => '2026-10-25',
                        'tour_time' => '01:30 PM',
                        'status' => 'Pending',
                        'interests' => 'Looking for small class size, phonics & bilingual emphasis',
                        'created_at' => '2026-10-19 09:15:00'
                    ],
                    [
                        'id' => 'tour_103',
                        'parent_name' => 'David & Kimberly Clark',
                        'email' => 'dclark@orlandomedical.org',
                        'phone' => '(407) 555-0781',
                        'student_name' => 'Ethan Clark',
                        'grade_level' => 'Grade 9 (Upper School)',
                        'tour_date' => '2026-10-22',
                        'tour_time' => '11:15 AM',
                        'status' => 'Confirmed',
                        'interests' => 'Dual Enrollment college credits with Valencia, honors track',
                        'created_at' => '2026-10-17 11:40:00'
                    ],
                    [
                        'id' => 'tour_104',
                        'parent_name' => 'Marcus Vance',
                        'email' => 'mvance@vancestudio.com',
                        'phone' => '(321) 555-0419',
                        'student_name' => 'Aria Vance',
                        'grade_level' => 'Grade 4 (Lower School)',
                        'tour_date' => '2026-10-15',
                        'tour_time' => '10:00 AM',
                        'status' => 'Completed',
                        'interests' => 'Transferred from public school; loves arts and accelerated math',
                        'created_at' => '2026-10-10 16:30:00'
                    ],
                    [
                        'id' => 'tour_105',
                        'parent_name' => 'Dr. Patricia Hayes',
                        'email' => 'phayes@flhealth.gov',
                        'phone' => '(407) 555-0622',
                        'student_name' => 'Lucas Hayes',
                        'grade_level' => 'Grade 11 (Upper School)',
                        'tour_date' => '2026-10-28',
                        'tour_time' => '02:00 PM',
                        'status' => 'Pending',
                        'interests' => 'AP credits, college counseling, Step Up scholarship recipient',
                        'created_at' => '2026-10-19 15:45:00'
                    ]
                ];

            case 'inquiries':
                return [
                    [
                        'id' => 'inq_201',
                        'name' => 'Jennifer Morales',
                        'email' => 'jennifer.morales@yahoo.com',
                        'phone' => '(407) 555-0814',
                        'subject' => 'Step Up For Students Scholarship Application Assistance',
                        'message' => 'Hello, we were awarded the Florida PEP scholarship for the current academic year and want to know how the tuition voucher applies to 7th grade at Mid Florida Scholars Academy.',
                        'grade' => 'Grade 7',
                        'status' => 'New',
                        'created_at' => '2026-10-19 10:14:00'
                    ],
                    [
                        'id' => 'inq_202',
                        'name' => 'Robert Taylor',
                        'email' => 'rtaylor@taylorinvest.com',
                        'phone' => '(407) 555-0441',
                        'subject' => 'Flexible Enrollment for Equestrian Athlete',
                        'message' => 'Our daughter competes in equestrian events nationally in Wellington and Ocala. We are interested in your Professional Program schedule to accommodate her winter show circuit.',
                        'grade' => 'Grade 10',
                        'status' => 'In Progress',
                        'created_at' => '2026-10-18 16:50:00'
                    ],
                    [
                        'id' => 'inq_203',
                        'name' => 'Angela Dupont',
                        'email' => 'angela.dupont@orange.k12.fl.us',
                        'phone' => '(407) 555-0925',
                        'subject' => 'Mid-Year Transfer Inquiry for Kindergarten',
                        'message' => 'Are there any remaining kindergarten seats open for January enrollment? We are relocating to Gotha next month and would love to register our son.',
                        'grade' => 'Kindergarten',
                        'status' => 'Contacted',
                        'created_at' => '2026-10-16 11:20:00'
                    ],
                    [
                        'id' => 'inq_204',
                        'name' => 'Carlos & Beatriz Mendez',
                        'email' => 'bmendez@mendezlaw.com',
                        'phone' => '(321) 555-0158',
                        'subject' => 'International Student I-20 Form Question',
                        'message' => 'We are sponsoring our nephew from Colombia for high school attendance on an F-1 student visa. Does Mid Florida Scholars Academy issue the Form I-20?',
                        'grade' => 'Grade 9',
                        'status' => 'Enrolled',
                        'created_at' => '2026-10-12 14:05:00'
                    ]
                ];

            case 'applications':
                return [
                    [
                        'id' => 'app_301',
                        'student_first_name' => 'Liam',
                        'student_last_name' => 'Jenkins',
                        'parent_name' => 'Michael Jenkins',
                        'email' => 'mjenkins@windermeretech.com',
                        'phone' => '(407) 555-0192',
                        'dob' => '2014-05-18',
                        'grade_applying' => 'Grade 6',
                        'division' => 'Middle School',
                        'program_track' => 'Flexible Professional Program (Athletics)',
                        'scholarship_type' => 'Step Up For Students (FES-EO)',
                        'previous_school' => 'Windermere Preparatory (Public)',
                        'status' => 'Under Review',
                        'gpa' => '3.85',
                        'notes' => 'Transcripts received. Excellent math aptitude. Interview scheduled.',
                        'created_at' => '2026-10-18 15:30:00'
                    ],
                    [
                        'id' => 'app_302',
                        'student_first_name' => 'Chloe',
                        'student_last_name' => 'Bennett',
                        'parent_name' => 'Rachel Bennett',
                        'email' => 'rachel.bennett@gmail.com',
                        'phone' => '(407) 555-0731',
                        'dob' => '2012-09-04',
                        'grade_applying' => 'Grade 8',
                        'division' => 'Middle School',
                        'program_track' => 'Standard College Preparatory',
                        'scholarship_type' => 'Direct Tuition / Private Pay',
                        'previous_school' => 'Holy Family Catholic School',
                        'status' => 'Accepted',
                        'gpa' => '3.92',
                        'notes' => 'Admissions committee approved on 10/18. Welcome packet sent.',
                        'created_at' => '2026-10-14 10:12:00'
                    ],
                    [
                        'id' => 'app_303',
                        'student_first_name' => 'Noah',
                        'student_last_name' => 'Kowalski',
                        'parent_name' => 'Daniel Kowalski',
                        'email' => 'dkowalski@orlandosurg.com',
                        'phone' => '(407) 555-0988',
                        'dob' => '2009-03-22',
                        'grade_applying' => 'Grade 11',
                        'division' => 'Upper School',
                        'program_track' => 'Dual Enrollment Honors Pathway',
                        'scholarship_type' => 'Direct Tuition (Military Discount Applied)',
                        'previous_school' => 'Dr. Phillips High School',
                        'status' => 'Accepted',
                        'gpa' => '4.10 Weighted',
                        'notes' => 'Registered for Dual Enrollment chemistry and calculus with Valencia College.',
                        'created_at' => '2026-10-11 16:40:00'
                    ],
                    [
                        'id' => 'app_304',
                        'student_first_name' => 'Ava',
                        'student_last_name' => 'Chen',
                        'parent_name' => 'Wei Chen',
                        'email' => 'wchen@floridabiotech.com',
                        'phone' => '(407) 555-0219',
                        'dob' => '2019-11-14',
                        'grade_applying' => 'Grade 1',
                        'division' => 'Lower School',
                        'program_track' => 'Standard Lower School Foundation',
                        'scholarship_type' => 'Step Up For Students (PEP)',
                        'previous_school' => 'Windermere Child Development Center',
                        'status' => 'Under Review',
                        'gpa' => 'N/A',
                        'notes' => 'Reading readiness assessment scheduled for next Wednesday.',
                        'created_at' => '2026-10-19 11:05:00'
                    ],
                    [
                        'id' => 'app_305',
                        'student_first_name' => 'Mateo',
                        'student_last_name' => 'Silva',
                        'parent_name' => 'Gabriela Silva',
                        'email' => 'gsilva@silvadesign.com',
                        'phone' => '(321) 555-0672',
                        'dob' => '2011-01-30',
                        'grade_applying' => 'Grade 9',
                        'division' => 'Upper School',
                        'program_track' => 'Standard College Preparatory',
                        'scholarship_type' => 'Step Up For Students (FES-UA)',
                        'previous_school' => 'Southwest Middle School',
                        'status' => 'Waitlist',
                        'gpa' => '3.40',
                        'notes' => 'Upper School 9th grade currently at 15-student classroom capacity limit; on waitlist position #2.',
                        'created_at' => '2026-10-09 13:50:00'
                    ]
                ];

            case 'transcripts':
                return [
                    [
                        'id' => 'tr_401',
                        'alumni_name' => 'Jessica Lauren Martinez',
                        'maiden_name' => '',
                        'grad_year' => '2023',
                        'email' => 'jessica.martinez@ufl.edu',
                        'phone' => '(407) 555-0811',
                        'dob' => '2005-07-14',
                        'recipient_institution' => 'University of Florida - College of Medicine Registrar',
                        'delivery_type' => 'Official Electronic PDF (Encrypted)',
                        'status' => 'Processing',
                        'tracking_notes' => 'Verified graduation status; awaiting registrar digital seal signature.',
                        'created_at' => '2026-10-19 08:30:00'
                    ],
                    [
                        'id' => 'tr_402',
                        'alumni_name' => 'Brandon Cole Walker',
                        'maiden_name' => '',
                        'grad_year' => '2020',
                        'email' => 'bwalker@stanford.edu',
                        'phone' => '(650) 555-0144',
                        'dob' => '2002-04-19',
                        'recipient_institution' => 'Stanford University Graduate School of Business',
                        'delivery_type' => 'Official Sealed Hardcopy',
                        'status' => 'Completed',
                        'tracking_notes' => 'Shipped via FedEx Priority tracking # 783941029341 on 10/17.',
                        'created_at' => '2026-10-15 14:10:00'
                    ],
                    [
                        'id' => 'tr_403',
                        'alumni_name' => 'Emily Grace Thornton',
                        'maiden_name' => 'Thornton',
                        'grad_year' => '2018',
                        'email' => 'ethornton@orlandolegal.com',
                        'phone' => '(407) 555-0377',
                        'dob' => '2000-11-09',
                        'recipient_institution' => 'Florida Bar Admissions Commission',
                        'delivery_type' => 'Certified Legal Dossier',
                        'status' => 'Completed',
                        'tracking_notes' => 'Delivered to FL Bar on 10/12/2026.',
                        'created_at' => '2026-10-08 09:20:00'
                    ]
                ];

            case 'events':
                return [
                    [
                        'id' => 'evt_501',
                        'title' => 'First Quarter Honor Roll Ceremony',
                        'category' => 'Academic',
                        'start_date' => '2026-10-30',
                        'end_date' => '2026-10-30',
                        'time' => '09:00 AM - 10:30 AM',
                        'location' => 'Main Auditorium & Campus Quad',
                        'description' => 'Honoring our Lower, Middle, and Upper School scholars for first-quarter academic excellence and citizenship.',
                        'is_public' => true
                    ],
                    [
                        'id' => 'evt_502',
                        'title' => 'Open House & Campus Showcase',
                        'category' => 'Admissions',
                        'start_date' => '2026-11-07',
                        'end_date' => '2026-11-07',
                        'time' => '10:00 AM - 01:00 PM',
                        'location' => 'Mid Florida Scholars Academy Campus',
                        'description' => 'Prospective families are invited to meet faculty, tour our 12:1 classrooms, and learn about Step Up scholarships.',
                        'is_public' => true
                    ],
                    [
                        'id' => 'evt_503',
                        'title' => 'Thanksgiving Break (No School)',
                        'category' => 'Holiday',
                        'start_date' => '2026-11-23',
                        'end_date' => '2026-11-27',
                        'time' => 'All Day',
                        'location' => 'All Campus Facilities Closed',
                        'description' => 'School closed in observance of Thanksgiving. Classes resume Monday, November 30.',
                        'is_public' => true
                    ],
                    [
                        'id' => 'evt_504',
                        'title' => 'Dual Enrollment Spring 2027 Advising Day',
                        'category' => 'College Prep',
                        'start_date' => '2026-12-04',
                        'end_date' => '2026-12-04',
                        'time' => '01:00 PM - 03:30 PM',
                        'location' => 'College Counseling Office',
                        'description' => 'Advising session for Upper School students registering for Valencia College spring courses.',
                        'is_public' => true
                    ]
                ];

            case 'blog':
                return [
                    [
                        'id' => 'post_601',
                        'title' => 'The Research On Class Size and Student Achievement',
                        'slug' => 'research-on-class-size-student-achievement',
                        'category' => 'Education Insights',
                        'author' => 'Brenda Crenshaw, Head of School',
                        'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1200&q=80',
                        'excerpt' => 'Decades of empirical studies confirm what experienced educators know: smaller class ratios unlock deeper cognitive engagement and self-efficacy.',
                        'status' => 'Published',
                        'created_at' => '2026-09-28 10:00:00'
                    ],
                    [
                        'id' => 'post_602',
                        'title' => 'How Dual Enrollment Transforms the High School Experience',
                        'slug' => 'how-dual-enrollment-transforms-high-school',
                        'category' => 'College Prep',
                        'author' => 'Tanya Williams, Principal',
                        'image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1200&q=80',
                        'excerpt' => 'Graduating high school with 30 to 60 college credit hours saves families tens of thousands while building proven college confidence.',
                        'status' => 'Published',
                        'created_at' => '2026-10-05 14:30:00'
                    ],
                    [
                        'id' => 'post_603',
                        'title' => 'Navigating Step Up For Students Scholarships in 2026-2027',
                        'slug' => 'navigating-step-up-for-students-florida',
                        'category' => 'Admissions & Tuition',
                        'author' => 'Admissions Office',
                        'image' => 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?auto=format&fit=crop&w=1200&q=80',
                        'excerpt' => 'A practical walkthrough of Florida educational vouchers including PEP, FES-EO, and FES-UA for Central Florida families.',
                        'status' => 'Published',
                        'created_at' => '2026-10-12 11:15:00'
                    ]
                ];

            case 'testimonials':
                return [
                    [
                        'id' => 'test_701',
                        'author' => 'Dr. Robert & Melissa Vance',
                        'role' => 'Parents of 8th & 11th Graders',
                        'stars' => 5,
                        'featured' => true,
                        'quote' => 'Mid Florida Scholars Academy provided the customized environment our son needed to excel both in honors coursework and on the national tennis circuit. The faculty is genuinely invested.',
                        'source' => 'Niche 5-Star Review'
                    ],
                    [
                        'id' => 'test_702',
                        'author' => 'Marcus Sterling',
                        'role' => 'Alumnus, Class of 2022 (UF Honors)',
                        'stars' => 5,
                        'featured' => true,
                        'quote' => 'Entering college with 45 dual enrollment credits allowed me to finish my undergraduate degree in two and a half years. The foundation I received here was second to none.',
                        'source' => 'Alumni Survey'
                    ],
                    [
                        'id' => 'test_703',
                        'author' => 'Elena G. (Windermere)',
                        'role' => 'Parent of 3rd Grader',
                        'stars' => 5,
                        'featured' => true,
                        'quote' => 'The 12:1 student-to-teacher ratio is not just marketing—it is the everyday reality. My daughter has grown in confidence, reading speed, and critical thinking.',
                        'source' => 'Google Review'
                    ]
                ];

            case 'faculty':
                return [
                    [
                        'id' => 'fac_801',
                        'name' => 'Brenda Crenshaw',
                        'role' => 'Founder & Head of School',
                        'department' => 'Administration',
                        'email' => 'bcrenshaw@midfloridascholarsacademy.com',
                        'phone' => '(407) 757-2241',
                        'photo' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=600&q=80',
                        'bio' => 'Founder of Mid Florida Scholars Academy; author of Average Student to CEO; educational innovator with 30+ years mentoring leaders.'
                    ],
                    [
                        'id' => 'fac_802',
                        'name' => 'Tanya Williams',
                        'role' => 'Principal',
                        'department' => 'Administration',
                        'email' => 'twilliams@midfloridascholarsacademy.com',
                        'phone' => '(407) 757-2241',
                        'photo' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80',
                        'bio' => 'Serving Mid Florida Scholars Academy since 2004; expert in curriculum mapping, college placement, and SACS accreditation.'
                    ],
                    [
                        'id' => 'fac_803',
                        'name' => 'Dr. Julian Foster',
                        'role' => 'Upper School STEM & Dual Enrollment Lead',
                        'department' => 'Upper School',
                        'email' => 'jfoster@midfloridascholarsacademy.com',
                        'phone' => '(407) 757-2241',
                        'photo' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80',
                        'bio' => 'Ph.D. in Applied Mathematics; coordinating university-level calculus, physics, and advanced research programs.'
                    ],
                    [
                        'id' => 'fac_804',
                        'name' => 'Maria Santos',
                        'role' => 'Lower School Lead & Bilingual Specialist',
                        'department' => 'Lower School',
                        'email' => 'msantos@midfloridascholarsacademy.com',
                        'phone' => '(407) 757-2241',
                        'photo' => 'https://images.unsplash.com/photo-1580894732444-8ecded7900cd?auto=format&fit=crop&w=600&q=80',
                        'bio' => 'Specializing in early literacy, phonics mastery, and dual language immersion from Kindergarten through Grade 5.'
                    ]
                ];

            case 'settings':
                return [
                    'school_name' => 'Mid Florida Scholars Academy',
                    'tagline' => 'Private K-12 College Preparatory Academy',
                    'phone' => '(407) 757-2241',
                    'email' => 'info@midfloridascholarsacademy.com',
                    'admissions_email' => 'admissions@midfloridascholarsacademy.com',
                    'campus_address' => '2342 Hempel Avenue, Gotha, FL 34734',
                    'mailing_address' => 'P.O. Box 1159, Windermere, FL 34786',
                    'portal_url' => 'https://midflorida.getalma.com/',
                    'academic_year' => '2026-2027',
                    'admin_username' => 'admin',
                    'admin_password_hash' => password_hash('admin123', PASSWORD_DEFAULT),
                    'notifications_enabled' => true,
                    'tour_capacity_per_slot' => 3
                ];

            default:
                return [];
        }
    }
}
