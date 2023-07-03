<x-guest-layout>
    <div class="mb-2 mt-0 text-4xl font-medium leading-tight text-primary text-center">
        <h1>Autó szerkesztése</h1>
    </div>

    <form method="POST" action="{{ route('cars.update', ['car' => $car]) }}" novalidate>
        @csrf
        @method('PATCH')

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="marka" id="marka"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " value="{{ old('marka', $car->marka) }}" />
                <label for="marka"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Márka</label>
                @error('marka')
                    <span class="text-red-600">{{ $message }}</span><br>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="tipus" id="tipus"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " value="{{ old('tipus', $car->tipus) }}" />
                <label for="tipus"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Típus</label>
                @error('tipus')
                    <span class="text-red-600">{{ $message }}</span><br>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="number" name="napAr" id="napAr"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " value="{{ old('napAr', $car->napAr) }}" />
                <label for="napAr"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Napi
                    bérlés ára forintban</label>
                @error('napAr')
                    <span class="text-red-600">{{ $message }}</span><br>
                @enderror
            </div>
        </div>


        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

</x-guest-layout>
