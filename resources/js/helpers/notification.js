import Vue from "vue";

export default function notification(type = 'success', title = 'Successfull!', text = 'Success') {
    return Vue.notify({
        group: "foo",
        type: type,
        title: title,
        text: text
    });
}