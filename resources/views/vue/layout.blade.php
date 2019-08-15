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
    <!-- 引入组件库 -->
    <script src="/home/js/element-2.4.js"></script>
    <script src="/home/js/axios.js"></script>
    <script src="/home/js/nprogress.js"></script>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
    }

    .el-header, .el-footer {
        background-color: #2ab27b;
        color: #333;
        text-align: center;
        line-height: 60px;
    }

    .el-aside {
        background-color: #D3DCE6;
        color: #333;
        text-align: center;
        line-height: 200px;
    }

    .el-main {
        background-color: #fff;
        color: #333;
    }

    .el-container:nth-child(5) .el-aside,
    .el-container:nth-child(6) .el-aside {
        line-height: 260px;
    }

    .el-container:nth-child(7) .el-aside {
        line-height: 320px;
    }

</style>
<body>
<div id="app">
    <el-container style="height: 723px;">
        <el-header>Header</el-header>
        <el-container>
            <el-aside width="230px" style="background-color: rgb(238, 241, 246)" >
                <el-menu :default-openeds="['1', '3']" background-color="#A640FF" text-color="white" active-text-color="silver">
                    @foreach((new \App\AdminAction())->webNav() as $k=>$v)
                        <el-submenu index="{{$k}}">
                            <template slot="title"><i class="el-icon-message"></i>{{$v['name']}}</template>
                            @foreach($v['child'] as $kk=>$vv)
                                @if($vv['url'])
                                    <a href="{{$vv['url']}}">
                                        <el-menu-item index="{{$k}}-{{$kk}}">{{$vv['name']}}</el-menu-item>
                                    </a>
                                @else
                                    <el-menu-item index="{{$k}}-{{$kk}}">{{$vv['name']}}</el-menu-item>
                                @endif
                            @endforeach
                        </el-submenu>
                    @endforeach
                </el-menu>
            </el-aside>
            <el-container>
                <el-header style="text-align: right; font-size: 12px;" >
                    <el-dropdown>
                        <i class="el-icon-setting" style="margin-right: 15px"></i>
                        <el-dropdown-menu slot="dropdown">
                            <el-dropdown-item>查看</el-dropdown-item>
                            <el-dropdown-item>新增</el-dropdown-item>
                            <el-dropdown-item>删除</el-dropdown-item>
                        </el-dropdown-menu>
                    </el-dropdown>
                    <span>admin</span>
                </el-header>
                <el-main>
                    @yield('content')
                </el-main>
                <el-footer style="height: 30px; line-height: 30px">Footer</el-footer>
            </el-container>
        </el-container>
    </el-container>
</div>

<script type="text/x-template" id="one-file-upload">
    <el-upload
            action="{{route('admin_upload')}}"
            :on-preview="handlePictureCardPreview"
            list-type="picture-card"
            limit="1"
            :on-exceed="handleExceed"
            :on-success="uploadSuccess"
            :on-remove="handleRemove">
        <i class="el-icon-plus"></i>
        <div slot="tip" class="el-upload__tip">@{{ tip }}</div>
        <div v-if="dialogImageUrl">
            <img :src="dialogImageUrl" alt="" style="width: 70px;">
        </div>
        <div v-else-if="upload_url">
            <img :src="upload_url" alt="" style="width: 70px;">
        </div>
        <div v-else>

        </div>
    <el-dialog visible.sync="dialogVisible">
        <img width="100%" :src="dialogImageUrl" alt="">
    </el-dialog>
    </el-upload>

</script>

<script>
    String.prototype.trim = function (char, type) {
        if (char) {
            if (type == 'left') {
                return this.replace(new RegExp('^\\'+char+'+', 'g'), '');
            } else if (type == 'right') {
                return this.replace(new RegExp('\\'+char+'+$', 'g'), '');
            }
            return this.replace(new RegExp('^\\'+char+'+|\\'+char+'+$', 'g'), '');
        }
        return this.replace(/^\s+|\s+$/g, '');
    };
    /**
     * get请求
     * @param url
     * @param params
     * @returns {Promise<any>}
     */
    Vue.prototype.doGet=function(url,params={}){
        return new Promise((resolve,reject) => {
            axios.get(url,{
            params: params
        }).then((res)=>{
            if(res.status==200){
            resolve(res.data);
        }
        Vue.$message.error('wrong');
    }).catch(function (error) {
            reject(error);
        });
    });
    }
    /**
     * post请求
     * @param url
     * @param params
     * @returns {Promise<any>}
     */
    Vue.prototype.doPost=function(url,params={}){
        return new Promise((resolve,reject) => {
            axios.post(url,params).then((res)=>{
            if(res.status==200){
            resolve(res.data);
        }
        Vue.$message.error('wrong');
    }).catch(function (error) {
            reject(error);
        });
    });
    }


    //服务端请求配置
    axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    axios.defaults.headers.common['X-CSRF-TOKEN'] = '{{ csrf_token() }}';
    // 定义一个名为 one-file-upload 的组件
    Vue.component('one-file-upload', {
        props:['tip','upload_url'],
        data: function () {
            return {
                dialogImageUrl: '',
                dialogVisible: false
            }
        },
        template: '#one-file-upload',
        methods: {
            handleExceed(){
                this.$message.warning(`请先将上传的图片移除后再上传`);
            },
            handleRemove(file, fileList) {
                this.$message.success('删除成功');
                this.dialogImageUrl='';
                this.$emit('input','');
            },
            handlePictureCardPreview() {
                this.dialogVisible = true;
            },
            //上传成功之后的处理
            uploadSuccess(res){
               if(res.code==200){
                   this.$message.success(res.msg);
                   this.dialogImageUrl = res.data;
                   this.$emit('input',res.data);
               }else {
                   this.$message.error(res.msg);
               }
            }

        }
    })
</script>
@yield('js')
@yield('css')
</body>
</html>


