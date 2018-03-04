<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // makeVisible 方法临时显示 User 模型里指定的隐藏属性
        $users = factory(User::class)->times(50)->make();
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

        // 更新第一个用户
        $user = User::find(1);
        $user->name='admin';
        $user->email = 'liaobw@dino-tech.com';
        $user->password = bcrypt('123456');
        $user->activated = true;
        $user->is_admin = true;
        $user->save();
    }
}
