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

// Dummy data updated with 'visitors' representing landing page traffic
const chartData = [
  { date: new Date("2024-04-01"), visitors: 145, newUsers: 12 },
  { date: new Date("2024-04-02"), visitors: 160, newUsers: 15 },
  { date: new Date("2024-04-03"), visitors: 110, newUsers: 8 },
  { date: new Date("2024-04-04"), visitors: 210, newUsers: 22 },
  { date: new Date("2024-04-05"), visitors: 195, newUsers: 18 },
  { date: new Date("2024-04-06"), visitors: 260, newUsers: 25 },
  { date: new Date("2024-04-07"), visitors: 310, newUsers: 30 },
  { date: new Date("2024-04-08"), visitors: 150, newUsers: 14 },
  { date: new Date("2024-04-09"), visitors: 120, newUsers: 9 },
  { date: new Date("2024-04-10"), visitors: 135, newUsers: 11 },
  { date: new Date("2024-04-11"), visitors: 195, newUsers: 19 },
  { date: new Date("2024-04-12"), visitors: 230, newUsers: 24 },
  { date: new Date("2024-04-13"), visitors: 275, newUsers: 28 },
  { date: new Date("2024-04-14"), visitors: 165, newUsers: 16 },
  { date: new Date("2024-04-15"), visitors: 140, newUsers: 13 },
  { date: new Date("2024-04-16"), visitors: 155, newUsers: 15 },
  { date: new Date("2024-04-17"), visitors: 280, newUsers: 27 },
  { date: new Date("2024-04-18"), visitors: 340, newUsers: 32 },
  { date: new Date("2024-04-19"), visitors: 225, newUsers: 21 },
  { date: new Date("2024-04-20"), visitors: 115, newUsers: 10 },
  { date: new Date("2024-04-21"), visitors: 145, newUsers: 14 },
  { date: new Date("2024-04-22"), visitors: 190, newUsers: 18 },
  { date: new Date("2024-04-23"), visitors: 205, newUsers: 20 },
  { date: new Date("2024-04-24"), visitors: 295, newUsers: 29 },
  { date: new Date("2024-04-25"), visitors: 240, newUsers: 23 },
  { date: new Date("2024-04-26"), visitors: 85, newUsers: 7 },
  { date: new Date("2024-04-27"), visitors: 320, newUsers: 31 },
  { date: new Date("2024-04-28"), visitors: 135, newUsers: 12 },
  { date: new Date("2024-04-29"), visitors: 185, newUsers: 17 },
  { date: new Date("2024-04-30"), visitors: 360, newUsers: 35 },
  { date: new Date("2024-05-01"), visitors: 155, newUsers: 14 },
  { date: new Date("2024-05-02"), visitors: 230, newUsers: 22 },
  { date: new Date("2024-05-03"), visitors: 200, newUsers: 19 },
  { date: new Date("2024-05-04"), visitors: 295, newUsers: 28 },
  { date: new Date("2024-05-05"), visitors: 350, newUsers: 34 },
  { date: new Date("2024-05-06"), visitors: 320, newUsers: 31 },
  { date: new Date("2024-05-07"), visitors: 275, newUsers: 26 },
  { date: new Date("2024-05-08"), visitors: 125, newUsers: 11 },
  { date: new Date("2024-05-09"), visitors: 160, newUsers: 15 },
  { date: new Date("2024-05-10"), visitors: 210, newUsers: 20 },
  { date: new Date("2024-05-11"), visitors: 265, newUsers: 25 },
  { date: new Date("2024-05-12"), visitors: 145, newUsers: 13 },
  { date: new Date("2024-05-13"), visitors: 175, newUsers: 16 },
  { date: new Date("2024-05-14"), visitors: 300, newUsers: 29 },
  { date: new Date("2024-05-15"), visitors: 345, newUsers: 33 },
  { date: new Date("2024-05-16"), visitors: 255, newUsers: 24 },
  { date: new Date("2024-05-17"), visitors: 380, newUsers: 36 },
  { date: new Date("2024-05-18"), visitors: 220, newUsers: 21 },
  { date: new Date("2024-05-19"), visitors: 160, newUsers: 15 },
  { date: new Date("2024-05-20"), visitors: 135, newUsers: 12 },
  { date: new Date("2024-05-21"), visitors: 95, newUsers: 8 },
  { date: new Date("2024-05-22"), visitors: 70, newUsers: 6 },
  { date: new Date("2024-05-23"), visitors: 195, newUsers: 18 },
  { date: new Date("2024-05-24"), visitors: 230, newUsers: 22 },
  { date: new Date("2024-05-25"), visitors: 175, newUsers: 16 },
  { date: new Date("2024-05-26"), visitors: 150, newUsers: 14 },
  { date: new Date("2024-05-27"), visitors: 290, newUsers: 28 },
  { date: new Date("2024-05-28"), visitors: 200, newUsers: 19 },
  { date: new Date("2024-05-29"), visitors: 65, newUsers: 5 },
  { date: new Date("2024-05-30"), visitors: 255, newUsers: 24 },
  { date: new Date("2024-05-31"), visitors: 140, newUsers: 13 },
  { date: new Date("2024-06-01"), visitors: 160, newUsers: 15 },
  { date: new Date("2024-06-02"), visitors: 335, newUsers: 32 },
  { date: new Date("2024-06-03"), visitors: 105, newUsers: 9 },
  { date: new Date("2024-06-04"), visitors: 285, newUsers: 27 },
  { date: new Date("2024-06-05"), visitors: 75, newUsers: 6 },
  { date: new Date("2024-06-06"), visitors: 225, newUsers: 21 },
  { date: new Date("2024-06-07"), visitors: 250, newUsers: 24 },
  { date: new Date("2024-06-08"), visitors: 300, newUsers: 29 },
  { date: new Date("2024-06-09"), visitors: 360, newUsers: 35 },
  { date: new Date("2024-06-10"), visitors: 130, newUsers: 12 },
  { date: new Date("2024-06-11"), visitors: 85, newUsers: 7 },
  { date: new Date("2024-06-12"), visitors: 395, newUsers: 38 },
  { date: new Date("2024-06-13"), visitors: 70, newUsers: 6 },
  { date: new Date("2024-06-14"), visitors: 325, newUsers: 31 },
  { date: new Date("2024-06-15"), visitors: 235, newUsers: 22 },
  { date: new Date("2024-06-16"), visitors: 295, newUsers: 28 },
  { date: new Date("2024-06-17"), visitors: 355, newUsers: 34 },
  { date: new Date("2024-06-18"), visitors: 95, newUsers: 8 },
  { date: new Date("2024-06-19"), visitors: 275, newUsers: 26 },
  { date: new Date("2024-06-20"), visitors: 315, newUsers: 30 },
  { date: new Date("2024-06-21"), visitors: 155, newUsers: 14 },
  { date: new Date("2024-06-22"), visitors: 240, newUsers: 23 },
  { date: new Date("2024-06-23"), visitors: 410, newUsers: 39 },
  { date: new Date("2024-06-24"), visitors: 115, newUsers: 10 },
  { date: new Date("2024-06-25"), visitors: 125, newUsers: 11 },
  { date: new Date("2024-06-26"), visitors: 335, newUsers: 32 },
  { date: new Date("2024-06-27"), visitors: 365, newUsers: 35 },
  { date: new Date("2024-06-28"), visitors: 135, newUsers: 12 },
  { date: new Date("2024-06-29"), visitors: 95, newUsers: 8 },
  { date: new Date("2024-06-30"), visitors: 345, newUsers: 33 },
];
type Data = typeof chartData[number]

