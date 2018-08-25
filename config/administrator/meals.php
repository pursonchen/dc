<?php
use App\Models\Meal;
return [

    'title' => '餐别管理',
    
    'single'  => '餐别',

    'model'   => Meal::class,

    'permission'=> function()
    {
        return Auth::user()->can('manage_contents');
    },

     // 字段负责渲染『数据表格』，由无数的『列』组成，
    'columns' => [

        // 列的标示，这是一个最小化『列』信息配置的列子，读取的是模型里对应
        // 的属性的值，如 $model->id
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title'    => '餐别名称',
            
        ],
        'order_start_time' => [
            'title' => '订餐开始时间',
        ],

        'order_end_time' => [
            'title'  => '订餐结束时间',
        ],
        'eat_start_time' => [
            'title'  => '用餐开始时间',
        ],
        'eat_end_time' => [
            'title'  => '用餐结束时间',
        ],
        'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'name' => [
            'title'    => '餐别名称',
            
        ],
        'order_start_time' => [
            'title' => '订餐开始时间',
        ],

        'order_end_time' => [
            'title'  => '订餐结束时间',
        ],
        'eat_start_time' => [
            'title'  => '用餐开始时间',
        ],
        'eat_end_time' => [
            'title'  => '用餐结束时间',
        ],
    ],  // 『数据过滤』设置
    'filters' => [
        'name' => [
            'title'    => '餐别名称',
            
        ],
        'order_start_time' => [
            'title' => '订餐开始时间',
        ],

        'order_end_time' => [
            'title'  => '订餐结束时间',
        ],
        'eat_start_time' => [
            'title'  => '用餐开始时间',
        ],
        'eat_end_time' => [
            'title'  => '用餐结束时间',
        ],
    ],
    


];
