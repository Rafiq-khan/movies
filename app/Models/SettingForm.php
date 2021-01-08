<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingForm extends Model
{
    protected $table = 'setting_form';

    public function form_data()
    {
        return $this->hasMany('App\Models\AdminSettingvalue', 'service_id','service_id')->groupBy('value');
    }
	
	public function users()
    {
        return $this->hasOne('App\Models\AdminSettingvalue', 'service_id','service_id')->groupBy('user_id');
    }

}
