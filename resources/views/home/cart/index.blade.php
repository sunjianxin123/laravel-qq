@extends('vue.layout')

@section('content')
        <p>
            购物车列表
        </p>
        <el-form ref="form" :model="form" label-width="60px">
            <el-row>
                <el-col :span="6">
                        <el-form-item label="日期">
                            <el-date-picker
                                v-model="time"
                                type="daterange"
                                range-separator="至"
                                start-placeholder="开始日期"
                                end-placeholder="结束日期">
                            </el-date-picker>
                        </el-form-item>
                </el-col>
                     <el-col :span="4">
                        <el-form-item label="商品货号">
                            <el-input v-model="form.goods_sn" @keyup.enter.native="getData()"></el-input>
                        </el-form-item>
                    </el-col>
                     <el-col :span="4">
                        <el-form-item label="商品名称">
                            <el-input v-model="form.goods_name" @keyup.enter.native="getData()"></el-input>
                        </el-form-item>
                    </el-col>
                     <el-col :span="3">
                        <el-form-item label="是否结算">
                            <el-select v-model="form.is_pay">
                                <el-option label="全部" value=""></el-option>
                                <el-option label="是" value="T"></el-option>
                                <el-option label="否" value="F"></el-option>
                            </el-select>
                        </el-form-item>
                     </el-col>
                     <el-col :span="3">
                        <el-form-item label="是否失效">
                            <el-select v-model="form.is_invalid">
                                <el-option label="全部" value=""></el-option>
                                <el-option label="是" value="T"></el-option>
                                <el-option label="否" value="F"></el-option>
                            </el-select>
                        </el-form-item>
                     </el-col>
                <el-col :span="4">
                    <el-form-item>
                        <el-button type="primary" @click="getData()">查询</el-button>
                        <a href="{{ route('home.cart.update') }}" target="_blank"><el-button type="danger">添加</el-button></a>
                    </el-form-item>
                </el-col>
            </el-row>
        </el-form>
    <el-main>
        <el-table
                :data="tableData"
                stripe
                border
                v-loading="loading"
                style="width: 100%;">
            <el-table-column
                    prop="id"
                    label="ID"
                    width="180">
            </el-table-column>
                <el-table-column
                    prop="user_id"
                    label="用户id"
                    width="180">
                 </el-table-column>
                <el-table-column
                    prop="goods_id"
                    label="商品id"
                    width="180">
                 </el-table-column>
                <el-table-column
                    prop="goods_sn"
                    label="商品货号"
                    width="180">
                 </el-table-column>
                <el-table-column
                    prop="goods_name"
                    label="商品名称"
                    width="180">
                 </el-table-column>
                <el-table-column
                    prop="goods_number"
                    label="商品数量"
                    width="180">
                 </el-table-column>
                <el-table-column
                    prop="is_pay"
                    label="是否结算"
                    width="180">
                 </el-table-column>
                <el-table-column
                    prop="is_invalid"
                    label="是否失效"
                    width="180">
                 </el-table-column>
            <el-table-column
                    fixed="right"
                    label="操作"
                    width="200">
                <template slot-scope="scope">
                    <a :href="'{{ route('home.cart.update') }}?id='+scope.row.id" target="_blank">
                        <el-button type="primary" icon="el-icon-edit" circle></el-button>
                    </a>
                    <el-button @click="handelDelete(scope.row.id)" type="danger" icon="el-icon-delete" circle></el-button>
                </template>
            </el-table-column>
        </el-table>
    </el-main>
    <el-footer>
        <div v-if="pageInfo.total > pageInfo.per_page" class="text-center">
            <el-pagination
                    @current-change="handlePage"
                    :current-page="pageInfo.current_page"
                    :page-sizes="[pageInfo.per_page]"
                    :page-size="pageInfo.per_page"
                    layout="total,sizes, prev, pager, next, jumper"
                    :total="pageInfo.total">
            </el-pagination>
        </div>
    </el-footer>

@endsection

@section('js')
    <script>
           var vm = new Vue({
             el: '#app',
             data: {
                 //搜索信息
                 form: {
                     content: '',
                     title: '',
                     page: 1,
                     add_time:'',
                     end_time:''   
                 },
                 time:[],
                 pageInfo:{},//分页信息
                 tableData: [],//表数据信息
                 loading:true
             },
             methods: {
                 //加载列表数据
                 getData(page=1){
                     this.form.page=page;
                     this.loading=true;
                     //this.doGet is defined in the laravel-generator::layout
                     this.doGet('{{ route('home.cart.index') }}',this.form).then(res => {
                         if(res.errcode==0){
                             this.tableData=res.data.data;
                             this.setPageInfo(res.data);
                         }
                         this.loading=false;
                     });
                 },
                 //设置分页数据
                 setPageInfo(pageInfo){
                    this.pageInfo.total=pageInfo.total;
                    this.pageInfo.per_page=pageInfo.per_page;
                    this.pageInfo.current_page=pageInfo.current_page;
                 },
                 //跳转分页的处理
                 handlePage(val){
                     this.getData(val);
                 },
                 //删除
                 handelDelete(id){
                     this.$confirm('确认删除吗？', '提示', {
                         confirmButtonText: '确定',
                         cancelButtonText: '取消',
                         type: 'warning'
                     }).then(() => {
                         this.doPost('{{ route('home.cart.delete') }}',{id:id}).then(res => {
                             if(res.errcode==0){
                                 this.getData();
                             }else{
                                 this.$message.error(res.message);
                             }
                         });
                     }).catch(() => {});
                 },
             },
             mounted(){
                 this.getData();
             }
           })

           vm.$watch('time',function (newVal) {
                if(newVal.length>0){
                    vm.form.add_time=newVal[0];
                    vm.form.end_time=newVal[1];
                }else{
                    vm.form.add_time='';
                    vm.form.end_time='';
                }
            });

    </script>
@endsection
@section('css')
    <style>
        .el-range-editor.el-input__inner{width:250px;}
    </style>
@endsection