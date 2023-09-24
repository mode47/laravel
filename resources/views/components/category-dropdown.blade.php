      <x-dropdown>
                 <div x-show="show" class="py-2  bg-gray-100 mt-2 rounded-xl w-full z-50 overflow-auto max-h-52" >
                   @foreach ($categories as $category)
                    <a href="/?category={{$category->slug}}}"
                        class="block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white">
                         {{ucwords($category->name) }}</a>
                 @endforeach
                </div>
            </x-dropdown>
