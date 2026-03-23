<script setup lang="ts">
import { ref } from 'vue'
import {
  Card,
  CardContent,
  CardHeader,
  CardTitle,
} from '@/components/ui/card'

// Dummy data for banned users
const bannedUsers = ref([
  {
    id: 1,
    name: 'Marcus Thorne',
    initials: 'MT',
    reason: 'Spamming / Bot Activity',
    date: 'Banned 2 days ago',
    avatarBg: 'bg-gray-200 dark:bg-gray-800', 
    avatarText: 'text-gray-500 dark:text-gray-400',
  },
  {
    id: 2,
    name: 'Jenny Harkness',
    initials: 'JH',
    reason: 'Terms of Service Violation',
    date: 'Banned 1 week ago',
    avatarBg: 'bg-gray-200 dark:bg-gray-800',
    avatarText: 'text-gray-500 dark:text-gray-400',
  },
  {
    id: 3,
    name: 'Liam Chen',
    initials: 'LC',
    reason: 'Inappropriate Content',
    date: 'Banned 2 weeks ago',
    avatarBg: 'bg-gray-200 dark:bg-gray-800',
    avatarText: 'text-gray-500 dark:text-gray-400',
  },
  {
    id: 4,
    name: 'Anonymous User',
    initials: 'AU',
    reason: 'Multiple Accounts',
    date: 'Banned 1 month ago',
    avatarBg: 'bg-gray-200 dark:bg-gray-800',
    avatarText: 'text-gray-500 dark:text-gray-400',
  },
  {
    id: 5,
    name: 'Sophie Martin',
    initials: 'SM',
    reason: 'Harassment',
    date: 'Banned 2 months ago',
    avatarBg: 'bg-gray-200 dark:bg-gray-800',
    avatarText: 'text-gray-500 dark:text-gray-400',
  }
])
</script>

<template>
  <Card class="absolute inset-0 flex flex-col gap-0 border-none bg-transparent shadow-none rounded-none">
    
    <CardHeader class="pb-0">
      <CardTitle class="text-base font-semibold text-foreground">
        Banned Users
      </CardTitle>
    </CardHeader>

    <CardContent class="flex-1 overflow-y-auto px-6 pb-6 [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-gray-200 dark:[&::-webkit-scrollbar-thumb]:bg-gray-800">
      <ul class="flex flex-col gap-5">
        
        <li 
          v-for="user in bannedUsers" 
          :key="user.id" 
          class="flex items-center justify-between gap-4"
        >
          <div class="flex items-center gap-4 min-w-0">
            
            <div 
              class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full text-sm font-medium"
              :class="[user.avatarBg, user.avatarText]"
            >
              {{ user.initials }}
            </div>
            
            <div class="flex flex-col gap-1 min-w-0">
              <span class="truncate text-sm font-medium leading-none text-foreground line-through opacity-70">
                {{ user.name }}
              </span>
              <span class="truncate text-xs leading-none text-muted-foreground">
                <span class="font-medium text-red-500/80 dark:text-red-400/80">{{ user.reason }}</span> • {{ user.date }}
              </span>
            </div>

          </div>
        </li>

      </ul>
    </CardContent>
  </Card>
</template>