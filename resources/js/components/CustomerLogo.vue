<template>
    <div class="btn rounded border text-white bg-primary align-center" style="height: 40px; width: 45px">{{ customerLogo }}</div>
</template>

<script>
export default {
    name: "CustomerLogo",

    props: ['name'],

    computed: {
        customerLogo: function () {
            var nama = this.name.split(" ")
            if(nama.length > 1) {
                return nama[0].slice(0,1) + nama[nama.length-1].slice(0,1);
            }else{
                return this.name.slice(0, 2);
            }
        }
    }
}
</script>