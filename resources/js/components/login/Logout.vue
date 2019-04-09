<template lang="html">

</template>

<script>
export default {
    created() {
        EventBus.$emit('logout');
    }
}
</script>

<style lang="css" scoped>
</style>
