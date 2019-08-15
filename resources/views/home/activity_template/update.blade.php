@extends('vue.layout')

@section('content')
    <div class="box-header">
        <el-header  id="content-header">
            <el-breadcrumb separator-class="el-icon-arrow-right">
                <el-breadcrumb-item><a href="{{ route('home.activity_template.index') }}">活动模板</a></el-breadcrumb-item>
                <el-breadcrumb-item>@{{ form.id?'编辑':'添加' }}</el-breadcrumb-item>
            </el-breadcrumb>
        </el-header>
        <el-main>
            <el-form ref="form" :model="form" :rules="rules" label-width="80px">
                    <el-form-item label="模板名称" prop="name">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
                    <el-form-item label="活动标题" prop="title">
                        <el-input v-model="form.title"></el-input>
                    </el-form-item>
                        <el-form-item label="pc活动">
                            <el-checkbox label="提示文字" name="type" v-model="form.in_pc"></el-checkbox>
                        </el-form-item>
                         <el-form-item label="app活动">
                            <el-select v-model="form.in_app">
                                <el-option label="全部" value=""></el-option>
                                <el-option label="是" value="T"></el-option>
                                <el-option label="否" value="F"></el-option>
                            </el-select>
                        </el-form-item>
                        <el-form-item label="PC活动banner">
                            <one-file-upload tip="提示语" v-model="form.pc_banner" :upload_url="form.pc_banner"></one-file-upload>
                        </el-form-item>
                        <el-form-item label="APP活动banner">
                            <one-file-upload tip="提示语" v-model="form.app_banner" :upload_url="form.app_banner"></one-file-upload>
                        </el-form-item>
                        <el-form-item label="背景颜色">
                            <el-color-picker v-model="form.bg_color"></el-color-picker>
                        </el-form-item>
                        <el-form-item label="是否显示" >
                            <el-switch v-model="form.is_show" active-text="是" inactive-text="否"></el-switch>
                        </el-form-item>
                        <el-form-item label="日期">
                                <el-date-picker
                                    value-format="yyyy-MM-dd HH:mm:ss"
                                    v-model="time"
                                    type="datetimerange"
                                    range-separator="至"
                                    start-placeholder="开始日期"
                                    end-placeholder="结束日期">
                                </el-date-picker>
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
                    time:[],
                    submitLoading:false,
                    form:@json($activity_template),
                    rules: {
                        'name':[
                           { required: true, message: '请输入模板名称', trigger: 'blur' },
                        ],
                        'title':[
                           { required: true, message: '请输入活动标题', trigger: 'blur' },
                        ],
                    },
                }
            },
            methods: {
                onSubmit(form) {
                    this.$refs[form].validate((valid) => {
                        if (valid) {
                            this.submitLoading=true;
                            this.doPost('{{ route('home.activity_template.update') }}',this.form).then(res=>{
                                this.submitLoading=false;
                                if(res.errcode==0){
                                    this.$message.success('操作成功!');
                                    window.location.href='{{ route('home.activity_template.index') }}';
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