<template>
    <button class="btn btn-primary m-auto" @click.prevent="checkEmptyInput">
        <span>Matricular</span>
    </button>
</template>

<script>
import apiInscricao from '@api/inscricao/apiInscricao'
import apiEnderecoInsc from '@api/inscricao/apiEnderecoInsc'
import scrollView from '@helpers/scrollView'
import emptyKey from '@helpers/emptyKey'
import bus from '../../../core/bus'

export default {
    name: 'botaoMatricular',
    props: {
        dados: {
            type: Object,
            required: true
        },
        enderecoInsc: {
            type: Object,
            required: true
        },
        msgs: {
            type: Object,
            default: {}
        }
    },
    methods: {
        checkEmptyInput() {
            let inputs = emptyKey(this.dados, this.msgs)
            inputs = inputs.concat(emptyKey(this.enderecoInsc, this.msgs))

            if (inputs.length == 0) {
                return this.matricular()
            }
            return scrollView(inputs[0])
        },
        matricular() {
            apiInscricao.inscrever(this.dados).then(response => {
                if (response.data.success) {
                    let dados = response.data.data.inscricao
                    this.enderecoInsc.cod_insc = dados.cod_insc
                    apiEnderecoInsc.cadastrar(this.enderecoInsc).then(response => {
                        if (response.data.success) {
                            bus.$emit('finalizaMatricula', false)
                        }
                    })
                }
            })
        }
    }
}
</script>

<style scoped lang="css">
    .btn {
        width: 180px;
        height: 60px;
        font-size: 20px;
    }
</style>