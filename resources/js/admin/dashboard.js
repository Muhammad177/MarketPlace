import Chart from 'chart.js/auto';

export function renderPostUserPieChart(postCount, userCount) {
    const canvas = document.getElementById('postUserPieChart');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Posts', 'Users'],
            datasets: [{
                label: 'Jumlah',
                data: [postCount, userCount],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 99, 132, 0.7)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    });
}

// Agar bisa dipanggil dari blade tanpa import, attach ke window
window.renderPostUserPieChart = renderPostUserPieChart;
