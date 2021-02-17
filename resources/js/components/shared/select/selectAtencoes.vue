<template>
    <select name="atencoes" id="cod_atencao" v-model="dado.cod_atencao" :class="classe">
        <option v-for="(atencao, i) in atencoes" :value="atencao.cod_atencao" :key="i">
            {{ atencao.atencao }}
        </option>
    </select>
</template>

<script>
import apiAtencoes from '../../../core/dados/apiAtencoes'

export default {
    name: 'selectAtencoes',
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
            atencoes: []
        }
    },
    created() {
        this.buscaAtencoes()
    },
    methods: {
        buscaAtencoes() {
            apiAtencoes.buscar().then(response => {
                if (response.data.success) {
                    this.atencoes = response.data.data.atencoes
                }
            })
        }
    }
}
</script>