<x-guest-layout>

    <h1 class="mb-2 mt-0 text-4xl font-medium leading-tight text-primary text-center">Foglalások</h1>

    <div class="m-12">
        <a class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800"
            href="{{ route('reservations.listpast') }}">Múltbeli foglalások megtekintése</a><br><br>
        <a class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
            href="{{ route('reservations.listactive') }}">Aktív foglalások megtekintése</a><br><br>
        <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            href="{{ route('reservations.listfuture') }}">Jövőbeli foglalások megtekintése</a><br><br>
            <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            href="{{ route('reservations.index') }}">Összes foglalás megtekintése</a><br><br>
    </div>

    <div class="relative overflow-x-auto">
        <h2 class="mb-2 mt-0 text-4xl font-medium leading-tight text-primary mx-10">{{ $mode }}</h2>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            @if (count($reservations) > 0)
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Bérlés kezdete / vége
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Bérlő neve
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Bérlő telefonszáma
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Bérlő email címe
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Bérlő címe
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Autó márkája és típusa
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Foglalás összege
                        </th>
                    </tr>
                </thead>
                <tbody>
            @endif

            @forelse($reservations as $res)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $res->berles_kezdete }} / {{ $res->berles_vege }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $res->berlo_neve }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $res->berlo_telefon }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $res->berlo_email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $res->berlo_cim }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $res->car->marka }} {{ $res->car->tipus }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $res->osszeg }}
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('reservations.destroy', ['reservation' => $res->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="mb-4 bg-red-700 hover:bg-red-900 text-white">Foglalás
                                törlése</button>
                        </form>
                    </td>
                </tr>
            @empty
                <div class="mx-5">Nincsenek foglalások.</div>
            @endforelse
            </tbody>
        </table>
    </div>


</x-guest-layout>
