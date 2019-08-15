@extends('vue.layout')
@section('title','博客---角色管理')
@section('content')
    <div id="app">
        <div style="margin-bottom: 20px">
            <h1>添加角色</h1>
        </div>
        <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="100px" class="demo-ruleForm" style="width: 500px;">
            <el-form-item label="角色名称" prop="name">
                <el-input v-model="ruleForm.name"></el-input>
            </el-form-item>
            </el-form-item>
            <el-form-item label="描述" prop="desc">
                <el-input v-model="ruleForm.desc"></el-input>
            </el-form-item>
            <el-form-item label="拥有的权限" prop="checkedCities">
                <template>
                    <el-checkbox :indeterminate="isIndeterminate" v-model="checkAll" @change="handleCheckAllChange">全选</el-checkbox>
                    <div style="margin: 15px 0;"></div>
                    <el-checkbox-group v-model="ruleForm.checkedCities" @change="handleCheckedCitiesChange">
                        <el-checkbox v-for="city,index in cities" :label="index" :key="index">@{{city}}</el-checkbox>
                    </el-checkbox-group>
                </template>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="submitForm('ruleForm')" :loading="loading">立即创建</el-button>
                <el-button @click="resetForm('ruleForm')">重置</el-button>
            </el-form-item>
        </el-form>

    </div>
@endsection

@section('js')
    <script>
        const cityOptions = @json($actions);
        var vm = new Vue({
            el:'#app',
            data() {
                return {
                    checkAll: false,
                    cities: cityOptions,
                    isIndeterminate: false,
                    ruleForm: {
                        name: '',
                        desc:'',
                        checkedCities:[]
                    },
                    loading:false,
                    rules: {
                        name: [
                            { required: true, message: '请输入角色名称', trigger: 'blur' },
                            { min: 3, max: 8, message: '长度在 3 到 8 个字符', trigger: 'blur' }
                        ],
                        checkedCities: [
                            { required: true, message: '请选择角色拥有的权限', trigger: 'blur' },
                        ]
                    }
                };
            },
            methods: {
                handleCheckAllChange(val) {
                    this.ruleForm.checkedCities = val ? Object.keys(cityOptions) : [];
                    this.isIndeterminate = false;
                },
                handleCheckedCitiesChange(value) {
                    let checkedCount = value.length;
                    this.checkAll = checkedCount === Object.keys(this.cities).length;
                    this.isIndeterminate = checkedCount > 0 && checkedCount < this.cities.length;
                },
                submitForm(formName) {
                    this.$refs[formName].validate((valid) => {
                        if (valid) {
                            this.loadding = true
                            axios.post('{{route('admin_role_add')}}',this.ruleForm).then(res=>{
                                if(res.data.code==200){
                                vm.$message.success('添加成功');
                                vm.loadding = false;
                                window.location.href = "{{route('admin_role_index')}}";
                            }else {
                                vm.$message.error(res.data.msg)
                            }
                        }).catch(res=>{
                                console.log(res);
                        })
                        } else {
                            return false;
                }
                });
                },
                resetForm(formName) {
                    this.$refs[formName].resetFields();
                },
            }
        })

    </script>
@endsection
@section('css')

@endsection