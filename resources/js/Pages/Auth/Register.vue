<template>
    <Head title="Tubod Municipal Government - Citizen Registration" />

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
        <main class="relative z-10 flex-1 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl w-full space-y-8">
                <!-- Page Title -->
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Citizen Registration</h2>
                    <p class="text-gray-600">Create your account to access municipal services</p>
                </div>

                <!-- Registration Form Card -->
                <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-xl border border-white/30 p-8">
                    <!-- Registration Notice -->
                    <div class="mb-6 p-4 bg-blue-50 border-l-4 border-blue-400 rounded-r-lg">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-400 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13,9H11V7H13M13,17H11V11H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"/>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-blue-800">Citizen Account Registration</p>
                                <p class="text-xs text-blue-700 mt-1">Please provide accurate information for verification purposes.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Registration Form -->
                    <form @submit.prevent="submit" class="space-y-6">
                        <!-- Row 1: Full Name and Email -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Full Name Field -->
                            <div>
                                <InputLabel for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <template #default>
                                        Full Name <span class="text-red-500">*</span>
                                    </template>
                                </InputLabel>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"/>
                                        </svg>
                                    </div>
                                    <TextInput
                                        id="name"
                                        type="text"
                                        class="pl-10 w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300 bg-white text-gray-900 placeholder-gray-500"
                                        v-model="form.name"
                                        required
                                        autofocus
                                        autocomplete="name"
                                        placeholder="Enter your full name"
                                    />
                                </div>
                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>

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
                                        autocomplete="email"
                                        placeholder="Enter your email address"
                                    />
                                </div>
                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>
                        </div>

                        <!-- Row 2: Phone Number and Barangay -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Phone Number Field -->
                            <div>
                                <InputLabel for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <template #default>
                                        Phone Number <span class="text-red-500">*</span>
                                    </template>
                                </InputLabel>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z"/>
                                        </svg>
                                    </div>
                                    <TextInput
                                        id="phone"
                                        type="tel"
                                        class="pl-10 w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300 bg-white text-gray-900 placeholder-gray-500"
                                        v-model="form.phone"
                                        required
                                        autocomplete="tel"
                                        placeholder="Enter your phone number"
                                    />
                                </div>
                                <InputError class="mt-2" :message="form.errors.phone" />
                            </div>

                            <!-- Barangay Field -->
                            <div>
                                <InputLabel for="barangay" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <template #default>
                                        Barangay <span class="text-red-500">*</span>
                                    </template>
                                </InputLabel>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z"/>
                                        </svg>
                                    </div>
                                    <select
                                        id="barangay"
                                        v-model="form.barangay"
                                        required
                                        class="pl-10 w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300 bg-white text-gray-900"
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
                                </div>
                                <InputError class="mt-2" :message="form.errors.barangay" />
                            </div>
                        </div>

                        <!-- Row 3: Password and Confirm Password -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Password Field -->
                            <div>
                                <InputLabel for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <template #default>
                                        Password <span class="text-red-500">*</span>
                                    </template>
                                </InputLabel>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M18,8h-1V6c0-2.76-2.24-5-5-5S7,3.24,7,6v2H6c-1.1,0-2,0.9-2,2v10c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V10C20,8.9,19.1,8,18,8z M12,17c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S13.1,17,12,17z M15.1,8H8.9V6c0-1.71,1.39-3.1,3.1-3.1s3.1,1.39,3.1,3.1V8z"/>
                                        </svg>
                                    </div>
                                    <TextInput
                                        id="password"
                                        type="password"
                                        class="pl-10 w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300 bg-white text-gray-900 placeholder-gray-500"
                                        v-model="form.password"
                                        required
                                        autocomplete="new-password"
                                        placeholder="Create a strong password"
                                    />
                                </div>
                                <InputError class="mt-2" :message="form.errors.password" />
                            </div>

                            <!-- Confirm Password Field -->
                            <div>
                                <InputLabel for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <template #default>
                                        Confirm Password <span class="text-red-500">*</span>
                                    </template>
                                </InputLabel>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M18,8h-1V6c0-2.76-2.24-5-5-5S7,3.24,7,6v2H6c-1.1,0-2,0.9-2,2v10c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V10C20,8.9,19.1,8,18,8z M12,17c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S13.1,17,12,17z M15.1,8H8.9V6c0-1.71,1.39-3.1,3.1-3.1s3.1,1.39,3.1,3.1V8z"/>
                                        </svg>
                                    </div>
                                    <TextInput
                                        id="password_confirmation"
                                        type="password"
                                        class="pl-10 w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300 bg-white text-gray-900 placeholder-gray-500"
                                        v-model="form.password_confirmation"
                                        required
                                        autocomplete="new-password"
                                        placeholder="Confirm your password"
                                    />
                                </div>
                                <InputError class="mt-2" :message="form.errors.password_confirmation" />
                            </div>
                        </div>

                        <!-- Terms and Privacy Notice -->
                        <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                            <p class="text-sm text-gray-700 mb-2">
                                <strong>Data Privacy Notice:</strong>
                            </p>
                            <p class="text-xs text-gray-600 leading-relaxed">
                                By registering, you consent to the collection and processing of your personal data in accordance with the Data Privacy Act of 2012. Your information will be used solely for providing municipal services and will be kept confidential.
                            </p>
                        </div>

                        <!-- Submit Button and Login Link -->
                        <div class="flex flex-col space-y-4 pt-2">
                            <PrimaryButton
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                                class="w-full flex justify-center items-center py-3 px-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 hover:scale-[1.02] disabled:hover:scale-100"
                            >
                                <svg v-if="form.processing" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span>{{ form.processing ? 'Creating Account...' : 'Create Citizen Account' }}</span>
                                <svg v-if="!form.processing" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M15,12c2.21,0,4-1.79,4-4s-1.79-4-4-4s-4,1.79-4,4S12.79,12,15,12z M6,10V7H4v3H1v2h3v3h2v-3h3v-2H6z M15,14c-2.67,0-8,1.34-8,4v2h16v-2C23,15.34,17.67,14,15,14z"/>
                                </svg>
                            </PrimaryButton>

                            <!-- Divider -->
                            <div class="relative">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-300"></div>
                                </div>
                                <div class="relative flex justify-center text-sm">
                                    <span class="px-4 bg-white text-gray-500">Already have an account?</span>
                                </div>
                            </div>

                            <!-- Login Link -->
                            <Link
                                :href="route('login')"
                                class="w-full flex justify-center items-center py-3 px-4 border-2 border-gray-200 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 hover:border-blue-300 transition-all duration-200"
                            >
                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M10,17V14H3V10H10V7L15,12L10,17M10,2H19A2,2 0 0,1 21,4V20A2,2 0 0,1 19,22H10A2,2 0 0,1 8,20V18H10V20H19V4H10V6H8V4A2,2 0 0,1 10,2Z"/>
                                </svg>
                                Sign In to Existing Account
                            </Link>
                        </div>
                    </form>
                </div>

                <!-- Additional Information -->
                <div class="text-center space-y-4">
                    <div class="flex items-center justify-center space-x-6 text-sm text-gray-600">
                        <a href="#" class="hover:text-blue-600 transition-colors">Privacy Policy</a>
                        <span class="text-gray-300">|</span>
                        <a href="#" class="hover:text-blue-600 transition-colors">Terms of Service</a>
                        <span class="text-gray-300">|</span>
                        <a href="#" class="hover:text-blue-600 transition-colors">Contact Support</a>
                    </div>
                    <p class="text-xs text-gray-500">
                        Need assistance? Contact the Municipal IT Office during business hours.
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

const form = useForm({
    name: '',
    email: '',
    phone: '',
    barangay: '',
    password: '',
    password_confirmation: '',
    role: 'resident',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
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