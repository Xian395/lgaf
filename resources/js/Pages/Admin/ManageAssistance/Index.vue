<template>
    <AdminLayout>
        <div
            class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 py-8 px-4 sm:px-6 lg:px-8"
        >
            <!-- Header Section -->
            <div class="max-w-7xl mx-auto mb-8">
                <div class="bg-white shadow-xl p-8 border border-slate-200">
                    <div
                        class="flex flex-col sm:flex-row sm:items-center sm:justify-between"
                    >
                        <div>
                            <h1 class="text-3xl font-bold text-slate-800 mb-2">
                                Manage Assistance Requests
                            </h1>
                            <p class="text-slate-600">
                                Monitor and verify resident requests
                            </p>
                        </div>
                        <div class="mt-4 sm:mt-0 flex gap-3">
                            <button
                                @click="exportData"
                                class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition-colors duration-200"
                            >
                                <svg
                                    class="w-4 h-4 mr-2"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                    />
                                </svg>
                                Export Data
                            </button>
                        </div>
                    </div>
                    <div
                        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 pt-6"
                    >
                        <div
                            class="bg-white rounded-xl shadow-lg p-6 border border-slate-200"
                        >
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center"
                                    >
                                        <svg
                                            class="w-4 h-4 text-white"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                            />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p
                                        class="text-sm font-medium text-gray-500"
                                    >
                                        Total Requests
                                    </p>
                                    <p
                                        class="text-2xl font-semibold text-gray-900"
                                    >
                                        {{ assistanceRequests.length }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="bg-white rounded-xl shadow-lg p-6 border border-slate-200"
                        >
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center"
                                    >
                                        <svg
                                            class="w-4 h-4 text-white"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p
                                        class="text-sm font-medium text-gray-500"
                                    >
                                        Pending
                                    </p>
                                    <p
                                        class="text-2xl font-semibold text-gray-900"
                                    >
                                        {{ pendingCount }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="bg-white rounded-xl shadow-lg p-6 border border-slate-200"
                        >
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center"
                                    >
                                        <svg
                                            class="w-4 h-4 text-white"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p
                                        class="text-sm font-medium text-gray-500"
                                    >
                                        Verified
                                    </p>
                                    <p
                                        class="text-2xl font-semibold text-gray-900"
                                    >
                                        {{ verifiedCount }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="bg-white rounded-xl shadow-lg p-6 border border-slate-200"
                        >
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center"
                                    >
                                        <svg
                                            class="w-4 h-4 text-white"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p
                                        class="text-sm font-medium text-gray-500"
                                    >
                                        Rejected
                                    </p>
                                    <p
                                        class="text-2xl font-semibold text-gray-900"
                                    >
                                        {{ rejectedCount }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filters -->
            <div class="max-w-7xl mx-auto mb-6">
                <div class="bg-white shadow-lg p-6 border border-slate-200">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <label
                                class="block text-sm font-medium text-gray-700 mb-2"
                                >Search</label
                            >
                            <input
                                v-model="searchQuery"
                                type="text"
                                placeholder="Search by client name, beneficiary name..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            />
                        </div>
                        <div class="sm:w-48">
                            <label
                                class="block text-sm font-medium text-gray-700 mb-2"
                                >Status</label
                            >
                            <select
                                v-model="statusFilter"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            >
                                <option value="">All Status</option>
                                <option value="PENDING">Pending</option>
                                <option value="IN_PROGRESS">In Progress</option>
                                <option value="VERIFIED">Verified</option>
                                <option value="REJECTED">Rejected</option>
                            </select>
                        </div>
                    </div>

                    <!-- requests list -->
                    <div
                        class="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden mt-6"
                    >
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Client Information
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Beneficiary
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Problem
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Status
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Date Submitted
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white divide-y divide-gray-200"
                                >
                                    <tr
                                        v-for="request in filteredRequests"
                                        :key="request.id"
                                        class="hover:bg-gray-50"
                                    >
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div
                                                    class="flex-shrink-0 h-10 w-10"
                                                >
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-blue-500 flex items-center justify-center"
                                                    >
                                                        <span
                                                            class="text-white font-medium text-sm"
                                                        >
                                                            {{
                                                                request.client_name
                                                                    .charAt(0)
                                                                    .toUpperCase()
                                                            }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="ml-4">
                                                    <div
                                                        class="text-sm font-medium text-gray-900"
                                                    >
                                                        {{
                                                            request.client_name
                                                        }}
                                                    </div>
                                                    <div
                                                        class="text-sm text-gray-500"
                                                    >
                                                        {{ request.client_sex }}
                                                        •
                                                        {{
                                                            request.civil_status
                                                        }}
                                                    </div>
                                                    <div
                                                        class="text-sm text-gray-500"
                                                    >
                                                        {{
                                                            request.present_address
                                                        }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div
                                                class="text-sm font-medium text-gray-900"
                                            >
                                                {{ request.beneficiary_name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ request.beneficiary_sex }} •
                                                {{
                                                    formatDate(
                                                        request.beneficiary_dob
                                                    )
                                                }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{
                                                    request.beneficiary_birthplace
                                                }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div
                                                class="text-sm text-gray-900 max-w-xs truncate"
                                            >
                                                {{ request.problem_presented }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <select
                                                v-model="request.status"
                                                @change="updateStatus(request)"
                                                :disabled="
                                                    updatingStatus[request.id]
                                                "
                                                :class="[
                                                    'block w-full rounded-md text-sm focus:border-indigo-500 focus:ring-indigo-500 disabled:opacity-50 font-medium',
                                                    getStatusClass(
                                                        request.status ||
                                                            'PENDING'
                                                    ),
                                                ]"
                                            >
                                                <option value="PENDING">
                                                    Pending
                                                </option>
                                                <option value="IN_PROGRESS">
                                                    In Progress
                                                </option>
                                                <option value="VERIFIED">
                                                    Verified
                                                </option>
                                                <option value="REJECTED">
                                                    Rejected
                                                </option>
                                            </select>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                                        >
                                            {{ formatDate(request.created_at) }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium"
                                        >
                                            <div class="flex gap-2">
                                                <ActionButton
                                                    types="view"
                                                    size="md"
                                                    @click="
                                                        viewRequest(request)
                                                    "
                                                >
                                                    View
                                                </ActionButton>
                                                 <ActionButton
                                                    types="remove"
                                                    size="md"
                                                    @click="
                                                        printPdf(request)
                                                    "
                                                >
                                                    PDF
                                                </ActionButton>
                                                 <ActionButton
                                                    types="delete"
                                                    size="md"
                                                    @click="
                                                        deleteRequest(request)
                                                    "
                                                >
                                                    Delete
                                                </ActionButton>
                                               
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Empty State -->
                        <div
                            v-if="filteredRequests.length === 0"
                            class="text-center py-12"
                        >
                            <svg
                                class="mx-auto h-12 w-12 text-gray-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">
                                No assistance requests found
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">
                                No requests match your current filters.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- View Modal -->
<div
  v-if="showViewModal"
  class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
  role="dialog"
  aria-labelledby="modal-title"
  aria-modal="true"
>
  <div
    class="bg-white shadow-2xl max-w-7xl w-full mx-4 max-h-[95vh] overflow-y-auto border border-gray-300"
  >
    <!-- Header -->
    <div class="bg-blue-900 text-white p-6 border-b-4 border-yellow-400">
      <div class="flex justify-between items-center">
        <div>
          <h2 id="modal-title" class="text-2xl font-bold uppercase tracking-wide">
            Social Services Assistance Request
          </h2>
          <p class="text-blue-100 text-sm mt-1">Request Details and Client Information</p>
        </div>
        <button
          @click="closeViewModal"
          class="text-white hover:text-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 rounded p-2"
          aria-label="Close modal"
        >
          <svg
            class="w-7 h-7"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            aria-hidden="true"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="3"
              d="M6 18L18 6M6 6l12 12"
            />
          </svg>
        </button>
      </div>
    </div>

    <div class="p-8 bg-gray-50" v-if="selectedRequest">
        <div class="border-b border-gray-200 pb-2">
  <dt class="font-semibold text-gray-800 text-sm uppercase tracking-wide">Contact Phone:</dt>
  <dd class="text-gray-900 font-medium">{{ selectedRequest.phone || "Not Provided" }}</dd>
</div>
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
       
        <!-- Client Information -->
        <section class="bg-white border-2 border-blue-200 p-6" aria-labelledby="client-info">
          <div class="border-l-4 border-blue-600 pl-4 mb-6">
            <h3 id="client-info" class="text-xl font-bold text-blue-900 uppercase">
              Client Information
            </h3>
          </div>
          <dl class="space-y-4">
            <div class="border-b border-gray-200 pb-2">
              <dt class="font-semibold text-gray-800 text-sm uppercase tracking-wide">Full Name:</dt>
              <dd class="text-gray-900 font-medium text-lg">{{ selectedRequest.client_name }}</dd>
            </div>
            <div class="border-b border-gray-200 pb-2">
              <dt class="font-semibold text-gray-800 text-sm uppercase tracking-wide">Sex:</dt>
              <dd class="text-gray-900 font-medium">{{ selectedRequest.client_sex }}</dd>
            </div>
            <div class="border-b border-gray-200 pb-2">
              <dt class="font-semibold text-gray-800 text-sm uppercase tracking-wide">Date of Birth:</dt>
              <dd class="text-gray-900 font-medium">{{ formatDate(selectedRequest.client_dob) }}</dd>
            </div>
            <div class="border-b border-gray-200 pb-2">
              <dt class="font-semibold text-gray-800 text-sm uppercase tracking-wide">Civil Status:</dt>
              <dd class="text-gray-900 font-medium">{{ selectedRequest.civil_status }}</dd>
            </div>
            <div class="border-b border-gray-200 pb-2">
              <dt class="font-semibold text-gray-800 text-sm uppercase tracking-wide">Present Address:</dt>
              <dd class="text-gray-900 font-medium">{{ selectedRequest.present_address }}</dd>
            </div>
            <div class="border-b border-gray-200 pb-2">
              <dt class="font-semibold text-gray-800 text-sm uppercase tracking-wide">Nationality:</dt>
              <dd class="text-gray-900 font-medium">{{ selectedRequest.nationality }}</dd>
            </div>
            <div class="border-b border-gray-200 pb-2">
              <dt class="font-semibold text-gray-800 text-sm uppercase tracking-wide">Occupation:</dt>
              <dd class="text-gray-900 font-medium">{{ selectedRequest.occupation || "Not Specified" }}</dd>
            </div>
            <div class="border-b border-gray-200 pb-2">
              <dt class="font-semibold text-gray-800 text-sm uppercase tracking-wide">Monthly Income:</dt>
              <dd class="text-gray-900 font-medium">
                {{ selectedRequest.monthly_income ? `₱${selectedRequest.monthly_income}` : "Not Specified" }}
              </dd>
            </div>
            <div class="border-b border-gray-200 pb-2">
              <dt class="font-semibold text-gray-800 text-sm uppercase tracking-wide">Religion:</dt>
              <dd class="text-gray-900 font-medium">{{ selectedRequest.religion || "Not Specified" }}</dd>
            </div>
            <div class="pb-2">
              <dt class="font-semibold text-gray-800 text-sm uppercase tracking-wide">Relationship to Beneficiary:</dt>
              <dd class="text-gray-900 font-medium">{{ selectedRequest.relationship_to_beneficiary || "Not Specified" }}</dd>
            </div>
          </dl>
        </section>

        <!-- Beneficiary Information -->
        <section class="bg-white border-2 border-green-200 p-6" aria-labelledby="beneficiary-info">
          <div class="border-l-4 border-green-600 pl-4 mb-6">
            <h3 id="beneficiary-info" class="text-xl font-bold text-green-900 uppercase">
              Beneficiary Information
            </h3>
          </div>
          <dl class="space-y-4">
            <div class="border-b border-gray-200 pb-2">
              <dt class="font-semibold text-gray-800 text-sm uppercase tracking-wide">Full Name:</dt>
              <dd class="text-gray-900 font-medium text-lg">{{ selectedRequest.beneficiary_name }}</dd>
            </div>
            <div class="border-b border-gray-200 pb-2">
              <dt class="font-semibold text-gray-800 text-sm uppercase tracking-wide">Sex:</dt>
              <dd class="text-gray-900 font-medium">{{ selectedRequest.beneficiary_sex }}</dd>
            </div>
            <div class="border-b border-gray-200 pb-2">
              <dt class="font-semibold text-gray-800 text-sm uppercase tracking-wide">Date of Birth:</dt>
              <dd class="text-gray-900 font-medium">{{ formatDate(selectedRequest.beneficiary_dob) }}</dd>
            </div>
            <div class="pb-2">
              <dt class="font-semibold text-gray-800 text-sm uppercase tracking-wide">Place of Birth:</dt>
              <dd class="text-gray-900 font-medium">{{ selectedRequest.beneficiary_birthplace }}</dd>
            </div>
          </dl>
        </section>

        <!-- Problem Presented -->
        <section class="lg:col-span-2 bg-white border-2 border-red-200 p-6" aria-labelledby="problem-presented">
          <div class="border-l-4 border-red-600 pl-4 mb-6">
            <h3 id="problem-presented" class="text-xl font-bold text-red-900 uppercase">
              Problem Presented
            </h3>
          </div>
          <div class="bg-red-50 p-4 border border-red-200">
            <p class="text-gray-900 leading-relaxed font-medium">{{ selectedRequest.problem_presented }}</p>
          </div>
        </section>

        <!-- Social Worker Assistance -->
        <section
          v-if="selectedRequest.social_worker_assistance"
          class="lg:col-span-2 bg-white border-2 border-purple-200 p-6"
          aria-labelledby="social-worker-assistance"
        >
          <div class="border-l-4 border-purple-600 pl-4 mb-6">
            <h3 id="social-worker-assistance" class="text-xl font-bold text-purple-900 uppercase">
              Social Worker Assistance Provided
            </h3>
          </div>
          <div class="bg-purple-50 p-4 border border-purple-200">
            <p class="text-gray-900 leading-relaxed font-medium">{{ selectedRequest.social_worker_assistance }}</p>
          </div>
        </section>

        <!-- Categories -->
        <section class="bg-white border-2 border-orange-200 p-6" aria-labelledby="categories">
          <div class="border-l-4 border-orange-600 pl-4 mb-6">
            <h3 id="categories" class="text-xl font-bold text-orange-900 uppercase">
              Client Categories
            </h3>
          </div>
          <div class="grid grid-cols-1 gap-3">
            <div
              v-if="selectedRequest.is_child_in_need"
              class="flex items-center p-3 bg-blue-100 border-l-4 border-blue-600"
            >
              <span class="font-semibold text-blue-900 uppercase text-sm">Child in Need of Special Protection</span>
            </div>
            <div
              v-if="selectedRequest.is_youth_in_need"
              class="flex items-center p-3 bg-purple-100 border-l-4 border-purple-600"
            >
              <span class="font-semibold text-purple-900 uppercase text-sm">Youth in Need</span>
            </div>
            <div
              v-if="selectedRequest.is_woman_in_difficult_circumstances"
              class="flex items-center p-3 bg-pink-100 border-l-4 border-pink-600"
            >
              <span class="font-semibold text-pink-900 uppercase text-sm">Woman in Difficult Circumstances</span>
            </div>
            <div
              v-if="selectedRequest.is_pwd"
              class="flex items-center p-3 bg-indigo-100 border-l-4 border-indigo-600"
            >
              <span class="font-semibold text-indigo-900 uppercase text-sm">Person with Disability</span>
            </div>
            <div
              v-if="selectedRequest.is_senior"
              class="flex items-center p-3 bg-green-100 border-l-4 border-green-600"
            >
              <span class="font-semibold text-green-900 uppercase text-sm">Senior Citizen</span>
            </div>
            <div
              v-if="selectedRequest.needs_counseling"
              class="flex items-center p-3 bg-yellow-100 border-l-4 border-yellow-600"
            >
              <span class="font-semibold text-yellow-900 uppercase text-sm">Requires Counseling Services</span>
            </div>
            <div
              v-if="selectedRequest.needs_legal_assistance"
              class="flex items-center p-3 bg-red-100 border-l-4 border-red-600"
            >
              <span class="font-semibold text-red-900 uppercase text-sm">Requires Legal Assistance</span>
            </div>
          </div>
        </section>

        <!-- Financial Assistance -->
        <section class="bg-white border-2 border-emerald-200 p-6" aria-labelledby="financial-assistance">
          <div class="border-l-4 border-emerald-600 pl-4 mb-6">
            <h3 id="financial-assistance" class="text-xl font-bold text-emerald-900 uppercase">
              Financial Assistance
            </h3>
          </div>
          <div class="space-y-3">
            <div v-if="selectedRequest.financial_food_subsidy" class="flex items-center p-2 bg-emerald-50 border border-emerald-200">
              <span class="w-3 h-3 bg-emerald-600 rounded-full mr-3"></span>
              <span class="font-medium text-emerald-900 uppercase text-sm">Food Subsidy</span>
            </div>
            <div v-if="selectedRequest.financial_livelihood" class="flex items-center p-2 bg-emerald-50 border border-emerald-200">
              <span class="w-3 h-3 bg-emerald-600 rounded-full mr-3"></span>
              <span class="font-medium text-emerald-900 uppercase text-sm">Livelihood Assistance</span>
            </div>
            <div v-if="selectedRequest.financial_educational" class="flex items-center p-2 bg-emerald-50 border border-emerald-200">
              <span class="w-3 h-3 bg-emerald-600 rounded-full mr-3"></span>
              <span class="font-medium text-emerald-900 uppercase text-sm">Educational Assistance</span>
            </div>
            <div v-if="selectedRequest.financial_medical" class="flex items-center p-2 bg-emerald-50 border border-emerald-200">
              <span class="w-3 h-3 bg-emerald-600 rounded-full mr-3"></span>
              <span class="font-medium text-emerald-900 uppercase text-sm">Medical Assistance</span>
            </div>
            <div v-if="selectedRequest.financial_burial" class="flex items-center p-2 bg-emerald-50 border border-emerald-200">
              <span class="w-3 h-3 bg-emerald-600 rounded-full mr-3"></span>
              <span class="font-medium text-emerald-900 uppercase text-sm">Burial Assistance</span>
            </div>
            <div v-if="selectedRequest.financial_transportation" class="flex items-center p-2 bg-emerald-50 border border-emerald-200">
              <span class="w-3 h-3 bg-emerald-600 rounded-full mr-3"></span>
              <span class="font-medium text-emerald-900 uppercase text-sm">Transportation Assistance</span>
            </div>
            <div v-if="selectedRequest.financial_assistance_mode" class="p-3 bg-gray-100 border-l-4 border-gray-600">
              <span class="font-bold text-gray-800 text-sm uppercase">Mode of Assistance:</span>
              <span class="ml-2 font-medium text-gray-900">{{ selectedRequest.financial_assistance_mode }}</span>
            </div>
            <div v-if="selectedRequest.financial_assistance_source" class="p-3 bg-gray-100 border-l-4 border-gray-600">
              <span class="font-bold text-gray-800 text-sm uppercase">Source of Funds:</span>
              <span class="ml-2 font-medium text-gray-900">{{ selectedRequest.financial_assistance_source }}</span>
            </div>
          </div>
        </section>

        <!-- Material Assistance -->
        <section class="bg-white border-2 border-teal-200 p-6" aria-labelledby="material-assistance">
          <div class="border-l-4 border-teal-600 pl-4 mb-6">
            <h3 id="material-assistance" class="text-xl font-bold text-teal-900 uppercase">
              Material Assistance
            </h3>
          </div>
          <div class="space-y-3">
            <div v-if="selectedRequest.material_food_packs" class="flex items-center p-2 bg-teal-50 border border-teal-200">
              <span class="w-3 h-3 bg-teal-600 rounded-full mr-3"></span>
              <span class="font-medium text-teal-900 uppercase text-sm">Food Packs</span>
            </div>
            <div v-if="selectedRequest.material_used_clothing" class="flex items-center p-2 bg-teal-50 border border-teal-200">
              <span class="w-3 h-3 bg-teal-600 rounded-full mr-3"></span>
              <span class="font-medium text-teal-900 uppercase text-sm">Used Clothing</span>
            </div>
            <div v-if="selectedRequest.material_assistive_device" class="flex items-center p-2 bg-teal-50 border border-teal-200">
              <span class="w-3 h-3 bg-teal-600 rounded-full mr-3"></span>
              <span class="font-medium text-teal-900 uppercase text-sm">Assistive Device</span>
            </div>
            <div v-if="selectedRequest.material_others" class="p-3 bg-gray-100 border-l-4 border-gray-600">
              <span class="font-bold text-gray-800 text-sm uppercase">Other Materials:</span>
              <span class="ml-2 font-medium text-gray-900">{{ selectedRequest.material_others }}</span>
            </div>
          </div>
        </section>

        <!-- Status and Dates -->
        <section class="lg:col-span-2 bg-white border-2 border-gray-300 p-6" aria-labelledby="status-info">
          <div class="border-l-4 border-gray-600 pl-4 mb-6">
            <h3 id="status-info" class="text-xl font-bold text-gray-900 uppercase">
              Request Status & Timeline
            </h3>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="text-center p-4 bg-gray-50 border border-gray-300">
              <dt class="font-bold text-gray-800 text-sm uppercase tracking-wide mb-2">Current Status</dt>
              <dd>
                <span
                  :class="getStatusClass(selectedRequest.status)"
                  class="inline-flex px-4 py-2 text-sm font-bold rounded uppercase tracking-wide"
                >
                  {{ selectedRequest.status || "PENDING" }}
                </span>
              </dd>
            </div>
            <div class="text-center p-4 bg-gray-50 border border-gray-300">
              <dt class="font-bold text-gray-800 text-sm uppercase tracking-wide mb-2">Date Submitted</dt>
              <dd class="text-gray-900 font-medium">{{ formatDate(selectedRequest.created_at) }}</dd>
            </div>
            <div class="text-center p-4 bg-gray-50 border border-gray-300">
              <dt class="font-bold text-gray-800 text-sm uppercase tracking-wide mb-2">Last Updated</dt>
              <dd class="text-gray-900 font-medium">{{ formatDate(selectedRequest.updated_at) }}</dd>
            </div>
          </div>
        </section>
      </div>
    </div>

    <!-- Footer -->
    <div class="bg-gray-200 border-t-2 border-gray-300 p-4">
      <div class="text-center">
        <p class="text-gray-700 text-sm font-medium uppercase tracking-wide">
          Department of Social Welfare and Development - Social Services
        </p>
        <p class="text-gray-600 text-xs mt-1">
          This document contains confidential information and is for authorized personnel only.
        </p>
      </div>
    </div>
  </div>
</div>
    </AdminLayout>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";
import { router } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { notifyMinimal } from "@/globalFunctions.js";
import ActionButton from "@/Components/ActionButton.vue";

const props = defineProps({
    assistanceRequests: {
        type: Array,
        default: () => [],
    },
    success: String,
    error: String,
});

const searchQuery = ref("");
const statusFilter = ref("");
const showViewModal = ref(false);
const showEditModal = ref(false);
const selectedRequest = ref(null);
const updatingStatus = ref({});
const editForm = ref({
    id: null,
    client_name: "",
    status: "",
    social_worker_assistance: "",
    problem_presented: "",
});

const filteredRequests = computed(() => {
    let filtered = props.assistanceRequests;

    if (searchQuery.value) {
        const query = searchQuery.value.toLowerCase();
        filtered = filtered.filter(
            (request) =>
                request.client_name.toLowerCase().includes(query) ||
                request.beneficiary_name.toLowerCase().includes(query) ||
                request.problem_presented.toLowerCase().includes(query)
        );
    }

    if (statusFilter.value) {
        filtered = filtered.filter(
            (request) => (request.status || "PENDING") === statusFilter.value
        );
    }

    return filtered;
});

const pendingCount = computed(
    () =>
        props.assistanceRequests.filter(
            (req) => !req.status || req.status === "PENDING"
        ).length
);

const verifiedCount = computed(
    () =>
        props.assistanceRequests.filter((req) => req.status === "VERIFIED")
            .length
);

const rejectedCount = computed(
    () =>
        props.assistanceRequests.filter((req) => req.status === "REJECTED")
            .length
);

const formatDate = (dateString) => {
    if (!dateString) return "N/A";
    return new Date(dateString).toLocaleDateString("en-US", {
        year: "numeric",
        month: "short",
        day: "numeric",
    });
};

const getStatusClass = (status) => {
    const statusClasses = {
        PENDING: "border-yellow-300 bg-yellow-50 text-yellow-800",
        IN_PROGRESS: "border-blue-300 bg-blue-50 text-blue-800",
        VERIFIED: "border-green-300 bg-green-50 text-green-800",
        REJECTED: "border-red-300 bg-red-50 text-red-800",
    };
    return statusClasses[status] || statusClasses["PENDING"];
};

const viewRequest = (request) => {
    selectedRequest.value = request;
    showViewModal.value = true;
};

const closeViewModal = () => {
    showViewModal.value = false;
    selectedRequest.value = null;
};

const printPdf = (request) => {
    window.open(`/admin/assistance/${request.id}/pdf`, "_blank");
};

const updateStatus = (request) => {
    updatingStatus.value[request.id] = true;

    router.put(
        `/admin/assistance/${request.id}`,
        {
            status: request.status,
        },
        {
            onSuccess: () => {
                notifyMinimal(
                    `Status updated to ${request.status}!`,
                    "success"
                );
            },
            onError: () => {
                notifyMinimal(
                    "Failed to update status. Please try again.",
                    "error"
                );
            },
            onFinish: () => {
                updatingStatus.value[request.id] = false;
            },
            preserveState: true,
            preserveScroll: true,
        }
    );
};

const deleteRequest = (request) => {
    if (confirm("Are you sure you want to delete this assistance request?")) {
        router.delete(`/admin/assistance/${request.id}`, {
            onSuccess: () => {
                notifyMinimal(
                    "Assistance request deleted successfully!",
                    "success"
                );
            },
            onError: () => {
                notifyMinimal(
                    "Failed to delete assistance request. Please try again.",
                    "error"
                );
            },
            preserveState: true,
            preserveScroll: true,
        });
    }
};

const exportData = () => {
    window.open("/admin/assistance/export", "_blank");
    notifyMinimal("Export started successfully!", "success");
};

onMounted(() => {
    if (props.success && props.success.trim() !== "") {
        notifyMinimal(props.success, "success");
    }
    if (props.error && props.error.trim() !== "") {
        notifyMinimal(props.error, "error");
    }
});
</script>
