<?php
use App\Models\Order;
return [

    'title' => '个人订餐明细',
    
    'single'  => '订单',

    'model'   => Order::class,

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
        'no' => [
            'title'    => '订单号',
        ], 
        'department' => [
            
            'title'    => '部门',
            'output' => function ($canteen, $model) {
             return $model->user->department->name;
            },

        ],  
         'date' => [
            'title'    => '用餐日期',
             'output' => function ($order_date, $model) {
             return $model->items[0]->dish->date;
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
             return $model->items[0]->canteen->name;
            },
        ],      
        'dishes' => [
            'title'    => '菜品',
             'output' => function ($dish, $model) {
               $dishes = '';
               foreach ($model->items as $index => $item)
                 {
                    $dishes = $dishes .($index+1).'、('. $item->meal->name .')'. $item->dish->name . ';<br/>';
                }
             return $dishes;
            },
        ],         
     
        'total_amount' => [
            'title'    => '订单总价',
        ],
        'remark' => [
            'title'    => '订单备注',
            
        ],  
        // 'paid_at' => [
        //     'title'    => '支付时间',
            
        // ],        
        // 'payment_method' => [
        //     'title'    => '支付方式',
            
        // ],        
        // 'payment_no' => [
        //     'title'    => '支付平台订单号',
            
        // ],           
                
        // 'refund_no' => [
        //     'title'    => '退款单号',
            
        // ],           

        //  'refund_status' => [
        //     'title'    => '退款状态',
            
        // ],             
        // 'extra' => [
        //     'title'    => '额外数据',
            
        // ],           
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
