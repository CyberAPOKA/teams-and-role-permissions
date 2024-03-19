<script setup>
import { ref, onMounted } from 'vue';
import { role, permission } from "@/Services/permission-role.js";

const props = defineProps({
    user: Object,
    team: Object,
    user_role: Object,
    permissions: Array
});

onMounted(() => {
    console.log(props.role)
});
</script>

<template>
    <div class="container mx-auto px-2">
        <div class="lg:grid lg:grid-cols-2 gap-4">
            <div class="p-4 rounded-xl border border-gray-300">
                <h1>Usuário</h1>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NOME
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    EMAIL
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    ROLE
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    TIME ATUAL
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white text-center border-b font-medium text-gray-900 whitespace-nowrap">
                                <th class="px-6 py-4">
                                    {{ user.id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ user.name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ user.email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ user_role.name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ team.name }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h1>Permissões</h1>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6">
                    <h1 v-for="permission in permissions">
                        {{ permission }}
                    </h1>
                </div>
            </div>
            <div class="p-4 rounded-xl border border-gray-300">
                <h1>Verificar a partir de permissões:</h1>
                <div class="grid grid-cols-2 lg:grid-cols-4">
                    <h1 v-if="permission(['view calendar'])">Ver calendário</h1>
                    <h1 v-if="permission(['create calendar'])">Criar calendário</h1>
                    <h1 v-if="permission(['update calendar'])">Editar calendário</h1>
                    <h1 v-if="permission(['delete calendar'])">Deletar calendário</h1>

                    <h1 v-if="permission(['view financial'])">Ver financeiro</h1>
                    <h1 v-if="permission(['create financial'])">Criar financeiro</h1>
                    <h1 v-if="permission(['update financial'])">Editar financeiro</h1>
                    <h1 v-if="permission(['delete financial'])">Deletar financeiro</h1>

                    <h1 v-if="permission(['view patients'])">Ver pacientes</h1>
                    <h1 v-if="permission(['create patients'])">Criar pacientes</h1>
                    <h1 v-if="permission(['update patients'])">Editar pacientes</h1>
                    <h1 v-if="permission(['delete patients'])">Deletar pacientes</h1>
                </div>

                <h1 class="mt-4">Verificar a partir da role:</h1>
                <div class="grid grid-cols-2 lg:grid-cols-4">
                    <h1 v-if="role(['assistant', 'professional administrator', 'simple professional'])">Ver calendário
                    </h1>
                    <h1 v-if="role(['professional administrator', 'simple professional'])">Criar calendário</h1>
                    <h1 v-if="role(['professional administrator', 'simple professional'])">Editar calendário</h1>
                    <h1 v-if="role(['professional administrator'])">Deletar calendário</h1>

                    <h1 v-if="role(['assistant', 'professional administrator', 'simple professional'])">Ver financeiro
                    </h1>
                    <h1 v-if="role(['professional administrator', 'simple professional'])">Criar financeiro</h1>
                    <h1 v-if="role(['professional administrator', 'simple professional'])">Editar financeiro</h1>
                    <h1 v-if="role(['professional administrator'])">Deletar financeiro</h1>

                    <h1 v-if="role(['assistant', 'professional administrator', 'simple professional'])">Ver pacientes
                    </h1>
                    <h1 v-if="role(['professional administrator', 'simple professional'])">Criar pacientes</h1>
                    <h1 v-if="role(['professional administrator', 'simple professional'])">Editar pacientes</h1>
                    <h1 v-if="role(['professional administrator'])">Deletar pacientes</h1>
                </div>
                <div>
                    <!-- {{ $page.props }} -->
                </div>
            </div>
        </div>
    </div>
</template>