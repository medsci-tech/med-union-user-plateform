<?php

use App\Business\Application\Application;
use App\Business\Bean\BeanRate;
use App\Business\Bean\BeanRateType;
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
        $this->createBusinessData();
        $this->createDummyUsers();
    }

    protected function createBusinessData()
    {

        $enterprise = Enterprise::create([
            'name'        => '易康伴侣',
            'name_en'     => 'ohmate',
            'description' => ''
        ]);


        $application = Application::create([
            'name'          => '易康伴侣微信号',
            'name_en'       => 'ohmate_wechat',
            'enterprise_id' => $enterprise->id,
            'description'   => ''
        ]);

        $project0 = Project::create([
            'name'          => '易康消费迈豆回收池',
            'name_en'       => 'ohmate_consume_pool',
            'application_id' => $application->id,
            'description'   => ''
        ]);

        $project = Project::create([
            'name'          => '易康伴侣微信号2016',
            'name_en'       => 'optimizing_health_mate_wechat_2016',
            'application_id' => $application->id,
            'description'   => ''
        ]);

        $bean_rate_type_consume = BeanRateType::create([
            'name' => '消费',
            'name_en' => 'consume',
        ]);

        $bean_rate_type_register = BeanRateType::create([
            'name' => '注册',
            'name_en' => 'register',
        ]);

        $bean_rate_type_learn = BeanRateType::create([
            'name' => '文章学习',
            'name_en' => 'article_learn',
        ]);

        $bean_rate_type_consume_feedback = BeanRateType::create([
            'name' => '推广',
            'name_en' => 'popularize',
        ]);

        $bean_rate0 = BeanRate::create([
            'name' => '消费',
            'name_en' => 'ohmate_wechat_consume',
            'bean_rate_type_id' => $bean_rate_type_consume->id,
            'project_id' => $project0->id,
            'rate' => -100,
        ]);

        $bean_rate1 = BeanRate::create([
            'name' => '注册返迈豆',
            'name_en' => 'ohmate_wechat_register',
            'bean_rate_type_id' => $bean_rate_type_register->id,
            'project_id' => $project->id,
            'rate' => 1000,
        ]);
        $bean_rate2 = BeanRate::create([
            'name' => '易康伴侣学习文章返迈豆',
            'name_en' => 'ohmate_wechat_article_learn',
            'bean_rate_type_id' => $bean_rate_type_learn->id,
            'project_id' => $project->id,
            'rate' => 20,
        ]);
        $bean_rate3 = BeanRate::create([
            'name' => '现金消费上级返迈豆',
            'name_en' => 'ohmate_wechat_cash_consume_upper_feedback',
            'bean_rate_type_id' => $bean_rate_type_consume_feedback->id,
            'project_id' => $project->id,
            'rate' => 2,
        ]);
        $bean_rate4 = BeanRate::create([
            'name' => '现金首单消费上级返迈豆',
            'name_en' => 'ohmate_wechat_first_cash_consume_upper_feedback',
            'bean_rate_type_id' => $bean_rate_type_consume_feedback->id,
            'project_id' => $project->id,
            'rate' => 1000,
        ]);
        $bean_rate4 = BeanRate::create([
            'name' => '易康伴侣推广获得迈豆',
            'name_en' => 'ohmate_popularize',
            'bean_rate_type_id' => $bean_rate_type_consume_feedback->id,
            'project_id' => $project->id,
            'rate' => 1,
        ]);

    }

    protected function createDummyUsers()
    {
        $user = User::create([
            'email'    => 'admin@medsci-tech.com',
            'phone'    => '00000000000',
            'password' => bcrypt('md123456'),
            'name'     => '超级管理员',
        ]);

        $user2 = User::create([
            'email'    => 'admin@ohmate.com',
            'phone'    => '00000000001',
            'password' => bcrypt('ohmate123456'),
            'name'     => '易康管理员',
        ]);

        $role1 = Role::create([
            'name'  => 'super administrator',
            'label' => '超级管理员'
        ]);

        $role2 = Role::create([
            'name'  => 'interface caller',
            'label' => '接口调用者'
        ]);

        $permission1 = Permission::create([
            'name'  => 'manage users',
            'label' => '管理用户'
        ]);

        $permission2 = Permission::create([
            'name'  => 'manage backend resources',
            'label' => '后台资源管理'
        ]);

        $permission3 = Permission::create([
            'name'  => 'call interfaces',
            'label' => '调用接口'
        ]);

        $role1->permissions()->save($permission1);
        $role1->permissions()->save($permission2);
        $role1->permissions()->save($permission3);
        $role2->permissions()->save($permission3);

        $user->assignRole($role1);
    }
}
