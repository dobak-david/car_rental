<x-guest-layout>

    <h1 class="mb-2 mt-0 text-4xl font-medium leading-tight text-primary text-center">Autok</h1>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Márka
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Típus
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Napi bérlés díja
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kép
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cars as $car)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $car->marka }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $car->tipus }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $car->napAr }}
                        </td>
                        <td class="px-6 py-4">
                            <img src="{{ $car->kep }}" alt="kep_auto" width="100">
                        </td>
                        <td>
                            <a href="{{ route('cars.edit', ['car' => $car]) }}"
                                class="inline-block p-2 mb-4 bg-yellow-700 hover:bg-yellow-900 text-white">
                                Autó módosítása
                            </a>
                        </td>
                    </tr>

                @empty
                    Nincsenek autók.
                @endforelse
            </tbody>
        </table>
    </div>

</x-guest-layout>
