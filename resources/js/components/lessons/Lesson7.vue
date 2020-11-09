<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-start mb-3">
                        <div class="mr-auto">
                            <span class="span-header">Lesson 7</span>
                        </div>
                        <div class="align-self-center">
                            <button type="button" class="btn btn-dark" @click="onBack">戻る</button>
                        </div>
                    </div>
                    
                    <div class="quesion-header">LaravelでAPIを作ってデータを表示する</div>
                    <div class="alert alert-info" role="alert">
                        <i class="far fa-lightbulb"></i> ヒント: Laravel側（バックエンド）のエラーは「storage\logs」に出力されます。 <br>
                        参考：<br>
                        テーブル定義：https://drive.google.com/drive/folders/1PMy8UwOmx3UN1b0nrGJSVlXofXZReBVO<br>
                        database-design_lesson.html（商品）<br>
                    </div>
                    // ここにデータを表示

                    <hr>
                    <div class="alert alert-warning" role="alert">
                        <i class="fas fa-book-reader"></i> 応用編：新規テーブル（customers）を作成してそのデータを画面に表示しましょう<br>
                        テーブル定義：https://drive.google.com/drive/folders/1PMy8UwOmx3UN1b0nrGJSVlXofXZReBVO<br>
                        database-design_lesson.html（顧客）<br>
                        １．テーブル（マイグレーションファイル）を作成する<br>
                        （コマンド：php artisan make:migration create_customers_table）<br>
                        ２．シーダーを作成する<br>
                        （コマンド：php artisan make:seeder CustomersTableSeeder）<br>
                        ３．モデルを作成する<br>
                        （コマンド：php artisan make:model Customer）<br>
                        ４．コントローラーを作成する<br>
                        （コマンド：php artisan make:controller API/CustomerController --api）<br>
                        ５．APIのルーティングを作成する<br>
                        （routes\api.phpに「Route::get('customer', 'API\CustomerController@index');」を定義）
                    </div>
                    // ここにデータを表示
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
            results: null,
            items: null,
        }
    },
    mounted () {
        this.getInit()
    },
    watch: {
        //
    },
    computed: {
        //
    },
    methods: {
        async getInit() {
            // LaravelでのAPIの作成
            // routes/api.phpにルーティングを設定する
            // Route::get('lesson/selector', 'API\LessonController@index');
            // ↑これがControllerとの紐づけ定義
            const {data} = await axios.get('/api/lesson/selector')
            this.results = data
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