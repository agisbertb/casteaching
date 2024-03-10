<x-casteaching-layout>
    <div class="px-4 sm:px-6 lg:px-8">

        <div class="mt-10 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
                        <h3 class="text-base font-semibold leading-6 text-gray-900">Users</h3>
                    </div>

                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">ID</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">name</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Superadmin</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                        @foreach($users as $user)
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $user->id }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->name }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->email }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->superadmin }}</td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                <a href="/users/{{ $user->id }}" target="_blank" class="text-indigo-600 hover:text-indigo-900">Show</a>
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-casteaching-layout>
