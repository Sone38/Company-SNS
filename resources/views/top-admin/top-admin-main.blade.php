<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            総管理者用メインページ
        </h2>
    </x-slot>
    <div class="page-wrapper flex">
        <div class="py-12 w-70vw">
            <div class="max-w-5-5xl mr-auto sm:px-6 lg:px-8">
                @foreach($posts as $posts)
                <div class="posts bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 bg-white border-b border-gray-200 post-form">
                    <div class="postTitle">
                        <div>
                            <p class="post-date">{{ $posts->created_at }}</p>
                            <h3>{{ $posts->post_title }}</h3>
                        </div>
                        <div class="post-list">
                            <ul>
                                <li><a href="{{ route('top-admin-post-edit', ['id'=>$posts->id]) }}">編集</a></li>
                                <li><a href="{{ route('top-admin-post-delete', ['id'=>$posts->id]) }}" onclick="return confirm('選択した投稿を削除しますか？')">削除</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="post-content">
                        <p>{!! nl2br(e($posts->post_content)) !!}</p>
                    </div>
                    @if($posts->img_path != null)
                        <img src="{{ Storage::url($posts->img_path) }}" width="25%">
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        <div class="side-menu py-12 w-quarter">
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
