<x-guest-layout>

    <h1 class="mb-2 mt-0 text-4xl font-medium leading-tight text-primary text-center">Főoldal - Autók</h1>

    <form method="GET" action="{{ route('index') }}">
        <label for="start">Bérlés kezdete:</label>
        <input type="date" id="start" name="start" value="{{ $start }}" min="2023-01-01" max="2032-12-31">
        @error('start')
            <span class="text-red-600">{{ $message }}</span><br>
        @enderror

        <br>
        <label for="start">Bérlés vége:</label>
        <input type="date" id="end" name="end" value="{{ $end }}" min="2023-01-01" max="2032-12-31">
        @error('end')
            <span class="text-red-600">{{ $message }}</span><br>
        @enderror

        <input type="hidden" id="end" name="fromUser" value="true">
        <br>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Szabad autók keresése
        </button>
    </form>

    @if (count($cars) > 0)
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
                                {{ $car->marka }}{{ $car->id }}
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
                                <a href="{{ route('reservations.create', ['start' => $start, 'end' => $end, 'car'=>$car]) }}"
                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    Lefoglalás
                                </a>
                            </td>
                        </tr>

                    @empty
                        Nincsenek elérhető autók.
                    @endforelse
                </tbody>
            </table>
        </div>
    @endif


</x-guest-layout>
