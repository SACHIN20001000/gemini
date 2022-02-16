
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
            width: `${panelWidth}px`,
            position: `fixed`,
            top: 0,
            right: `-${panelWidth}px`,
            zIndex: 99999,
            height: `100%`,
            overflow: `hidden`,
            transition: `right ${menuOpenTransitionSecond}`,
        };

        const wrapperActiveStyle = {
            right: 0,
        };

        const panelStyle = {
            position: `absolute`,
            top: 0,
            zIndex: 99999,
            height: `100%`,
            width: `${panelWidth}px`,
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
