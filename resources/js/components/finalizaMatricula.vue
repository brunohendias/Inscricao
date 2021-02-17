<template>
    <div>
        <h1 class="mb-5 text-center">Obrigado por matrícular-se em nossa escola!</h1>
        <div v-for="(info, i) in infos" :key="i">
            <h2>{{ info.title }}</h2>
            <div class="row col-md-10">
                <p v-html="info.text"></p>
            </div>
        </div>
        <div class="row mt-3">
            <img :src="img" alt="imagem finaliza matricula" class="m-auto">
        </div>
    </div>
</template>

<script>
export default {
    name: 'finalizaMatricula',
    data() {
        return {
            img: 'https://cdn.pixabay.com/photo/2019/04/14/10/26/book-4126481_960_720.jpg',
            infos: [{
                    title: 'Iremos avaliar sua matricula.', 
                    text: 'Nossa escola se empenha para avaliar as matrículas e fazer o melhor para receber você. Esse processo é bastante criterioso. Você receberá o retorno  da situação da sua matrícula e todas as informaçõesnecessárias em três dias, através do email informado. Receberá também a relação dos materiais de compra obrigatória e o valor da mensalidade.'
                },{
                    title: 'Contato', 
                    text: 'Telefone: (031) 3281 - 5444 <br>Celular: (031) 9 9999 - 8888 <br>Email: contato@escolinhaavance.com.br <br>Endereço: Av dos Lirios, Nº 1208, Floresta, São Paulo'
                }
            ]
        }
    }
}
</script>

<style lang="css" scoped>
    p {
        font-size: 18px;
    }

    h2 {
        text-align: center;
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .row {
        margin: auto;
    }
</style>