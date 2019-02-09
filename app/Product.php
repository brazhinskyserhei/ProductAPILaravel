<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =
        [
            'title',
            'price',
            'old_price',
            'description',
            'count,',
            'vendor_code',
            'status',
            'is_featured',
            'is_new',
            'discount',
            'image'
        ];

    /*Relation*/
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_product', 'product_id', 'category_id');
    }

    public function saveImage($image)
    {
        if ($image) {
            $filename = str_random(10) . '.' . $image->extension();
            $image->storeAs('images/products', $filename);
            $this->image = $filename;
            $this->save();
        } else {
            return;
        }
    }

    public function uploadImage($image){
        if($image==null){
            return;
        }
        if($this->image !=null){
            Storage::delete('uploads/products/'. $this->image);
        }
        $filename = str_random(10). '.' .$image->extension();
        $image->storeAs('uploads/products',$filename);
        $this->image = $filename;
        $this->save();
    }



    /*Acsessor*/
    public function getImageAttribute($image)
    {
        if (!$image) {
            return env('APP_URL') . '/public/images/products/no-avatar.jpg';
        } else {
            return env('APP_URL') . '/public/images/products/' . $image;
        }
    }


}
