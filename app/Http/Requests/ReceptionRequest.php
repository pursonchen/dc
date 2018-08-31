<?php

namespace App\Http\Requests;
use App\Models\Canteen;
use App\Models\Meal;
use Carbon\Carbon;

class ReceptionRequest extends Request
{


     public function rules()
    {
        return [
            'sdate' => 'required|date|after:today',
            'edate' => 'required|date|after:today',
            'mckbox' => 'required',
            'std' => 'required|numeric',
            'num' => 'required|numeric|min:1',
            'description' => 'required',
        ];
    }

     public function messages()
    {
        return [
            'sdate.after' => '用餐开始日期必须晚于今天',
            'edate.after' => '用餐结束日期必须晚于今天',
            'mckbox.required' => '必须填写餐别信息',
            'std.required' => '必须填写用餐标准信息',
            'num.min' => '用餐人数不能少于1人',
            'num.required' => '必须填写用餐人数',
            'description.required' => '必须填写接待事由',
        ];
    }
}
