<template>
  <AdminLayout>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 py-8 px-4 sm:px-6 lg:px-8">
      <!-- Header + Stats Section -->
      <div class="max-w-7xl mx-auto mb-8">
        <div class="bg-white shadow-xl p-8 border border-slate-200">
          <!-- Header -->
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
            <div>
              <h1 class="text-3xl font-bold text-slate-800 mb-2">User Management</h1>
              <p class="text-slate-600">Manage and track user accounts</p>
            </div>
            <div class="mt-4 sm:mt-0 flex gap-3">
              <button 
                @click="openCreateModal" 
                class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition-colors duration-200"
              >
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Add New User
              </button>
            </div>
          </div>

          <!-- Stats -->
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl p-6 border border-blue-200">
              <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-lg">
                  <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                  </svg>
                </div>
                <div class="ml-4">
                  <p class="text-sm font-medium text-blue-700">Total Users</p>
                  <p class="text-2xl font-bold text-blue-900">{{ users.data ? users.data.length : 0 }}</p>
                </div>
              </div>
            </div>

            <div class="bg-gradient-to-r from-green-50 to-green-100 rounded-xl p-6 border border-green-200">
              <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-lg">
                  <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                  </svg>
                </div>
                <div class="ml-4">
                  <p class="text-sm font-medium text-green-700">Active Users</p>
                  <p class="text-2xl font-bold text-green-900">{{ users.data ? users.data.length : 0 }}</p>
                </div>
              </div>
            </div>

            <div class="bg-gradient-to-r from-purple-50 to-purple-100 rounded-xl p-6 border border-purple-200">
              <div class="flex items-center">
                <div class="p-3 bg-purple-100 rounded-lg">
                  <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                  </svg>
                </div>
                <div class="ml-4">
                  <p class="text-sm font-medium text-purple-700">Barangays</p>
                  <p class="text-2xl font-bold text-purple-900">8</p>
                </div>
              </div>
            </div>

            <div class="bg-gradient-to-r from-orange-50 to-orange-100 rounded-xl p-6 border border-orange-200">
              <div class="flex items-center">
                <div class="p-3 bg-orange-100 rounded-lg">
                  <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                  </svg>
                </div>
                <div class="ml-4">
                  <p class="text-sm font-medium text-orange-700">Recent</p>
                  <p class="text-2xl font-bold text-orange-900">{{ users.data ? Math.min(users.data.length, 5) : 0 }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Users Table Section -->
      <div class="max-w-7xl mx-auto">
        <div class="bg-white shadow-xl border border-slate-200 overflow-hidden">
          <!-- Header -->
          <div class="px-8 py-6 border-b border-slate-200 bg-slate-50">
            <div class="flex items-center justify-between mb-4">
              <h3 class="text-xl font-semibold text-slate-800">User Directory</h3>
              <span class="text-sm text-slate-600">{{ users.data ? users.data.length : 0 }} total users</span>
            </div>
          </div>

          <!-- Users Table -->
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
              <thead class="bg-slate-50">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">User</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Contact</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Location</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Role</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Created</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Actions</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-slate-200">
                <tr v-for="user in users.data" :key="user.id" class="hover:bg-slate-50 transition-colors duration-150">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10">
                        <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                          <span class="text-sm font-medium text-white">{{ getInitials(user.name) }}</span>
                        </div>
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-slate-900">{{ user.name }}</div>
                        <div class="text-sm text-slate-500">ID: {{ user.id }}</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="text-sm font-medium text-slate-900">{{ user.email }}</div>
                    <div class="text-sm text-slate-500">{{ user.phone || 'No phone number' }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center text-sm text-slate-500">
                      <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                      </svg>
                      {{ formatBarangay(user.barangay) || 'Not specified' }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span :class="[
                      'inline-flex items-center px-3 py-1 text-xs font-medium rounded-full',
                      getRoleClass(user.role || 'user')
                    ]">
                      {{ formatRole(user.role || 'user') }}
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">
                    {{ formatDate(user.created_at) }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex items-center space-x-2">
                      <ActionButton
                        types="edit"
                        size="md"
                        @click="openEditModal(user)"
                      >
                        Edit
                      </ActionButton>
                      <ActionButton
                        types="delete"
                        size="md"
                        @click="openDeleteModal(user)"
                      >
                        Delete
                      </ActionButton>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            
            <!-- Empty state -->
            <div v-if="!users.data || users.data.length === 0" class="text-center py-12">
              <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
              </svg>
              <h3 class="mt-2 text-sm font-medium text-gray-900">No users found</h3>
              <p class="mt-1 text-sm text-gray-500">Get started by creating a new user account.</p>
              <div class="mt-6">
                <button 
                  @click="openCreateModal"
                  class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white text-sm font-medium rounded-lg hover:bg-emerald-700 transition-colors duration-200"
                >
                  <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                  </svg>
                  Add New User
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Pagination -->
      <div class="max-w-7xl mx-auto mt-6" v-if="users.links && users.links.length > 3">
        <div class="bg-white shadow-xl border border-slate-200 px-6 py-4">
          <div class="flex justify-center space-x-1">
            <template v-for="link in users.links" :key="link.url">
              <Link 
                v-if="link.url" 
                :href="link.url" 
                v-html="link.label" 
                class="px-4 py-2 border rounded-lg transition-colors font-medium text-sm"
                :class="{ 
                  'bg-emerald-500 text-white border-emerald-500 shadow-md': link.active,
                  'bg-white text-slate-700 border-slate-300 hover:bg-slate-50': !link.active 
                }" 
              />
              <span 
                v-else 
                v-html="link.label" 
                class="px-4 py-2 border rounded-lg bg-slate-100 text-slate-400 border-slate-300 font-medium text-sm"
              />
            </template>
          </div>
        </div>
      </div>
    </div>

    <!-- Create User Modal -->
    <div v-if="showCreateModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
      <div class="bg-white shadow-2xl max-w-md w-full max-h-[95vh] overflow-y-auto border border-gray-300">
        <!-- Header -->
        <div class="bg-emerald-600 text-white p-6 border-b-4 border-emerald-700">
          <div class="flex items-center justify-between">
            <div>
              <h3 class="text-xl font-bold uppercase tracking-wide">Add New User</h3>
              <p class="text-emerald-100 text-sm mt-1">Create a new user account</p>
            </div>
            <button @click="closeCreateModal" class="text-white hover:text-emerald-200 focus:outline-none focus:ring-2 focus:ring-emerald-200 rounded p-2">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
          </div>
        </div>
        
        <div class="p-6 bg-slate-50">
          <form @submit.prevent="createUser" class="space-y-4">
            <div>
              <label class="block text-sm font-bold text-gray-800 uppercase tracking-wide mb-2">Name</label>
              <input 
                v-model="createForm.name" 
                type="text" 
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"
                :class="{ 'border-red-500': createForm.errors.name }"
                required
              >
              <p v-if="createForm.errors.name" class="mt-1 text-sm text-red-600">{{ createForm.errors.name }}</p>
            </div>
            
            <div>
              <label class="block text-sm font-bold text-gray-800 uppercase tracking-wide mb-2">Email</label>
              <input 
                v-model="createForm.email" 
                type="email" 
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"
                :class="{ 'border-red-500': createForm.errors.email }"
                required
              >
              <p v-if="createForm.errors.email" class="mt-1 text-sm text-red-600">{{ createForm.errors.email }}</p>
            </div>
            
            <div>
              <label class="block text-sm font-bold text-gray-800 uppercase tracking-wide mb-2">Password</label>
              <input 
                v-model="createForm.password" 
                type="password" 
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"
                :class="{ 'border-red-500': createForm.errors.password }"
                required
              >
              <p v-if="createForm.errors.password" class="mt-1 text-sm text-red-600">{{ createForm.errors.password }}</p>
            </div>
            
            <div>
              <label class="block text-sm font-bold text-gray-800 uppercase tracking-wide mb-2">Confirm Password</label>
              <input 
                v-model="createForm.password_confirmation" 
                type="password" 
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"
                required
              >
            </div>
            
            <div>
              <label class="block text-sm font-bold text-gray-800 uppercase tracking-wide mb-2">Phone</label>
              <input 
                v-model="createForm.phone" 
                type="text" 
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"
                :class="{ 'border-red-500': createForm.errors.phone }"
              >
              <p v-if="createForm.errors.phone" class="mt-1 text-sm text-red-600">{{ createForm.errors.phone }}</p>
            </div>
            
            <div>
              <label class="block text-sm font-bold text-gray-800 uppercase tracking-wide mb-2">Barangay</label>
              <select 
                v-model="createForm.barangay" 
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"
                :class="{ 'border-red-500': createForm.errors.barangay }"
              >
                <option value="">Select your Barangay</option>
                <option value="cawilan">Cawilan</option>
                <option value="del_rosario">Del Rosario</option>
                <option value="capayahan">Capayahan</option>
                <option value="marga">Marga</option>
                <option value="san_isidro">San Isidro</option>
                <option value="motorpol">Motorpol</option>
                <option value="san_pablo">San Pablo</option>
                <option value="timamana">Timamana</option>
              </select>
              <p v-if="createForm.errors.barangay" class="mt-1 text-sm text-red-600">{{ createForm.errors.barangay }}</p>
            </div>
            
            <div class="flex justify-end space-x-3 pt-4">
              <button 
                type="button" 
                @click="closeCreateModal" 
                class="px-6 py-2 text-sm font-medium text-slate-600 hover:text-slate-800 transition-colors duration-200"
              >
                Cancel
              </button>
              <button 
                type="submit" 
                :disabled="createForm.processing"
                class="px-6 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition-colors duration-200 disabled:opacity-50"
              >
                {{ createForm.processing ? 'Creating...' : 'Create User' }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Edit User Modal -->
    <div v-if="showEditModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
      <div class="bg-white shadow-2xl max-w-md w-full max-h-[95vh] overflow-y-auto border border-gray-300">
        <!-- Header -->
        <div class="bg-indigo-600 text-white p-6 border-b-4 border-indigo-700">
          <div class="flex items-center justify-between">
            <div>
              <h3 class="text-xl font-bold uppercase tracking-wide">Edit User</h3>
              <p class="text-indigo-100 text-sm mt-1">Update user information</p>
            </div>
            <button @click="closeEditModal" class="text-white hover:text-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-200 rounded p-2">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
          </div>
        </div>
        
        <div class="p-6 bg-slate-50">
          <form @submit.prevent="updateUser" class="space-y-4">
            <div>
              <label class="block text-sm font-bold text-gray-800 uppercase tracking-wide mb-2">Name</label>
              <input 
                v-model="editForm.name" 
                type="text" 
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                :class="{ 'border-red-500': editForm.errors.name }"
                required
              >
              <p v-if="editForm.errors.name" class="mt-1 text-sm text-red-600">{{ editForm.errors.name }}</p>
            </div>
            
            <div>
              <label class="block text-sm font-bold text-gray-800 uppercase tracking-wide mb-2">Email</label>
              <input 
                v-model="editForm.email" 
                type="email" 
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                :class="{ 'border-red-500': editForm.errors.email }"
                required
              >
              <p v-if="editForm.errors.email" class="mt-1 text-sm text-red-600">{{ editForm.errors.email }}</p>
            </div>
            
            <div>
              <label class="block text-sm font-bold text-gray-800 uppercase tracking-wide mb-2">Password</label>
              <input 
                v-model="editForm.password" 
                type="password" 
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                :class="{ 'border-red-500': editForm.errors.password }"
                placeholder="Leave blank to keep current password"
              >
              <p v-if="editForm.errors.password" class="mt-1 text-sm text-red-600">{{ editForm.errors.password }}</p>
            </div>
            
            <div>
              <label class="block text-sm font-bold text-gray-800 uppercase tracking-wide mb-2">Confirm Password</label>
              <input 
                v-model="editForm.password_confirmation" 
                type="password" 
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Leave blank to keep current password"
              >
            </div>
            
            <div>
              <label class="block text-sm font-bold text-gray-800 uppercase tracking-wide mb-2">Phone</label>
              <input 
                v-model="editForm.phone" 
                type="text" 
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                :class="{ 'border-red-500': editForm.errors.phone }"
              >
              <p v-if="editForm.errors.phone" class="mt-1 text-sm text-red-600">{{ editForm.errors.phone }}</p>
            </div>
            
            <div>
              <label class="block text-sm font-bold text-gray-800 uppercase tracking-wide mb-2">Barangay</label>
              <select 
                v-model="editForm.barangay" 
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                :class="{ 'border-red-500': editForm.errors.barangay }"
              >
                <option value="">Select your Barangay</option>
                <option value="cawilan">Cawilan</option>
                <option value="del_rosario">Del Rosario</option>
                <option value="capayahan">Capayahan</option>
                <option value="marga">Marga</option>
                <option value="san_isidro">San Isidro</option>
                <option value="motorpol">Motorpol</option>
                <option value="san_pablo">San Pablo</option>
                <option value="timamana">Timamana</option>
              </select>
              <p v-if="editForm.errors.barangay" class="mt-1 text-sm text-red-600">{{ editForm.errors.barangay }}</p>
            </div>
            
            <div class="flex justify-end space-x-3 pt-4">
              <button 
                type="button" 
                @click="closeEditModal" 
                class="px-6 py-2 text-sm font-medium text-slate-600 hover:text-slate-800 transition-colors duration-200"
              >
                Cancel
              </button>
              <button 
                type="submit" 
                :disabled="editForm.processing"
                class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors duration-200 disabled:opacity-50"
              >
                {{ editForm.processing ? 'Updating...' : 'Update User' }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div v-if="showDeleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
      <div class="bg-white shadow-2xl max-w-md w-full border border-gray-300">
        <!-- Header -->
        <div class="bg-red-600 text-white p-6 border-b-4 border-red-700">
          <div class="flex items-center justify-between">
            <div>
              <h3 class="text-xl font-bold uppercase tracking-wide">Delete User</h3>
              <p class="text-red-100 text-sm mt-1">Confirm user deletion</p>
            </div>
          </div>
        </div>
        
        <div class="p-8 bg-slate-50">
          <div class="text-center mb-6">
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-100 mb-4">
              <svg class="h-8 w-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
              </svg>
            </div>
            <p class="text-slate-600 mb-2">
              Are you sure you want to delete <strong class="text-slate-900">{{ userToDelete?.name }}</strong>?
            </p>
            <p class="text-sm text-slate-500">
              This action cannot be undone and will permanently remove the user account.
            </p>
          </div>
          
          <div class="flex justify-center space-x-3">
            <button 
              @click="closeDeleteModal" 
              class="px-6 py-2 text-sm font-medium text-slate-600 hover:text-slate-800 transition-colors duration-200"
            >
              Cancel
            </button>
            <button 
              @click="deleteUser" 
              :disabled="deleteForm.processing"
              class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors duration-200 disabled:opacity-50"
            >
              {{ deleteForm.processing ? 'Deleting...' : 'Delete User' }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import ActionButton from '@/Components/ActionButton.vue';
import { notifyMinimal } from '@/globalFunctions.js';

const props = defineProps({
  users: Object,
});

// Modal states
const showCreateModal = ref(false);
const showEditModal = ref(false);
const showDeleteModal = ref(false);
const userToDelete = ref(null);
const userToEdit = ref(null);

// Forms
const createForm = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  phone: '',
  barangay: '',
});

const editForm = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  phone: '',
  barangay: '',
});

const deleteForm = useForm({});

// Utility functions
const getInitials = (name) => {
  return name
    .split(' ')
    .map((n) => n[0])
    .join('')
    .toUpperCase();
};

const formatBarangay = (barangay) => {
  if (!barangay) return null;
  return barangay
    .split('_')
    .map(word => word.charAt(0).toUpperCase() + word.slice(1))
    .join(' ');
};

const formatRole = (role) => {
  if (!role) return 'User';
  return role.charAt(0).toUpperCase() + role.slice(1);
};

const getRoleClass = (role) => {
  const roleClasses = {
    admin: 'bg-red-100 text-red-800',
    moderator: 'bg-blue-100 text-blue-800',
    user: 'bg-green-100 text-green-800',
    staff: 'bg-purple-100 text-purple-800'
  };
  return roleClasses[role] || roleClasses.user;
};

const formatDate = (dateString) => {
  if (!dateString) return 'N/A';
  const date = new Date(dateString);
  return date.toLocaleDateString('en-US', {
    year: 'numeric',
    month: 'short',
    day: 'numeric'
  });
};

// Create Modal Functions
const openCreateModal = () => {
  createForm.reset();
  createForm.clearErrors();
  showCreateModal.value = true;
};

const closeCreateModal = () => {
  showCreateModal.value = false;
  createForm.reset();
  createForm.clearErrors();
};

const createUser = () => {
  createForm.post(route('admin.user.store'), {
    onSuccess: () => {
      closeCreateModal();
      notifyMinimal('User created successfully!', 'success');
    },
    onError: () => {
      notifyMinimal('Failed to create user. Please try again.', 'error');
    },
  });
};

// Edit Modal Functions
const openEditModal = (user) => {
  userToEdit.value = user;
  editForm.reset();
  editForm.clearErrors();
  
  // Populate form with user data
  editForm.name = user.name;
  editForm.email = user.email;
  editForm.phone = user.phone || '';
  editForm.barangay = user.barangay || '';
  editForm.password = '';
  editForm.password_confirmation = '';
  
  showEditModal.value = true;
};

const closeEditModal = () => {
  showEditModal.value = false;
  editForm.reset();
  editForm.clearErrors();
  userToEdit.value = null;
};

const updateUser = () => {
  editForm.put(route('admin.user.update', userToEdit.value.id), {
    onSuccess: () => {
      closeEditModal();
      notifyMinimal('User updated successfully!', 'success');
    },
    onError: () => {
      notifyMinimal('Failed to update user. Please try again.', 'error');
    },
  });
};

// Delete Modal Functions
const openDeleteModal = (user) => {
  userToDelete.value = user;
  showDeleteModal.value = true;
};

const closeDeleteModal = () => {
  showDeleteModal.value = false;
  userToDelete.value = null;
  deleteForm.clearErrors();
};

const deleteUser = () => {
  deleteForm.delete(route('admin.user.destroy', userToDelete.value.id), {
    onSuccess: () => {
      closeDeleteModal();
      notifyMinimal('User deleted successfully!', 'success');
    },
    onError: () => {
      notifyMinimal('Failed to delete user. Please try again.', 'error');
    },
  });
};
</script>