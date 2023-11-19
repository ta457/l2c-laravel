@props([
'groups' => $props['groups']
])

<x-admin-layout :data="$groups">
  {{-- Page header ----------------------------------------------------------- --}}
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Admin Panel / Groups') }} 
        <x-header-message />
    </h2>
  </x-slot>

  {{-- Table header ---------------------------------------------------------- --}}
  <x-admin-table-header action="/admin-dashboard/groups">

  </x-admin-table-header>

  {{-- Table body ------------------------------------------------------------ --}}
  <div class="overflow-x-auto">
    <x-admin-table-body action='/admin-dashboard/groups' :heads="['ID','Name','Description']">
      <tbody>
        @foreach ($groups as $group)
        <tr class="border-b dark:border-gray-700">
          <td class="px-4 py-3">
            <input class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" 
              type="checkbox" name="selected[]" value="{{ $group->id }}">
          </td>
          <td class="px-4 py-3">
            {{ $group->id }}
          </td>
          <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $group->name }}
          </th>
          <td class="px-4 py-3">
            {{ $group->description }}
          </td>
          <x-admin-table-dropdown action='/admin-dashboard/groups' :id="$group->id" />
        </tr>
        @endforeach
      </tbody>
    </x-admin-table-body>
  </div>

  <!-- Create Group modal ------------------------- -->
  <x-admin-create-modal action="/admin-dashboard/groups" header="Create new group">
    {{-- modal form input fields --}}
    <div>
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
      <input type="text" name="name" id="name"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="VueJS" required>
    </div>
    <div>
      <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
      <input type="description" name="description" id="description"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="Type group description here" required>
    </div>
  </x-admin-create-modal>

  <!-- Delete modal ------------------------------ -->
  <x-admin-delete-modal />

</x-admin-layout>