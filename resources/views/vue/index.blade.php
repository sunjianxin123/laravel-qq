@extends('vue.layout')
@section('title','博客---管理中心')
@section('content')
    @verbatim
    <div id="app">
        <el-button type="primary" icon="el-icon-edit" circle></el-button>
        <br>
        <el-switch
                v-model="value3"
                active-value="1"
                inactive-value="2"
                active-text="按月付费"
                inactive-text="按年付费">
        </el-switch>
    </div>
    @endverbatim
@endsection

@section('js')
    <script>
        var vm = new Vue({
            el:'#app',
            data:{
                msg:'啊啊',
                value3:'1'
            }
        })

    </script>
@endsection
@section('css')

@endsection