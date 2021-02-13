<template>
    <div>
        <banner />
        <formMatricula />
    </div>
</template>

<script>
import banner from './components/banner.vue'
import formMatricula from './components/formMatricula.vue'

export default {
    name: 'App',
    components: {
        banner,
        formMatricula
    }
}
</script>