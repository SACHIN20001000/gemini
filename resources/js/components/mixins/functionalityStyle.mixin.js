
const functionalityStyle = {
    data() {
        return {
            style_wrapperStyle: {},
            style_wrapperActiveStyle: {},
            style_panelStyle: {},
            style_transitionStyle: {},
        };
    },
    mounted() {
        const panelWidth = this.panelWidth;
        const menuOpenSpeed = this.menuOpenSpeed;
        const menuSwitchSpeed = this.menuSwitchSpeed;

        const menuOpenTransitionSecond = `.${menuOpenSpeed / 10}s`;
        const menuSwitchTransitionSecond = `.${menuSwitchSpeed / 10}s`;

        const wrapperStyle = {
            width: `100%`,
            position: `absolute`,
            top: '80px',
            right: `0`,
            zIndex: 99999,
            height: `100%`,
            overflow: `hidden`,
            transition: `right ${menuOpenTransitionSecond}`,
        };

        const wrapperActiveStyle = {
            right: 0,
            width:'100%',
        };

        const panelStyle = {
            position: `absolute`,
            top: 0,
            zIndex: 99999,
            height: `min(100%,calc(100% - 80px))`,
            width: `100%`,
            backgroundColor: `#fff`,
        };

        const transitionStyle = {
            transition: `left ${menuSwitchTransitionSecond}`,
        };

        this.style_wrapperStyle = wrapperStyle;
        this.style_wrapperActiveStyle = wrapperActiveStyle;
        this.style_panelStyle = panelStyle;
        this.style_transitionStyle = transitionStyle;
    },
};

export default functionalityStyle;
