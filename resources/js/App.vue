<template>
    <div class="py-5" :class="tela ? 'img-form' : 'img-finaliza'">
        <div class="container">
            <div class="p-5">
                <formMatricula v-if="tela"/>
                <finalizaMatricula v-else/>
            </div>
        </div>
    </div>
</template>

<script>
import formMatricula from './components/formMatricula'
import finalizaMatricula from './components/finalizaMatricula'
import bus from './core/bus'

export default {
    name: 'App',
    components: {
        formMatricula,
        finalizaMatricula
    },
    data() {
        return {
            tela: true
        }
    },
    created() {
        bus.$on('finalizaMatricula', event => {
            this.tela = event
        })
    }
}
</script>

<style lang="css">
    .container {
        background-color: white;
        border-radius: 25px;
    }

    .img-form {
        background-image: url("https://cdn.pixabay.com/photo/2016/02/16/21/07/books-1204029_960_720.jpg");
    }

    .img-finaliza {
        background-image: url("https://image.freepik.com/vetores-gratis/material-escolar-no-quadro-negro_23-2148587747.jpg");
    }
</style>