<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-start mb-3">
                        <div class="mr-auto">
                            <span class="span-header">Lesson 6</span>
                        </div>
                        <div class="align-self-center">
                            <button type="button" class="btn btn-dark" @click="onBack">戻る</button>
                        </div>
                    </div>
                    
                    <div class="quesion-header">APIを使って取得したデータを表示しましょう</div>
                    <div class="d-flex flex-wrap justify-content-start mt-1 mb-2">
                        <div class="d-flex mr-3">
                            <div class="align-self-center">
                                {{items}}
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="alert alert-warning" role="alert">
                        <i class="fas fa-book-reader"></i> 応用編：公開されているAPIを使ってデータを取得してましょう。「http://smsurf.app-rox.com/api/」
                        <div class="align-self-center">
                            {{items2}}
                        </div>
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
            items: null,
            items2:null,
        }
    },
    mounted () {
        axios.get('https://randomuser.me/api/')
            .then(response => (this.items = response))
        //axios.get('API\CustomerController@index')
        //
        axios.get('https://www.googleapis.com/youtube/v3/search', {
          params: this.params,
          headers: {
            'Access-Control-Allow-Origin': 'http://127.0.0.1:8000/',
            'Access-Control-Allow-Headers': 'Content-type',
            'Access-Control-Allow-Methods' : 'GET, POST, PUT, DELETE, OPTIONS',
          },
        })
            .then(response =>(this.items2 =response))
    },
    watch: {
        //
    },
    computed: {
        //
    },
    methods: {
        async getInit() {
            // WebAPIとは
            // https://qiita.com/NagaokaKenichi/items/df4c8455ab527aeacf02
            // API呼出しの基本形
            const {data} = await axios.get('https://randomuser.me/api/')
            // 取得したデータはchromeのデバッグツールで確認できます。
            // https://qiita.com/nonkapibara/items/8b587013b6b817d6dfc4
            this.items = data
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