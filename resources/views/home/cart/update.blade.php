@extends('vue.layout')

@section('content')
    <div class="box-header">
        <el-header  id="content-header">
            <el-breadcrumb separator-class="el-icon-arrow-right">
                <el-breadcrumb-item><a href="{{ route('home.cart.index') }}">购物车</a></el-breadcrumb-item>
                <el-breadcrumb-item>@{{ form.id?'编辑':'添加' }}</el-breadcrumb-item>
            </el-breadcrumb>
        </el-header>
        <el-main>
            <el-form ref="form" :model="form" :rules="rules" label-width="80px">
                    <el-form-item label="商品货号" prop="goods_sn">
                        <el-input v-model="form.goods_sn"></el-input>
                    </el-form-item>
                    <el-form-item label="商品名称" prop="goods_name">
                        <el-input v-model="form.goods_name"></el-input>
                    </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="onSubmit('form')" :loading="submitLoading">确定</el-button>
                </el-form-item>
            </el-form>
        </el-main>
    </div>
@endsection

@section('js')
    <script>
        var vm = new Vue({
            el: '#app',
            data: function(){

                return {
                    submitLoading:false,
                    form:@json($cart),
                    rules: {
                        'goods_sn':[
                           { required: true, message: '请输入商品货号', trigger: 'blur' },
                        ],
                        'goods_name':[
                           { required: true, message: '请输入商品名称', trigger: 'blur' },
                        ],
                    },
                }
            },
            methods: {
                onSubmit(form) {
                    this.$refs[form].validate((valid) => {
                        if (valid) {
                            this.submitLoading=true;
                            this.doPost('{{ route('home.cart.update') }}',this.form).then(res=>{
                                this.submitLoading=false;
                                if(res.errcode==0){
                                    this.$message.success('操作成功!');
                                    window.location.href='{{ route('home.cart.index') }}';
                                }else{
                                    this.$message.error(res.msg);
                                }
                            });
                        } else {
                            console.log('sub error');
                            return false;
                        }
                    });
                },

            },
            mounted(){

             }
        });

    </script>
@endsection