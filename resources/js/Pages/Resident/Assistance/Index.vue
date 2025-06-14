<template>
  <ResidentLayout>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 py-8 px-4 sm:px-6 lg:px-8">
      <!-- Floating particles background -->
      <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-blue-300 rounded-full opacity-20 animate-pulse"></div>
        <div class="absolute top-1/3 right-1/3 w-3 h-3 bg-indigo-300 rounded-full opacity-30 animate-bounce"></div>
        <div class="absolute bottom-1/4 left-1/3 w-1 h-1 bg-purple-300 rounded-full opacity-40 animate-ping"></div>
      </div>

      <div class="relative max-w-4xl mx-auto">
        <!-- Progress indicator -->
        <div class="mb-8">
          <div class="flex items-center justify-center mb-4">
            <div class="flex space-x-2">
              <div 
                v-for="step in 9" 
                :key="step"
                class="w-3 h-3 rounded-full transition-all duration-300"
                :class="getStepProgress(step - 1) ? 'bg-indigo-500 scale-110' : 'bg-gray-300'"
              ></div>
            </div>
          </div>
          <div class="text-center text-sm text-gray-600">
            {{ getProgressText() }}
          </div>
        </div>

        <!-- Main form card -->
        <div class="bg-white/80 backdrop-blur-sm shadow-2xl rounded-3xl border border-white/20 overflow-hidden transition-all duration-500 hover:shadow-3xl">
          <!-- Header section with gradient -->
          <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-blue-600 p-8 text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-black/10"></div>
            <div class="relative z-10">
              <div class="flex items-center justify-center mb-4">
                <div class="p-3 bg-white/20 rounded-full backdrop-blur-sm">
                  <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                  </svg>
                </div>
              </div>
              <h1 class="text-4xl font-bold text-center mb-4 tracking-tight">
                Request Assistance
              </h1>
              <p class="text-xl text-center text-white/90 leading-relaxed max-w-2xl mx-auto">
                Please provide the necessary details to request assistance. Your information will help us process your request efficiently.
              </p>
            </div>
          </div>

          <!-- Form content -->
          <div class="p-8 lg:p-12">
            <form @submit.prevent="submit" class="space-y-10">
              <!-- Client Information -->
              <div class="group">
                <button
                  type="button"
                  @click="toggleSection('client')"
                  class="flex items-center w-full text-left text-xl font-semibold text-gray-800 mb-6"
                >
                  <svg
                    :class="sections.client ? 'rotate-90' : ''"
                    class="w-5 h-5 mr-2 text-indigo-500 transition-transform duration-300"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path d="M8 5v14l11-7z"/>
                  </svg>
                  CLIENT INFORMATION
                </button>
                <div v-if="sections.client" class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div>
                    <InputLabel for="client_name" value="Client Name" class="text-gray-700 font-medium" />
                    <TextInput
                      id="client_name"
                      v-model="form.client_name"
                      class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                      required
                      autofocus
                    />
                    <InputError class="mt-2" :message="form.errors.client_name" />
                  </div>
                  <div>
                    <InputLabel for="client_sex" value="Sex" class="text-gray-700 font-medium" />
                    <select
                      id="client_sex"
                      v-model="form.client_sex"
                      class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                      required
                    >
                      <option value="">Select Sex</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Other">Other</option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.client_sex" />
                  </div>
                  <div>
                    <InputLabel for="client_dob" value="Date of Birth" class="text-gray-700 font-medium" />
                    <TextInput
                      id="client_dob"
                      type="date"
                      v-model="form.client_dob"
                      class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                      required
                    />
                    <InputError class="mt-2" :message="form.errors.client_dob" />
                  </div>
                  <div>
                    <InputLabel for="present_address" value="Present Address" class="text-gray-700 font-medium" />
                    <TextInput
                      id="present_address"
                      v-model="form.present_address"
                      class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                      required
                    />
                    <InputError class="mt-2" :message="form.errors.present_address" />
                  </div>
                  <div>
                    <InputLabel for="relationship_to_beneficiary" value="Relationship to Beneficiary" class="text-gray-700 font-medium" />
                    <TextInput
                      id="relationship_to_beneficiary"
                      v-model="form.relationship_to_beneficiary"
                      class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                    />
                    <InputError class="mt-2" :message="form.errors.relationship_to_beneficiary" />
                  </div>
                  <div>
                    <InputLabel for="civil_status" value="Civil Status" class="text-gray-700 font-medium" />
                    <select
                      id="civil_status"
                      v-model="form.civil_status"
                      class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                      required
                    >
                      <option value="">Select Civil Status</option>
                      <option value="Single">Single</option>
                      <option value="Married">Married</option>
                      <option value="Widowed">Widowed</option>
                      <option value="Separated">Separated</option>
                      <option value="Divorced">Divorced</option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.civil_status" />
                  </div>
                  <div>
                    <InputLabel for="nationality" value="Nationality" class="text-gray-700 font-medium" />
                    <TextInput
                      id="nationality"
                      v-model="form.nationality"
                      class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                      required
                    />
                    <InputError class="mt-2" :message="form.errors.nationality" />
                  </div>
                  <div>
                    <InputLabel for="occupation" value="Occupation" class="text-gray-700 font-medium" />
                    <TextInput
                      id="occupation"
                      v-model="form.occupation"
                      class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                    />
                    <InputError class="mt-2" :message="form.errors.occupation" />
                  </div>
                  <div>
                    <InputLabel for="monthly_income" value="Monthly Income" class="text-gray-700 font-medium" />
                    <TextInput
                      id="monthly_income"
                      type="number"
                      step="0.01"
                      v-model="form.monthly_income"
                      class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                    />
                    <InputError class="mt-2" :message="form.errors.monthly_income" />
                  </div>
                  <div>
                    <InputLabel for="religion" value="Religion" class="text-gray-700 font-medium" />
                    <TextInput
                      id="religion"
                      v-model="form.religion"
                      class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                    />
                    <InputError class="mt-2" :message="form.errors.religion" />
                  </div>
                </div>
              </div>

              <!-- Animated divider -->
              <div class="flex items-center justify-center my-8">
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full"></div>
                <div class="px-4">
                  <div class="w-3 h-3 bg-indigo-500 rounded-full animate-pulse"></div>
                </div>
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full"></div>
              </div>

              <!-- Beneficiary Information -->
              <div class="group">
                <button
                  type="button"
                  @click="toggleSection('beneficiary')"
                  class="flex items-center w-full text-left text-xl font-semibold text-gray-800 mb-6"
                >
                  <svg
                    :class="sections.beneficiary ? 'rotate-90' : ''"
                    class="w-5 h-5 mr-2 text-indigo-500 transition-transform duration-300"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path d="M8 5v14l11-7z"/>
                  </svg>
                  BENEFICIARY INFORMATION
                </button>
                <div v-if="sections.beneficiary" class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div>
                    <InputLabel for="beneficiary_name" value="Beneficiary Name" class="text-gray-700 font-medium" />
                    <TextInput
                      id="beneficiary_name"
                      v-model="form.beneficiary_name"
                      class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                      required
                    />
                    <InputError class="mt-2" :message="form.errors.beneficiary_name" />
                  </div>
                  <div>
                    <InputLabel for="beneficiary_birthplace" value="Birthplace" class="text-gray-700 font-medium" />
                    <TextInput
                      id="beneficiary_birthplace"
                      v-model="form.beneficiary_birthplace"
                      class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                      required
                    />
                    <InputError class="mt-2" :message="form.errors.beneficiary_birthplace" />
                  </div>
                  <div>
                    <InputLabel for="beneficiary_dob" value="Date of Birth" class="text-gray-700 font-medium" />
                    <TextInput
                      id="beneficiary_dob"
                      type="date"
                      v-model="form.beneficiary_dob"
                      class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                      required
                    />
                    <InputError class="mt-2" :message="form.errors.beneficiary_dob" />
                  </div>
                  <div>
                    <InputLabel for="beneficiary_sex" value="Sex" class="text-gray-700 font-medium" />
                    <select
                      id="beneficiary_sex"
                      v-model="form.beneficiary_sex"
                      class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                      required
                    >
                      <option value="">Select Sex</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Other">Other</option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.beneficiary_sex" />
                  </div>
                </div>
              </div>

              <!-- Animated divider -->
              <div class="flex items-center justify-center my-8">
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full"></div>
                <div class="px-4">
                  <div class="w-3 h-3 bg-indigo-500 rounded-full animate-pulse"></div>
                </div>
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full"></div>
              </div>

              <!-- Beneficiary Family Composition -->
              <div class="group">
                <button
                  type="button"
                  @click="toggleSection('family')"
                  class="flex items-center w-full text-left text-xl font-semibold text-gray-800 mb-6"
                >
                  <svg
                    :class="sections.family ? 'rotate-90' : ''"
                    class="w-5 h-5 mr-2 text-indigo-500 transition-transform duration-300"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path d="M8 5v14l11-7z"/>
                  </svg>
                  BENEFICIARY FAMILY COMPOSITION
                </button>
                <div v-if="sections.family" class="mt-4">
                  <ButtonNew
                    types="add"
                    size="md"
                  
                    @click="addFamilyMember"
                    :disabled="form.family.length >= 5"
                    class="mb-6 px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-2xl hover:from-indigo-700 hover:to-purple-700 hover:scale-105 transition-all duration-300"
                  >
                    Add Family Member
                  </ButtonNew>
                  <div
                    v-for="(member, index) in form.family"
                    :key="index"
                    class="mb-6 border-2 border-gray-200 rounded-2xl p-6 relative bg-white/80 backdrop-blur-sm transition-all duration-300 hover:shadow-lg"
                  >
                    <button
                      type="button"
                      @click="removeFamilyMember(index)"
                      class="absolute top-4 right-4 text-red-500 hover:text-red-600 transition-colors duration-200"
                    >
                      ✕
                    </button>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                      <div>
                        <InputLabel :for="`fam${index + 1}_fullname`" :value="`Family Member ${index + 1} Full Name`" class="text-gray-700 font-medium" />
                        <TextInput
                          :id="`fam${index + 1}_fullname`"
                          v-model="member.fullname"
                          class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                        />
                        <InputError class="mt-2" :message="form.errors[`fam${index + 1}_fullname`]" />
                      </div>
                      <div>
                        <InputLabel :for="`fam${index + 1}_sex`" value="Sex" class="text-gray-700 font-medium" />
                        <select
                          :id="`fam${index + 1}_sex`"
                          v-model="member.sex"
                          class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                        >
                          <option value="">Select Sex</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Other">Other</option>
                        </select>
                        <InputError class="mt-2" :message="form.errors[`fam${index + 1}_sex`]" />
                      </div>
                      <div>
                        <InputLabel :for="`fam${index + 1}_birthdate`" value="Birth Date" class="text-gray-700 font-medium" />
                        <TextInput
                          :id="`fam${index + 1}_birthdate`"
                          type="date"
                          v-model="member.birthdate"
                          class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                        />
                        <InputError class="mt-2" :message="form.errors[`fam${index + 1}_birthdate`]" />
                      </div>
                      <div>
                        <InputLabel :for="`fam${index + 1}_status`" value="Civil Status" class="text-gray-700 font-medium" />
                        <select
                          :id="`fam${index + 1}_status`"
                          v-model="member.status"
                          class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                        >
                          <option value="">Select Civil Status</option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Widowed">Widowed</option>
                          <option value="Separated">Separated</option>
                          <option value="Divorced">Divorced</option>
                        </select>
                        <InputError class="mt-2" :message="form.errors[`fam${index + 1}_status`]" />
                      </div>
                      <div>
                        <InputLabel :for="`fam${index + 1}_occupation`" value="Occupation" class="text-gray-700 font-medium" />
                        <TextInput
                          :id="`fam${index + 1}_occupation`"
                          v-model="member.occupation"
                          class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                        />
                        <InputError class="mt-2" :message="form.errors[`fam${index + 1}_occupation`]" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Animated divider -->
              <div class="flex items-center justify-center my-8">
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full"></div>
                <div class="px-4">
                  <div class="w-3 h-3 bg-indigo-500 rounded-full animate-pulse"></div>
                </div>
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full"></div>
              </div>

              <!-- Assessment -->
              <div class="group">
                <button
                  type="button"
                  @click="toggleSection('assessment')"
                  class="flex items-center w-full text-left text-xl font-semibold text-gray-800 mb-6"
                >
                  <svg
                    :class="sections.assessment ? 'rotate-90' : ''"
                    class="w-5 h-5 mr-2 text-indigo-500 transition-transform duration-300"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path d="M8 5v14l11-7z"/>
                  </svg>
                  ASSESSMENT
                </button>
                <div v-if="sections.assessment" class="mt-4 space-y-6">
                  <div>
                    <InputLabel for="problem_presented" value="Problem Presented" class="text-gray-700 font-medium" />
                    <textarea
                      id="problem_presented"
                      v-model="form.problem_presented"
                      class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                      rows="4"
                      required
                      placeholder="Describe the problem..."
                    ></textarea>
                    <InputError class="mt-2" :message="form.errors.problem_presented" />
                  </div>
                  <div>
                    <InputLabel for="social_worker_assistance" value="Social Worker Assistance Requested" class="text-gray-700 font-medium" />
                    <textarea
                      id="social_worker_assistance"
                      v-model="form.social_worker_assistance"
                      class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                      rows="4"
                      placeholder="Specify assistance needed..."
                    ></textarea>
                    <InputError class="mt-2" :message="form.errors.social_worker_assistance" />
                  </div>
                </div>
              </div>

              <!-- Animated divider -->
              <div class="flex items-center justify-center my-8">
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full"></div>
                <div class="px-4">
                  <div class="w-3 h-3 bg-indigo-500 rounded-full animate-pulse"></div>
                </div>
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full"></div>
              </div>

              <!-- Client Categories -->
              <div class="group">
                <button
                  type="button"
                  @click="toggleSection('categories')"
                  class="flex items-center w-full text-left text-xl font-semibold text-gray-800 mb-6"
                >
                  <svg
                    :class="sections.categories ? 'rotate-90' : ''"
                    class="w-5 h-5 mr-2 text-indigo-500 transition-transform duration-300"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path d="M8 5v14l11-7z"/>
                  </svg>
                  CLIENT CATEGORIES
                </button>
                <div v-if="sections.categories" class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <label
                    v-for="category in clientCategories"
                    :key="category.key"
                    class="relative group cursor-pointer"
                  >
                    <input
                      type="checkbox"
                      :value="true"
                      v-model="form[category.key]"
                      class="sr-only"
                    />
                    <div 
                      class="p-4 border-2 rounded-2xl transition-all duration-300 hover:scale-105 hover:shadow-lg"
                      :class="form[category.key] ? 'border-indigo-500 bg-indigo-50 text-indigo-700 shadow-lg ring-2 ring-indigo-200' : 'border-gray-200 bg-white text-gray-700 hover:border-indigo-300 hover:bg-indigo-50'"
                    >
                      <div class="flex items-center justify-between">
                        <span class="text-base font-medium">{{ category.label }}</span>
                        <div class="w-6 h-6 rounded-full border-2 transition-all duration-200"
                             :class="form[category.key] ? 'border-indigo-500 bg-indigo-500' : 'border-gray-300'">
                          <svg v-if="form[category.key]" class="w-4 h-4 text-white m-0.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                          </svg>
                        </div>
                      </div>
                    </div>
                  </label>
                </div>
              </div>

              <!-- Animated divider -->
              <div class="flex items-center justify-center my-8">
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full"></div>
                <div class="px-4">
                  <div class="w-3 h-3 bg-indigo-500 rounded-full animate-pulse"></div>
                </div>
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full"></div>
              </div>

              <!-- Recommended Services -->
              <div class="group">
                <button
                  type="button"
                  @click="toggleSection('services')"
                  class="flex items-center w-full text-left text-xl font-semibold text-gray-800 mb-6"
                >
                  <svg
                    :class="sections.services ? 'rotate-90' : ''"
                    class="w-5 h-5 mr-2 text-indigo-500 transition-transform duration-300"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path d="M8 5v14l11-7z"/>
                  </svg>
                  RECOMMENDED SERVICES
                </button>
                <div v-if="sections.services" class="mt-4 space-y-6">
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <label
                      v-for="service in recommendedServices"
                      :key="service.key"
                      class="relative group cursor-pointer"
                    >
                      <input
                        type="checkbox"
                        :value="true"
                        v-model="form[service.key]"
                        class="sr-only"
                      />
                      <div 
                        class="p-4 border-2 rounded-2xl transition-all duration-300 hover:scale-105 hover:shadow-lg"
                        :class="form[service.key] ? 'border-indigo-500 bg-indigo-50 text-indigo-700 shadow-lg ring-2 ring-indigo-200' : 'border-gray-200 bg-white text-gray-700 hover:border-indigo-300 hover:bg-indigo-50'"
                      >
                        <div class="flex items-center justify-between">
                          <span class="text-base font-medium">{{ service.label }}</span>
                          <div class="w-6 h-6 rounded-full border-2 transition-all duration-200"
                               :class="form[service.key] ? 'border-indigo-500 bg-indigo-500' : 'border-gray-300'">
                            <svg v-if="form[service.key]" class="w-4 h-4 text-white m-0.5" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                            </svg>
                          </div>
                        </div>
                      </div>
                    </label>
                  </div>
                  <div>
                    <InputLabel for="referral" value="Referral" class="text-gray-700 font-medium" />
                    <TextInput
                      id="referral"
                      v-model="form.referral"
                      class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                      placeholder="Specify referral details..."
                    />
                    <InputError class="mt-2" :message="form.errors.referral" />
                  </div>
                </div>
              </div>

              <!-- Animated divider -->
              <div class="flex items-center justify-center my-8">
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full"></div>
                <div class="px-4">
                  <div class="w-3 h-3 bg-indigo-500 rounded-full animate-pulse"></div>
                </div>
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full"></div>
              </div>

              <!-- Financial Assistance -->
              <div class="group">
                <button
                  type="button"
                  @click="toggleSection('financial')"
                  class="flex items-center w-full text-left text-xl font-semibold text-gray-800 mb-6"
                >
                  <svg
                    :class="sections.financial ? 'rotate-90' : ''"
                    class="w-5 h-5 mr-2 text-indigo-500 transition-transform duration-300"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path d="M8 5v14l11-7z"/>
                  </svg>
                  FINANCIAL ASSISTANCE
                </button>
                <div v-if="sections.financial" class="mt-4 space-y-6">
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <label
                      v-for="financial in financialAssistance"
                      :key="financial.key"
                      class="relative group cursor-pointer"
                    >
                      <input
                        type="checkbox"
                        :value="true"
                        v-model="form[financial.key]"
                        class="sr-only"
                      />
                      <div 
                        class="p-4 border-2 rounded-2xl transition-all duration-300 hover:scale-105 hover:shadow-lg"
                        :class="form[financial.key] ? 'border-indigo-500 bg-indigo-50 text-indigo-700 shadow-lg ring-2 ring-indigo-200' : 'border-gray-200 bg-white text-gray-700 hover:border-indigo-300 hover:bg-indigo-50'"
                      >
                        <div class="flex items-center justify-between">
                          <span class="text-base font-medium">{{ financial.label }}</span>
                          <div class="w-6 h-6 rounded-full border-2 transition-all duration-200"
                               :class="form[financial.key] ? 'border-indigo-500 bg-indigo-500' : 'border-gray-300'">
                            <svg v-if="form[financial.key]" class="w-4 h-4 text-white m-0.5" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                            </svg>
                          </div>
                        </div>
                      </div>
                    </label>
                  </div>
                  <div>
                    <InputLabel for="financial_assistance_mode" value="Assistance Mode" class="text-gray-700 font-medium" />
                    <TextInput
                      id="financial_assistance_mode"
                      v-model="form.financial_assistance_mode"
                      class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                      placeholder="Specify assistance mode..."
                    />
                    <InputError class="mt-2" :message="form.errors.financial_assistance_mode" />
                  </div>
                  <div>
                    <InputLabel for="financial_assistance_source" value="Assistance Source" class="text-gray-700 font-medium" />
                    <TextInput
                      id="financial_assistance_source"
                      v-model="form.financial_assistance_source"
                      class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                      placeholder="Specify assistance source..."
                    />
                    <InputError class="mt-2" :message="form.errors.financial_assistance_source" />
                  </div>
                </div>
              </div>

              <!-- Animated divider -->
              <div class="flex items-center justify-center my-8">
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full"></div>
                <div class="px-4">
                  <div class="w-3 h-3 bg-indigo-500 rounded-full animate-pulse"></div>
                </div>
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full"></div>
              </div>

              <!-- Material Assistance -->
              <div class="group">
                <button
                  type="button"
                  @click="toggleSection('material')"
                  class="flex items-center w-full text-left text-xl font-semibold text-gray-800 mb-6"
                >
                  <svg
                    :class="sections.material ? 'rotate-90' : ''"
                    class="w-5 h-5 mr-2 text-indigo-500 transition-transform duration-300"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path d="M8 5v14l11-7z"/>
                  </svg>
                  MATERIAL ASSISTANCE
                </button>
                <div v-if="sections.material" class="mt-4 space-y-6">
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <label
                      v-for="material in materialAssistance"
                      :key="material.key"
                      class="relative group cursor-pointer"
                    >
                      <input
                        type="checkbox"
                        :value="true"
                        v-model="form[material.key]"
                        class="sr-only"
                      />
                      <div 
                        class="p-4 border-2 rounded-2xl transition-all duration-300 hover:scale-105 hover:shadow-lg"
                        :class="form[material.key] ? 'border-indigo-500 bg-indigo-50 text-indigo-700 shadow-lg ring-2 ring-indigo-200' : 'border-gray-200 bg-white text-gray-700 hover:border-indigo-300 hover:bg-indigo-50'"
                      >
                        <div class="flex items-center justify-between">
                          <span class="text-base font-medium">{{ material.label }}</span>
                          <div class="w-6 h-6 rounded-full border-2 transition-all duration-200"
                               :class="form[material.key] ? 'border-indigo-500 bg-indigo-500' : 'border-gray-300'">
                            <svg v-if="form[material.key]" class="w-4 h-4 text-white m-0.5" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                            </svg>
                          </div>
                        </div>
                      </div>
                    </label>
                  </div>
                  <div>
                    <InputLabel for="material_others" value="Other Material Assistance" class="text-gray-700 font-medium" />
                    <TextInput
                      id="material_others"
                      v-model="form.material_others"
                      class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                      placeholder="Specify other material assistance..."
                    />
                    <InputError class="mt-2" :message="form.errors.material_others" />
                  </div>
                </div>
              </div>

              <!-- Animated divider -->
              <!-- <div class="flex items-center justify-center my-8">
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full"></div>
                <div class="px-4">
                  <div class="w-3 h-3 bg-indigo-500 rounded-full animate-pulse"></div>
                </div>
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full"></div>
              </div> -->

              <!-- Signatures -->
              <!-- <div class="group">
                <button
                  type="button"
                  @click="toggleSection('signatures')"
                  class="flex items-center w-full text-left text-xl font-semibold text-gray-800 mb-6"
                >
                  <svg
                    :class="sections.signatures ? 'rotate-90' : ''"
                    class="w-5 h-5 mr-2 text-indigo-500 transition-transform duration-300"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path d="M8 5v14l11-7z"/>
                  </svg>
                  SIGNATURES
                </button>
                <div v-if="sections.signatures" class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div>
                    <InputLabel for="client_signature" value="Client Signature (Type your name)" class="text-gray-700 font-medium" />
                    <TextInput
                      id="client_signature"
                      v-model="form.client_signature"
                      class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                      placeholder="Type your full name..."
                    />
                    <InputError class="mt-2" :message="form.errors.client_signature" />
                  </div>
                  <div>
                    <InputLabel for="thumb_mark" value="Thumb Mark (Type 'Yes' if provided)" class="text-gray-700 font-medium" />
                    <TextInput
                      id="thumb_mark"
                      v-model="form.thumb_mark"
                      class="mt-1 block w-full border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-indigo-300 bg-white text-gray-700 shadow-sm transition-all duration-300 hover:border-indigo-300"
                      placeholder="Type 'Yes' if thumb mark is provided..."
                    />
                    <InputError class="mt-2" :message="form.errors.thumb_mark" />
                  </div>
                </div>
              </div> -->

              <!-- Submit Button -->
              <div class="pt-8">
                <div class="flex justify-center">
                  <button
                    type="submit"
                    :disabled="form.processing || !isFormValid"
                    class="group relative px-12 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-2xl transition-all duration-300 hover:from-indigo-700 hover:to-purple-700 hover:scale-105 hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 focus:outline-none focus:ring-4 focus:ring-indigo-300"
                  >
                    <span class="flex items-center">
                      <svg v-if="form.processing" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                      </svg>
                      <span class="text-lg">
                        {{ form.processing ? 'Submitting...' : 'Submit Request' }}
                      </span>
                      <svg v-if="!form.processing" class="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                      </svg>
                    </span>
                  </button>
                </div>
                <div class="text-center mt-4 text-sm text-gray-500">
                  {{ isFormValid ? 'Ready to submit' : 'Please complete all required fields' }}
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- Thank you message -->
        <div v-if="showThankYou" class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50">
          <div class="bg-white rounded-3xl p-8 max-w-md mx-4 text-center animate-bounce">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
              <svg class="w-8 h-8 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
              </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Thank You!</h3>
            <p class="text-gray-600">Your assistance request has been submitted successfully.</p>
          </div>
        </div>
      </div>
    </div>
  </ResidentLayout>
