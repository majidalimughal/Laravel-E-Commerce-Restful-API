<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'description'=>$this->detail,
            'price'=>$this->price,
            'totalPrice'=>round((1-($this->discount/100))*$this->price,2),
            'stock'=>$this->stock>0 ? $this->stock : 'Out of Stock',
            'discount'=>$this->discount,
            'rating'=>$this->reviews->count()>0 ? round($this->reviews->sum('star')/$this->reviews->count(),1): 'No Ratings Yet',
            'href'=>[
                'reviews'=>route('reviews.index',$this->id)
            ]
        ];
    }
}
