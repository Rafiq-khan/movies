<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminSetting extends Model
{
    protected $table = 'admin_setting';
    //protected $fillable = ['name', 'description'];

    public function form_data()
    {
        return $this->hasMany(SettingForm::class, 'service_id','id');
    }


}