</template>

<script setup>
import { ref, computed } from "vue";
import ResidentLayout from "@/Layouts/ResidentLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import ButtonNew from "@/Components/ButtonNew.vue";
import { useForm } from "@inertiajs/vue3";
import { notifyMinimal } from "@/globalFunctions.js";

const sections = ref({
  client: true,
  beneficiary: false,
  family: false,
  assessment: false,
  categories: false,
  services: false,
  financial: false,
  material: false,
  signatures: false,
  statusL: false
});

const showThankYou = ref(false);

const clientCategories = [
  { key: 'is_child_in_need', label: 'Child in Need of Special Protection' },
  { key: 'is_youth_in_need', label: 'Youth in Need of Special Protection' },
  { key: 'is_woman_in_difficult_circumstances', label: 'Woman in Difficult Circumstances' },
  { key: 'is_pwd', label: 'Person with Disability (PWD)' },
  { key: 'is_senior', label: 'Senior Citizen' },
  { key: 'is_family_head' , label: 'Family Head and Other'}
];

const recommendedServices = [
  { key: 'needs_counseling', label: 'Needs Counseling' },
  { key: 'needs_legal_assistance', label: 'Needs Legal Assistance' },
];

const financialAssistance = [
  { key: 'financial_food_subsidy', label: 'Food Subsidy' },
  { key: 'financial_livelihood', label: 'Livelihood' },
  { key: 'financial_educational', label: 'Educational' },
  { key: 'financial_medical', label: 'Medical' },
  { key: 'financial_burial', label: 'Burial' },
  { key: 'financial_transportation', label: 'Transportation' },
];

