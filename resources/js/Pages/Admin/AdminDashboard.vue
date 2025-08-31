<template>
    <AdminLayout>
        <div
            class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-cyan-50 relative overflow-hidden"
        >
            <!-- Animated Background Elements -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div
                    class="absolute top-20 left-20 w-72 h-72 bg-gradient-to-r from-blue-400/20 to-purple-400/20 rounded-full mix-blend-multiply filter blur-xl animate-pulse"
                ></div>
                <div
                    class="absolute top-40 right-20 w-96 h-96 bg-gradient-to-r from-cyan-400/20 to-blue-400/20 rounded-full mix-blend-multiply filter blur-xl animate-pulse delay-1000"
                ></div>
                <div
                    class="absolute -bottom-20 left-40 w-80 h-80 bg-gradient-to-r from-purple-400/20 to-pink-400/20 rounded-full mix-blend-multiply filter blur-xl animate-pulse delay-2000"
                ></div>
            </div>

            <div class="relative z-10 py-8 px-4 sm:px-6 lg:px-8">
                <div class="max-w-7xl mx-auto">
                    <!-- Admin Status Banner -->
                    <div class="mb-6">
                        <div class="flex items-center justify-center">
                            <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white px-6 py-2 rounded-full flex items-center gap-2 shadow-lg">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                                </svg>
                                <span class="text-sm font-semibold">ADMINISTRATOR MODE</span>
                            </div>
                        </div>
                    </div>

                    <!-- Hero Header -->
                    <div class="text-center mb-12 p-8">
                        <!-- Government Logos Row -->
                        <div
                            class="flex items-center justify-center gap-4 sm:gap-8 md:gap-12 lg:gap-20 mb-8"
                        >
                            <!-- Tubod LGU Logo -->
                            <div
                                class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20 flex items-center justify-center overflow-hidden"
                            >
                                <img
                                    src="/logo.png"
                                    alt="Tubod LGU"
                                    class="w-full h-full object-contain"
                                />
                            </div>

                            <!-- DILG Logo -->
                            <div
                                class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20 flex items-center justify-center overflow-hidden"
                            >
                                <img
                                    src="/DILG.png"
                                    alt="DILG"
                                    class="w-full h-full object-contain"
                                />
                            </div>

                            <!-- BAGONG-PILIPINAS Logo -->
                            <div
                                class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20 flex items-center justify-center overflow-hidden"
                            >
                                <img
                                    src="/bbm.png"
                                    alt="BAGONG PILIPINAS"
                                    class="w-full h-full object-contain"
                                />
                            </div>

                            <!-- DSWD Logo -->
                            <div
                                class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20 flex items-center justify-center overflow-hidden"
                            >
                                <img
                                    src="/DSWD.png"
                                    alt="DSWD"
                                    class="w-full h-full object-contain"
                                />
                            </div>
                        </div>

                        <!-- Title with Admin Badge -->
                        <div class="relative inline-block mb-4">
                            <h1
                                class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-indigo-600 via-purple-600 to-cyan-600 bg-clip-text text-transparent"
                            >
                                Tubod Services Portal
                            </h1>
                            <!-- Admin Badge -->
                            <div class="absolute -top-3 -right-8 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-md transform rotate-12 shadow-lg">
                                ADMIN
                            </div>
                        </div>
                        
                        <p class="text-xl text-gray-600 max-w-2xl mx-auto mb-4">
                            Your gateway to municipal services and community
                            feedback
                        </p>

                        <!-- Admin User Info -->
                        <div class="flex items-center justify-center gap-2 text-gray-500">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                            <span class="text-sm">Logged in as Administrator</span>
                        </div>
                    </div>

                   
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
</script>