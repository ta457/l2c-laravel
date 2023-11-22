@props([
'courses' => $props['courses'],
'groups' => $props['groups']
])

<x-admin-layout :data="$courses">
  {{-- Page header ----------------------------------------------------------- --}}
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Admin Panel / Courses') }} 
        <x-header-message />
    </h2>
  </x-slot>

  {{-- Table header ---------------------------------------------------------- --}}
  <x-admin-table-header action="/admin-dashboard/courses">
    <select name="group_id"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
      <option @if (request('group_id') == 0) @selected(true) @endif  value="0">All</option>
      @foreach ($groups as $group)
        <option value="{{ $group->id }}"
          @if (request('group_id') == $group->id)
            @selected(true)  
          @endif  
        >
          {{ $group->name }}
        </option>
      @endforeach
    </select>
  </x-admin-table-header>

  {{-- Table body ------------------------------------------------------------ --}}
  <div class="overflow-x-auto">
    <x-admin-table-body action='/admin-dashboard/courses' :heads="['ID','Name','Group','Description']">
      <tbody>
        @foreach ($courses as $course)
        <tr class="border-b dark:border-gray-700">
          <td class="px-4 py-3">
            <input class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" 
              type="checkbox" name="selected[]" value="{{ $course->id }}">
          </td>
          <td class="px-4 py-3">
            {{ $course->id }}
          </td>
          <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $course->name }}
          </th>
          <td class="px-4 py-3">
            {{ $course->group_name }}
          </td>
          <td class="px-4 py-3">
            {{ $course->description }}
          </td>
          <x-admin-table-dropdown action='/admin-dashboard/courses' :id="$course->id" />
        </tr>
        @endforeach
      </tbody>
    </x-admin-table-body>
  </div>

  <!-- Create Group modal ------------------------- -->
  <x-admin-create-modal action="/admin-dashboard/courses" header="Create new course">
    {{-- modal form input fields --}}
    <div>
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
      <input type="text" name="name" id="name"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="VueJS basic" required>
    </div>
    <div>
      <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
      <input type="text" name="slug" id="slug"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="vue-basic" required>
    </div>
    <div>
      <label for="group_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Group</label>
      <select id="group_id" name="group_id" required
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
        <option selected="">Select group</option>
        @foreach ($groups as $group)
          <option value="{{ $group->id }}">{{ $group->name }}</option>
        @endforeach
      </select>
    </div>
    <div>
      <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
      <input type="description" name="description" id="description"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="Type course description here" required>
    </div>
  </x-admin-create-modal>

  <!-- Delete modal ------------------------------ -->
  <x-admin-delete-modal />
  <x-admin-delete-all-modal />

</x-admin-layout>