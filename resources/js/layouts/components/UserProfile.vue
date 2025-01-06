<script setup>
import { useAuthStore } from '@/stores/auth';
import axios from "axios";
import { PerfectScrollbar } from 'vue3-perfect-scrollbar';

const authStore = useAuthStore();
const router = useRouter()
const ability = useAbility()

// TODO: Get type from backend
const userData = authStore.getUserData();

// console.log(userData,authStore.getUserData());
//async
const logout = async () => {
  let id = authStore.getUserData();
  axios.get('/api/auth/logout', {
    user_id: id.id,
  }).then(async (response) => {

    authStore.logout();
    await router.push('/login')
    ability.update([])
  }).catch(error => {
    console.log(error)
  })
}
</script>

<template>
  <VBadge v-if="userData" dot bordered location="bottom right" offset-x="2" offset-y="2" color="success"
          class="user-profile-badge">
    <VAvatar class="cursor-pointer" size="38" :color="!(userData && userData.avatar) ? 'primary' : undefined"
             :variant="!(userData && userData.avatar) ? 'tonal' : undefined">
      <VImg v-if="userData && userData.avatar" :src="userData.avatar" />
      <VIcon v-else icon="ri-user-line" />


      <!-- SECTION Menu -->
      <VMenu activator="parent" width="230" location="bottom end" offset="15px">
        <VList>
          <VListItem class="px-4">
            <div class="d-flex gap-x-2 align-center">
              <VAvatar :color="!(userData && userData.avatar) ? 'primary' : undefined"
                       :variant="!(userData && userData.avatar) ? 'tonal' : undefined">
                <VImg v-if="userData && userData.avatar" :src="userData.avatar" />
                <VIcon v-else icon="ri-user-line" />
              </VAvatar>

              <div>
                <div class="text-body-2 font-weight-medium text-high-emphasis">
                  {{ userData.nombre || userData.username }}
                </div>
                <div class="text-capitalize text-caption text-disabled">
                  {{ userData.role }}
                </div>
              </div>
            </div>
          </VListItem>

          <PerfectScrollbar :options="{ wheelPropagation: false }">
            <VListItem class="px-4">
              <VBtn block color="error" size="small" append-icon="ri-logout-box-r-line" @click="logout">
                Cerrar sesión
              </VBtn>
            </VListItem>
          </PerfectScrollbar>
        </VList>
      </VMenu>
      <!-- !SECTION -->
    </VAvatar>
  </VBadge>
</template>

<style lang="scss">
.user-profile-badge {
  &.v-badge--bordered.v-badge--dot .v-badge__badge::after {
    color: rgb(var(--v-theme-background));
  }
}
</style>
