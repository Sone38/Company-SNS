<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            総管理者用投稿内容の編集
        </h2>
    </x-slot>
    <div class="page-wrapper flex">
        <div class="py-12 w-70vw">
            <div class="mr-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 post-form">
                        <form method="post" action="">
                        @csrf
                            <!-- エラーメッセージ -->
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            <!-- 投稿のタイトル -->
                            <div class="post-title-input">
                                <label class="text-sm">投稿のタイトル</label><br>
                                <input class="rounded-md border-indigo-400 w-96" type="text" name="post_title" value="{{ $post->post_title }}">
                            </div>
                            <!-- 投稿の本文 -->
                            <div class="post-content-input">
                                <label class="text-sm">投稿の本文</label><br>
                                <textarea class="rounded-md border-indigo-400 w-96 h-32" name="post_content">{{ $post->post_content }}</textarea>
                            </div>
                            <!-- 投稿の登録ボタン -->
                            <div class="post-button">
                                <button class="bg-indigo-400 rounded-md p-1 text-white">編集する</button>
                            </div>
                        </form>
                        <!-- 戻るボタン -->
                            <input class="back-button postedit-back-button" onclick="history.back()" value="戻る">
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
                        <a href="{{ route('top-admin-department') }}">
                            部署
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>