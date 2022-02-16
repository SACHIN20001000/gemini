<template>
    <div class="MenuPanel">
        <div class="Menu__panel"
            :style="[
                functionalityStyle,
                positionStyle,
                (isTranslating) ? transitionStyle : {}
            ]"
        >
        <div class="back_prev">
            <div> <span v-if="list.title" @click="handleHeaderClicked"> <img :src="m_prev"></span> </div>           

    </div>
        
            <div v-if="list.title" @click="handleHeaderClicked" class="Menu__header">
                <span v-show="showHeaderArrow" class="arrow">
                    <LeftArrowIcon />
                </span>
                {{ list.title }}
            </div>

            <ul class="Menu__list">
                <li v-for="item in list.children"
                    @click="handleItemClicked(item)"
                    class="Menu__item"
                    :class="item.class?item.class:''"
                >
                    <template v-if="item.children.length > 0" :href="item.link">
                        <div class="text">{{ item.title }}</div>
                        <!--<span class="arrow">
                            <RightArrowIcon />
                        </span>-->
                    </template>
                    <a v-else :href="item.link">
                        <div class="text">{{ item.title }}</div>
                    </a>
                </li>
            </ul>
            <div class="bottom_menu">
               <ul>
                   <li><a href="#"><span><img :src="m_cart"></span>Cart</a></li>
                   <li><a href="#"><span><img :src="m_order"></span>Orders</a></li>
                   <li><a href="#"><span><img :src="m_help"></span>Help</a></li>
               </ul> 
            </div>
        </div>

    </div>
</template>

<script>
import RightArrowIcon from './icons/RightArrowIcon.vue';
import LeftArrowIcon from './icons/LeftArrowIcon.vue';
import m_cart from "../assets/images/m_cart.png";
import m_order from "../assets/images/m_order.png";
import m_help from "../assets/images/m_help.png";
import m_prev from "../assets/images/m_prev.png";
import m_close from "../assets/images/m_close.png";
export default {
    data: function () {
    return {
      m_cart: m_cart,
      m_order: m_order,
      m_help: m_help,
      m_prev: m_prev,
      m_close: m_close,
  }
},
    components: {
        RightArrowIcon,
        LeftArrowIcon,
    },
    props: {
        list: {
            type: Object,
            required: true,
        },
        positionStyle: {
            type: Object,
            required: true,
        },
        showHeaderArrow: {
            type: Boolean,
            default: false,
        },
        isTranslating: {
            type: Boolean,
            default: false,
        },
        handleHeaderClicked: {
            type: Function,
            default: () => {},
        },
        handleItemClicked: {
            type: Function,
            default: () => {},
        },

        // @TODO: create createMenuPanel.js to assign `functionalityStyle` which is not diff from next, staging, and prev panel in parent component.
        functionalityStyle: {
            type: Object,
            required: true,
        },
        transitionStyle: {
            type: Object,
            required: true,
        },
    },
};
</script>

<style lang="scss" scoped>

ul, li {
    padding: 0;
    margin: 0;
}

.Menu__header {
    display: flex;
    align-items: center;
    padding-left: 35px;
    height: 50px;
    color: #444;
    font-size: 16px;
    cursor: pointer;

    .arrow {
        padding-top: 2px;
        fill: #fff;
        margin-right: 10px;
        width: 10px;
        height: 100%;
        display: flex;
        align-items: center;
    }
}

.Menu__list {
    list-style: none;
    padding-bottom: 2px;

    .separator {
        border-bottom: 1px solid #d5dbdb;
        padding: 2px 0 0 0;
        margin: 0;
    }
}

.Menu__item {
    color: #4a4a4a;
    padding-left: 35px;
    height: 45px;
    display: flex;
    align-items: center;
    cursor: pointer;

    a {
        color: #4a4a4a;
        text-decoration: none;
    }

    .arrow {
        padding-top: 2px;
        padding-left: 15px;
        display: flex;
        align-items: center;
        width: 10px;
        height: 100%;
    }
}
</style>
