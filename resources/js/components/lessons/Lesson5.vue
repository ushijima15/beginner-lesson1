<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-start mb-3">
                        <div class="mr-auto">
                            <span class="span-header">Lesson 5</span>
                        </div>
                        <div class="align-self-center">
                            <button type="button" class="btn btn-dark" @click="onBack">戻る</button>
                        </div>
                    </div>

                    <div class="quesion-header">商品コードでテーブルの絞り込み機能を追加しましょう</div>
                    <div class="alert alert-info" role="alert">
                        <i class="far fa-lightbulb"></i> ヒント: computed を使用して inventories をフィルタリングする。
                    </div>

                    <div class="d-flex flex-wrap justify-content-start mt-1 mb-2">
                        <div class="d-flex mr-3">
                            <div class="align-self-center">商品コード：</div>
                            <div class="align-self-center">
                                <input class="form-control" v-model="searchItemCode">
                            </div>
                        </div>
                    </div>
                    <table class="table table-sm" key="processes2">
                        <thead>
                            <tr>
                                <th class="text-center bg-primary text-white">商品コード</th>
                                <th class="text-center bg-primary text-white">商品名</th>
                                <th class="text-center bg-primary text-white">在庫数</th>
                                <th class="text-center bg-primary text-white" style="width:7rem;">実在庫数</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white" v-for="(inventory, index) in filterInventories" :key="index">
                                <td class="text-center align-middle">{{inventory.item_code}}</td>
                                <td class="text-center align-middle">{{inventory.item_name}}</td>
                                <td class="text-center align-middle">{{inventory.stock_num}}</td>
                                <td class="text-center align-middle">{{inventory.real_stock_num}}</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr>
                    <div class="alert alert-warning" role="alert">
                        <i class="fas fa-book-reader"></i> 在庫数でフィルタリングしてみましょう。（例）200と入力したら在庫数が200以上の物を表示
                    </div>
                    <div class="d-flex flex-wrap justify-content-start mt-1 mb-2">
                        <div class="d-flex mr-3">
                            <div class="align-self-center">：在庫個数</div>
                            <div class="align-self-center">
                                <input class="form-control" v-model="searchStock_num">
                            </div>
                        </div>
                    </div>
                    <table class="table table-sm" key="processes">
                        <thead>
                            <tr>
                                <th class="text-center bg-primary text-white">商品コード</th>
                                <th class="text-center bg-primary text-white">商品名</th>
                                <th class="text-center bg-primary text-white">在庫数</th>
                                <th class="text-center bg-primary text-white" style="width:7rem;">実在庫数</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white" v-for="(inventory,index2) in filterSearchstock" :key="index2">
                                <td class="text-center align-middle">{{inventory.item_code}}</td>
                                <td class="text-center align-middle">{{inventory.item_name}}</td>
                                <td class="text-center align-middle">{{inventory.stock_num}}</td>
                                <td class="text-center align-middle">{{inventory.real_stock_num}}</td>
                            </tr>
                        </tbody>
                    </table>
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
            inventories: [
                { id: 1, item_code: 'ITEM0001', item_name: '商品００００１', stock_num: 100, real_stock_num: 88 },
                { id: 2, item_code: 'ITEM0002', item_name: '商品００００２', stock_num: 200, real_stock_num: 155 },
                { id: 3, item_code: 'ITEM0003', item_name: '商品００００３', stock_num: 300, real_stock_num: 241 },
                { id: 4, item_code: 'ITEM0004', item_name: '商品００００４', stock_num: 400, real_stock_num: 311 },
                { id: 5, item_code: 'ITEM0005', item_name: '商品００００５', stock_num: 500, real_stock_num: 311 },
            ],
            searchItemCode: '',
            searchStock_num:0,
        }
    },
    mounted () {
        //
    },
    watch: {
        //
    },
    computed: {
        filterInventories() {
            var data = this.inventories;
            var filterWord = this.searchItemCode && this.searchItemCode.toLowerCase();
            if(filterWord) {
                data = data.filter(function (row) {
                    return Object.keys(row).some(function (key) {
                        return String(row[key]).toLowerCase().indexOf(filterWord) > -1
                })
            })
        }
        return data;
        },
        filterSearchstock(){
            return this.inventories.filter((el) => {
                return el.stock_num >= this.searchStock_num
            },this)
        },       
    },
    methods: {
        onBack() {
            this.$router.push({ name: 'home' })
        }
    },
}
</script>

<style lang="scss" scoped>
@import "resources/sass/variables";
</style>