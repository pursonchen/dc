<?php

use Illuminate\Database\Seeder;
use App\Models\Dish;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);
        // 头像假数据
        $names = [
            '白切鸡',
            '红烧乳鸽',
            '蜜汁叉烧',
            '脆皮烧肉',
            '生肉包',
            '炒河粉',
            '通心菜',
            '一点红',
            '椰汁冰糖燕窝',
            '干蒸',
            '椒盐濑尿虾',
            '白灼虾',
            '干炒牛河',
            '广东早茶',
            '老火靓汤',
            '煲仔饭',
            '罗汉斋',
            '广式烧填鸭',
            '豉汁蒸排骨',
            '菠萝咕噜肉',
            '玫瑰豉油鸡',
            '萝卜牛腩煲',
            '鼎湖上素'
        ];
        
        $units = [
            '碗',
            '碟',
            '个',
            '条',
            '只',
        ];
         // 生成数据集合
        $dishes = factory(Dish::class)
                        ->times(12)
                        ->make()
                        ->each(function ($dish, $index)
                            use ($faker, $names, $units)
        {
            // 从数组中随机取出一个并赋值
            $dish->name = $faker->randomElement($names);
            $dish->unit = $faker->randomElement($units);
        });

         $dish_array = $dishes->toArray();
        // 插入到数据库中
        Dish::insert($dish_array);
    }
}
