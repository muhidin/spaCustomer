<template>
    <div class="ml-2">
        <CustomersForm @submitted="update" :errors="errors" :data="customer"></CustomersForm>
    </div>
</template>

<script>
import CustomersForm from './CustomersForm'
export default {
    name: "CustomersEdit",

    components: { CustomersForm },

    mounted: function () {
        axios.get('/api/customers/' + this.$route.params.id)
            .then(response => {
                this.customer = response.data.data;
            })
            .catch(error => {

            });
    },

    data: function () {
        return {
            errors: null,
            customer: null
        }
    },

    methods: {
        update(data) {
            axios.patch('/api/customers/' + this.$route.params.id, data)
                .then(response => {
                    this.$router.push(response.data.data.url);
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
        }
    }
}
</script>