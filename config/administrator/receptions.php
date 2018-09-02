<?php
use App\Models\Reception;
return [

    'title' => '接待订餐明细',
    
    'single'  => '订单',

    'model'   => Reception::class,

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

        'department' => [
            
            'title'    => '部门',
            'output' => function ($canteen, $model) {
             return $model->user->department->name;
            },

        ],         
        'user_id' => [
            'title'    => '订餐人',
             'output' => function ($user, $model) {
                return $model->user->name;
            },
        ],       
        'canteen' => [
            'title'    => '餐厅',
             'output' => function ($canteen, $model) {
             return $model->canteen->name;
            },
        ],         
        'order_sdate' => [
            'title'    => '用餐开始日期',
        ],             
        'order_edate' => [
            'title'    => '用餐结束日期',
        ],         
        'std' => [
            'title'    => '用餐标准',
            'output' => function ($std, $model) {
             return $std . '元/人';
            },
        ],         
        'num' => [
            'title'    => '用餐人数',
        ],      
       
        'created_at' => [
            'title'    => '订单创建日期',
            
        ],            
        'updated_at' => [
            'title'    => '订单修改日期',
            
        ],        
        'closed' => [
            'title'    => '订单是否关闭',
            'output' => function ($closed, $model) {
             return $closed == 1 ? '<div style="color:red">已取消</div>' : '正常';
            },

            
        ],
         'description' => [
            'title'    => '订单备注',
            
        ],  
        'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
         'remark' => [
            'title'    => '订单备注',
            
        ],  
],


];
