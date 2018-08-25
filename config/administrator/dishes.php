<?php
use App\Models\Dish;
return [

    'title' => '菜品管理',
    
    'single'  => '菜品',

    'model'   => Dish::class,

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
            'title'    => '菜品名称',
            
        ],        
        'unit' => [
            'title'    => '计量单位',
            
        ],        
        'price' => [
            'title'    => '单价',
            
        ],        
        'pic' => [
            'title'    => '图片',
            'output' => function ($pic, $model) {
                return empty($pic) ? 'N/A' : '<img src="'.$pic.'" width="40">';
            },

            // 是否允许排序
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'name' => [
            'title'    => '菜品名称',
            
        ],        
        'unit' => [
            'title'    => '计量单位',
            
        ],        
        'price' => [
            'title'    => '单价',
            
        ],        
        'pic' => [
            'title'    => '图片',
 

          // 设置表单条目的类型，默认的 type 是 input
            'type' => 'image',

            // 图片上传必须设置图片存放路径
            'location' => public_path() . '/uploads/images/dishes/',
    ]
],


];
