<?php 
namespace App\Models;

class User 
{
	public $getFormattedBalance = '';
	Public function fullname()
	{
		return "{$this->name}";
	}

	Public function getFormattedBalance(){
		if($this->balance == '') {
			return "Zero funds";
		}
		return '$' . number_format($this->balance, 2);
	}
}