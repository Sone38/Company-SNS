<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            総管理者用部署ページ
        </h2>
    </x-slot>
    <div class="page-wrapper flex">
        <div class="py-12 w-70vw">
            <div class="max-w-5-5xl mr-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 post-form h-32">
                        <h2>既存の部署名</h2>
                        <div class="exist-department">
                            @foreach($DepartmentDatas as $DepartmentData)
                            <ul class="department-box">
                                <li class="department-name">
                                    {{ $DepartmentData['name'] }}
                                    <ul class="department-link">
                                        <li><a>{{ $DepartmentData['name'] }}</a></li>
                                        <li><a href="{{ route('top-admin-department-edit', ['id'=>$DepartmentData->id]) }}">編集</a></li>
                                        <li><a href="{{ route('departmentDelete', ['id'=>$DepartmentData->id]) }}" onclick="return confirm('選択した部署を削除しますか？')">削除</a></li>
                                    </ul>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 post-form">
                        <form method="post" action="{{ route('department-register') }}">
                        @csrf
                        <h2>部署の追加</h2>
                            <div class="flex">
                                <label>部署名 : </label>
                                <input class="input-department" type="text" name="nameOfDepartment" required>
                                <input class="submit-department" type="submit" value="部署を追加する">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!-- TODO:部署の登録をできるようにする -->
        <div class="side-menu py-12 w-quarter">
            <div class="w-96 ml-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ route('top-admin-main') }}">
                            メインページへ
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-96 ml-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ route('top-admin-chat') }}">
                            チャット
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-96 ml-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ route('top-admin-user') }}">
                            ユーザー一覧
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-96 ml-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ route('top-admin-form') }}">
                            問い合わせ
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-96 ml-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ route('top-admin-post') }}">
                            投稿機能
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>