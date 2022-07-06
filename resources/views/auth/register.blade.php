<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
            <img src="{{ asset('/img/Company-SNS_icon.jpeg') }}" class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" value="名前" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- kana -->
            <div class="mt-4">
                <x-label for="kana" value="フリガナ" />

                <x-input id="kana" class="block mt-1 w-full" type="text" name="kana" :value="old('kana')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" value="メールアドレス" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" value="パスワード" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" value="パスワード（確認用）" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <!-- Select Department -->
            <div class="mt-4">
                <x-label for="department_id" value="部署選択" />

                <select name="department_id">
                    <option value="">--部署を選択してください--</option>
                    @foreach($NamesOfDepartment as $NameOfDepartment)
                    <option value="{{ $NameOfDepartment['id'] }}">{{ $NameOfDepartment['name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    新規登録がお済みの方はこちら
                </a>

                <x-button class="ml-4">
                    登録する
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
