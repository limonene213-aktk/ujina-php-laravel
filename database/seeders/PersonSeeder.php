<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Person;

class PersonSeeder extends Seeder
{
    public function run(): void
    {
        // まずマリン船長（宝鐘マリン）を1件固定で入れる
        Person::create([
            'name' => '宝鐘マリン',
            'mail' => 'marine.houshou@example.com',
            'age'  => 17, // ※年齢は設定値。DB用の数字として置いてるだけにゃ
        ]);

        // 残り9件はダミー生成
        Person::factory()->count(9)->create();
    }
}
