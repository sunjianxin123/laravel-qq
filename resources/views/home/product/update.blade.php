@extends('vue.layout')

@section('content')
    <div class="box-header">
        <el-header  id="content-header">
            <el-breadcrumb separator-class="el-icon-arrow-right">
                <el-breadcrumb-item><a href="{{ route('home.product.index') }}">产品</a></el-breadcrumb-item>
                <el-breadcrumb-item>@{{ form.id?'编辑':'添加' }}</el-breadcrumb-item>
            </el-breadcrumb>
        </el-header>
        <el-main>
            <el-form ref="form" :model="form" :rules="rules" label-width="80px">
                    <el-form-item label="标题" prop="title">
                        <el-input v-model="form.title"></el-input>
                    </el-form-item>
                    <el-form-item label="描述" prop="desc">
                        <el-input v-model="form.desc"></el-input>
                    </el-form-item>
                    <el-form-item label="价格" prop="price">
                        <el-input v-model="form.price"></el-input>
                    </el-form-item>
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
                    time:[],
                    submitLoading:false,
                    form:@json($product),
                    rules: {
                        'title':[
                           { required: true, message: '请输入标题', trigger: 'blur' },
                        ],
                        'desc':[
                           { required: true, message: '请输入描述', trigger: 'blur' },
                        ],
                        'price':[
                           { required: true, message: '请输入价格', trigger: 'blur' },
                        ],
                    },
                }
            },
            methods: {
                onSubmit(form) {
                    this.$refs[form].validate((valid) => {
                        if (valid) {
                            this.submitLoading=true;
                            this.doPost('{{ route('home.product.update') }}',this.form).then(res=>{
                                this.submitLoading=false;
                                if(res.errcode==0){
                                    this.$message.success('操作成功!');
                                    window.location.href='{{ route('home.product.index') }}';
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

        vm.$watch('time',function (newVal) {
            if(newVal && newVal.length>0){
                vm.form.add_time=newVal[0];
                vm.form.end_time=newVal[1];
            }else{
                vm.form.add_time='';
                vm.form.end_time='';
            }
        });
    </script>
@endsection