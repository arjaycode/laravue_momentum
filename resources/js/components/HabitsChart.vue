<script setup lang="ts">
import { computed, ref } from "vue"
import type { ChartConfig } from "@/components/ui/chart"

import { VisArea, VisAxis, VisLine, VisXYContainer } from "@unovis/vue"
import {
  Card,
  CardContent,
  CardDescription,
  CardHeader,
  CardTitle,
} from "@/components/ui/card"
import {
  ChartContainer,
  ChartCrosshair,
  ChartLegendContent,
  ChartTooltip,
  ChartTooltipContent,
  componentToString,
} from "@/components/ui/chart"
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "@/components/ui/select"

// Updated data with completed, missed, and newly created habits
const chartData = [
  { date: new Date("2024-04-01"), completed: 7, missed: 2, created: 2 },
  { date: new Date("2024-04-02"), completed: 5, missed: 3, created: 0 },
  { date: new Date("2024-04-03"), completed: 6, missed: 1, created: 1 },
  { date: new Date("2024-04-04"), completed: 8, missed: 2, created: 0 },
  { date: new Date("2024-04-05"), completed: 9, missed: 0, created: 0 },
  { date: new Date("2024-04-06"), completed: 8, missed: 1, created: 1 },
  { date: new Date("2024-04-07"), completed: 7, missed: 2, created: 0 },
  { date: new Date("2024-04-08"), completed: 10, missed: 0, created: 3 },
  { date: new Date("2024-04-09"), completed: 3, missed: 5, created: 0 },
  { date: new Date("2024-04-10"), completed: 6, missed: 2, created: 1 },
  { date: new Date("2024-04-11"), completed: 8, missed: 1, created: 0 },
  { date: new Date("2024-04-12"), completed: 7, missed: 3, created: 0 },
  { date: new Date("2024-04-13"), completed: 9, missed: 0, created: 2 },
  { date: new Date("2024-04-14"), completed: 4, missed: 4, created: 0 },
  { date: new Date("2024-04-15"), completed: 5, missed: 3, created: 1 },
  { date: new Date("2024-04-16"), completed: 5, missed: 2, created: 0 },
  { date: new Date("2024-04-17"), completed: 9, missed: 1, created: 0 },
  { date: new Date("2024-04-18"), completed: 8, missed: 2, created: 1 },
  { date: new Date("2024-04-19"), completed: 6, missed: 1, created: 0 },
  { date: new Date("2024-04-20"), completed: 3, missed: 4, created: 0 },
  { date: new Date("2024-04-21"), completed: 4, missed: 3, created: 2 },
  { date: new Date("2024-04-22"), completed: 6, missed: 2, created: 0 },
  { date: new Date("2024-04-23"), completed: 5, missed: 3, created: 1 },
  { date: new Date("2024-04-24"), completed: 9, missed: 0, created: 0 },
  { date: new Date("2024-04-25"), completed: 7, missed: 2, created: 0 },
  { date: new Date("2024-04-26"), completed: 2, missed: 6, created: 1 },
  { date: new Date("2024-04-27"), completed: 9, missed: 1, created: 0 },
  { date: new Date("2024-04-28"), completed: 4, missed: 4, created: 0 },
  { date: new Date("2024-04-29"), completed: 7, missed: 1, created: 2 },
  { date: new Date("2024-04-30"), completed: 10, missed: 0, created: 0 },
  { date: new Date("2024-05-01"), completed: 5, missed: 3, created: 1 },
  { date: new Date("2024-05-02"), completed: 8, missed: 1, created: 0 },
  { date: new Date("2024-05-03"), completed: 6, missed: 2, created: 0 },
  { date: new Date("2024-05-04"), completed: 9, missed: 0, created: 1 },
  { date: new Date("2024-05-05"), completed: 10, missed: 0, created: 0 },
  { date: new Date("2024-05-06"), completed: 9, missed: 1, created: 2 },
  { date: new Date("2024-05-07"), completed: 8, missed: 2, created: 0 },
  { date: new Date("2024-05-08"), completed: 4, missed: 3, created: 0 },
  { date: new Date("2024-05-09"), completed: 6, missed: 2, created: 1 },
  { date: new Date("2024-05-10"), completed: 7, missed: 1, created: 0 },
  { date: new Date("2024-05-11"), completed: 8, missed: 1, created: 0 },
  { date: new Date("2024-05-12"), completed: 5, missed: 3, created: 1 },
  { date: new Date("2024-05-13"), completed: 5, missed: 4, created: 0 },
  { date: new Date("2024-05-14"), completed: 9, missed: 0, created: 3 },
  { date: new Date("2024-05-15"), completed: 10, missed: 0, created: 0 },
  { date: new Date("2024-05-16"), completed: 8, missed: 2, created: 1 },
  { date: new Date("2024-05-17"), completed: 10, missed: 0, created: 0 },
  { date: new Date("2024-05-18"), completed: 7, missed: 1, created: 0 },
  { date: new Date("2024-05-19"), completed: 6, missed: 2, created: 2 },
  { date: new Date("2024-05-20"), completed: 4, missed: 3, created: 0 },
  { date: new Date("2024-05-21"), completed: 2, missed: 5, created: 0 },
  { date: new Date("2024-05-22"), completed: 2, missed: 6, created: 1 },
  { date: new Date("2024-05-23"), completed: 7, missed: 1, created: 0 },
  { date: new Date("2024-05-24"), completed: 8, missed: 2, created: 0 },
  { date: new Date("2024-05-25"), completed: 6, missed: 3, created: 1 },
  { date: new Date("2024-05-26"), completed: 5, missed: 2, created: 0 },
  { date: new Date("2024-05-27"), completed: 9, missed: 0, created: 2 },
  { date: new Date("2024-05-28"), completed: 6, missed: 2, created: 0 },
  { date: new Date("2024-05-29"), completed: 2, missed: 5, created: 0 },
  { date: new Date("2024-05-30"), completed: 8, missed: 1, created: 1 },
  { date: new Date("2024-05-31"), completed: 4, missed: 3, created: 0 },
  { date: new Date("2024-06-01"), completed: 5, missed: 2, created: 1 },
  { date: new Date("2024-06-02"), completed: 10, missed: 0, created: 0 },
  { date: new Date("2024-06-03"), completed: 3, missed: 4, created: 0 },
  { date: new Date("2024-06-04"), completed: 9, missed: 1, created: 2 },
  { date: new Date("2024-06-05"), completed: 2, missed: 5, created: 0 },
  { date: new Date("2024-06-06"), completed: 7, missed: 1, created: 1 },
  { date: new Date("2024-06-07"), completed: 8, missed: 2, created: 0 },
  { date: new Date("2024-06-08"), completed: 9, missed: 1, created: 0 },
  { date: new Date("2024-06-09"), completed: 10, missed: 0, created: 1 },
  { date: new Date("2024-06-10"), completed: 4, missed: 3, created: 0 },
  { date: new Date("2024-06-11"), completed: 2, missed: 6, created: 0 },
  { date: new Date("2024-06-12"), completed: 10, missed: 0, created: 3 },
  { date: new Date("2024-06-13"), completed: 2, missed: 5, created: 0 },
  { date: new Date("2024-06-14"), completed: 9, missed: 1, created: 1 },
  { date: new Date("2024-06-15"), completed: 8, missed: 2, created: 0 },
  { date: new Date("2024-06-16"), completed: 9, missed: 0, created: 0 },
  { date: new Date("2024-06-17"), completed: 10, missed: 0, created: 2 },
  { date: new Date("2024-06-18"), completed: 3, missed: 4, created: 0 },
  { date: new Date("2024-06-19"), completed: 8, missed: 1, created: 0 },
  { date: new Date("2024-06-20"), completed: 9, missed: 0, created: 1 },
  { date: new Date("2024-06-21"), completed: 4, missed: 3, created: 0 },
  { date: new Date("2024-06-22"), completed: 8, missed: 2, created: 0 },
  { date: new Date("2024-06-23"), completed: 10, missed: 0, created: 1 },
  { date: new Date("2024-06-24"), completed: 3, missed: 5, created: 0 },
  { date: new Date("2024-06-25"), completed: 4, missed: 4, created: 2 },
  { date: new Date("2024-06-26"), completed: 9, missed: 1, created: 0 },
  { date: new Date("2024-06-27"), completed: 10, missed: 0, created: 0 },
  { date: new Date("2024-06-28"), completed: 4, missed: 3, created: 1 },
  { date: new Date("2024-06-29"), completed: 3, missed: 4, created: 0 },
  { date: new Date("2024-06-30"), completed: 9, missed: 1, created: 0 },
];
type Data = typeof chartData[number]

