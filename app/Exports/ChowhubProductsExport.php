<?php

namespace App\Exports;

use App\Models\ChowhubProduct;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\withHeadings;
class ChowhubProductsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array {
        return [
            "Id","product","description","sku","pet_type","age","food_type","protein_type","type","store_id","feature_image","real_price","sale_price","weight","quantity","status","created","updated","tags","backend_tags","brands"
        ];
    }
    public function collection()
    {
        return ChowhubProduct::with(['category', 'store', 'productVariation', 'productFeaturePageImage', 'productGallery', 'variationAttributesValue.variationAttributeName'])->get();
    }
}
