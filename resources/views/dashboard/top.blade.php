<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        /* ChatGPT APIキー入力部分のスタイル */
        .api-key-container {
            margin: 10px;
            display: flex;
            align-items: center;
        }

        .api-key-input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-right: 10px;
        }

        .api-key-button {
            background-color: #27acd9;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .api-key-button:hover {
            background-color: #1f82a6;
        }

        input.api-key-input{
            position: absolute;
            overflow: hidden;
        }

        input.top_button {
            position: absolute;
            width: 1px;
            height: 1px;
            overflow: hidden;
            clip: rect(1px, 1px, 1px, 1px);
        }
        .top_button{
            margin: 0;
            display: flex;
            justify-content: flex-end;
            position: absolute;
            right: 0;
        }

        .dekkadekka{
            padding: 20px;
            width: 100%;
        }

        label {
            position: relative;
            background-color: royalblue;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.21);
            border: solid 1px royalblue;
            border-radius: 100px;
            font-weight: bold;
            font-size: 18px;
            color: #fff;
            transition: all ease-in-out 0.1s;
            cursor: pointer;
            margin-bottom: 20px; /* ボタン下のマージンを追加 */
        }

        label:hover {
            background-color: #5a7be0;
        }

        /****** Base style. ******/
        body {
            display: flex;
            flex-direction: column; /* 縦に並べるように変更 */
            align-items: center; /* 中央寄せ */
            margin: 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        button.api-key-button{
            position: absolute;
            margin-left: 200px;

        }

        button.btn_03 {
            text-align: center;
            vertical-align: middle;
            text-decoration: none;
            font-weight: bold;
            border: 2px solid #27acd9;
            color: #27acd9;
            border-radius: 100vh;
            transition: 0.5s;
            margin-bottom: 10px;
            align-self: flex-end; /* ボタンを右寄せに変更 */
        }

        button.btn_03:hover {
            color: #fff;
            background: #27acd9;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        /* リンクスタイルは省略 */

        tbody tr:nth-child(odd) {
            background-color: #ffffcc;
        }

        tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        tbody tr:hover {
            background-color: #f7f7f7;
        }

        .table-cell {
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* リンクスタイル */
        a {
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }

        a:hover {
            color: darkblue;
        }

        /* テーブルセルのスタイル */
        .table-cell {
            max-width: 300px; /* セルの最大幅を設定 */
            overflow: hidden; /* テキストをはみ出した分を隠す */
            text-overflow: ellipsis; /* 見切れたテキストに"..."を追加 */
            white-space: nowrap; /* テキストを折り返さないように設定 */
        }

    </style>
</head>
<body>
    <div class="dekkadekka">
        <!-- ChatGPT APIキー入力部分 -->
        <div class="api-key-container">
            <input type="text" id="api-key-input" class="api-key-input" placeholder="Enter ChatGPT API Key">
            <button onclick="saveApiKey()" class="api-key-button">Save</button>
            <label for="upload" class="top_button">upload:csv</label>
            <input id="upload" type="file" name="upload" class="top_button">
        </div>


    </div>
<table>
    <thead>
    <tr>
        <th><button onclick="sortTable(0)">ID</button></th>
        <th>Problem</th>
        <th>Solution</th>
        <th><button onclick="sortTable(3)">Sum</button></th>
        <th><button onclick="sortTable(4)">Evidence</button></th>
        <th><button onclick="sortTable(6)">Acceptance</button></th>
        <th><button onclick="sortTable(5)">Impact</button></th>

        <th>Note</th>
    </tr>
    </thead>
    <tbody>
    <!-- データ行 -->
    @foreach( $data as $row )
        <tr onclick="window.location.href='{{ route('details', ['id' => ($loop->index +1)]) }}';">
            <td>{{ $row->id }}</td>
            <td class="table-cell">{{ $row->problem }}</td>
            <td class="table-cell">{{ $row->solution }}</td>
            <td>{{ $row->evidence + $row->impact + $row->possible }}/30</td>
            <td>{{ $row->evidence }}/10</td>
            <td>{{ $row->impact }}/10</td>
            <td>{{ $row->possible }}/10</td>
            <td class="table-cell">{{ $row->note }}</td>
        </tr>
    @endforeach

    <!-- データ行は実際のデータを使って動的に生成することが推奨されます -->
    </tbody>
</table>
<script>
    function sortTable(colIndex) {
        const table = document.querySelector('table');
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.querySelectorAll('tr'));

        // ソートする際の比較関数
        const comparator = (a, b) => {
            const aContent = a.children[colIndex].textContent;
            const bContent = b.children[colIndex].textContent;
            return bContent.localeCompare(aContent, undefined, { numeric: true, sensitivity: 'base' });
        };

        // ソート実行
        const sortedRows = rows.sort(comparator);

        // ソート後の行をテーブルに追加
        sortedRows.forEach(row => tbody.appendChild(row));
    }

    function uploadCSV() {
        // ここにCSVアップロードの処理を追加する
        // ファイルの内容を取得してデータに追加するなどの処理を行う
    }

    function reloadPage() {
        location.reload(); // 画面をリロード
    }

    function saveApiKey() {
        // ここにAPIキーを保存する処理を追加する
        const apiKeyInput = document.getElementById('api-key-input');
        const apiKey = apiKeyInput.value.trim();

        // Cookieに保存
        setCookie('api_key', apiKey, 365);

        alert('API Key saved successfully!');
    }

    // Cookieを設定する関数
    function setCookie(name, value, days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        const expires = "expires=" + date.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
    }

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
