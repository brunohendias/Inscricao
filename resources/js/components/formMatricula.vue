<template>
    <form>
        <h1 class="text-center mb-5">Matricule-se já</h1>
        <h3>Dados Pessoais</h3>
        <div class="row">
            <div class="col-md-6" id="nom_insc">
                <label for="nome">Nome <required /></label>
                <input class="form-control" type="text" name="nome" id="nome" v-model="dados.nom_insc" placeholder="Seu nome completo"/>
                <msg v-if="msgs.nom_insc" label="nome"/>
            </div>
            
            <div class="col-md-6" id="email">
                <label for="email">Email <required /></label>
                <input class="form-control" type="email" name="email" id="email" v-model="dados.email" placeholder="exemplo@exemplo.com"/>
                <msg v-if="msgs.email" label="email"/>
            </div>

            <div class="col-md-6" id="data_nasci">
                <label for="datanascimento">Data de nascimento <required /></label>
                <input class="form-control" type="date" name="datanascimento" id="datanascimento" v-model="dados.data_nasci"/>
                <msg v-if="msgs.data_nasci" label="data de nascimento"/>
            </div>

            <div class="col-md-6" id="telefone">
                <label for="telefone">Telefone para contato <required /></label>
                <the-mask class="form-control" :mask="'(##) # ####-####'" name="telefone" id="telefone" v-model="dados.telefone" 
                    placeholder="(00) 0 0000 0000" />
                <msg v-if="msgs.telefone" label="telefone para contato"/>
            </div>

            <div class="col-md-6" id="cpf">
                <label for="cpf">CPF <required /></label>
                <the-mask name="cpf" id="cpf" :mask="'###.###.###-##'" v-model="dados.cpf" placeholder="000.000.000-00" class="form-control"/>
                <msg v-if="msgs.cpf" label="CPF"/>
            </div>

            <div class="col-md-6" id="rg">
                <label for="rg">RG <required /></label>
                <input class="form-control" type="text" name="rg" id="rg" v-model="dados.rg" placeholder="XXXXXXXXXX"/>
                <msg v-if="msgs.rg" label="RG"/>
            </div>

            <div class="col-md-6" id="nom_mae">
                <label for="mae">Nome da Mãe <required /></label>
                <input class="form-control" type="text" name="mae" id="nom_mae" v-model="dados.nom_mae" placeholder="Nome completo da sua mãe"/>
                <msg v-if="msgs.nom_mae" label="nome da Mãe"/>
            </div>

            <div class="col-md-6" id="nom_pai">
                <label for="pai">Nome do Pai</label>
                <input class="form-control" type="text" name="pai" id="nom_pai" v-model="dados.nom_pai" placeholder="Nome completo do seu pai"/>
                <msg v-if="msgs.nom_pai" label="nome do Pai"/>
            </div>

            <div class="col-md-6" id="cod_serie">
                <label for="series">Série a cursar <required /></label>
                <selectSeries :dado="dados"/>
                <msg v-if="msgs.cod_serie" label="série a cursar"/>
            </div>

            <div class="col-md-6" id="cod_atencao">
                <label for="atencoes">Possui alguma necessidade especial? <required /></label>
                <selectAtencoes :dado="dados"/>
                <msg v-if="msgs.cod_atencao" label="necessidade especial"/>
            </div>
        </div>

        <h3 class="mt-5">Endereço</h3>

        <div class="row">
            <div class="col-md-6" id="cep">
                <label for="cep">CEP <required /></label>
                <the-mask name="cep" id="cep" :mask="'#####-###'" v-model="enderecoInsc.cep" placeholder="00000-000" class="form-control"/>
                <msg v-if="msgs.cep" label="CEP"/>
            </div>

            <div class="col-md-6" id="estado">
                <label for="estado">Estado <required /></label>
                <input class="form-control" type="text" name="estado" id="estado" v-model="enderecoInsc.estado" placeholder="SP"/>
                <msg v-if="msgs.estado" label="estado"/>
            </div>

            <div class="col-md-6" id="cidade">
                <label for="cidade">Cidade <required /></label>
                <input class="form-control" type="text" name="cidade" id="cidade" v-model="enderecoInsc.cidade" placeholder="São Paulo"/>
                <msg v-if="msgs.cidade" label="cidade"/>
            </div>

            <div class="col-md-6" id="bairro">
                <label for="bairro">Bairro <required /></label>
                <input class="form-control" type="text" name="bairro" id="bairro" v-model="enderecoInsc.bairro" placeholder="Bairro das Flores"/>
                <msg v-if="msgs.bairro" label="bairro"/>
            </div>

            <div class="col-md-6" id="rua">
                <label for="rua">Rua <required /></label>
                <input class="form-control" type="text" name="rua" id="rua" v-model="enderecoInsc.rua" placeholder="Rua dos lírios"/>
                <msg v-if="msgs.rua" label="rua"/>
            </div>

            <div class="col-md-6" id="numero">
                <label for="numero">Número <required /></label>
                <input class="form-control" type="text" name="numero" id="numero" v-model="enderecoInsc.numero" placeholder="1041"/>
                <msg v-if="msgs.numero" label="número"/>
            </div>
        </div>

        <div class="row mt-5">
            <botaoMatricular :dados="dados" :enderecoInsc="enderecoInsc" :msgs="msgs"/>
        </div>
    </form>
</template>

<script>
import apiCep from '../core/endereco/apiCep'
import selectSeries from './shared/select/selectSeries'
import selectAtencoes from './shared/select/selectAtencoes'
import botaoMatricular from './shared/button/botaoMatricular'
import required from './shared/input/required'
import msg from './shared/msg/required'

export default {
    name: 'formMatricula',
    components: {
        selectSeries,
        selectAtencoes,
        botaoMatricular,
        required,
        msg
    },
    data() {
        return {
            dados: {
                nom_insc: null,
                data_nasci: null,
                telefone: null,
                email: null,
                cod_serie: null,
                cod_atencao: null,
                cpf: null,
                rg: null,
                nom_mae: null,
                nom_pai: null
            },
            enderecoInsc: {
                cod_insc: 0,
                estado: null,
                cidade: null,
                bairro: null,
                rua: null,
                numero: null,
                cep: null
            },
            enderecoCEP: {},
            msgs: {
                nom_insc: false,
                data_nasci: false,
                telefone: false,
                email: false,
                cod_serie: false,
                cod_atencao: false,
                cpf: false,
                rg: false,
                nom_mae: false,
                nom_pai: false,
                estado: false,
                cidade: false,
                bairro: false,
                rua: false,
                numero: false,
                cep: false
            }
        }
    },
    methods: {
        async buscaDadosCep() {
            await apiCep.buscar(this.enderecoInsc.cep).then(response => {
                this.enderecoCEP = response.data
            })
        }
    }
}
</script>

<style lang="css" scoped>
    label {
        margin-top: 30px;
        font-size: 16px;
    }

    .form-control {
        height: 45px;
    }

    h3 {
        font-family: Helvetica, sans-serif;
    }

</style>