const chartConfig = {
  newUsers: {
    label: "New Users",
    color: "var(--chart-1)",
  },
  visitors: {
    label: "Landing Page Visitors",
    color: "var(--chart-2)",
  },
} satisfies ChartConfig

const svgDefs = `
  <linearGradient id="fillNewUsers" x1="0" y1="0" x2="0" y2="1">
    <stop offset="5%" stop-color="var(--color-newUsers)" stop-opacity="0.8" />
    <stop offset="95%" stop-color="var(--color-newUsers)" stop-opacity="0.1" />
  </linearGradient>
  <linearGradient id="fillVisitors" x1="0" y1="0" x2="0" y2="1">
    <stop offset="5%" stop-color="var(--color-visitors)" stop-opacity="0.8" />
    <stop offset="95%" stop-color="var(--color-visitors)" stop-opacity="0.1" />
  </linearGradient>
`

const timeRange = ref("7d");
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
        <CardTitle>Traffic & Growth</CardTitle>
        <CardDescription>
          Showing landing page visitors vs. new user registrations
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
            :y="[(d: Data) => d.newUsers, (d: Data) => d.visitors]"
            :color="(d: Data, i: number) => ['url(#fillNewUsers)', 'url(#fillVisitors)'][i]"
            :opacity="0.6"
          />
          <VisLine
            :x="(d: Data) => d.date"
            :y="[(d: Data) => d.newUsers, (d: Data) => d.newUsers + d.visitors]"
            :color="(d: Data, i: number) => [chartConfig.newUsers.color, chartConfig.visitors.color][i]"
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
            :color="(d: Data, i: number) => [chartConfig.newUsers.color, chartConfig.visitors.color][i % 2]"
          />
        </VisXYContainer>

        <ChartLegendContent />
      </ChartContainer>
    </CardContent>
  </Card>
</template>