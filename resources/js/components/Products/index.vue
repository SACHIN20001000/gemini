<template>
  <div class="main_product">
    <div class="width50" v-if="variations && variations.length>0">
      <vue-product-slider>
          <template slot="slider">
              <div
                class="slide"
                v-for="variation in variations"
              >
                  <img :src="variation.image" />
              </div>
          </template>

          <template slot="thumbnails">
              <div
                class="thumb"
                v-for="thumbvariation in variations"
              >
                  <img :src="thumbvariation.image" />
              </div>
          </template>
      </vue-product-slider>
    </div>
    <div class="width50" v-else-if="product.gallary && product.gallary.length>0">
      <vue-product-slider>
          <template slot="slider">
              <div
                class="slide"
                v-for="gallery in product.gallary"
              >
                  <img :src="gallery.image_path" />
              </div>
          </template>

          <template slot="thumbnails">
              <div
                class="thumb"
                v-for="thumbgallery in product.gallary"
              >
                  <img :src="thumbgallery.image_path" />
              </div>
          </template>
      </vue-product-slider>
    </div>
    <div class="width50">
      <div class="productDetails" v-if="product">
      <p>Name: {{product.name}}</p>
      <p>Description:</p>
      <div v-html="product.description"></div>
      <p>Quantity: {{quantity}}</p>
      <p>Sale Price: {{price}}</p>
      <p>weight: {{weight}}</p>
      <!--<div class="variations" v-if="variations">
        <ul v-for="variation in variations">
          <li>Real Price: {{variation.real_price}}</li>
          <li>Sale Price: {{variation.real_price}} </li>
          <li>Weight: {{variation.weight}}</li>
          <li>Quantity: {{variation.quantity}}</li>
        </ul>
      </div>-->
      <ul class="variationAttributes" v-if="varitationList">
        <li v-for="(varitationattr, vakey) in varitationList"  :key="vakey">
          <ul class="varientAttribute">
            <li>{{varitationattr.name}} :</li>
            <li
              v-for="(variationAttribute,vak) in product.attributes"  :key="vak"
              v-bind:value="variationAttribute.id"
            >
              <a href="javascript:;" @click="variationUpdate($event,variationAttribute.id)" v-if="varitationattr.id == variationAttribute.attribute_id">
                <span>{{variationAttribute.name}}</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <p>
      <a
        class="button"
        @click="addItemInCart(product.id)"
      >
        <strong>Add to Cart</strong>
      </a>
    </p>
    </div>
  </div>
</template>
<style>
  @import './products.css';
  @import './swipe.css';
</style>
<script>
import {mapActions,mapGetters} from "vuex"
import { VueProductSlider } from 'vue-product-slider'
import Swipe from './swipe'

import imgslider1 from "../../assets/images/pro1.png"
import imgslider2 from "../../assets/images/pro1.png"
import imgslider3 from "../../assets/images/pro1.png"

export default {
  name:"Products",
  components: {
      VueProductSlider,
      Swipe
  },
  data: function () {
    return {
      imgslider1:imgslider1,
      imgslider2:imgslider2,
      imgslider3:imgslider3,
      itemDetails: {
        key: 1,
        product_id: 0,
        quantity: 2,
      },
      variations:{},
      variationAttributes:[],
      price:'',
      weight:'',
      quantity:''
    }
  },
  mounted(){
    this.getProdcut()
  },
  watch: {
    addCartItems(){
      this.getCartItems()
    },
    product(){
      this.variations = this.product.variations
      if(this.variations.length>0){
        this.price = this.variations[0].sale_price
        this.weight = this.variations[0].weight
        this.quantity = this.variations[0].quantity
      }
    },
    /*varitationList(){
      var vaarrayCollection=[]
      if(this.product.variations !=null && this.varitationList.length>0){
        const _this = this
        this.varitationList.filter(function(varitioonattr,vaindex){
          var vname = varitioonattr.name
          _this.product.attributes.filter(function(attr,attrindex){
            if(varitioonattr.id == attr.attribute_id){
              vaarrayCollection.push({type:vname,id:attr.id,name:attr.name})
            }
          })
        })
      }
      this.variationAttributes = vaarrayCollection
    }*/
  },
  computed: {
    ...mapGetters(['product', 'catErrors','addCartItems','varitationList'])
  },
  methods: {
    ...mapActions(['getProduct','addCartItem','getCartItems','getVaritationList']),
    getProdcut(){
      if (this.$route.params.id) {
        this.getProduct(this.$route.params.id)
        this.getVaritationList(this.$route.params.id)
      }
    },
    addItemInCart(proId){
      if(proId){
        const cartkey = localStorage.getItem('cartKey')
        const itemDetails= {
          key: cartkey,
          product_id: proId,
          quantity: 1,
          variation_product_id:0
        }
        this.addCartItem(itemDetails)
      }
    },
    variationUpdate(e,attributeId){

      if(this.variations.length>0){
        var _this = this
        this.variations.filter(function(varients,varindex){
          varients.variation_attributes.filter(function(varientattrs,varattindex){
            if(varientattrs.attribute_id == attributeId ){
              _this.price = varients.sale_price
              _this.weight = varients.weight
              _this.quantity = varients.quantity
            }
          })
        })
      }
    }
  }
}
</script>
