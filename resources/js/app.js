/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue").default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component("Home", require("./components/Home.vue").default);
Vue.component(
    "LocationFilter",
    require("./components/LocationFilter.vue").default
);
Vue.component(
    "CompanyFilter",
    require("./components/CompanyFilter.vue").default
);
Vue.component("Search", require("./components/Search.vue").default);
Vue.component("Job", require("./components/Job.vue").default);
Vue.component("Login", require("./components/Login.vue").default);
Vue.component("Add", require("./components/Add.vue").default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
    el: "#app",
});
