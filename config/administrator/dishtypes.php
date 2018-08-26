<?php
use App\Models\Dishtype;
return [

    'title' => '菜类管理',
    
    'single'  => '菜类',

    'model'   => Dishtype::class,

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
            'title'    => '菜类名称',
            
        ],'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'name' => [
            'title' => '菜类名称',
        ]
    ],
    'filters' => [
        'name' => [
            'title' => '菜类名称',
        ],
    ],


];
