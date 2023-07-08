<x-guest-layout>

    @if (Session::get('car-delete-cant'))
        <div class="text-2xl text-center bg-red-800 rounded-lg shadow-md shadow-red-500 mb-4 text-white">
            Az autót nem lehet törölni, mert le van foglalva.
        </div>
    @elseif (Session::get('car-deleted'))
        <div class="text-2xl text-center bg-green-800 rounded-lg shadow-md shadow-green-500 mb-4 text-white">
            Sikeres törlés!
        </div>
    @endif

    <h1 class="mb-2 mt-0 text-4xl font-medium leading-tight text-primary text-center">Autók</h1>

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
                    <th scope="col" class="px-6 py-3">
                        Funkciók
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
                            @if ($car->kep === null)
                                <div>Nincsen feltöltött kép</div>
                            @else
                                @if (str_contains(Storage::url('images/' . $car->kep), 'via.placeholder'))
                                    <img src="{{ $car->kep }}" alt="kep_auto" width="100px">
                                @else
                                    <img src="{{ Storage::url('images/' . $car->kep) }}" alt="kep_auto" width="100px">
                                @endif
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('cars.edit', ['car' => $car]) }}"
                                class="inline-block p-2 mb-4 bg-yellow-700 hover:bg-yellow-900 text-white">
                                Autó módosítása
                            </a>
                            <form action="{{ route('cars.destroy', ['car' => $car]) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="p-2 mb-4 bg-red-700 hover:bg-red-900 text-white">Autó
                                    törlése</button>
                            </form>
                        </td>
                    </tr>

                @empty
                    Nincsenek autók.
                @endforelse
            </tbody>
        </table>
    </div>

</x-guest-layout>