// Added 'created' to the Chart Config
const chartConfig = {
  completed: {
    label: "Completed",
    color: "var(--chart-1)",
  },
  missed: {
    label: "Missed",
    color: "var(--chart-2)",
  },
  created: {
    label: "Created",
    color: "var(--chart-3)",
  },
} satisfies ChartConfig

// Added gradient for 'created'
const svgDefs = `
  <linearGradient id="fillCompleted" x1="0" y1="0" x2="0" y2="1">
    <stop offset="5%" stop-color="var(--color-completed)" stop-opacity="0.8" />
    <stop offset="95%" stop-color="var(--color-completed)" stop-opacity="0.1" />
  </linearGradient>
  <linearGradient id="fillMissed" x1="0" y1="0" x2="0" y2="1">
    <stop offset="5%" stop-color="var(--color-missed)" stop-opacity="0.8" />
    <stop offset="95%" stop-color="var(--color-missed)" stop-opacity="0.1" />
  </linearGradient>
  <linearGradient id="fillCreated" x1="0" y1="0" x2="0" y2="1">
    <stop offset="5%" stop-color="var(--color-created)" stop-opacity="0.8" />
    <stop offset="95%" stop-color="var(--color-created)" stop-opacity="0.1" />
  </linearGradient>
`

const timeRange = ref("30d"); // Keeps the 7 days default
const filterRange = computed(() => {
  return chartData.filter((item) => {
    const date = new Date(item.date)
    const referenceDate = new Date("2024-06-30")
    let daysToSubtract = 90
    if (timeRange.value === "30d") {
      daysToSubtract = 30
    }
    else if (timeRange.value === "7d") {
      daysToSubtract = 7
    }
    const startDate = new Date(referenceDate)
    startDate.setDate(startDate.getDate() - daysToSubtract)
    return date >= startDate
  })
})
</script>

