<x-guest-layout>
    <div class="mb-2 mt-0 text-4xl font-medium leading-tight text-primary text-center">
        <h1>Új autó hozzáadása</h1>
    </div>
    <div class="w-96 mx-auto">
        <form method="POST" action="{{ route('cars.store') }}" novalidate enctype="multipart/form-data">
            @csrf

            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="marka" id="marka"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ old('marka') }}" />
                    <label for="marka"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Márka</label>
                    @error('marka')
                        <span class="text-red-600">{{ $message }}</span><br>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="tipus" id="tipus"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ old('tipus') }}" />
                    <label for="tipus"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Típus</label>
                    @error('tipus')
                        <span class="text-red-600">{{ $message }}</span><br>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="number" name="napAr" id="napAr"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ old('napAr') }}" />
                    <label for="napAr"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Napi
                        bérlés ára forintban</label>
                    @error('napAr')
                        <span class="text-red-600">{{ $message }}</span><br>
                    @enderror
                    <br>

                    <label for="kep" class="mb-2 mt-0 text-l font-medium leading-tight text-primary">
                        Kép feltöltése az autóról
                    </label>
                    <input type="file" name="kep" value="{{ old('kep') }}"><br>
                </div>
            </div>


            <button type="submit"
                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Mentés</button>
        </form>
    </div>

</x-guest-layout>
