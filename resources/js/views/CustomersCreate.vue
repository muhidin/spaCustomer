<template>
    <CustomersForm @submitted="create" :errors="errors"></CustomersForm>
</template>

<script>
import CustomersForm from './CustomersForm.vue'
export default {
    name: "CustomersCreate",

    data: function() {
        return {
            errors: null
        }
    },

    components: { CustomersForm },

    methods: {
        create (data) {
            axios.post('/api/customers', data)
                .then(result => {
                    this.$router.push(result.data.data.url);
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
        }
    }
}
</script>