@extends('vue.layout')
@section('title','博客---管理员管理')
@section('content')
@verbatim
<div id="app">
    <div style="margin-bottom: 20px">
        <h1>管理员列表</h1>
    </div>
    <el-form :inline="true" :model="form" class="demo-form-inline">
        <el-form-item label="日期">
            <el-date-picker
                    class="dateTime"
                    v-model="time"
                    type="daterange"
                    range-separator="至"
                    start-placeholder="开始日期"
                    end-placeholder="结束日期">
            </el-date-picker>
        </el-form-item>
        <el-form-item label="用户名">
            <el-input v-model="form.user_name" placeholder="请输入用户姓名"></el-input>
        </el-form-item>
        <el-form-item>
            <el-button type="primary" @click="onSubmit">查询</el-button>
            <el-button type="success" @click="add">添加</el-button>
        </el-form-item>
    </el-form>
    <template>
        <el-table
                :data="tableData"
                border
                stripe
                style="width: 100%">
            <el-table-column
                    fixed
                    prop="user_id"
                    label="编号"
                   >
            </el-table-column>
            <el-table-column
                    prop="user_name"
                    label="姓名"
                    >
            </el-table-column>
            <el-table-column label="头像">
                <template slot-scope="scope">
                    <img :src="scope.row.portrait" alt="" width="100px">
                </template>
            </el-table-column>
            <el-table-column
                    label="性别">
                <template slot-scope="scope">
                    <p v-if="scope.row.sex==1">男</p>
                    <p v-else>女</p>
                </template>
            </el-table-column>
            <el-table-column
                    prop="email"
                    label="邮箱">
            </el-table-column>
            <el-table-column
                    prop="created_at"
                    label="创建时间">
            </el-table-column>
            <el-table-column label="操作">
                <template slot-scope="scope">
                    <el-button
                            type="warning"
                            size="mini"
                            @click="handleEdit(scope.$index, scope.row)">编辑</el-button>
                    <el-button
                            size="mini"
                            type="danger"
                            @click="handleDelete(scope.$index, scope.row)">删除</el-button>
                </template>
            </el-table-column>
        </el-table>
    </template>
    <template v-if="meta.total>10">
        <div class="block">
            <el-pagination style="display: table; margin: 30px auto;"
            @size-change="handleSizeChange"
            @current-change="handleCurrentChange"
            :current-page="meta.current_page"
            :page-sizes="[1, 2, 3, 4]"
            :page-size="meta.per_page"
            layout="total, sizes, prev, pager, next, jumper"
            :total="meta.total">
            </el-pagination>
        </div>
    </template>
</div>
@endverbatim
@endsection

@section('js')
<script>
    var vm = new Vue({
        el:'#app',
        data:{
            time:[],
            form: {
                user_name: '',
                page:1
            },
            tableData: [],
            meta:[]
        },
        methods: {
            onSubmit() {
                this.form.page=1;
                this.loadData();
            },
            add(){
                window.open("{{route('admin_user_add')}}");
            },
            loadData(){
                let param = {
                    params:this.form
                };
                axios.get('{{route('admin_user_index')}}',param).then(res=>{
                  vm.tableData = res.data.data.data;
                  //分页处理
                  vm.meta.current_page = res.data.data.current_page;
                  vm.meta.total = res.data.data.total;
                })
            },
            handleEdit(index, row) {
                console.log(index, row);
            },
            //删除
            handleDelete(index, row) {
                this.$confirm('此操作将永久删除该用户, 是否继续?', '提示', {
                    roundButton:true,
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    type: 'warning',
                    center: true
                }).then(() => {
                    axios.post('{{route('admin_user_del')}}',{user_id:row.user_id}).then(res=>{
                        if(res.data.code==200){
                            vm.tableData.splice(index,1);
                            vm.$message({
                                type: 'success',
                                message: '删除成功!'
                            });
                        }else {
                            vm.$message.error(res.data.msg);
                        }
                })
            })
            },
            handleSizeChange(val) {
               this.form.page=1;
               this.form.number=val;
               this.loadData();
            },
            handleCurrentChange(val) {
                this.form.page=val;
                this.loadData();
            }
        },
        mounted(){
            this.loadData();
        }
    })

</script>
@endsection
@section('css')
    <style>
        .el-range-editor.el-input__inner{width:250px;}

    </style>
@endsection