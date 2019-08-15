<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- 引入样式 -->
    <link rel="icon" href="/home/img/1.jpg">
    <link rel="stylesheet" href="/home/css/element.css">
    <link rel="stylesheet" href="/home/css/nprogress.css">
    <!-- 引入js -->
    <!-- jQuery 2.2.3 -->
    <script src="/home/js/jquery-2.2.3.min.js"></script>
    <script src="/home/js/vue.min.js"></script>
    <script src="/home/js/axios.js"></script>
    <script src="/home/js/nprogress.js"></script>
    <!-- 引入组件库 -->
    <script src="/home/js/element-2.4.js"></script>
</head>
<style>
    #app{
        width: 400px;
        margin: 0 auto;
        margin-top: 200px;
    }
</style>
<body>
    <div id="app">
        <el-form :model="ruleForm" status-icon :rules="rules" ref="ruleForm" label-width="100px" class="demo-ruleForm">
            <el-form-item label="用户名" prop="user_name">
                <el-input v-model="ruleForm.user_name"></el-input>
            </el-form-item>
            <el-form-item label="密码" prop="password">
                <el-input type="password" v-model="ruleForm.password" autocomplete="off"></el-input>
            </el-form-item>
           
            <el-form-item>
                <el-button type="primary" @click="submitForm('ruleForm')">提交</el-button>
                <el-button @click="resetForm('ruleForm')">重置</el-button>
            </el-form-item>
        </el-form>
    </div>
</body>
</html>

<script>
    var vm = new Vue({
        el:'#app',
        data() {
            return {
                ruleForm: {
                    user_name: '',
                    password: '',
                },
                rules: {
                    user_name: [
                        { required: true, message: '请输入用户名称', trigger: 'blur' },
                        { min: 3, max: 8, message: '长度在 3 到 8 个字符', trigger: 'blur' }
                    ],
                    password: [
                        { required: true, message: '请输入密码', trigger: 'change' }
                    ]
                }
            };
        },
        methods: {
            submitForm(formName) {
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                        axios.post("{{route('admin_login')}}", this.ruleForm).then(function (response) {
                            console.log(response);
                            if(response.data.code==200){
                                vm.$message({
                                    message: '登录成功',
                                    type: 'success'
                                });
                                    window.location.href = "{{route('admin_index')}}";
                                }else{
                                    vm.$message.error(response.data.msg);
                                }
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                    } else {
                        console.log('error submit!!');
                return false;
            }
            });
            },
            resetForm(formName) {
                this.$refs[formName].resetFields();
            }
        }
    })
</script>