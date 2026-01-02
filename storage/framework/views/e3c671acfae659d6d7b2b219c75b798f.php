<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'chartId' => 'attendance-bar-chart',
    'labels' => [],
    'datasets' => [],
    'stacked' => true,
    'title' => null,
    'height' => '300px',
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'chartId' => 'attendance-bar-chart',
    'labels' => [],
    'datasets' => [],
    'stacked' => true,
    'title' => null,
    'height' => '300px',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div
    id="<?php echo e($chartId); ?>-container"
    x-data="{ 
        chart: null,
        initChart() {
            const canvas = this.$refs.canvas;
            if (!canvas || typeof Chart === 'undefined') {
                setTimeout(() => this.initChart(), 50);
                return;
            }
            
            // Destroy any existing chart on this canvas
            const existing = Chart.getChart(canvas);
            if (existing) existing.destroy();
            
            const isDark = document.documentElement.classList.contains('dark');
            const textColor = isDark ? 'rgb(148, 163, 184)' : 'rgb(71, 85, 105)';
            const gridColor = isDark ? 'rgba(148, 163, 184, 0.1)' : 'rgba(0, 0, 0, 0.05)';
            
            this.chart = new Chart(canvas.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: <?php echo e(Js::from($labels)); ?>,
                    datasets: <?php echo e(Js::from($datasets)); ?>

                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                            backgroundColor: isDark ? 'rgb(30, 41, 59)' : 'rgb(255, 255, 255)',
                            titleColor: isDark ? 'rgb(226, 232, 240)' : 'rgb(15, 23, 42)',
                            bodyColor: isDark ? 'rgb(148, 163, 184)' : 'rgb(71, 85, 105)',
                            borderColor: isDark ? 'rgb(51, 65, 85)' : 'rgb(226, 232, 240)',
                            borderWidth: 1,
                            padding: 12,
                            boxPadding: 6,
                            callbacks: {
                                label: function(context) {
                                    const label = context.dataset.label || '';
                                    const value = context.parsed.y || 0;
                                    const total = context.chart.data.datasets.reduce((sum, ds) => {
                                        return sum + (ds.data[context.dataIndex] || 0);
                                    }, 0);
                                    const percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                                    return `${label}: ${value.toFixed(2)} (${percentage}%)`;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            stacked: <?php echo e($stacked ? 'true' : 'false'); ?>,
                            grid: { display: false },
                            ticks: { color: textColor, font: { size: 11 } }
                        },
                        y: {
                            stacked: <?php echo e($stacked ? 'true' : 'false'); ?>,
                            beginAtZero: true,
                            grid: { color: gridColor },
                            ticks: { 
                                color: textColor, 
                                font: { size: 11 },
                                precision: 0,
                                stepSize: 1
                            }
                        }
                    },
                    interaction: { mode: 'index', intersect: false }
                }
            });
        }
    }"
    x-init="$nextTick(() => initChart())"
    x-on:livewire:navigating.window="if(chart) chart.destroy()"
    class="w-full"
    style="height: <?php echo e($height); ?>;"
    wire:key="bar-<?php echo e($chartId); ?>"
>
    <canvas x-ref="canvas"></canvas>
</div>
<?php /**PATH C:\Users\Marc Ian C. Young\laravel\fceerguildweb\resources\views/components/attendance-chart-bar.blade.php ENDPATH**/ ?>