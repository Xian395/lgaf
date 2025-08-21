<template>
    <Head title="Tubod Municipal Government - Password Reset" />

    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-50">
        <!-- Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-20 w-72 h-72 bg-gradient-to-r from-blue-400/10 to-indigo-400/10 rounded-full filter blur-xl animate-pulse"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-gradient-to-r from-indigo-400/10 to-blue-400/10 rounded-full filter blur-xl animate-pulse delay-1000"></div>
        </div>

        <!-- Header -->
        <header class="relative z-10 bg-white/80 backdrop-blur-md border-b border-gray-200/50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex items-center justify-between">
                    <!-- Government Logos -->
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-3">
                            <img src="/logo.png" alt="Philippine National Seal" class="h-12 w-12 object-contain">
                            <img src="/DILG.png" alt="DILG Logo" class="h-12 w-12 object-contain">
                            <img src="/SEAL.png" alt="Tubod Municipal Seal" class="h-12 w-12 object-contain">
                        </div>
                        <div class="hidden sm:block border-l border-gray-300 pl-4 ml-4">
                            <h1 class="text-lg font-semibold text-gray-900">Municipality of Tubod</h1>
                            <p class="text-sm text-gray-600">Surigao del Norte, Philippines</p>
                        </div>
                    </div>
                    
                    <!-- Help Link -->
                    <div class="flex items-center space-x-4">
                        <a href="#" class="text-sm text-blue-600 hover:text-blue-800 font-medium transition-colors">Help</a>
                        <div class="h-6 border-l border-gray-300"></div>
                        <span class="text-sm text-gray-500">English</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="relative z-10 flex-1 flex items-center justify-center pt-16 pb-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-8">
                <!-- Page Title -->
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Reset Password</h2>
                    <p class="text-gray-600">Recover access to your account</p>
                </div>

                <!-- Reset Password Form Card -->
                <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-xl border border-white/30 p-8">
                    <!-- Information Notice -->
                    <div class="mb-6 p-4 bg-blue-50 border-l-4 border-blue-400 rounded-r-lg">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-400 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13,9H11V7H13M13,17H11V11H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"/>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-blue-800">Password Recovery</p>
                                <p class="text-xs text-blue-700 mt-1">Enter your registered email address to receive reset instructions.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Explanation Text -->
                    <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                        <p class="text-sm text-gray-700 leading-relaxed">
                            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                        </p>
                    </div>

                    <!-- Status Message -->
                    <div v-if="status" class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                            <span class="text-sm font-medium text-green-800">{{ status }}</span>
                        </div>
                    </div>

                    <!-- Reset Form -->
                    <form @submit.prevent="submit" class="space-y-6">
                        <!-- Email Field -->
                        <div>
                            <InputLabel for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                <template #default>
                                    Email Address <span class="text-red-500">*</span>
                                </template>
                            </InputLabel>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
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
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <PrimaryButton
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                                class="w-full flex justify-center items-center py-3 px-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 hover:scale-[1.02] disabled:hover:scale-100"
                            >
                                <svg v-if="form.processing" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <svg v-if="!form.processing" class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z"/>
                                </svg>
                                <span>{{ form.processing ? 'Sending Reset Link...' : 'Email Password Reset Link' }}</span>
                            </PrimaryButton>
                        </div>
                    </form>

                    <!-- Divider -->
                    <div class="mt-8">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white text-gray-500">Remember your password?</span>
                            </div>
                        </div>
                    </div>

                    <!-- Back to Login Link -->
                    <div class="mt-6">
                        <Link 
                            :href="route('login')"
                            class="w-full flex justify-center items-center py-3 px-4 border-2 border-gray-200 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 hover:border-blue-300 transition-all duration-200"
                        >
                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"/>
                            </svg>
                            Back to Sign In
                        </Link>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="text-center space-y-4">
                    <div class="flex items-center justify-center space-x-6 text-sm text-gray-600">
                        <a href="#" class="hover:text-blue-600 transition-colors">Privacy Policy</a>
                        <span class="text-gray-300">|</span>
                        <a href="#" class="hover:text-blue-600 transition-colors">Contact Support</a>
                        <span class="text-gray-300">|</span>
                        <a href="#" class="hover:text-blue-600 transition-colors">Help Center</a>
                    </div>
                    <p class="text-xs text-gray-500">
                        If you don't receive the email within a few minutes, please check your spam folder.
                    </p>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="relative z-10 bg-white/80 backdrop-blur-md border-t border-gray-200/50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <div class="flex items-center space-x-4 text-sm text-gray-600">
                        <span>© 2025 Municipality of Tubod</span>
                        <span class="text-gray-300">|</span>
                        <span>Republic of the Philippines</span>
                    </div>
                    <div class="flex items-center space-x-6">
                        <div class="flex items-center space-x-2 text-xs text-gray-500">
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z"/>
                            </svg>
                            <span>Secure Connection</span>
                        </div>
                        <div class="text-xs text-gray-500">
                            Version 2.1.0
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<style scoped>
/* Custom animations for government feel */
@keyframes pulse {
    0%, 100% { opacity: 0.1; }
    50% { opacity: 0.3; }
}

.animate-pulse {
    animation: pulse 4s ease-in-out infinite;
}

.delay-1000 {
    animation-delay: 1s;
}
</style>