<template>
  <Card class="absolute inset-0 flex flex-col border-none bg-transparent shadow-none rounded-none">
    
    <CardHeader class="flex flex-row items-start justify-between space-y-0 pb-4 sm:items-center">
      <div class="grid flex-1 gap-1">
        <CardTitle>Habit Tracker</CardTitle>
        <CardDescription>
          Showing habit activity
        </CardDescription>
      </div>
      <Select v-model="timeRange">
        <SelectTrigger
          class="hidden w-[160px] rounded-lg sm:ml-auto sm:flex"
          aria-label="Select a value"
        >
          <SelectValue placeholder="Last 7 days" />
        </SelectTrigger>
        <SelectContent class="rounded-xl">
          <SelectItem value="90d" class="rounded-lg">
            Last 3 months
          </SelectItem>
          <SelectItem value="30d" class="rounded-lg">
            Last 30 days
          </SelectItem>
          <SelectItem value="7d" class="rounded-lg">
            Last 7 days
          </SelectItem>
        </SelectContent>
      </Select>
    </CardHeader>

    <CardContent class="flex-1 min-h-0 px-5 pb-5">
      <ChartContainer :config="chartConfig" class="h-full w-full" :cursor="false">
        <VisXYContainer
          :data="filterRange"
          :svg-defs="svgDefs"
          :margin="{ left: -40 }"
        >
          <VisArea
            :x="(d: Data) => d.date"
            :y="[(d: Data) => d.missed, (d: Data) => d.completed, (d: Data) => d.created]"
            :color="(d: Data, i: number) => ['url(#fillMissed)', 'url(#fillCompleted)', 'url(#fillCreated)'][i]"
            :opacity="0.6"
          />
          <VisLine
            :x="(d: Data) => d.date"
            :y="[
              (d: Data) => d.missed, 
              (d: Data) => d.missed + d.completed, 
              (d: Data) => d.missed + d.completed + d.created
            ]"
            :color="(d: Data, i: number) => [chartConfig.missed.color, chartConfig.completed.color, chartConfig.created.color][i]"
            :line-width="2"
          />
          <VisAxis
            type="x"
            :x="(d: Data) => d.date"
            :tick-line="false"
            :domain-line="false"
            :grid-line="false"
            :num-ticks="6"
            :tick-format="(d: number, index: number) => {
              const date = new Date(d)
              return date.toLocaleDateString('en-US', {
                month: 'short',
                day: 'numeric',
              })
            }"
          />
          <VisAxis
            type="y"
            :num-ticks="4"
            :tick-line="false"
            :domain-line="false"
          />
          <ChartTooltip />
          <ChartCrosshair
            :template="componentToString(chartConfig, ChartTooltipContent, {
              labelFormatter: (d) => {
                return new Date(d).toLocaleDateString('en-US', {
                  month: 'short',
                  day: 'numeric',
                })
              },
            })"
            :color="(d: Data, i: number) => [chartConfig.missed.color, chartConfig.completed.color, chartConfig.created.color][i % 3]"
          />
        </VisXYContainer>

        <ChartLegendContent />
      </ChartContainer>
    </CardContent>
  </Card>
</template>