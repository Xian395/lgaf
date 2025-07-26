<!-- admin Manage feedback -->
<template>
    <AdminLayout>
        <div
            class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 py-8 px-4 sm:px-6 lg:px-8"
        >
            <!-- Combined Header, Stats, and Rating Distribution Card -->
            <div class="max-w-7xl mx-auto mb-8">
                <div class="bg-white shadow-xl border border-slate-200">
                    <!-- Header Section -->
                    <div class="p-8 border-b border-slate-300">
                        <div
                            class="flex flex-col sm:flex-row sm:items-center sm:justify-between"
                        >
                            <div>
                                <h1
                                    class="text-3xl font-bold text-slate-800 mb-2"
                                >
                                    Feedback Management
                                </h1>
                                <p class="text-slate-600">
                                    Monitor and analyze resident feedback and
                                    suggestions
                                </p>
                            </div>
                            <div class="mt-4 sm:mt-0 flex gap-3">
                                <button
                                    @click="exportFeedback"
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
                    </div>

                    <!-- Stats Section -->
                    <div class="p-8 border-b border-slate-200">
                        <div
                            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6"
                        >
                            <div
                                class="bg-slate-50 rounded-xl p-6 border border-slate-100"
                            >
                                <div class="flex items-center">
                                    <div class="p-3 bg-blue-100 rounded-lg">
                                        <svg
                                            class="w-6 h-6 text-blue-600"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
                                            />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p
                                            class="text-sm font-medium text-slate-600"
                                        >
                                            Total Feedback
                                        </p>
                                        <p
                                            class="text-2xl font-bold text-slate-900"
                                        >
                                            {{ stats.total_feedbacks }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-slate-50 rounded-xl p-6 border border-slate-100"
                            >
                                <div class="flex items-center">
                                    <div class="p-3 bg-yellow-100 rounded-lg">
                                        <svg
                                            class="w-6 h-6 text-yellow-600"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                                            />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p
                                            class="text-sm font-medium text-slate-600"
                                        >
                                            Average Rating
                                        </p>
                                        <p
                                            class="text-2xl font-bold text-slate-900"
                                        >
                                            {{ stats.average_rating }}/5
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-slate-50 rounded-xl p-6 border border-slate-100"
                            >
                                <div class="flex items-center">
                                    <div class="p-3 bg-green-100 rounded-lg">
                                        <svg
                                            class="w-6 h-6 text-green-600"
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
                                    <div class="ml-4">
                                        <p
                                            class="text-sm font-medium text-slate-600"
                                        >
                                            This Week
                                        </p>
                                        <p
                                            class="text-2xl font-bold text-slate-900"
                                        >
                                            {{ stats.recent_feedbacks }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-slate-50 rounded-xl p-6 border border-slate-100"
                            >
                                <div class="flex items-center">
                                    <div class="p-3 bg-purple-100 rounded-lg">
                                        <svg
                                            class="w-6 h-6 text-purple-600"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                                            />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p
                                            class="text-sm font-medium text-slate-600"
                                        >
                                            5-Star Ratings
                                        </p>
                                        <p
                                            class="text-2xl font-bold text-slate-900"
                                        >
                                            {{ stats.rating_distribution["5"] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Rating Distribution Chart -->
                        <div class="pt-8">
                            <h3
                                class="text-xl font-semibold text-slate-800 mb-6"
                            >
                                Rating Distribution
                            </h3>
                            <div class="space-y-4">
                                <div
                                    v-for="(
                                        count, rating
                                    ) in stats.rating_distribution"
                                    :key="rating"
                                    class="flex items-center"
                                >
                                    <div
                                        class="w-12 text-sm font-medium text-slate-600"
                                    >
                                        {{ rating }} ⭐
                                    </div>
                                    <div class="flex-1 mx-4">
                                        <div
                                            class="bg-slate-200 rounded-full h-3"
                                        >
                                            <div
                                                class="bg-gradient-to-r from-yellow-400 to-yellow-500 h-3 rounded-full transition-all duration-300"
                                                :style="{
                                                    width:
                                                        getRatingPercentage(
                                                            count
                                                        ) + '%',
                                                }"
                                            ></div>
                                        </div>
                                    </div>
                                    <div
                                        class="w-12 text-sm font-medium text-slate-800"
                                    >
                                        {{ count }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feedback List -->
                <div class="max-w-7xl mx-auto pt-6">
                    <div
                        class="bg-white shadow-xl border border-slate-200 overflow-hidden"
                    >
                        <div class="px-8 py-6 border-b border-slate-200">
                            <h3 class="text-xl font-semibold text-slate-800">
                                Feedback List
                            </h3>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-200">
                                <thead class="bg-slate-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                                        >
                                            Resident
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                                        >
                                            Details
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                                        >
                                            Rating
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                                        >
                                            Services Used
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                                        >
                                            Date
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                                        >
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white divide-y divide-slate-200"
                                >
                                    <tr
                                        v-for="feedback in feedbacks.data"
                                        :key="feedback.id"
                                        class="hover:bg-slate-50 transition-colors duration-150"
                                    >
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div
                                                    class="flex-shrink-0 h-10 w-10"
                                                >
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center"
                                                    >
                                                        <span
                                                            class="text-sm font-medium text-white"
                                                            >{{
                                                                getInitials(
                                                                    feedback.full_name
                                                                )
                                                            }}</span
                                                        >
                                                    </div>
                                                </div>
                                                <div class="ml-4">
                                                    <div
                                                        class="text-sm font-medium text-slate-900"
                                                    >
                                                        {{ feedback.full_name }}
                                                    </div>
                                                    <div
                                                        class="text-sm text-slate-500"
                                                    >
                                                        {{
                                                            feedback.user
                                                                ?.email || "N/A"
                                                        }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-slate-900">
                                                {{ feedback.age }} years,
                                                {{
                                                    capitalizeFirst(
                                                        feedback.gender
                                                    )
                                                }}
                                            </div>
                                            <div class="text-sm text-slate-500">
                                                {{ feedback.barangay }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div
                                                    class="flex text-yellow-400"
                                                >
                                                    <span
                                                        v-for="i in 5"
                                                        :key="i"
                                                        class="text-lg"
                                                    >
                                                        {{
                                                            i <= feedback.rating
                                                                ? "⭐"
                                                                : "☆"
                                                        }}
                                                    </span>
                                                </div>
                                                <span
                                                    class="ml-2 text-sm font-medium text-slate-700"
                                                    >{{
                                                        feedback.rating
                                                    }}/5</span
                                                >
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-wrap gap-1">
                                                <span
                                                    v-for="service in feedback.service_used"
                                                    :key="service"
                                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800"
                                                >
                                                    {{ service }}
                                                </span>
                                            </div>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-slate-500"
                                        >
                                            {{
                                                formatDate(feedback.created_at)
                                            }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                                        >
                                            <div
                                                class="flex items-center space-x-2"
                                            >
                                                <ActionButton
                                                    types="view"
                                                    size="md"
                                                    @click="
                                                        viewFeedback(feedback)
                                                    "
                                                >
                                                    View
                                                </ActionButton>
                                                <ActionButton
                                                    types="delete"
                                                    size="md"
                                                    @click="
                                                        deleteFeedback(feedback)
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

                        <!-- Pagination -->
                        <div
                            v-if="feedbacks.links.length > 3"
                            class="px-6 py-4 border-t border-slate-200"
                        >
                            <div class="flex items-center justify-between">
                                <div class="text-sm text-slate-700">
                                    Showing {{ feedbacks.from }} to
                                    {{ feedbacks.to }} of
                                    {{ feedbacks.total }} results
                                </div>
                                <div class="flex space-x-1">
                                    <button
                                        v-for="link in feedbacks.links"
                                        :key="link.label"
                                        @click="
                                            link.url && changePage(link.url)
                                        "
                                        :disabled="!link.url"
                                        :class="[
                                            'px-3 py-2 text-sm font-medium rounded-md transition-colors duration-200',
                                            link.active
                                                ? 'bg-blue-600 text-white'
                                                : link.url
                                                ? 'text-slate-700 hover:bg-slate-100'
                                                : 'text-slate-400 cursor-not-allowed',
                                        ]"
                                        v-html="link.label"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- View Feedback Modal -->
                <div
                    v-if="selectedFeedback"
                    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
                >
                    <div
                        class="bg-white shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto"
                    >
                        <div class="px-8 py-6 border-b border-slate-200">
                            <div class="flex items-center justify-between">
                                <h3
                                    class="text-xl font-semibold text-slate-800"
                                >
                                    Feedback Details
                                </h3>
                                <button
                                    @click="selectedFeedback = null"
                                    class="text-slate-400 hover:text-slate-600 transition-colors duration-200"
                                >
                                    <svg
                                        class="w-6 h-6"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="p-8 space-y-6">
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <label
                                        class="block text-sm font-medium text-slate-600 mb-1"
                                        >Full Name</label
                                    >
                                    <p class="text-slate-900">
                                        {{ selectedFeedback.full_name }}
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-slate-600 mb-1"
                                        >Age</label
                                    >
                                    <p class="text-slate-900">
                                        {{ selectedFeedback.age }} years
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-slate-600 mb-1"
                                        >Gender</label
                                    >
                                    <p class="text-slate-900">
                                        {{
                                            capitalizeFirst(
                                                selectedFeedback.gender
                                            )
                                        }}
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-slate-600 mb-1"
                                        >Barangay</label
                                    >
                                    <p class="text-slate-900">
                                        {{ selectedFeedback.barangay }}
                                    </p>
                                </div>
                            </div>

                            <div>
                                <label
                                    class="block text-sm font-medium text-slate-600 mb-2"
                                    >Rating</label
                                >
                                <div class="flex items-center">
                                    <div class="flex text-yellow-400 text-xl">
                                        <span v-for="i in 5" :key="i">
                                            {{
                                                i <= selectedFeedback.rating
                                                    ? "⭐"
                                                    : "☆"
                                            }}
                                        </span>
                                    </div>
                                    <span
                                        class="ml-3 text-lg font-medium text-slate-700"
                                        >{{ selectedFeedback.rating }}/5</span
                                    >
                                </div>
                            </div>

                            <div>
                                <label
                                    class="block text-sm font-medium text-slate-600 mb-2"
                                    >Services Used</label
                                >
                                <div class="flex flex-wrap gap-2">
                                    <span
                                        v-for="service in selectedFeedback.service_used"
                                        :key="service"
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800"
                                    >
                                        {{ service }}
                                    </span>
                                </div>
                            </div>

                            <div v-if="selectedFeedback.suggestions">
                                <label
                                    class="block text-sm font-medium text-slate-600 mb-2"
                                    >Suggestions</label
                                >
                                <div class="bg-slate-50 rounded-lg p-4">
                                    <p class="text-slate-900 leading-relaxed">
                                        {{ selectedFeedback.suggestions }}
                                    </p>
                                </div>
                            </div>

                            <div>
                                <label
                                    class="block text-sm font-medium text-slate-600 mb-1"
                                    >Submitted</label
                                >
                                <p class="text-slate-900">
                                    {{
                                        formatDate(selectedFeedback.created_at)
                                    }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import ActionButton from "@/Components/ActionButton.vue";

// Props
const props = defineProps({
    feedbacks: Object,
    stats: Object,
});

// Reactive data
const selectedFeedback = ref(null);

// Methods
const getInitials = (name) => {
    return name
        .split(" ")
        .map((n) => n[0])
        .join("")
        .toUpperCase();
};

const capitalizeFirst = (str) => {
    return str.charAt(0).toUpperCase() + str.slice(1);
};

const formatDate = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleDateString("en-US", {
        year: "numeric",
        month: "short",
        day: "numeric",
        hour: "2-digit",
        minute: "2-digit",
    });
};

const getRatingPercentage = (count) => {
    const total = props.stats.total_feedbacks;
    return total > 0 ? (count / total) * 100 : 0;
};

const viewFeedback = (feedback) => {
    selectedFeedback.value = feedback;
};

const deleteFeedback = (feedback) => {
    if (confirm("Are you sure you want to delete this feedback?")) {
        router.delete(route("admin.manage-feedback.destroy", feedback.id));
    }
};

const exportFeedback = () => {
    window.location.href = route("admin.manage-feedback.export");
};

const changePage = (url) => {
    router.get(url);
};
</script>
