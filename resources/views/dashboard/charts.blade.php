@extends('dashboard.layouts.master')
@section('main-content')


    <div class="container">
        <h3 class="text-success mb-2">Teacher Courses</h3>
        <div class="row">
            <div class="col-12 col-md-8">
                <!-- Create a canvas element for Chart.js -->
                <canvas id="teachersBarChart" ></canvas>
            </div>
        </div>
    </div>
    <div class="container">
        <h3 class="text-success mb-2">Number Of Male And Female</h3>
        <div class="row">
            <div class="col-12 col-md-8">
                <!-- Create a canvas element for Chart.js -->
                <canvas id="genderChart"></canvas>
            </div>
        </div>
    </div>
    <!-- Include Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Get the data for the chart
        const teachersData = @json($topTeachers);

        // Prepare labels and data arrays for the Bar chart
        const labels = teachersData.map(teacher => teacher.name); // أسماء المعلمين
        const data = teachersData.map(teacher => teacher.courses_count); // عدد الكورسات لكل معلم

        // Create the Bar Chart
        const ctx = document.getElementById('teachersBarChart').getContext('2d');
        const teachersBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of Courses',
                    data: data,
                    backgroundColor: ['#FF5733', '#33FF57', '#3357FF', '#FF33A6', '#FFC300',
                        '#33FFF4'], // يمكنك إضافة ألوان مختلفة
                    borderColor: ['#FFFFFF'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' courses';
                            }
                        }
                    }
                }
            }
        });
        const ctx2 = document.getElementById('genderChart').getContext('2d');
        const genderChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['الذكور', 'الإناث'],
                datasets: [{
                    label: 'عدد',
                    data: [{{$female}}, {{$male}}], // عدد الذكور والإناث
                    backgroundColor: ['#36A2EB', '#FF6384']
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection
