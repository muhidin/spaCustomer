<template>
    <div v-if="!loading">
        <!-- <div> -->
            <ul class="list-group" id="list-customer">
                <div v-for="customer in customers" :key="customer.id">
                    <router-link :to="'/customers/' + customer.customer_id"> 
                        <!-- class="d-flex border-bottom border-secondary p-2 text-decoration-none" -->
                        <li class="list-group-item border-0">
                            <div class="row">
                                <div class="col-md-1 border-2">
                                    <!-- <div class="btn rounded border text-white bg-primary align-center" style="height: 40px; width: 45px">{{ customer.name.slice(0,2) }}</div> -->
                                    <CustomerLogo :name="customer.name" />
                                </div>
                                <div class="col-md-11">
                                    <label class="mb-0">{{ customer.name }}</label><br>
                                    <span class="text-muted small text-truncate">{{ customer.email }}</span>
                                </div>
                            </div>
                        </li>
                    </router-link>
                </div>
            </ul>
        <!-- </div> -->
    </div>
</template>

<script>
import CustomerLogo from '../components/CustomerLogo';

export default {
    name: 'CustomersIndex',

    components: { CustomerLogo },

    mounted() {
        axios.get('api/customers')
            .then(response => {
                this.customers = response.data.data;
                this.loading = false;
            })
            .catch(error => {
                alert('Unable to fetch customers');
            });
    },

    data: function () {
        return {
            customers: null,
            loading: true
        }
    }
}
</script>