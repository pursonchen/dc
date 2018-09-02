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
        'dishtype_id' => [
            'title'    => '菜类',
            'output' => function ($type, $model) {
                return $model->dishtype->name;
            },
        ],        
        'meal_id' => [
            'title'    => '餐别',
            'output' => function ($meal, $model) {
                return $model->meal->name;
            },
        ],        
        'canteen_id' => [
            'title'    => '餐厅',
            'output' => function ($canteen, $model) {
                return $model->canteen->name;
            },
        ],
        'name' => [
            'title'    => '菜品名称',
            
        ],  
        'date' => [
            'title'    => '上市日期',
            
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
        'remark' => [
            'title'    => '备注',
            
        ],  
        'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'dishtype' => [
            'title' => '菜类',
             // 指定数据的类型为关联模型
            'type'       => 'relationship',

            // 关联模型的字段，用来做关联显示
            'name_field' => 'name',
        ],        
        'meal' => [
            'title' => '餐别',
             // 指定数据的类型为关联模型
            'type'       => 'relationship',

            // 关联模型的字段，用来做关联显示
            'name_field' => 'name',
        ],        
        'canteen' => [
            'title' => '餐厅',
             // 指定数据的类型为关联模型
            'type'       => 'relationship',

            // 关联模型的字段，用来做关联显示
            'name_field' => 'name',
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
        'date' => [
            'title'    => '上市日期',
            
        ],        
        'pic' => [
            'title'    => '图片',
 

          // 设置表单条目的类型，默认的 type 是 input
            'type' => 'image',

            // 图片上传必须设置图片存放路径
            'location' => public_path() . '/uploads/images/dishes/',
    ],
       'remark' => [
            'title'    => '备注',
            
        ],  
],
// 『数据过滤』设置
    'filters' => [
        'id' => [

            // 过滤表单条目显示名称
            'title' => '菜品 ID',
        ],
        'name' => [
            'title' => '菜品名称',
        ],
        'meal' => [
            'title' => '餐别',
        ],
        'dishtype' => [
            'title' => '菜类',
        ],
    ],

];
