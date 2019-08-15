@extends('laravel-generator::layout')

@section('content')
    <div class="box-header">
        <el-header  id="content-header">
            <el-breadcrumb separator-class="el-icon-arrow-right">
                <el-breadcrumb-item><a href="{{ route('home.attribute.index') }}">属性</a></el-breadcrumb-item>
                <el-breadcrumb-item>@{{ form.id?'编辑':'添加' }}</el-breadcrumb-item>
            </el-breadcrumb>
        </el-header>
        <el-main>
            <el-form ref="form" :model="form" :rules="rules" label-width="80px">
                    <el-form-item label="属性名称" prop="attr_name">
                        <el-input v-model="form.attr_name"></el-input>
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
                    form:@json($attribute),
                    rules: {
                        'attr_name':[
                           { required: true, message: '请输入属性名称', trigger: 'blur' },
                        ],
                    },
                }
            },
            methods: {
                onSubmit(form) {
                    this.$refs[form].validate((valid) => {
                        if (valid) {
                            this.submitLoading=true;
                            this.doPost('{{ route('home.attribute.update') }}',this.form).then(res=>{
                                this.submitLoading=false;
                                if(res.errcode==0){
                                    this.$message.success('操作成功!');
                                    window.location.href='{{ route('home.attribute.index') }}';
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