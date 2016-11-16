<?php

use App\Business\Application\Application;
use App\Business\Enterprise\Enterprise;
use App\Business\Project\Project;
use App\Core\Authorization\Permission\Permission;
use App\Core\Authorization\Role\Role;
use App\User;
use Illuminate\Database\Seeder;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'admin@medsci-tech.com',
            'password' => bcrypt('md123456'),
            'name' => '超级管理员',
        ]);

        $enterprise = Enterprise::create([
            'name' => '易康伴侣',
            'name_en' => 'ohmate',
            'description' => ''
        ]);
        $application = Application::create([
            'name' => '易康伴侣微信号',
            'name_en' => 'ohmate_wechat',
            'enterprise_id' => $enterprise->id,
            'description' => ''
        ]);

        $role1 = Role::create([
            'name' => 'super-administrator',
            'label' => '超级管理员'
        ]);

        $role2 = Role::create([
            'name' => 'sub-company-administrator',
            'label' => '子公司管理员'
        ]);

        $permission1 = Permission::create([
            'name' => 'manage-users',
            'label' => '管理用户'
        ]);

        $permission2 = Permission::create([
            'name' => 'manage-backend-resources',
            'label' => '后台资源管理'
        ]);

        $permission3 = Permission::create([
            'name' => 'call-interfaces',
            'label' => '调用接口'
        ]);

        $role1->permissions()->save($permission1);
        $role1->permissions()->save($permission2);
        $role2->permissions()->save($permission3);
    }
}
