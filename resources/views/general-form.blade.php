<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            社員用お問い合わせページ
        </h2>
    </x-slot>

    <div class="page-wrapper flex">
        <div class="py-12 w-70vw">
            <div class="max-w-5-5xl mr-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="form">
                            <form method="post" action="{{ route('general-form-confirm') }}">
                            @csrf
                                <div class="form-name">
                                    <div class="form-label">
                                        <label>名前</label>
                                    </div>
                                    <p>無記入の場合は「匿名」として問い合わせが送られます。</p>
                                    @if($errors->has('nameOfForm'))
                                    <span class='error-msg'>{{$errors->first('nameOfForm')}}</span>
                                    @endif
                                    <div class="form-name-input">
                                        <input type="text" placeholder="名前を入力してください" name="nameOfForm" value="{{ old('nameOfForm') }}">
                                    </div>
                                </div>
                                <div class="form-department">
                                    <div class="form-label">
                                        <label>所属部署　<span>必須</span></label>
                                    </div>
                                    @if($errors->has('departmentOfForm'))
                                    <span class='error-msg'>{{$errors->first('departmentOfForm')}}</span>
                                    @endif
                                    <div class="form-department-input">
                                        <select name="departmentOfForm">
                                            <option>--部署を選択してください--</option>
                                        @foreach($NamesOfDepartment as $NameOfDepartment)
                                            <option value="{{ $NameOfDepartment['id'] }}">{{ $NameOfDepartment['name'] }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-title">
                                    <div class="form-label">
                                        <label>タイトル　<span>必須</span></label>
                                    </div>
                                    @if($errors->has('titleOfForm'))
                                    <span class='error-msg'>{{$errors->first('titleOfForm')}}</span>
                                    @endif
                                    <div class="form-title-input">
                                        <input type="text" placeholder="タイトルを入力してください" name="titleOfForm" value="{{ old('titleOfForm') }}">
                                    </div>
                                </div>
                                <div class="form-content">
                                    <div class="form-label">
                                        <label>問い合わせ内容　<span>必須</span></label>
                                    </div>
                                    @if($errors->has('bodyOfForm'))
                                    <span class='error-msg'>{{$errors->first('bodyOfForm')}}</span>
                                    @endif
                                    <div class="form-contact-input">
                                        <textarea name="bodyOfForm" rows="9">{{ old('bodyOfForm') }}</textarea>
                                    </div>
                                </div>
                                <input class="submit-button" type="submit" value="確認画面へ">
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