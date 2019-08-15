@extends('vue.layout')
@section('title','博客---管理员管理')
@section('content')
        <div id="app">
            <div style="margin-bottom: 20px">
                <h1>添加管理员</h1>
            </div>
            <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="100px" class="demo-ruleForm" style="width: 500px;">
                <el-form-item label="用户名称" prop="user_name">
                    <el-input v-model="ruleForm.user_name"></el-input>
                </el-form-item>
                <el-form-item label="用户密码" prop="password">
                    <el-input v-model="ruleForm.password" type='password'></el-input>
                </el-form-item>
                <el-form-item label="确认密码" prop="password_confirmation">
                    <el-input v-model="ruleForm.password_confirmation" type='password'></el-input>
                </el-form-item>
                <el-form-item label="性别" prop="sex">
                    <el-radio v-model="ruleForm.sex" label="1">男</el-radio>
                    <el-radio v-model="ruleForm.sex" label="0">女</el-radio>
                </el-form-item>
                <el-form-item label="头像">
                    <one-file-upload tip="请上传jpg或者png文件" :upload_url="ruleForm.portrait" v-model="ruleForm.portrait"></one-file-upload>
                </el-form-item>
                <el-form-item label="邮箱" prop="email">
                    <el-input v-model="ruleForm.email"></el-input>
                </el-form-item>
                <el-form-item label="所属角色" prop="roles">
                    <template>
                        <el-checkbox :indeterminate="isIndeterminate" v-model="checkAll" @change="handleCheckAllChange">全选</el-checkbox>
                        <div style="margin: 15px 0;"></div>
                        <el-checkbox-group v-model="ruleForm.roles" @change="handleCheckedCitiesChange">
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
        const cityOptions = @json($role);
        var vm = new Vue({
            el:'#app',
            data() {
                var validatePass = (rule, value, callback) => {
                    if (value === '') {
                        callback(new Error('请输入密码'));
                    } else {
                        if (this.ruleForm.password_confirmation !== '') {
                            this.$refs.ruleForm.validateField('password_confirmation');
                        }
                        callback();
                    }
                };
                var validatePass2 = (rule, value, callback) => {
                    if (value === '') {
                        callback(new Error('请再次输入密码'));
                    } else if (value !== this.ruleForm.password) {
                        callback(new Error('两次输入密码不一致!'));
                    } else {
                        callback();
                    }
                };
                return {
                    checkAll: false,
                    roles: [],
                    cities: cityOptions,
                    isIndeterminate: true,
                    loading:false,
                    dialogImageUrl: '',
                    dialogVisible: false,
                    ruleForm: {
                        user_name: '',
                        password: '',
                        password_confirmation: '',
                        sex: '1',
                        email:'',
                        portrait:'',
                        roles:[]
                    },
                    rules: {
                        user_name: [
                            { required: true, message: '请输入用户名称', trigger: 'blur' },
                            { min: 3, max: 8, message: '长度在 3 到 8 个字符', trigger: 'blur' }
                        ],
                        password: [
                            { validator: validatePass, trigger: 'blur' }
                        ],
                        password_confirmation: [
                            { validator: validatePass2, trigger: 'blur' }
                        ],
                        email: [
                            { required: true, message: '请输入邮箱地址', trigger: 'blur' },
                            { type: 'email', message: '请输入正确的邮箱地址', trigger: ['blur', 'change'] }
                        ],
                        roles: [
                            { required: true, message: '请选择角色拥有的权限', trigger: 'blur' },
                        ]
                    }
                };
            },
            methods: {
                handleCheckAllChange(val) {
                    this.ruleForm.roles = val ? Object.keys(cityOptions) : [];
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
                            axios.post('{{route('admin_user_add')}}',this.ruleForm).then(res=>{
                                if(res.data.code==200){
                                    vm.$message.success('添加成功');
                                    vm.loadding = false;
                                    window.location.href = "{{route('admin_user_index')}}";
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