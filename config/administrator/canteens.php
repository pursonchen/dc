<?php
use App\Models\Canteen;
return [

    'title' => '餐厅管理',
    
    'single'  => '餐厅',

    'model'   => Canteen::class,

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
            'title'    => '餐厅名字',
            
        ],
        'address' => [
            'title' => '餐厅地址',
        ],

        'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'name' => [
            'title' => '餐厅名字',
        ],
        'address' => [
            'title' => '餐厅地址',
        ],
    ],
    'filters' => [
        'name' => [
            'title' => '餐厅名字',
        ],
    ],


];
