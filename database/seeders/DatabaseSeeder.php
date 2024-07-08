<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\SmisStudent;
use App\Models\User;
use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();


        DB::table('users')->insert([
            [
            'username' => 'admin',
            'password' => 'admin',
            'role' => 'Admin',
            'token' => 'kIiahkjhfalUykjdaf',
            'status' => 0,

            ],
            [
                'username' => 'registral@cms',
                'password' => 'reg',
                'role' => 'Registral',
                'token' => 'kIiahkjhfalUykjdaf',
                'status' => 0,

                ],
            [
                'username' => 'nsr.356.12',
                'password' => 'password',
                'role' => 'Student',
                'token' => 'stljalahkjhfalUykjdaf',
                'status' => 0,

            ],
            [
                'username' => 'nsr.246.12',
                'password' => 'password',
                'role' => 'Student',
                'token' => 'amgoijoiflUykjdaf',
                'status' => 0,

            ],
            [
                'username' => 'nsr.1256.12',
                'password' => 'password',
                'role' => 'Student',
                'token' => 'amgoijoiflUykjdaf',
                'status' => 0,

            ],
            [
                'username' => 'rosa@cms',
                'password' => 'password',
                'role' => 'Instructor',
                'token' => '625adljaafkjhfalUykjdaf',
                'status' => 0,

            ],
            [
                'username' => 'bas@cms',
            'password' => 'password',
            'role' => 'Instructor',
            'token' => 'fafaafkjhfalUykjdaf',
            'status' => 0,

            ],
            [
                'username' => 'helen@cms',
                'password' => 'password',
                'role' => 'Instructor',
                'token' => 'fafaafkjhfalUykjdaf',
                'status' => 0,

            ],

            [
                'username' => 'dean@cms',
                'password' => 'dean',
                'role' => 'Dean',
                'token' => '62deanadljaafkjhfalUykjdaf',
                'status' => 0,

            ],
           [
                'username' => 'b@cms',
                'password' => 'chair',
                'role' => 'Chiar',
                'token' => '62chairnadljaafkjhfalUykjdaf',
                'status' => 0,
          ],

            [
                'username' => 'h@cms',
                'password' => 'chair',
                'role' => 'Chair',
                'token' => 'fjasjfnadljaafkjhfalUykjdaf',
                'status' => 0,
           ],

           [
            'username' => 's@cms',
            'password' => 'chair',
            'role' => 'Chair',
            'token' => 'fjasjfnadljaafkjhfalUykjdaf',
            'status' => 0,
          ],

          [
          'username' => 'a@cms',
          'password' => 'chair',
          'role' => 'Chair',
          'token' => 'fjasjfnadljaafkjhfalUykjdaf',
          'status' => 0,
         ]


        ]);




        DB::table('smis_students')->insert([
            [
                'username' => 'nsr.356.12',
                'email' => 'asrat@gmail.com',
                'password' => 'password',
                'Fname' => 'asrat',
                'Mname' => 'zewge',
                'Lname' => 'gosaye',
                'role' => 'Student',
                'contact' => 000,
                'gender' => 'Male',
                'dept' => 'Information Technology',
                'year' => 4,
                'semister' => 2,
                'age' => 22,

            ],
            [
                'username' => 'nsr.226.12',
                'email' => 'alemu@gmail.com',
                'password' => 'password',
                'Fname' => 'alemu',
                'Mname' => 'mehari',
                'Lname' => 'mekuriya',
                'role' => 'Student',
                'contact' => 000,
                'gender' => 'Female',
                'dept' => 'Information Technology',
                'year' => 4,
                'semister' => 2,
                'age' => 22,

            ],
            [
                'username' => 'nsr.346.12',
                'email' => 'tigist@gmail.com',
                'password' => 'password',
                'Fname' => 'tigist',
                'Mname' => 'kebede',
                'Lname' => 'yeshi',
                'role' => 'Student',
                'contact' => 000,
                'gender' => 'Female',
                'dept' => 'Computer Science',
                'year' => 4,
                'semister' => 2,
                'age' => 22,

            ],
            [
                'username' => 'nsr.5506.12',
                'email' => 'helen@gmail.com',
                'password' => 'password',
                'Fname' => 'helen',
                'Mname' => 'bamlaku',
                'Lname' => 'kebede',
                'role' => 'Student',
                'contact' => 000,
                'gender' => 'Female',
                'dept' => 'Computer Science',
                'year' => 4,
                'semister' => 2,
                'age' => 22,

            ],
            [
                'username' => 'nsr.556.12',
                'email' => 'eden@gmail.com',
                'password' => 'password',
                'Fname' => 'eden',
                'Mname' => 'bamlaku',
                'Lname' => 'kebede',
                'role' => 'Student',
                'contact' => 000,
                'gender' => 'Female',
                'dept' => 'Software Engineering',
                'year' => 4,
                'semister' => 2,
                'age' => 22,

            ],
            [
                'username' => 'nsr.1256.12',
                'email' => 'biniyam@gmail.com',
                'password' => 'password',
                'Fname' => 'biniyam',
                'Mname' => 'bamlaku',
                'Lname' => 'leul',
                'role' => 'Student',
                'contact' => 000,
                'gender' => 'Male',
                'dept' => 'Software Engineering',
                'year' => 4,
                'semister' => 2,
                'age' => 22,

            ]
        ]);

        DB::table('students')->insert([
            [
                'username' => 'nsr.356.12',
                'email' => 'asrat@gmail.com',
                'password' => 'password',
                'Fname' => 'Asrat',
                'Mname' => 'Zewge',
                'Lname' => 'Gosaye',
                'role' => 'Student',
                'contact' => 000,
                'gender' => 'Male',
                'dept' => 'Information Technology',
                'year' => 4,
                'semister' => 2,
                'status' => 22,

            ],

            [
                'username' => 'nsr.346.12',
                'email' => 'tigist@gmail.com',
                'password' => 'password',
                'Fname' => 'tigist',
                'Mname' => 'kebede',
                'Lname' => 'yeshi',
                'role' => 'Student',
                'contact' => 000,
                'gender' => 'Male',
                'dept' => 'Computer Science',
                'year' => 4,
                'semister' => 2,
                'status' => 22,

            ],

            [
                'username' => 'nsr.556.12',
                'email' => 'eden@gmail.com',
                'password' => 'password',
                'Fname' => 'eden',
                'Mname' => 'bamlaku',
                'Lname' => 'kebede',
                'role' => 'Student',
                'contact' => 000,
                'gender' => 'Male',
                'dept' => 'Software Engineering',
                'year' => 4,
                'semister' => 2,
                'status' => 22,

            ],

        ]);

        DB::table('deans')->insert([
            [
                'username' => 'dean@cms',
                'email' => 'dean@gmail.com',
                'password' => 'dean',
                'Fname' => 'Dean',
                'Mname' => 'Dean0',
                'Lname' => 'Dean1',
                'role' => 'Dean',
                'contact' => 000,
                'gender' => 'Male',
                'status' => 0
            ]
            ]);

            DB::table('admins')->insert([
                [
                    'username' => 'admins@cms',
                    'email' => 'admins@gmail.com',
                    'password' => 'password',
                    'Fname' => 'aaa',
                    'Mname' => 'bbb',
                    'Lname' => 'ccc',
                    'role' => 'Admin',
                    'contact' => 000,
                    'gender' => 'Male',
                    'status' => 0
                ]
                ]);
                DB::table('collages')->insert([
                    [
                        'username' => 'collage@cms',
                        'email' => 'collage@gmail.com',
                        'password' => 'password',
                        'Fname' => 'aaa',
                        'Mname' => 'bbb',
                        'Lname' => 'ccc',
                        'role' => 'Collage',
                        'contact' => 000,
                        'gender' => 'Male',
                        'status' => 0
                    ]
                    ]);
                    DB::table('acs')->insert([
                        [
                            'username' => 'ac@cms',
                            'email' => 'ac@gmail.com',
                            'password' => 'password',
                            'Fname' => 'aaa',
                            'Mname' => 'bbb',
                            'Lname' => 'ccc',
                            'role' => 'Ac',
                            'contact' => 000,
                            'gender' => 'Male',
                            'status' => 0
                        ]
                        ]);

                        DB::table('registrals')->insert([
                            [
                                'username' => 'registral@cms',
                                'email' => 'registral@gmail.com',
                                'password' => 'password',
                                'Fname' => 'aaa',
                                'Mname' => 'bbb',
                                'Lname' => 'ccc',
                                'role' => 'Registral',
                                'contact' => 000,
                                'gender' => 'Male',
                                'status' => 0
                            ]
                            ]);
                            DB::table('secretery_users')->insert([
                                [

                                    'username' => 'secretery@cms',
                                    'email' => 'secretery@gmail.com',
                                    'password' => 'password',
                                    'Fname' => 'aaa',
                                    'Mname' => 'bbb',
                                    'Lname' => 'ccc',
                                    'role' => 'Secretery',
                                    'contact' => 000,
                                    'gender' => 'Male',
                                    'status' => 0
                                ]
                                ]);

        DB::table('chairs')->insert([
            [
                'username' => 'b@cms',
                'email' => 'b@gmail.com',
                'password' => 'chair',
                'Fname' => 'aaa',
                'Mname' => 'bbb',
                'Lname' => 'ccc',
                'role' => 'Chair',
                'contact' => 000,
                'gender' => 'Male',
                'status' => 0
            ],
            [
                'username' => 'h@cms',
                'email' => 'h@gmail.com',
                'password' => 'chair',
                'Fname' => 'aaa',
                'Mname' => 'bbb',
                'Lname' => 'ccc',
                'role' => 'Chair',
                'contact' => 000,
                'gender' => 'Male',
                'status' => 0
            ],
            [
                'username' => 's@cms',
                'email' => 's@gmail.com',
                'password' => 'chair',
                'Fname' => 'aaa',
                'Mname' => 'bbb',
                'Lname' => 'ccc',
                'role' => 'Chair',
                'contact' => 000,
                'gender' => 'Female',
                'status' => 0
            ],
            [
                'username' => 'a@cms',
                'email' => 'a@gmail.com',
                'password' => 'chair',
                'Fname' => 'aaa',
                'Mname' => 'bbb',
                'Lname' => 'ccc',
                'role' => 'Chair',
                'contact' => 000,
                'gender' => 'Male',
                'status' => 0
            ]
        ]);

        DB::table('instructors')->insert([
            [
                'username' => 'rosa@cms',
                'chair_id' => 1,
                'email' => 'rosa@gmail.com',
                'password' => 'password',
                'Fname' => 'rosa',
                'Mname' => 'bbb',
                'Lname' => 'ccc',
                'role' => 'Instructor',
                'contact' => 000,
                'gender' => 'Male',
                'status' => 0
            ],
            [
                'username' => 'helen@cms',
                'chair_id' => 1,
                'email' => 'ha@gmail.com',
                'password' => 'password',
                'Fname' => 'helen',
                'Mname' => 'bbb',
                'Lname' => 'ccc',
                'role' => 'Instructor',
                'contact' => 000,
                'gender' => 'Male',
                'status' => 0
            ],
            [
                'username' => 'bas@cms',
                'chair_id' => 2,
                'email' => 'bas@gmail.com',
                'password' => 'password',
                'Fname' => 'alemu',
                'Mname' => 'bbb',
                'Lname' => 'ccc',
                'role' => 'Instructor',
                'contact' => 000,
                'gender' => 'Male',
                'status' => 0
            ],
            [
                'username' => 't@cms',
                'chair_id' => 2,
                'email' => 't@gmail.com',
                'password' => 'password',
                'Fname' => 'tseaye',
                'Mname' => 'bbb',
                'Lname' => 'ccc',
                'role' => 'Instructor',
                'contact' => 000,
                'gender' => 'Male',
                'status' => 0
            ],
            [
                'username' => 'm@cms',
                'chair_id' => 3,
                'email' => 'm@gmail.com',
                'password' => 'password',
                'Fname' => 'mekuriya',
                'Mname' => 'bbb',
                'Lname' => 'ccc',
                'role' => 'Instructor',
                'contact' => 000,
                'gender' => 'Male',
                'status' => 0
            ],
            [
                'username' => 'y@cms',
                'chair_id' => 3,
                'email' => 'y@gmail.com',
                'password' => 'password',
                'Fname' => 'yonas',
                'Mname' => 'bbb',
                'Lname' => 'ccc',
                'role' => 'Instructor',
                'contact' => 000,
                'gender' => 'Male',
                'status' => 0
            ],
            [
                'username' => 'j@cms',
                'chair_id' => 4,
                'email' => 'j@gmail.com',
                'password' => 'password',
                'Fname' => 'jaffar',
                'Mname' => 'bbb',
                'Lname' => 'ccc',
                'role' => 'Instructor',
                'contact' => 000,
                'gender' => 'Male',
                'status' => 0
            ],
            [
                'username' => 'kb@cms',
                'chair_id' => 4,
                'email' => 'kb@gmail.com',
                'password' => 'password',
                'Fname' => 'keron',
                'Mname' => 'bbb',
                'Lname' => 'ccc',
                'role' => 'Instructor',
                'contact' => 000,
                'gender' => 'Male',
                'status' => 0
            ]
        ]);

        DB::table('c_heads')->insert([
            [
                'chair_id' => 1,
                'course' => 'programming'
            ],
            [
                'chair_id' => 2,
                'course' => 'networking'
            ],
            [
                'chair_id' => 3,
                'course' => 'database'
            ],
            [
                'chair_id' => 1,
                'course' => 'software'
            ]
            ]);

            DB::table('programmings')->insert([
                [
                    'chair_id' => 3,
                    'course' => 'c++',
                    'course_code' => 'cpp-001'
                    ],
                    [
                        'chair_id' => 3,
                        'course' => 'c#',
                        'course_code' => 'csharp-001'
                        ],
                        [
                            'chair_id' => 3,
                            'course' => 'php',
                            'course_code' => 'php-001'
                            ],
                            [
                                'chair_id' => 3,
                                'course' => 'java',
                                'course_code' => 'java-001'
                                ],
                                [
                                    'chair_id' => 3,
                                    'course' => 'html',
                                    'course_code' => 'html-001'
                                    ],
            ]);
            DB::table('software')->insert([
                [
                    'chair_id' => 4,
                    'course' => 'sad',
                    'course_code' => 'sad-001'
                    ],
                    [
                        'chair_id' => 4,
                        'course' => 'softwar',
                        'course_code' => 'sw-001'
                        ],

            ]);
            DB::table('neworkings')->insert([
                [
                    'chair_id' => 2,
                    'course' => 'wireless',
                    'course_code' => 'w-001'
                    ],
                    [
                        'chair_id' => 2,
                        'course' => 'system adminstrator',
                        'course_code' => 'sd-001'
                        ],
                        [
                            'chair_id' => 2,
                            'course' => 'network device and configuration',
                            'course_code' => 'ndac-001'
                            ],
                            [
                                'chair_id' => 2,
                                'course' => 'network design',
                                'course_code' => 'nd-001'
                                ],
                                [
                                    'chair_id' => 2,
                                    'course' => 'ccna',
                                    'course_code' => 'ccna-001'
                                    ],

            ]);
            DB::table('databases')->insert([
                [
                    'chair_id' => 4,
                    'course' => 'DB',
                    'course_code' => 'DB-I-001'
                    ],
                    [
                        'chair_id' => 4,
                        'course' => 'DB II',
                        'course_code' => 'DB-II-001'
                        ],
            ]);

            DB::table('categories')->insert([
                [
                    'CName' => 'Add',
                    'Keyword' => 'add',
                    'CEmp' => 'Dean',
                    'RCEmp' => ''
                ],
                [
                    'CName' => 'Drop',
                    'Keyword' => 'drop',
                    'CEmp' => 'Dean',
                    'RCEmp' => ''
                ],
                [
                    'CName' => 'Hard',
                    'Keyword' => 'hard',
                    'CEmp' => 'Chair',
                    'RCEmp' => ''
                ],
                [
                    'CName' => 'Change',
                    'Keyword' => 'change',
                    'CEmp' => 'Instructor',
                    'RCEmp' => ''

                ],
                [
                    'CName' => 'Password',
                    'Keyword' => 'password',
                    'CEmp' => 'Secretery',
                    'RCEmp' => ''

                ],
                [
                    'CName' => 'Exam',
                    'Keyword' => 'exam',
                    'CEmp' => 'Chair',
                    'RCEmp' => 'Chair'

                ]
            ]);
    }
}
