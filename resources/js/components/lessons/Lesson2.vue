<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-start mb-3">
                        <div class="mr-auto">
                            <span class="span-header">Lesson 2</span>
                        </div>
                        <div class="align-self-center">
                            <button type="button" class="btn btn-dark" @click="onBack">戻る</button>
                        </div>
                    </div>
                    <div id="app" class="mb-5">
                        <div class="quesion-header">１．入力値の合計を表示してください。</div>
                        <input type="number" v-model.number="left">
                        +
                        <input type="number" v-model.number="right">
                        =
                        {{ total }}
                    </div>
                    <div id="app" class="mb-5">
                        <div class="quesion-header">２．年齢を表示してください。</div>
                        <label for="birthday">お誕生日は？</label>
                        <input type="date" id="birthday" v-model="birthday">
                        <p v-if="age >= 0">{{ age }} 歳ですね！</p>
                        <p v-else>お誕生日を入力してください。</p>
                    </div>
                    <div id="app" class="mb-5">
                        <div class="quesion-header">３．プラスボタン、マイナスボタンで数値を変更できるようにしてください。</div>
                        <label>カウンター</label>
                        <button style="width:2rem;" v-on:click="Advance">+</button>
                        <button style="width:2rem;" v-on:click="Back">-</button>
                        {{count}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default {
    props: {
        //
    },
    data () {
        return {
            left: 4,
            right: 4,
            birthday: null,
            count: 0,
        }
    },
    mounted () {
        //
    },
    watch: {
        //
    },
    computed: {
        total() {
            return this.right+this.left
        },
        age:function(){
            moment.locale('ja')
            return moment().diff(this.birthday,'years')
        }
    },
    methods: {
        onBack() {
            this.$router.push({ name: 'home' })
        },
        Advance:function(){
            return this.count++
        },
        Back:function(){
            return this.count--
        },
    }
}
</script>

<style lang="scss" scoped>
@import "resources/sass/variables";
</style>