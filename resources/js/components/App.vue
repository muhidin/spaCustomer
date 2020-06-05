<template>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><a class="text-white" href="/">Dashboard</a></h3>
            </div>
            
            <ul class="list-unstyled">
                <li :class="{ 'active': title === 'Create Customer' }">
                    <router-link to="/customers/create">Add New Customer</router-link>
                </li>
                <li :class="{ 'active': title === 'List Customer' }">
                    <router-link to="/customers">All Customers</router-link>
                </li>
                <li>
                    <a href="#"> Logout</a>
                </li>
            </ul>
        </nav>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-light bg-light mt-4 border-bottom border-secondary">
                <div class="navbar-brand">{{ title }}</div>
                <div>
                    <input class="form-control mr-sm-2" id="searchTerm" placeholder="Search...">
                </div>
            </nav>

            <div class="container-fluid pt-4">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'App',

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