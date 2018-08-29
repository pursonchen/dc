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
            'date' => 'required|date|after:today',
            'mckbox' => 'required',
            'listItems' => 'required',
        ];
    }

     public function messages()
    {
        return [
            'date.after' => '用餐日期必须晚于今天',
            'listItems.required' => '必须填写菜单信息',
            'mckbox.required' => '必须填写餐别信息',
        ];
    }
}