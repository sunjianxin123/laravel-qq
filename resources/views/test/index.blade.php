<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@verbatim
<div id="app" v-cloak>
    <button @click="show">{{msg}}</button>
</div>
@endverbatim
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
<script src="https://cdn.bootcss.com/axios/0.19.0-beta.1/axios.min.js"></script>
<script>

    var vm  = new Vue({
        el:'#app',
        data:{
            msg:'春春'
        },
        methods:{
            show(){
                axios.get('http://api.tdd.local/api/app/v1/chun/areaPrice')
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    })
</script>
<style>

</style>