<x-layouts.layout>
    <section class="max-w-3xl mx-auto py-16 px-6 text-white">
        <h1 class="text-5xl font-extrabold mb-8">Про нас</h1>

        <p class="text-gray-400 mb-6 leading-relaxed">
            Ласкаво просимо на наш сайт! Ми — команда ентузіастів, які захоплюються світом клавіатур, периферії та технологій.
            Нашою метою є допомагати вам знаходити найкращі продукти, розповідати про новинки та ділитися корисними порадами.
        </p>

        <x-panel class="bg-gray-900 p-8 rounded-lg mb-10">
            <h2 class="text-2xl font-bold mb-4">Наша місія</h2>
            <p class="text-gray-300 leading-relaxed">
                Ми прагнемо створити спільноту, де кожен може дізнатися про найновіші тенденції у світі клавіатур і геймерської периферії,
                отримати чесні огляди і знайти натхнення для своїх проектів.
            </p>
        </x-panel>

        <x-panel class="bg-gray-900 p-8 rounded-lg mb-10">
            <h2 class="text-2xl font-bold mb-4">Наша команда</h2>
            <p class="text-gray-300 leading-relaxed mb-4">
                У нашій команді є досвідчені оглядачі, автори статей і відеопродюсери, які роблять все, щоб контент був цікавим та корисним.
            </p>

            <div class="flex flex-wrap gap-6">
                <x-panel class="flex flex-row gap-x-6 bg-gray-800 p-4 rounded-lg flex-1 max-w-md">
                    <div>
                        <x-publisher-logo />
                    </div>
                    <div class="flex-1 flex flex-col">
                        <a href="#" class="self-start text-sm text-gray-400 transition-colors duration-500">Laracasts</a>
                        <h3 class="font-bold text-xl mt-3">Video Producer</h3>
                        <p class="text-sm text-gray-400 mt-auto">Full Time - From $60,000</p>
                    </div>
                    <div>
                        <x-tag>Video</x-tag>
                        <x-tag>Production</x-tag>
                    </div>
                </x-panel>

                <x-panel class="flex flex-row gap-x-6 bg-gray-800 p-4 rounded-lg flex-1 max-w-md">
                    <div>
                        <x-publisher-logo />
                    </div>
                    <div class="flex-1 flex flex-col">
                        <a href="#" class="self-start text-sm text-gray-400 transition-colors duration-500">KeyChron</a>
                        <h3 class="font-bold text-xl mt-3">Content Writer</h3>
                        <p class="text-sm text-gray-400 mt-auto">Part Time - Flexible</p>
                    </div>
                    <div>
                        <x-tag>Writing</x-tag>
                        <x-tag>Editing</x-tag>
                    </div>
                </x-panel>
            </div>
        </x-panel>

        <x-panel class="bg-gray-900 p-8 rounded-lg">
            <h2 class="text-2xl font-bold mb-4">Зв’язатися з нами</h2>
            <p class="text-gray-300 mb-4 leading-relaxed">
                Якщо у вас є питання або пропозиції, не соромтеся писати нам через сторінку <a href="{{ route('contact') }}" class="text-blue-500 underline">Контакти</a>.
            </p>
        </x-panel>
    </section>
</x-layouts.layout>
