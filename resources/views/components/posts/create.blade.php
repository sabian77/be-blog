<!-- Create modal -->
        <!-- Modal content -->
        <div class="relative p-4 max-w-4xl bg-white rounded-lg border dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Add Post</h3>
            </div>
            <!-- Modal body -->
            <form action="/dashboard" method="POST">
                @csrf
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" name="title" id="title" class=" border border-gray-300
                         text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                         block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                          dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                          placeholder="Type post title" >
                    </div>
                    <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Category
                    </label>
                    <select id="category" name="category"
                        class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300
                            focus:ring-primary-500 focus:border-primary-500
                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                            dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="" disabled selected hidden class="text-gray-400">Select post category</option>
                        @foreach ( App\Models\Category::get() as $category)    
                        <option value="{{ $category->id}}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Body
                        </label>
                        <textarea id="body" name="body" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border
                         border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600
                          dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="Write post here"></textarea>
                    </div>
                </div>
                <div class="flex gap-3">
                <button type="submit" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Add new post
                </button>
                <a href="/dashboard" class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    Cancel
                </a>
                </div>
            </form>
        </div>