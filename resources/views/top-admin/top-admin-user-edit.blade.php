<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ユーザー情報編集画面
        </h2>
    </x-slot>
    
    <div class="page-wrapper flex">
        <div class="py-12">
            <div class="w-70vw mr-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="user-edit">
                            <form method="post" action="">
                            @csrf
                                <div class="user-name-edit">
                                    <label>名前</label>
                                    <input type="text" name="name" value="{{ $UserDataFromId['0']->userName }}">
                                </div>
                                <div class="user-kana-edit">
                                    <label>フリガナ</label>
                                    <input type="text" name="kana" value="{{ $UserDataFromId['0']->kana }}">
                                </div>
                                <div class="user-email-edit">
                                    <label>メールアドレス</label>
                                    <input type="email" name="email" value="{{ $UserDataFromId['0']->email }}">
                                </div>
                                <div class="user-department-edit">
                                    <!-- selectタグで選択できるようにする -->
                                    <label>現所属部署</label>
                                    <p>{{ $UserDataFromId['0']->departmentName }}</p>
                                    <div class="change-user-department">
                                        <label>所属部署変更先</label>
                                        <select name="departmentOfUser">
                                                <option>--部署を選択してください--</option>
                                            @foreach($getDepartments as $departmentName)
                                                <option value="{{ $departmentName->name }}">{{ $departmentName->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="user-edit-button">
                                    <button>編集する</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
            <div class="w-96 ml-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ route('top-admin-department') }}">
                            部署
                        </a>
                    </div>
                </div>
            </div>
            <!-- ページングの実装をする -->
        </div>
    </div>
</x-app-layout>   
    