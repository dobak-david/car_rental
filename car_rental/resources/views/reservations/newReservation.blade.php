<x-guest-layout>

    <h1 class="mb-2 mt-0 text-4xl font-medium leading-tight text-primary text-center">Új foglalás</h1>

    <h2>Foglalási adatok</h2>

    <form method="POST" action="{{ route('reservations.store') }}" enctype="multipart/form-data" novalidate>
        @csrf

        <input type="hidden" name="berles_kezdete" value="{{ $start }}">
        <input type="hidden" name="berles_vege" value="{{ $end }}">
        <input type="hidden" name="auto_id" value="{{ $car->id }}">

        <div>Foglalás kezdete: {{ $start }}</div>
        <div>Foglalás vége: {{ $end }}</div>
        <h3>Autó adatai:</h3>
        <div>Márka: <h5>{{ $car->marka }}</h5>
        </div>
        <div>Típus: <h5>{{ $car->tipus }}</h5>
        </div>
        <div>Napi bérlés ára: <h5>{{ $car->napAr }}</h5>
        </div>

        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="berlo_neve" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Név</label>
                <input type="text" id="name" name="berlo_neve"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="John" value="{{ old('berlo_neve') }}">
                @error('berlo_neve')
                    <span class="text-red-600">{{ $message }}</span><br>
                @enderror
            </div>
            <div>
                <label for="berlo_telefon"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefonszám</label>
                <input type="tel" id="phone" name="berlo_telefon"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="20-345-31-43" pattern="[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{2}" value="{{ old('berlo_telefon') }}">
                @error('berlo_telefon')
                    <span class="text-red-600">{{ $message }}</span><br>
                @enderror
            </div>

        </div>
        <div class="mb-6">
            <label for="berlo_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email cím</label>
            <input type="email" id="email" name="berlo_email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="john.doe@gmail.com" value="{{ old('berlo_email') }}">
            @error('berlo_email')
                <span class="text-red-600">{{ $message }}</span><br>
            @enderror
            <div>
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cím</label>
                <input type="text" id="address" name="berlo_cim"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="John" value="{{ old('berlo_cim') }}">
            </div>
        </div>

        <div>Foglalandó napok száma: {{ $daysNum }}</div>

        <h4>A foglalás összege: {{ $daysNum * $car->napAr }}</h4>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Foglalás
            véglegesítése</button>
    </form>


</x-guest-layout>
