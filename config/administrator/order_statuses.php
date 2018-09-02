<?php
use App\Models\OrderStatus;
return [

    'title' => '订餐汇总',
    
    'single'  => '汇总',

    'model'   => OrderStatus::class,

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
        'order_date' => [
            'title'    => '用餐日期',
        ],         
        'canteen' => [
            'title'    => '餐厅',
        ], 
        'breakfast_count' => [
            
            'title'    => '早餐数',


        ],  
         'lunch_count' => [
            'title'    => '午餐数',

        ],           
        'supper_count' => [
            'title'    => '晚餐数',

        ],       
        'reception_breakfast_count' => [
            'title'    => '接待早餐数',

        ],      
        'reception_lunch_count' => [
            'title'    => '接待午餐数',

        ],         
     
        'reception_supper_count' => [
            'title'    => '接待晚餐数',
        ],
          
'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],

    ],    
    'edit_fields' => [

         'canteen' => [
            'title'    => '餐厅',
        ], 

        'order_date' => [
            'title'    => '用餐日期',
        ],   

        'breakfast_count' => [
            
            'title'    => '早餐数',


        ],  

         'lunch_count' => [
            'title'    => '午餐数',

        ],   
                
        'supper_count' => [
            'title'    => '晚餐数',

        ],       
        'reception_breakfast_count' => [
            'title'    => '接待早餐数',

        ],      
        'reception_lunch_count' => [
            'title'    => '接待午餐数',

        ],         
     
        'reception_supper_count' => [
            'title'    => '接待晚餐数',
        ], 
],




];
