<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;
	
    protected $table 	   = "product";
    protected $primaryKey  = "id";

    protected $fillable = [
		"category_id",
		"subcategory_id",
		"image",
		"product_name",
		"price",
		"offer_price",
		"weight",
		"dimension",
		"description",
		"gst",
		"share_link",
		
		
		"image1",
		"image2",
		"image3",
		"model",
		"sku",
		"quote_min_value",
		"product_fetures",
		
		"special_discount",
		"start_date",
		"end_date",
		"discount",
		"no_of_unit",
		"region",
		"group",
		"vendor",
		"discount_proof_file",

		"created_at",
		"updated_at",
    ];
    
    public function category_details()
    {
        return $this->hasOne('App\Model\Category', 'id', 'category_id');
    }
    
    public function subcategory_details()
    {
        return $this->hasOne('App\Model\Subcategory', 'id', 'subcategory_id');
    }
}
