import { Head } from "@inertiajs/react";
import { useEffect, useMemo, useState } from "react";
import {
  BarElement,
  CategoryScale,
  Chart as ChartJS,
  Legend,
  LinearScale,
  Tooltip,
} from "chart.js";
import { Bar } from "react-chartjs-2";

ChartJS.register(CategoryScale, LinearScale, BarElement, Tooltip, Legend);

type ChartResponse = {
  labels: string[];
  cpu: number[];
  mem: number[];
};

export default function Dashboard() {
  const [data, setData] = useState<ChartResponse | null>(null);

  useEffect(() => {
    fetch("/api/capacity/chart")
      .then((r) => r.json())
      .then(setData);
  }, []);

  const chartData = useMemo(() => {
    if (!data) return null;

    return {
      labels: data.labels,
      datasets: [
        { label: "CPU", data: data.cpu },
        { label: "MEM", data: data.mem },
      ],
    };
  }, [data]);

  return (
    <>
      <Head title="Cloud Capacity Teknovatus" />

      <div className="mx-auto max-w-5xl p-6">
        <div className="flex items-center justify-between">
          <h1 className="text-2xl font-semibold">Cloud Capacity Teknovatus</h1>

          <a
            href="/api/report/cloud-capacity"
            className="rounded-lg border px-4 py-2 text-sm hover:bg-gray-50"
          >
            Download Excel + Send Email
          </a>
        </div>

        <div className="mt-6 rounded-xl border p-4">
          {!chartData ? (
            <p className="text-sm text-gray-500">Loading chart...</p>
          ) : (
            <Bar
              data={chartData}
              options={{ responsive: true, scales: { y: { beginAtZero: true } } }}
            />
          )}
        </div>
      </div>
    </>
  );
}

// import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
// import AppLayout from '@/layouts/app-layout';
// import { dashboard } from '@/routes';
// import { type BreadcrumbItem } from '@/types';
// import { Head } from '@inertiajs/react';

// const breadcrumbs: BreadcrumbItem[] = [
//     {
//         title: 'Dashboard',
//         href: dashboard().url,
//     },
// ];

// export default function Dashboard() {
//     return (
//         <AppLayout breadcrumbs={breadcrumbs}>
//             <Head title="Dashboard" />
//             <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
//                 <div className="grid auto-rows-min gap-4 md:grid-cols-3">
//                     <div className="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
//                         <PlaceholderPattern className="absolute inset-0 size-full stroke-neutral-900/20 dark:stroke-neutral-100/20" />
//                     </div>
//                     <div className="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
//                         <PlaceholderPattern className="absolute inset-0 size-full stroke-neutral-900/20 dark:stroke-neutral-100/20" />
//                     </div>
//                     <div className="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
//                         <PlaceholderPattern className="absolute inset-0 size-full stroke-neutral-900/20 dark:stroke-neutral-100/20" />
//                     </div>
//                 </div>
//                 <div className="relative min-h-[100vh] flex-1 overflow-hidden rounded-xl border border-sidebar-border/70 md:min-h-min dark:border-sidebar-border">
//                     <PlaceholderPattern className="absolute inset-0 size-full stroke-neutral-900/20 dark:stroke-neutral-100/20" />
//                 </div>
//             </div>
//         </AppLayout>
//     );
// }
