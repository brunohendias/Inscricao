<template>
    <select name="series" id="cod_serie" v-model="dado.cod_serie" :class="classe">
        <option v-for="(serie, i) in series" :value="serie.cod_serie" :key="i">{{ serie.serie }}</option>
    </select>
</template>

<script>
import apiSeries from '../../../core/dados/apiSeries'

export default {
    name: 'selectSeries',
    props: {
        dado: {
            type: Object,
            default: {}
        },
        classe: {
            type: String,
            default: 'form-control'
        }
    },
    data() {
        return {
            series: []
        }
    },
    created() {
        this.buscaSeries()
    },
    methods: {
        buscaSeries() {
            apiSeries.buscar().then(response => {
                if (response.data.success) {
                    this.series = response.data.data.series
                }
            })
        }
    }
}
</script>