<template>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><a class="text-white" href="/">Dashboard</a></h3>
            </div>
            
            <ul class="list-unstyled">
                <li :class="{ 'active': title === 'Create Customer' }">
                    <router-link to="/customers/create"><i class="fa fa-plus"></i> Add New Customer</router-link>
                </li>
                <li :class="{ 'active': title === 'List Customer' }">
                    <router-link to="/customers"><i class="fa fa-list"></i> All Customers</router-link>
                </li>
                <li>
                    <router-link to="/logout"><i class="fa fa-sign-out"></i> Logout</router-link>
                </li>
            </ul>
        </nav>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-light bg-light mt-4 border-bottom border-secondary">
                <div class="navbar-brand">{{ title }}</div>
                <Search />
            </nav>

            <div class="container-fluid pt-4">
                <router-view :key="$route.fullPath"></router-view>
            </div>
        </div>
    </div>
</template>

<script>
import Search from './Search';
export default {
    name: 'App',

    components: { Search },

    props: ['user'],

    created() {
        this.title = this.$route.meta.title;

        window.axios.interceptors.request.use(
            (config) => {
                if (config.method === "get") {
                    config.url = config.url + '?api_token=' + this.user.api_token;
                }
                else {
                    config.data = {
                        ...config.data,
                        api_token: this.user.api_token
                    };
                }

                return config;
            }
        )
    },

    data: function () {
        return {
            title: ''
        }
    },

    watch: {
        $route(to, from) {
            this.title = to.meta.title;
        },

        title() {
            document.title = this.title + ' | spaCustomer';
        }
    }
}
</script>