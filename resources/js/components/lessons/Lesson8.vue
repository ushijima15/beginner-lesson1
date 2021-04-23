<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-start mb-3">
                        <div class="mr-auto">
                            <span class="span-header">Lesson 8</span>
                        </div>
                        <div class="align-self-center">
                            <button type="button" class="btn btn-dark" @click="onBack">戻る</button>
                        </div>
                    </div>
                    <div class="quesion-header">ルーティング</div>
                    <div class="mb-3">
                        <a class="btn btn-link" href="https://hackmd.io/0e8J1D-6Qhq4k3_aqUi6qw?view">Lesson8の問題へ</a>
                    </div>
                    <div class="d-flex justify-content-start mb-3">
                        <div class="mr-4">
                            <nobr>
                                <button type="button" class="btn btn-primary" @click="onNext">Lesson8-1へ</button>
                                <input type="text" v-model="message">
                                <button type="button"  class="btn btn-primary" @click="onNext2">Lesson8-2へ</button> 
                            </nobr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import child from './Lesson8-2.vue'
export default {
    name:'Lesson8',
    props: {
        //
    },
    components: {
        child,
    },
    data () {
        return {
            message:"",
        }
    },
    
    mounted () {

    },
    
    watch: {
        //
    },
    computed: {
        //
    },
    methods: {
        onNext() {
            this.$router.push({ name: 'lesson8-1' })
        },
        onNext2() {
            this.$router.push({ name: 'lesson8-2' , params: { value: this.message} })
        },
        onBack() {
            this.$router.push({ name: 'home' })
        }
    },
}
</script>

<style lang="scss" scoped>
@import "resources/sass/variables";
</style>