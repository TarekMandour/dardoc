<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pageData = [
            'الحالات الادارية',
            'انواع الاجازات',
            'الاقسام',
            'الاعدادات للموقع',
        ];

        for ($i = 0; $i < 4; $i++) {
            # code...

            $permission = Permission::create(['name' => $pageData[$i],
                'parent_name' => "الاعدادات",
                'guard_name' => 'admin'
            ]);
        }

        $pageData = [
            'تقرير الموظفين',
            'تقرير الحالات الادارية',
            'تقرير الاجازات',
        ];

        for ($i = 0; $i < 3; $i++) {
            # code...

            $permission = Permission::create(['name' => $pageData[$i],
                'parent_name' => "التقارير",
                'guard_name' => 'admin'
            ]);
        }

        $pageData = [
            'الصلاحيات والادوار',
        ];

        for ($i = 0; $i < 1; $i++) {
            # code...

            $permission = Permission::create(['name' => $pageData[$i],
                'parent_name' => "الصلاحيات",
                'guard_name' => 'admin'
            ]);
        }

        $pageData = [
            'اضافة موظف',
            'تعديل موظف',
            'حذف موظف',
            'اضافة حالة ادارية',
            'حذف حالة ادارية',
            'اضافة اجازة',
            'حذف اجازة',
        ];

        for ($i = 0; $i < 7; $i++) {
            # code...

            $permission = Permission::create(['name' => $pageData[$i],
                'parent_name' => "الموظفين",
                'guard_name' => 'admin'
            ]);
        }

    }
}
