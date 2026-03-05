# シーダーを作ろう！

## シーダーisなに？
初期データのことです。テーブルを作っても、データ自体は空っぽのままですよね？そこで、テーブル作成作業とは別に、データ投入という作業があります。  
しかし、データ投入を手動で大量に行うのは、けっこう大変です。そこで、シーダーというデータを作って、初期データを大量にテーブルに登録する方法があるので、それを紹介します。  


# やり方
- Step1：まずFactoryを作る：

擬似データを作成する「工場（Factory）」を作る！

```bash
sail artisan make:factory PersonFactory --model=Person
```

これで、`database/factories/PersonFactory.php`ができるので、これを編集します
：  

```php
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'mail' => fake()->unique()->safeEmail(),
            'age'  => fake()->numberBetween(16, 60),
        ];
    }
}
```

- Step2：Seederを作る

これが擬似データの本体です！

```bash
sail artisan make:seeder PersonSeeder
```

すると、`database/seeders/PersonSeeder.php`ができるので、これを編集します：

```php
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
```


- Step3:DatabaseSeederから呼ぶ！

`database/seeders/DatabaseSeeder.php`：

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(PersonSeeder::class);
    }
}
```

- Step4:実行

1. 既存データ消して入れ直す：

```bash
php artisan migrate:fresh --seed
```

2. 追加だけする：

```bash
php artisan db:seed --class=PersonSeeder
```

### 注意点
`Person::create()` を使うなら、`app/Models/Person.php` にこれが必要なことが多い：

```php
protected $fillable = ['name', 'mail', 'age'];
```