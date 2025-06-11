<template>
  <ResidentLayout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-2 border-gray-300"
        >
          <div class="p-6 text-black">
            <div class="mb-8 text-center">
              <h1 class="text-3xl font-bold text-black mb-4">
                Request Assistance
              </h1>
              <p class="text-lg text-gray-700 leading-relaxed">
                Please provide the necessary details to request assistance. Your
                information will help us process your request efficiently.
              </p>
            </div>

            <form @submit.prevent="submit">
              <div class="mb-6">
                <button
                  type="button"
                  @click="toggleSection('client')"
                  class="flex items-center w-full text-left text-lg font-bold text-gray-700 leading-relaxed"
                >
                  <span
                    :class="sections.client ? 'rotate-90' : ''"
                    class="mr-2 text-black"
                    >▶</span
                  >
                  CLIENT INFORMATION
                </button>
                <div v-if="sections.client" class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div>
                    <InputLabel for="client_name" value="Client Name" />
                    <TextInput
                      id="client_name"
                      v-model="form.client_name"
                      class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                      required
                      autofocus
                    />
                    <InputError class="mt-2" :message="form.errors.client_name" />
                  </div>
                  <div>
                    <InputLabel for="client_sex" value="Sex" />
                    <select
                      id="client_sex"
                      v-model="form.client_sex"
                      class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
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
                    <InputLabel for="client_dob" value="Date of Birth" />
                    <TextInput
                      id="client_dob"
                      type="date"
                      v-model="form.client_dob"
                      class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                      required
                    />
                    <InputError class="mt-2" :message="form.errors.client_dob" />
                  </div>
                  <div>
                    <InputLabel for="present_address" value="Present Address" />
                    <TextInput
                      id="present_address"
                      v-model="form.present_address"
                      class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                      required
                    />
                    <InputError
                      class="mt-2"
                      :message="form.errors.present_address"
                    />
                  </div>
                  <div>
                    <InputLabel
                      for="relationship_to_beneficiary"
                      value="Relationship to Beneficiary"
                    />
                    <TextInput
                      id="relationship_to_beneficiary"
                      v-model="form.relationship_to_beneficiary"
                      class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                    />
                    <InputError
                      class="mt-2"
                      :message="form.errors.relationship_to_beneficiary"
                    />
                  </div>
                  <div>
                    <InputLabel for="civil_status" value="Civil Status" />
                    <select
                      id="civil_status"
                      v-model="form.civil_status"
                      class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                      required
                    >
                      <option value="">Select Civil Status</option>
                      <option value="Single">Single</option>
                      <option value="Married">Married</option>
                      <option value="Widowed">Widowed</option>
                      <option value="Separated">Separated</option>
                      <option value="Divorced">Divorced</option>
                    </select>
                    <InputError
                      class="mt-2"
                      :message="form.errors.civil_status"
                    />
                  </div>
                  <div>
                    <InputLabel for="nationality" value="Nationality" />
                    <TextInput
                      id="nationality"
                      v-model="form.nationality"
                      class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                      required
                    />
                    <InputError
                      class="mt-2"
                      :message="form.errors.nationality"
                    />
                  </div>
                  <div>
                    <InputLabel for="occupation" value="Occupation" />
                    <TextInput
                      id="occupation"
                      v-model="form.occupation"
                      class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                    />
                    <InputError
                      class="mt-2"
                      :message="form.errors.occupation"
                    />
                  </div>
                  <div>
                    <InputLabel for="monthly_income" value="Monthly Income" />
                    <TextInput
                      id="monthly_income"
                      type="number"
                      step="0.01"
                      v-model="form.monthly_income"
                      class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                    />
                    <InputError
                      class="mt-2"
                      :message="form.errors.monthly_income"
                    />
                  </div>
                  <div>
                    <InputLabel for="religion" value="Religion" />
                    <TextInput
                      id="religion"
                      v-model="form.religion"
                      class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                    />
                    <InputError class="mt-2" :message="form.errors.religion" />
                  </div>
                </div>
              </div>

              <!-- Beneficiary Information -->
              <div class="mb-6">
                <button
                  type="button"
                  @click="toggleSection('beneficiary')"
                  class="flex items-center w-full text-left text-lg font-bold text-gray-700 leading-relaxed"
                >
                  <span
                    :class="sections.beneficiary ? 'rotate-90' : ''"
                    class="mr-2 text-black"
                    >▶</span
                  >
                  BENEFICIARY INFORMATION
                </button>
                <div
                  v-if="sections.beneficiary"
                  class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6"
                >
                  <div>
                    <InputLabel for="beneficiary_name" value="Beneficiary Name" />
                    <TextInput
                      id="beneficiary_name"
                      v-model="form.beneficiary_name"
                      class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                      required
                    />
                    <InputError
                      class="mt-2"
                      :message="form.errors.beneficiary_name"
                    />
                  </div>
                  <div>
                    <InputLabel
                      for="beneficiary_birthplace"
                      value="Birthplace"
                    />
                    <TextInput
                      id="beneficiary_birthplace"
                      v-model="form.beneficiary_birthplace"
                      class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                      required
                    />
                    <InputError
                      class="mt-2"
                      :message="form.errors.beneficiary_birthplace"
                    />
                  </div>
                  <div>
                    <InputLabel for="beneficiary_dob" value="Date of Birth" />
                    <TextInput
                      id="beneficiary_dob"
                      type="date"
                      v-model="form.beneficiary_dob"
                      class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                      required
                    />
                    <InputError
                      class="mt-2"
                      :message="form.errors.beneficiary_dob"
                    />
                  </div>
                  <div>
                    <InputLabel for="beneficiary_sex" value="Sex" />
                    <select
                      id="beneficiary_sex"
                      v-model="form.beneficiary_sex"
                      class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                      required
                    >
                      <option value="">Select Sex</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Other">Other</option>
                    </select>
                    <InputError
                      class="mt-2"
                      :message="form.errors.beneficiary_sex"
                    />
                  </div>
                </div>
              </div>

              <!-- Beneficiary Family Composition -->
              <div class="mb-6">
                <button
                  type="button"
                  @click="toggleSection('family')"
                  class="flex items-center w-full text-left text-lg font-bold text-gray-700 leading-relaxed"
                >
                  <span
                    :class="sections.family ? 'rotate-90' : ''"
                    class="mr-2 text-black"
                    >▶</span
                  >
                  BENEFICIARY FAMILY COMPOSITION
                </button>
                <div v-if="sections.family" class="mt-4">
                  <ButtonNew
                    types="add"
                    size="md"
                    tooltips="Add Family Member"
                    @click="addFamilyMember"
                    :disabled="form.family.length >= 5"
                    class="mb-4"
                  >
                    Add Family Member
                  </ButtonNew>
                  <div
                    v-for="(member, index) in form.family"
                    :key="index"
                    class="mb-4 border p-4 rounded-md relative bg-white"
                  >
                    <button
                      type="button"
                      @click="removeFamilyMember(index)"
                      class="absolute top-2 right-2 text-red-600 hover:text-red-800"
                    >
                      ✕
                    </button>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                      <div>
                        <InputLabel
                          :for="`fam${index + 1}_fullname`"
                          :value="`Family Member ${index + 1} Full Name`"
                        />
                        <TextInput
                          :id="`fam${index + 1}_fullname`"
                          v-model="member.fullname"
                          class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                        />
                        <InputError
                          class="mt-2"
                          :message="form.errors[`fam${index + 1}_fullname`]"
                        />
                      </div>
                      <div>
                        <InputLabel :for="`fam${index + 1}_sex`" value="Sex" />
                        <select
                          :id="`fam${index + 1}_sex`"
                          v-model="member.sex"
                          class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                        >
                          <option value="">Select Sex</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Other">Other</option>
                        </select>
                        <InputError
                          class="mt-2"
                          :message="form.errors[`fam${index + 1}_sex`]"
                        />
                      </div>
                      <div>
                        <InputLabel
                          :for="`fam${index + 1}_birthdate`"
                          value="Birth Date"
                        />
                        <TextInput
                          :id="`fam${index + 1}_birthdate`"
                          type="date"
                          v-model="member.birthdate"
                          class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                        />
                        <InputError
                          class="mt-2"
                          :message="form.errors[`fam${index + 1}_birthdate`]"
                        />
                      </div>
                      <div>
                        <InputLabel
                          :for="`fam${index + 1}_status`"
                          value="Civil Status"
                        />
                        <select
                          :id="`fam${index + 1}_status`"
                          v-model="member.status"
                          class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                        >
                          <option value="">Select Civil Status</option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Widowed">Widowed</option>
                          <option value="Separated">Separated</option>
                          <option value="Divorced">Divorced</option>
                        </select>
                        <InputError
                          class="mt-2"
                          :message="form.errors[`fam${index + 1}_status`]"
                        />
                      </div>
                      <div>
                        <InputLabel
                          :for="`fam${index + 1}_occupation`"
                          value="Occupation"
                        />
                        <TextInput
                          :id="`fam${index + 1}_occupation`"
                          v-model="member.occupation"
                          class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                        />
                        <InputError
                          class="mt-2"
                          :message="form.errors[`fam${index + 1}_occupation`]"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Assessment -->
              <div class="mb-6">
                <button
                  type="button"
                  @click="toggleSection('assessment')"
                  class="flex items-center w-full text-left text-lg font-bold text-gray-700 leading-relaxed"
                >
                  <span
                    :class="sections.assessment ? 'rotate-90' : ''"
                    class="mr-2 text-black"
                    >▶</span
                  >
                  ASSESSMENT
                </button>
                <div v-if="sections.assessment" class="mt-4 space-y-4">
                  <div>
                    <InputLabel for="problem_presented" value="Problem Presented" />
                    <textarea
                      id="problem_presented"
                      v-model="form.problem_presented"
                      class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                      rows="4"
                      required
                      placeholder="Describe the problem..."
                    ></textarea>
                    <InputError
                      class="mt-2"
                      :message="form.errors.problem_presented"
                    />
                  </div>
                  <div>
                    <InputLabel
                      for="social_worker_assistance"
                      value="Social Worker Assistance Requested"
                    />
                    <textarea
                      id="social_worker_assistance"
                      v-model="form.social_worker_assistance"
                      class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                      rows="4"
                      placeholder="Specify assistance needed..."
                    ></textarea>
                    <InputError
                      class="mt-2"
                      :message="form.errors.social_worker_assistance"
                    />
                  </div>
                </div>
              </div>

              <!-- Client Categories -->
              <div class="mb-6">
                <button
                  type="button"
                  @click="toggleSection('categories')"
                  class="flex items-center w-full text-left text-lg font-bold text-gray-700 leading-relaxed"
                >
                  <span
                    :class="sections.categories ? 'rotate-90' : ''"
                    class="mr-2 text-black"
                    >▶</span
                  >
                  CLIENT CATEGORIES
                </button>
                <div v-if="sections.categories" class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-3">
                  <label
                    class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-100 cursor-pointer bg-white"
                  >
                    <input
                      type="checkbox"
                      v-model="form.is_child_in_need"
                      class="h-5 w-5 rounded border-gray-300 text-black shadow-sm focus:ring-black"
                    />
                    <span class="ml-3 text-base font-medium text-black"
                      >Child in Need</span
                    >
                  </label>
                  <label
                    class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-100 cursor-pointer bg-white"
                  >
                    <input
                      type="checkbox"
                      v-model="form.is_youth_in_need"
                      class="h-5 w-5 rounded border-gray-300 text-black shadow-sm focus:ring-black"
                    />
                    <span class="ml-3 text-base font-medium text-black"
                      >Youth in Need</span
                    >
                  </label>
                  <label
                    class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-100 cursor-pointer bg-white"
                  >
                    <input
                      type="checkbox"
                      v-model="form.is_woman_in_difficult_circumstances"
                      class="h-5 w-5 rounded border-gray-300 text-black shadow-sm focus:ring-black"
                    />
                    <span class="ml-3 text-base font-medium text-black"
                      >Woman in Difficult Circumstances</span
                    >
                  </label>
                  <label
                    class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-100 cursor-pointer bg-white"
                  >
                    <input
                      type="checkbox"
                      v-model="form.is_pwd"
                      class="h-5 w-5 rounded border-gray-300 text-black shadow-sm focus:ring-black"
                    />
                    <span class="ml-3 text-base font-medium text-black"
                      >Person with Disability (PWD)</span
                    >
                  </label>
                  <label
                    class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-100 cursor-pointer bg-white"
                  >
                    <input
                      type="checkbox"
                      v-model="form.is_senior"
                      class="h-5 w-5 rounded border-gray-300 text-black shadow-sm focus:ring-black"
                    />
                    <span class="ml-3 text-base font-medium text-black"
                      >Senior Citizen</span
                    >
                  </label>
                </div>
              </div>

              <!-- Recommended Services -->
              <div class="mb-6">
                <button
                  type="button"
                  @click="toggleSection('services')"
                  class="flex items-center w-full text-left text-lg font-bold text-gray-700 leading-relaxed"
                >
                  <span
                    :class="sections.services ? 'rotate-90' : ''"
                    class="mr-2 text-black"
                    >▶</span
                  >
                  RECOMMENDED SERVICES
                </button>
                <div v-if="sections.services" class="mt-4 space-y-4">
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <label
                      class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-100 cursor-pointer bg-white"
                    >
                      <input
                        type="checkbox"
                        v-model="form.needs_counseling"
                        class="h-5 w-5 rounded border-gray-300 text-black shadow-sm focus:ring-black"
                      />
                      <span class="ml-3 text-base font-medium text-black"
                        >Needs Counseling</span
                      >
                    </label>
                    <label
                      class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-100 cursor-pointer bg-white"
                    >
                      <input
                        type="checkbox"
                        v-model="form.needs_legal_assistance"
                        class="h-5 w-5 rounded border-gray-300 text-black shadow-sm focus:ring-black"
                      />
                      <span class="ml-3 text-base font-medium text-black"
                        >Needs Legal Assistance</span
                      >
                    </label>
                  </div>
                  <div>
                    <InputLabel for="referral" value="Referral" />
                    <TextInput
                      id="referral"
                      v-model="form.referral"
                      class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                      placeholder="Specify referral details..."
                    />
                    <InputError class="mt-2" :message="form.errors.referral" />
                  </div>
                </div>
              </div>

              <!-- Financial Assistance -->
              <div class="mb-6">
                <button
                  type="button"
                  @click="toggleSection('financial')"
                  class="flex items-center w-full text-left text-lg font-bold text-gray-700 leading-relaxed"
                >
                  <span
                    :class="sections.financial ? 'rotate-90' : ''"
                    class="mr-2 text-black"
                    >▶</span
                  >
                  FINANCIAL ASSISTANCE
                </button>
                <div v-if="sections.financial" class="mt-4 space-y-4">
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <label
                      class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-100 cursor-pointer bg-white"
                    >
                      <input
                        type="checkbox"
                        v-model="form.financial_food_subsidy"
                        class="h-5 w-5 rounded border-gray-300 text-black shadow-sm focus:ring-black"
                      />
                      <span class="ml-3 text-base font-medium text-black"
                        >Food Subsidy</span
                      >
                    </label>
                    <label
                      class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-100 cursor-pointer bg-white"
                    >
                      <input
                        type="checkbox"
                        v-model="form.financial_livelihood"
                        class="h-5 w-5 rounded border-gray-300 text-black shadow-sm focus:ring-black"
                      />
                      <span class="ml-3 text-base font-medium text-black"
                        >Livelihood</span
                      >
                    </label>
                    <label
                      class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-100 cursor-pointer bg-white"
                    >
                      <input
                        type="checkbox"
                        v-model="form.financial_educational"
                        class="h-5 w-5 rounded border-gray-300 text-black shadow-sm focus:ring-black"
                      />
                      <span class="ml-3 text-base font-medium text-black"
                        >Educational</span
                      >
                    </label>
                    <label
                      class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-100 cursor-pointer bg-white"
                    >
                      <input
                        type="checkbox"
                        v-model="form.financial_medical"
                        class="h-5 w-5 rounded border-gray-300 text-black shadow-sm focus:ring-black"
                      />
                      <span class="ml-3 text-base font-medium text-black"
                        >Medical</span
                      >
                    </label>
                    <label
                      class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-100 cursor-pointer bg-white"
                    >
                      <input
                        type="checkbox"
                        v-model="form.financial_burial"
                        class="h-5 w-5 rounded border-gray-300 text-black shadow-sm focus:ring-black"
                      />
                      <span class="ml-3 text-base font-medium text-black"
                        >Burial</span
                      >
                    </label>
                    <label
                      class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-100 cursor-pointer bg-white"
                    >
                      <input
                        type="checkbox"
                        v-model="form.financial_transportation"
                        class="h-5 w-5 rounded border-gray-300 text-black shadow-sm focus:ring-black"
                      />
                      <span class="ml-3 text-base font-medium text-black"
                        >Transportation</span
                      >
                    </label>
                  </div>
                  <div>
                    <InputLabel
                      for="financial_assistance_mode"
                      value="Assistance Mode"
                    />
                    <TextInput
                      id="financial_assistance_mode"
                      v-model="form.financial_assistance_mode"
                      class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                      placeholder="Specify assistance mode..."
                    />
                    <InputError
                      class="mt-2"
                      :message="form.errors.financial_assistance_mode"
                    />
                  </div>
                  <div>
                    <InputLabel
                      for="financial_assistance_source"
                      value="Assistance Source"
                    />
                    <TextInput
                      id="financial_assistance_source"
                      v-model="form.financial_assistance_source"
                      class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                      placeholder="Specify assistance source..."
                    />
                    <InputError
                      class="mt-2"
                      :message="form.errors.financial_assistance_source"
                    />
                  </div>
                </div>
              </div>

              <!-- Material Assistance -->
              <div class="mb-6">
                <button
                  type="button"
                  @click="toggleSection('material')"
                  class="flex items-center w-full text-left text-lg font-bold text-gray-700 leading-relaxed"
                >
                  <span
                    :class="sections.material ? 'rotate-90' : ''"
                    class="mr-2 text-black"
                    >▶</span
                  >
                  MATERIAL ASSISTANCE
                </button>
                <div v-if="sections.material" class="mt-4 space-y-4">
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <label
                      class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-100 cursor-pointer bg-white"
                    >
                      <input
                        type="checkbox"
                        v-model="form.material_food_packs"
                        class="h-5 w-5 rounded border-gray-300 text-black shadow-sm focus:ring-black"
                      />
                      <span class="ml-3 text-base font-medium text-black"
                        >Food Packs</span
                      >
                    </label>
                    <label
                      class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-100 cursor-pointer bg-white"
                    >
                      <input
                        type="checkbox"
                        v-model="form.material_used_clothing"
                        class="h-5 w-5 rounded border-gray-300 text-black shadow-sm focus:ring-black"
                      />
                      <span class="ml-3 text-base font-medium text-black"
                        >Used Clothing</span
                      >
                    </label>
                    <label
                      class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-100 cursor-pointer bg-white"
                    >
                      <input
                        type="checkbox"
                        v-model="form.material_assistive_device"
                        class="h-5 w-5 rounded border-gray-300 text-black shadow-sm focus:ring-black"
                      />
                      <span class="ml-3 text-base font-medium text-black"
                        >Assistive Device</span
                      >
                    </label>
                  </div>
                  <div>
                    <InputLabel
                      for="material_others"
                      value="Other Material Assistance"
                    />
                    <TextInput
                      id="material_others"
                      v-model="form.material_others"
                      class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                      placeholder="Specify other material assistance..."
                    />
                    <InputError
                      class="mt-2"
                      :message="form.errors.material_others"
                    />
                  </div>
                </div>
              </div>

              <!-- Signatures -->
              <div class="mb-6">
                <button
                  type="button"
                  @click="toggleSection('signatures')"
                  class="flex items-center w-full text-left text-lg font-bold text-gray-700 leading-relaxed"
                >
                  <span
                    :class="sections.signatures ? 'rotate-90' : ''"
                    class="mr-2 text-black"
                    >▶</span
                  >
                  SIGNATURES
                </button>
                <div v-if="sections.signatures" class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div>
                    <InputLabel
                      for="client_signature"
                      value="Client Signature (Type your name)"
                    />
                    <TextInput
                      id="client_signature"
                      v-model="form.client_signature"
                      class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                      placeholder="Type your full name..."
                    />
                    <InputError
                      class="mt-2"
                      :message="form.errors.client_signature"
                    />
                  </div>
                  <div>
                    <InputLabel
                      for="thumb_mark"
                      value="Thumb Mark (Type 'Yes' if provided)"
                    />
                    <TextInput
                      id="thumb_mark"
                      v-model="form.thumb_mark"
                      class="mt-1 block w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm bg-white text-black"
                      placeholder="Type 'Yes' if thumb mark is provided..."
                    />
                    <InputError
                      class="mt-2"
                      :message="form.errors.thumb_mark"
                    />
                  </div>
                </div>
              </div>

              <!-- Submit -->
              <div class="flex items-center justify-end mt-6">
                <!-- <Link
                  :href="route('resident.dashboard')"
                  class="underline text-sm text-black hover:text-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black"
                >
                  Back to Dashboard
                </Link> -->
                <ButtonNew
                  types="save"
                  size="md"
                  tooltips="Submit Request"
                  :class="{ 'opacity-25': form.processing }"
                  :disabled="form.processing"
                  @click="submit"
                >
                  Submit
                </ButtonNew>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </ResidentLayout>
</template>

<script setup>
import { ref } from "vue";
import ResidentLayout from "@/Layouts/ResidentLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link, useForm } from "@inertiajs/vue3";
import ButtonNew from "@/Components/ButtonNew.vue";
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
});

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
      form.reset();
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