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
# Laravel Seeder 入門（初心者向け）

このドキュメントは、`people` テーブルにテストデータを入れるまでを、最短手順でまとめたものです。

## Seeder / Factory って何？
- **Factory**: ダミーデータの「設計図」（どんな値を作るか）
- **Seeder**: 実際に DB にデータを投入する処理

## 1) Factory を作る

```bash
sail artisan make:factory PersonFactory --model=Person
```

`database/factories/PersonFactory.php` を次のようにします。

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

## 2) Seeder を作る

```bash
sail artisan make:seeder PersonSeeder
```

`database/seeders/PersonSeeder.php` の例：

```php
<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    public function run(): void
    {
        //具体的なデータの投入
        Person::create([
            'name' => '宝鐘マリン',
            'mail' => 'marine.houshou@example.com',
            'age'  => 17,
        ]);

        //適当なデータの自動生成
        Person::factory()->count(9)->create();
    }
}
```

## 3) DatabaseSeeder から呼ぶ（重要）

`database/seeders/DatabaseSeeder.php` に以下を入れます。

```php
$this->call(PersonSeeder::class);
```

これを書かないと、`migrate:fresh --seed` しても `PersonSeeder` は実行されません。

## 4) 実行コマンド

- 全削除して作り直し + シード

```bash
sail artisan migrate:fresh --seed
```

- 既存テーブルに追加で `PersonSeeder` だけ実行

```bash
sail artisan db:seed --class=PersonSeeder
```

## 5) よくあるハマりどころ

### A. `Person::factory()` が動かない
`app/Models/Person.php` に `HasFactory` が必要です。

```php
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Model
{
    use HasFactory;
}
```

### B. `Unknown column 'updated_at'` エラー
`people` テーブルに `created_at`, `updated_at` が無いのに、モデルが自動で保存しようとしている状態です。

今回の構成（`people` に timestamps 無し）では、`app/Models/Person.php` にこれを追加します。

```php
public $timestamps = false;
```

### C. `Person::create()` で保存できない
マスアサインメント設定（`$fillable`）を確認します。

```php
protected $fillable = ['name', 'mail', 'age'];
```

## 6) 投入確認

```bash
sail artisan tinker --execute="echo App\\Models\\Person::count();"
```

`10` と表示されれば、固定 1 件 + ダミー 9 件で成功です。