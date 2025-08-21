<x-admin-layout :title="'Notification'">
    <div>
        <label for="join" class="block mb-2 text-sm font-medium text-gray-900">Class Joined</label>
        <select id="join" name="join[]" multiple
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
            <option value="Mon-2100-K1">Mon-2100-K1</option>
            <option value="Tue-2000-K2">Tue-2000-K2</option>
            <option value="Wed-1930-K3">Wed-1930-K3</option>
        </select>
    </div>

    <script>
        new TomSelect("#join", {
            plugins: ['remove_button'],
            maxItems: 2,
            create: false,
            persist: false,
            render: {
                item: function(data, escape) {
                    return `<div class="bg-green-100 text-green-800 text-xs font-medium mr-1 mb-1 px-2.5 py-1 rounded-md flex items-center">
                  ${escape(data.text)}
                </div>`;
                },
                option: function(data, escape) {
                    return `<div class="px-3 py-2 text-sm text-gray-900 hover:bg-green-50 cursor-pointer">
                  ${escape(data.text)}
                </div>`;
                }
            }
        });
    </script>





</x-admin-layout>