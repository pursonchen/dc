<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
        , 'email'
        , 'password'
        , 'introduction'
        , 'avatar'
        , 'gender'
        , 'status'
        , 'department_id'
        , 'title'
        , 'mobile'
        , 'weixin_openid'
        , 'weixin_unionid'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
  
  public function setPasswordAttribute($value)
{
    // 如果值的长度等于 60，即认为是已经做过加密的情况
        if (strlen($value) != 60) {

            // 不等于 60，做密码加密处理
            $value = bcrypt($value);
        }

        $this->attributes['password'] = $value;
}
  
  public function setAvatarAttribute($path)
    {
        // 如果不是 `http` 子串开头，那就是从后台上传的，需要补全 URL
        if ( ! starts_with($path, 'http')) {

            // 拼接完整的 URL
            $path = config('app.url') . "/uploads/images/avatars/$path";
        }

        $this->attributes['avatar'] = $path;
    }

    /**
     * 获得此用户所属部门。
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    } 

    /**
     * 获得此用户所有订单。
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function items()
    {
        return $this->hasManyThrough('App\Models\OrderItem', 'App\Models\Order');
    }
}
