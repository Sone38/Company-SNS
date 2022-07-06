<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            管理者用問い合わせページ
        </h2>
    </x-slot>

    <div class="page-wrapper flex">
        <div class="py-12 w-70vw">
            <div class="max-w-5-5xl mr-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        問い合わせ機能を表示
                    </div>
                </div>
            </div>
        </div>

        <div class="side-menu py-12">
            <div class="w-96 ml-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ route('pre-admin-main') }}">
                            メインページへ
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-96 ml-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ route('pre-admin-chat') }}">
                            チャット
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-96 ml-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ route('pre-admin-user') }}">
                            ユーザー一覧
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-96 ml-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ route('pre-admin-post') }}">
                            投稿機能
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>