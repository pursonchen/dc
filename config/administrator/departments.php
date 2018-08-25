<?php
use App\Models\Department;
return [

    'title' => '部门管理',
    
    'single'  => '部门',

    'model'   => Department::class,

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
            'title'    => '部门名称',
            
        ]
    ],

    'edit_fields' => [
        'name' => [
            'title' => '部门名称',
        ]
    ],
    'filters' => [
        'name' => [
            'title' => '部门名称',
        ],
    ],


];
