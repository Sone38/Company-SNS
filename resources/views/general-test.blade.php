<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <form>
        <label for="name">name</label>
        <input type="text"   id="name" name="name" size="15" />
        <input type="button" id="btn"  value="送信"/>
    </form>
    <div id="result"></div>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('btn').addEventListener('click', function () {
                var result = document.getElementById('result');
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function(){
                    if(xhr.readyState === 4){//通信が完了した時
                        if(xhr.status === 200){//通信が成功した時
                            result.textContent = xhr.responseText;
                        }
                        else{//通信が失敗した時
                            result.textContent = 'サーバーエラーが発生しました。';
                        }
                    }
                    else{//通信が完了する前
                        result.textContent = '通信中...';
                    }
                }
                //サーバーとの非同期通信の開始
                xhr.open('GET', 'test_ajax.php?name='+encodeURIComponent(document.getElementById('name').value),true);
                xhr.send(null);
            },false);
        }, false)
    </script>
</x-app-layout>
