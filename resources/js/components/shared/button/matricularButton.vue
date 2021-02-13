<template>
    <button class="btn btn-success m-auto" @click.prevent="matricular">Matricular</button>
</template>

<script>
import apiInscricao from '../../../core/inscricao/apiInscricao'
import apiEnderecoInsc from '../../../core/inscricao/apiEnderecoInsc'

export default {
    name: 'matricularButton',
    props: {
        dados: {
            type: Object,
            required: true
        },
        enderecoInsc: {
            type: Object,
            required: true
        }
    },
    methods: {
        matricular() {
            apiInscricao.inscrever(this.dados).then(response => {
                if (response.data.success) {
                    let dados = response.data.data.inscricao
                    this.enderecoInsc.cod_insc = dados.cod_insc
                    apiEnderecoInsc.cadastrar(this.enderecoInsc).then(response => {
                        if (response.data.success) {
                            console.log(response.data.data.msg)
                        }
                    })
                }
            })
        }
    }
}
</script>

<style scoped lang="css">
    .btn-success {
        width: 220px;
        height: 80px;
        font-size: 20px;
    }
</style>