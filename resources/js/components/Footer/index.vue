<template>
  <footer class="main_footer">
    <div class="container">
      <div class="row">
        <div class="col-md-9 desk_only">
          <div class="row">
            <div class="col-md-6 foot_menu_1">
              <label class="lab_horiz">Products</label>
              <ul class="foot_nav1">
                <li><a href="#">Pawtect® Pads</a></li>
                <li><a href="#">Dog Belly Bands</a></li>
                <li><a href="#">Pet Blankets</a></li>
                <li><a href="#">Gnawtlers®</a></li>
                <li><a href="#">Pawtect® Blankets</a></li>
                <li><a href="#">Cat Diapers</a></li>
                <li><a href="#">Pawtect® Blanket Plus</a></li>
                <li><a href="#">Accessories</a></li>
                <li><a href="#">SoftSupps®</a></li>
                <li><a href="#">Other Products</a></li>
                <li><a href="#">Dog Diapers</a></li>
              </ul>
            </div>
            <div class="col-md-6 foot_menu_2">
            <ul class="foot_nav2">
              <li><label>Company</label></li>
              <li><a href="#">Our Why</a></li>
              <li><a href="#">Reviews</a></li>
              <li><a href="#">Philanthropy</a></li>
              <li><a href="#">Careers</a></li>
              <li><a href="#">Wholesale</a></li>
              <li><a href="#">Investor Relations</a></li>
              <li><a href="#">Press</a></li>
            </ul>
            <ul class="foot_nav2">
              <li><label>Learn More</label></li>
              <li><a href="#">Pet Parenting™ Blog</a></li>
              <li><a href="#">Subscription Pawgram®</a></li>
              <li><a href="#">Washing Instructions</a></li>
              <li><a href="#">Return/Exchange</a></li>
              <li><a href="#">Warranty</a></li>
              <li><a href="#">Policies</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Help</a></li>
            </ul>
            </div>
          </div>
        </div>
        <div class="mobil_only">
                     <ul class="foot_mobil">
                       <li><a href="#" class="link_bold">Get the App</a></li>
                       <li><a href="#" class="link_bold">Pet Parents+®</a></li>
                       <li><a href="#" class="link_bold">Subscription Pawgram®</a></li>
                       <li><a href="#" class="link_bold">Locations</a></li>
                       <li><a href="#" class="link_bold">Careers</a></li>

                       <div class="foot_devider"></div>
                       <li><a href="#" class="link_bold">Shop</a></li>
                       <li><a href="#" >Dog</a></li>
                       <li><a href="#" >Cat</a></li>
                       <li><a href="#" >Age</a></li>
                       <li><a href="#" >Needs</a></li>

                       <div class="foot_devider"></div>
                       <li><a href="#" class="link_bold">Services</a></li>
                       <li><a href="#" >Services</a></li>
                       <li><a href="#" >DaySpaw®</a></li>
                       <li><a href="#" >Chowologist™</a></li>
                       <li><a href="#" >Click & Pick</a></li>
                       <li><a href="#" >Coming Soon...</a></li>

                        <div class="foot_devider"></div>
                       <li><a href="#" class="link_bold">Learn</a></li>
                       <li><a href="#" >Pet Parenting™ Blog</a></li>
                       <li><a href="#" >Recall</a></li>


                       <div class="foot_devider"></div>
                       <li><a href="#" class="link_bold">Customer Success</a></li>
                       <li><a href="#" >Policies</a></li>
                       <li><a href="#" >Return/Exchange</a></li>
                       <li><a href="#" >Contact Us</a></li>
                       <li><a href="#" >Help</a></li>
                     </ul>

                  </div>
        <div class="col-md-3 foot_3">
          <a href="#" class="paw_logo">
            <img
              :src="imgPaw"
              alt="Paw"
            >
          </a>
          <div class="join_btn">
            <a href="#" class="btn_bl">CLICK FOR OUR EMAIL LIST</a>
            <a href="#" class="btn_rd">JOIN OUR AFFILIATE PROGRAM</a>
          </div>
          <ul class="social_list">
            <li>
              <a href="#">
                <img
                  :src="imgFb"
                  alt="FB"
                >
              </a>
            </li>
            <li>
              <a href="#">
                <img
                  :src="imgInsta"
                  alt="insta"
                >
              </a>
            </li>
            <li>
              <a href="#">
                <img
                  :src="imgUtube"
                  alt="utube"
                >
              </a>
            </li>
            <li>
              <a href="#">
                <img
                  :src="imgLink"
                  alt="Link"
                >
              </a>
            </li>
          </ul>
          <p class="copy_p">© 2021 Pet Parents LLC. All Logos and Trademarks
          belong to their respective owners.
          </p>
        </div>
      </div>
    </div>
  </footer>
</template>
<style>
  @import './footer.css';
</style>
<script>
import imgPaw  from "../../assets/images/paw.png"
import imgFb  from "../../assets/images/fb.png"
import imgInsta  from "../../assets/images/insta.png"
import imgUtube  from "../../assets/images/utube.png"
import imgLink  from "../../assets/images/link.png"

export default {
  name:"Dashboard",
  data: function () {
    return {
      imgPaw: imgPaw,
      imgFb: imgFb,
      imgInsta: imgInsta,
      imgUtube: imgUtube,
      imgLink: imgLink
    }
  }
}
</script>
