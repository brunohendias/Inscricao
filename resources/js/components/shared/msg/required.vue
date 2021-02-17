<template>
    <span class="required">O campo {{ label }} é obrigatorio.</span>
</template>

<script>
export default {
    name: 'required',
    props: {
        label: {
            type: String,
            default: ''
        }
    }
}
</script>

<style scoped>
    .required {
        color: red;
    }

    span {
        font-size: 18px;
    }
</style>