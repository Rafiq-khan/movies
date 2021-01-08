<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminSettingValue extends Model
{
    protected $table = 'admin_setting_value';

     public function form_data()
    {
        return $this->hasOne(SettingForm::class, 'id','service_form_input_id');
    }

}
