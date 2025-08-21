<template>
    <Head title="Tubod Municipal Government - Login Portal" />

    <div
        class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-50"
    >
        <!-- Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div
                class="absolute top-20 left-20 w-72 h-72 bg-gradient-to-r from-blue-400/10 to-indigo-400/10 rounded-full filter blur-xl animate-pulse"
            ></div>
            <div
                class="absolute bottom-20 right-20 w-96 h-96 bg-gradient-to-r from-indigo-400/10 to-blue-400/10 rounded-full filter blur-xl animate-pulse delay-1000"
            ></div>
        </div>

        <!-- Header -->
        <header
            class="relative z-10 bg-white/80 backdrop-blur-md border-b border-gray-200/50"
        >
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex items-center justify-between">
                    <!-- Government Logos -->
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-3">
                            <img
                                src="/logo.png"
                                alt="Philippine National Seal"
                                class="h-12 w-12 object-contain"
                            />
                            <img
                                src="/DILG.png"
                                alt="DILG Logo"
                                class="h-12 w-12 object-contain"
                            />
                            <img
                                src="/SEAL.png"
                                alt="Tubod Municipal Seal"
                                class="h-12 w-12 object-contain"
                            />
                        </div>
                        <div
                            class="hidden sm:block border-l border-gray-300 pl-4 ml-4"
                        >
                            <h1 class="text-lg font-semibold text-gray-900">
                                Municipality of Tubod
                            </h1>
                            <p class="text-sm text-gray-600">
                                Surigao del Norte, Philippines
                            </p>
                        </div>
                    </div>

                    <!-- Help Link -->
                    <div class="flex items-center space-x-4">
                        <a
                            href="#"
                            class="text-sm text-blue-600 hover:text-blue-800 font-medium transition-colors"
                            >Help</a
                        >
                        <div class="h-6 border-l border-gray-300"></div>
                        <span class="text-sm text-gray-500">English</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main
            class="relative z-10 flex-1 flex items-center justify-center pt-8 pb-12 px-4 sm:px-6 lg:px-8"
        >
            <div class="max-w-md w-full space-y-8">
                <!-- Page Title -->
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">
                        Citizen Services Portal
                    </h2>
                    <p class="text-gray-600">
                        Secure access to government services
                    </p>
                </div>

                <!-- Login Form Card -->
                <div
                    class="bg-white/90 backdrop-blur-md rounded-2xl shadow-xl border border-white/30 p-8"
                >
                    <!-- Security Notice -->
                    <!-- <div class="mb-6 p-4 bg-blue-50 border-l-4 border-blue-400 rounded-r-lg">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-400 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,7C13.11,7 14,7.89 14,9C14,10.11 13.11,11 12,11C10.89,11 10,10.11 10,9C10,7.89 10.89,7 12,7M12,14C13.66,14 15,14.67 15,15.5V17H9V15.5C9,14.67 10.34,14 12,14Z"/>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-blue-800">Official Government Portal</p>
                                <p class="text-xs text-blue-700 mt-1">Your information is protected and secure.</p>
                            </div>
                        </div>
                    </div> -->

                    <!-- Status Message -->
                    <div
                        v-if="status"
                        class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg"
                    >
                        <div class="flex items-center">
                            <svg
                                class="w-5 h-5 text-green-400 mr-3"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"
                                />
                            </svg>
                            <span class="text-sm font-medium text-green-800">{{
                                status
                            }}</span>
                        </div>
                    </div>

                    <!-- Login Form -->
                    <form @submit.prevent="submit" class="space-y-6">
                        <!-- Email Field -->
                        <div>
                            <InputLabel
                                for="email"
                                value="Email Address"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                <template #default>
                                    Email Address
                                    <span class="text-red-500">*</span>
                                </template>
                            </InputLabel>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                                >
                                    <svg
                                        class="h-5 w-5 text-gray-400"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"
                                        />
                                    </svg>
                                </div>
                                <TextInput
                                    id="email"
                                    type="email"
                                    class="pl-10 w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300 bg-white text-gray-900 placeholder-gray-500"
                                    v-model="form.email"
                                    required
                                    autofocus
                                    autocomplete="username"
                                    placeholder="Enter your registered email address"
                                />
                            </div>
                            <InputError
                                class="mt-2"
                                :message="form.errors.email"
                            />
                        </div>

                        <!-- Password Field -->
                        <div>
                            <InputLabel
                                for="password"
                                value="Password"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                <template #default>
                                    Password <span class="text-red-500">*</span>
                                </template>
                            </InputLabel>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                                >
                                    <svg
                                        class="h-5 w-5 text-gray-400"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M18,8h-1V6c0-2.76-2.24-5-5-5S7,3.24,7,6v2H6c-1.1,0-2,0.9-2,2v10c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V10C20,8.9,19.1,8,18,8z M12,17c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S13.1,17,12,17z M15.1,8H8.9V6c0-1.71,1.39-3.1,3.1-3.1s3.1,1.39,3.1,3.1V8z"
                                        />
                                    </svg>
                                </div>
                                <TextInput
                                    id="password"
                                    type="password"
                                    class="pl-10 w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300 bg-white text-gray-900 placeholder-gray-500"
                                    v-model="form.password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="Enter your password"
                                />
                            </div>
                            <InputError
                                class="mt-2"
                                :message="form.errors.password"
                            />
                        </div>

                        <!-- Remember Me and Forgot Password -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <Checkbox
                                    name="remember"
                                    v-model:checked="form.remember"
                                    class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                />
                                <label
                                    for="remember"
                                    class="ml-2 block text-sm text-gray-700"
                                >
                                    Keep me signed in
                                </label>
                            </div>

                            <div class="text-sm">
                                <Link
                                    v-if="canResetPassword"
                                    :href="route('password.request')"
                                    class="font-medium text-blue-600 hover:text-blue-500 transition-colors"
                                >
                                    Forgot your password?
                                </Link>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <PrimaryButton
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                                class="w-full flex justify-center items-center py-3 px-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 hover:scale-[1.02] disabled:hover:scale-100"
                            >
                                <svg
                                    v-if="form.processing"
                                    class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <circle
                                        class="opacity-25"
                                        cx="12"
                                        cy="12"
                                        r="10"
                                        stroke="currentColor"
                                        stroke-width="4"
                                    ></circle>
                                    <path
                                        class="opacity-75"
                                        fill="currentColor"
                                        d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                    ></path>
                                </svg>
                                <span>{{
                                    form.processing
                                        ? "Signing In..."
                                        : "Sign In to Portal"
                                }}</span>
                                <svg
                                    v-if="!form.processing"
                                    class="ml-2 -mr-1 w-4 h-4"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"
                                    />
                                </svg>
                            </PrimaryButton>
                        </div>
                    </form>

                    <!-- Divider -->
                    <div class="mt-8">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div
                                    class="w-full border-t border-gray-300"
                                ></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white text-gray-500"
                                    >New to the portal?</span
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Register Link -->
                    <div class="mt-6">
                        <Link
                            :href="route('register')"
                            class="w-full flex justify-center items-center py-3 px-4 border-2 border-gray-200 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 hover:border-blue-300 transition-all duration-200"
                        >
                            <svg
                                class="w-4 h-4 mr-2 text-gray-500"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M15,12c2.21,0,4-1.79,4-4s-1.79-4-4-4s-4,1.79-4,4S12.79,12,15,12z M6,10V7H4v3H1v2h3v3h2v-3h3v-2H6z M15,14c-2.67,0-8,1.34-8,4v2h16v-2C23,15.34,17.67,14,15,14z"
                                />
                            </svg>
                            Register for Citizen Account
                        </Link>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="text-center space-y-4">
                    <div
                        class="flex items-center justify-center space-x-6 text-sm text-gray-600"
                    >
                        <a
                            href="#"
                            class="hover:text-blue-600 transition-colors"
                            >Privacy Policy</a
                        >
                        <span class="text-gray-300">|</span>
                        <a
                            href="#"
                            class="hover:text-blue-600 transition-colors"
                            >Terms of Service</a
                        >
                        <span class="text-gray-300">|</span>
                        <a
                            href="#"
                            class="hover:text-blue-600 transition-colors"
                            >Contact Support</a
                        >
                    </div>
                    <p class="text-xs text-gray-500">
                        This system is for authorized users only. All activities
                        are monitored and recorded.
                    </p>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer
            class="relative z-10 bg-white/80 backdrop-blur-md border-t border-gray-200/50"
        >
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
                <div
                    class="flex flex-col space-y-3 sm:space-y-4 md:space-y-0 md:flex-row md:justify-between md:items-center"
                >
                    <div
                        class="flex flex-col sm:flex-row sm:items-center space-y-1 sm:space-y-0 sm:space-x-4 text-sm text-gray-600"
                    >
                        <span class="text-center sm:text-left"
                            >© 2025 Municipality of Tubod</span
                        >
                        <span class="text-gray-300 hidden sm:inline">|</span>
                        <span class="text-center sm:text-left"
                            >Republic of the Philippines</span
                        >
                    </div>
                    <div
                        class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-6"
                    >
                        <div
                            class="flex items-center space-x-2 text-xs text-gray-500"
                        >
                            <svg
                                class="w-4 h-4 text-green-500"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z"
                                />
                            </svg>
                            <span>Secure Connection</span>
                        </div>
                        <div class="text-xs text-gray-500">Version 2.1.0</div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<style scoped>
/* Custom animations for government feel */
@keyframes pulse {
    0%,
    100% {
        opacity: 0.1;
    }
    50% {
        opacity: 0.3;
    }
}

.animate-pulse {
    animation: pulse 4s ease-in-out infinite;
}

.delay-1000 {
    animation-delay: 1s;
}
</style>