const materialAssistance = [
  { key: 'material_food_packs', label: 'Food Packs' },
  { key: 'material_used_clothing', label: 'Used Clothing' },
  { key: 'material_assistive_device', label: 'Assistive Device' },
];

const toggleSection = (section) => {
  sections.value[section] = !sections.value[section];
};

const form = useForm({
  client_name: "",
  client_sex: "",
  client_dob: "",
  present_address: "",
  relationship_to_beneficiary: "",
  civil_status: "",
  nationality: "",
  occupation: "",
  monthly_income: null,
  religion: "",
  beneficiary_name: "",
  beneficiary_birthplace: "",
  beneficiary_dob: "",
  beneficiary_sex: "",
  family: [],
  problem_presented: "",
  social_worker_assistance: "",
  is_child_in_need: false,
  is_youth_in_need: false,
  is_woman_in_difficult_circumstances: false,
  is_pwd: false,
  is_senior: false,
  needs_counseling: false,
  needs_legal_assistance: false,
  referral: "",
  financial_food_subsidy: false,
  financial_livelihood: false,
  financial_educational: false,
  financial_medical: false,
  financial_burial: false,
  financial_transportation: false,
  financial_assistance_mode: "",
  financial_assistance_source: "",
  material_food_packs: false,
  material_used_clothing: false,
  material_assistive_device: false,
  material_others: "",
  client_signature: "",
  thumb_mark: "",
  status: "PENDING"
});

