<?php


namespace App\Repositories;


use App\Models\Product;

class ProductRepository
{

    /**
     * @param string|null $category
     * @param null $minPrice
     * @param int|null $discounts
     */
    public function show(string $category = null, $minPrice = null)
    {
        $data = Product::when($category, function ($c) use ($category) {
            return $c->wherehas('category', function ($categoryItem) use ($category) {
                return $categoryItem->where('title', $category);
            });
        })->when($minPrice, function ($m) use ($minPrice) {
            return $m->where('price', '<=', $minPrice);
        })->orderBy('created_at')->paginate(5);


        //apply biggest discount
        $data->map(function ($item) {
            $itemPrice = $item->price;
            $item['price'] = ["original" => number_format($item->price),
                "final" =>number_format($item->discount != 0 ? $item->price - ($item->price * $item->discount) /100  : $item->price),
                "discount_percentage" => $item->discount,
                "currency" => Product::CURRENCY];

            if (($item->category->discount != 0) || ($item->discount != 0)) {
                $item['price'] = $this->applyBiggestDiscount($itemPrice, $item->category->discount, $item->discount);
            }
            $item['category title']=$item->category->title;
            $item->makeHidden(['category']);
            return $item;
        });
        return $data;

    }

    /**
     * @param int $productPrice
     * @param int|null $categoryDiscount
     * @param int|null $productDiscount
     * @return array
     */
    private function applyBiggestDiscount(int $productPrice, int $categoryDiscount = null, int $productDiscount = null):array
    {
        $biggestDiscount = $categoryDiscount > $productDiscount ? $categoryDiscount : $productDiscount;
        return ["original" =>number_format($productPrice),
            "final" =>number_format($productPrice -  ($productPrice * $biggestDiscount) /100 ),
            "discount_percentage" => $biggestDiscount,
            "currency" => Product::CURRENCY];

    }


}
