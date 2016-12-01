<?php

use App\Business\UserRelevance\UpperUserPhone;
use App\User;
use Illuminate\Database\Seeder;

class OhmateHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents(base_path().'/database/seeds/ohmate-user.json');

        $array = json_decode($json, true);

        foreach ($array as $row) {
            $u = User::create([
                'phone' => $row['phone'],
                'unionid' => $row['unionid'],
                'created_at' => $row['created_at']
            ]);

            $u->bean_number = $row['beans_total'];
            if ($row['upper'] != null) {
                $u->upperUserPhones()->save(
                    new UpperUserPhone([
                        'upper_user_phone' => $row['upper']
                    ])
                );
            }
        }
    }
}
