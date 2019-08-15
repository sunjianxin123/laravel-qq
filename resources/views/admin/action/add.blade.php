@extends('vue.layout')
@section('title','博客---权限管理')
@section('content')
    <div id="app">
        <div style="margin-bottom: 20px">
            <h1>添加权限</h1>
        </div>
        <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="100px" class="demo-ruleForm" style="width: 500px;">
            <el-form-item label="权限名称" prop="name">
                <el-input v-model="ruleForm.name"></el-input>
            </el-form-item>
            <el-form-item label="所属权限" prop="parent_id">
                <el-select v-model="ruleForm.parent_id" placeholder="请选择">
                    <el-option label="顶级权限" value="0"></el-option>
                    <el-option
                            v-for="item in options"
                            :key="item.id"
                            :label="item.name"
                            :value="item.id">
                    </el-option>
                </el-select>
            </el-form-item>
            <el-form-item label="排序" prop="sort">
                <el-input v-model="ruleForm.sort"></el-input>
            </el-form-item>
            <el-form-item label="链接地址">
                <el-input v-model="ruleForm.url"></el-input>
            </el-form-item>
            <el-form-item label="是否显示" prop="sort">
                <el-radio v-model="ruleForm.is_show_left" label="T">显示</el-radio>
                <el-radio v-model="ruleForm.is_show_left" label="F">不显示</el-radio>
                <p>提示：是否显示在左侧菜单</p>
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
        var vm = new Vue({
            el:'#app',
            data() {
                return {
                    options: @json($data),
                    ruleForm: {
                        name: '',
                        sort:0,
                        url:'',
                        parent_id:'0',
                        is_show_left:'T'
                    },
                    loading:false,
                    rules: {
                        name: [
                            { required: true, message: '请输入权限名称', trigger: 'blur' },
                            { min: 3, max: 8, message: '长度在 3 到 8 个字符', trigger: 'blur' }
                        ],
                        sort: [
                            { required: true, message: '排序不能为空', trigger: 'blur' },
                        ],
                        parent_id: [
                            { required: true, message: '请选择所属权限', trigger: 'blur' },
                        ]
                    }
                };
            },
            methods: {
                submitForm(formName) {
                    this.$refs[formName].validate((valid) => {
                        if (valid) {
                            this.loadding = true
                            axios.post('{{route('admin_action_add')}}',this.ruleForm).then(res=>{
                                if(res.data.code==200){
                                vm.$message.success('添加成功');
                                vm.loadding = false;
                                window.location.href = "{{route('admin_action_index')}}";
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