const requiredFields = [
  'client_name',
  'client_sex',
  'client_dob',
  'present_address',
  'civil_status',
  'nationality',
  'beneficiary_name',
  'beneficiary_birthplace',
  'beneficiary_dob',
  'beneficiary_sex',
  'problem_presented',
];

const isFormValid = computed(() => {
  return requiredFields.every(field => form[field] !== '' && form[field] !== null);
});

const addFamilyMember = () => {
  if (form.family.length < 5) {
    form.family.push({
      fullname: "",
      sex: "",
      birthdate: "",
      status: "",
      occupation: "",
    });
  }
};

const removeFamilyMember = (index) => {
  form.family.splice(index, 1);
};

const getStepProgress = (step) => {
  const fields = [
    ['client_name', 'client_sex', 'client_dob', 'present_address', 'civil_status', 'nationality'],
    ['beneficiary_name', 'beneficiary_birthplace', 'beneficiary_dob', 'beneficiary_sex'],
    ['family'],
    ['problem_presented'],
    ['is_child_in_need', 'is_youth_in_need', 'is_woman_in_difficult_circumstances', 'is_pwd', 'is_senior'],
    ['needs_counseling', 'needs_legal_assistance', 'referral'],
    ['financial_food_subsidy', 'financial_livelihood', 'financial_educational', 'financial_medical', 'financial_burial', 'financial_transportation', 'financial_assistance_mode', 'financial_assistance_source'],
    ['material_food_packs', 'material_used_clothing', 'material_assistive_device', 'material_others'],
    ['client_signature', 'thumb_mark'],
  ];
  return fields[step].some(field => 
    field === 'family' ? form.family.length > 0 : 
    form[field] !== '' && form[field] !== null && form[field] !== false
  );
};

