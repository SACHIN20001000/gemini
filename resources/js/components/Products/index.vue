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
      <div v-if="finalVariant" class="variant">
        <p>Quantity: {{finalVariant.quantity}}</p>
        <p>Sale Price: {{finalVariant.sale_price}}</p>
        <p class="regularprice">Regular Price: {{finalVariant.real_price}}</p>
        <p>weight: {{finalVariant.weight}}</p>
      </div>
      <ul class="variationAttributes" v-if="variationAttributes">
        <li v-for="(varitationattr, vakey) in variationAttributes"
        :key="vakey">
          <ul class="varientAttribute">
            <li>{{varitationattr.type}} :</li>
            <li
              v-for="(variationAttribute,vak) in varitationattr.attributes"
              :key="vak"
            >
              <span
                v-if="selectedlabel(variationAttribute.id) === true"
              >
                <a
                  href="javascript:;"
                  @click="variationUpdate($event,variationAttribute.id,varitationattr.id,varitationattr.type)"
                  class="selectedlabel"
                >
                  <span>{{variationAttribute.name}}</span>
                </a>
              </span>
              <span
                v-else
              >
                <a
                  href="javascript:;"
                  @click="variationUpdate($event,variationAttribute.id,varitationattr.id,varitationattr.type)"
                  class="nonSelectedlabel"
                >
                  <span>{{variationAttribute.name}}</span>
                </a>
              </span>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <p class="outStock">{{varaintOutStock}}</p>
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
import form from 'vuejs-form'

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
      finalVariant:[],
      selectedattrIds:[],
      varaintOutStock:'',
      form: form({
        selectedIds: []
      })
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
      var variation_attributes = this.product.variation_attributes
      var vaarrayCollection=[]
      if(variation_attributes.length>0){
        const _this = this
        variation_attributes.filter(function(varitioonattr,vaindex){
          var vname = varitioonattr.name
          var vid = varitioonattr.id
          var subAttributeArray =[]
          _this.product.attributes.filter(function(attr,attrindex){
            if(varitioonattr.id == attr.attribute_id){
              subAttributeArray.push({id:attr.id,name:attr.name})
            }
          })
          vaarrayCollection.push({type:vname,id:vid,attributes:subAttributeArray})
        })
      }
      this.variationAttributes = vaarrayCollection
      this.firstTimePrice()
    }
  },
  computed: {
    ...mapGetters(['product', 'catErrors','addCartItems'])
  },
  methods: {
    ...mapActions(['getProduct','addCartItem','getCartItems']),
    getProdcut(){
      if (this.$route.params.id) {
        this.getProduct(this.$route.params.id)
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
    variationUpdate(e,attributeId,attnameId,typ){
      var _this = this
      this.selectedattrIds.filter(function(selIds,selind){
        if(selIds.type == typ){
          _this.selectedattrIds[selind].id = attributeId
        }
      })
      var varientsArr=[]

      this.variations.filter(function(varients,varindex){
        var countMatch =0;
        varients.variation_attributes.filter(function(varientAttrs, index){
          _this.selectedattrIds.filter(function(getarrtibuteId,indx){
            if(getarrtibuteId.id == varientAttrs.attribute_id){
              countMatch++
            }
          })
        })
        if(countMatch == _this.selectedattrIds.length){
          varientsArr=varients
        }
      })
      if(varientsArr && varientsArr.id){
        this.finalVariant =[]
        this.finalVariant = varientsArr
        this.varaintOutStock=''
      }else{
        this.varaintOutStock='Option is Out Of Stock.'
      }
    },
    firstTimePrice(){
      var getarrtibuteIds = []
      this.variationAttributes.filter(function(vaattr, vaindex){
        getarrtibuteIds.push({id:vaattr.attributes[0].id,type:vaattr.type})
      })
      this.selectedattrIds=getarrtibuteIds
      var varientsArr=[]
      this.variations.filter(function(varients,varindex){
        var countMatch =0;
        varients.variation_attributes.filter(function(varientAttrs, index){
          getarrtibuteIds.filter(function(getarrtibuteId,indx){
            if(getarrtibuteId.id == varientAttrs.attribute_id){
              countMatch++
            }
          })
        })
        if(countMatch == getarrtibuteIds.length){
          varientsArr=varients
        }
      })

      if(varientsArr && varientsArr.id){
        this.finalVariant =[]
        this.finalVariant = varientsArr
        this.varaintOutStock=''
      }else{
        this.varaintOutStock='Option is Out Of Stock.'
      }
    },
    selectedlabel(selId){
      var selectCount=0
      if(this.finalVariant.variation_attributes)
      {
        this.finalVariant.variation_attributes.filter(function(att,attind){
          if(att.attribute_id == selId){
            selectCount++
          }
        })
        if(selectCount>0){
          return true
        }else{
          return false
        }
      }
    }
  }
}
</script>
