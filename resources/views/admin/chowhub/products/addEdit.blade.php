@extends('admin.layouts.app')
@section('content')

<style>.imageSize{height: 100px;width: 100px;} .tag{color:black !important;background-color: aqua;font-size: 15px;}</style>
<div class="container">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Products</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{isset($product) ? $product->name : 'Add New' }}</span>
            </div>
        </div>
        <a class="btn btn-main-primary ml_auto" href="{{ route('chowhub-products.index') }}">View Products</a>
    </div>
    <!-- breadcrumb -->
    <!--Row-->
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        {{isset($product) ? 'Update # '.$product->id : 'Add New' }}
                    </div>

                    <form  id="product-add-edit" action="{{isset($product) ? route('chowhub-products.update',$product->id) : route('chowhub-products.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ isset($product) ? method_field('PUT'):'' }}
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="form-label mg-b-0">Title</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="productName"  placeholder="Enter your name" type="text" value="{{isset($product) ? $product->productName : '' }}">

                                        </div>
                                    </div>
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="form-label mg-b-0">Tags</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">

                                            <input type="text" name="tag" placeholder="Tags" value="{{isset($product) ? $product->availTags : '' }}" data-role="tagsinput" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="form-label mg-b-0">Description </label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">

                                            <textarea name="description"  id="hiddenDescription">{{isset($product) ? $product->description : '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="form-label mg-b-0">Feature Image(619px*577px) </label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            @if(!empty($product->feature_image))
                                            <input type="file" class="dropify" data-default-file="{{$product->feature_image}}"  onchange="return CheckDimensionFeatureImage()" name="feature_image"  id="feature_image">

                                            @else
                                            <input type="file" class="dropify"  name="feature_image"  onchange="return CheckDimensionFeatureImage()" id="feature_image">


                                            @endif
                                        </div>
                                    </div>
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="form-label mg-b-0">Media (619px*577px) </label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">

                                                            <input id="product-galary" type="file" name="images" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" multiple>
                                                            <ul id="product-galary-items"></ul>
                                                            @if(isset($product))
                                                            @foreach($product->productGallery as $image)
                                                            <div id="imgDel{{$image->id}}"><a href="{{$image->image_path}}" target="_blank" data-item-id="{{$image->id}}"> <img src="{{$image->image_path}}"  alt="" height=50 width=50></a><i class="fas fa-trash-alt"  onclick='delImage({{$image->id}})'></i></div>
                                                            @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="form-label mg-b-0">Category</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select name="category_id"  class="form-control">
                                                @foreach($categories as $category)
                                                <option {{ (isset($product) && $product->category_id  == $category->id) ? 'selected' : '' }}  value="{{$category->id}}">  {{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="form-label mg-b-0">Store</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select name="store_id"  class="form-control">
                                                @foreach($stores as $store)
                                                <option {{ (isset($product) && $product->store_id  == $store->id) ? 'selected' : '' }}  value="{{$store->id}}">  {{$store->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="form-label mg-b-0">Status</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select name="status" class="form-control">
                                                <option value="1" {{ (isset($product) && $product->status  == 1) ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ (isset($product) && $product->status  == 0) ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Pricing</h4>
                                    <div class="row row-xs align-items-center mg-b-20" >
                                        <div class="col-md-4">
                                            <label class="form-label mg-b-0">Regular price (₹)</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="real_price" value="{{isset($product) ? $product->real_price : '' }}" type="number" >
                                        </div>
                                    </div>
                                    <div class="row row-xs align-items-center mg-b-20" >
                                        <div class="col-md-4">
                                            <label class="form-label mg-b-0">Sale Price</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="sale_price" value="{{isset($product) ? $product->sale_price : '' }}" type="number" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Inventory</h4>
                                    <div class="row row-xs align-items-center mg-b-20" id="sku">
                                        <div class="col-md-4">
                                            <label class="form-label mg-b-0">SKU</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="sku" value="{{isset($product) ? $product->sku : '' }}" type="text" >
                                        </div>
                                    </div>
                                    <div class="row row-xs align-items-center mg-b-20" >
                                        <div class="col-md-4">
                                            <label class="form-label mg-b-0">Stock quantity</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="qty" value="{{isset($product) ? $product->quantity : '' }}" type="number" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Shipping</h4>
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="form-label mg-b-0">Weight</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="weight" value="{{isset($product) ? $product->weight : '' }}" type="number">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Attributes</h4>
                                    <table class="table table-bordered" id="attributes_fields">
                                        <tr>
                                            <td>
                                                <input type="text"  id="name_attributes" placeholder="Enter your Name" class="form-control tableData" />

                                            </td>
                                            <td><input type="text"   id="value_attributes" placeholder="Enter your value with (,) seperated" class="form-control tableData" />
                                            </td>
                                            <td><button type="button" name="add" onclick="productsEvent.addAttributes()"  id="add" class="btn btn-success">Save</button></td>

                                        </tr>
                                    </table>


                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Variants</h4>


                                    <table class="table table-bordered" >
                                        <thead id="variations_heading">

                                        </thead>
                                        <tbody id="variations_fields">

                                        </tbody>
                                    </table>



                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Description Image(1238px*653px)</h4>

                                    <div class="row row-xs align-items-center mg-b-20">

                                        <div class="col-md-12 mg-t-5 mg-md-t-0">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">

                                                            <input id="description-image" type="file" name="description_images" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" multiple>
                                                            <div class="sortable ui-sortable">
                                                                <ul id="description-image-items"></ul></div>
                                                            <div class="sortable ui-sortable">
                                                                @if(isset($product))
                                                                @foreach($product->productDescriptionImage as $image)
                                                                <div class="card-draggable">
                                                                    <div id="imgDespDel{{$image->id}}">

                                                                        <a href="{{$image->image_path}}" target="_blank" data-item-id="{{$image->id}}"> <input type="hidden" name="description_images[]" value="{{$image->image_path}}"><img src="{{$image->image_path}}"  alt="" height=400 width=800>

                                                                        </a><i class="fas fa-trash-alt"  onclick='delDespImage({{$image->id}})'></i></div>

                                                                </div>
                                                                @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Experiential Page Images(1238px*653px)</h4>

                                    <div class="row row-xs align-items-center mg-b-20">

                                        <div class="col-md-12 mg-t-5 mg-md-t-0">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">

                                                            <input id="feature-page-image" type="file" name="description_images" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" multiple>
                                                            <div class="sortable ui-sortable">
                                                                <ul id="feature-page-image-items"></ul>
                                                            </div>
                                                            <div class="sortable ui-sortable">
                                                                @if(isset($product))
                                                                @foreach($product->productFeaturePageImage as $image)
                                                                <div id="imgfeatureDel{{$image->id}}">
                                                                    <div class="card-draggable">
                                                                        <a href="{{$image->image_path}}"  target="_blank" data-item-id="{{$image->id}}"> <img src="{{$image->image_path}}"  alt="" height=400 width=800>
                                                                            <input type="hidden" name="feature_page_images[]" value="{{$image->image_path}}">
                                                                        </a><i class="fas fa-trash-alt"  onclick='delFeatureImage({{$image->id}})'></i></div>

                                                                </div>
                                                                @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>

                        <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">{{isset($product) ? 'Update' : 'Save' }}</button>
                    </form>
                    <!-- form end  -->

                </div>
            </div>
        </div>
        <!-- /row -->
    </div>


    @endsection

    @section('scripts')

    <link rel="stylesheet" href="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <script src="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
//validate image height width
function CheckDimensionFeatureImage() {
     var fileUpload = document.getElementById("feature_image");
        if (typeof (fileUpload.files) != "undefined") {
            var reader = new FileReader();
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                var image = new Image();
                image.src = e.target.result;
                image.onload = function () {
                    var height = this.height;
                    var width = this.width;
                    if (height != 619  || width != 577) {
                        swal("Image size should be 619px*577px.Please again upload image! ");
                        $("#feature_image").val('');
                        return false;
                    }
                    return true;
                };
            }
        } else {
            alert("This browser does not support HTML5.");
            return false;
        }
}
// trext editor section
                                            $('#hiddenDescription').summernote({
                                                toolbar: [
                                                ['font', ['bold', 'italic', 'underline', 'clear']],
                                                ['insert', ['link','image', 'doc', 'video']],
                                                ['misc', ['codeview']],
                                                ],
                                            height: 400
                                            });
                                            //product js
                                            var productsEvent;
                                            (function() {
                                            var attributes = [];
                                            var variations = [];
                                            productsEvent = {
                                            initialize: function() {
                                            attributes = {!! json_encode($attributes) !!};
                                            variations = {!! json_encode($variations) !!};
                                            productsEvent.displayAttributes();
                                            productsEvent.displayVariations();
                                            },
                                                    getAllAttributes()
                                            {

                                            },
                                                    addAttributes:function()
                                                    {

                                                    let attributeName = $("#name_attributes").val();
                                                    let value_attributes = $("#value_attributes").val();
                                                    if (value_attributes.length != 0 && attributeName.length != 0){
                                                    var removeLastQuama = value_attributes.charAt(value_attributes.length - 1);
                                                    if (removeLastQuama != ','){
                                                    let attributeValues = value_attributes.split(",");
                                                    attributes[attributeName] = attributeValues;
                                                    productsEvent.displayAttributes();
                                                    productsEvent.createVariations();
                                                    } else(
                                                        swal("Their is not (,) at the last of your value ")

                                                            )


                                                    } else{
                                                        swal("Both Feild is Required ")

                                                    }


                                                    },
                                                    displayAttributes:function() {
                                                    $(".dynamic_attributes").remove();
                                                    for (const [attr, values] of Object.entries(attributes))
                                                    {
                                                    let cellValue = values.toString();
                                                    $("#attributes_fields").prepend('<tr class="dynamic_attributes" id="row' + attr + '"><td><input type="text" disabled="true" name="attributes[name][]"  value="' + attr + '" placeholder="Enter your Name" class="form-control tableData" /></td><td><input type="text" readonly="true" value="' + cellValue + '" name="attributes[' + attr + ']"  placeholder="Enter your value with (,) seperated" class="form-control tableData" /></td><td><button type="button" name="remove" onclick="productsEvent.removeAttributes(\'' + attr + '\')" class="btn btn-danger btn_remove">X</button></td></tr>');
                                                    }
                                                    $("#name_attributes").val('');
                                                    $("#value_attributes").val('');
                                                    },
                                                    createVariations:function() {
                                                    let attrs = [];
                                                    if (Object.keys(attributes).length)
                                                    {
                                                    for (const [attr, values] of Object.entries(attributes))
                                                            attrs.push(values.map(v => ({[attr]:v})));
                                                    attrs = attrs.reduce((a, b) => a.flatMap(d => b.map(e => ({...d, ...e}))));
                                                    $.each(attrs, function(index, value) {
                                                    attrs[index]['Qty'] = {value:0, name:'qty', placeholder:"Qty", type:'number', customClass:""};
                                                    attrs[index]['Weight'] = {value:0, name:'weight', placeholder:"weight", type:'number', customClass:""};
                                                    attrs[index]['Regular Price'] = {value:0, name:'regular_price', placeholder:"Regular Price", type:'number', customClass:""};
                                                    attrs[index]['Sale Price'] = {value:0, name:'sale_price', placeholder:"Sale Price", type:'number', customClass:""};
                                                    attrs[index]['Sku'] = {value:0, name:'sku', placeholder:"Sku", type:'text', customClass:""};
                                                    attrs[index]['Image(360px*360px)'] = {value:null, name:'image', placeholder:"Image", type:'file', customClass:"dropify   "};
                                                    });
                                                    variations = attrs;
                                                    productsEvent.displayVariations();
                                                    }
                                                    },
                                                    displayVariations:function() {
                                                    $("#variations_fields").empty();
                                                    $("#variations_heading").empty();
                                                    // console.log(variations);
                                                    if (variations && Object.keys(variations).length)
                                                    {
                                                    let headings = Object.keys(variations[0]);
                                                    $.each(headings, function(index, value) {
                                                    if (value != 'hidden_id'){
                                                    $("#variations_heading").append('<th>' + value + '</th>');
                                                    }
                                                    });
                                                    // console.log(variations)
                                                    $.each(variations, function(index, value) {
                                                    let testdata = {};
                                                    let htmlString = '<tr class="variation-tr">';
                                                    for (const [name, variation] of Object.entries(value))
                                                    {
                                                    if (typeof variation === 'object' && variation !== null)
                                                    {
                                                    if (variation.type == 'hidden'){
                                                    htmlString += '<input  name="variations[' + index + '][' + variation.name + ']" class="form-control hidden_id ' + variation.customClass + '" type="' + variation.type + '" onchange="productsEvent.updateVariationvalue(\'' + index + '\',\'' + name + '\',this.value)"  value="' + variation.value + '" placeholder="' + variation.placeholder + '">';
                                                    } else{
                                                    htmlString += '<td><input  name="variations[' + index + '][' + variation.name + ']" class="form-control tableData ' + variation.customClass + '" data-default-file="' + variation.dataitem + '" type="' + variation.type + '" onchange="productsEvent.updateVariationvalue(\'' + index + '\',\'' + name + '\',this.value)"  value="' + variation.value + '" placeholder="' + variation.placeholder + '"></td>';
                                                    }
                                                    if (variation.src){
                                                    htmlString += '<td><div id="delete_variation_img' + variation.value + ' "> <a href="' + variation.src + '" target="_blank" ><img height=50 style="max-width: 50px;" src="' + variation.src + '" onchange="productsEvent.updateVariationvalue(\'' + index + '\',\'' + name + '\',this.value)" ></a><i class="fas fa-trash-alt" onclick="removeVariationImage(\'' + variation.value + '\')" ></i></div></td>';
                                                    }
                                                    }
                                                    else
                                                    {
                                                    htmlString += '<td><input name="variations[' + index + '][' + name + ']" class="form-control tableData" type="text" readonly="true" value="' + variation + '" placeholder="' + variation + '"></td>';
                                                    }

                                                    }

                                                    htmlString += '<td><button type="button" name="remove" onclick="productsEvent.removeVariation(\'' + index + '\')" class="btn btn-danger btn_remove">X</button></td>';
                                                    htmlString += '</tr>';
                                                    $("#variations_fields").append(htmlString);
                                                    $('.dropify').dropify();
                                                    });
                                                    }
                                                    },
                                                    removeAttributes:function(attribute_name)
                                                    {
                                                    delete attributes[attribute_name];
                                                    productsEvent.displayAttributes();
                                                    productsEvent.createVariations();
                                                    },
                                                    removeVariation:function(index)
                                                    {
                                                    variations.splice(index, 1);
                                                    productsEvent.displayVariations();
                                                    },
                                                    updateVariationvalue:function(index, key, value)
                                                    {
                                                    variations[index][key].value = value;
                                                    },
                                                    removeProductGalaryImage:function(itemId)
                                                    {
                                                    $('#galary-item' + itemId + '').remove();
                                                    },
                                                    removeFeatureDescriptionImage:function(itemId)
                                                    {
                                                    $('#feature-page-item' + itemId + '').remove();
                                                    },
                                            };
                                            productsEvent.initialize();
                                            })();
                                            $(document).ready(function () {
                                            $.ajaxSetup({
                                            headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            }
                                            });
                                            });
                                            function delImage(id){
                                            var data = 'id=' + id;
                                            if (confirm('Are You Sure You Want To Delete This Image')) {
                                            $.ajax({
                                            type:'POST',
                                                    url:'/admin/delete-chowhub-photo',
                                                    data: data,
                                                    success:function(data){
                                                    $('#imgDel' + id + '').remove();
                                                    }
                                            });
                                            }

                                            }
                                            function delDespImage(id){
                                            var data = 'id=' + id;
                                            if (confirm('Are You Sure You Want To Delete This Image')) {
                                            $.ajax({
                                            type:'POST',
                                                    url:'/admin/delete-description-photo',
                                                    data: data,
                                                    success:function(data){
                                                    $('#imgDespDel' + id + '').remove();
                                                    }
                                            });
                                            }

                                            }
                                            function delFeatureImage(id){
                                            var data = 'id=' + id;
                                            if (confirm('Are You Sure You Want To Delete This Image')) {
                                            $.ajax({
                                            type:'POST',
                                                    url:'/admin/delete-feature-page-photo',
                                                    data: data,
                                                    success:function(data){
                                                    $('#imgfeatureDel' + id + '').remove();
                                                    }
                                            });
                                            }

                                            }

                                            function removeVariationImage(id){
                                            var data = 'id=' + id;
                                            if (confirm('Are You Sure You Want To Delete This Image')) {
                                            $.ajax({
                                            type:'POST',
                                                    url:'/admin/delete-variation-img',
                                                    data: data,
                                                    success:function(data){

                                                    $('#delete_variation_img' + id + '').remove();
                                                    }
                                            });
                                            } else {

                                            }
                                            }
                                            $(".sortable div a").each(function(key, index) {
                                            console.log(key + ":" + index);
                                            });
                                            $(function() {
                                            var counter = 1;
                                            $('#product-galary').FancyFileUpload({
                                            url:'/admin/save-chowhub-photo',
                                                    fileupload : {
                                                    maxChunkSize : 1000000
                                                    },
                                                    uploadcompleted : function(e, data) {

                                                    $("#product-galary-items").prepend('<div class="card-draggable"><li id="galary-item' + counter + '"><img class="imageSize" src="' + data.result.image + '" /><i class="fas fa-trash-alt" onclick="productsEvent.removeProductGalaryImage(' + counter + ')"></i><input type="hidden"  value="' + data.result.image + '" name="image[]"  /></li></div>');
                                                    counter ++
                                                            data.ff_info.RemoveFile();
                                                    }
                                            });
                                            });
                                            $(function() {
                                            var counter = 1;
                                            $('#description-image').FancyFileUpload({
                                            url:'/admin/save-description-photo',
                                                    fileupload : {
                                                    maxChunkSize : 1000000
                                                    },
                                                    uploadcompleted : function(e, data) {

                                                    $("#description-image-items").prepend('<div class="card-draggable"><li id="description-item' + counter + '"><img class="imageSize" src="' + data.result.image + '" /><i class="fas fa-trash-alt" onclick="productsEvent.removeProductDescriptionImage(' + counter + ')"></i><input type="hidden"  value="' + data.result.image + '" name="description_images[]"  /></li></div>');
                                                    counter ++
                                                            data.ff_info.RemoveFile();
                                                    }
                                            });

                                            });
                                            $(function() {
                                            var counter = 1;

                                            $('#feature-page-image').FancyFileUpload({
                                            url:'/admin/save-description-photo',
                                                    fileupload : {
                                                    maxChunkSize : 1000000
                                                    },

                                                    uploadcompleted : function(e, data) {

                                                    $("#feature-page-image-items").prepend('<div class="card-draggable"><li id="feature-page-item' + counter + '"><img class="imageSize" src="' + data.result.image + '" /><i class="fas fa-trash-alt" onclick="productsEvent.removeFeatureDescriptionImage(' + counter + ')"></i><input type="hidden"  value="' + data.result.image + '" name="feature_page_images[]"  /></li></div>');
                                                    counter ++
                                                            data.ff_info.RemoveFile();
                                                    }
                                            });
                                            });
    </script>

    @if(isset($product))
    {!! JsValidator::formRequest('App\Http\Requests\Admin\Chowhub\Product\UpdateProduct','#product-add-edit') !!}
    @else
    {!! JsValidator::formRequest('App\Http\Requests\Admin\Chowhub\Product\AddProduct','#product-add-edit') !!}
    @endif

    @endsection
