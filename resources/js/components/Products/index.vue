<template>
  <div class="main_product">
    <div class="width100" v-if="variations && variations.length>0">
      <div class="width50">
        <div class="thumb-example">
          <!-- swiper1 -->
          <swiper class="swiper gallery-top" :options="swiperOptionTop" ref="swiperTop">
            <swiper-slide
              v-for="(variation, varky) in variations"
              :key="varky"
              :class="'slide-'+varky"
            >
              <img :src="variation.image" />
            </swiper-slide>
            <div class="swiper-button-next swiper-button-white" slot="button-next"></div>
            <div class="swiper-button-prev swiper-button-white" slot="button-prev"></div>
          </swiper>
          <!-- swiper2 Thumbs -->
          <swiper class="swiper gallery-thumbs" :options="swiperOptionThumbs" ref="swiperThumbs">
            <swiper-slide
              v-for="(variation, varky) in variations"
              :key="varky"
              :class="'slide-'+varky"
            >
              <img :src="variation.image" />
            </swiper-slide>
          </swiper>
        </div>
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
      </div>
    </div>
    <div class="width100"  v-else>
      <div class="width50">
        <div class="thumb-example">
          <!-- swiper1 -->
          <swiper class="swiper gallery-top" :options="swiperOptionTop" ref="swiperTop">
            <swiper-slide
              v-for="(gallery, gky) in product.gallary"
              :key="gky"
              :class="'slide-'+gky"
            >
              <img :src="gallery.image_path" />
            </swiper-slide>
            <div class="swiper-button-next swiper-button-white" slot="button-next"></div>
            <div class="swiper-button-prev swiper-button-white" slot="button-prev"></div>
          </swiper>
          <!-- swiper2 Thumbs -->
          <swiper class="swiper gallery-thumbs" :options="swiperOptionThumbs" ref="swiperThumbs">
            <swiper-slide
              v-for="(gallery, gky) in product.gallary"
              :key="gky"
              :class="'slide-'+gky"
            >
              <img :src="gallery.image_path" />
            </swiper-slide>
          </swiper>
        </div>
      </div>
      <div class="width50">
        <div class="productDetails" v-if="product">
          <p>Name: {{product.name}}</p>
          <p>Description:</p>
          <div v-html="product.description"></div>
          <p>Quantity: {{product.quantity}}</p>
          <p>Sale Price: ${{product.sale_price}}</p>
          <p class="regularprice">Regular Price: ${{product.real_price}}</p>
          <p>weight: {{product.weight}} Kg</p>
        </div>
      </div>
    </div>
    <div class="addtocartbtn">
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

import imgslider1 from "../../assets/images/pro1.png"
import imgslider2 from "../../assets/images/pro1.png"
import imgslider3 from "../../assets/images/pro1.png"
import form from 'vuejs-form'

import { Swiper, SwiperSlide, directive } from 'vue-awesome-swiper'
import 'swiper/css/swiper.css'

export default {
  name:"Products",
  components: {
    Swiper,
    SwiperSlide
  },
  directives: {
    swiper: directive
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
      }),
      swiperOptionTop: {
        loop: true,
        loopedSlides: 5, // looped slides should be the same
        spaceBetween: 10,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev'
        }
      },
      swiperOptionThumbs: {
        loop: true,
        loopedSlides: 5, // looped slides should be the same
        spaceBetween: 10,
        centeredSlides: true,
        slidesPerView: 'auto',
        touchRatio: 0.2,
        slideToClickedSlide: true
      },
      swiperTop:'',
      swiperThumbs:''
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

      this.$nextTick(() => {
        this.swiperTop = this.$refs.swiperTop.$swiper
        this.swiperThumbs = this.$refs.swiperThumbs.$swiper
        this.swiperTop.controller.control = this.swiperThumbs
        this.swiperThumbs.controller.control = this.swiperTop
      })
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
        var vid=0

        if(this.finalVariant && this.finalVariant.id){
          vid = this.finalVariant.id
        }
        const itemDetails= {
          key: cartkey,
          product_id: proId,
          quantity: 1,
          variation_product_id: vid
        }
        this.addCartItem(itemDetails)
      }
    },
    variationUpdate(e,attributeId,attnameId,typ){
      var switchTumnb=0
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
          switchTumnb = varindex
          varientsArr=varients
        }
      })
      if(varientsArr && varientsArr.id){
        this.finalVariant =[]
        this.finalVariant = varientsArr
        this.varaintOutStock=''
        this.toggleSlide(Number(switchTumnb)+Number(1))
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
    },
    toggleSlide(i) {
      this.swiperTop.slideTo(i, 0,true)
    }
  }
}
</script>
