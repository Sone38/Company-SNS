<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            社員用問い合わせ確認ページ
        </h2>
    </x-slot>

    <div class="page-wrapper flex">
        <div class="py-12 w-70vw">
            <div class="max-w-5-5xl mr-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="form">
                            <div class="form-name">
                                <div class="form-label">
                                    <label>名前</label>
                                </div>
                                <div class="confirm-name">
                                    {{ $formInputInformation['name'] }}
                                </div>
                            </div>
                            <div class="form-department">
                                <div class="form-label">
                                    <label>所属部署</label>
                                </div>
                                <div class="confirm-department">
                                    {{ $formInputInformation['department'] }}
                                </div>
                            </div>
                            <div class="form-title">
                                <div class="form-label">
                                    <label>タイトル</label>
                                </div>
                                <div class="confirm-title">
                                    {{ $formInputInformation['title'] }}
                                </div>
                            </div>
                            <div class="form-content">
                                <div class="form-label">
                                    <label>問い合わせ内容</label>
                                </div>
                                <div class="confirm-content">
                                    {!! nl2br(e($formInputInformation['body'])) !!}
                                </div>
                            </div>
                            <form method="post" action="{{ route('general-form-complete') }}">
                                @csrf
                                <input type="hidden" name="formConfirmName" value="{{ $formInputInformation['name'] }}">
                                <input type="hidden" name="formConfirmDepartment" value="{{ $formInputInformation['department'] }}">
                                <input type="hidden" name="formConfirmTitle" value="{{ $formInputInformation['title'] }}">
                                <input type="hidden" name="formConfirmBody" value="{{ $formInputInformation['body'] }}">
                                <input type="submit" class="submit-button" value="問い合わせを送信する">
                                <input type="button" class="back-button" value="戻る" onclick="history.back()">
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
        </div>
    </div>
</x-app-layout>