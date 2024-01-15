<!DOCTYPE html>
<html>
<head>
    <title>Detail</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* スタイルはここに記述 */
        /* 戻るボタンのスタイル */
        .back-button {
            margin-top: 10px;
            padding: 8px 16px;
            font-size: 14px;
            cursor: pointer;
            background-color: #27acd9;
            color: #fff;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #1f82a6;
        }

        /* レイアウト設定 */
        .container {
            display: flex;
            height: 100vh;
        }

        .left-section {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .left-top {
            flex: 1;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        .left-bottom {
            flex: 1;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .right-section {
            flex: 2;
            display: flex;
            flex-direction: column;
            margin-left: 10px;
        }

        .right-item {
            flex: 1;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
        /* チャートコンテナのスタイル */
        /* チャートコンテナのスタイル */
        .chart-container {
            width: 200px; /* 幅を固定 */
            height: 200px; /* 高さを固定 */
            border: 1px solid #ccc;
            padding: 10px;
            position: relative;
        }

        /* canvas要素のスタイル */
        canvas {
            width: 10%; /* 幅を100%に設定 */
            height: 10%; /* 高さを100%に設定 */
        }

    </style>
</head>
<body>
<div class="container">
    <button class="back-button" onclick="window.location.href='{{ route('dashboard') }}';">◀</button>
    <div class="left-section">
        <div class="left-top">
            <h2>Problem</h2>
            <p>{{ $data->problem }}</p>
            <h2>Solution</h2>
            <p>{{ $data->solution }}</p>
        </div>

        <div class="left-bottom">
            <h2>Scores</h2>
            <canvas id="radarChart"></canvas>
            <p>Total Score: {{ $data->evidence + $data->impact + $data->possible }}</p>
        </div>

    </div>
    <div class="right-section">
        <div class="right-item">
            <h2>Evidence Detail</h2>
            <p>{{$data->evidence_justification}}</p>
            @if($data->evidence_detail)
{{--                <p>{{$data->evidence_detail}}</p>--}}
                @foreach (json_decode($data->evidence_detail) as $detail)
                    <p>・{{ $detail }}</p>
                @endforeach
            @endif


        </div>
        <div class="right-item">
            <h2>Acceptance Detail</h2>
            <p>{{$data->possible_justification}}</p>
            @if($data->possible_detail)
{{--                <p>{{$data->possible_detail}}</p>--}}
                @foreach (json_decode($data->possible_detail) as $detail)
                    <p>・{{ $detail }}</p>
                @endforeach
            @endif

        </div>
        <div class="right-item">
            <h2>Impact Detail</h2>
            <p>{{$data->impact_justification}}</p>
            @if($data->impact_detail)
{{--                <p>{{$data->impact_detail}}</p>--}}
                @foreach (json_decode($data->impact_detail) as $detail)
                    <p>・{{ $detail }}</p>
                @endforeach
            @endif
        </div>
        <button id="generateButton" class="back-button" onclick="">Generate</button>
    </div>
</div>

<script>
    // データ
    const data = {
        labels: ['Evidence', 'Impact', 'Possible'],
        datasets: [{
            label: 'Scores',
            data: [{{ $data->evidence }}, {{ $data->impact }}, {{ $data->possible }}],
            backgroundColor: 'rgba(39, 172, 217, 0.2)',
            borderColor: 'rgba(39, 172, 217, 1)',
            borderWidth: 2
        }]
    };

    // オプション
    const options = {
        scale: {
            r: {
                min: 0, // 最小値
                suggestedMin: 0, // 最小値を0に固定
                max: 10, // 最大値
                stepSize: 2 // ステップ
            }
        }
    };

    // チャートを描画
    const ctx = document.getElementById('radarChart').getContext('2d');
    const myRadarChart = new Chart(ctx, {
        type: 'radar',
        data: data,
        options: options
    });

    document.getElementById('generateButton').addEventListener('click', function() {
        // データを使用してリダイレクト
        const api_key = getCookie('api_key');
        const id = @json($data->id);
        const problem = '@json($data->problem)';
        const solution = '@json($data->solution)';

        // スピナーモーダル表示
        alert('button to start generation. It takes about 10 to 20 seconds to finish'); // モーダルライブラリやCSSを使用することが推奨されます

        if (api_key) {
            // Ajaxリクエストを送信
            fetch('{{ route('chatGPT')}}?id=' + id + '&problem=' + problem + '&solution=' + solution + '&api_key=' + api_key)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    console.log(response);
                    // スピナーモーダル非表示
                    alert('Response received!'); // モーダルライブラリやCSSを使用することが推奨されます
                    // ページをリロード
                    window.location.reload();


                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        } else {
            alert('API Key doesn\'t saved. Can you set it in the dashboard!');
        }
    });

    // Cookieから値を取得する関数
    function getCookie(name) {
        const decodedCookie = decodeURIComponent(document.cookie);
        const cookies = decodedCookie.split(';');
        for (let i = 0; i < cookies.length; i++) {
            const cookie = cookies[i].trim();
            if (cookie.indexOf(name + '=') === 0) {
                return cookie.substring((name + '=').length, cookie.length);
            }
        }
        return null;
    }

</script>

</body>
</html>
