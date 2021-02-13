<template>
    <div id="formMatricula" class="bg-dark">
        <form class="form py-3">
            <div class="container p-5">
                <div class="col-10 painel-form bg-white px-5 py-3 m-auto">
                   <h1 class="text-center">Matricule-se já</h1>
                    <h3 class="text-center mt-4">Dados Pessoais</h3>
                    <div class="row mt-4">
                        <div class="col-6">
                            <label for="nome">Nome</label>
                            <input class="form-control" type="text" name="nome" id="nome" 
                                v-model="dados.nom_insc" placeholder="Seu nome completo"/>
                        </div>
                        <div class="col-6">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" 
                                v-model="dados.email" placeholder="exemplo@exemplo.com"/>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-6">
                            <label for="datanascimento">Data de nascimento</label>
                            <input class="form-control" type="date" name="datanascimento" id="datanascimento" 
                                v-model="dados.data_nasci" placeholder="12"/>
                        </div>
                        <div class="col-6">
                            <label for="telefone">Telefone para contato</label>
                            <the-mask class="form-control" :mask="'(##) # ####-####'" name="telefone" id="telefone" 
                                v-model="dados.telefone" placeholder="(00) 0 0000 0000" />
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <label for="cpf">CPF</label>
                            <the-mask name="cpf" id="cpf" :mask="'###.###.###-##'" 
                                v-model="dados.cpf" placeholder="000.000.000-00" class="form-control"/>
                        </div>
                        <div class="col-6">
                            <label for="rg">RG</label>
                            <input class="form-control" type="text" name="rg" id="rg" 
                                v-model="dados.rg" placeholder="XXXXXXXXXX"/>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <label for="mae">Nome da sua Mãe</label>
                            <input class="form-control" type="text" name="mae" id="mae" 
                                v-model="dados.nom_mae" placeholder="Nome completo da sua mãe"/>
                        </div>
                        <div class="col-6">
                            <label for="pai">Nome do seu Pai</label>
                            <input class="form-control" type="text" name="pai" id="pai" 
                                v-model="dados.nom_pai" placeholder="Nome completo do seu pai"/>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <label for="series">Serie a cursar</label>
                            <seriesSelect :dado="dados"/>
                        </div>
                        <div class="col-6">
                            <label for="atencoes">Possui alguma nescessidade especial?</label>
                            <atencoesSelect :dado="dados"/>
                        </div>
                    </div>
                    <h3 class="text-center mt-4">Endereço</h3>
                    <div class="row mt-4">
                        <div class="col-sm-6">
                            <label for="cep">CEP</label>
                            <the-mask name="cep" id="cep" :mask="'#####-###'" 
                                v-model="enderecoInsc.cep" placeholder="00000-000" class="form-control"/>
                        </div>
                        <div class="col-sm-6">
                            <label for="estado">Estado</label>
                            <input class="form-control" type="text" name="estado" id="estado" 
                                v-model="enderecoInsc.estado" placeholder="SP"/>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-6">
                            <label for="cidade">Cidade</label>
                            <input class="form-control" type="text" name="cidade" id="cidade" 
                                v-model="enderecoInsc.cidade" placeholder="São Paulo"/>
                        </div>
                        <div class="col-sm-6">
                            <label for="bairro">Bairro</label>
                            <input class="form-control" type="text" name="bairro" id="bairro" 
                                v-model="enderecoInsc.bairro" placeholder="Bairro das flores"/>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-6">
                            <label for="rua">Rua</label>
                            <input class="form-control" type="text" name="rua" id="rua" 
                                v-model="enderecoInsc.rua" placeholder="Rua dos lirios"/>
                        </div>
                        <div class="col-sm-6">
                            <label for="numero">Numero</label>
                            <input class="form-control" type="text" name="numero" id="numero" 
                                v-model="enderecoInsc.numero" placeholder="1041"/>
                        </div>
                    </div>
                    <div class="row my-4">
                        <matricularButton :dados="dados" :enderecoInsc="enderecoInsc"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import apiCep from '../core/endereco/apiCep'
import seriesSelect from './shared/select/seriesSelect'
import atencoesSelect from './shared/select/atencoesSelect'
import matricularButton from './shared/button/matricularButton'

export default {
    name: 'formMatricula',
    components: {
        seriesSelect,
        atencoesSelect,
        matricularButton
    },
    data() {
        return {
            dados: {
                nom_insc: '',
                data_nasci: '',
                telefone: null,
                email: '',
                cod_serie: 0,
                cod_atencao: 0,
                cpf: '',
                rg: '',
                nom_mae: '',
                nom_pai: ''
            },
            enderecoInsc: {
                cod_insc: 0,
                estado: '',
                cidade: '',
                bairro: '',
                rua: '',
                numero: 0,
                cep: null
            },
            enderecoCEP: {}
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

<style lang="css">

    label {
        font-size: 20px;
    }

    .form-control {
        height: 50px;
    }

    .painel-form {
        border-radius: 25px;
    }

</style>