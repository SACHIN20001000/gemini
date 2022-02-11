<template>
  <div>
    <div class="menu-container" @mouseover="mouseEvent($event, 'wrapper')">
      <div class="menu_nav">
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a
                    @mouseover="mouseEvent($event, 'item', 'shop')"
                    class="item nav-link"
                    aria-current="page"
                  >
                    SHOP
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">SERVICES</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">ABOUT US </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">SUBSCRIPTION PAWGRAM<sup>®</sup></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link "  href="#">PET PARENTS+<sup>®</sup> </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">APP
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">LEARN</a>
                </li>
                <li class="nav-item lb_no">
                  <a class="nav-link" href="#">HELP</a>
                </li>
                 </li>
                <li class="nav-item nv mobil_only">
                  <router-link
                    :to="{ path: '/signin'}"
                    class="alink log_btn"
                  >
                    Login
                  </router-link>

                  <li class="nav-itemnv mobil_only">
                  <router-link
                :to="{ path: '/register'}"
                class="alink sign_btn"
              >
                register
              </router-link>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <MegaMenu v-if="showMegaMenu" />
    <div class="viewport-warning">
      <div class="message">
        This example was made for viewport sizes 920px and above :)
      </div>
    </div>
  </div>
</template>

<script>
import MegaMenu from "./MegaMenu";
import eventBus from "../eventBus";
import logo from "../assets/images/logo.svg"
import magnifier from "../assets/images/magnifier.svg"
import menu from "../assets/images/menu.svg"
import users from "../assets/images/users.svg"

export default {
  name: "NavBar",
  components: {
    MegaMenu,
  },
  data() {
    return {
      showMegaMenu: false,
      logo:logo,
      magnifier:magnifier,
      menu:menu,
      users:users,
    };
  },
  methods: {
    mouseEvent(event, source, key = "") {
      if (source === "item") {
        event.stopPropagation();
      }
      this.showMegaMenu = key === "shop";
    },
  },
  mounted() {
    eventBus.$on("hide-mega-menu", () => {
      this.showMegaMenu = false;
    });
  },
  beforeDestroy() {
    eventBus.$off("hide-mega-menu");
  },
};
</script>

<style scoped lang="scss">
@import './Header/header.css';
.menu-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid #a4a4a4;
}

.logo {
  display: flex;
  height: 33px;
  cursor: pointer;
  padding-left: 30px;
}

.icons {
  display: inline-flex;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.icon {
  cursor: pointer;
  display: flex;
  padding: 22px 30px;
}

.icon:hover {
  background: #efefef;
}

.icon.menu {
  @media (min-width: 921px) {
    display: none;
  }
}

.items {
  display: inline-flex;
  height: 101%;
  overflow: hidden;
  @media (max-width: 920px) {
    display: none;
  }
}

.item {
  cursor: pointer;
  height: 100%;
  align-items: center;
  height: 100%;
  display: flex;
  padding: 0 15px;
}

.item:hover {
  background: #efefef;
}

.viewport-warning {
  width: 100%;
  height: 100vh;
  position: absolute;
  top: 0;
  left: 0;
  background: rgba(255, 255, 255, 0.5);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 18px;
  font-weight: bold;
  @media (min-width: 921px) {
    display: none;
  }

  .message {
    padding: 15px;
  }
}
</style>
