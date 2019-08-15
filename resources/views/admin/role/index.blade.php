@extends('vue.layout')
@section('title','博客---角色管理')
@section('content')
    @verbatim
        <div id="app">
            <div style="margin-bottom: 20px">
                <h1>角色列表</h1>
            </div>
            <el-form :inline="true" :model="form" class="demo-form-inline">
                <el-form-item label="角色名">
                    <el-input v-model="form.name" placeholder="请输入角色名"></el-input>
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
                            prop="id"
                            label="编号"
                    >
                    </el-table-column>
                    <el-table-column
                            prop="name"
                            label="角色名称"
                    >
                    </el-table-column>
                    <el-table-column
                            prop="note"
                            label="描述"
                    >
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
                form: {
                    name: '',
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
                    window.open("{{route('admin_role_add')}}");
                },
                loadData(){
                    let param = {
                        params:this.form
                    };
                    axios.get('{{route('admin_role_index')}}',param).then(res=>{
                        vm.tableData = res.data.data.data;
                        vm.meta.current_page = res.data.data.current_page;
                        vm.meta.total = res.data.data.total;
                })
                },
                handleEdit(index, row) {
                    console.log(index, row);
                },
                //删除
                handleDelete(index, row) {
                    this.$confirm('此操作将永久删除该角色, 是否继续?', '提示', {
                        roundButton:true,
                        confirmButtonText: '确定',
                        cancelButtonText: '取消',
                        type: 'warning',
                        center: true
                    }).then(() => {
                        axios.post('{{route('admin_role_del')}}',{user_id:row.user_id}).then(res=>{
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

            },
            mounted(){
                this.loadData();
            }
        })

    </script>
@endsection
@section('css')

@endsection