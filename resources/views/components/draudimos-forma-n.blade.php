

<div>
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
    <div>
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-2 py-6 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Nekilnojamo turto draudimo forma</h3>
        <p class="mt-1 text-sm text-gray-600">Pateikite visą reikiamą informacija apie būstą.</p>
      </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">




      <form action='/forma/bustas' method="post" enctype="multipart/form-data">
        @csrf
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="squares" class="block text-sm font-medium text-gray-700"> Kvadratūra (kv2) </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="text" name="squares" id="squares" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="52">
                </div>
              </div>



              <div class="col-span-3 sm:col-span-2">
                <label for="address" class="block text-sm font-medium text-gray-700"> Būsto adresas </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="text" name="address" id="address" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Ginkūnu g. 7">
                </div>
              </div>
            </div>


            <div>
              <label for="about" class="block text-sm font-medium text-gray-700"> Jūsų komentaras (nebūtina) </label>
              <div class="mt-1">
                <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="..."></textarea>
              </div>
              <p class="mt-2 text-sm text-gray-500">Trumpas aprašymas apie bustą.</p>
            </div>

           
     

            <div>
              <label class="block text-sm font-medium text-gray-700"> Būsto nuotrauka </label>
              <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                  <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <div class="flex text-sm text-gray-600">
                    <label for="fileUpload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                      <span>Upload a file</span>
                      <input id="fileUpload" name="fileUpload" type="file" class="sr-only">
                    </label>
                    <p class="pl-1">or drag and drop</p>
                  </div>
                  <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                </div>
              </div>
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Pateikti</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

</div>
