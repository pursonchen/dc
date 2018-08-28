<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Models\Canteen;
use App\Models\Meal;
use Carbon\Carbon;

class OrderRequest extends Request
{
    public function rules()
    {
        return [
            'date' => 'required|date',
             'listItems' => 'required|array',
        ];
    }

     public function messages()
    {
        return [
            // 'date.after' => '订餐日期必须大于今天',
            'listItems.required' => '必须填写菜单信息',
        ];
    }
}