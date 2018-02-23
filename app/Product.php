<?php

namespace App;

use App\Category;
use App\Seller;
use App\Transaction;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use SoftDeletes;
	
	const AVAILABLE_PRODUCT = 'available';
	const UNAVAILABLE_PRODUCT = 'unavailable';
	
	protected $dates = ['deleted_at'];

	protected $fillable = [
  	'name',
  	'description',
  	'quatity',
  	'status',
  	'image',
  	'seller_id'
  ];

	public function isAvailable()
	{
		return $this->status == Product::AVAILABLE_PRODUCT;
	}

	public function seller()
	{
		return $this->belongsTo(Seller::class);
	}

	public function transactions()
	{
		return $this->hasMany(Transaction::class);
	}

	public function categories()
	{
		return $this->belongsToMany(Category::class);
	}

}
