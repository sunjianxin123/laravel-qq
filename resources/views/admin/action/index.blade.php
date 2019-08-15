@extends('vue.layout')
@section('title','博客---权限管理')
@section('content')
    @verbatim
        <div id="app">
            <div style="margin-bottom: 20px">
                <h1>权限列表</h1>
            </div>
            <el-form :inline="true" :model="form" class="demo-form-inline">
                <el-form-item label="权限名">
                    <el-input v-model="form.name" placeholder="请输入权限名"></el-input>
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
                            label="权限名称"
                    >
                    </el-table-column>
                    <el-table-column
                            label="是否显示在左侧">
                        <template slot-scope="scope">
                            <p v-if="scope.row.is_show_left=='T'" @click="changeStatus(scope.$index, scope.row)"><i class="el-icon-success"></i></p>
                            <p v-else><i class="el-icon-error" @click="changeStatus(scope.$index, scope.row)"></i></p>
                        </template>
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
                    window.open("{{route('admin_action_add')}}");
                },
                loadData(){
                    let param = {
                        params:this.form
                    };
                    axios.get('{{route('admin_action_index')}}',param).then(res=>{
                        vm.tableData = res.data.data;
                    })
                },
                handleEdit(index, row) {
                    console.log(index, row);
                },
                changeStatus(index,obj){
                    axios.post('{{route('admin_action_change')}}',{id:obj.id,is_show_left:obj.is_show_left}).then(res=>{
                        console.log(res);
                        if(res.data.code==200){
                            this.$message({
                                message: '操作成功',
                                type: 'success'
                            });
                            vm.tableData[index]['is_show_left'] = res.data.data.is_show_left;
                        }
                    })
                }

            },
            mounted(){
                this.loadData();
            }
        })

    </script>
@endsection
@section('css')

@endsection