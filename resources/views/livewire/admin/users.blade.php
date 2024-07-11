<div>
    <div>
        <div class="relative overflow-x-auto  shadow-md sm:rounded-lg">
            <table class="w-full h-fit text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-2 py-3">
                            user name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            admin
                        </th>
                        <th scope="col" class="px-6 py-3">
                            joined at
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="bg-gray-800 border-b border-gray-700 hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            @if($user->admin === 1)
                            <svg class="w-6" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.88" style="enable-background:new 0 0 122.88 122.88" xml:space="preserve">
                                <style type="text/css">
                                    <![CDATA[
                                    .st0 {
                                        fill-rule: evenodd;
                                        clip-rule: evenodd;
                                        fill: #3AAF3C;
                                    }

                                    ]]>
                                </style>
                                <g>
                                    <path class="st0" d="M61.44,0c33.93,0,61.44,27.51,61.44,61.44c0,33.93-27.51,61.44-61.44,61.44C27.51,122.88,0,95.37,0,61.44 C0,27.51,27.51,0,61.44,0L61.44,0L61.44,0z M39.48,56.79c4.6,2.65,7.59,4.85,11.16,8.78c9.24-14.88,19.28-23.12,32.32-34.83 l1.28-0.49h14.28C79.38,51.51,64.53,69.04,51.24,94.68c-6.92-14.79-13.09-25-26.88-34.47L39.48,56.79L39.48,56.79z" />
                                </g>
                            </svg>
                            @elseif ($user->admin === 0)
                            <svg class="w-6 h-6" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.879px" height="122.879px" viewBox="0 0 122.879 122.879" enable-background="new 0 0 122.879 122.879" xml:space="preserve">
                                <g>
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#FF4141" d="M61.44,0c33.933,0,61.439,27.507,61.439,61.439 s-27.506,61.439-61.439,61.439C27.507,122.879,0,95.372,0,61.439S27.507,0,61.44,0L61.44,0z M73.451,39.151 c2.75-2.793,7.221-2.805,9.986-0.027c2.764,2.776,2.775,7.292,0.027,10.083L71.4,61.445l12.076,12.249 c2.729,2.77,2.689,7.257-0.08,10.022c-2.773,2.765-7.23,2.758-9.955-0.013L61.446,71.54L49.428,83.728 c-2.75,2.793-7.22,2.805-9.986,0.027c-2.763-2.776-2.776-7.293-0.027-10.084L51.48,61.434L39.403,49.185 c-2.728-2.769-2.689-7.256,0.082-10.022c2.772-2.765,7.229-2.758,9.953,0.013l11.997,12.165L73.451,39.151L73.451,39.151z" />
                                </g>
                            </svg>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->created_at->format('Y-m-d') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
