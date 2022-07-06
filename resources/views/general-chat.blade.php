<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            社員用チャットページ
        </h2>
    </x-slot>

    <div class="page-wrapper flex">
        <div class="py-12 w-70vw">
            <div class="max-w-5-5xl mr-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="chat border rounded-md h-60vh">
                            <h2 class="chat-title border-b">チャット</h2>
                            <div class="chat-send-messages">
                                @foreach($allMessageFromTable as $message)
                                <div class="chat-send-message">
                                    <div>
                                        <span class="chat-name">{{ $message->name }}<br></span>
                                        <span class="chat-message">{!! nl2br(e($message->message)) !!}</span>
                                        <span class="chat-time">{{ $message->created_at }}<br></span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <form method="post" action="">
                            @csrf
                                <div class="chat-input-message">
                                    <textarea name="chat_message" id="chat_message" rows="1" required></textarea>
                                    <input type="submit" value="送信" name="chatMessageSend" id="chatMessageSend">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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