<template>
    <div class="btn rounded border text-white bg-primary align-center" style="height: 40px; width: 45px">{{ customerLogo }}</div>
</template>

<script>
export default {
    name: "CustomerLogo",

    props: ['name'],

    computed: {
        customerLogo: function () {
            return this.name.slice(0, 2);
        }
    }
}
</script>