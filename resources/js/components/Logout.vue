<template>
    
</template>
<script>
export default {
    name: "Logout",

    created() {
        axios.post('/logout', {})
            .finally(result => {
                window.location = '/login';
            })
    }
}
</script>