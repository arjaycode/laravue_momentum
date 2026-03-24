<script setup lang="ts">
import { ref } from 'vue'
import {
  Card,
  CardContent,
  CardHeader,
  CardTitle,
} from '@/components/ui/card'

interface Props {
    recent_users: Object[];
}

const props = defineProps<Props>();

console.log(props.recent_users);
// Dummy data based on your screenshot
// const recentUsers = ref([
//   {
//     id: 1,
//     name: 'Arjay Aranas',
//     initials: 'AA',
//     joined: 'Joined 6 days ago',
//     isOnline: true,
//     avatarBg: 'bg-[#ffdca8]', 
//     avatarText: 'text-[#1a1a1a]',
//   },
//   {
//     id: 2,
//     name: 'Sarah Jenkins',
//     initials: 'SJ',
//     joined: 'Joined 1 week ago',
//     isOnline: false,
//     avatarBg: 'bg-blue-200',
//     avatarText: 'text-blue-900',
//   },
//   {
//     id: 3,
//     name: 'Michael Chen',
//     initials: 'MC',
//     joined: 'Joined 2 weeks ago',
//     isOnline: true,
//     avatarBg: 'bg-emerald-200',
//     avatarText: 'text-emerald-900',
//   },
//   {
//     id: 4,
//     name: 'Elena Rodriguez',
//     initials: 'ER',
//     joined: 'Joined 1 month ago',
//     isOnline: false,
//     avatarBg: 'bg-purple-200',
//     avatarText: 'text-purple-900',
//   },
//   {
//     id: 5,
//     name: 'David Kim',
//     initials: 'DK',
//     joined: 'Joined 1 month ago',
//     isOnline: true,
//     avatarBg: 'bg-rose-200',
//     avatarText: 'text-rose-900',
//   }
// ])
</script>

<template>
  <Card class="absolute inset-0 flex flex-col gap-0 border-none bg-transparent shadow-none rounded-none">
    
    <CardHeader class="pb-0">
      <CardTitle class="text-base font-semibold text-foreground">
        Recent Users
      </CardTitle>
    </CardHeader>

    <CardContent class="flex-1 overflow-y-auto px-6 pb-6 [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-gray-200 dark:[&::-webkit-scrollbar-thumb]:bg-gray-800">
      <ul class="flex flex-col gap-5">
        
        <li 
          v-for="user, index in recent_users" 
          :key="index" 
          class="flex items-center justify-between"
        >
          <div class="flex items-center gap-4">
            
            <div 
              class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full text-sm font-medium"
              :class="[user.avatarBg, user.avatarText]"
            >
              {{ user.name.split()[0][0]}}
            </div>
            
            <div class="flex flex-col gap-0.5">
              <span class="text-sm font-medium leading-none text-foreground">
                {{ user.name }}
              </span>
              <span class="text-sm leading-none text-muted-foreground">
                {{ user.created_at }}
              </span>
            </div>

          </div>

          <div 
            v-if="user.isOnline" 
            class="h-2.5 w-2.5 shrink-0 rounded-full bg-emerald-500"
            aria-label="Online"
          ></div>

        </li>

      </ul>
    </CardContent>
  </Card>
</template>