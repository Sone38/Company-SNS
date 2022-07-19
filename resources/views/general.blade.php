<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            社員用メインページ
        </h2>
    </x-slot>

    <div class="page-wrapper flex">
        <div class="py-12 w-70vw">
            <div class="max-w-5-5xl mr-auto sm:px-6 lg:px-8">
                @foreach($posts as $posts)
                <div class="posts bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 bg-white border-b border-gray-200 post-form">
                    <div class="postTitle">
                        <div>
                            <p class="post-date">{{ $posts['created_at'] }}</p>
                            <h3>{!! nl2br(e($posts['post_title'])) !!}</h3>
                        </div>
                    </div>
                    <div class="post-content">
                        <p>{!! nl2br(e($posts['post_content'])) !!}</p>
                    </div>
                    <div class="post-like">
                            <!-- いいね機能 -->
                        @if($like_model->alreadyLiked(Auth::user()->id, $posts->id))
                            <a class="js-like-toggle liked" href="" data-postid="{{ $posts->id }}"><i class="fab fa-gratipay">いいね</i></a>
                            <span class="likesCount">{{ $posts->likes_count }}</span>
                        @else
                            <a class="js-like-toggle" href="" data-postid="{{ $posts->id }}"><i class="fab fa-gratipay">いいね</i></a>
                            <span class="likesCount">{{ $posts->likes_count }}</span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="side-menu py-12">
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
                        <a href="{{ route('general-user') }}">
                            ユーザー一覧
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
