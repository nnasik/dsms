<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission as Permission;


class PermissionController extends Controller{
    public function createPermissions(){
        
        Permission::create(['name'=>'ap.ap']);
        Permission::create(['name'=>'ap.summary']);
        Permission::create(['name'=>'ap.check']);
        Permission::create(['name'=>'ap.recommend']);
        Permission::create(['name'=>'ap.approve']);

        Permission::create(['name'=>'diary.abstract']);
        Permission::create(['name'=>'diary.summary']);
        Permission::create(['name'=>'diary.check']);
        Permission::create(['name'=>'diary.recommend']);
        Permission::create(['name'=>'diary.approve']);

        Permission::create(['name'=>'mail.mail']);
        Permission::create(['name'=>'calendar.calendar']);
        Permission::create(['name'=>'task.task']);

        Permission::create(['name'=>'dashboard.dashboard']);

    }
}
