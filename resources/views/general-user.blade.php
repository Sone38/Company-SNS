<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            社員用ユーザー一覧ページ
        </h2>
    </x-slot>

    <div class="page-wrapper flex">
        <div class="py-12 w-70vw">
            <div class="max-w-5-5xl mr-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 text-center">
                        <p>ユーザー一覧</p>
                    </div>
                </div>
            </div>
            <div class="user-list px-8 w-70vw">
            @foreach($users as $user)
                <div class="bg-white border-gray-200 sm:rounded-lg mt-1 mx-auto w-96 user-list p-4">
                    <div class="user_name">
                        <p class="color-red">名前</p>
                        {{ $user->userName }}
                    </div>
                    <div class="user_kana">
                        <p class="color-red">フリガナ</p>
                        {{ $user->kana }}
                    </div>
                    <div class="user_department">
                        <p class="color-red">所属部署</p>
                        {{ $user->departmentName }}
                    </div>
                </div>
            @endforeach
            </div>
            <div class="pagination">
                {{ $users->links() }}
            </div>
        </div>
        
        <div class="side-menu py-12">
            <div class="w-96 ml-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ route('dashboard') }}">
                            メインページへ
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-96 ml-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ route('general-chat') }}">
                            チャット
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-96 ml-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ route('general-form') }}">
                            問い合わせ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>