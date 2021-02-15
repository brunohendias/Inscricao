<template>
    <div>
        <formMatricula />
    </div>
</template>

<script>
import formMatricula from './components/formMatricula.vue'

export default {
    name: 'App',
    components: {
        formMatricula
    }
}
</script>

<style lang="css">
    #app {
        background-image: url("https://cdn.pixabay.com/photo/2016/02/16/21/07/books-1204029_960_720.jpg");
    }
</style>