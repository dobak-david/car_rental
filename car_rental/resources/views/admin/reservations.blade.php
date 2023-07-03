<x-guest-layout>

    <h1 class="mb-2 mt-0 text-4xl font-medium leading-tight text-primary text-center">Foglalások</h1>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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

                @forelse($reservations as $res)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $res->berles_kezdete }} / {{ $res->berles_vege }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $res->berlo_neve }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $res->berlo_telefon}}
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
                    Nincsenek foglalások.
                @endforelse
            </tbody>
        </table>
    </div>


</x-guest-layout>
