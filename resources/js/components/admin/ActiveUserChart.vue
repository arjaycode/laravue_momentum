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

const chartData = [
  { date: new Date("2024-04-01"), activeUsers: 145 },
  { date: new Date("2024-04-02"), activeUsers: 152 },
  { date: new Date("2024-04-03"), activeUsers: 138 },
  { date: new Date("2024-04-04"), activeUsers: 165 },
  { date: new Date("2024-04-05"), activeUsers: 172 },
  { date: new Date("2024-04-06"), activeUsers: 190 },
  { date: new Date("2024-04-07"), activeUsers: 185 },
  { date: new Date("2024-04-08"), activeUsers: 150 },
  { date: new Date("2024-04-09"), activeUsers: 142 },
  { date: new Date("2024-04-10"), activeUsers: 148 },
  { date: new Date("2024-04-11"), activeUsers: 160 },
  { date: new Date("2024-04-12"), activeUsers: 175 },
  { date: new Date("2024-04-13"), activeUsers: 195 },
  { date: new Date("2024-04-14"), activeUsers: 188 },
  { date: new Date("2024-04-15"), activeUsers: 155 },
  { date: new Date("2024-04-16"), activeUsers: 162 },
  { date: new Date("2024-04-17"), activeUsers: 168 },
  { date: new Date("2024-04-18"), activeUsers: 172 },
  { date: new Date("2024-04-19"), activeUsers: 180 },
  { date: new Date("2024-04-20"), activeUsers: 210 },
  { date: new Date("2024-04-21"), activeUsers: 205 },
  { date: new Date("2024-04-22"), activeUsers: 165 },
  { date: new Date("2024-04-23"), activeUsers: 170 },
  { date: new Date("2024-04-24"), activeUsers: 178 },
  { date: new Date("2024-04-25"), activeUsers: 185 },
  { date: new Date("2024-04-26"), activeUsers: 192 },
  { date: new Date("2024-04-27"), activeUsers: 220 },
  { date: new Date("2024-04-28"), activeUsers: 215 },
  { date: new Date("2024-04-29"), activeUsers: 180 },
  { date: new Date("2024-04-30"), activeUsers: 185 },
  { date: new Date("2024-05-01"), activeUsers: 190 },
  { date: new Date("2024-05-02"), activeUsers: 195 },
  { date: new Date("2024-05-03"), activeUsers: 200 },
  { date: new Date("2024-05-04"), activeUsers: 230 },
  { date: new Date("2024-05-05"), activeUsers: 225 },
  { date: new Date("2024-05-06"), activeUsers: 185 },
  { date: new Date("2024-05-07"), activeUsers: 192 },
  { date: new Date("2024-05-08"), activeUsers: 188 },
  { date: new Date("2024-05-09"), activeUsers: 195 },
  { date: new Date("2024-05-10"), activeUsers: 205 },
  { date: new Date("2024-05-11"), activeUsers: 240 },
  { date: new Date("2024-05-12"), activeUsers: 235 },
  { date: new Date("2024-05-13"), activeUsers: 198 },
  { date: new Date("2024-05-14"), activeUsers: 202 },
  { date: new Date("2024-05-15"), activeUsers: 210 },
  { date: new Date("2024-05-16"), activeUsers: 215 },
  { date: new Date("2024-05-17"), activeUsers: 225 },
  { date: new Date("2024-05-18"), activeUsers: 250 },
  { date: new Date("2024-05-19"), activeUsers: 245 },
  { date: new Date("2024-05-20"), activeUsers: 205 },
  { date: new Date("2024-05-21"), activeUsers: 210 },
  { date: new Date("2024-05-22"), activeUsers: 218 },
  { date: new Date("2024-05-23"), activeUsers: 220 },
  { date: new Date("2024-05-24"), activeUsers: 230 },
  { date: new Date("2024-05-25"), activeUsers: 260 },
  { date: new Date("2024-05-26"), activeUsers: 255 },
  { date: new Date("2024-05-27"), activeUsers: 215 },
  { date: new Date("2024-05-28"), activeUsers: 220 },
  { date: new Date("2024-05-29"), activeUsers: 225 },
  { date: new Date("2024-05-30"), activeUsers: 235 },
  { date: new Date("2024-05-31"), activeUsers: 240 },
  { date: new Date("2024-06-01"), activeUsers: 270 },
  { date: new Date("2024-06-02"), activeUsers: 265 },
  { date: new Date("2024-06-03"), activeUsers: 225 },
  { date: new Date("2024-06-04"), activeUsers: 230 },
  { date: new Date("2024-06-05"), activeUsers: 235 },
  { date: new Date("2024-06-06"), activeUsers: 245 },
  { date: new Date("2024-06-07"), activeUsers: 255 },
  { date: new Date("2024-06-08"), activeUsers: 280 },
  { date: new Date("2024-06-09"), activeUsers: 275 },
  { date: new Date("2024-06-10"), activeUsers: 235 },
  { date: new Date("2024-06-11"), activeUsers: 240 },
  { date: new Date("2024-06-12"), activeUsers: 250 },
  { date: new Date("2024-06-13"), activeUsers: 255 },
  { date: new Date("2024-06-14"), activeUsers: 265 },
  { date: new Date("2024-06-15"), activeUsers: 290 },
  { date: new Date("2024-06-16"), activeUsers: 285 },
  { date: new Date("2024-06-17"), activeUsers: 245 },
  { date: new Date("2024-06-18"), activeUsers: 250 },
  { date: new Date("2024-06-19"), activeUsers: 260 },
  { date: new Date("2024-06-20"), activeUsers: 270 },
  { date: new Date("2024-06-21"), activeUsers: 280 },
  { date: new Date("2024-06-22"), activeUsers: 300 },
  { date: new Date("2024-06-23"), activeUsers: 295 },
  { date: new Date("2024-06-24"), activeUsers: 255 },
  { date: new Date("2024-06-25"), activeUsers: 260 },
  { date: new Date("2024-06-26"), activeUsers: 275 },
  { date: new Date("2024-06-27"), activeUsers: 285 },
  { date: new Date("2024-06-28"), activeUsers: 290 },
  { date: new Date("2024-06-29"), activeUsers: 310 },
  { date: new Date("2024-06-30"), activeUsers: 305 },
];
type Data = typeof chartData[number]

const chartConfig = {
  activeUsers: {
    label: "Active Users",
    color: "var(--chart-1)",
  },
} satisfies ChartConfig

const svgDefs = `
  <linearGradient id="fillActiveUsers" x1="0" y1="0" x2="0" y2="1">
    <stop
      offset="5%"
      stop-color="var(--color-activeUsers)"
      stop-opacity="0.8"
    />
    <stop
      offset="95%"
      stop-color="var(--color-activeUsers)"
      stop-opacity="0.1"
    />
  </linearGradient>
`

const timeRange = ref("7d"); // Default to 7 days
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
        <CardTitle>Active Sessions</CardTitle>
        <CardDescription>
          Average users in session per day
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
            :y="[(d: Data) => d.activeUsers]"
            :color="() => 'url(#fillActiveUsers)'"
            :opacity="0.6"
          />
          <VisLine
            :x="(d: Data) => d.date"
            :y="[(d: Data) => d.activeUsers]"
            :color="() => chartConfig.activeUsers.color"
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
            :color="() => chartConfig.activeUsers.color"
          />
        </VisXYContainer>

        <ChartLegendContent />
      </ChartContainer>
    </CardContent>
  </Card>
</template>