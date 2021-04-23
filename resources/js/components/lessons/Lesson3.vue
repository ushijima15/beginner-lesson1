<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-start mb-3">
                        <div class="mr-auto">
                            <span class="span-header">Lesson 3</span>
                        </div>
                        <div class="align-self-center">
                            <button type="button" class="btn btn-dark" @click="onBack">戻る</button>
                        </div>
                    </div>
                    
                    <div class="quesion-header">電卓を作成してください。</div>
                        <p><input type="text" v-model="output">
                        <button style="width:2rem;" v-on:click="calc('AC')">AC</button>
                        </p>
                        <button style="width:2rem;" v-on:click="calc('/')">÷</button>
                        <button style="width:2rem;" v-on:click="calc('1')">1</button>
                        <button style="width:2rem;" v-on:click="calc('2')">2</button>
                        <button style="width:2rem;" v-on:click="calc('3')">3</button><br>
                        <button style="width:2rem;" v-on:click="calc('*')">×</button>
                        <button style="width:2rem;" v-on:click="calc('4')">4</button>
                        <button style="width:2rem;" v-on:click="calc('5')">5</button>
                        <button style="width:2rem;" v-on:click="calc('6')">6</button><br>
                        <button style="width:2rem;" v-on:click="calc('-')">-</button>
                        <button style="width:2rem;" v-on:click="calc('7')">7</button>
                        <button style="width:2rem;" v-on:click="calc('8')">8</button>
                        <button style="width:2rem;" v-on:click="calc('9')">9</button><br>
                        <button style="width:2rem;" v-on:click="calc('+')">+</button>
                        <button style="width:2rem;" v-on:click="calc('0')">0</button>
                        <button style="width:2rem;" v-on:click="calc('.')">.</button>
                        <button style="width:2rem;" v-on:click="calc('=')">=</button>
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
            //
            output:'0'
        }
    },
    mounted () {
        //
    },
    watch: {
        //
    },
    computed: {
        //
    },
    methods: {
        onBack() {
            this.$router.push({ name: 'home' })
        },
        calc:function(cmd){
  	        if(cmd === '='){
    	    this.output = eval(this.output)  
            }else if(cmd === 'AC'){
    	    this.output = '0'
            }else if(this.output === '0'){
            this.output = cmd
            }else{
            this.output += cmd
            }
        }
    }
}
</script>

<style lang="scss" scoped>
@import "resources/sass/variables";
</style>