const getProgressText = () => {
  const completed = [
    ['client_name', 'client_sex', 'client_dob', 'present_address', 'civil_status', 'nationality'],
    ['beneficiary_name', 'beneficiary_birthplace', 'beneficiary_dob', 'beneficiary_sex'],
    ['family'],
    ['problem_presented'],
    ['is_child_in_need', 'is_youth_in_need', 'is_woman_in_difficult_circumstances', 'is_pwd', 'is_senior'],
    ['needs_counseling', 'needs_legal_assistance', 'referral'],
    ['financial_food_subsidy', 'financial_livelihood', 'financial_educational', 'financial_medical', 'financial_burial', 'financial_transportation', 'financial_assistance_mode', 'financial_assistance_source'],
    ['material_food_packs', 'material_used_clothing', 'material_assistive_device', 'material_others'],
    ['client_signature', 'thumb_mark'],
  ].filter(section => section.some(field => 
    field === 'family' ? form.family.length > 0 : 
    form[field] !== '' && form[field] !== null && form[field] !== false
  )).length;
  return `${completed} of 9 sections completed`;
};

const submit = () => {
  const data = {
    ...form.data(),
    ...form.family.reduce(
      (acc, member, index) => ({
        ...acc,
        [`fam${index + 1}_fullname`]: member.fullname,
        [`fam${index + 1}_sex`]: member.sex,
        [`fam${index + 1}_birthdate`]: member.birthdate,
        [`fam${index + 1}_status`]: member.status,
        [`fam${index + 1}_occupation`]: member.occupation,
      }),
      {}
    ),
  };

  for (let i = form.family.length + 1; i <= 5; i++) {
    data[`fam${i}_fullname`] = null;
    data[`fam${i}_sex`] = null;
    data[`fam${i}_birthdate`] = null;
    data[`fam${i}_status`] = null;
    data[`fam${i}_occupation`] = null;
  }

  form.transform(() => data).post(route("resident.assistance.store"), {
    onSuccess: () => {
      showThankYou.value = true;
      setTimeout(() => {
        showThankYou.value = false;
        form.reset();
      }, 3000);
      notifyMinimal("Assistance request submitted successfully!", "success");
    },
    onError: () => {
      notifyMinimal(
        "Failed to submit assistance request. Please try again.",
        "error"
      );
    },
  });
};
</script>

<style scoped>
.animate-bounce {
  animation: bounce 0.5s ease-in-out;
}

@keyframes bounce {
  0%, 20%, 53%, 80%, 100% {
    transform: translate3d(0,0,0);
  }
  40%, 43% {
    transform: translate3d(0, -10px, 0);
  }
  70% {
    transform: translate3d(0, -5px, 0);
  }
  90% {
    transform: translate3d(0, -2px, 0);
  }
}

.hover\:shadow-3xl:hover {
  box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.25);
}
</style>