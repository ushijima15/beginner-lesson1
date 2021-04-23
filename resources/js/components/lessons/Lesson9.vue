<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-start mb-3">
                        <div class="mr-auto">
                            <span class="span-header">Lesson 9</span>
                        </div>
                        <div class="align-self-center">
                            <button type="button" class="btn btn-dark" @click="onBack">戻る</button>
                        </div>
                    </div>
                    
                    <div class="quesion-header">Laravel + Vue.js CRUD</div>
                    <p>
                        Lesson 7 で作成したテーブルcustomers のCRUD機能の実装<br>
                        ・customersの一覧表示<br>
                        ・customersの新規作成<br>
                        ・customersの編集<br>
                        ・customersの削除<br>
                    </p>
                    <!-- 新規追加フォーム -->
                    <P>
                        <br>
                    </P>
                    <p>
                        ----To doリストの作成----
                    </p>
                    <div>
                        <p>
                            To do:
                            <input type="text" v-model="todo">
                        </p>
                        <p>
                            To doの期限:
                            <input type="text" v-model="remit">
                        </p>
                        <button @click="addcustomer">追加</button>
                    </div>
                    
                    <p>
                        --------やる事一覧--------
                    </p>
                    <div>
                        <ul>
                            <li v-for="customer in customers" :key=customer.id>
                                {{customer.id}}/{{customer.todo}}/{{customer.deadline}}
                                <button :disabled="isPush" @click="displayUpdate(customer.id, customer.title, customer.author)">編集</button>
                                <button :disabled="isPush" @click="deleteBook(customer.id)">削除</button>
                            </li>
                        </ul>
                    </div>
                    <!-- 編集フォーム -->
                    
                    <div v-if="updateForm">
                        <p>To do：<input type="text" v-model="updateTodo" /></p>
                        <p>To do の期限：<input type="text" v-model="updateRemit" /></p>
                        <button @click="updateTodo(updateId, updateTodo, updateRemit)">
                            編集する
                        </button>
                        <button @click="updateCancel">キャンセル</button>
                    </div>
                    <div>
                        <!-- エラーメッセージ -->
                        <p v-if="message">{{ message }}</p>
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
            message: "",
            isPush: false,
            updateForm: false,
            customers: {},
            todo: "",
            remit: "",
            updateId: "",
            updateTodo: "",
            updateRemit: ""
        }
    },
    mounted () {
        axios.get('/api/customer')
             .then(response =>(this.customer =response))
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
        }
    },
}
</script>

<style lang="scss" scoped>
@import "resources/sass/variables";
</style>